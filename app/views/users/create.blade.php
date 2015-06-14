@extends('layouts.default')
@section('content')
<div class="col-sm-6 col-md-4 col-md-offset-4">

    <div class="row">
           <h1 class="text-center login-title">Create User</h1>
            {{ Form::open(array('route' => 'users.store')) }}
            <ul>
                <li>
                    {{ Form::label('firstname', 'First Name:') }}
                    {{ Form::text('firstname', null, array('class'=>'form-control', 'placeholder'=>'First Name','required','autofocus')) }}
                </li>

                <li>
                    {{ Form::label('lastname', 'Last Name:') }}
                    {{ Form::text('lastname', null, array('class'=>'form-control', 'placeholder'=>'Last Name','required')) }}
                </li>

                <li>
                    {{ Form::label('username', 'Username:') }}
                    {{ Form::text('username', null, array('class'=>'form-control', 'placeholder'=>'Username','required')) }}
                </li>

                <li>
                    {{ Form::label('phone', 'Phone:') }}
                    {{ Form::text('phone', null, array('class'=>'form-control', 'placeholder'=>'Phone','required')) }}
                </li>

                <li>
                    {{ Form::label('email', 'Email:') }}
                    {{ Form::text('email', null, array('class'=>'form-control', 'placeholder'=>'Email','required')) }}
                </li>

                <li>
                    {{ Form::label('password', 'Password:') }}
                    {{ Form::password('password', array('class'=>'form-control', 'placeholder'=>'Password','required')) }}
                </li>
                <li>
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
                    ?>
                    {{ Form::select('role',$roles,null,array('class'=>'form-control', 'id'=>'rolesData' ,'required')) }}
                </li>
                </br>
                <li>
                    {{ Form::label('role_vak', 'Region/District::') }}
                    <?php
                        $rolesval=[];
                    ?>
                    {{ Form::select('role_vak',$rolesval,null,array('class'=>'form-control', 'id'=>'rolesVal' )) }}
                </li>
                </br>
                <li>
                    {{ Form::submit('Submit', array('class' => 'btn  btn-info')) }}
                    {{ link_to_route('users.index', 'Cancel', array('class' => 'btn btn-info')) }}
                </li>

            </ul>
            {{ Form::close() }}
        </div>
        {{ link_to_route('users.show', 'Add District', array('class' => 'btn btn-info')) }}

</div>
</div>

</div>
<script>
jQuery(document).ready(function(){
    jQuery("#rolesData").change(function(){
        var _type = jQuery(this).val();
        if(_type == 'region' || _type == 'district_health_post' || _type=='public_health_center' || _type=='health_post' || _type=='shealth_post'){
            $.ajax({
                type: "POST",
                url: "/users/getdiszone",
                data: { type: _type }
            })
            .done(function(response) {
               jQuery("#rolesVal").html( response );
            })
            .fail(function() {
                alert( "error" );
            });
        }
        if(_type=='admin'){
            $.ajax({
                type: "POST",
                url: "/users/getdiszone",
                data: { type: _type }
            })
                .done(function(response) {
                    jQuery("#rolesVal").html( response );
                })
                .fail(function() {
                    alert( "error" );
                });
        }

    });


});
</script>
@stop