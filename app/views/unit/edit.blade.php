@extends('layouts.default')
@section('content')
<div class="col-sm-6 col-md-4 col-md-offset-4">
    <div class="row">
        <h1 class="text-center login-title">Edit User</h1>
        {{ Form::model($unit,array('method' => 'PATCH', 'route' =>array('unit.update', $unit->id))) }}

        {{ Form::label('name', 'Unit Name:') }}
        {{ Form::text('name', null, array('class'=>'form-control','required','autofocus')) }}

        {{ Form::label('status', 'status:') }}
        <?php
        $status = [
            ''=>'Please Select',
            'active'=>'Active',
            'inactive'=>'Inactive'
        ];
        ?>
        {{ Form::select('status',$status,null,array('class'=>'form-control','required')) }}

        </br>

        {{ Form::submit('Update', array('class' => 'btn btn-info')) }}
        {{ link_to_route('unit.index', 'Cancel', array('class' => 'btn btn-info')) }}
        </br>

        {{ Form::close() }}
    </div>
</div>
@if ($errors->any())
<ul>
    {{ implode('', $errors->all('<li class="error">:message</li>')) }}
</ul>
@endif

@stop
