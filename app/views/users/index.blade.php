@extends('layouts.default')
@section('content')
<div class="col-sm-6 col-md-4 col-md-offset-2">
    <div class="row">
        <h1 class="text-center login-title">All Users</h1>

            <p>{{ link_to_route('users.create', 'Add new user') }}</p>

                  <table class="table table-striped table-bordered">
                <thead>
                <tr>
                    <th>Name</th>
                    <th>Username</th>
                    <th>Phone</th>
                    <th>Email</th>
                    <th>Roles</th>
                    <th>Region/District</th>
                    <th>Action</th>


                </tr>
                </thead>

                <tbody>
            @foreach ($users as $user)
                <tr>
                    <td>{{ $user->firstname }} {{ $user->lastname }}</td>
                    <td>{{ $user->username }}</td>
                    <td>{{ $user->phone }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->role  }}</td>
                    <td>{{ $user->role_vak  }}</td>
                    <td>{{ link_to_route('users.edit', 'Edit',array($user->id), array('class' => 'btn btn-info')) }}</td>
                    <td>{{ Form::open(array('method' => 'DELETE', 'route' => array('users.destroy', $user->id))) }}
                        {{ Form::submit('Delete', array('class'=> 'btn btn-danger')) }}
                        {{ Form::close() }}</td>
                </tr>
            @endforeach

                </tbody>

            </table>


        </div>
    </div>
@stop
