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
    ];

    public static $rules = [
        // create rules
    ];

}
