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
                        @if($hasMonth)
                            <span class="float-left"><a href="/summary/{{$year}}"><i class="fas fa-arrow-left"></i></a></span>
                            {{$date}}
                        @else
                            <span class="float-left"><a href="/summary/{{$year-1}}"><i class="fas fa-arrow-left"></i></a></span>
                            {{$date}}
                            <span class="float-right"><a href="/summary/{{$year+1}}"><i class="fas fa-arrow-right"></i></a></span>
                        @endif
                        </h3>
                    </th>
                </tr>
                @if($hasMonth)
                <tr class="bg-info">
                    <th scope="col" class="text-center">Sun.</th>
                    <th scope="col" class="text-center">Mon.</th>
                    <th scope="col" class="text-center">Tue.</th>
                    <th scope="col" class="text-center">Wed.</th>
                    <th scope="col" class="text-center">Thu.</th>
                    <th scope="col" class="text-center">Fri.</th>
                    <th scope="col" class="text-center">Sat.</th>
                </tr>
                @endif
            </thead>
            <tbody>
                @if($hasMonth)
                    @for($i=0;$i<6;$i++)
                    <tr>
                        @for($j=1;$j<8;$j++)
                            @if($i*7+$j > $dayOfWeek and $i*7+$j-$dayOfWeek <= cal_days_in_month(CAL_GREGORIAN, $month, $year))
                                <td {{date('Y-m-d')==$year.'-'.$month.'-'.($i*7+$j-$dayOfWeek) ? "class=table-danger" : ""}} id="day{{$i*7+$j-$dayOfWeek}}"><span class="float-right small align-top">{{$i*7+$j-$dayOfWeek}}</span></td>
                            @else
                                <td class="table-secondary"></td>
                            @endif
                        @endfor
                    </tr>
                    @endfor
                @else
                    @for($i=0;$i<3;$i++)
                    <tr>
                        @for($j=1;$j<5;$j++)
                            <td onclick="selectMonth({{$i*4+$j}})" id="month{{$i*4+$j}}">{{date('M', strtotime($year.'-'.($i*4+$j)))}}</td>
                        @endfor
                    </tr>
                    @endfor
                @endif
            </tbody>
        </table>
    </div>
@endsection

@push('js')
<script>
    function selectMonth(month) {
        window.location.href = "/summary/{{$year}}/"+month
    }
</script>
@endpush