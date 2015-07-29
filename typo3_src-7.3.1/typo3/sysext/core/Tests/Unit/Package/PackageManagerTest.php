<?php
namespace TYPO3\CMS\Core\Tests\Unit\Package;

/*                                                                        *
 * This script belongs to the TYPO3 Flow framework.                       *
 *                                                                        *
 * It is free software; you can redistribute it and/or modify it under    *
 * the terms of the GNU Lesser General Public License, either version 3   *
 * of the License, or (at your option) any later version.                 *
 *                                                                        *
 * The TYPO3 project - inspiring people to share!                         *
 *                                                                        */

use TYPO3\CMS\Core\Package\PackageInterface;
use org\bovigo\vfs\vfsStream;

/**
 * Testcase for the default package manager
 *
 */
class PackageManagerTest extends \TYPO3\CMS\Core\Tests\UnitTestCase {

	/**
	 * @var \TYPO3\CMS\Core\Package\PackageManager
	 */
	protected $packageManager;

	/**
	 * Sets up this test case
	 *
	 */
	protected function setUp() {
		vfsStream::setup('Test');
		$mockBootstrap = $this->getMock(\TYPO3\CMS\Core\Core\Bootstrap::class, array(), array(), '', FALSE);
		$mockCache = $this->getMock(\TYPO3\CMS\Core\Cache\Frontend\PhpFrontend::class, array('has', 'set', 'getBackend'), array(), '', FALSE);
		$mockCacheBackend = $this->getMock(\TYPO3\CMS\Core\Cache\Backend\SimpleFileBackend::class, array('has', 'set', 'getBackend'), array(), '', FALSE);
		$mockCache->expects($this->any())->method('has')->will($this->returnValue(FALSE));
		$mockCache->expects($this->any())->method('set')->will($this->returnValue(TRUE));
		$mockCache->expects($this->any())->method('getBackend')->will($this->returnValue($mockCacheBackend));
		$mockCacheBackend->expects($this->any())->method('getCacheDirectory')->will($this->returnValue('vfs://Test/Cache'));
		$this->packageManager = $this->getAccessibleMock(\TYPO3\CMS\Core\Package\PackageManager::class, array('sortAndSavePackageStates', 'sortAvailablePackagesByDependencies', 'registerAutoloadInformationInClassLoader'));

		mkdir('vfs://Test/Packages/Application', 0700, TRUE);
		mkdir('vfs://Test/Configuration');
		file_put_contents('vfs://Test/Configuration/PackageStates.php', "<?php return array ('packages' => array(), 'version' => 4); ");

		$composerNameToPackageKeyMap = array(
			'typo3/flow' => 'TYPO3.Flow'
		);

		$this->packageManager->injectCoreCache($mockCache);
		$this->inject($this->packageManager, 'composerNameToPackageKeyMap', $composerNameToPackageKeyMap);
		$this->packageManager->_set('packagesBasePath', 'vfs://Test/Packages/');
		$this->packageManager->_set('packageStatesPathAndFilename', 'vfs://Test/Configuration/PackageStates.php');
		$this->packageManager->initialize($mockBootstrap);
	}

	/**
	 * @param string $packageKey
	 * @return \TYPO3\CMS\Core\Package\Package
	 */
	protected function createPackage($packageKey) {
		$packagePath = 'vfs://Test/Packages/Application/' . $packageKey . '/';
		mkdir($packagePath, 0770, TRUE);
		file_put_contents($packagePath . 'ext_emconf.php', '');
		file_put_contents($packagePath . 'composer.json', '');
		$package = new \TYPO3\CMS\Core\Package\Package($this->packageManager, $packageKey, $packagePath);
		$this->packageManager->registerPackage($package);
		$this->packageManager->activatePackage($packageKey);

		return $package;
	}

	/**
	 * @test
	 */
	public function getPackageReturnsTheSpecifiedPackage() {
		$this->createPackage('TYPO3.Flow');
		$package = $this->packageManager->getPackage('TYPO3.Flow');

		$this->assertInstanceOf(\TYPO3\CMS\Core\Package\PackageInterface::class, $package, 'The result of getPackage() was no valid package object.');
	}

	/**
	 * @test
	 * @expectedException \TYPO3\CMS\Core\Package\Exception\UnknownPackageException
	 */
	public function getPackageThrowsExceptionOnUnknownPackage() {
		$this->packageManager->getPackage('PrettyUnlikelyThatThisPackageExists');
	}


