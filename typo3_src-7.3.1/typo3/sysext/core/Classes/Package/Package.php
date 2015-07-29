<?php
namespace TYPO3\CMS\Core\Package;

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

/**
 * A Package representing the details of an extension and/or a composer package
 * Adapted from FLOW for TYPO3 CMS
 */
class Package implements PackageInterface {

	/**
	 * @var array
	 */
	protected $extensionManagerConfiguration = array();

	/**
	 * @var array
	 */
	protected $classAliases;

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
	 * Unique key of this package.
	 * @var string
	 */
	protected $packageKey;

	/**
	 * Full path to this package's main directory
	 * @var string
	 */
	protected $packagePath;

	/**
	 * If this package is protected and therefore cannot be deactivated or deleted
	 * @var bool
	 */
	protected $protected = FALSE;

	/**
	 * @var \stdClass
	 */
	protected $composerManifest;

	/**
	 * Meta information about this package
	 * @var MetaData
	 */
	protected $packageMetaData;

	/**
	 * The namespace of the classes contained in this package
	 * @var string
	 */
	protected $namespace;

	/**
	 * @var PackageManager
	 */
	protected $packageManager;

	/**
	 * Constructor
	 *
	 * @param PackageManager $packageManager the package manager which knows this package
	 * @param string $packageKey Key of this package
	 * @param string $packagePath Absolute path to the location of the package's composer manifest
	 * @throws Exception\InvalidPackageKeyException if an invalid package key was passed
	 * @throws Exception\InvalidPackagePathException if an invalid package path was passed
	 * @throws Exception\InvalidPackageManifestException if no composer manifest file could be found
	 */
	public function __construct(PackageManager $packageManager, $packageKey, $packagePath) {
		if (!$packageManager->isPackageKeyValid($packageKey)) {
			throw new Exception\InvalidPackageKeyException('"' . $packageKey . '" is not a valid package key.', 1217959511);
		}
		if (!(@is_dir($packagePath) || (is_link($packagePath) && is_dir($packagePath)))) {
			throw new Exception\InvalidPackagePathException(sprintf('Tried to instantiate a package object for package "%s" with a non-existing package path "%s". Either the package does not exist anymore, or the code creating this object contains an error.', $packageKey, $packagePath), 1166631890);
		}
		if (substr($packagePath, -1, 1) !== '/') {
			throw new Exception\InvalidPackagePathException(sprintf('The package path "%s" provided for package "%s" has no trailing forward slash.', $packagePath, $packageKey), 1166633722);
		}
		$this->packageManager = $packageManager;
		$this->packageKey = $packageKey;
		$this->packagePath = $packagePath;
		try {
			$this->composerManifest = $this->packageManager->getComposerManifest($this->packagePath);
		} catch (Exception\MissingPackageManifestException $exception) {
			if (!$this->loadExtensionEmconf()) {
				throw new Exception\InvalidPackageManifestException('No valid ext_emconf.php file found for package "' . $packageKey . '".', 1360403545);
			}
		}
		$this->loadFlagsFromComposerManifest();
	}

