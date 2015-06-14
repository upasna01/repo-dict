@extends('layouts.default')
@section('content')
<div class="col-sm-6 col-md-4 col-md-offset-4">
    <div class="row">
        <h1 class="text-center login-title">Edit User</h1>
        {{ Form::model($user,array('method' => 'PATCH', 'route' =>array('users.update', $user->id))) }}

        {{ Form::label('firstname', 'First Name:') }}
        {{ Form::text('firstname', null, array('class'=>'form-control','required','autofocus')) }}

        {{ Form::label('lastname', 'Last Name:') }}
        {{ Form::text('lastname', null, array('class'=>'form-control','required')) }}

        {{ Form::label('username', 'Username:') }}
        {{ Form::text('username', null, array('class'=>'form-control','required')) }}

        {{ Form::label('phone', 'Phone:') }}
        {{ Form::text('phone', null, array('class'=>'form-control','required')) }}

        {{ Form::label('email', 'Email:') }}
        {{ Form::text('email', null, array('class'=>'form-control','required')) }}

        {{ Form::label('role', 'Role:') }}
        <?php $roles=[
            ''=>'Please Select',
            'admin'=>'Admin',
            'region'=>'Regional Head',
            'district_health_post'=>'District Health Post',
            'public_health_center'=>'Public Health Center ',
            'health_post'=>'Health Post',
            'shealth_post'=>'Shealth Post'

        ];
        ?>{{ Form::select('role',$roles,null,array('class'=>'form-control','required')) }}

        </br>
        {{ Form::label('role_vak', 'Region/District:') }}
            <?php
                $rolesval=[];
            ?>
            {{ Form::select('role_vak',$rolesval,null,array('class'=>'form-control', 'id'=>'rolesVal' )) }}
        </br>

        {{ Form::submit('Update', array('class' => 'btn btn-info')) }}
        {{ link_to_route('users.index', 'Cancel', array('class' => 'btn btn-info')) }}
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
