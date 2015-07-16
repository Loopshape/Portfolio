<?php


namespace TYPO3\CMS\Core\Package;

/*                                                                        *
 * This script belongs to the TYPO3 Flow framework.                       *
 *                                                                        *
 * It is free software; you can redistribute it and/or modify it under    *
 * the terms of the GNU Lesser General Public License, either version 3   *
 * of the License, or (at your option) any later version.                 *
 *                                                                        *
 * The TYPO3 project - inspiring people to share!                         *
 *                                                                        */

/**
 * A Package
 * Adapted from FLOW for TYPO3 CMS
 *
 * @api
 */
class Package extends \TYPO3\Flow\Package\Package implements PackageInterface {

	const PATTERN_MATCH_EXTENSIONKEY = '/^[0-9a-z_-]+$/i';

	/**
	 * @var array
	 */
	protected $extensionManagerConfiguration = array();

	/**
	 * @var array
	 */
	protected $classAliases;

	/**
	 * @var bool
	 */
	protected $objectManagementEnabled = NULL;

	/**
	 * @var array
	 */
	protected $ignoredClassNames = array();

	/**
	 * If this package is part of factory default, it will be activated
	 * during first installation.
	 *
	 * @var bool
	 */
	protected $partOfFactoryDefault = FALSE;

	/**
	 * If this package is part of minimal usable system, it will be
	 * activated if PackageStates is created from scratch.
	 *
	 * @var bool
	 */
	protected $partOfMinimalUsableSystem = FALSE;

	/**
	 * Constructor
	 *
	 * @param \TYPO3\Flow\Package\PackageManager $packageManager the package manager which knows this package
	 * @param string $packageKey Key of this package
	 * @param string $packagePath Absolute path to the location of the package's composer manifest
	 * @param string $classesPath Path the classes of the package are in, relative to $packagePath. Optional, read from Composer manifest if not set.
	 * @param string $manifestPath Path the composer manifest of the package, relative to $packagePath. Optional, defaults to ''.
	 * @throws \TYPO3\Flow\Package\Exception\InvalidPackageKeyException if an invalid package key was passed
	 * @throws \TYPO3\Flow\Package\Exception\InvalidPackagePathException if an invalid package path was passed
	 * @throws \TYPO3\Flow\Package\Exception\InvalidPackageManifestException if no composer manifest file could be found
	 */
	public function __construct(\TYPO3\Flow\Package\PackageManager $packageManager, $packageKey, $packagePath, $classesPath = NULL, $manifestPath = '') {
		if (!$packageManager->isPackageKeyValid($packageKey)) {
			throw new \TYPO3\Flow\Package\Exception\InvalidPackageKeyException('"' . $packageKey . '" is not a valid package key.', 1217959511);
		}
		if (!(@is_dir($packagePath) || (\TYPO3\Flow\Utility\Files::is_link($packagePath) && is_dir(\TYPO3\Flow\Utility\Files::getNormalizedPath($packagePath))))) {
			throw new \TYPO3\Flow\Package\Exception\InvalidPackagePathException(sprintf('Tried to instantiate a package object for package "%s" with a non-existing package path "%s". Either the package does not exist anymore, or the code creating this object contains an error.', $packageKey, $packagePath), 1166631890);
		}
		if (substr($packagePath, -1, 1) !== '/') {
			throw new \TYPO3\Flow\Package\Exception\InvalidPackagePathException(sprintf('The package path "%s" provided for package "%s" has no trailing forward slash.', $packagePath, $packageKey), 1166633722);
		}
		if ($classesPath[1] === '/') {
			throw new \TYPO3\Flow\Package\Exception\InvalidPackagePathException(sprintf('The package classes path provided for package "%s" has a leading forward slash.', $packageKey), 1334841321);
		}
		if (!@file_exists($packagePath . $manifestPath . 'ext_emconf.php')) {
			throw new \TYPO3\Flow\Package\Exception\InvalidPackageManifestException(sprintf('No ext_emconf file found for package "%s". Please create one at "%sext_emconf.php".', $packageKey, $manifestPath), 1360403545);
		}
		$this->packageManager = $packageManager;
		$this->manifestPath = $manifestPath;
		$this->packageKey = $packageKey;
		$this->packagePath = \TYPO3\Flow\Utility\Files::getNormalizedPath($packagePath);
		$this->classesPath = \TYPO3\Flow\Utility\Files::getNormalizedPath(\TYPO3\Flow\Utility\Files::concatenatePaths(array($this->packagePath, self::DIRECTORY_CLASSES)));
		try {
			$this->getComposerManifest();
		} catch (\TYPO3\Flow\Package\Exception\MissingPackageManifestException $exception) {
			$this->getExtensionEmconf($packageKey, $this->packagePath);
		}
		$this->loadFlagsFromComposerManifest();
		if ($this->objectManagementEnabled === NULL) {
			$this->objectManagementEnabled = FALSE;
		}
	}

	/**
	 * Loads package management related flags from the "extra:typo3/cms:Package" section
	 * of extensions composer.json files into local properties
	 *
	 * @return void
	 */
	protected function loadFlagsFromComposerManifest() {
		$extraFlags = $this->getComposerManifest('extra');
		if ($extraFlags !== NULL && isset($extraFlags->{"typo3/cms"}->{"Package"})) {
			foreach ($extraFlags->{"typo3/cms"}->{"Package"} as $flagName => $flagValue) {
				if (property_exists($this, $flagName)) {
					$this->{$flagName} = $flagValue;
				}
			}
		}
	}

	/**
	 * @return bool
	 */
	public function isPartOfFactoryDefault() {
		return $this->partOfFactoryDefault;
	}

	/**
	 * @return bool
	 */
	public function isPartOfMinimalUsableSystem() {
		return $this->partOfMinimalUsableSystem;
	}

	/**
	 * @return bool
	 */
	protected function getExtensionEmconf() {
		$_EXTKEY = $this->packageKey;
		$path = $this->packagePath . '/ext_emconf.php';
		$EM_CONF = NULL;
		if (@file_exists($path)) {
			include $path;
			if (is_array($EM_CONF[$_EXTKEY])) {
				$this->extensionManagerConfiguration = $EM_CONF[$_EXTKEY];
				$this->mapExtensionManagerConfigurationToComposerManifest();
			}
		}
		return FALSE;
	}

	/**
	 *
	 */
	protected function mapExtensionManagerConfigurationToComposerManifest() {
		if (is_array($this->extensionManagerConfiguration)) {
			$extensionManagerConfiguration = $this->extensionManagerConfiguration;
			$composerManifest = $this->composerManifest = new \stdClass();
			$composerManifest->name = $this->getPackageKey();
			$composerManifest->type = 'typo3-cms-extension';
			$composerManifest->description = $extensionManagerConfiguration['title'];
			$composerManifest->version = $extensionManagerConfiguration['version'];
			if (isset($extensionManagerConfiguration['constraints']['depends']) && is_array($extensionManagerConfiguration['constraints']['depends'])) {
				$composerManifest->require = new \stdClass();
				foreach ($extensionManagerConfiguration['constraints']['depends'] as $requiredPackageKey => $requiredPackageVersion) {
					if (!empty($requiredPackageKey)) {
						$composerManifest->require->$requiredPackageKey = $requiredPackageVersion;
					} else {
						// @todo throw meaningful exception or fail silently?
					}
				}
			}
			if (isset($extensionManagerConfiguration['constraints']['conflicts']) && is_array($extensionManagerConfiguration['constraints']['conflicts'])) {
				$composerManifest->conflict = new \stdClass();
				foreach ($extensionManagerConfiguration['constraints']['conflicts'] as $conflictingPackageKey => $conflictingPackageVersion) {
					if (!empty($conflictingPackageKey)) {
						$composerManifest->conflict->$conflictingPackageKey = $conflictingPackageVersion;
					} else {
						// @todo throw meaningful exception or fail silently?
					}
				}
			}
			if (isset($extensionManagerConfiguration['constraints']['suggests']) && is_array($extensionManagerConfiguration['constraints']['conflicts'])) {
				$composerManifest->suggest = new \stdClass();
				foreach ($extensionManagerConfiguration['constraints']['suggests'] as $suggestedPackageKey => $suggestedPackageVersion) {
					if (!empty($suggestedPackageKey)) {
						$composerManifest->suggest->$suggestedPackageKey = $suggestedPackageVersion;
					} else {
						// @todo throw meaningful exception or fail silently?
					}
				}
			}
		}
	}

	/**
	 * Returns the package meta data object of this package.
	 *
	 * @return \TYPO3\Flow\Package\MetaData
	 */
	public function getPackageMetaData() {
		if ($this->packageMetaData === NULL) {
			parent::getPackageMetaData();
			$suggestions = $this->getComposerManifest('suggest');
			if ($suggestions !== NULL) {
				foreach ($suggestions as $suggestion => $version) {
					if ($this->packageRequirementIsComposerPackage($suggestion) === FALSE) {
						// Skip non-package requirements
						continue;
					}
					$packageKey = $this->packageManager->getPackageKeyFromComposerName($suggestion);
					$constraint = new \TYPO3\Flow\Package\MetaData\PackageConstraint(\TYPO3\Flow\Package\MetaDataInterface::CONSTRAINT_TYPE_SUGGESTS, $packageKey);
					$this->packageMetaData->addConstraint($constraint);
				}
			}
		}
		return $this->packageMetaData;
	}

	/**
	 * @return array
	 */
	public function getPackageReplacementKeys() {
		// The cast to array is required since the manifest returns data with type mixed
		return (array)$this->getComposerManifest('replace') ?: array();
	}

	/**
	 * Returns the PHP namespace of classes in this package.
	 *
	 * @return string
	 * @api
	 */
	public function getNamespace() {
		if(!$this->namespace) {
			$manifest = $this->getComposerManifest();
			if (isset($manifest->autoload->{'psr-0'})) {
				$namespaces = $manifest->autoload->{'psr-0'};
				if (count($namespaces) === 1) {
					$this->namespace = key($namespaces);
				} else {
					throw new \TYPO3\Flow\Package\Exception\InvalidPackageStateException(sprintf('The Composer manifest of package "%s" contains multiple namespace definitions in its autoload section but Flow does only support one namespace per package.', $this->packageKey), 1348053246);
				}
			} else {
				$packageKey = $this->getPackageKey();
				if (strpos($packageKey, '.') === FALSE) {
					// Old school with unknown vendor name
					$this->namespace =  '*\\' . \TYPO3\CMS\Core\Utility\GeneralUtility::underscoredToUpperCamelCase($packageKey);
				} else {
					$this->namespace = str_replace('.', '\\', $packageKey);
				}
			}
		}
		return $this->namespace;
	}

	/**
	 * @return array
	 */
	public function getClassFiles() {
		if (!is_array($this->classFiles)) {
			$this->classFiles = $this->filterClassFiles($this->buildArrayOfClassFiles($this->classesPath . '/', $this->namespace . '\\'));
		}
		return $this->classFiles;
	}

	/**
	 * @param array $classFiles
	 * @return array
	 */
	protected function filterClassFiles(array $classFiles) {
		$classesNotMatchingClassRule = array_filter(array_keys($classFiles), function($className) {
			return preg_match('/^[a-zA-Z_\x7f-\xff][a-zA-Z0-9_\\\x7f-\xff]*$/', $className) !== 1;
		});
		foreach ($classesNotMatchingClassRule as $forbiddenClassName) {
			unset($classFiles[$forbiddenClassName]);
		}
		foreach ($this->ignoredClassNames as $ignoredClassName) {
			if (isset($classFiles[$ignoredClassName])) {
				unset($classFiles[$ignoredClassName]);
			}
		}
		return $classFiles;
	}

	/**
	 * @return array
	 */
	public function getClassFilesFromAutoloadRegistry() {
		$autoloadRegistryPath = $this->packagePath . 'ext_autoload.php';
		if (@file_exists($autoloadRegistryPath)) {
			return require $autoloadRegistryPath;
		}
		return array();
	}

