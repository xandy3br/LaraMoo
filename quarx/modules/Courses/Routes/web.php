<?php 

Route::group(['namespace' => 'Quarx\Modules\Courses\Controllers', 'prefix' => 'quarx', 'middleware' => ['web', 'auth', 'quarx']], function () { 

/*
|--------------------------------------------------------------------------
| Courses Routes
|--------------------------------------------------------------------------
*/

Route::resource('courses', 'CoursesController', [ 'except' => ['show'], 'as' => 'quarx' ]);
Route::post('courses/search', 'CoursesController@search');

});