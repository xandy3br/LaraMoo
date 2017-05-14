<?php

namespace Quarx\Modules\Courses\Controllers;

use Quarx;
use CryptoService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Quarx\Modules\Courses\Services\QuizQuestionService;
use Quarx\Modules\Courses\Requests\QuizQuestionCreateRequest;
use Quarx\Modules\Courses\Requests\QuizQuestionUpdateRequest;
use Quarx\Modules\Courses\Models\QuizQuestion;

class QuizQuestionsController extends Controller
{
   private $inputs = null;
   
    public function __construct(QuizQuestionService $quizQuestionService, Request $request)
    {
        $this->service = $quizQuestionService;
        $this->inputs = $request->all();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $quizquestions = $this->service->paginated();
        
        return view('courses::quizquestions.index')
            ->with('pagination', $coursesections->render())
            ->with('quizquestions', $quizquestions);
    }

    /**
     * Display a listing of the resource searched.
     *
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        $quizquestions = $this->service->search($request->search);
        return view('courses::quizquestions.index')
            ->with('term', $request->search)
            ->with('pagination', $courses->render())
            ->with('quizquestions', $quizquestions);
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
       
        return view('courses::quizquestions.create')
            ->with('sections', $sections)
            ->with('course', $course);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\CourseSectionCreateRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(QuizQuestionCreateRequest $request)
    {
        $result = $this->service->create($request->except('_token'));

        if ($result) {
            Quarx::notification('Successfully created', 'success');
            return redirect('quarx/quizquestions/'.$result->id.'/edit');
        }

        Quarx::notification('Failed to create', 'warning');
        return redirect('quarx/quizquestions');
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
       
        $quizquestions = $this->service->find($id);
        
        return view('courses::quizquestions.show')
            ->with('quizquestions', $quizquestions)
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
        $quizquestion = $this->service->find($id);
        
        $course = \DB::table('courses')
        ->where('id', '=', $coursesection->course_id)
        ->first();       
        
        return view('courses::quizquestions.edit')
            ->with('quizquestion', $quizquestion)
            ->with('course', $course);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\CourseSectionUpdateRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(QuizQuestionUpdateRequest $request, $id)
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
            return redirect('quarx/quizquestions');
        }

        Quarx::notification('Failed to delete', 'warning');
        return redirect('quarx/quizquestions');
    }
}