	/**
	 * @test
	 */
	public function scanAvailablePackagesTraversesThePackagesDirectoryAndRegistersPackagesItFinds() {
		$expectedPackageKeys = array(
			$this->getUniqueId('TYPO3.CMS'),
			$this->getUniqueId('TYPO3.CMS.Test'),
			$this->getUniqueId('TYPO3.YetAnotherTestPackage'),
			$this->getUniqueId('Lolli.Pop.NothingElse')
		);

		foreach ($expectedPackageKeys as $packageKey) {
			$packagePath = 'vfs://Test/Packages/Application/' . $packageKey . '/';

			mkdir($packagePath, 0770, TRUE);
			mkdir($packagePath . 'Classes');
			file_put_contents($packagePath . 'composer.json', '{"name": "' . $packageKey . '", "type": "typo3-test"}');
		}

		$packageManager = $this->getAccessibleMock(\TYPO3\CMS\Core\Package\PackageManager::class, array('sortAndSavePackageStates'));
		$packageManager->_set('packagesBasePath', 'vfs://Test/Packages/');
		$packageManager->_set('packageStatesPathAndFilename', 'vfs://Test/Configuration/PackageStates.php');

		$packageManager->_set('packages', array());
		$packageManager->_call('scanAvailablePackages');

		$packageStates = require('vfs://Test/Configuration/PackageStates.php');
		$actualPackageKeys = array_keys($packageStates['packages']);
		$this->assertEquals(sort($expectedPackageKeys), sort($actualPackageKeys));
	}

	/**
	 * @test
	 */
	public function scanAvailablePackagesKeepsExistingPackageConfiguration() {
		$expectedPackageKeys = array(
			$this->getUniqueId('TYPO3.CMS'),
			$this->getUniqueId('TYPO3.CMS.Test'),
			$this->getUniqueId('TYPO3.YetAnotherTestPackage'),
			$this->getUniqueId('Lolli.Pop.NothingElse')
		);

		foreach ($expectedPackageKeys as $packageKey) {
			$packagePath = 'vfs://Test/Packages/Application/' . $packageKey . '/';

			mkdir($packagePath, 0770, TRUE);
			mkdir($packagePath . 'Classes');
			file_put_contents($packagePath . 'composer.json', '{"name": "' . $packageKey . '", "type": "typo3-cms-test"}');
			file_put_contents($packagePath . 'ext_emconf.php', '');
		}

		$packageManager = $this->getAccessibleMock(\TYPO3\CMS\Core\Package\PackageManager::class, array('dummy'));
		$packageManager->_set('packagesBasePaths', array('local' => 'vfs://Test/Packages/Application'));
		$packageManager->_set('packagesBasePath', 'vfs://Test/Packages/');
		$packageManager->_set('packageStatesPathAndFilename', 'vfs://Test/Configuration/PackageStates.php');

		$dependencyResolver = $this->getMock(\TYPO3\CMS\Core\Package\DependencyResolver::class, array('dummy'));
		$packageManager->injectDependencyResolver($dependencyResolver);

		$packageManager->_set('packageStatesConfiguration', array(
			'packages' => array(
				$packageKey => array(
					'state' => 'inactive',
					'packagePath' => 'Application/' . $packageKey . '/'
				)
			),
			'version' => 4
		));
		$packageManager->_call('scanAvailablePackages');
		$packageManager->_call('sortAndSavePackageStates');

		$packageStates = require('vfs://Test/Configuration/PackageStates.php');
		$this->assertEquals('inactive', $packageStates['packages'][$packageKey]['state']);
	}


	/**
	 * @test
	 */
	public function packageStatesConfigurationContainsRelativePaths() {
		$packageKeys = array(
			$this->getUniqueId('Lolli.Pop.NothingElse'),
			$this->getUniqueId('TYPO3.Package'),
			$this->getUniqueId('TYPO3.YetAnotherTestPackage')
		);

		foreach ($packageKeys as $packageKey) {
			$packagePath = 'vfs://Test/Packages/Application/' . $packageKey . '/';

			mkdir($packagePath, 0770, TRUE);
			mkdir($packagePath . 'Classes');
			file_put_contents($packagePath . 'composer.json', '{"name": "' . $packageKey . '", "type": "typo3-cms-test"}');
			file_put_contents($packagePath . 'ext_emconf.php', '');
		}

		$packageManager = $this->getAccessibleMock(\TYPO3\CMS\Core\Package\PackageManager::class, array('dummy'));
		$packageManager->_set('packagesBasePaths', array('local' => 'vfs://Test/Packages/Application'));
		$packageManager->_set('packagesBasePath', 'vfs://Test/Packages/');
		$packageManager->_set('packageStatesPathAndFilename', 'vfs://Test/Configuration/PackageStates.php');

		$dependencyResolver = $this->getMock(\TYPO3\CMS\Core\Package\DependencyResolver::class, array('dummy'));
		$packageManager->injectDependencyResolver($dependencyResolver);

		$packageManager->_set('packages', array());
		$packageManager->_call('scanAvailablePackages');

		$expectedPackageStatesConfiguration = array();
		foreach ($packageKeys as $packageKey) {
			$expectedPackageStatesConfiguration[$packageKey] = array(
				'state' => 'inactive',
				'packagePath' => 'Application/' . $packageKey . '/',
				'composerName' => $packageKey,
				'suggestions' => array(),
			);
		}

		$actualPackageStatesConfiguration = $packageManager->_get('packageStatesConfiguration');
		$this->assertEquals($expectedPackageStatesConfiguration, $actualPackageStatesConfiguration['packages']);
	}

