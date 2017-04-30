<?php

namespace App\Http\Controllers\Quarx;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Quarx\Modules\Courses\Services\CourseService;

class CoursesController extends Controller
{
    public function __construct(CourseService $courseService)
    {
        $this->service = $courseService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $courses = $this->service->paginated();
        return view('quarx-frontend::courses.all')->with('courses', $courses);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $course = $this->service->find($id);
        return view('quarx-frontend::courses.show')->with('course', $course);
    }
}
