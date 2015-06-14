@extends('layouts.default')
@section('content')

<div class="col-sm-6 col-md-4 col-md-offset-2">
    <div class="row">

        @foreach ($zones as $zone)
        <table>
            <tr>
                <td>{{ $zone->$zone }} </td>
            </tr>
        </table>
        @endforeach
    </div>


</div>
@stop