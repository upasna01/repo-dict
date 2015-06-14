@extends('layouts.default')
@section('content')
<div class="col-sm-6 col-md-4 col-md-offset-2">
    <div class="row">
        <h1 class="text-center login-title">All Programs</h1>
        <p>{{ link_to_route('program.create', 'Add new program') }}</p>
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>Program</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>

            <tbody>
            @foreach ($programs as $program)
            <tr>
                <td>{{ $program->name }}</td>
                <td>{{ $program->status }}</td>
                <td>{{ link_to_route('program.edit', 'Edit' , array($program->id), array('class'=> 'btn btn-info')) }}</td>
                <td>{{ Form::open(array('method' => 'DELETE', 'route' => array('program.destroy', $program->id))) }}
                    {{ Form::submit('Delete', array('class'=> 'btn btn-danger')) }}
                    {{ Form::close() }}
                </td>
            </tr>
            @endforeach

            </tbody>

        </table>


    </div>
</div>
@stop
