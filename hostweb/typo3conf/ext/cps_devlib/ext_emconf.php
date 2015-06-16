<?php

/* * *************************************************************
 * Extension Manager/Repository config file for ext "cps_devlib".
 *
 * Auto generated 13-01-2014 22:25
 *
 * Manual updates:
 * Only the data in the array - everything else is removed by next
 * writing. "version" and "dependencies" must not be touched!
 * ************************************************************* */

$EM_CONF[ $_EXTKEY ] = array(
  'title' => 'Developer library [FIXED for TYPO3 6.2]',
  'description' => 'Provides new functions used by CPS-IT (cps_*) extensions. May also be useful to any other extension developer. See manual for more information.',
  'category' => 'misc',
  'shy' => 0,
  'version' => '0.9.1',
  'dependencies' => '',
  'conflicts' => '',
  'priority' => '',
  'loadOrder' => '',
  'module' => '',
  'state' => 'stable',
  'uploadfolder' => 0,
  'createDirs' => '',
  'modify_tables' => '',
  'clearcacheonload' => 0,
  'lockType' => '',
  'author' => 'Nicole Cordes',
  'author_email' => 'cordes@cps-it.de',
  'author_company' => 'CPS-IT GmbH (http://www.cps-it.de)',
  'CGLcompliance' => NULL,
  'CGLcompliance_note' => NULL,
  'constraints' =>
  array(
    'depends' =>
    array(
      'php' => '5.0.0-0.0.0',
      // #62029, dwildt, 1+
      'typo3' => '4.5.0-6.2.99',
    ),
    'conflicts' =>
    array(
    ),
    'suggests' =>
    array(
    ),
  ),
);
?>