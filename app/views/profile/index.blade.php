@extends('layouts.default')
@section('content')
<div class="col-sm-6 col-md-4 col-md-offset-4">
    <div class="row">

        {{ Form::model($user,array('method' => 'PATCH', 'route' =>array('profile.update', $user->id))) }}
        <ul>
            <h1 class="text-center login-title"></h1>
            <li>
                {{ Form::label('firstname', 'First Name:') }}
                {{ Form::text('firstname', null, array('class'=>'form-control','required','autofocus')) }}
            </li>

            <li>
                {{ Form::label('lastname', 'Last Name:') }}
                {{ Form::text('lastname', null, array('class'=>'form-control','required')) }}
            </li>

            <li>
                {{ Form::label('username', 'Username:') }}
                {{ Form::text('username', null, array('class'=>'form-control','required')) }}
            </li>

            <li>
                {{ Form::label('phone', 'Phone:') }}
                {{ Form::text('phone', null, array('class'=>'form-control','required')) }}
            </li>

            <li>
                {{ Form::label('email', 'Email:') }}
                {{ Form::text('email', null, array('class'=>'form-control','required')) }}
            </li>

            <li>
                {{ Form::label('role', 'Role:') }}
                {{ Form::text('role', null, array('class'=>'form-control','required','disabled')) }}

            </li>
            </br>
            <li>
                {{ Form::submit('Update', array('class' => 'btn btn-info')) }}
                {{ link_to_route('users.index', 'Cancel', array('class' => 'btn btn-info')) }}
            </li>
        </ul>
        {{ Form::close() }}
    </div>
</div>

@stop