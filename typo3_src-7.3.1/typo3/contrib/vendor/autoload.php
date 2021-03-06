<?php

// autoload.php @generated by Composer

require_once __DIR__ . '/composer' . '/autoload_real.php';




// autoload.php @generated by Helhum/ClassAliasLoader

return call_user_func(function() {
	$composerClassLoader = ComposerAutoloaderInite5e8dcbf944705befda51093825c3f31::getLoader();
	$aliasClassLoader = new Helhum\ClassAliasLoader\Composer\ClassAliasLoader($composerClassLoader);

	$classAliasMap = require __DIR__ . '/composer/autoload_classaliasmap.php';
	$aliasClassLoader->setAliasMap($classAliasMap);
	$aliasClassLoader->setCaseSensitiveClassLoading(true);
	spl_autoload_register(array($aliasClassLoader, 'loadClassWithAlias'), true, true);

	return $aliasClassLoader;
});
