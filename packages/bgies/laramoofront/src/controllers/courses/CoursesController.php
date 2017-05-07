<?php

namespace Bgies\LaramooFront\Controllers\Courses;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Bgies\Laramoofront\Models\Courses\Course;

class CoursesController extends Controller
{
   
   
   
   public function list() {
      $courses = Course::all();
      
      return view ('quarx-frontend::courses/all')
         ->with('courses', $courses);
//      return view('Laramoofront::courses/courseslist');
   }
   
   public function getBackendList() {
   
   
   
   
   }
    
   
    
   
  
}