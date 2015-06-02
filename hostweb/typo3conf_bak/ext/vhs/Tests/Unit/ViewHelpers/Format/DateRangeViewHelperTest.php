<?php
namespace FluidTYPO3\Vhs\Tests\Unit\ViewHelpers\Format;

/*
 * This file is part of the FluidTYPO3/Vhs project under GPLv2 or later.
 *
 * For the full copyright and license information, please read the
 * LICENSE.md file that was distributed with this source code.
 */

use FluidTYPO3\Vhs\Tests\Unit\ViewHelpers\AbstractViewHelperTest;

/**
 * @protection off
 * @author Claus Due <claus@namelesscoder.net>
 * @package Vhs
 */
class DateRangeViewHelperTest extends AbstractViewHelperTest {

	/**
	 * @var array
	 */
	protected $arguments = array(
		'start' => 1,
		'end' => 86401,
		'intervalFormat' => NULL,
		'startFormat' => 'Y-m-d',
		'endFormat' => 'Y-m-d',
		'glue' => '-',
		'spaceGlue' => TRUE,
		'return' => NULL,
	);

	/**
	 * @test
	 */
	public function rendersWithDefaultArguments() {
		$test = $this->executeViewHelper($this->arguments);
		$this->assertSame('1970-01-01 - 1970-01-02', $test);
	}

	/**
	 * @test
	 */
	public function usesNowAsStart() {
		$arguments = $this->arguments;
		unset($arguments['start']);
		$now = new \DateTime('now');
		$expected = $now->format($arguments['startFormat']);
		$test = $this->executeViewHelper($arguments);
		$this->assertSame($expected . ' - 1970-01-02', $test);
	}

	/**
	 * @test
	 */
	public function rendersStrftimeFormats() {
		$arguments = $this->arguments;
		$arguments['startFormat'] = '%h';
		$test = $this->executeViewHelper($arguments);
		$this->assertSame('Jan - 1970-01-02', $test);
	}

	/**
	 * @test
	 */
	public function canReturnDateTime() {
		$arguments = $this->arguments;
		$arguments['return'] = 'DateTime';
		$test = $this->executeViewHelper($arguments);
		$this->assertInstanceOf('DateTime', $test);
	}

	/**
	 * @test
	 */
	public function canReturnIntervalComponentArray() {
		$arguments = $this->arguments;
		$arguments['return'] = array('d', 's');
		$test = $this->executeViewHelper($arguments);
		$this->assertSame(array('1', '0'), $test);
	}

	/**
	 * @test
	 */
	public function canReturnFormattedInterval() {
		$arguments = $this->arguments;
		$arguments['return'] = 'd';
		$test = $this->executeViewHelper($arguments);
		$this->assertSame('1', $test);
	}

	/**
	 * @test
	 */
	public function canReturnFormattedStrftimeFormat() {
		$arguments = $this->arguments;
		$arguments['return'] = 'd';
		$test = $this->executeViewHelper($arguments);
		$this->assertSame('1', $test);
	}

	/**
	 * @test
	 */
	public function supportsIntervalFormat() {
		$arguments = $this->arguments;
		$arguments['intervalFormat'] = 'P3M';
		unset($arguments['end']);
		$test = $this->executeViewHelper($arguments);
		$this->assertSame('1970-01-01 - 1970-04-01', $test);
	}

	/**
	 * @test
	 */
	public function returnsErrorIfMissingRequiredArgumentsEndAndIntervalFormat() {
		$arguments = $this->arguments;
		unset($arguments['end'], $arguments['intervalFormat']);
		$test = $this->executeViewHelper($arguments);
		$this->assertSame('Either end or intervalFormat has to be provided.', $test);
	}

	/**
	 * @test
	 */
	public function returnsErrorOnInvalidDateInterval() {
		$arguments = $this->arguments;
		$arguments['intervalFormat'] = 'what is this then';
		unset($arguments['end']);
		$test = $this->executeViewHelper($arguments);
		$this->assertContains('"what is this then" could not be parsed by \\DateInterval constructor', $test);
	}

	/**
	 * @test
	 */
	public function returnsErrorOnInvalidStart() {
		$arguments = $this->arguments;
		$arguments['start'] = 'what is this then';
		$test = $this->executeViewHelper($arguments);
		$this->assertContains('"what is this then" could not be parsed by \\DateTime constructor', $test);
	}

	/**
	 * @test
	 */
	public function returnsErrorOnInvalidEnd() {
		$arguments = $this->arguments;
		$arguments['end'] = 'what is this then';
		$test = $this->executeViewHelper($arguments);
		$this->assertContains('"what is this then" could not be parsed by \\DateTime constructor', $test);
	}

}
