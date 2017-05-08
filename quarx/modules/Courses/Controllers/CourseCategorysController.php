<?php

namespace Quarx\Modules\Courses\Controllers;

use Quarx;
use CryptoService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Quarx\Modules\Courses\Services\CourseCategoryService;
use Quarx\Modules\Courses\Requests\CourseCategoryCreateRequest;
use Quarx\Modules\Courses\Requests\CourseCategoryUpdateRequest;
use Quarx\Modules\Courses\Models\CourseCategory;

class CourseCategorysController extends Controller
{
    public function __construct(CourseCategoryService $courseCategoryService)
    {
        $this->service = $courseCategoryService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $coursecategorys = $this->service->paginated();
        return view('courses::coursecategorys.index')
            ->with('pagination', $coursecategorys->render())
            ->with('coursecategorys', $coursecategorys);
    }

    /**
     * Display a listing of the resource searched.
     *
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        $coursecategorys = $this->service->search($request->search);
        return view('courses::coursecategorys.index')
            ->with('term', $request->search)
            ->with('pagination', $courses->render())
            ->with('coursecategorys', $coursecategorys);
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

       
        return view('courses::coursecategorys.create')
            ->with('categories', $categories);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\CourseCategoryCreateRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CourseCategoryCreateRequest $request)
    {
        $result = $this->service->create($request->except('_token'));

        if ($result) {
            Quarx::notification('Successfully created', 'success');
            return redirect('quarx/coursecategorys/'.$result->id.'/edit');
        }

        Quarx::notification('Failed to create', 'warning');
        return redirect('quarx/coursecategorys');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $coursecategory = $this->service->find($id);
        return view('courses::coursecategorys.show')->with('coursecategory', $coursecategory);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $coursecategory = $this->service->find($id);
        return view('courses::coursecategorys.edit')
            ->with('coursecategory', $coursecategory);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\CourseCategoryUpdateRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CourseCategoryUpdateRequest $request, $id)
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
            return redirect('quarx/coursecategorys');
        }

        Quarx::notification('Failed to delete', 'warning');
        return redirect('quarx/coursecategorys');
    }
}
