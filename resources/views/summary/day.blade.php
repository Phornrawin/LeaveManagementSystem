@extends('layouts.user')

@push('css')
<style>
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
                    <th colspan="3" id="month" class="text-center">
                        <h3>
                            <span class="float-left"><a href="/summary/{{$year}}/{{$month}}"><i class="fas fa-arrow-left"></i></a></span>
                            {{$date}}
                        </h3>
                    </th>
                </tr>
                <tr class="bg-info">
                    <th scope="col" class="text-center" width="33%">Active</th>
                    <th scope="col" class="text-center" width="33%">Requests Pending</th>
                    <th scope="col" class="text-center" width="33%">Leaves</th>
                </tr>
            </thead>
            <tbody>
                @if ($count == 0)
                    <tr>
                        <td colspan="3">
                            <h2 class="text-center">You do not have subordinates.</h2>
                        </td>
                    </tr>
                @else
                    @for($i=0;$i<$count;$i++)
                    <tr>
                        <td>
                            @if($i < count($active))
                                <a href="/substitions/{{$active[$i]->id}}" class="text-dark">{{$active[$i]->fullName}}</a>
                            @endif
                        </td>
                        <td>
                            @if($i < count($pending))
                                <a href="/requests/{{$pending[$i]->id}}" class="text-dark">{{$pending[$i]->user->fullName}}</a>
                            @endif
                        </td>
                        <td>
                            @if($i < count($absence))
                                <a href="/requests/{{$absence[$i]->id}}" class="text-dark">{{$absence[$i]->user->fullName}}</a>
                            @endif
                        </td>
                    </tr>
                    @endfor
                @endif
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