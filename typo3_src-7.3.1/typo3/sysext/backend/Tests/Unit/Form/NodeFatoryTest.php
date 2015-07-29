<?php
namespace TYPO3\CMS\Backend\Tests\Unit\Form;

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

use TYPO3\CMS\Backend\Form\Element;
use TYPO3\CMS\Core\Tests\UnitTestCase;
use TYPO3\CMS\Backend\Form\NodeFactory;
use TYPO3\CMS\Backend\Form\NodeInterface;
use TYPO3\CMS\Backend\Form\NodeResolverInterface;

/**
 * Test case
 */
class NodeFactoryTest extends UnitTestCase {

	/**
	 * @test
	 * @expectedException \TYPO3\CMS\Backend\Form\Exception
	 * @expectedExceptionCode 1432207533
	 */
	public function constructThrowsExceptionIfOverrideMissesNodeNameKey() {
		$GLOBALS['TYPO3_CONF_VARS']['SYS']['formEngine']['nodeRegistry'] = array(
			1433089391 => array(
				'class' => 'foo',
				'priority' => 23,
			),
		);
		new NodeFactory();
	}

	/**
	 * @test
	 * @expectedException \TYPO3\CMS\Backend\Form\Exception
	 * @expectedExceptionCode 1432207533
	 */
	public function constructThrowsExceptionIfOverrideMissesPriorityKey() {
		$GLOBALS['TYPO3_CONF_VARS']['SYS']['formEngine']['nodeRegistry'] = array(
			1433089393 => array(
				'nodeName' => 'foo',
				'class' => 'bar',
			),
		);
		new NodeFactory();
	}

	/**
	 * @test
	 * @expectedException \TYPO3\CMS\Backend\Form\Exception
	 * @expectedExceptionCode 1432207533
	 */
	public function constructThrowsExceptionIfOverrideMissesClassKey() {
		$GLOBALS['TYPO3_CONF_VARS']['SYS']['formEngine']['nodeRegistry'] = array(
			1433089392 => array(
				'nodeName' => 'foo',
				'priority' => 23,
			),
		);
		new NodeFactory();
	}

	/**
	 * @test
	 * @expectedException \TYPO3\CMS\Backend\Form\Exception
	 * @expectedExceptionCode 1432223531
	 */
	public function constructThrowsExceptionIfOverridePriorityIsLowerThanZero() {
		$GLOBALS['TYPO3_CONF_VARS']['SYS']['formEngine']['nodeRegistry'] = array(
			1433089394 => array(
				'nodeName' => 'foo',
				'class' => 'bar',
				'priority' => -23,
			),
		);
		new NodeFactory();

	}
	/**
	 * @test
	 * @expectedException \TYPO3\CMS\Backend\Form\Exception
	 * @expectedExceptionCode 1432223531
	 */
	public function constructThrowsExceptionIfOverridePriorityIsHigherThanHundred() {
		$GLOBALS['TYPO3_CONF_VARS']['SYS']['formEngine']['nodeRegistry'] = array(
			1433089395 => array(
				'nodeName' => 'foo',
				'class' => 'bar',
				'priority' => 142,
			),
		);
		new NodeFactory();
	}

	/**
	 * @test
	 * @expectedException \TYPO3\CMS\Backend\Form\Exception
	 * @expectedExceptionCode 1432223893
	 */
	public function constructorThrowsExceptionIfOverrideTwoNodesWithSamePriorityAndSameNodeNameAreRegistered() {
		$GLOBALS['TYPO3_CONF_VARS']['SYS']['formEngine']['nodeRegistry'] = array(
			1433089396 => array(
				'nodeName' => 'foo',
				'priority' => 20,
				'class' => 'fooClass',
			),
			1433089397 => array(
				'nodeName' => 'foo',
				'priority' => 20,
				'class' => 'barClass',
			),
		);
		new NodeFactory();
	}

