@extends('layouts.default')
@section('content')
<div class="col-sm-6 col-md-4 col-md-offset-2">
    <div class="row">
        <h1 class="text-center login-title">All Units</h1>
        <p>{{ link_to_route('unit.create', 'Add  units') }}</p>
        <table class="table table-striped table-bordered">
            <thead>
            <tr>
                <th>Program</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
            </thead>

            <tbody>
            @foreach ($units as $unit)
            <tr>
                <td>{{ $unit->name }}</td>
                <td>{{ $unit->status }}</td>
                <td>{{ link_to_route('unit.edit', 'Edit' , array($unit->id), array('class'=> 'btn btn-info')) }}</td>
                <td>{{ Form::open(array('method' => 'DELETE', 'route' => array('unit.destroy', $unit->id))) }}
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
