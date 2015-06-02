<?php namespace Loopshape\Loopcode\Controllers;

use BackendMenu;
use Backend\Classes\Controller;

/**
 * Base Back-end Controller
 */
class Base extends Controller
{
    public $implement = [
        'Backend.Behaviors.FormController',
        'Backend.Behaviors.ListController'
    ];

    public $formConfig = 'config_form.yaml';
    public $listConfig = 'config_list.yaml';

    public function __construct()
    {
        parent::__construct();

        BackendMenu::setContext('Loopshape.Loopcode', 'loopcode', 'base');
    }
}