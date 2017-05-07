<?php

namespace Bgies\LaramooFront\Models\Courses;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'courses';

    /**
     * Fillable fields
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'label',
        'permissions'
    ];

    /**
     * Rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required|unique:roles',
        'label' => 'required'
    ];


}
