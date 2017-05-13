<?php

namespace Quarx\Modules\Courses\Models;

use Yab\Quarx\Models\QuarxModel;

class Course extends QuarxModel
{
    public $table = "courses";

    public $primaryKey = "id";

    public $timestamps = true;

    public $fillable = [
        // Course table data
       'category', 'sortorder', 'fullname', 'shortname', 'idnumber',
       'summary', 'course_format_id', 'showgrades', 'newsitems', 
       'startdate', 'enddate', 'icon', 'showreports', 'visible',
       'lang', 'theme'
    ];

    public static $rules = [
       'category' => 'required'
        // create rules
    ];

    
    
    
}
