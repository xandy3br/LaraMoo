@extends('quarx::layouts.dashboard')

@section('content')

    <div class="modal fade" id="deleteModal" tabindex="-3" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="deleteModalLabel">Delete Section</h4>
                </div>
                <div class="modal-body">
                    <p>Are you sure want to delete this Section?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <a id="deleteBtn" type="button" class="btn btn-warning" href="#">Confirm Delete</a>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <a class="btn btn-primary pull-right" href="{!! route('quarx.courses.create') !!}">Add New</a>
        <div class="pull-right raw-margin-right-24">
            {!! Form::open(['url' => 'quarx/courses/search']) !!}
            <input class="form-control form-inline pull-right" name="search" placeholder="Search">
            {!! Form::close() !!}
        </div>
        <h1 class="page-header">Sections</h1>
    </div>

    @if (isset($term))
    <div class="row">
        <div class="well text-center">You searched for "{{ $term }}"</div>
    </div>
    @endif

    <div class="row">
        @if ($sections->isEmpty())
            <div class="well text-center">No sections found .</div>
        @else
            <table class="table table-striped">
                <thead>
                    <th>Name</th>
                    <th width="200px" class="text-right">Actions</th>
                </thead>
                <tbody>

                @foreach($sections as $section)
                    <tr>
                        <td>
                            <a href="{!! route('quarx.courses.edit', [$course->id]) !!}">{!! $course->name !!}</a>
                        </td>
                        <td class="text-right">
                            <form method="post" action="{!! url('_sectionPrefix_courses/'.$course->id) !!}">
                                {!! csrf_field() !!}
                                {!! method_field('DELETE') !!}
                                <button class="delete-btn btn btn-xs btn-danger pull-right" type="submit"><i class="fa fa-trash"></i> Delete</button>
                            </form>
                            <a class="btn btn-xs btn-default raw-margin-right-8 pull-right" href="{!! route('quarx.courses.edit', [$course->id]) !!}"><i class="fa fa-pencil"></i> Edit</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        @endif
    </div>

    <div class="text-center">
        {!! $pagination !!}
    </div>

@endsection

@section('javascript')

    @parent
    <script type="text/javascript">

        // add js here

    </script>

@endsection