	/**
	 * @test
	 * @expectedException \TYPO3\CMS\Backend\Form\Exception
	 * @expectedExceptionCode 1433155522
	 */
	public function constructThrowsExceptionIfResolverMissesNodeNameKey() {
		$GLOBALS['TYPO3_CONF_VARS']['SYS']['formEngine']['nodeResolver'] = array(
			1433154905 => array(
				'class' => 'foo',
				'priority' => 23,
			),
		);
		new NodeFactory();
	}

	/**
	 * @test
	 * @expectedException \TYPO3\CMS\Backend\Form\Exception
	 * @expectedExceptionCode 1433155522
	 */
	public function constructThrowsExceptionIfResolverMissesPriorityKey() {
		$GLOBALS['TYPO3_CONF_VARS']['SYS']['formEngine']['nodeResolver'] = array(
			1433154905 => array(
				'nodeName' => 'foo',
				'class' => 'bar',
			),
		);
		new NodeFactory();
	}

	/**
	 * @test
	 * @expectedException \TYPO3\CMS\Backend\Form\Exception
	 * @expectedExceptionCode 1433155522
	 */
	public function constructThrowsExceptionIfResolverMissesClassKey() {
		$GLOBALS['TYPO3_CONF_VARS']['SYS']['formEngine']['nodeResolver'] = array(
			1433154906 => array(
				'nodeName' => 'foo',
				'priority' => 23,
			),
		);
		new NodeFactory();
	}

	/**
	 * @test
	 * @expectedException \TYPO3\CMS\Backend\Form\Exception
	 * @expectedExceptionCode 1433155563
	 */
	public function constructThrowsExceptionIfResolverPriorityIsLowerThanZero() {
		$GLOBALS['TYPO3_CONF_VARS']['SYS']['formEngine']['nodeResolver'] = array(
			1433154907 => array(
				'nodeName' => 'foo',
				'class' => 'bar',
				'priority' => -23,
			),
		);
		new NodeFactory();

	}
	/**
	 * @test
	 * @expectedException \TYPO3\CMS\Backend\Form\Exception
	 * @expectedExceptionCode 1433155563
	 */
	public function constructThrowsExceptionIfResolverPriorityIsHigherThanHundred() {
		$GLOBALS['TYPO3_CONF_VARS']['SYS']['formEngine']['nodeResolver'] = array(
			1433154908 => array(
				'nodeName' => 'foo',
				'class' => 'bar',
				'priority' => 142,
			),
		);
		new NodeFactory();
	}

	/**
	 * @test
	 * @expectedException \TYPO3\CMS\Backend\Form\Exception
	 * @expectedExceptionCode 1433155705
	 */
	public function constructorThrowsExceptionIfResolverTwoNodesWithSamePriorityAndSameNodeNameAreRegistered() {
		$GLOBALS['TYPO3_CONF_VARS']['SYS']['formEngine']['nodeResolver'] = array(
			1433154909 => array(
				'nodeName' => 'foo',
				'priority' => 20,
				'class' => 'fooClass',
			),
			1433154910 => array(
				'nodeName' => 'foo',
				'priority' => 20,
				'class' => 'barClass',
			),
		);
		new NodeFactory();
	}

	/**
	 * @test
	 */
	public function constructorThrowsNoExceptionIfResolverWithSamePriorityButDifferentNodeNameAreRegistered() {
		$GLOBALS['TYPO3_CONF_VARS']['SYS']['formEngine']['nodeResolver'] = array(
			1433154909 => array(
				'nodeName' => 'foo',
				'priority' => 20,
				'class' => 'fooClass',
			),
			1433154910 => array(
				'nodeName' => 'bar',
				'priority' => 20,
				'class' => 'barClass',
			),
		);
		new NodeFactory();
	}

	/**
	 * @test
	 * @expectedException \TYPO3\CMS\Backend\Form\Exception
	 * @expectedExceptionCode 1431452406
	 */
	public function createThrowsExceptionIfRenderTypeIsNotGiven() {
		$subject = new NodeFactory();
		$subject->create(array());
	}

