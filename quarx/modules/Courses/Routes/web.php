<?php 

Route::group(['namespace' => 'Quarx\Modules\Courses\Controllers', 'prefix' => 'quarx', 'middleware' => ['web', 'auth', 'quarx']], function () { 

/*
|--------------------------------------------------------------------------
| Courses Routes
|--------------------------------------------------------------------------
*/

Route::resource('courses', 'CoursesController', [  'as' => 'quarx' ]);
//Route::get('courses', 'CoursesController@index')->name('quarx.courses.index');
//Route::post('courses', 'CoursesController@index')->name('quarx.courses.store');
Route::post('courses/search', 'CoursesController@search');
//Route::get('courses/create', 'CoursesController@create')->name('quarx.courses.create');

Route::resource('coursecategorys', 'CourseCategorysController', [ 'except' => ['show'], 'as' => 'quarx' ]);
//Route::get('courses/category/list', 'CourseCategorysController@index')->name('quarx/courses/category/list');
//Route::get('courses/category/create', 'CourseCategorysController@create')->name('quarx/courses/category/create');

Route::resource('coursesections', 'CourseSectionsController', [ 'except' => ['show'], 'as' => 'quarx' ]);

Route::resource('quizs', 'QuizsController', [ 'except' => ['show'], 'as' => 'quarx' ]);
Route::resource('quizquestions', 'QuizQuestionsController', [ 'except' => ['show'], 'as' => 'quarx' ]);
Route::resource('teachers', 'TeachersController', [ 'except' => ['show'], 'as' => 'quarx' ]);
Route::resource('students', 'StudentsController', [ 'except' => ['show'], 'as' => 'quarx' ]);


});