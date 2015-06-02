<?php
namespace FluidTYPO3\Flux\ViewHelpers\Wizard;

/*
 * This file is part of the FluidTYPO3/Flux project under GPLv2 or later.
 *
 * For the full copyright and license information, please read the
 * LICENSE.md file that was distributed with this source code.
 */

use FluidTYPO3\Flux\Form\Wizard\Add;

/**
 * Field Wizard: Add
 *
 * @package Flux
 * @subpackage ViewHelpers/Wizard
 */
class AddViewHelper extends AbstractWizardViewHelper {

	/**
	 * @var string
	 */
	protected $label = 'Add new record';

	/**
	 * Initialize arguments
	 * @return void
	 */
	public function initializeArguments() {
		parent::initializeArguments();
		$this->registerArgument('table', 'string', 'Table name that records are added to', TRUE);
		$this->registerArgument('pid', 'mixed', 'Storage page UID or (as is default) ###CURRENT_PID###', FALSE, '###CURRENT_PID###');
		$this->registerArgument('setValue', 'string', 'How to treat the record once created', FALSE, 'prepend');
	}

	/**
	 * @return Add
	 */
	public function getComponent() {
		/** @var Add $component */
		$component = $this->getPreparedComponent('Add');
		$component->setTable($this->arguments['table']);
		$component->setStoragePageUid($this->arguments['pid']);
		$component->setSetValue($this->arguments['setValue']);
		return $component;
	}

}
