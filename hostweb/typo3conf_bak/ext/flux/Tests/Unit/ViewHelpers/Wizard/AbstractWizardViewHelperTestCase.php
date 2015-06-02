<?php
namespace FluidTYPO3\Flux\Tests\Unit\ViewHelpers\Wizard;

/*
 * This file is part of the FluidTYPO3/Flux project under GPLv2 or later.
 *
 * For the full copyright and license information, please read the
 * LICENSE.md file that was distributed with this source code.
 */

use FluidTYPO3\Flux\Tests\Unit\ViewHelpers\AbstractFormViewHelperTestCase;

/**
 * @package Flux
 */
abstract class AbstractWizardViewHelperTestCase extends AbstractFormViewHelperTestCase {

	/**
	 * @test
	 */
	public function createsValidFieldInterfaceComponents() {
		$instance = $this->buildViewHelperInstance($this->defaultArguments);
		$instance->render();
		$component = $instance->getComponent();
		$this->assertInstanceOf('FluidTYPO3\Flux\Form\WizardInterface', $component);
	}

}
