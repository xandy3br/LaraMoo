<?php

namespace Quarx\Modules\Courses\Models;

use Yab\Quarx\Models\QuarxModel;

class CourseSection extends QuarxModel
{
    public $table = "course_sections";

    public $primaryKey = "id";

    public $timestamps = true;

    public $fillable = [
       'course_id', 'courseorder', 'sectionname', 'sectionshortdescription',
       'sectiondescription', 'visible'
    ];

    public static $rules = [
       'course_id' => 'required|integer',
       'sectionname' => 'required|max:255',
       'sectionshortdescription' => 'required|max:255',
       'sectiondescription' => 'required',
       'courseorder' => 'required|integer',
       'visible' => 'sometimes|integer'
    
    ];

    
    
    
}
