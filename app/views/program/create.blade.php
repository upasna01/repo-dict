@extends('layouts.default')
@section('content')
<div class="col-sm-6 col-md-4 col-md-offset-4">
    <div class="row">
        <h1 class="text-center login-title">New Program</h1>
        {{ Form::open(array('route' => 'program.store')) }}
        <ul>
            <li>
                {{ Form::label('name', 'Program Name:') }}
                {{ Form::text('name', null, array('class'=>'form-control', 'placeholder'=>'Program','required','autofocus')) }}
            </li>

            <li>
                {{ Form::label('status', 'Status:') }}
                <?php
                $status = [
                    ''=>'Please Select',
                    'active'=>'Active',
                    'inactive'=>'Inactive'
                ];
                ?>
                {{ Form::select('status',$status,null,array('class'=>'form-control','required')) }}
            </li>
            </br>
            <li>
                {{ Form::submit('Submit', array('class' => 'btn  btn-info')) }}
                {{ link_to_route('program.index', 'Cancel', array('class' => 'btn btn-info')) }}
            </li>
        </ul>
        {{ Form::close() }}
    </div>
</div>

@stop
