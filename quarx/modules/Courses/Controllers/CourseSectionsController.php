<?php

namespace Quarx\Modules\Courses\Controllers;

use Quarx;
use CryptoService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Quarx\Modules\Courses\Services\CourseSectionService;
use Quarx\Modules\Courses\Requests\CourseSectionCreateRequest;
use Quarx\Modules\Courses\Requests\CourseSectionUpdateRequest;
use Quarx\Modules\Courses\Models\CourseSection;

class CourseSectionsController extends Controller
{
   private $inputs = null;
   
    public function __construct(CourseSectionService $courseSectionService, Request $request)
    {
        $this->service = $courseSectionService;
        $this->inputs = $request->all();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $courseSections = $this->service->paginated();
        
        return view('courses::coursesections.index')
            ->with('pagination', $coursesections->render())
            ->with('coursesections', $coursesections);
    }

    /**
     * Display a listing of the resource searched.
     *
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        $coursesections = $this->service->search($request->search);
        return view('courses::coursesections.index')
            ->with('term', $request->search)
            ->with('pagination', $courses->render())
            ->with('coursesections', $coursesections);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
       $input = $request->all();
       
       $course = \DB::table('courses')
           ->where('id', '=', $input['course'])
           ->first();
           
       $sections = \DB::table('course_sections')
           ->where('course_id', '=', $input['course'])
           ->orderBy('courseorder')
           ->get();
       
        return view('courses::coursesections.create')
            ->with('sections', $sections)
            ->with('course', $course);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\CourseSectionCreateRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CourseSectionCreateRequest $request)
    {
        $result = $this->service->create($request->except('_token'));

        if ($result) {
            Quarx::notification('Successfully created', 'success');
            return redirect('quarx/coursesections/'.$result->id.'/edit');
        }

        Quarx::notification('Failed to create', 'warning');
        return redirect('quarx/coursesections');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       $course = \DB::table('courses')
       ->where('id', '=', $this->inputs['course'])
       ->first();
       
        $coursesection = $this->service->find($id);
        return view('courses::coursesections.show')
            ->with('coursesection', $coursesection)
            ->with('course', $course);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $coursesection = $this->service->find($id);
        
        $course = \DB::table('courses')
        ->where('id', '=', $coursesection->course_id)
        ->first();       
        
        return view('courses::coursesections.edit')
            ->with('coursesection', $coursesection)
            ->with('course', $course);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\CourseSectionUpdateRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CourseSectionUpdateRequest $request, $id)
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
            return redirect('quarx/coursesections');
        }

        Quarx::notification('Failed to delete', 'warning');
        return redirect('quarx/coursesections');
    }
}