	/**
	 *
	 */
	public function getClassAliases() {
		if (!is_array($this->classAliases)) {
			try {
				$extensionClassAliasMapPathAndFilename = \TYPO3\Flow\Utility\Files::concatenatePaths(array(
					$this->getPackagePath(),
					'Migrations/Code/ClassAliasMap.php'
				));
				if (@file_exists($extensionClassAliasMapPathAndFilename)) {
					$this->classAliases = require $extensionClassAliasMapPathAndFilename;
				}
			} catch (\BadFunctionCallException $e) {
			}
			if (!is_array($this->classAliases)) {
				$this->classAliases = array();
			}
		}
		return $this->classAliases;
	}

	/**
	 * Check whether the given package requirement (like "typo3/flow" or "php") is a composer package or not
	 *
	 * @param string $requirement the composer requirement string
	 * @return bool TRUE if $requirement is a composer package (contains a slash), FALSE otherwise
	 */
	protected function packageRequirementIsComposerPackage($requirement) {
		// According to http://getcomposer.org/doc/02-libraries.md#platform-packages
		// the following regex should capture all non composer requirements.
		// typo3 is included in the list because it's a meta package and not supported for now.
		// composer/installers is included until extensionmanager can handle composer packages natively
		return preg_match('/^(php(-64bit)?|ext-[^\/]+|lib-(curl|iconv|libxml|openssl|pcre|uuid|xsl)|typo3|composer\/installers)$/', $requirement) !== 1;
	}


}

