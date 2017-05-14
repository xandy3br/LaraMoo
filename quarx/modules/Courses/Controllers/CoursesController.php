<?php

namespace Quarx\Modules\Courses\Controllers;

use Quarx;
use CryptoService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Quarx\Modules\Courses\Services\CourseService;
use Quarx\Modules\Courses\Requests\CourseCreateRequest;
use Quarx\Modules\Courses\Requests\CourseUpdateRequest;
use Quarx\Modules\Courses\Models\CourseCategory;
use Quarx\Modules\Courses\Models\CourseSection;

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
        return view('courses::courses.index')
            ->with('pagination', $courses->render())
            ->with('courses', $courses);
    }

    /**
     * Display a listing of the resource searched.
     *
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        $courses = $this->service->search($request->search);
        return view('courses::courses.index')
            ->with('term', $request->search)
            ->with('pagination', $courses->render())
            ->with('courses', $courses);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       $categories = \DB::table('course_categorys')
            ->select(['id', 'categoryname', 'categoryparent'])
            ->groupBy('categoryparent', 'categoryname', 'id')
            ->orderBy('categoryname')
            ->get();
       
       $courseformats = \DB::table('course_formats')
            ->select(['id', 'format', 'description'])
            ->get();
       
        return view('courses::courses.create')
            ->with('categories', $categories)
            ->with('courseformats', $courseformats);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\CourseCreateRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CourseCreateRequest $request)
    {
        $result = $this->service->create($request->except('_token'));

        if ($result) {
            Quarx::notification('Successfully created', 'success');
            return redirect('quarx/courses/'.$result->id.'/edit');
        }

        Quarx::notification('Failed to create', 'warning');
        return redirect('quarx/courses');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //$course = $this->service->find($id);
        // get the lookup tables info
        $course = \DB::table('courses')
            ->leftJoin('course_categorys', 'courses.category', 'course_categorys.id')
            ->leftJoin('course_formats', 'courses.course_format_id', 'course_formats.id')
            ->where('courses.id', '=', $id)
            ->first();
        
        $sections = CourseSection::where('course_id', '=', $id)
            ->get();
        
        return view('courses::courses.show')
            ->with('course', $course)
            ->with('sections', $sections);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $course = $this->service->find($id);
        return view('courses::courses.edit')->with('course', $course);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\CourseUpdateRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CourseUpdateRequest $request, $id)
    {
        $result = $this->service->update($id, $request->except(['_token', '_method']));

        if ($result) {
            Quarx::notification('Successfully updated', 'success');
            return back();
        }

        Quarx::notification('Failed to update', 'warning');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $result = $this->service->destroy($id);

        if ($result) {
            Quarx::notification('Successfully deleted', 'success');
            return redirect('quarx/courses');
        }

        Quarx::notification('Failed to delete', 'warning');
        return redirect('quarx/courses');
    }
}
