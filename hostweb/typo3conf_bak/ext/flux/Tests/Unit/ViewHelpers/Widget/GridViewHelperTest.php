<?php
namespace FluidTYPO3\Flux\ViewHelpers\Widget;

/*
 * This file is part of the FluidTYPO3/Flux project under GPLv2 or later.
 *
 * For the full copyright and license information, please read the
 * LICENSE.md file that was distributed with this source code.
 */

use FluidTYPO3\Flux\Tests\Unit\ViewHelpers\AbstractViewHelperTestCase;

/**
 * @package Flux
 */
class GridViewHelperTest extends AbstractViewHelperTestCase {

	/**
	 * @test
	 */
	public function returnsEmptyContent() {
		$this->assertEmpty($this->executeViewHelper());
	}

}