return 
array (
  'packageStatesConfiguration' => 
  array (
    'packages' => 
    array (
      'core' => 
      array (
        'manifestPath' => '',
        'composerName' => 'typo3/cms-core',
        'state' => 'active',
        'packagePath' => 'typo3/sysext/core/',
        'classesPath' => 'Classes/',
        'suggestions' => 
        array (
        ),
      ),
      'about' => 
      array (
        'manifestPath' => '',
        'composerName' => 'typo3/cms-about',
        'state' => 'active',
        'packagePath' => 'typo3/sysext/about/',
        'classesPath' => 'Classes/',
        'suggestions' => 
        array (
        ),
      ),
      'aboutmodules' => 
      array (
        'manifestPath' => '',
        'composerName' => 'typo3/cms-aboutmodules',
        'state' => 'active',
        'packagePath' => 'typo3/sysext/aboutmodules/',
        'classesPath' => 'Classes/',
        'suggestions' => 
        array (
        ),
      ),
      'adodb' => 
      array (
        'manifestPath' => '',
        'composerName' => 'typo3/cms-adodb',
        'state' => 'active',
        'packagePath' => 'typo3/sysext/adodb/',
        'classesPath' => 'Classes/',
        'suggestions' => 
        array (
        ),
      ),
      'backend' => 
      array (
        'manifestPath' => '',
        'composerName' => 'typo3/cms-backend',
        'state' => 'active',
        'packagePath' => 'typo3/sysext/backend/',
        'classesPath' => 'Classes/',
        'suggestions' => 
        array (
        ),
      ),
      'belog' => 
      array (
        'manifestPath' => '',
        'composerName' => 'typo3/cms-belog',
        'state' => 'active',
        'packagePath' => 'typo3/sysext/belog/',
        'classesPath' => 'Classes/',
        'suggestions' => 
        array (
        ),
      ),
      'beuser' => 
      array (
        'manifestPath' => '',
        'composerName' => 'typo3/cms-beuser',
        'state' => 'active',
        'packagePath' => 'typo3/sysext/beuser/',
        'classesPath' => 'Classes/',
        'suggestions' => 
        array (
        ),
      ),
      'compatibility6' => 
      array (
        'state' => 'active',
        'packagePath' => 'typo3/sysext/compatibility6/',
        'classesPath' => 'Classes/',
        'suggestions' => 
        array (
        ),
      ),
      'context_help' => 
      array (
        'manifestPath' => '',
        'composerName' => 'typo3/cms-context-help',
        'state' => 'active',
        'packagePath' => 'typo3/sysext/context_help/',
        'classesPath' => 'Classes/',
        'suggestions' => 
        array (
        ),
      ),
      'cshmanual' => 
      array (
        'manifestPath' => '',
        'composerName' => 'typo3/cms-cshmanual',
        'state' => 'active',
        'packagePath' => 'typo3/sysext/cshmanual/',
        'classesPath' => 'Classes/',
        'suggestions' => 
        array (
        ),
      ),
      'css_styled_content' => 
      array (
        'manifestPath' => '',
        'composerName' => 'typo3/cms-css-styled-content',
        'state' => 'active',
        'packagePath' => 'typo3/sysext/css_styled_content/',
        'classesPath' => 'Classes/',
        'suggestions' => 
        array (
        ),
      ),
      'documentation' => 
      array (
        'manifestPath' => '',
        'composerName' => 'typo3/cms-documentation',
        'state' => 'active',
        'packagePath' => 'typo3/sysext/documentation/',
        'classesPath' => 'Classes/',
        'suggestions' => 
        array (
        ),
      ),
      'extensionmanager' => 
      array (
        'manifestPath' => '',
        'composerName' => 'typo3/cms-extensionmanager',
        'state' => 'active',
        'packagePath' => 'typo3/sysext/extensionmanager/',
        'classesPath' => 'Classes/',
        'suggestions' => 
        array (
        ),
      ),
      'feedit' => 
      array (
        'manifestPath' => '',
        'composerName' => 'typo3/cms-feedit',
        'state' => 'active',
        'packagePath' => 'typo3/sysext/feedit/',
        'classesPath' => 'Classes/',
        'suggestions' => 
        array (
        ),
      ),
      'felogin' => 
      array (
        'manifestPath' => '',
        'composerName' => 'typo3/cms-felogin',
        'state' => 'active',
        'packagePath' => 'typo3/sysext/felogin/',
        'classesPath' => 'Classes/',
        'suggestions' => 
        array (
        ),
      ),
      'filelist' => 
      array (
        'manifestPath' => '',
        'composerName' => 'typo3/cms-filelist',
        'state' => 'active',
        'packagePath' => 'typo3/sysext/filelist/',
        'classesPath' => 'Classes/',
        'suggestions' => 
        array (
        ),
      ),
      'filemetadata' => 
      array (
        'manifestPath' => '',
        'composerName' => 'typo3/cms-filemetadata',
        'state' => 'active',
        'packagePath' => 'typo3/sysext/filemetadata/',
        'classesPath' => 'Classes/',
        'suggestions' => 
        array (
        ),
      ),
      'form' => 
      array (
        'manifestPath' => '',
        'composerName' => 'typo3/cms-form',
        'state' => 'active',
        'packagePath' => 'typo3/sysext/form/',
        'classesPath' => 'Classes/',
        'suggestions' => 
        array (
        ),
      ),
      'cms' => 
      array (
        'manifestPath' => '',
        'composerName' => 'typo3/cms-cms',
        'state' => 'active',
        'packagePath' => 'typo3/sysext/cms/',
        'classesPath' => 'Classes/',
        'suggestions' => 
        array (
        ),
      ),
      'frontend' => 
      array (
        'manifestPath' => '',
        'composerName' => 'typo3/cms-frontend',
        'state' => 'active',
        'packagePath' => 'typo3/sysext/frontend/',
        'classesPath' => 'Classes/',
        'suggestions' => 
        array (
        ),
      ),
      'func' => 
      array (
        'manifestPath' => '',
        'composerName' => 'typo3/cms-func',
        'state' => 'active',
        'packagePath' => 'typo3/sysext/func/',
        'classesPath' => 'Classes/',
        'suggestions' => 
        array (
        ),
      ),
      'impexp' => 
      array (
        'manifestPath' => '',
        'composerName' => 'typo3/cms-impexp',
        'state' => 'active',
        'packagePath' => 'typo3/sysext/impexp/',
        'classesPath' => 'Classes/',
        'suggestions' => 
        array (
        ),
      ),
      'indexed_search' => 
      array (
        'manifestPath' => '',
        'composerName' => 'typo3/cms-indexed-search',
        'state' => 'active',
        'packagePath' => 'typo3/sysext/indexed_search/',
        'classesPath' => 'Classes/',
        'suggestions' => 
        array (
        ),
      ),
      'indexed_search_mysql' => 
      array (
        'manifestPath' => '',
        'composerName' => 'typo3/cms-indexed-search-mysql',
        'state' => 'active',
        'packagePath' => 'typo3/sysext/indexed_search_mysql/',
        'classesPath' => 'Classes/',
        'suggestions' => 
        array (
        ),
      ),
      'info' => 
      array (
        'manifestPath' => '',
        'composerName' => 'typo3/cms-info',
        'state' => 'active',
        'packagePath' => 'typo3/sysext/info/',
        'classesPath' => 'Classes/',
        'suggestions' => 
        array (
        ),
      ),
      'info_pagetsconfig' => 
      array (
        'manifestPath' => '',
        'composerName' => 'typo3/cms-info-pagetsconfig',
        'state' => 'active',
        'packagePath' => 'typo3/sysext/info_pagetsconfig/',
        'classesPath' => 'Classes/',
        'suggestions' => 
        array (
        ),
      ),
      'extbase' => 
      array (
        'manifestPath' => '',
        'composerName' => 'typo3/cms-extbase',
        'state' => 'active',
        'packagePath' => 'typo3/sysext/extbase/',
        'classesPath' => 'Classes/',
        'suggestions' => 
        array (
        ),
      ),
      'fluid' => 
      array (
        'manifestPath' => '',
        'composerName' => 'typo3/cms-fluid',
        'state' => 'active',
        'packagePath' => 'typo3/sysext/fluid/',
        'classesPath' => 'Classes/',
        'suggestions' => 
        array (
        ),
      ),
      'install' => 
      array (
        'manifestPath' => '',
        'composerName' => 'typo3/cms-install',
        'state' => 'active',
        'packagePath' => 'typo3/sysext/install/',
        'classesPath' => 'Classes/',
        'suggestions' => 
        array (
        ),
      ),
      'lang' => 
      array (
        'manifestPath' => '',
        'composerName' => 'typo3/cms-lang',
        'state' => 'active',
        'packagePath' => 'typo3/sysext/lang/',
        'classesPath' => 'Classes/',
        'suggestions' => 
        array (
        ),
      ),
      'lowlevel' => 
      array (
        'manifestPath' => '',
        'composerName' => 'typo3/cms-lowlevel',
        'state' => 'active',
        'packagePath' => 'typo3/sysext/lowlevel/',
        'classesPath' => 'Classes/',
        'suggestions' => 
        array (
        ),
      ),
      'mediace' => 
      array (
        'manifestPath' => '',
        'composerName' => 'typo3/cms-mediace',
        'state' => 'active',
        'packagePath' => 'typo3/sysext/mediace/',
        'classesPath' => 'Classes/',
        'suggestions' => 
        array (
        ),
      ),
      'setup' => 
      array (
        'manifestPath' => '',
        'composerName' => 'typo3/cms-setup',
        'state' => 'active',
        'packagePath' => 'typo3/sysext/setup/',
        'classesPath' => 'Classes/',
        'suggestions' => 
        array (
        ),
      ),
      'sv' => 
      array (
        'manifestPath' => '',
        'composerName' => 'typo3/cms-sv',
        'state' => 'active',
        'packagePath' => 'typo3/sysext/sv/',
        'classesPath' => 'Classes/',
        'suggestions' => 
        array (
        ),
      ),
      'openid' => 
      array (
        'manifestPath' => '',
        'composerName' => 'typo3/cms-openid',
        'state' => 'active',
        'packagePath' => 'typo3/sysext/openid/',
        'classesPath' => 'Classes/',
        'suggestions' => 
        array (
        ),
      ),
      'recordlist' => 
      array (
        'manifestPath' => '',
        'composerName' => 'typo3/cms-recordlist',
        'state' => 'active',
        'packagePath' => 'typo3/sysext/recordlist/',
        'classesPath' => 'Classes/',
        'suggestions' => 
        array (
        ),
      ),
      'recycler' => 
      array (
        'manifestPath' => '',
        'composerName' => 'typo3/cms-recycler',
        'state' => 'active',
        'packagePath' => 'typo3/sysext/recycler/',
        'classesPath' => 'Classes/',
        'suggestions' => 
        array (
        ),
      ),
      'reports' => 
      array (
        'manifestPath' => '',
        'composerName' => 'typo3/cms-reports',
        'state' => 'active',
        'packagePath' => 'typo3/sysext/reports/',
        'classesPath' => 'Classes/',
        'suggestions' => 
        array (
        ),
      ),
      'rsaauth' => 
      array (
        'manifestPath' => '',
        'composerName' => 'typo3/cms-rsaauth',
        'state' => 'active',
        'packagePath' => 'typo3/sysext/rsaauth/',
        'classesPath' => 'Classes/',
        'suggestions' => 
        array (
        ),
      ),
      'rtehtmlarea' => 
      array (
        'manifestPath' => '',
        'composerName' => 'typo3/cms-rtehtmlarea',
        'state' => 'active',
        'packagePath' => 'typo3/sysext/rtehtmlarea/',
        'classesPath' => 'Classes/',
        'suggestions' => 
        array (
          0 => 'setup',
        ),
      ),
      'saltedpasswords' => 
      array (
        'manifestPath' => '',
        'composerName' => 'typo3/cms-saltedpasswords',
        'state' => 'active',
        'packagePath' => 'typo3/sysext/saltedpasswords/',
        'classesPath' => 'Classes/',
        'suggestions' => 
        array (
        ),
      ),
      'scheduler' => 
      array (
        'manifestPath' => '',
        'composerName' => 'typo3/cms-scheduler',
        'state' => 'active',
        'packagePath' => 'typo3/sysext/scheduler/',
        'classesPath' => 'Classes/',
        'suggestions' => 
        array (
        ),
      ),
      'sys_action' => 
      array (
        'manifestPath' => '',
        'composerName' => 'typo3/cms-sys-action',
        'state' => 'active',
        'packagePath' => 'typo3/sysext/sys_action/',
        'classesPath' => 'Classes/',
        'suggestions' => 
        array (
        ),
      ),
      'sys_note' => 
      array (
        'manifestPath' => '',
        'composerName' => 'typo3/cms-sys-note',
        'state' => 'active',
        'packagePath' => 'typo3/sysext/sys_note/',
        'classesPath' => 'Classes/',
        'suggestions' => 
        array (
        ),
      ),
      't3editor' => 
      array (
        'manifestPath' => '',
        'composerName' => 'typo3/cms-t3editor',
        'state' => 'active',
        'packagePath' => 'typo3/sysext/t3editor/',
        'classesPath' => 'Classes/',
        'suggestions' => 
        array (
        ),
      ),
      't3skin' => 
      array (
        'manifestPath' => '',
        'composerName' => 'typo3/cms-t3skin',
        'state' => 'active',
        'packagePath' => 'typo3/sysext/t3skin/',
        'classesPath' => 'Classes/',
        'suggestions' => 
        array (
        ),
      ),
      'taskcenter' => 
      array (
        'manifestPath' => '',
        'composerName' => 'typo3/cms-taskcenter',
        'state' => 'active',
        'packagePath' => 'typo3/sysext/taskcenter/',
        'classesPath' => 'Classes/',
        'suggestions' => 
        array (
        ),
      ),
      'tstemplate' => 
      array (
        'manifestPath' => '',
        'composerName' => 'typo3/cms-tstemplate',
        'state' => 'active',
        'packagePath' => 'typo3/sysext/tstemplate/',
        'classesPath' => 'Classes/',
        'suggestions' => 
        array (
        ),
      ),
      'viewpage' => 
      array (
        'manifestPath' => '',
        'composerName' => 'typo3/cms-viewpage',
        'state' => 'active',
        'packagePath' => 'typo3/sysext/viewpage/',
        'classesPath' => 'Classes/',
        'suggestions' => 
        array (
        ),
      ),
      'wizard_crpages' => 
      array (
        'manifestPath' => '',
        'composerName' => 'typo3/cms-wizard-crpages',
        'state' => 'active',
        'packagePath' => 'typo3/sysext/wizard_crpages/',
        'classesPath' => 'Classes/',
        'suggestions' => 
        array (
        ),
      ),
      'wizard_sortpages' => 
      array (
        'manifestPath' => '',
        'composerName' => 'typo3/cms-wizard-sortpages',
        'state' => 'active',
        'packagePath' => 'typo3/sysext/wizard_sortpages/',
        'classesPath' => 'Classes/',
        'suggestions' => 
        array (
        ),
      ),
      'toctoc_comments' => 
      array (
        'state' => 'active',
        'packagePath' => 'typo3conf/ext/toctoc_comments/',
        'classesPath' => 'Classes/',
        'suggestions' => 
        array (
        ),
      ),
      'rn_base' => 
      array (
        'manifestPath' => '',
        'composerName' => 'digedag/rn-base',
        'state' => 'active',
        'packagePath' => 'typo3conf/ext/rn_base/',
        'classesPath' => 'Classes/',
        'suggestions' => 
        array (
        ),
      ),
      't3socials' => 
      array (
        'state' => 'active',
        'packagePath' => 'typo3conf/ext/t3socials/',
        'classesPath' => 'Classes/',
        'suggestions' => 
        array (
        ),
      ),
      't3_tcpdf' => 
      array (
        'state' => 'active',
        'packagePath' => 'typo3conf/ext/t3_tcpdf/',
        'classesPath' => 'Classes/',
        'suggestions' => 
        array (
        ),
      ),
      't3_less' => 
      array (
        'state' => 'active',
        'packagePath' => 'typo3conf/ext/t3_less/',
        'classesPath' => 'Classes/',
        'suggestions' => 
        array (
        ),
      ),
      'static_info_tables' => 
      array (
        'state' => 'active',
        'packagePath' => 'typo3conf/ext/static_info_tables/',
        'classesPath' => 'Classes/',
        'suggestions' => 
        array (
        ),
      ),
      'static_info_tables_de' => 
      array (
        'state' => 'active',
        'packagePath' => 'typo3conf/ext/static_info_tables_de/',
        'classesPath' => 'Classes/',
        'suggestions' => 
        array (
        ),
      ),
      'sourceopt' => 
      array (
        'state' => 'active',
        'packagePath' => 'typo3conf/ext/sourceopt/',
        'classesPath' => 'Classes/',
        'suggestions' => 
        array (
        ),
      ),
      'source_publisher' => 
      array (
        'state' => 'active',
        'packagePath' => 'typo3conf/ext/source_publisher/',
        'classesPath' => 'Classes/',
        'suggestions' => 
        array (
        ),
      ),
      'realurl' => 
      array (
        'state' => 'active',
        'packagePath' => 'typo3conf/ext/realurl/',
        'classesPath' => 'Classes/',
        'suggestions' => 
        array (
        ),
      ),
      'powermail' => 
      array (
        'state' => 'active',
        'packagePath' => 'typo3conf/ext/powermail/',
        'classesPath' => 'Classes/',
        'suggestions' => 
        array (
        ),
      ),
      'newsletter' => 
      array (
        'manifestPath' => '',
        'composerName' => 'ecodev/newsletter',
        'state' => 'active',
        'packagePath' => 'typo3conf/ext/newsletter/',
        'classesPath' => 'Classes/',
        'suggestions' => 
        array (
        ),
      ),
      'news' => 
      array (
        'manifestPath' => '',
        'composerName' => 'georgringer/news',
        'state' => 'active',
        'packagePath' => 'typo3conf/ext/news/',
        'classesPath' => 'Classes/',
        'suggestions' => 
        array (
        ),
      ),
      'news_ttnewsimport' => 
      array (
        'state' => 'active',
        'packagePath' => 'typo3conf/ext/news_ttnewsimport/',
        'classesPath' => 'Classes/',
        'suggestions' => 
        array (
        ),
      ),
      'metaseo' => 
      array (
        'manifestPath' => '',
        'composerName' => 'mblaschke/metaseo',
        'state' => 'active',
        'packagePath' => 'typo3conf/ext/metaseo/',
        'classesPath' => 'Classes/',
        'suggestions' => 
        array (
        ),
      ),
      'iconfont' => 
      array (
        'state' => 'active',
        'packagePath' => 'typo3conf/ext/iconfont/',
        'classesPath' => 'Classes/',
        'suggestions' => 
        array (
        ),
      ),
      'google_auth' => 
      array (
        'state' => 'active',
        'packagePath' => 'typo3conf/ext/google_auth/',
        'classesPath' => 'Classes/',
        'suggestions' => 
        array (
        ),
      ),
      'df_foundation5' => 
      array (
        'state' => 'active',
        'packagePath' => 'typo3conf/ext/df_foundation5/',
        'classesPath' => 'Classes/',
        'suggestions' => 
        array (
        ),
      ),
      'devtools' => 
      array (
        'state' => 'active',
        'packagePath' => 'typo3conf/ext/devtools/',
        'classesPath' => 'Classes/',
        'suggestions' => 
        array (
        ),
      ),
      'dev_null_geshi' => 
      array (
        'state' => 'active',
        'packagePath' => 'typo3conf/ext/dev_null_geshi/',
        'classesPath' => 'Classes/',
        'suggestions' => 
        array (
        ),
      ),
      'crawler' => 
      array (
        'state' => 'active',
        'packagePath' => 'typo3conf/ext/crawler/',
        'classesPath' => 'Classes/',
        'suggestions' => 
        array (
        ),
      ),
      'cps_devlib' => 
      array (
        'state' => 'active',
        'packagePath' => 'typo3conf/ext/cps_devlib/',
        'classesPath' => 'Classes/',
        'suggestions' => 
        array (
        ),
      ),
      'cps_tcatree' => 
      array (
        'state' => 'active',
        'packagePath' => 'typo3conf/ext/cps_tcatree/',
        'classesPath' => 'Classes/',
        'suggestions' => 
        array (
        ),
      ),
      'cps_searchhighlight' => 
      array (
        'state' => 'active',
        'packagePath' => 'typo3conf/ext/cps_searchhighlight/',
        'classesPath' => 'Classes/',
        'suggestions' => 
        array (
        ),
      ),
      'roq_newsevent' => 
      array (
        'state' => 'active',
        'packagePath' => 'typo3conf/ext/roq_newsevent/',
        'classesPath' => 'Classes/',
        'suggestions' => 
        array (
        ),
      ),
      'cb_newscal' => 
      array (
        'state' => 'active',
        'packagePath' => 'typo3conf/ext/cb_newscal/',
        'classesPath' => 'Classes/',
        'suggestions' => 
        array (
          0 => 'roq_newsevent',
        ),
      ),
      'cb_indexedsearch_autocomplete' => 
      array (
        'state' => 'active',
        'packagePath' => 'typo3conf/ext/cb_indexedsearch_autocomplete/',
        'classesPath' => 'Classes/',
        'suggestions' => 
        array (
        ),
      ),
      'autoloader' => 
      array (
        'state' => 'active',
        'packagePath' => 'typo3conf/ext/autoloader/',
        'classesPath' => 'Classes/',
        'suggestions' => 
        array (
        ),
      ),
      'calendarize' => 
      array (
        'state' => 'active',
        'packagePath' => 'typo3conf/ext/calendarize/',
        'classesPath' => 'Classes/',
        'suggestions' => 
        array (
        ),
      ),
      'calendarize_news' => 
      array (
        'state' => 'active',
        'packagePath' => 'typo3conf/ext/calendarize_news/',
        'classesPath' => 'Classes/',
        'suggestions' => 
        array (
        ),
      ),
      'ajaxpagepreloader' => 
      array (
        'state' => 'active',
        'packagePath' => 'typo3conf/ext/ajaxpagepreloader/',
        'classesPath' => 'Classes/',
        'suggestions' => 
        array (
        ),
      ),
      'nxtemplate' => 
      array (
        'state' => 'inactive',
        'packagePath' => 'typo3conf/ext/nxtemplate/',
        'classesPath' => 'Classes/',
        'suggestions' => 
        array (
        ),
      ),
      'nxindexedsearch' => 
      array (
        'state' => 'inactive',
        'packagePath' => 'typo3conf/ext/nxindexedsearch/',
        'classesPath' => 'Classes/',
        'suggestions' => 
        array (
        ),
      ),
      'linkvalidator' => 
      array (
        'manifestPath' => '',
        'composerName' => 'typo3/cms-linkvalidator',
        'state' => 'inactive',
        'packagePath' => 'typo3/sysext/linkvalidator/',
        'classesPath' => 'Classes/',
        'suggestions' => 
        array (
        ),
      ),
      'dbal' => 
      array (
        'manifestPath' => '',
        'composerName' => 'typo3/cms-dbal',
        'state' => 'inactive',
        'packagePath' => 'typo3/sysext/dbal/',
        'classesPath' => 'Classes/',
        'suggestions' => 
        array (
        ),
      ),
      'version' => 
      array (
        'manifestPath' => '',
        'composerName' => 'typo3/cms-version',
        'state' => 'inactive',
        'packagePath' => 'typo3/sysext/version/',
        'classesPath' => 'Classes/',
        'suggestions' => 
        array (
        ),
      ),
      'workspaces' => 
      array (
        'manifestPath' => '',
        'composerName' => 'typo3/cms-workspaces',
        'state' => 'inactive',
        'packagePath' => 'typo3/sysext/workspaces/',
        'classesPath' => 'Classes/',
        'suggestions' => 
        array (
        ),
      ),
      'opendocs' => 
      array (
        'manifestPath' => '',
        'composerName' => 'typo3/cms-opendocs',
        'state' => 'inactive',
        'packagePath' => 'typo3/sysext/opendocs/',
        'classesPath' => 'Classes/',
        'suggestions' => 
        array (
        ),
      ),
      'mdx_gdviewer' => 
      array (
        'state' => 'inactive',
        'packagePath' => 'typo3conf/ext/mdx_gdviewer/',
        'classesPath' => 'Classes/',
        'suggestions' => 
        array (
        ),
      ),
      'svconnector' => 
      array (
        'state' => 'inactive',
        'packagePath' => 'typo3conf/ext/svconnector/',
        'classesPath' => 'Classes/',
        'suggestions' => 
        array (
        ),
      ),
      'tk_svconsql_table' => 
      array (
        'state' => 'inactive',
        'packagePath' => 'typo3conf/ext/tk_svconsql_table/',
        'classesPath' => 'Classes/',
        'suggestions' => 
        array (
        ),
      ),
      'svconnector_sql' => 
      array (
        'state' => 'inactive',
        'packagePath' => 'typo3conf/ext/svconnector_sql/',
        'classesPath' => 'Classes/',
        'suggestions' => 
        array (
        ),
      ),
      'linkhandlerconf' => 
      array (
        'state' => 'inactive',
        'packagePath' => 'typo3conf/ext/linkhandlerconf/',
        'classesPath' => 'Classes/',
        'suggestions' => 
        array (
        ),
      ),
      'linkhandler' => 
      array (
        'state' => 'inactive',
        'packagePath' => 'typo3conf/ext/linkhandler/',
        'classesPath' => 'Classes/',
        'suggestions' => 
        array (
        ),
      ),
    ),
    'version' => 4,
  ),
  'packageAliasMap' => 
  array (
    'core' => 'core',
    'about' => 'about',
    'aboutmodules' => 'aboutmodules',
    'adodb' => 'adodb',
    'backend' => 'backend',
    'belog' => 'belog',
    'beuser' => 'beuser',
    'context_help' => 'context_help',
    'cshmanual' => 'cshmanual',
    'css_styled_content' => 'css_styled_content',
    'documentation' => 'documentation',
    'extensionmanager' => 'extensionmanager',
    'feedit' => 'feedit',
    'felogin' => 'felogin',
    'filelist' => 'filelist',
    'filemetadata' => 'filemetadata',
    'form' => 'form',
    'cms' => 'cms',
    'frontend' => 'frontend',
    'func' => 'func',
    'impexp' => 'impexp',
    'indexed_search' => 'indexed_search',
    'indexed_search_mysql' => 'indexed_search_mysql',
    'info' => 'info',
    'info_pagetsconfig' => 'info_pagetsconfig',
    'extbase' => 'extbase',
    'fluid' => 'fluid',
    'install' => 'install',
    'language' => 'lang',
    'lowlevel' => 'lowlevel',
    'mediace' => 'mediace',
    'setup' => 'setup',
    'sv' => 'sv',
    'openid' => 'openid',
    'recordlist' => 'recordlist',
    'recycler' => 'recycler',
    'reports' => 'reports',
    'rsaauth' => 'rsaauth',
    'rtehtmlarea' => 'rtehtmlarea',
    'saltedpasswords' => 'saltedpasswords',
    'scheduler' => 'scheduler',
    'sys_action' => 'sys_action',
    'sys_note' => 'sys_note',
    't3editor' => 't3editor',
    't3skin' => 't3skin',
    'taskcenter' => 'taskcenter',
    'tstemplate' => 'tstemplate',
    'viewpage' => 'viewpage',
    'wizard_crpages' => 'wizard_crpages',
    'wizard_sortpages' => 'wizard_sortpages',
    'typo3-ter/rn-base' => 'rn_base',
    'news' => 'news',
    'linkvalidator' => 'linkvalidator',
    'dbal' => 'dbal',
    'version' => 'version',
    'workspaces' => 'workspaces',
    'opendocs' => 'opendocs',
  ),
  'packageKeys' => 
  array (
    'core' => 'core',
    'about' => 'about',
    'aboutmodules' => 'aboutmodules',
    'adodb' => 'adodb',
    'backend' => 'backend',
    'belog' => 'belog',
    'beuser' => 'beuser',
    'compatibility6' => 'compatibility6',
    'context_help' => 'context_help',
    'cshmanual' => 'cshmanual',
    'css_styled_content' => 'css_styled_content',
    'documentation' => 'documentation',
    'extensionmanager' => 'extensionmanager',
    'feedit' => 'feedit',
    'felogin' => 'felogin',
    'filelist' => 'filelist',
    'filemetadata' => 'filemetadata',
    'form' => 'form',
    'cms' => 'cms',
    'frontend' => 'frontend',
    'func' => 'func',
    'impexp' => 'impexp',
    'indexed_search' => 'indexed_search',
    'indexed_search_mysql' => 'indexed_search_mysql',
    'info' => 'info',
    'info_pagetsconfig' => 'info_pagetsconfig',
    'extbase' => 'extbase',
    'fluid' => 'fluid',
    'install' => 'install',
    'lang' => 'lang',
    'lowlevel' => 'lowlevel',
    'mediace' => 'mediace',
    'setup' => 'setup',
    'sv' => 'sv',
    'openid' => 'openid',
    'recordlist' => 'recordlist',
    'recycler' => 'recycler',
    'reports' => 'reports',
    'rsaauth' => 'rsaauth',
    'rtehtmlarea' => 'rtehtmlarea',
    'saltedpasswords' => 'saltedpasswords',
    'scheduler' => 'scheduler',
    'sys_action' => 'sys_action',
    'sys_note' => 'sys_note',
    't3editor' => 't3editor',
    't3skin' => 't3skin',
    'taskcenter' => 'taskcenter',
    'tstemplate' => 'tstemplate',
    'viewpage' => 'viewpage',
    'wizard_crpages' => 'wizard_crpages',
    'wizard_sortpages' => 'wizard_sortpages',
    'toctoc_comments' => 'toctoc_comments',
    'rn_base' => 'rn_base',
    't3socials' => 't3socials',
    't3_tcpdf' => 't3_tcpdf',
    't3_less' => 't3_less',
    'static_info_tables' => 'static_info_tables',
    'static_info_tables_de' => 'static_info_tables_de',
    'sourceopt' => 'sourceopt',
    'source_publisher' => 'source_publisher',
    'realurl' => 'realurl',
    'powermail' => 'powermail',
    'newsletter' => 'newsletter',
    'news' => 'news',
    'news_ttnewsimport' => 'news_ttnewsimport',
    'metaseo' => 'metaseo',
    'iconfont' => 'iconfont',
    'google_auth' => 'google_auth',
    'df_foundation5' => 'df_foundation5',
    'devtools' => 'devtools',
    'dev_null_geshi' => 'dev_null_geshi',
    'crawler' => 'crawler',
    'cps_devlib' => 'cps_devlib',
    'cps_tcatree' => 'cps_tcatree',
    'cps_searchhighlight' => 'cps_searchhighlight',
    'roq_newsevent' => 'roq_newsevent',
    'cb_newscal' => 'cb_newscal',
    'cb_indexedsearch_autocomplete' => 'cb_indexedsearch_autocomplete',
    'autoloader' => 'autoloader',
    'calendarize' => 'calendarize',
    'calendarize_news' => 'calendarize_news',
    'ajaxpagepreloader' => 'ajaxpagepreloader',
    'nxtemplate' => 'nxtemplate',
    'nxindexedsearch' => 'nxindexedsearch',
    'linkvalidator' => 'linkvalidator',
    'dbal' => 'dbal',
    'version' => 'version',
    'workspaces' => 'workspaces',
    'opendocs' => 'opendocs',
    'mdx_gdviewer' => 'mdx_gdviewer',
    'svconnector' => 'svconnector',
    'tk_svconsql_table' => 'tk_svconsql_table',
    'svconnector_sql' => 'svconnector_sql',
    'linkhandlerconf' => 'linkhandlerconf',
    'linkhandler' => 'linkhandler',
  ),
  'activePackageKeys' => 
  array (
    0 => 'core',
    1 => 'backend',
    2 => 'extensionmanager',
    3 => 'cms',
    4 => 'frontend',
    5 => 'extbase',
    6 => 'fluid',
    7 => 'install',
    8 => 'lang',
    9 => 'sv',
    10 => 'recordlist',
    11 => 'saltedpasswords',
    12 => 't3skin',
    13 => 'about',
    14 => 'aboutmodules',
    15 => 'adodb',
    16 => 'belog',
    17 => 'beuser',
    18 => 'compatibility6',
    19 => 'context_help',
    20 => 'cshmanual',
    21 => 'css_styled_content',
    22 => 'documentation',
    23 => 'feedit',
    24 => 'felogin',
    25 => 'filelist',
    26 => 'filemetadata',
    27 => 'form',
    28 => 'func',
    29 => 'impexp',
    30 => 'indexed_search',
    31 => 'indexed_search_mysql',
    32 => 'info',
    33 => 'info_pagetsconfig',
    34 => 'lowlevel',
    35 => 'mediace',
    36 => 'setup',
    37 => 'openid',
    38 => 'recycler',
    39 => 'reports',
    40 => 'rsaauth',
    41 => 'rtehtmlarea',
    42 => 'scheduler',
    43 => 'sys_action',
    44 => 'sys_note',
    45 => 't3editor',
    46 => 'taskcenter',
    47 => 'tstemplate',
    48 => 'viewpage',
    49 => 'wizard_crpages',
    50 => 'wizard_sortpages',
    51 => 'toctoc_comments',
    52 => 'rn_base',
    53 => 't3socials',
    54 => 't3_tcpdf',
    55 => 't3_less',
    56 => 'static_info_tables',
    57 => 'static_info_tables_de',
    58 => 'sourceopt',
    59 => 'source_publisher',
    60 => 'realurl',
    61 => 'powermail',
    62 => 'newsletter',
    63 => 'news',
    64 => 'news_ttnewsimport',
    65 => 'metaseo',
    66 => 'iconfont',
    67 => 'google_auth',
    68 => 'df_foundation5',
    69 => 'devtools',
    70 => 'dev_null_geshi',
    71 => 'crawler',
    72 => 'cps_devlib',
    73 => 'cps_tcatree',
    74 => 'cps_searchhighlight',
    75 => 'roq_newsevent',
    76 => 'cb_newscal',
    77 => 'cb_indexedsearch_autocomplete',
    78 => 'autoloader',
    79 => 'calendarize',
    80 => 'calendarize_news',
    81 => 'ajaxpagepreloader',
  ),
  'requiredPackageKeys' => 
  array (
    0 => 'core',
    1 => 'backend',
    2 => 'extensionmanager',
    3 => 'cms',
    4 => 'frontend',
    5 => 'extbase',
    6 => 'fluid',
    7 => 'install',
    8 => 'lang',
    9 => 'sv',
    10 => 'recordlist',
    11 => 'saltedpasswords',
    12 => 't3skin',
  ),
  'loadedExtArray' => 
  array (
    'core' => 
    array (
      'type' => 'S',
      'siteRelPath' => 'typo3/sysext/core/',
      'typo3RelPath' => 'sysext/core/',
      'ext_localconf.php' => '/var/www/virtual/loop/html/hostweb/typo3/sysext/core/ext_localconf.php',
      'ext_tables.php' => '/var/www/virtual/loop/html/hostweb/typo3/sysext/core/ext_tables.php',
      'ext_tables.sql' => '/var/www/virtual/loop/html/hostweb/typo3/sysext/core/ext_tables.sql',
      'ext_icon' => 'ext_icon.png',
    ),
    'backend' => 
    array (
      'type' => 'S',
      'siteRelPath' => 'typo3/sysext/backend/',
      'typo3RelPath' => 'sysext/backend/',
      'ext_localconf.php' => '/var/www/virtual/loop/html/hostweb/typo3/sysext/backend/ext_localconf.php',
      'ext_tables.php' => '/var/www/virtual/loop/html/hostweb/typo3/sysext/backend/ext_tables.php',
      'ext_icon' => 'ext_icon.png',
    ),
    'extensionmanager' => 
    array (
      'type' => 'S',
      'siteRelPath' => 'typo3/sysext/extensionmanager/',
      'typo3RelPath' => 'sysext/extensionmanager/',
      'ext_localconf.php' => '/var/www/virtual/loop/html/hostweb/typo3/sysext/extensionmanager/ext_localconf.php',
      'ext_tables.php' => '/var/www/virtual/loop/html/hostweb/typo3/sysext/extensionmanager/ext_tables.php',
      'ext_tables.sql' => '/var/www/virtual/loop/html/hostweb/typo3/sysext/extensionmanager/ext_tables.sql',
      'ext_tables_static+adt.sql' => '/var/www/virtual/loop/html/hostweb/typo3/sysext/extensionmanager/ext_tables_static+adt.sql',
      'ext_typoscript_setup.txt' => '/var/www/virtual/loop/html/hostweb/typo3/sysext/extensionmanager/ext_typoscript_setup.txt',
      'ext_icon' => 'ext_icon.png',
    ),
    'cms' => 
    array (
      'type' => 'S',
      'siteRelPath' => 'typo3/sysext/cms/',
      'typo3RelPath' => 'sysext/cms/',
      'ext_icon' => 'ext_icon.png',
    ),
    'frontend' => 
    array (
      'type' => 'S',
      'siteRelPath' => 'typo3/sysext/frontend/',
      'typo3RelPath' => 'sysext/frontend/',
      'ext_localconf.php' => '/var/www/virtual/loop/html/hostweb/typo3/sysext/frontend/ext_localconf.php',
      'ext_tables.php' => '/var/www/virtual/loop/html/hostweb/typo3/sysext/frontend/ext_tables.php',
      'ext_tables.sql' => '/var/www/virtual/loop/html/hostweb/typo3/sysext/frontend/ext_tables.sql',
      'ext_icon' => 'ext_icon.png',
    ),
    'extbase' => 
    array (
      'type' => 'S',
      'siteRelPath' => 'typo3/sysext/extbase/',
      'typo3RelPath' => 'sysext/extbase/',
      'ext_localconf.php' => '/var/www/virtual/loop/html/hostweb/typo3/sysext/extbase/ext_localconf.php',
      'ext_tables.php' => '/var/www/virtual/loop/html/hostweb/typo3/sysext/extbase/ext_tables.php',
      'ext_tables.sql' => '/var/www/virtual/loop/html/hostweb/typo3/sysext/extbase/ext_tables.sql',
      'ext_typoscript_setup.txt' => '/var/www/virtual/loop/html/hostweb/typo3/sysext/extbase/ext_typoscript_setup.txt',
      'ext_icon' => 'ext_icon.png',
    ),
    'fluid' => 
    array (
      'type' => 'S',
      'siteRelPath' => 'typo3/sysext/fluid/',
      'typo3RelPath' => 'sysext/fluid/',
      'ext_tables.php' => '/var/www/virtual/loop/html/hostweb/typo3/sysext/fluid/ext_tables.php',
      'ext_typoscript_setup.txt' => '/var/www/virtual/loop/html/hostweb/typo3/sysext/fluid/ext_typoscript_setup.txt',
      'ext_icon' => 'ext_icon.png',
    ),
    'install' => 
    array (
      'type' => 'S',
      'siteRelPath' => 'typo3/sysext/install/',
      'typo3RelPath' => 'sysext/install/',
      'ext_localconf.php' => '/var/www/virtual/loop/html/hostweb/typo3/sysext/install/ext_localconf.php',
      'ext_tables.php' => '/var/www/virtual/loop/html/hostweb/typo3/sysext/install/ext_tables.php',
      'ext_icon' => 'ext_icon.png',
    ),
    'lang' => 
    array (
      'type' => 'S',
      'siteRelPath' => 'typo3/sysext/lang/',
      'typo3RelPath' => 'sysext/lang/',
      'ext_localconf.php' => '/var/www/virtual/loop/html/hostweb/typo3/sysext/lang/ext_localconf.php',
      'ext_tables.php' => '/var/www/virtual/loop/html/hostweb/typo3/sysext/lang/ext_tables.php',
      'ext_icon' => 'ext_icon.png',
    ),
    'sv' => 
    array (
      'type' => 'S',
      'siteRelPath' => 'typo3/sysext/sv/',
      'typo3RelPath' => 'sysext/sv/',
      'ext_localconf.php' => '/var/www/virtual/loop/html/hostweb/typo3/sysext/sv/ext_localconf.php',
      'ext_tables.php' => '/var/www/virtual/loop/html/hostweb/typo3/sysext/sv/ext_tables.php',
      'ext_icon' => 'ext_icon.png',
    ),
    'recordlist' => 
    array (
      'type' => 'S',
      'siteRelPath' => 'typo3/sysext/recordlist/',
      'typo3RelPath' => 'sysext/recordlist/',
      'ext_tables.php' => '/var/www/virtual/loop/html/hostweb/typo3/sysext/recordlist/ext_tables.php',
      'ext_icon' => 'ext_icon.png',
    ),
    'saltedpasswords' => 
    array (
      'type' => 'S',
      'siteRelPath' => 'typo3/sysext/saltedpasswords/',
      'typo3RelPath' => 'sysext/saltedpasswords/',
      'ext_localconf.php' => '/var/www/virtual/loop/html/hostweb/typo3/sysext/saltedpasswords/ext_localconf.php',
      'ext_tables.php' => '/var/www/virtual/loop/html/hostweb/typo3/sysext/saltedpasswords/ext_tables.php',
      'ext_icon' => 'ext_icon.png',
    ),
    't3skin' => 
    array (
      'type' => 'S',
      'siteRelPath' => 'typo3/sysext/t3skin/',
      'typo3RelPath' => 'sysext/t3skin/',
      'ext_localconf.php' => '/var/www/virtual/loop/html/hostweb/typo3/sysext/t3skin/ext_localconf.php',
      'ext_tables.php' => '/var/www/virtual/loop/html/hostweb/typo3/sysext/t3skin/ext_tables.php',
      'ext_icon' => 'ext_icon.png',
    ),
    'about' => 
    array (
      'type' => 'S',
      'siteRelPath' => 'typo3/sysext/about/',
      'typo3RelPath' => 'sysext/about/',
      'ext_tables.php' => '/var/www/virtual/loop/html/hostweb/typo3/sysext/about/ext_tables.php',
      'ext_icon' => 'ext_icon.png',
    ),
    'aboutmodules' => 
    array (
      'type' => 'S',
      'siteRelPath' => 'typo3/sysext/aboutmodules/',
      'typo3RelPath' => 'sysext/aboutmodules/',
      'ext_tables.php' => '/var/www/virtual/loop/html/hostweb/typo3/sysext/aboutmodules/ext_tables.php',
      'ext_icon' => 'ext_icon.png',
    ),
    'adodb' => 
    array (
      'type' => 'S',
      'siteRelPath' => 'typo3/sysext/adodb/',
      'typo3RelPath' => 'sysext/adodb/',
      'ext_icon' => 'ext_icon.png',
    ),
    'belog' => 
    array (
      'type' => 'S',
      'siteRelPath' => 'typo3/sysext/belog/',
      'typo3RelPath' => 'sysext/belog/',
      'ext_localconf.php' => '/var/www/virtual/loop/html/hostweb/typo3/sysext/belog/ext_localconf.php',
      'ext_tables.php' => '/var/www/virtual/loop/html/hostweb/typo3/sysext/belog/ext_tables.php',
      'ext_typoscript_setup.txt' => '/var/www/virtual/loop/html/hostweb/typo3/sysext/belog/ext_typoscript_setup.txt',
      'ext_icon' => 'ext_icon.png',
    ),
    'beuser' => 
    array (
      'type' => 'S',
      'siteRelPath' => 'typo3/sysext/beuser/',
      'typo3RelPath' => 'sysext/beuser/',
      'ext_localconf.php' => '/var/www/virtual/loop/html/hostweb/typo3/sysext/beuser/ext_localconf.php',
      'ext_tables.php' => '/var/www/virtual/loop/html/hostweb/typo3/sysext/beuser/ext_tables.php',
      'ext_typoscript_setup.txt' => '/var/www/virtual/loop/html/hostweb/typo3/sysext/beuser/ext_typoscript_setup.txt',
      'ext_icon' => 'ext_icon.png',
    ),
    'compatibility6' => 
    array (
      'type' => 'S',
      'siteRelPath' => 'typo3/sysext/compatibility6/',
      'typo3RelPath' => 'sysext/compatibility6/',
      'ext_localconf.php' => '/var/www/virtual/loop/html/hostweb/typo3/sysext/compatibility6/ext_localconf.php',
      'ext_tables.php' => '/var/www/virtual/loop/html/hostweb/typo3/sysext/compatibility6/ext_tables.php',
      'ext_tables.sql' => '/var/www/virtual/loop/html/hostweb/typo3/sysext/compatibility6/ext_tables.sql',
      'ext_icon' => 'ext_icon.png',
    ),
    'context_help' => 
    array (
      'type' => 'S',
      'siteRelPath' => 'typo3/sysext/context_help/',
      'typo3RelPath' => 'sysext/context_help/',
      'ext_tables.php' => '/var/www/virtual/loop/html/hostweb/typo3/sysext/context_help/ext_tables.php',
      'ext_icon' => 'ext_icon.png',
    ),
    'cshmanual' => 
    array (
      'type' => 'S',
      'siteRelPath' => 'typo3/sysext/cshmanual/',
      'typo3RelPath' => 'sysext/cshmanual/',
      'ext_tables.php' => '/var/www/virtual/loop/html/hostweb/typo3/sysext/cshmanual/ext_tables.php',
      'ext_icon' => 'ext_icon.png',
    ),
    'css_styled_content' => 
    array (
      'type' => 'S',
      'siteRelPath' => 'typo3/sysext/css_styled_content/',
      'typo3RelPath' => 'sysext/css_styled_content/',
      'ext_localconf.php' => '/var/www/virtual/loop/html/hostweb/typo3/sysext/css_styled_content/ext_localconf.php',
      'ext_tables.sql' => '/var/www/virtual/loop/html/hostweb/typo3/sysext/css_styled_content/ext_tables.sql',
      'ext_icon' => 'ext_icon.png',
    ),
    'documentation' => 
    array (
      'type' => 'S',
      'siteRelPath' => 'typo3/sysext/documentation/',
      'typo3RelPath' => 'sysext/documentation/',
      'ext_localconf.php' => '/var/www/virtual/loop/html/hostweb/typo3/sysext/documentation/ext_localconf.php',
      'ext_tables.php' => '/var/www/virtual/loop/html/hostweb/typo3/sysext/documentation/ext_tables.php',
      'ext_icon' => 'ext_icon.png',
    ),
    'feedit' => 
    array (
      'type' => 'S',
      'siteRelPath' => 'typo3/sysext/feedit/',
      'typo3RelPath' => 'sysext/feedit/',
      'ext_localconf.php' => '/var/www/virtual/loop/html/hostweb/typo3/sysext/feedit/ext_localconf.php',
      'ext_icon' => 'ext_icon.png',
    ),
    'felogin' => 
    array (
      'type' => 'S',
      'siteRelPath' => 'typo3/sysext/felogin/',
      'typo3RelPath' => 'sysext/felogin/',
      'ext_localconf.php' => '/var/www/virtual/loop/html/hostweb/typo3/sysext/felogin/ext_localconf.php',
      'ext_tables.sql' => '/var/www/virtual/loop/html/hostweb/typo3/sysext/felogin/ext_tables.sql',
      'ext_typoscript_setup.txt' => '/var/www/virtual/loop/html/hostweb/typo3/sysext/felogin/ext_typoscript_setup.txt',
      'ext_icon' => 'ext_icon.png',
    ),
    'filelist' => 
    array (
      'type' => 'S',
      'siteRelPath' => 'typo3/sysext/filelist/',
      'typo3RelPath' => 'sysext/filelist/',
      'ext_tables.php' => '/var/www/virtual/loop/html/hostweb/typo3/sysext/filelist/ext_tables.php',
      'ext_icon' => 'ext_icon.png',
    ),
    'filemetadata' => 
    array (
      'type' => 'S',
      'siteRelPath' => 'typo3/sysext/filemetadata/',
      'typo3RelPath' => 'sysext/filemetadata/',
      'ext_tables.sql' => '/var/www/virtual/loop/html/hostweb/typo3/sysext/filemetadata/ext_tables.sql',
      'ext_icon' => 'ext_icon.png',
    ),
    'form' => 
    array (
      'type' => 'S',
      'siteRelPath' => 'typo3/sysext/form/',
      'typo3RelPath' => 'sysext/form/',
      'ext_localconf.php' => '/var/www/virtual/loop/html/hostweb/typo3/sysext/form/ext_localconf.php',
      'ext_tables.php' => '/var/www/virtual/loop/html/hostweb/typo3/sysext/form/ext_tables.php',
      'ext_icon' => 'ext_icon.png',
    ),
    'func' => 
    array (
      'type' => 'S',
      'siteRelPath' => 'typo3/sysext/func/',
      'typo3RelPath' => 'sysext/func/',
      'ext_tables.php' => '/var/www/virtual/loop/html/hostweb/typo3/sysext/func/ext_tables.php',
      'ext_icon' => 'ext_icon.png',
    ),
    'impexp' => 
    array (
      'type' => 'S',
      'siteRelPath' => 'typo3/sysext/impexp/',
      'typo3RelPath' => 'sysext/impexp/',
      'ext_localconf.php' => '/var/www/virtual/loop/html/hostweb/typo3/sysext/impexp/ext_localconf.php',
      'ext_tables.php' => '/var/www/virtual/loop/html/hostweb/typo3/sysext/impexp/ext_tables.php',
      'ext_tables.sql' => '/var/www/virtual/loop/html/hostweb/typo3/sysext/impexp/ext_tables.sql',
      'ext_icon' => 'ext_icon.png',
    ),
    'indexed_search' => 
    array (
      'type' => 'S',
      'siteRelPath' => 'typo3/sysext/indexed_search/',
      'typo3RelPath' => 'sysext/indexed_search/',
      'ext_localconf.php' => '/var/www/virtual/loop/html/hostweb/typo3/sysext/indexed_search/ext_localconf.php',
      'ext_tables.php' => '/var/www/virtual/loop/html/hostweb/typo3/sysext/indexed_search/ext_tables.php',
      'ext_tables.sql' => '/var/www/virtual/loop/html/hostweb/typo3/sysext/indexed_search/ext_tables.sql',
      'ext_typoscript_setup.txt' => '/var/www/virtual/loop/html/hostweb/typo3/sysext/indexed_search/ext_typoscript_setup.txt',
      'ext_icon' => 'ext_icon.png',
    ),
    'indexed_search_mysql' => 
    array (
      'type' => 'S',
      'siteRelPath' => 'typo3/sysext/indexed_search_mysql/',
      'typo3RelPath' => 'sysext/indexed_search_mysql/',
      'ext_localconf.php' => '/var/www/virtual/loop/html/hostweb/typo3/sysext/indexed_search_mysql/ext_localconf.php',
      'ext_tables.sql' => '/var/www/virtual/loop/html/hostweb/typo3/sysext/indexed_search_mysql/ext_tables.sql',
      'ext_icon' => 'ext_icon.png',
    ),
    'info' => 
    array (
      'type' => 'S',
      'siteRelPath' => 'typo3/sysext/info/',
      'typo3RelPath' => 'sysext/info/',
      'ext_tables.php' => '/var/www/virtual/loop/html/hostweb/typo3/sysext/info/ext_tables.php',
      'ext_icon' => 'ext_icon.png',
    ),
    'info_pagetsconfig' => 
    array (
      'type' => 'S',
      'siteRelPath' => 'typo3/sysext/info_pagetsconfig/',
      'typo3RelPath' => 'sysext/info_pagetsconfig/',
      'ext_tables.php' => '/var/www/virtual/loop/html/hostweb/typo3/sysext/info_pagetsconfig/ext_tables.php',
      'ext_icon' => 'ext_icon.png',
    ),
    'lowlevel' => 
    array (
      'type' => 'S',
      'siteRelPath' => 'typo3/sysext/lowlevel/',
      'typo3RelPath' => 'sysext/lowlevel/',
      'ext_localconf.php' => '/var/www/virtual/loop/html/hostweb/typo3/sysext/lowlevel/ext_localconf.php',
      'ext_tables.php' => '/var/www/virtual/loop/html/hostweb/typo3/sysext/lowlevel/ext_tables.php',
      'ext_icon' => 'ext_icon.png',
    ),
    'mediace' => 
    array (
      'type' => 'S',
      'siteRelPath' => 'typo3/sysext/mediace/',
      'typo3RelPath' => 'sysext/mediace/',
      'ext_localconf.php' => '/var/www/virtual/loop/html/hostweb/typo3/sysext/mediace/ext_localconf.php',
      'ext_tables.sql' => '/var/www/virtual/loop/html/hostweb/typo3/sysext/mediace/ext_tables.sql',
      'ext_icon' => 'ext_icon.gif',
    ),
    'setup' => 
    array (
      'type' => 'S',
      'siteRelPath' => 'typo3/sysext/setup/',
      'typo3RelPath' => 'sysext/setup/',
      'ext_tables.php' => '/var/www/virtual/loop/html/hostweb/typo3/sysext/setup/ext_tables.php',
      'ext_icon' => 'ext_icon.png',
    ),
    'openid' => 
    array (
      'type' => 'S',
      'siteRelPath' => 'typo3/sysext/openid/',
      'typo3RelPath' => 'sysext/openid/',
      'ext_localconf.php' => '/var/www/virtual/loop/html/hostweb/typo3/sysext/openid/ext_localconf.php',
      'ext_tables.php' => '/var/www/virtual/loop/html/hostweb/typo3/sysext/openid/ext_tables.php',
      'ext_tables.sql' => '/var/www/virtual/loop/html/hostweb/typo3/sysext/openid/ext_tables.sql',
      'ext_icon' => 'ext_icon.png',
    ),
    'recycler' => 
    array (
      'type' => 'S',
      'siteRelPath' => 'typo3/sysext/recycler/',
      'typo3RelPath' => 'sysext/recycler/',
      'ext_localconf.php' => '/var/www/virtual/loop/html/hostweb/typo3/sysext/recycler/ext_localconf.php',
      'ext_tables.php' => '/var/www/virtual/loop/html/hostweb/typo3/sysext/recycler/ext_tables.php',
      'ext_icon' => 'ext_icon.png',
    ),
    'reports' => 
    array (
      'type' => 'S',
      'siteRelPath' => 'typo3/sysext/reports/',
      'typo3RelPath' => 'sysext/reports/',
      'ext_localconf.php' => '/var/www/virtual/loop/html/hostweb/typo3/sysext/reports/ext_localconf.php',
      'ext_tables.php' => '/var/www/virtual/loop/html/hostweb/typo3/sysext/reports/ext_tables.php',
      'ext_icon' => 'ext_icon.png',
    ),
    'rsaauth' => 
    array (
      'type' => 'S',
      'siteRelPath' => 'typo3/sysext/rsaauth/',
      'typo3RelPath' => 'sysext/rsaauth/',
      'ext_localconf.php' => '/var/www/virtual/loop/html/hostweb/typo3/sysext/rsaauth/ext_localconf.php',
      'ext_tables.sql' => '/var/www/virtual/loop/html/hostweb/typo3/sysext/rsaauth/ext_tables.sql',
      'ext_icon' => 'ext_icon.png',
    ),
    'rtehtmlarea' => 
    array (
      'type' => 'S',
      'siteRelPath' => 'typo3/sysext/rtehtmlarea/',
      'typo3RelPath' => 'sysext/rtehtmlarea/',
      'ext_localconf.php' => '/var/www/virtual/loop/html/hostweb/typo3/sysext/rtehtmlarea/ext_localconf.php',
      'ext_tables.php' => '/var/www/virtual/loop/html/hostweb/typo3/sysext/rtehtmlarea/ext_tables.php',
      'ext_tables.sql' => '/var/www/virtual/loop/html/hostweb/typo3/sysext/rtehtmlarea/ext_tables.sql',
      'ext_icon' => 'ext_icon.png',
    ),
    'scheduler' => 
    array (
      'type' => 'S',
      'siteRelPath' => 'typo3/sysext/scheduler/',
      'typo3RelPath' => 'sysext/scheduler/',
      'ext_localconf.php' => '/var/www/virtual/loop/html/hostweb/typo3/sysext/scheduler/ext_localconf.php',
      'ext_tables.php' => '/var/www/virtual/loop/html/hostweb/typo3/sysext/scheduler/ext_tables.php',
      'ext_tables.sql' => '/var/www/virtual/loop/html/hostweb/typo3/sysext/scheduler/ext_tables.sql',
      'ext_icon' => 'ext_icon.png',
    ),
    'sys_action' => 
    array (
      'type' => 'S',
      'siteRelPath' => 'typo3/sysext/sys_action/',
      'typo3RelPath' => 'sysext/sys_action/',
      'ext_localconf.php' => '/var/www/virtual/loop/html/hostweb/typo3/sysext/sys_action/ext_localconf.php',
      'ext_tables.php' => '/var/www/virtual/loop/html/hostweb/typo3/sysext/sys_action/ext_tables.php',
      'ext_tables.sql' => '/var/www/virtual/loop/html/hostweb/typo3/sysext/sys_action/ext_tables.sql',
      'ext_icon' => 'ext_icon.png',
    ),
    'sys_note' => 
    array (
      'type' => 'S',
      'siteRelPath' => 'typo3/sysext/sys_note/',
      'typo3RelPath' => 'sysext/sys_note/',
      'ext_localconf.php' => '/var/www/virtual/loop/html/hostweb/typo3/sysext/sys_note/ext_localconf.php',
      'ext_tables.php' => '/var/www/virtual/loop/html/hostweb/typo3/sysext/sys_note/ext_tables.php',
      'ext_tables.sql' => '/var/www/virtual/loop/html/hostweb/typo3/sysext/sys_note/ext_tables.sql',
      'ext_typoscript_constants.txt' => '/var/www/virtual/loop/html/hostweb/typo3/sysext/sys_note/ext_typoscript_constants.txt',
      'ext_typoscript_setup.txt' => '/var/www/virtual/loop/html/hostweb/typo3/sysext/sys_note/ext_typoscript_setup.txt',
      'ext_icon' => 'ext_icon.png',
    ),
    't3editor' => 
    array (
      'type' => 'S',
      'siteRelPath' => 'typo3/sysext/t3editor/',
      'typo3RelPath' => 'sysext/t3editor/',
      'ext_localconf.php' => '/var/www/virtual/loop/html/hostweb/typo3/sysext/t3editor/ext_localconf.php',
      'ext_tables.php' => '/var/www/virtual/loop/html/hostweb/typo3/sysext/t3editor/ext_tables.php',
      'ext_icon' => 'ext_icon.png',
    ),
    'taskcenter' => 
    array (
      'type' => 'S',
      'siteRelPath' => 'typo3/sysext/taskcenter/',
      'typo3RelPath' => 'sysext/taskcenter/',
      'ext_tables.php' => '/var/www/virtual/loop/html/hostweb/typo3/sysext/taskcenter/ext_tables.php',
      'ext_icon' => 'ext_icon.png',
    ),
    'tstemplate' => 
    array (
      'type' => 'S',
      'siteRelPath' => 'typo3/sysext/tstemplate/',
      'typo3RelPath' => 'sysext/tstemplate/',
      'ext_tables.php' => '/var/www/virtual/loop/html/hostweb/typo3/sysext/tstemplate/ext_tables.php',
      'ext_icon' => 'ext_icon.png',
    ),
    'viewpage' => 
    array (
      'type' => 'S',
      'siteRelPath' => 'typo3/sysext/viewpage/',
      'typo3RelPath' => 'sysext/viewpage/',
      'ext_tables.php' => '/var/www/virtual/loop/html/hostweb/typo3/sysext/viewpage/ext_tables.php',
      'ext_icon' => 'ext_icon.png',
    ),
    'wizard_crpages' => 
    array (
      'type' => 'S',
      'siteRelPath' => 'typo3/sysext/wizard_crpages/',
      'typo3RelPath' => 'sysext/wizard_crpages/',
      'ext_tables.php' => '/var/www/virtual/loop/html/hostweb/typo3/sysext/wizard_crpages/ext_tables.php',
      'ext_icon' => 'ext_icon.png',
    ),
    'wizard_sortpages' => 
    array (
      'type' => 'S',
      'siteRelPath' => 'typo3/sysext/wizard_sortpages/',
      'typo3RelPath' => 'sysext/wizard_sortpages/',
      'ext_tables.php' => '/var/www/virtual/loop/html/hostweb/typo3/sysext/wizard_sortpages/ext_tables.php',
      'ext_icon' => 'ext_icon.png',
    ),
    'toctoc_comments' => 
    array (
      'type' => 'L',
      'siteRelPath' => 'typo3conf/ext/toctoc_comments/',
      'typo3RelPath' => '../typo3conf/ext/toctoc_comments/',
      'ext_localconf.php' => '/var/www/virtual/loop/html/hostweb/typo3conf/ext/toctoc_comments/ext_localconf.php',
      'ext_tables.php' => '/var/www/virtual/loop/html/hostweb/typo3conf/ext/toctoc_comments/ext_tables.php',
      'ext_tables.sql' => '/var/www/virtual/loop/html/hostweb/typo3conf/ext/toctoc_comments/ext_tables.sql',
      'ext_tables_static+adt.sql' => '/var/www/virtual/loop/html/hostweb/typo3conf/ext/toctoc_comments/ext_tables_static+adt.sql',
      'ext_icon' => 'ext_icon.gif',
    ),
    'rn_base' => 
    array (
      'type' => 'L',
      'siteRelPath' => 'typo3conf/ext/rn_base/',
      'typo3RelPath' => '../typo3conf/ext/rn_base/',
      'ext_localconf.php' => '/var/www/virtual/loop/html/hostweb/typo3conf/ext/rn_base/ext_localconf.php',
      'ext_icon' => 'ext_icon.gif',
    ),
    't3socials' => 
    array (
      'type' => 'L',
      'siteRelPath' => 'typo3conf/ext/t3socials/',
      'typo3RelPath' => '../typo3conf/ext/t3socials/',
      'ext_localconf.php' => '/var/www/virtual/loop/html/hostweb/typo3conf/ext/t3socials/ext_localconf.php',
      'ext_tables.php' => '/var/www/virtual/loop/html/hostweb/typo3conf/ext/t3socials/ext_tables.php',
      'ext_tables.sql' => '/var/www/virtual/loop/html/hostweb/typo3conf/ext/t3socials/ext_tables.sql',
      'ext_icon' => 'ext_icon.gif',
    ),
    't3_tcpdf' => 
    array (
      'type' => 'L',
      'siteRelPath' => 'typo3conf/ext/t3_tcpdf/',
      'typo3RelPath' => '../typo3conf/ext/t3_tcpdf/',
      'ext_icon' => 'ext_icon.gif',
    ),
    't3_less' => 
    array (
      'type' => 'L',
      'siteRelPath' => 'typo3conf/ext/t3_less/',
      'typo3RelPath' => '../typo3conf/ext/t3_less/',
      'ext_localconf.php' => '/var/www/virtual/loop/html/hostweb/typo3conf/ext/t3_less/ext_localconf.php',
      'ext_tables.php' => '/var/www/virtual/loop/html/hostweb/typo3conf/ext/t3_less/ext_tables.php',
      'ext_icon' => 'ext_icon.gif',
    ),
    'static_info_tables' => 
    array (
      'type' => 'L',
      'siteRelPath' => 'typo3conf/ext/static_info_tables/',
      'typo3RelPath' => '../typo3conf/ext/static_info_tables/',
      'ext_localconf.php' => '/var/www/virtual/loop/html/hostweb/typo3conf/ext/static_info_tables/ext_localconf.php',
      'ext_tables.php' => '/var/www/virtual/loop/html/hostweb/typo3conf/ext/static_info_tables/ext_tables.php',
      'ext_tables.sql' => '/var/www/virtual/loop/html/hostweb/typo3conf/ext/static_info_tables/ext_tables.sql',
      'ext_tables_static+adt.sql' => '/var/www/virtual/loop/html/hostweb/typo3conf/ext/static_info_tables/ext_tables_static+adt.sql',
      'ext_icon' => 'ext_icon.gif',
    ),
    'static_info_tables_de' => 
    array (
      'type' => 'L',
      'siteRelPath' => 'typo3conf/ext/static_info_tables_de/',
      'typo3RelPath' => '../typo3conf/ext/static_info_tables_de/',
      'ext_localconf.php' => '/var/www/virtual/loop/html/hostweb/typo3conf/ext/static_info_tables_de/ext_localconf.php',
      'ext_tables.sql' => '/var/www/virtual/loop/html/hostweb/typo3conf/ext/static_info_tables_de/ext_tables.sql',
      'ext_tables_static+adt.sql' => '/var/www/virtual/loop/html/hostweb/typo3conf/ext/static_info_tables_de/ext_tables_static+adt.sql',
      'ext_icon' => 'ext_icon.gif',
    ),
    'sourceopt' => 
    array (
      'type' => 'L',
      'siteRelPath' => 'typo3conf/ext/sourceopt/',
      'typo3RelPath' => '../typo3conf/ext/sourceopt/',
      'ext_localconf.php' => '/var/www/virtual/loop/html/hostweb/typo3conf/ext/sourceopt/ext_localconf.php',
      'ext_typoscript_constants.txt' => '/var/www/virtual/loop/html/hostweb/typo3conf/ext/sourceopt/ext_typoscript_constants.txt',
      'ext_typoscript_setup.txt' => '/var/www/virtual/loop/html/hostweb/typo3conf/ext/sourceopt/ext_typoscript_setup.txt',
      'ext_icon' => 'ext_icon.png',
    ),
    'source_publisher' => 
    array (
      'type' => 'L',
      'siteRelPath' => 'typo3conf/ext/source_publisher/',
      'typo3RelPath' => '../typo3conf/ext/source_publisher/',
      'ext_localconf.php' => '/var/www/virtual/loop/html/hostweb/typo3conf/ext/source_publisher/ext_localconf.php',
      'ext_tables.php' => '/var/www/virtual/loop/html/hostweb/typo3conf/ext/source_publisher/ext_tables.php',
      'ext_tables.sql' => '/var/www/virtual/loop/html/hostweb/typo3conf/ext/source_publisher/ext_tables.sql',
      'ext_icon' => 'ext_icon.gif',
    ),
    'realurl' => 
    array (
      'type' => 'L',
      'siteRelPath' => 'typo3conf/ext/realurl/',
      'typo3RelPath' => '../typo3conf/ext/realurl/',
      'ext_localconf.php' => '/var/www/virtual/loop/html/hostweb/typo3conf/ext/realurl/ext_localconf.php',
      'ext_tables.php' => '/var/www/virtual/loop/html/hostweb/typo3conf/ext/realurl/ext_tables.php',
      'ext_tables.sql' => '/var/www/virtual/loop/html/hostweb/typo3conf/ext/realurl/ext_tables.sql',
      'ext_icon' => 'ext_icon.gif',
    ),
    'powermail' => 
    array (
      'type' => 'L',
      'siteRelPath' => 'typo3conf/ext/powermail/',
      'typo3RelPath' => '../typo3conf/ext/powermail/',
      'ext_localconf.php' => '/var/www/virtual/loop/html/hostweb/typo3conf/ext/powermail/ext_localconf.php',
      'ext_tables.php' => '/var/www/virtual/loop/html/hostweb/typo3conf/ext/powermail/ext_tables.php',
      'ext_tables.sql' => '/var/www/virtual/loop/html/hostweb/typo3conf/ext/powermail/ext_tables.sql',
      'ext_typoscript_setup.txt' => '/var/www/virtual/loop/html/hostweb/typo3conf/ext/powermail/ext_typoscript_setup.txt',
      'ext_icon' => 'ext_icon.svg',
    ),
    'newsletter' => 
    array (
      'type' => 'L',
      'siteRelPath' => 'typo3conf/ext/newsletter/',
      'typo3RelPath' => '../typo3conf/ext/newsletter/',
      'ext_localconf.php' => '/var/www/virtual/loop/html/hostweb/typo3conf/ext/newsletter/ext_localconf.php',
      'ext_tables.php' => '/var/www/virtual/loop/html/hostweb/typo3conf/ext/newsletter/ext_tables.php',
      'ext_tables.sql' => '/var/www/virtual/loop/html/hostweb/typo3conf/ext/newsletter/ext_tables.sql',
      'ext_icon' => 'ext_icon.gif',
    ),
    'news' => 
    array (
      'type' => 'L',
      'siteRelPath' => 'typo3conf/ext/news/',
      'typo3RelPath' => '../typo3conf/ext/news/',
      'ext_localconf.php' => '/var/www/virtual/loop/html/hostweb/typo3conf/ext/news/ext_localconf.php',
      'ext_tables.php' => '/var/www/virtual/loop/html/hostweb/typo3conf/ext/news/ext_tables.php',
      'ext_tables.sql' => '/var/www/virtual/loop/html/hostweb/typo3conf/ext/news/ext_tables.sql',
      'ext_typoscript_setup.txt' => '/var/www/virtual/loop/html/hostweb/typo3conf/ext/news/ext_typoscript_setup.txt',
      'ext_icon' => 'ext_icon.gif',
    ),
    'news_ttnewsimport' => 
    array (
      'type' => 'L',
      'siteRelPath' => 'typo3conf/ext/news_ttnewsimport/',
      'typo3RelPath' => '../typo3conf/ext/news_ttnewsimport/',
      'ext_localconf.php' => '/var/www/virtual/loop/html/hostweb/typo3conf/ext/news_ttnewsimport/ext_localconf.php',
      'ext_tables.php' => '/var/www/virtual/loop/html/hostweb/typo3conf/ext/news_ttnewsimport/ext_tables.php',
      'ext_tables.sql' => '/var/www/virtual/loop/html/hostweb/typo3conf/ext/news_ttnewsimport/ext_tables.sql',
      'ext_icon' => 'ext_icon.gif',
    ),
    'metaseo' => 
    array (
      'type' => 'L',
      'siteRelPath' => 'typo3conf/ext/metaseo/',
      'typo3RelPath' => '../typo3conf/ext/metaseo/',
      'ext_localconf.php' => '/var/www/virtual/loop/html/hostweb/typo3conf/ext/metaseo/ext_localconf.php',
      'ext_tables.php' => '/var/www/virtual/loop/html/hostweb/typo3conf/ext/metaseo/ext_tables.php',
      'ext_tables.sql' => '/var/www/virtual/loop/html/hostweb/typo3conf/ext/metaseo/ext_tables.sql',
      'ext_icon' => 'ext_icon.png',
    ),
    'iconfont' => 
    array (
      'type' => 'L',
      'siteRelPath' => 'typo3conf/ext/iconfont/',
      'typo3RelPath' => '../typo3conf/ext/iconfont/',
      'ext_localconf.php' => '/var/www/virtual/loop/html/hostweb/typo3conf/ext/iconfont/ext_localconf.php',
      'ext_tables.php' => '/var/www/virtual/loop/html/hostweb/typo3conf/ext/iconfont/ext_tables.php',
      'ext_tables.sql' => '/var/www/virtual/loop/html/hostweb/typo3conf/ext/iconfont/ext_tables.sql',
      'ext_icon' => 'ext_icon.gif',
    ),
    'google_auth' => 
    array (
      'type' => 'L',
      'siteRelPath' => 'typo3conf/ext/google_auth/',
      'typo3RelPath' => '../typo3conf/ext/google_auth/',
      'ext_localconf.php' => '/var/www/virtual/loop/html/hostweb/typo3conf/ext/google_auth/ext_localconf.php',
      'ext_tables.php' => '/var/www/virtual/loop/html/hostweb/typo3conf/ext/google_auth/ext_tables.php',
      'ext_tables.sql' => '/var/www/virtual/loop/html/hostweb/typo3conf/ext/google_auth/ext_tables.sql',
      'ext_icon' => 'ext_icon.gif',
    ),
    'df_foundation5' => 
    array (
      'type' => 'L',
      'siteRelPath' => 'typo3conf/ext/df_foundation5/',
      'typo3RelPath' => '../typo3conf/ext/df_foundation5/',
      'ext_localconf.php' => '/var/www/virtual/loop/html/hostweb/typo3conf/ext/df_foundation5/ext_localconf.php',
      'ext_tables.php' => '/var/www/virtual/loop/html/hostweb/typo3conf/ext/df_foundation5/ext_tables.php',
      'ext_tables.sql' => '/var/www/virtual/loop/html/hostweb/typo3conf/ext/df_foundation5/ext_tables.sql',
      'ext_icon' => 'ext_icon.png',
    ),
    'devtools' => 
    array (
      'type' => 'L',
      'siteRelPath' => 'typo3conf/ext/devtools/',
      'typo3RelPath' => '../typo3conf/ext/devtools/',
      'ext_localconf.php' => '/var/www/virtual/loop/html/hostweb/typo3conf/ext/devtools/ext_localconf.php',
      'ext_icon' => 'ext_icon.gif',
    ),
    'dev_null_geshi' => 
    array (
      'type' => 'L',
      'siteRelPath' => 'typo3conf/ext/dev_null_geshi/',
      'typo3RelPath' => '../typo3conf/ext/dev_null_geshi/',
      'ext_localconf.php' => '/var/www/virtual/loop/html/hostweb/typo3conf/ext/dev_null_geshi/ext_localconf.php',
      'ext_tables.php' => '/var/www/virtual/loop/html/hostweb/typo3conf/ext/dev_null_geshi/ext_tables.php',
      'ext_icon' => 'ext_icon.gif',
    ),
    'crawler' => 
    array (
      'type' => 'L',
      'siteRelPath' => 'typo3conf/ext/crawler/',
      'typo3RelPath' => '../typo3conf/ext/crawler/',
      'ext_localconf.php' => '/var/www/virtual/loop/html/hostweb/typo3conf/ext/crawler/ext_localconf.php',
      'ext_tables.php' => '/var/www/virtual/loop/html/hostweb/typo3conf/ext/crawler/ext_tables.php',
      'ext_tables.sql' => '/var/www/virtual/loop/html/hostweb/typo3conf/ext/crawler/ext_tables.sql',
      'ext_icon' => 'ext_icon.gif',
    ),
    'cps_devlib' => 
    array (
      'type' => 'L',
      'siteRelPath' => 'typo3conf/ext/cps_devlib/',
      'typo3RelPath' => '../typo3conf/ext/cps_devlib/',
      'ext_localconf.php' => '/var/www/virtual/loop/html/hostweb/typo3conf/ext/cps_devlib/ext_localconf.php',
      'ext_icon' => 'ext_icon.gif',
    ),
    'cps_tcatree' => 
    array (
      'type' => 'L',
      'siteRelPath' => 'typo3conf/ext/cps_tcatree/',
      'typo3RelPath' => '../typo3conf/ext/cps_tcatree/',
      'ext_localconf.php' => '/var/www/virtual/loop/html/hostweb/typo3conf/ext/cps_tcatree/ext_localconf.php',
      'ext_tables.php' => '/var/www/virtual/loop/html/hostweb/typo3conf/ext/cps_tcatree/ext_tables.php',
      'ext_icon' => 'ext_icon.gif',
    ),
    'cps_searchhighlight' => 
    array (
      'type' => 'L',
      'siteRelPath' => 'typo3conf/ext/cps_searchhighlight/',
      'typo3RelPath' => '../typo3conf/ext/cps_searchhighlight/',
      'ext_localconf.php' => '/var/www/virtual/loop/html/hostweb/typo3conf/ext/cps_searchhighlight/ext_localconf.php',
      'ext_tables.php' => '/var/www/virtual/loop/html/hostweb/typo3conf/ext/cps_searchhighlight/ext_tables.php',
      'ext_icon' => 'ext_icon.gif',
    ),
    'roq_newsevent' => 
    array (
      'type' => 'L',
      'siteRelPath' => 'typo3conf/ext/roq_newsevent/',
      'typo3RelPath' => '../typo3conf/ext/roq_newsevent/',
      'ext_localconf.php' => '/var/www/virtual/loop/html/hostweb/typo3conf/ext/roq_newsevent/ext_localconf.php',
      'ext_tables.php' => '/var/www/virtual/loop/html/hostweb/typo3conf/ext/roq_newsevent/ext_tables.php',
      'ext_tables.sql' => '/var/www/virtual/loop/html/hostweb/typo3conf/ext/roq_newsevent/ext_tables.sql',
      'ext_icon' => 'ext_icon.gif',
    ),
    'cb_newscal' => 
    array (
      'type' => 'L',
      'siteRelPath' => 'typo3conf/ext/cb_newscal/',
      'typo3RelPath' => '../typo3conf/ext/cb_newscal/',
      'ext_localconf.php' => '/var/www/virtual/loop/html/hostweb/typo3conf/ext/cb_newscal/ext_localconf.php',
      'ext_tables.php' => '/var/www/virtual/loop/html/hostweb/typo3conf/ext/cb_newscal/ext_tables.php',
      'ext_typoscript_setup.txt' => '/var/www/virtual/loop/html/hostweb/typo3conf/ext/cb_newscal/ext_typoscript_setup.txt',
      'ext_icon' => 'ext_icon.gif',
    ),
    'cb_indexedsearch_autocomplete' => 
    array (
      'type' => 'L',
      'siteRelPath' => 'typo3conf/ext/cb_indexedsearch_autocomplete/',
      'typo3RelPath' => '../typo3conf/ext/cb_indexedsearch_autocomplete/',
      'ext_localconf.php' => '/var/www/virtual/loop/html/hostweb/typo3conf/ext/cb_indexedsearch_autocomplete/ext_localconf.php',
      'ext_tables.php' => '/var/www/virtual/loop/html/hostweb/typo3conf/ext/cb_indexedsearch_autocomplete/ext_tables.php',
      'ext_icon' => 'ext_icon.gif',
    ),
    'autoloader' => 
    array (
      'type' => 'L',
      'siteRelPath' => 'typo3conf/ext/autoloader/',
      'typo3RelPath' => '../typo3conf/ext/autoloader/',
      'ext_localconf.php' => '/var/www/virtual/loop/html/hostweb/typo3conf/ext/autoloader/ext_localconf.php',
      'ext_tables.php' => '/var/www/virtual/loop/html/hostweb/typo3conf/ext/autoloader/ext_tables.php',
      'ext_icon' => 'ext_icon.png',
    ),
    'calendarize' => 
    array (
      'type' => 'L',
      'siteRelPath' => 'typo3conf/ext/calendarize/',
      'typo3RelPath' => '../typo3conf/ext/calendarize/',
      'ext_localconf.php' => '/var/www/virtual/loop/html/hostweb/typo3conf/ext/calendarize/ext_localconf.php',
      'ext_tables.php' => '/var/www/virtual/loop/html/hostweb/typo3conf/ext/calendarize/ext_tables.php',
      'ext_icon' => 'ext_icon.png',
    ),
    'calendarize_news' => 
    array (
      'type' => 'L',
      'siteRelPath' => 'typo3conf/ext/calendarize_news/',
      'typo3RelPath' => '../typo3conf/ext/calendarize_news/',
      'ext_localconf.php' => '/var/www/virtual/loop/html/hostweb/typo3conf/ext/calendarize_news/ext_localconf.php',
      'ext_tables.php' => '/var/www/virtual/loop/html/hostweb/typo3conf/ext/calendarize_news/ext_tables.php',
      'ext_icon' => 'ext_icon.png',
    ),
    'ajaxpagepreloader' => 
    array (
      'type' => 'L',
      'siteRelPath' => 'typo3conf/ext/ajaxpagepreloader/',
      'typo3RelPath' => '../typo3conf/ext/ajaxpagepreloader/',
      'ext_tables.php' => '/var/www/virtual/loop/html/hostweb/typo3conf/ext/ajaxpagepreloader/ext_tables.php',
      'ext_tables.sql' => '/var/www/virtual/loop/html/hostweb/typo3conf/ext/ajaxpagepreloader/ext_tables.sql',
      'ext_icon' => 'ext_icon.gif',
    ),
  ),
  'packageObjectsCacheEntryIdentifier' => 'PackageObjects_55a82d1a15769832733412',
);
#