<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('category')->default(0);
            $table->integer('sortorder')->default(0);
            $table->string('fullname', 255);
            $table->string('shortname', 255);
            $table->string('idnumber', 100)->default('');
            $table->mediumText('summary');
            $table->integer('course_format_id')->default(1);
            $table->tinyInteger('showgrades')->default(1);
            $table->tinyInteger('newsitems')->default(1);
            $table->date('startdate')->nullable()->default(null);
            $table->date('enddate')->nullable()->default(null);
            $table->string('icon', 255)->default('');
            $table->tinyInteger('showreports')->default(0);
            $table->tinyInteger('visible')->default(0);
            `lang` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
            `calendartype` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
            `theme` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
            `timecreated` bigint(10) NOT NULL DEFAULT '0',
            `timemodified` bigint(10) NOT NULL DEFAULT '0',
            `requested` tinyint(1) NOT NULL DEFAULT '0',
            `enablecompletion` tinyint(1) NOT NULL DEFAULT '0',
            `completionnotify` tinyint(1) NOT NULL DEFAULT '0',
            `cacherev` bigint(10) NOT NULL DEFAULT '0',
            
            
            
            $table->timestamps();
            
            
            
            
        });
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('courses');
    }
}
