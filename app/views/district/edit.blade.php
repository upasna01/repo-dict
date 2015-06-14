@extends('layouts.default')
@section('content')
<div class="col-sm-6 col-md-4 col-md-offset-4">
    <div class="row">
        <h1 class="text-center login-title">Edit District</h1>
        {{ Form::model($district,array('method' => 'PATCH', 'route' =>array('district.update', $district->id))) }}

        {{ Form::label('district', 'District:') }}
        {{ Form::text('district', null, array('class'=>'form-control','required','autofocus')) }}
        </br>

        {{ Form::label('region','Region:') }}
            <?php

                    $regionlist=Region::all();
                      $region=array();
                    foreach($regionlist as $regionid)
                    {
                        $region[$regionid->id]=$regionid->region;
                    }

            ?>{{ Form::select('region_id',$region,null,array('class'=>'form-control','required')) }}

        {{ Form::submit('Update', array('class' => 'btn btn-info')) }}
        {{ link_to_route('district.index', 'Cancel', array('class' => 'btn btn-info')) }}
        </br>

        {{ Form::close() }}
    </div>
</div>
@stop
