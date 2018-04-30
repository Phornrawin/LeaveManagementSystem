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
    table.table-bordered{
        border:1px solid blue;
      }
    table.table-bordered > thead > tr > th{
        border:1px solid blue;
    }
    table.table-bordered > tbody > tr > td{
        border:1px solid blue;
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
                            <span class="float-left"><a href="/summary/{{$year-1}}"><i class="fas fa-arrow-left"></i></a></span>
                            {{$year}}
                            <span class="float-right"><a href="/summary/{{$year+1}}"><i class="fas fa-arrow-right"></i></a></span>
                        </h3>
                    </th>
                </tr>
            </thead>
            <tbody>
                @for($i=0;$i<3;$i++)
                <tr>
                    @for($j=1;$j<5;$j++)
                        <td onclick="selectMonth({{$i*4+$j}})" id="month{{$i*4+$j}}">{{date('M', strtotime($year.'-'.($i*4+$j)))}}</td>
                    @endfor
                </tr>
                @endfor
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