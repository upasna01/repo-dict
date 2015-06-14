@extends('layouts.default')
@section('content')

<div class="col-sm-6 col-md-4 col-md-offset-2">
    <div class="row">
        <p>{{ link_to_route ('region.create','Add Region')}}</p>

        <table class="table table-striped table-bordered">
            <tr>
                <th>Region</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>

            @foreach ($regions as $region)
            <tr>
                <td>{{ $region->region }} </td>
                <td>{{ link_to_route('region.edit', 'Edit',array($region->id), array('class' => 'btn btn-info')) }}</td>
                <td>{{ Form::open(array('method' => 'DELETE', 'route' => array('region.destroy', $region->id))) }}
                    {{ Form::submit('Delete', array('class'=> 'btn btn-danger')) }}
                    {{ Form::close() }}
                </td>
            </tr>
            @endforeach
        </table>

    </div>
</div>
@stop