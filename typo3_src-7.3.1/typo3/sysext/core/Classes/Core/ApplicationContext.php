<?php
namespace TYPO3\CMS\Core\Core;

/*
 * This file is part of the TYPO3 CMS project.
 *
 * It is free software; you can redistribute it and/or modify it under
 * the terms of the GNU General Public License, either version 2
 * of the License, or any later version.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 * The TYPO3 project - inspiring people to share!
 */

/**
 * The TYPO3 Context object.
 *
 * A TYPO3 Application context is something like "Production", "Development",
 * "Production/StagingSystem", and is set using the TYPO3_CONTEXT environment variable.
 *
 * A context can contain arbitrary sub-contexts, which are delimited with slash
 * ("Production/StagingSystem", "Production/Staging/Server1"). The top-level
 * contexts, however, must be one of "Testing", "Development" and "Production".
 *
 * Mainly, you will use $context->isProduction(), $context->isTesting() and
 * $context->isDevelopment() inside your custom code.
 *
 * This class is derived from the TYPO3 Flow framework.
 * Credits go to the respective authors.
 *
 * @author Steffen Müller <typo3@t3node.com> (Backport to TYPO3 CMS)
 */
class ApplicationContext {

	/**
	 * The (internal) context string; could be something like "Development" or "Development/MyLocalMacBook"
	 *
	 * @var string
	 */
	protected $contextString;

	/**
	 * The root context; must be one of "Development", "Testing" or "Production"
	 *
	 * @var string
	 */
	protected $rootContextString;

	/**
	 * The parent context, or NULL if there is no parent context
	 *
	 * @var \TYPO3\CMS\Core\Core\ApplicationContext
	 */
	protected $parentContext;

	/**
	 * Initialize the context object.
	 *
	 * @param string $contextString
	 * @throws \Exception if the parent context is none of "Development", "Production" or "Testing"
	 */
	public function __construct($contextString) {
		if (strstr($contextString, '/') === FALSE) {
			$this->rootContextString = $contextString;
			$this->parentContext = NULL;
		} else {
			$contextStringParts = explode('/', $contextString);
			$this->rootContextString = $contextStringParts[0];
			array_pop($contextStringParts);
			$this->parentContext = new ApplicationContext(implode('/', $contextStringParts));
		}

		if (!in_array($this->rootContextString, array('Development', 'Production', 'Testing'))) {
			throw new \TYPO3\CMS\Core\Exception('The given context "' . $contextString . '" was not valid. Only allowed are Development, Production and Testing, including their sub-contexts', 1335436551);
		}

		$this->contextString = $contextString;
	}

	/**
	 * Returns the full context string, for example "Development", or "Production/LiveSystem"
	 *
	 * @return string
	 * @api
	 */
	public function __toString() {
		return $this->contextString;
	}

	/**
	 * Returns TRUE if this context is the Development context or a sub-context of it
	 *
	 * @return bool
	 * @api
	 */
	public function isDevelopment() {
		return ($this->rootContextString === 'Development');
	}

	/**
	 * Returns TRUE if this context is the Production context or a sub-context of it
	 *
	 * @return bool
	 * @api
	 */

	public function isProduction() {
		return ($this->rootContextString === 'Production');
	}

	/**
	 * Returns TRUE if this context is the Testing context or a sub-context of it
	 *
	 * @return bool
	 * @api
	 */
	public function isTesting() {
		return ($this->rootContextString === 'Testing');
	}

	/**
	 * Returns the parent context object, if any
	 *
	 * @return \TYPO3\CMS\Core\Core\ApplicationContext the parent context or NULL, if there is none
	 * @api
	 */
	public function getParent() {
		return $this->parentContext;
	}

}
