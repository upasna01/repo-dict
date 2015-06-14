@extends('layouts.default')
@section('content')

<div class="col-sm-6 col-md-4 col-md-offset-2">
    <div class="row">

        @foreach ($district as $districts)
                <table>
                        <tr>
                            <td>{{ $districts->district }} </td>
                        </tr>
                </table>
        @endforeach
    </div>

</div>
@stop