<?php namespace Indikator\Backend;

use System\Classes\PluginBase;
use Backend\Classes\Controller as BackendController;
use Event;
use Backend;
use BackendAuth;
use Backend\Models\UserPreferences;
use BackendMenu;

class Plugin extends PluginBase
{
    public $elevated = true;

    public function pluginDetails()
    {
        return [
            'name'        => 'indikator.backend::lang.plugin.name',
            'description' => 'indikator.backend::lang.plugin.description',
            'author'      => 'indikator.backend::lang.plugin.author',
            'homepage'    => 'https://github.com/gergo85/oc-backend-plus'
        ];
    }

    public function registerReportWidgets()
    {
        return [
            'Indikator\Backend\ReportWidgets\Status' => [
                'label'   => 'indikator.backend::lang.widgets.system.title',
                'context' => 'dashboard'
            ],
            'Indikator\Backend\ReportWidgets\Version' => [
                'label'   => 'indikator.backend::lang.widgets.version.title',
                'context' => 'dashboard'
            ],
            'Indikator\Backend\ReportWidgets\Logs' => [
                'label'   => 'indikator.backend::lang.widgets.logs.title',
                'context' => 'dashboard'
            ],
            'Indikator\Backend\ReportWidgets\Admins' => [
                'label'   => 'indikator.backend::lang.widgets.admins.title',
                'context' => 'dashboard'
            ],
            'Indikator\Backend\ReportWidgets\Logins' => [
                'label'   => 'indikator.backend::lang.widgets.logins.title',
                'context' => 'dashboard'
            ],
            'Indikator\Backend\ReportWidgets\Server' => [
                'label'   => 'indikator.backend::lang.widgets.server.title',
                'context' => 'dashboard'
            ],
            'Indikator\Backend\ReportWidgets\Php' => [
                'label'   => 'indikator.backend::lang.widgets.php.title',
                'context' => 'dashboard'
            ],
            'Indikator\Backend\ReportWidgets\Rss' => [
                'label'   => 'indikator.backend::lang.widgets.rss.title',
                'context' => 'dashboard'
            ],
            'Indikator\Backend\ReportWidgets\Images' => [
                'label'   => 'indikator.backend::lang.widgets.images.title',
                'context' => 'dashboard'
            ]
        ];
    }

    public function registerComponents()
    {
        return [
            'Indikator\Backend\Components\Image' => 'image',
            'Indikator\Backend\Components\Text'  => 'text'
        ];
    }

    public function boot()
    {
        Event::listen('backend.form.extendFields', function($form)
        {
            if ($form->model instanceof Backend\Models\BackendPreferences)
            {
                $form->addFields([
                    'focus_searchfield' => [
                        'label'   => 'indikator.backend::lang.settings.search_label',
                        'type'    => 'switch',
                        'span'    => 'left',
                        'default' => 'false',
                        'comment' => 'indikator.backend::lang.settings.search_comment'
                    ],
                    'sidebar_description' => [
                        'label'   => 'indikator.backend::lang.settings.sidebar_label',
                        'type'    => 'switch',
                        'span'    => 'right',
                        'default' => 'false',
                        'comment' => 'indikator.backend::lang.settings.sidebar_comment'
                    ],
                    'rounded_avatar' => [
                        'label'   => 'indikator.backend::lang.settings.avatar_label',
                        'type'    => 'switch',
                        'span'    => 'left',
                        'default' => 'false',
                        'comment' => 'indikator.backend::lang.settings.avatar_comment'
                    ],
                    'virtual_keyboard' => [
                        'label'   => 'indikator.backend::lang.settings.keyboard_label',
                        'type'    => 'switch',
                        'span'    => 'right',
                        'default' => 'false',
                        'comment' => 'indikator.backend::lang.settings.keyboard_comment'
                    ],
                    'media_menu' => [
                        'label'   => 'indikator.backend::lang.settings.media_label',
                        'type'    => 'switch',
                        'span'    => 'left',
                        'default' => 'false',
                        'comment' => 'indikator.backend::lang.settings.media_comment'
                    ],
                    'more_themes' => [
                        'label'   => 'indikator.backend::lang.settings.themes_label',
                        'type'    => 'switch',
                        'span'    => 'right',
                        'default' => 'false',
                        'comment' => 'indikator.backend::lang.settings.themes_comment'
                    ]
                ]);
            }
        });

        BackendController::extend(function($controller)
        {
            if (BackendAuth::check())
            {
                $preferences = UserPreferences::forUser()->get('backend::backend.preferences');

                if (isset($preferences['focus_searchfield']) && $preferences['focus_searchfield'])
                {
                    $controller->addJs('/plugins/indikator/backend/assets/js/setting-search.js');
                }

                if (isset($preferences['rounded_avatar']) && $preferences['rounded_avatar'])
                {
                    $controller->addCss('/plugins/indikator/backend/assets/css/rounded-avatar.css');
                }

                if (isset($preferences['virtual_keyboard']) && $preferences['virtual_keyboard'])
                {
                    $controller->addCss('/plugins/indikator/backend/assets/css/ml-keyboard.css');
                    $controller->addJs('/plugins/indikator/backend/assets/js/ml-keyboard.js');
                }

                if (isset($preferences['media_menu']) && $preferences['media_menu'])
                {
                    $controller->addCss('/plugins/indikator/backend/assets/css/media-menu.css');
                }

                if (isset($preferences['more_themes']) && $preferences['more_themes'])
                {
                    $controller->addJs('/plugins/indikator/backend/assets/js/setting-theme.js');
                }
            }
        });

        BackendMenu::registerContextSidenavPartial(
            'October.System',
            'system',
            '~/plugins/indikator/backend/partials/_system_sidebar.htm'
        );
    }
}
