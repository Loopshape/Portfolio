<?php

namespace Loopshape\Searchindex;

    use Backend\Classes\ReportWidgetBase;
    use Backend\Facades\BackendAuth;
    use \Loopshape\Searchindex\Models\Article;

    class SearchindexWidget extends ReportWidgetBase
    {

        public function render()
        {
            $articles = BackendAuth::getUser() -> articles;

            return $this -> makePartial('articles', ['articles' => $articles]);
        }

        public function defineProperties()
        {
            return ['title' => ['title' => 'Widget title', 'default' => 'QUICK ARTICLE'], 'showList' => ['title' => 'Show articles', 'type' => 'checkbox']];
        }

    }
