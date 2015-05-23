<?php

namespace Loopshape\Searchindex\Models;

    use Model;

    /**
     * note Model
     */
    class Article extends Model
    {
        // will be used for automatic validation using the defined rules
        use \October\Rain\Database\Traits\Validation;

        public $table = 'loopshape_searchindex_articles';

        protected $guarded = ['*'];

        protected $rules = ['title' => 'required|min:4'];

        protected $throwOnValidation = false;

        public $belongsTo = ['user' => ['Backend\Models\User']];

    }
