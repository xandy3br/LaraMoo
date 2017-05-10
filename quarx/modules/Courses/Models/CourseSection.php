<?php

namespace Quarx\Modules\Courses\Models;

use Yab\Quarx\Models\QuarxModel;

class CourseSection extends QuarxModel
{
    public $table = "course_sections";

    public $primaryKey = "id";

    public $timestamps = true;

    public $fillable = [
        // Course table data
    ];

    public static $rules = [
        // create rules
    ];

    
    
    
}