	/**
	 * Data Provider returning valid package keys and the corresponding path
	 *
	 * @return array
	 */
	public function packageKeysAndPaths() {
		return array(
			array('TYPO3.YetAnotherTestPackage', 'vfs://Test/Packages/Application/TYPO3.YetAnotherTestPackage/'),
			array('Lolli.Pop.NothingElse', 'vfs://Test/Packages/Application/Lolli.Pop.NothingElse/')
		);
	}

	/**
	 * @test
	 * @dataProvider packageKeysAndPaths
	 */
	public function createPackageCreatesPackageFolderAndReturnsPackage($packageKey, $expectedPackagePath) {
		$actualPackage = $this->createPackage($packageKey);
		$actualPackagePath = $actualPackage->getPackagePath();

		$this->assertEquals($expectedPackagePath, $actualPackagePath);
		$this->assertTrue(is_dir($actualPackagePath), 'Package path should exist after createPackage()');
		$this->assertEquals($packageKey, $actualPackage->getPackageKey());
		$this->assertTrue($this->packageManager->isPackageAvailable($packageKey));
	}

	/**
	 * @test
	 */
	public function activatePackageAndDeactivatePackageActivateAndDeactivateTheGivenPackage() {
		$packageKey = 'Acme.YetAnotherTestPackage';

		$this->createPackage($packageKey);

		$this->packageManager->deactivatePackage($packageKey);
		$this->assertFalse($this->packageManager->isPackageActive($packageKey));

		$this->packageManager->activatePackage($packageKey);
		$this->assertTrue($this->packageManager->isPackageActive($packageKey));
	}

	/**
	 * @test
	 * @expectedException \TYPO3\CMS\Core\Package\Exception\ProtectedPackageKeyException
	 */
	public function deactivatePackageThrowsAnExceptionIfPackageIsProtected() {
		$package = $this->createPackage('Acme.YetAnotherTestPackage');
		$package->setProtected(TRUE);
		$this->packageManager->deactivatePackage('Acme.YetAnotherTestPackage');
	}

	/**
	 * @test
	 * @expectedException \TYPO3\CMS\Core\Package\Exception\UnknownPackageException
	 */
	public function deletePackageThrowsErrorIfPackageIsNotAvailable() {
		$this->packageManager->deletePackage('PrettyUnlikelyThatThisPackageExists');
	}

	/**
	 * @test
	 * @expectedException \TYPO3\CMS\Core\Package\Exception\ProtectedPackageKeyException
	 */
	public function deletePackageThrowsAnExceptionIfPackageIsProtected() {
		$package = $this->createPackage('Acme.YetAnotherTestPackage');
		$package->setProtected(TRUE);
		$this->packageManager->deletePackage('Acme.YetAnotherTestPackage');
	}

	/**
	 * @test
	 */
	public function deletePackageRemovesPackageFromAvailableAndActivePackagesAndDeletesThePackageDirectory() {
		$this->createPackage('Acme.YetAnotherTestPackage');

		$this->assertTrue($this->packageManager->isPackageActive('Acme.YetAnotherTestPackage'));
		$this->assertTrue($this->packageManager->isPackageAvailable('Acme.YetAnotherTestPackage'));

		$this->packageManager->deletePackage('Acme.YetAnotherTestPackage');

		$this->assertFalse($this->packageManager->isPackageActive('Acme.YetAnotherTestPackage'));
		$this->assertFalse($this->packageManager->isPackageAvailable('Acme.YetAnotherTestPackage'));
	}

	/**
	 * @return array
	 */
	public function composerNamesAndPackageKeys() {
		return array(
			array('imagine/Imagine', 'imagine.Imagine'),
			array('imagine/imagine', 'imagine.Imagine'),
			array('typo3/cms', 'TYPO3.CMS'),
			array('TYPO3/CMS', 'TYPO3.CMS')
		);
	}

	/**
	 * @test
	 * @dataProvider composerNamesAndPackageKeys
	 */
	public function getPackageKeyFromComposerNameIgnoresCaseDifferences($composerName, $packageKey) {
		$packageStatesConfiguration = array('packages' =>
			array(
				'TYPO3.CMS' => array(
					'composerName' => 'typo3/cms'
				),
				'imagine.Imagine' => array(
					'composerName' => 'imagine/Imagine'
				)
			)
		);

		$packageManager = $this->getAccessibleMock(\TYPO3\CMS\Core\Package\PackageManager::class, array('resolvePackageDependencies'));
		$packageManager->_set('packageStatesConfiguration', $packageStatesConfiguration);

		$this->assertEquals($packageKey, $packageManager->_call('getPackageKeyFromComposerName', $composerName));
	}

}
