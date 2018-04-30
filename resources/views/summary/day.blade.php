@extends('layouts.user')

@push('css')
<style>
    td {
        height: 70px;
    }
    .detail {
        font-size: 11px;
    }
    td[onclick] {
        cursor: pointer;
    }
    td[onclick]:hover {
        color: white;
        filter: gray;
    }
    table {
        border: 2px solid black;
    }
</style>
@endpush

@section('title')
    Summary - Leave Management System
@endsection

@section('main')
    <h1>
        Summary
        <div class="detail p-1 float-right">
            <i class="fas fa-circle text-success"></i> for <i>Active Subordinates</i><br />
            <i class="fas fa-circle text-warning"></i> for <i>Request Subordinates</i><br />
            <i class="fas fa-circle text-danger"></i> for <i>Leave Subordinates</i>
        </div>
    </h1>
    <hr />
    <div>
        <table class="table table-bordered table-info table-striped">
            <thead class="text-white">
                <tr class="bg-dark">
                    <th colspan="7" id="month" class="text-center">
                        <h3>
                            <span class="float-left"><a href="/summary/{{$year}}"><i class="fas fa-arrow-left"></i></a></span>
                            {{$date}}
                        </h3>
                    </th>
                </tr>
                <tr class="bg-info">
                    <th scope="col" class="text-center">Sun.</th>
                    <th scope="col" class="text-center">Mon.</th>
                    <th scope="col" class="text-center">Tue.</th>
                    <th scope="col" class="text-center">Wed.</th>
                    <th scope="col" class="text-center">Thu.</th>
                    <th scope="col" class="text-center">Fri.</th>
                    <th scope="col" class="text-center">Sat.</th>
                </tr>
            </thead>
            <tbody>
                @for($i=0;$i<6;$i++)
                    <tr>
                        @for($j=1;$j<8;$j++)
                            @if($i*7+$j > $dayOfWeek and $i*7+$j-$dayOfWeek <= cal_days_in_month(CAL_GREGORIAN, $month, $year))
                                <td onclick="selectDay({{$i*7+$j-$dayOfWeek}})" {{date('Y-m-d')==$year.'-'.$month.'-'.($i*7+$j-$dayOfWeek) ? "class=table-danger" : ""}} id="day{{$i*7+$j-$dayOfWeek}}">
                                    <span class="float-right font-weight-bold">{{$i*7+$j-$dayOfWeek}}</span>
                                    <div class="detail p-1 float-left">
                                        @if($details[$i*7+$j-$dayOfWeek-1]['available'])
                                        <i class="fas fa-circle text-success"></i> : {{ $details[$i*7+$j-$dayOfWeek-1]['available'] }}<br />
                                        @endif
                                        @if($details[$i*7+$j-$dayOfWeek-1]['waits'])
                                        <i class="fas fa-circle text-warning"></i> : {{ $details[$i*7+$j-$dayOfWeek-1]['waits'] }}<br />
                                        @endif
                                        @if($details[$i*7+$j-$dayOfWeek-1]['leaves'])
                                        <i class="fas fa-circle text-danger"></i> : {{ $details[$i*7+$j-$dayOfWeek-1]['leaves'] }}
                                        @endif
                                    </div>
                                </td>
                            @else
                                <td class="table-secondary"></td>
                            @endif
                        @endfor
                    </tr>
                @endfor
            </tbody>
        </table>
    </div>
@endsection

@push('js')
<script>
    function selectDay(day) {
        window.location.href = "/summary/{{$year}}/{{$month}}/"+day
    }
</script>
@endpush