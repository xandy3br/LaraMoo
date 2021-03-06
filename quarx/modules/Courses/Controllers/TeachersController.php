<?php

namespace Quarx\Modules\Courses\Controllers;

use Quarx;
use CryptoService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Quarx\Modules\Courses\Services\TeacherService;
use Quarx\Modules\Courses\Requests\TeacherCreateRequest;
use Quarx\Modules\Courses\Requests\TeacherUpdateRequest;
use Quarx\Modules\Courses\Models\TeacherSection;

class TeachersController extends Controller
{
   private $inputs = null;
   
    public function __construct(TeacherService $teacherService, Request $request)
    {
        $this->service = $teacherService;
        $this->inputs = $request->all();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $teachers = $this->service->paginated();
        
        return view('courses::teachers.index')
            ->with('pagination', $teachers->render())
            ->with('teachers', $teachers);
    }

    /**
     * Display a listing of the resource searched.
     *
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        $teachers = $this->service->search($request->search);
        return view('courses::teachers.index')
            ->with('term', $request->search)
            ->with('pagination', $courses->render())
            ->with('teachers', $teachers);
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
       
        return view('courses::teachers.create')
            ->with('sections', $sections)
            ->with('course', $course);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\TeacherCreateRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TeacherCreateRequest $request)
    {
        $result = $this->service->create($request->except('_token'));

        if ($result) {
            Quarx::notification('Successfully created', 'success');
            return redirect('quarx/teachers/'.$result->id.'/edit');
        }

        Quarx::notification('Failed to create', 'warning');
        return redirect('quarx/teachers');
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
       
        $teacher = $this->service->find($id);
        return view('courses::teachers.show')
            ->with('teacher', $teacher)
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
        $teacher = $this->service->find($id);
        
        $course = \DB::table('courses')
        ->where('id', '=', $teacher->course_id)
        ->first();       
        
        return view('courses::teachers.edit')
            ->with('teacher', $teacher)
            ->with('course', $course);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\TeacherUpdateRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TeacherUpdateRequest $request, $id)
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
            return redirect('quarx/teachers');
        }

        Quarx::notification('Failed to delete', 'warning');
        return redirect('quarx/teachers');
    }
}