	/**
	 * @test
	 * @expectedException \TYPO3\CMS\Backend\Form\Exception
	 * @expectedExceptionCode 1431872546
	 */
	public function createThrowsExceptionIfNodeDoesNotImplementNodeInterface() {
		$mockNode = new \stdClass();
		/** @var NodeFactory|\PHPUnit_Framework_MockObject_MockObject $mockSubject */
		$mockSubject = $this->getMock(NodeFactory::class, array('instantiate'), array(), '', FALSE);
		$mockSubject->expects($this->once())->method('instantiate')->will($this->returnValue($mockNode));
		$mockSubject->create(array('renderType' => 'foo'));
	}

	/**
	 * @test
	 */
	public function createSetsGlobalOptionsInInstantiatedObject() {
		$globalOptions = array('renderType' => 'foo');
		$mockNode = $this->getMock(NodeInterface::class, array(), array(), '', FALSE);
		$mockNode->expects($this->once())->method('setGlobalOptions')->with($globalOptions);
		/** @var NodeFactory|\PHPUnit_Framework_MockObject_MockObject $mockSubject */
		$mockSubject = $this->getMock(NodeFactory::class, array('instantiate'), array(), '', FALSE);
		$mockSubject->expects($this->once())->method('instantiate')->will($this->returnValue($mockNode));
		$mockSubject->create($globalOptions);
	}

	/**
	 * @test
	 */
	public function createReturnsInstanceOfUnknownElementIfTypeIsNotRegistered() {
		$subject = new NodeFactory();
		$this->assertInstanceOf(Element\UnknownElement::class, $subject->create(array('renderType' => 'foo')));
	}

	/**
	 * @test
	 */
	public function createReturnsInstanceOfSelectTreeElementIfNeeded() {
		$globalOptions = array(
			'renderType' => 'select',
			'parameterArray' => array(
				'fieldConf' => array(
					'config' => array(
						'renderMode' => 'tree',
					),
				),
			),
		);
		$subject = new NodeFactory();
		$this->assertInstanceOf(Element\SelectTreeElement::class, $subject->create($globalOptions));
	}

	/**
	 * @test
	 */
	public function createReturnsInstanceOfSelectSingleElementIfNeeded() {
		$globalOptions = array(
			'renderType' => 'select',
			'parameterArray' => array(
				'fieldConf' => array(
					'config' => array(
						'maxitems' => 1,
					),
				),
			),
		);
		$subject = new NodeFactory();
		$this->assertInstanceOf(Element\SelectSingleElement::class, $subject->create($globalOptions));
	}

	/**
	 * @test
	 */
	public function createReturnsInstanceOfSelectSingleElementIfSelectboxIsConfiguredButMaxitemsIsOne() {
		$globalOptions = array(
			'renderType' => 'select',
			'parameterArray' => array(
				'fieldConf' => array(
					'config' => array(
						'renderMode' => 'singlebox',
						'maxitems' => 1,
					),
				),
			),
		);
		$subject = new NodeFactory();
		$this->assertInstanceOf(Element\SelectSingleElement::class, $subject->create($globalOptions));
	}

	/**
	 * @test
	 */
	public function createReturnsInstanceOfSelectSingleElementIfCheckboxIsConfiguredButMaxitemsIsOne() {
		$globalOptions = array(
			'renderType' => 'select',
			'parameterArray' => array(
				'fieldConf' => array(
					'config' => array(
						'renderMode' => 'checkbox',
						'maxitems' => 1,
					),
				),
			),
		);
		$subject = new NodeFactory();
		$this->assertInstanceOf(Element\SelectSingleElement::class, $subject->create($globalOptions));
	}

	/**
	 * @test
	 */
	public function createReturnsInstanceOfSelectSingleBoxElementIfNeeded() {
		$globalOptions = array(
			'renderType' => 'select',
			'parameterArray' => array(
				'fieldConf' => array(
					'config' => array(
						'renderMode' => 'singlebox',
						'maxitems' => 2,
					),
				),
			),
		);
		$subject = new NodeFactory();
		$this->assertInstanceOf(Element\SelectSingleBoxElement::class, $subject->create($globalOptions));
	}

