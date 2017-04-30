<?php 

Route::group(['namespace' => 'Quarx', 'middleware' => ['web']], function () {

/*
|--------------------------------------------------------------------------
| Course App Routes
|--------------------------------------------------------------------------
*/

Route::resource('courses', 'CoursesController', ['only' => ['show', 'index']]);


});