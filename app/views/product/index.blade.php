@extends('layouts.default')
@section('content')
<div class="col-sm-6 col-md-4 col-md-offset-2">
    <div class="row">
        <h1 class="text-center login-title">All Products</h1>

        <p>{{ link_to_route('product.create', 'Add new product') }}</p>

        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>Product Name</th>
                    <th>Program Id</th>
                    <th>Unit Id</th>
                    <th>Receive for Month</th>
                    <th>Outlay for Month</th>
                    <th>Expired in Month</th>
                    <th>Remarks</th>
                    <th>Action</th>
                </tr>
            </thead>
           <tbody>
            @foreach ($products as $product)
            <tr>
                <td>{{ $product->name }}</td>
                <?php



                ?>
                <td>{{ $product->prog_name }}</td>
                <td>{{ $product->unit_name }}</td>

                <td>{{ $product->monthly_receive}}</td>
                <td>{{ $product->monthly_outlet }}</td>
                <td>{{ $product->monthly_expired }}</td>
                <td>{{ $product->remarks }}</td>

                <td>{{ link_to_route('product.edit', 'Edit' , array($product->id), array('class'=> 'btn btn-info')) }}</td>
                <td>{{ Form::open(array('method' => 'DELETE', 'route' => array('product.destroy', $product->id))) }}
                    {{ Form::submit('Delete', array('class'=> 'btn btn-danger')) }}
                    {{ Form::close() }}
                </td>
            </tr>
            @endforeach

            </tbody>

        </table>


    </div>
</div>
@stop
