<?php

namespace Quarx\Modules\Courses\Models;

use Yab\Quarx\Models\QuarxModel;

class CourseCategory extends Model
{
    public $table = "course_categorys";

    public $primaryKey = "id";

    public $timestamps = true;

    public $fillable = [
        // Course table data
       'category_name', 'description', 'category_parent', 'sortorder', 'visible' 
    ];

    public static $rules = [
        // create rules
        
    ];

    
    
    
}
