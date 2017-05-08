<?php 

Route::group(['namespace' => '\\Bgies\\Laramoofront', 'middleware' => ['web']], function () {

/*
|--------------------------------------------------------------------------
| Course App Routes
|--------------------------------------------------------------------------
*/
//   Route::resource('courses', 'Courses\CoursesController', ['only' => ['show', 'index']]);

//   Route::any('courses', 'Controllers\Courses\CoursesController@list');

});


Route::any('courses', '\\Bgies\\Laramoofront\Controllers\Courses\CoursesController@list');