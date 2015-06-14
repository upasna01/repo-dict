@extends('layouts.default')
@section('content')
<div class="col-sm-6 col-md-4 col-md-offset-4">
    <div class="row">
        {{ Form::open(array('route' => 'district.store')) }}

        <ul>
            <h1 class="text-center login-title">District</h1>
            <li>
                {{ Form::label('district', 'District:') }}
                {{ Form::text('district', null, array('class'=>'form-control','required','autofocus')) }}
            </li>
            <li>
             {{ Form::label('region', 'Region:') }}

                <?php
                    $regionlist=Region::all();
                      $region=array();
                    foreach($regionlist as $regionid)
                    {
                        $region[$regionid->id]=$regionid->region;
                    }

                ?>
             {{ Form::select('region_id',$region,null,array('class'=>'form-control','required')) }}

            </li>
            </br>
            <li>
                {{ Form::submit('Submit', array('class' => 'btn btn-info')) }}
                {{ link_to_route('district.index', 'Cancel', array('class' => 'btn btn-info')) }}
            </li>
        </ul>
        {{ Form::close() }}
    </div>

</div>

@stop