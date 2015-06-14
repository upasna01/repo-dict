@extends('layouts.login')
@section('content')


<div class="container">
    <div class="row">
        <div class="col-sm-6 col-md-4 col-md-offset-4">

            <div class="account-wall">
                <h1 class="text-center login-title" >Login User</h1>
                {{ Form::open(array('url'=>'login','class'=>'form-signin')) }}
                {{ Form::text('email', null, array('class'=>'form-control', 'placeholder'=>'Email Address','required','autofocus')) }}
                {{ Form::password('password', array('class'=>'form-control', 'placeholder'=>'Password','required')) }}
                {{ Form::submit('login', array('class' => 'btn btn-lg btn-primary btn-block')) }}
            </div>
            {{ Form::close() }}
        </div>
    </div>
</div>



@if ($errors->any())
<ul>
    {{ implode('', $errors->all('<li class="error">:message</li>')) }}
</ul>
@endif

@stop