	/**
	 * @test
	 */
	public function createReturnsInstanceOfSelectCheckBoxElementIfNeeded() {
		$globalOptions = array(
			'renderType' => 'select',
			'parameterArray' => array(
				'fieldConf' => array(
					'config' => array(
						'renderMode' => 'checkbox',
						'maxitems' => 2,
					),
				),
			),
		);
		$subject = new NodeFactory();
		$this->assertInstanceOf(Element\SelectCheckBoxElement::class, $subject->create($globalOptions));
	}

	/**
	 * @test
	 */
	public function createReturnsInstanceOfSelectMultipleSideBySideElementIfNeeded() {
		$globalOptions = array(
			'renderType' => 'select',
			'parameterArray' => array(
				'fieldConf' => array(
					'config' => array(
						'maxitems' => 2,
					),
				),
			),
		);
		$subject = new NodeFactory();
		$this->assertInstanceOf(Element\SelectMultipleSideBySideElement::class, $subject->create($globalOptions));
	}

	/**
	 * @test
	 */
	public function createInstantiatesNewRegisteredElement() {
		$globalOptions = array('renderType' => 'foo');
		$GLOBALS['TYPO3_CONF_VARS']['SYS']['formEngine']['nodeRegistry'] = array(
			array(
				'nodeName' => 'foo',
				'priority' => 20,
				'class' => \stdClass::class,
			),
		);
		$mockNode = $this->getMock(NodeInterface::class, array(), array(), '', FALSE);
		/** @var NodeFactory|\PHPUnit_Framework_MockObject_MockObject $mockSubject */
		$mockSubject = $this->getMock(NodeFactory::class, array('instantiate'));
		$mockSubject->expects($this->once())->method('instantiate')->with('stdClass')->will($this->returnValue($mockNode));
		$mockSubject->create($globalOptions);
	}

	/**
	 * @test
	 */
	public function createInstantiatesElementRegisteredWithHigherPriorityWithOneGivenOrder() {
		$globalOptions = array('renderType' => 'foo');
		$GLOBALS['TYPO3_CONF_VARS']['SYS']['formEngine']['nodeRegistry'] = array(
			1433089467 => array(
				'nodeName' => 'foo',
				'priority' => 20,
				'class' => 'foo1Class',
			),
			1433089468 => array(
				'nodeName' => 'foo',
				'priority' => 30,
				'class' => 'foo2Class',
			),
		);
		$mockNode = $this->getMock(NodeInterface::class, array(), array(), '', FALSE);
		/** @var NodeFactory|\PHPUnit_Framework_MockObject_MockObject $mockSubject */
		$mockSubject = $this->getMock(NodeFactory::class, array('instantiate'));
		$mockSubject->expects($this->once())->method('instantiate')->with('foo2Class')->will($this->returnValue($mockNode));
		$mockSubject->create($globalOptions);
	}

	/**
	 * @test
	 */
	public function createInstantiatesElementRegisteredWithHigherPriorityWithOtherGivenOrder() {
		$globalOptions = array('renderType' => 'foo');
		$GLOBALS['TYPO3_CONF_VARS']['SYS']['formEngine']['nodeRegistry'] = array(
			1433089469 => array(
				'nodeName' => 'foo',
				'priority' => 30,
				'class' => 'foo2Class',
			),
			1433089470 => array(
				'nodeName' => 'foo',
				'priority' => 20,
				'class' => 'foo1Class',
			),
		);
		$mockNode = $this->getMock(NodeInterface::class, array(), array(), '', FALSE);
		/** @var NodeFactory|\PHPUnit_Framework_MockObject_MockObject $mockSubject */
		$mockSubject = $this->getMock(NodeFactory::class, array('instantiate'));
		$mockSubject->expects($this->once())->method('instantiate')->with('foo2Class')->will($this->returnValue($mockNode));
		$mockSubject->create($globalOptions);
	}

