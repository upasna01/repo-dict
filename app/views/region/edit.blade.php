@extends('layouts.default')
@section('content')
<div class="col-sm-6 col-md-4 col-md-offset-4">
    <div class="row">
        <h1 class="text-center login-title">Edit Region</h1>
        {{ Form::model($region,array('method' => 'PATCH', 'route' =>array('region.update', $region->id))) }}

        {{ Form::label('region', 'Region:') }}
        {{ Form::text('region', null, array('class'=>'form-control','required','autofocus')) }}
        </br>

        {{ Form::submit('Update', array('class' => 'btn btn-info')) }}
        {{ link_to_route('region.index', 'Cancel', array('class' => 'btn btn-info')) }}
        </br>

        {{ Form::close() }}
    </div>
</div>
@stop
