<?php
/***************************************************************
 *  Copyright notice
 *
 *  (c) 2009 AOE media (dev@aoemedia.de)
 *  All rights reserved
 *
 *  This script is part of the TYPO3 project. The TYPO3 project is
 *  free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 2 of the License, or
 *  (at your option) any later version.
 *
 *  The GNU General Public License can be found at
 *  http://www.gnu.org/copyleft/gpl.html.
 *
 *  This script is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *
 *  This copyright notice MUST APPEAR in all copies of the script!
 ***************************************************************/

/**
 * Manages cralwer processes and can be used to start a new process or multiple processes
 *
 */
class tx_crawler_domain_process_manager  {
	/**
	 * @var $timeToLive integer
	 */
	private $timeToLive;
	/**
	 * @var integer
	 */
	private $countInARun;
	
	/**
	 * @var integer
	 */
	private $processLimit;
	
	/**
	 * @var $crawlerObj tx_crawler_lib
	 */
	private $crawlerObj;
	
	/**
	 * @var $queueRepository tx_crawler_domain_queue_repository
	 */
	private $queueRepository;
	
	/**
	 * @var tx_crawler_domain_process_repository
	 */
	private $processRepository;
	
	/**
	 * the constructor
	 */
	public function __construct() {
		$this->processRepository	= new tx_crawler_domain_process_repository();
		$this->queueRepository	= new tx_crawler_domain_queue_repository();
		$this->crawlerObj = t3lib_div::makeInstance('tx_crawler_lib');
		$this->timeToLive = intval($this->crawlerObj->extensionSettings['processMaxRunTime']);
		$this->countInARun = intval($this->crawlerObj->extensionSettings['countInARun']);
		$this->processLimit = intval($this->crawlerObj->extensionSettings['processLimit']);
	}
	
	/**
	 * starts multiple processes 
	 * 
	 * @param integer $timeout
	 * @param boolean $verbose
	 */
	public function multiProcess( $timeout, $verbose=TRUE ) {

		if ($this->processLimit <= 1) {
			throw new RuntimeException('To run crawler in multi process mode you have to configure the processLimit > 1.' . PHP_EOL);
		}

		$pendingItemsStart = $this->queueRepository->countAllPendingItems();
		$itemReportLimit = 20;
		$reportItemCount = 	$pendingItemsStart -  $itemReportLimit;
		if ($verbose) {
			$this->reportItemStatus();
		}
		$this->startRequiredProcesses();
		$nextTimeOut = time() + $this->timeToLive;
		for ($i=0; $i<$timeout; $i++) {
			$currentPendingItems = $this->queueRepository->countAllPendingItems();
			if ($this->startRequiredProcesses($verbose)) {
				$nextTimeOut = time() + $this->timeToLive;
			}
			if ($currentPendingItems == 0) {
				echo 'Finished...'.chr(10);
				break;
			}
			if ($currentPendingItems < $reportItemCount) {
				if ($verbose) {
					$this->reportItemStatus();
				}
				$reportItemCount = $currentPendingItems -  $itemReportLimit;
			}
			sleep(1);
			if ($nextTimeOut < time()) {
				$timedOutProcesses = $this->processRepository->findAll('','DESC',NULL,0,'ttl >'.$nextTimeOut);
				$nextTimeOut = time() + $this->timeToLive;
				if ($verbose) {
					echo 'Cleanup'.implode(',',$timedOutProcesses->getProcessIds()).chr(10);
				}
				$this->crawlerObj->CLI_releaseProcesses($timedOutProcesses->getProcessIds(),true);
			}
		}		
		if ($currentPendingItems > 0 && $verbose) {
			echo 'Stop with timeout'.chr(10);
		}
	}
	
	/**
	 * Reports curent Status of queue
	 */
	protected function reportItemStatus() {
		echo 'Pending:'.$this->queueRepository->countAllPendingItems().' / Assigned:'.$this->queueRepository->countAllAssignedPendingItems().chr(10);
	}
	
	/**
	 * according to the given count of pending items and the countInARun Setting this method
	 * starts more crawling processes
	 * @return boolean if processes are started
	 */
	private function startRequiredProcesses($verbose=TRUE) {
		$ret=false;
		$currentProcesses= $this->processRepository->countActive();
		$availableProcessesCount = $this->processLimit-$currentProcesses;
		$requiredProcessesCount = ceil($this->queueRepository->countAllUnassignedPendingItems() / $this->countInARun);
		$startProcessCount = min(array($availableProcessesCount,$requiredProcessesCount));
		if ($startProcessCount <= 0) {
			return;
		}		
		if ($startProcessCount && $verbose) {
			echo 'Start '.$startProcessCount.' new processes (Running:'.$currentProcesses.')';
		}
		for($i=0;$i<$startProcessCount;$i++) {
			usleep(100);
			if ($this->startProcess()) {
				if ($verbose) {
					echo '.';
					$ret = true;
				}
			}		
		}
		if ($verbose) {
			echo chr(10);
		}
		return $ret;
	}
		
	/**
	 * starts new process
	 * @throws Exception if no crawlerprocess was started
	 */
	public function startProcess() {
		$ttl = (time() + $this->timeToLive -1);
		$current = $this->processRepository->countNotTimeouted($ttl);
		$completePath = '(' .escapeshellcmd($this->getCrawlerCliPath()) . ' &) > /dev/null';
		if (system($completePath) === FALSE) {
			throw new Exception('could not start process!');
		}
		else {
			for ($i=0;$i<10;$i++) {
				if ($this->processRepository->countNotTimeouted($ttl) > $current) {
					return true;
				}
				sleep(1);
			}
			throw new Exception('Something went wrong: process did not appear within 10 seconds.');
		}		
	}

	/**
	 * Returns the path to start the crawler from the command line
	 *
	 * @return string
	 */
	public function getCrawlerCliPath(){
		$phpPath 		= $this->crawlerObj->extensionSettings['phpPath'] . ' ';
		$pathToTypo3 	= rtrim(t3lib_div::getIndpEnv('TYPO3_DOCUMENT_ROOT'), '/');
		$pathToTypo3 	.= rtrim(t3lib_div::getIndpEnv('TYPO3_SITE_PATH'), '/');
		$cliPart	 	= '/typo3/cli_dispatch.phpsh crawler';
		return $phpPath.$pathToTypo3.$cliPart;
	}
	
}