	/**
	 * @test
	 * @expectedException \TYPO3\CMS\Backend\Form\Exception
	 * @expectedExceptionCode 1433157422
	 */
	public function createThrowsExceptionIfResolverDoesNotImplementNodeResolverInterface() {
		$globalOptions = array('renderType' => 'foo');
		$GLOBALS['TYPO3_CONF_VARS']['SYS']['formEngine']['nodeResolver'] = array(
			1433156887 => array(
				'nodeName' => 'foo',
				'priority' => 10,
				'class' => 'fooClass',
			),
		);
		$mockResolver = $this->getMock(\stdClass::class);

		/** @var NodeFactory|\PHPUnit_Framework_MockObject_MockObject $mockSubject */
		$mockSubject = $this->getMock(NodeFactory::class, array('instantiate'));
		$mockSubject->expects($this->at(0))->method('instantiate')->will($this->returnValue($mockResolver));
		$mockSubject->create($globalOptions);
	}

	/**
	 * @test
	 */
	public function createInstantiatesResolverWithHighestPriorityFirstWithOneGivenOrder() {
		$globalOptions = array('renderType' => 'foo');
		$GLOBALS['TYPO3_CONF_VARS']['SYS']['formEngine']['nodeRegistry'] = array(
			array(
				'nodeName' => 'foo',
				'priority' => 20,
				'class' => \stdClass::class,
			),
		);
		$mockNode = $this->getMock(NodeInterface::class, array(), array(), '', FALSE);

		$GLOBALS['TYPO3_CONF_VARS']['SYS']['formEngine']['nodeResolver'] = array(
			1433156887 => array(
				'nodeName' => 'foo',
				'priority' => 10,
				'class' => 'foo1Class',
			),
			1433156888 => array(
				'nodeName' => 'foo',
				'priority' => 30,
				'class' => 'foo2Class',
			),
		);
		$mockResolver1 = $this->getMock(NodeResolverInterface::class);
		$mockResolver1->expects($this->once())->method('setGlobalOptions')->will($this->returnValue($mockResolver1));
		$mockResolver2 = $this->getMock(NodeResolverInterface::class);
		$mockResolver2->expects($this->once())->method('setGlobalOptions')->will($this->returnValue($mockResolver2));

		/** @var NodeFactory|\PHPUnit_Framework_MockObject_MockObject $mockSubject */
		$mockSubject = $this->getMock(NodeFactory::class, array('instantiate'));
		$mockSubject->expects($this->at(0))->method('instantiate')->with('foo2Class')->will($this->returnValue($mockResolver2));
		$mockSubject->expects($this->at(1))->method('instantiate')->with('foo1Class')->will($this->returnValue($mockResolver1));
		$mockSubject->expects($this->at(2))->method('instantiate')->will($this->returnValue($mockNode));
		$mockSubject->create($globalOptions);
	}

	/**
	 * @test
	 */
	public function createInstantiatesResolverWithHighestPriorityFirstWithOtherGivenOrder() {
		$globalOptions = array('renderType' => 'foo');
		$GLOBALS['TYPO3_CONF_VARS']['SYS']['formEngine']['nodeRegistry'] = array(
			array(
				'nodeName' => 'foo',
				'priority' => 20,
				'class' => \stdClass::class,
			),
		);
		$mockNode = $this->getMock(NodeInterface::class, array(), array(), '', FALSE);

		$GLOBALS['TYPO3_CONF_VARS']['SYS']['formEngine']['nodeResolver'] = array(
			1433156887 => array(
				'nodeName' => 'foo',
				'priority' => 30,
				'class' => 'foo1Class',
			),
			1433156888 => array(
				'nodeName' => 'foo',
				'priority' => 10,
				'class' => 'foo2Class',
			),
		);
		$mockResolver1 = $this->getMock(NodeResolverInterface::class);
		$mockResolver1->expects($this->once())->method('setGlobalOptions')->will($this->returnValue($mockResolver1));
		$mockResolver2 = $this->getMock(NodeResolverInterface::class);
		$mockResolver2->expects($this->once())->method('setGlobalOptions')->will($this->returnValue($mockResolver2));

		/** @var NodeFactory|\PHPUnit_Framework_MockObject_MockObject $mockSubject */
		$mockSubject = $this->getMock(NodeFactory::class, array('instantiate'));
		$mockSubject->expects($this->at(0))->method('instantiate')->with('foo1Class')->will($this->returnValue($mockResolver1));
		$mockSubject->expects($this->at(1))->method('instantiate')->with('foo2Class')->will($this->returnValue($mockResolver2));
		$mockSubject->expects($this->at(2))->method('instantiate')->will($this->returnValue($mockNode));
		$mockSubject->create($globalOptions);
	}

