<?php
namespace FluidTYPO3\Flux\Tests\Unit\ViewHelpers\Content;

/*
 * This file is part of the FluidTYPO3/Flux project under GPLv2 or later.
 *
 * For the full copyright and license information, please read the
 * LICENSE.md file that was distributed with this source code.
 */

use FluidTYPO3\Flux\ViewHelpers\Content\RenderViewHelper;
use FluidTYPO3\Flux\Tests\Fixtures\Data\Records;
use FluidTYPO3\Flux\Tests\Unit\ViewHelpers\AbstractViewHelperTestCase;
use TYPO3\CMS\Core\TimeTracker\NullTimeTracker;
use TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\TextNode;
use TYPO3\CMS\Frontend\ContentObject\ContentObjectRenderer;
use TYPO3\CMS\Frontend\Controller\TypoScriptFrontendController;
use TYPO3\CMS\Frontend\Page\PageRepository;

/**
 * @package Flux
 */
class RenderViewHelperTest extends AbstractViewHelperTestCase {

	/**
	 * Setup
	 */
	protected function setUp() {
		parent::setUp();
		$GLOBALS['TSFE'] = new TypoScriptFrontendController($GLOBALS['TYPO3_CONF_VARS'], 0, 0, 1);
		$GLOBALS['TSFE']->cObj = new ContentObjectRenderer();
		$GLOBALS['TSFE']->sys_page = new PageRepository();
		$GLOBALS['TT'] = new NullTimeTracker();
		$GLOBALS['TYPO3_DB'] = $this->getMock('TYPO3\\CMS\\Core\\Database\\DatabaseConnection', array('exec_SELECTgetRows'), array(), '', FALSE);
		$GLOBALS['TYPO3_DB']->expects($this->any())->method('exec_SELECTgetRows')->will($this->returnValue(array()));
		$GLOBALS['TCA']['tt_content']['ctrl'] = array();
	}

	/**
	 * @test
	 */
	public function canRenderViewHelper() {
		$arguments = array(
			'area' => 'void',
			'as' => 'records',
			'order' => 'sorting'
		);
		$variables = array(
			'record' => Records::$contentRecordWithoutParentAndWithoutChildren
		);
		$node = new TextNode('Hello loopy world!');
		$output = $this->executeViewHelper($arguments, $variables, $node);
		$this->assertSame($node->getText(), $output);
	}

	/**
	 * @test
	 */
	public function isUnaffectedByRenderArgumentBeingFalse() {
		$arguments = array(
			'area' => 'void',
			'render' => FALSE,
			'order' => 'sorting'
		);
		$variables = array(
			'record' => Records::$contentRecordWithoutParentAndWithoutChildren
		);
		$output = $this->executeViewHelper($arguments, $variables);
		$this->assertIsString($output);
	}

	/**
	 * @test
	 */
	public function canRenderViewHelperWithLoadRegister() {
		$arguments = array(
			'area' => 'void',
			'as' => 'records',
			'order' => 'sorting',
			'loadRegister' => array(
				'maxImageWidth' => 300
			)
		);
		$variables = array(
			'record' => Records::$contentRecordWithoutParentAndWithoutChildren
		);
		$node = new TextNode('Hello loopy world!');
		$output = $this->executeViewHelper($arguments, $variables, $node);
		$this->assertSame($node->getText(), $output);
	}

	/**
	 * @test
	 */
	public function canRenderViewHelperWithExistingAsArgumentAndTakeBackup() {
		$arguments = array(
			'area' => 'void',
			'as' => 'nameTaken',
			'order' => 'sorting'
		);
		$variables = array(
			'nameTaken' => 'taken',
			'record' => Records::$contentRecordWithoutParentAndWithoutChildren
		);
		$node = new TextNode('Hello loopy world!');
		$output = $this->executeViewHelper($arguments, $variables, $node);
		$this->assertSame($node->getText(), $output);
	}

	/**
	 * @test
	 */
	public function canRenderViewHelperWithNonExistingAsArgument() {
		$arguments = array(
			'area' => 'void',
			'as' => 'freevariablename',
			'order' => 'sorting'
		);
		$variables = array(
			'record' => Records::$contentRecordWithoutParentAndWithoutChildren
		);
		$node = new TextNode('Hello loopy world!');
		$output = $this->executeViewHelper($arguments, $variables, $node);
		$this->assertSame($node->getText(), $output);
	}

}