	/**
	 * Loads package management related flags from the "extra:typo3/cms:Package" section
	 * of extensions composer.json files into local properties
	 *
	 * @return void
	 */
	protected function loadFlagsFromComposerManifest() {
		$extraFlags = $this->getValueFromComposerManifest('extra');
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
	 * Invokes custom PHP code directly after the package manager has been initialized.
	 *
	 * @param \TYPO3\CMS\Core\Core\Bootstrap $bootstrap The current bootstrap
	 * @return void
	 */
	public function boot(\TYPO3\CMS\Core\Core\Bootstrap $bootstrap) {
	}

	/**
	 * Returns the package key of this package.
	 *
	 * @return string
	 * @api
	 */
	public function getPackageKey() {
		return $this->packageKey;
	}

	/**
	 * Tells if this package is protected and therefore cannot be deactivated or deleted
	 *
	 * @return bool
	 * @api
	 */
	public function isProtected() {
		return $this->protected;
	}

	/**
	 * Sets the protection flag of the package
	 *
	 * @param bool $protected TRUE if the package should be protected, otherwise FALSE
	 * @return void
	 * @api
	 */
	public function setProtected($protected) {
		$this->protected = (bool)$protected;
	}

	/**
	 * Returns the full path to this package's main directory
	 *
	 * @return string Path to this package's main directory
	 * @api
	 */
	public function getPackagePath() {
		return $this->packagePath;
	}

	/**
	 * Returns the full path to this package's Classes directory
	 *
	 * @return string Path to this package's Classes directory
	 * @api
	 */
	public function getClassesPath() {
		return $this->packagePath . self::DIRECTORY_CLASSES;
	}

	/**
	 * Returns the full path to this package's Resources directory
	 *
	 * @return string Path to this package's Resources directory
	 * @api
	 */
	public function getResourcesPath() {
		return $this->packagePath . self::DIRECTORY_RESOURCES;
	}

	/**
	 * Returns the full path to this package's Configuration directory
	 *
	 * @return string Path to this package's Configuration directory
	 * @api
	 */
	public function getConfigurationPath() {
		return $this->packagePath . self::DIRECTORY_CONFIGURATION;
	}

	/**
	 * Fetches MetaData information from ext_emconf.php, used for resolving dependencies as well
	 * @return bool
	 */
	protected function loadExtensionEmconf() {
		$_EXTKEY = $this->packageKey;
		$path = $this->packagePath . 'ext_emconf.php';
		$EM_CONF = NULL;
		if (@file_exists($path)) {
			include $path;
			if (is_array($EM_CONF[$_EXTKEY])) {
				$this->extensionManagerConfiguration = $EM_CONF[$_EXTKEY];
				$this->mapExtensionManagerConfigurationToComposerManifest();
				return TRUE;
			}
		}
		return FALSE;
	}

	/**
	 * Fetches information from ext_emconf.php and maps it so it is treated as it would come from composer.json
	 *
	 * @return void
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
			if (isset($extensionManagerConfiguration['constraints']['suggests']) && is_array($extensionManagerConfiguration['constraints']['suggests'])) {
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
	 * @return MetaData
	 */
	public function getPackageMetaData() {
		if ($this->packageMetaData === NULL) {
			$this->packageMetaData = new MetaData($this->getPackageKey());
			$this->packageMetaData->setDescription($this->getValueFromComposerManifest('description'));
			$this->packageMetaData->setVersion($this->getValueFromComposerManifest('version'));
			$requirements = $this->getValueFromComposerManifest('require');
			if ($requirements !== NULL) {
				foreach ($requirements as $requirement => $version) {
					if ($this->packageRequirementIsComposerPackage($requirement) === FALSE) {
						// Skip non-package requirements
						continue;
					}
					$packageKey = $this->packageManager->getPackageKeyFromComposerName($requirement);
					$constraint = new MetaData\PackageConstraint(MetaData::CONSTRAINT_TYPE_DEPENDS, $packageKey);
					$this->packageMetaData->addConstraint($constraint);
				}
			}
			$suggestions = $this->getValueFromComposerManifest('suggest');
			if ($suggestions !== NULL) {
				foreach ($suggestions as $suggestion => $version) {
					if ($this->packageRequirementIsComposerPackage($suggestion) === FALSE) {
						// Skip non-package requirements
						continue;
					}
					$packageKey = $this->packageManager->getPackageKeyFromComposerName($suggestion);
					$constraint = new MetaData\PackageConstraint(MetaData::CONSTRAINT_TYPE_SUGGESTS, $packageKey);
					$this->packageMetaData->addConstraint($constraint);
				}
			}
		}
		return $this->packageMetaData;
	}

	/**
	 * Returns an array of packages this package replaces
	 *
	 * @return array
	 */
	public function getPackageReplacementKeys() {
		// The cast to array is required since the manifest returns data with type mixed
		return (array)$this->getValueFromComposerManifest('replace') ?: array();
	}

	/**
	 * Returns the PHP namespace of classes in this package, also uses a fallback for extensions without having a "."
	 * in the package key.
	 *
	 * @return string
	 */
	public function getNamespace() {
		if (!$this->namespace) {
			$packageKey = $this->getPackageKey();
			if (strpos($packageKey, '.') === FALSE) {
				// Old school with unknown vendor name
				$this->namespace =  '*\\' . \TYPO3\CMS\Core\Utility\GeneralUtility::underscoredToUpperCamelCase($packageKey);
			} else {
				$this->namespace = str_replace('.', '\\', $packageKey);
			}
		}
		return $this->namespace;
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
	 * Fetches class aliases registered via Migrations/Code/ClassAliasMap.php
	 *
	 * @return array
	 */
	public function getClassAliases() {
		if (!is_array($this->classAliases)) {
			try {
				$extensionClassAliasMapPathAndFilename = $this->packagePath . 'Migrations/Code/ClassAliasMap.php';
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

	/**
	 * Returns contents of Composer manifest - or part there of if a key is given.
	 *
	 * @param string $key Optional. Only return the part of the manifest indexed by 'key'
	 * @return mixed|NULL
	 * @see json_decode for return values
	 */
	public function getValueFromComposerManifest($key = NULL) {
		if ($key === NULL) {
			return $this->composerManifest;
		}

		if (isset($this->composerManifest->{$key})) {
			$value = $this->composerManifest->{$key};
		} else {
			$value = NULL;
		}
		return $value;
	}

	/**
	 * Added by TYPO3 CMS
	 *
	 * The package caching serializes package objects.
	 * The package manager instance may not be serialized
	 * as a fresh instance is created upon every request.
	 *
	 * This method will be removed once the package is
	 * released of the package manager dependency.
	 *
	 * @return array
	 */
	public function __sleep() {
		$properties = get_class_vars(get_class($this));
		unset($properties['packageManager']);
		return array_keys($properties);
	}

	/**
	 * Added by TYPO3 CMS
	 *
	 * The package caching deserializes package objects.
	 * A fresh package manager instance has to be set
	 * during bootstrapping.
	 *
	 * This method will be removed once the package is
	 * released of the package manager dependency.
	 */
	public function __wakeup() {
		if (isset($GLOBALS['TYPO3_currentPackageManager'])) {
			$this->packageManager = $GLOBALS['TYPO3_currentPackageManager'];
		}
	}
}
