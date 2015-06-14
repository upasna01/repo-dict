@extends('layouts.default')
@section('content')

<div class="col-sm-6 col-md-4 col-md-offset-2">
    <div class="row">
        <p>{{ link_to_route ('zone.create','Add Zone')}}</p>

        <table class="table table-striped table-bordered">
            <tr>
                <th>Zone</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>

            @foreach ($zones as $zone)
            <tr>
                <td>{{ $zone->zone }} </td>
                <td>{{ link_to_route('zone.edit', 'Edit',array($zone->id), array('class' => 'btn btn-info')) }}</td>
                <td>{{ Form::open(array('method' => 'DELETE', 'route' => array('zone.destroy', $zone->id))) }}
                    {{ Form::submit('Delete', array('class'=> 'btn btn-danger')) }}
                    {{ Form::close() }}
                </td>
            </tr>
            @endforeach
        </table>

    </div>
</div>
@stop