	/**
	 * @test
	 */
	public function createInstantiatesNodeClassReturnedByResolver() {
		$globalOptions = array('renderType' => 'foo');
		$GLOBALS['TYPO3_CONF_VARS']['SYS']['formEngine']['nodeRegistry'] = array(
			array(
				'nodeName' => 'foo',
				'priority' => 20,
				'class' => \stdClass::class,
			),
		);
		$mockNode = $this->getMock(NodeInterface::class, array(), array(), '', FALSE);

		$GLOBALS['TYPO3_CONF_VARS']['SYS']['formEngine']['nodeResolver'] = array(
			1433156887 => array(
				'nodeName' => 'foo',
				'priority' => 30,
				'class' => 'foo1Class',
			),
		);
		$mockResolver1 = $this->getMock(NodeResolverInterface::class);
		$mockResolver1->expects($this->once())->method('setGlobalOptions')->will($this->returnValue($mockResolver1));
		$mockResolver1->expects($this->once())->method('resolve')->will($this->returnValue('fooNodeClass'));

		/** @var NodeFactory|\PHPUnit_Framework_MockObject_MockObject $mockSubject */
		$mockSubject = $this->getMock(NodeFactory::class, array('instantiate'));
		$mockSubject->expects($this->at(0))->method('instantiate')->will($this->returnValue($mockResolver1));
		$mockSubject->expects($this->at(1))->method('instantiate')->with('fooNodeClass')->will($this->returnValue($mockNode));
		$mockSubject->create($globalOptions);
	}

	/**
	 * @test
	 */
	public function createDoesNotCallSecondResolverWithLowerPriorityIfFirstResolverReturnedClassName() {
		$globalOptions = array('renderType' => 'foo');
		$GLOBALS['TYPO3_CONF_VARS']['SYS']['formEngine']['nodeRegistry'] = array(
			array(
				'nodeName' => 'foo',
				'priority' => 20,
				'class' => \stdClass::class,
			),
		);
		$mockNode = $this->getMock(NodeInterface::class, array(), array(), '', FALSE);

		$GLOBALS['TYPO3_CONF_VARS']['SYS']['formEngine']['nodeResolver'] = array(
			1433156887 => array(
				'nodeName' => 'foo',
				'priority' => 30,
				'class' => 'foo1Class',
			),
			1433156888 => array(
				'nodeName' => 'foo',
				'priority' => 10,
				'class' => 'foo2Class',
			),
		);
		$mockResolver1 = $this->getMock(NodeResolverInterface::class);
		$mockResolver1->expects($this->once())->method('setGlobalOptions')->will($this->returnValue($mockResolver1));
		$mockResolver1->expects($this->once())->method('resolve')->will($this->returnValue('fooNodeClass'));

		/** @var NodeFactory|\PHPUnit_Framework_MockObject_MockObject $mockSubject */
		$mockSubject = $this->getMock(NodeFactory::class, array('instantiate'));
		$mockSubject->expects($this->at(0))->method('instantiate')->with('foo1Class')->will($this->returnValue($mockResolver1));
		$mockSubject->expects($this->at(1))->method('instantiate')->with('fooNodeClass')->will($this->returnValue($mockNode));
		$mockSubject->create($globalOptions);
	}

}
