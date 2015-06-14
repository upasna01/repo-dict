@extends('layouts.default')
@section('content')
<div class="col-sm-6 col-md-4 col-md-offset-4">
    <div class="row">
        {{ Form::open(array('route' => 'region.store')) }}

        <ul>
            <h1 class="text-center login-title">Region</h1>
            <li>
                {{ Form::label('region', 'Region:') }}
                {{ Form::text('region', null, array('class'=>'form-control','required','autofocus')) }}
            </li>
            <li>
                {{ Form::label('zone','Zone:' )}}
            </li>
            </br>
            <li>
                {{ Form::submit('Submit', array('class' => 'btn btn-info')) }}
                {{ link_to_route('region.index', 'Cancel', array('class' => 'btn btn-info')) }}
            </li>
        </ul>
        {{ Form::close() }}
    </div>

</div>

@stop