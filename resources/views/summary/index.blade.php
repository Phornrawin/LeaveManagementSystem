@extends('layouts.user')

@section('title')
    Summary - Leave Management System
@endsection

@section('main')
    <h1>Summary</h1>
    <hr />
    <div>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th colspan="7" id="month" class="text-center">{{$date}}</th>
                </tr>
                <tr>
                    <th scope="col">Sun.</th>
                    <th scope="col">Mon.</th>
                    <th scope="col">Tue.</th>
                    <th scope="col">Wed.</th>
                    <th scope="col">Thu.</th>
                    <th scope="col">Fri.</th>
                    <th scope="col">Sat.</th>
                </tr>
            </thead>
            <tbody>
                @for($i=0;$i<5;$i++)
                <tr>
                    @for($j=1;$j<8;$j++)
                        <td id="day{{$i*7+$j}}"></td>
                    @endfor
                </tr>
                @endfor
            </tbody>
        </table>
    </div>
@endsection