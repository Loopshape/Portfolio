<?php
namespace FluidTYPO3\Flux\ViewHelpers\Field;

/*
 * This file is part of the FluidTYPO3/Flux project under GPLv2 or later.
 *
 * For the full copyright and license information, please read the
 * LICENSE.md file that was distributed with this source code.
 */

use FluidTYPO3\Flux\Form\FieldInterface;
use FluidTYPO3\Flux\ViewHelpers\AbstractFormViewHelper;

/**
 * Base class for all FlexForm fields.
 *
 * @package Flux
 * @subpackage ViewHelpers/Field
 */
abstract class AbstractFieldViewHelper extends AbstractFormViewHelper {

	/**
	 * Initialize arguments
	 * @return void
	 */
	public function initializeArguments() {
		$this->registerArgument('name', 'string', 'Name of the attribute, FlexForm XML-valid tag name string', TRUE);
		$this->registerArgument('label', 'string', 'Label for the attribute, can be LLL: value. Optional - if not specified, Flux ' .
			'tries to detect an LLL label named "flux.fluxFormId.fields.foobar" based on field name, in scope of extension ' .
			'rendering the Flux form. If field is in an object, use "flux.fluxFormId.objects.objectname.foobar" where ' .
			'"foobar" is the name of the field.', FALSE, NULL);
		$this->registerArgument('default', 'string', 'Default value for this attribute');
		$this->registerArgument('required', 'boolean', 'If TRUE, this attribute must be filled when editing the FCE', FALSE, FALSE);
		$this->registerArgument('exclude', 'boolean', 'If TRUE, this field becomes an "exclude field" (see TYPO3 documentation about this)', FALSE, FALSE);
		$this->registerArgument('transform', 'string', 'Set this to transform your value to this type - integer, array (for csv values), float, DateTime, Tx_MyExt_Domain_Model_Object or ObjectStorage with type hint. Also supported are FED Resource classes.');
		$this->registerArgument('enabled', 'boolean', 'If FALSE, disables the field in the FlexForm', FALSE, TRUE);
		$this->registerArgument('requestUpdate', 'boolean', 'If TRUE, the form is force-saved and reloaded when field value changes', FALSE, FALSE);
		$this->registerArgument('displayCond', 'string', 'Optional "Display Condition" (TCA style) for this particular field', FALSE, NULL);
		$this->registerArgument('inherit', 'boolean', 'If TRUE, the value for this particular field is inherited - if inheritance is enabled by the ConfigurationProvider', FALSE, TRUE);
		$this->registerArgument('inheritEmpty', 'boolean', 'If TRUE, allows empty values (specifically excluding the number zero!) to be inherited - if inheritance is enabled by the ConfigurationProvider', FALSE, TRUE);
		$this->registerArgument('clear', 'boolean', 'If TRUE, a "clear value" checkbox is displayed next to the field which when checked, completely destroys the current field value all the way down to the stored XML value', FALSE, FALSE);
		$this->registerArgument('variables', 'array', 'Freestyle variables which become assigned to the resulting Component - ' .
			'can then be read from that Component outside this Fluid template and in other templates using the Form object from this template', FALSE, array());
		$this->registerArgument('extensionName', 'string', 'If provided, enables overriding the extension context for this and all child nodes. The extension name is otherwise automatically detected from rendering context.');
	}

	/**
	 * @param string $type
	 * @return FieldInterface
	 */
	protected function getPreparedComponent($type) {
		$component = $this->getForm()->createField($type, $this->arguments['name'], $this->arguments['label']);
		$component->setExtensionName($this->getExtensionName());
		$component->setDefault($this->arguments['default']);
		$component->setRequired($this->arguments['required']);
		$component->setExclude($this->arguments['exclude']);
		$component->setEnable($this->arguments['enabled']);
		$component->setRequestUpdate($this->arguments['requestUpdate']);
		$component->setDisplayCondition($this->arguments['displayCond']);
		$component->setInherit($this->arguments['inherit']);
		$component->setInheritEmpty($this->arguments['inheritEmpty']);
		$component->setTransform($this->arguments['transform']);
		$component->setClearable($this->arguments['clear']);
		$component->setVariables($this->arguments['variables']);
		return $component;
	}

}
