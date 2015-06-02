<?php
namespace FluidTYPO3\Flux\ViewHelpers\Form;

/*
 * This file is part of the FluidTYPO3/Flux project under GPLv2 or later.
 *
 * For the full copyright and license information, please read the
 * LICENSE.md file that was distributed with this source code.
 */

use FluidTYPO3\Flux\Form\Container\Container;
use FluidTYPO3\Flux\ViewHelpers\Field\AbstractFieldViewHelper;

/**
 * ### FlexForm Field Container element
 *
 * Use around other Flux fields to make these fields nested visually
 * and in variable scopes (i.e. a field called "name" inside a palette
 * called "person" would end up with "person" being an array containing
 * the "name" property, rendered as {person.name} in Fluid.
 *
 * The field grouping can be hidden or completely removed. In this regard
 * this element is a simpler version of the Section and Object logic.
 *
 * @package Flux
 * @subpackage ViewHelpers/Form
 */
class ContainerViewHelper extends AbstractFieldViewHelper {

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
		$this->registerArgument('variables', 'array', 'Freestyle variables which become assigned to the resulting Component - ' .
			'can then be read from that Component outside this Fluid template and in other templates using the Form object from this template', FALSE, array());
		$this->registerArgument('extensionName', 'string', 'If provided, enables overriding the extension context for this and all child nodes. The extension name is otherwise automatically detected from rendering context.');
	}

	/**
	 * Render method
	 * @return void
	 */
	public function render() {
		/** @var Container $container */
		$container = $this->getForm()->createContainer('Container', $this->arguments['name'], $this->arguments['label']);
		$container->setExtensionName($this->getExtensionName());
		$container->setVariables($this->arguments['variables']);
		$existingContainer = $this->getContainer();
		$existingContainer->add($container);
		$this->setContainer($container);
		$this->renderChildren();
		$this->setContainer($existingContainer);
	}

}
