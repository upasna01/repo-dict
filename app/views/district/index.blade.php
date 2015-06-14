@extends('layouts.default')
@section('content')

<div class="col-sm-6 col-md-4 col-md-offset-2">
    <div class="row">
        <p>{{ link_to_route ('district.create','Add District')}}</p>

        <table class="table table-striped table-bordered">
            <tr>
                <th>District</th>
                <th>Region Id </th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>

            @foreach ($districts as $district)
            <tr>
                <td>{{ $district->district }} </td>
                <td>{{ $district->region_id }} </td>
                <td>{{ link_to_route('district.edit', 'Edit',array($district->id), array('class' => 'btn btn-info')) }}</td>
                <td>{{ Form::open(array('method' => 'DELETE', 'route' => array('district.destroy', $district->id))) }}
                    {{ Form::submit('Delete', array('class'=> 'btn btn-danger')) }}
                    {{ Form::close() }}
                </td>
            </tr>
            @endforeach
        </table>

    </div>
</div>
@stop