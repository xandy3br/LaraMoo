<?php

namespace Quarx\Modules\Courses\Models;

use Yab\Quarx\Models\QuarxModel;

class Student extends QuarxModel
{
    public $table = "students";

    public $primaryKey = "id";

    public $timestamps = true;

    public $fillable = [
        // Course table data
       'categoryname', 'description', 'categoryparent', 'sortorder', 'visible' 
    ];

    public static $rules = [
        // create rules
      'categoryname' => 'required|max:255',
      'description' => 'sometimes',
      'categoryparent' => 'required|integer',
      'sortorder' => 'required|integer',
      'visible' => 'sometimes|integer'
    ];

    
    
    
}
