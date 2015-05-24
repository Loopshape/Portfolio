<?php namespace Loopshape\Loopcode\Models;

use Model;

/**
 * Feature Model
 */
class Feature extends Model
{

    /**
     * @var string The database table used by the model.
     */
    public $table = 'loopshape_loopcode_features';

    /**
     * @var array Guarded fields
     */
    protected $guarded = ['*'];

    /**
     * @var array Fillable fields
     */
    protected $fillable = [];

    /**
     * @var array Relations
     */
    public $hasOne = [];
    public $hasMany = [];
    public $belongsTo = [];
    public $belongsToMany = [];
    public $morphTo = [];
    public $morphOne = [];
    public $morphMany = [];
    public $attachOne = [];
    public $attachMany = [];

}