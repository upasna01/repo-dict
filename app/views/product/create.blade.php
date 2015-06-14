@extends('layouts.default')
@section('content')
<div class="col-sm-6 col-md-4 col-md-offset-4">
    <div class="row">
        <h1 class="text-center login-title">Create Product</h1>

        {{ Form::open(array('route' => 'product.store')) }}
        <ul>
            <li>
                {{ Form::label('name', 'Name:') }}
                {{ Form::text('name', null, array('class'=>'form-control', 'placeholder'=>'Name','required','autofocus')) }}
            </li>
            <?php
                $programlist=Program::all();
                $programArr=array();
                foreach($programlist as $sprogram)
                {
                    $programArr[$sprogram->id] = $sprogram->name;
                }
            ?>
            <li>
                {{ Form::label('program_id', 'Program Id:') }}
                {{ Form::select('program_id',$programArr,null, array('class'=>'form-control', 'placeholder'=>'Program Id','required')) }}
            </li>
            <?php
               $unitlsit = Unit::all();
               $unitArr = array();
               foreach($unitlsit as $sunit){
                   $unitArr[$sunit->id] = $sunit->name;
               }


            ?>

            <li>
                {{ Form::label('unit_id', 'Unit Id:') }}
                {{ Form::select('unit_id', $unitArr, null,array('class'=>'form-control', 'placeholder'=>'Unit Id','required')) }}
            </li>

            <li>
                {{ Form::label('monthly_receive', 'Receive for Month :') }}
                {{ Form::text('monthly_receive', null, array('class'=>'form-control', 'placeholder'=>'Receive for Month','required')) }}
            </li>

            <li>
                {{ Form::label('monthly_outlet', 'Outlay for Month:') }}
                {{ Form::text('monthly_outlet', null, array('class'=>'form-control', 'placeholder'=>'Outlay for Month','required')) }}
            </li>

            <li>
                {{ Form::label('monthly_expired', 'Expired in Month:') }}
                {{ Form::text('monthly_expired', null, array('class'=>'form-control', 'placeholder'=>'Expired in Month','required')) }}
            </li>

            <li>
                {{ Form::label('remarks', 'Remarks:') }}
                {{ Form::text('remarks', null, array('class'=>'form-control', 'placeholder'=>'Remarks','required')) }}
            </li>
            </br>
            <li>
                {{ Form::submit('Submit', array('class' => 'btn  btn-info')) }}
                {{ link_to_route('product.index', 'Cancel', array('class' => 'btn btn-info')) }}
            </li>
        </ul>
        {{ Form::close() }}
    </div>
</div>

@stop