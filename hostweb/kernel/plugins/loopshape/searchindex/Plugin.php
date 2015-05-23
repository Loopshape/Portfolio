<?php namespace Loopshape\Searchindex;

use Backend\Models\User;
use System\Classes\PluginBase;

/**
 * blogWidget Plugin Information File
 */
class Plugin extends PluginBase
{

    public function pluginDetails()
    {
        return [
            'name'        => 'WebDev-Article Widget',
            'description' => 'Add and manage web development articles.',
            'author'      => 'Arjuna Noorsanto',
            'icon'        => 'icon-pencil'
        ];
    }

    public function registerReportWidgets()
    {
        return [
            'Loopshape\Searchindex\SearchindexWidget' => [
                'label'     => 'Quick Articles',
                'context'   => 'dashboard'
            ]
        ];
    }

    public function boot()
    {
        User::extend(function($model){
            $model->hasMany['Articles'] = ['Loopshape\Searchindex\Models\Article'];
        });
    }

}
