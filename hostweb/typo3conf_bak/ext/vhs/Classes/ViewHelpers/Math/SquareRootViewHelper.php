<?php
namespace FluidTYPO3\Vhs\ViewHelpers\Math;

/*
 * This file is part of the FluidTYPO3/Vhs project under GPLv2 or later.
 *
 * For the full copyright and license information, please read the
 * LICENSE.md file that was distributed with this source code.
 */

/**
 * Math: SquareRoot
 *
 * Performs sqrt($a)
 *
 * @author Claus Due <claus@namelesscoder.net>
 * @package Vhs
 * @subpackage ViewHelpers\Math
 */
class SquareRootViewHelper extends AbstractSingleMathViewHelper {

	/**
	 * @param mixed $a
	 * @return integer
	 */
	protected function calculateAction($a) {
		return sqrt($a);
	}

}
