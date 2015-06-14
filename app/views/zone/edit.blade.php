@extends('layouts.default')
@section('content')
<div class="col-sm-6 col-md-4 col-md-offset-4">
    <div class="row">
        <h1 class="text-center login-title">Edit Zone</h1>
        {{ Form::model($zone,array('method' => 'PATCH', 'route' =>array('zone.update', $zone->id))) }}

        {{ Form::label('zone', 'Zone:') }}
        {{ Form::text('zone', null, array('class'=>'form-control','required','autofocus')) }}

        </br>

        {{ Form::submit('Update', array('class' => 'btn btn-info')) }}
        {{ link_to_route('zone.index', 'Cancel', array('class' => 'btn btn-info')) }}
        </br>

        {{ Form::close() }}
    </div>
</div>

@stop
