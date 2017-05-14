<?php

namespace Quarx\Modules\Courses\Controllers;

use Quarx;
use CryptoService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Quarx\Modules\Courses\Services\QuizService;
use Quarx\Modules\Courses\Requests\QuizCreateRequest;
use Quarx\Modules\Courses\Requests\QuizUpdateRequest;
use Quarx\Modules\Courses\Models\Quiz;

class QuizsController extends Controller
{
   private $inputs = null;
   
    public function __construct(QuizService $quizService, Request $request)
    {
        $this->service = $quizService;
        $this->inputs = $request->all();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $quizs = $this->service->paginated();
        
        return view('courses::quizs.index')
            ->with('pagination', $quizs->render())
            ->with('quizs', $quizs);
    }

    /**
     * Display a listing of the resource searched.
     *
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        $quizs = $this->service->search($request->search);
        return view('courses::quizs.index')
            ->with('term', $request->search)
            ->with('pagination', $courses->render())
            ->with('quizs', $quizs);
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
       
        return view('courses::quizs.create')
            ->with('sections', $sections)
            ->with('course', $course);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\QuizCreateRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(QuizCreateRequest $request)
    {
        $result = $this->service->create($request->except('_token'));

        if ($result) {
            Quarx::notification('Successfully created', 'success');
            return redirect('quarx/quizs/'.$result->id.'/edit');
        }

        Quarx::notification('Failed to create', 'warning');
        return redirect('quarx/quizs');
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
       
        $quiz = $this->service->find($id);
        return view('courses::quizs.show')
            ->with('quiz', $quiz)
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
        $quiz = $this->service->find($id);
        
        $course = \DB::table('courses')
        ->where('id', '=', $quiz->course_id)
        ->first();       
        
        return view('courses::quizs.edit')
            ->with('quiz', $quiz)
            ->with('course', $course);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\QuizUpdateRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(QuizUpdateRequest $request, $id)
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
            return redirect('quarx/quizs');
        }

        Quarx::notification('Failed to delete', 'warning');
        return redirect('quarx/quizs');
    }
}
