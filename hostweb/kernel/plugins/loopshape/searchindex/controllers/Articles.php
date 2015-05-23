<?php namespace Loopshape\Searchindex\Controllers;

use Backend\Facades\BackendAuth;
use Backend\Facades\Backend;
use BackendMenu;
use Backend\Classes\Controller;
use \Loopshape\Searchindex\Models\Article;
use Illuminate\Support\Facades\Input;
use \Loopshape\Searchindex\Models;
use Loopshape\Searchindex\Plugin;
use System\Classes\PluginManager;

/**
 * Articles Back-end Controller
 */
class Articles extends Controller
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

        $this->pageTitle = 'Manage Quick Articles';

        //BackendMenu::setContext('Loopshape.Searchindex', 'Searchindex', 'Articles');
    }

    public function store(){
        $Article = new Models\Article;
        $Article->title = Input::get('title');
        $Article->description = Input::get('description', null);
        $Article->user_id = BackendAuth::getUser()->id;

        if( $Article->save() ) {
            \Flash::success('Article added successfully.');
        }
        else{
            $messages = array_flatten( $Article->errors()->getMessages() );
            $errors = implode( ' - ', $messages );

            \Flash::error('Validation error: ' . $errors );
        }

        return \Redirect::to( Backend::url() );
    }

    public function formBeforeCreate($model){
        $model->user_id = BackendAuth::getUser()->id;
    }

    public function index(){
        $this->makeLists();
        $this->makeView('index');
    }

    // filtering Articles by user, use also @listExtendQueryBefore
    public function listExtendQueryBefore($query){
        $user_id = BackendAuth::getUser()->id;

        $query->where('user_id', '=', $user_id);
    }

    public function listOverrideColumnValue($record, $columnName){
        if( $columnName == "description" && empty($record->description) )
            return "[EMPTY]";
    }

    // or you can name it index_onDelete
    public function onDelete()
    {
        $user_id = BackendAuth::getUser()->id;
        $Articles = post("Articles");

        Article::whereIn('id', $Articles)->where('user_id', '=', $user_id)->delete();

        \Flash::success('Articles Successfully deleted.');

        return $this->listRefresh();
    }

}