@extends('layouts.app')

@section('content')

<div class="container" style="width:80%">
  <div class="card mb-3" style="margin-top: 50px;">
    <div class="card-body row">
      <div class="col-sm-6">
        <img style="height: 325px; width: 100%;" src="{{ $sub->image }}" alt="Card image">
      </div>
      <div class="col-sm-6">
        <h3 class="display-4">
          {{ $sub->firstname . " " . $sub->lastname }}
        </h3>
        <h4 class="card-title text-muted display-5">{{ $sub->department()->first()->name }}</h4>
        <h4 class="card-title text-muted display-5">{{ $sub->position()->first()->name }}</h4>
        <a class="card-link text-muted">
          <img style="margin-right: 5px; margin-bottom: 10px" src="data:image/svg+xml;utf8;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iaXNvLTg4NTktMSI/Pgo8IS0tIEdlbmVyYXRvcjogQWRvYmUgSWxsdXN0cmF0b3IgMTguMS4xLCBTVkcgRXhwb3J0IFBsdWctSW4gLiBTVkcgVmVyc2lvbjogNi4wMCBCdWlsZCAwKSAgLS0+CjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB4bWxuczp4bGluaz0iaHR0cDovL3d3dy53My5vcmcvMTk5OS94bGluayIgdmVyc2lvbj0iMS4xIiBpZD0iQ2FwYV8xIiB4PSIwcHgiIHk9IjBweCIgdmlld0JveD0iMCAwIDU3OC4xMDYgNTc4LjEwNiIgc3R5bGU9ImVuYWJsZS1iYWNrZ3JvdW5kOm5ldyAwIDAgNTc4LjEwNiA1NzguMTA2OyIgeG1sOnNwYWNlPSJwcmVzZXJ2ZSIgd2lkdGg9IjMycHgiIGhlaWdodD0iMzJweCI+CjxnPgoJPGc+CgkJPHBhdGggZD0iTTU3Ny44Myw0NTYuMTI4YzEuMjI1LDkuMzg1LTEuNjM1LDE3LjU0NS04LjU2OCwyNC40OGwtODEuMzk2LDgwLjc4MSAgICBjLTMuNjcyLDQuMDgtOC40NjUsNy41NTEtMTQuMzgxLDEwLjQwNGMtNS45MTYsMi44NTctMTEuNzI5LDQuNjkzLTE3LjQzOSw1LjUwOGMtMC40MDgsMC0xLjYzNSwwLjEwNS0zLjY3NiwwLjMwOSAgICBjLTIuMDM3LDAuMjAzLTQuNjg5LDAuMzA3LTcuOTUzLDAuMzA3Yy03Ljc1NCwwLTIwLjMwMS0xLjMyNi0zNy42NDEtMy45NzlzLTM4LjU1NS05LjE4Mi02My42NDUtMTkuNTg0ICAgIGMtMjUuMDk2LTEwLjQwNC01My41NTMtMjYuMDEyLTg1LjM3Ni00Ni44MThjLTMxLjgyMy0yMC44MDUtNjUuNjg4LTQ5LjM2Ny0xMDEuNTkyLTg1LjY4ICAgIGMtMjguNTYtMjguMTUyLTUyLjIyNC01NS4wOC03MC45OTItODAuNzgzYy0xOC43NjgtMjUuNzA1LTMzLjg2NC00OS40NzEtNDUuMjg4LTcxLjI5OSAgICBjLTExLjQyNS0yMS44MjgtMTkuOTkzLTQxLjYxNi0yNS43MDUtNTkuMzY0UzQuNTksMTc3LjM2MiwyLjU1LDE2NC41MXMtMi44NTYtMjIuOTUtMi40NDgtMzAuMjk0ICAgIGMwLjQwOC03LjM0NCwwLjYxMi0xMS40MjQsMC42MTItMTIuMjRjMC44MTYtNS43MTIsMi42NTItMTEuNTI2LDUuNTA4LTE3LjQ0MnM2LjMyNC0xMC43MSwxMC40MDQtMTQuMzgyTDk4LjAyMiw4Ljc1NiAgICBjNS43MTItNS43MTIsMTIuMjQtOC41NjgsMTkuNTg0LTguNTY4YzUuMzA0LDAsOS45OTYsMS41MywxNC4wNzYsNC41OXM3LjU0OCw2LjgzNCwxMC40MDQsMTEuMzIybDY1LjQ4NCwxMjQuMjM2ICAgIGMzLjY3Miw2LjUyOCw0LjY5MiwxMy42NjgsMy4wNiwyMS40MmMtMS42MzIsNy43NTItNS4xLDE0LjI4LTEwLjQwNCwxOS41ODRsLTI5Ljk4OCwyOS45ODhjLTAuODE2LDAuODE2LTEuNTMsMi4xNDItMi4xNDIsMy45NzggICAgcy0wLjkxOCwzLjM2Ni0wLjkxOCw0LjU5YzEuNjMyLDguNTY4LDUuMzA0LDE4LjM2LDExLjAxNiwyOS4zNzZjNC44OTYsOS43OTIsMTIuNDQ0LDIxLjcyNiwyMi42NDQsMzUuODAyICAgIHMyNC42ODQsMzAuMjkzLDQzLjQ1Miw0OC42NTNjMTguMzYsMTguNzcsMzQuNjgsMzMuMzU0LDQ4Ljk2LDQzLjc2YzE0LjI3NywxMC40LDI2LjIxNSwxOC4wNTMsMzUuODAzLDIyLjk0OSAgICBjOS41ODgsNC44OTYsMTYuOTMyLDcuODU0LDIyLjAzMSw4Ljg3MWw3LjY0OCwxLjUzMWMwLjgxNiwwLDIuMTQ1LTAuMzA3LDMuOTc5LTAuOTE4YzEuODM2LTAuNjEzLDMuMTYyLTEuMzI2LDMuOTc5LTIuMTQzICAgIGwzNC44ODMtMzUuNDk2YzcuMzQ4LTYuNTI3LDE1LjkxMi05Ljc5MSwyNS43MDUtOS43OTFjNi45MzgsMCwxMi40NDMsMS4yMjMsMTYuNTIzLDMuNjcyaDAuNjExbDExOC4xMTUsNjkuNzY4ICAgIEM1NzEuMDk4LDQ0MS4yMzgsNTc2LjE5Nyw0NDcuOTY4LDU3Ny44Myw0NTYuMTI4eiIgZmlsbD0iIzAwMDAwMCIvPgoJPC9nPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+Cjwvc3ZnPgo=" />
          {{ $sub->tel }}
        </a>
        <br>
        <a class="card-link text-muted">
          <img style="margin-right: 5px; margin-bottom: 10px" src="data:image/svg+xml;utf8;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iaXNvLTg4NTktMSI/Pgo8IS0tIEdlbmVyYXRvcjogQWRvYmUgSWxsdXN0cmF0b3IgMTguMS4xLCBTVkcgRXhwb3J0IFBsdWctSW4gLiBTVkcgVmVyc2lvbjogNi4wMCBCdWlsZCAwKSAgLS0+CjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB4bWxuczp4bGluaz0iaHR0cDovL3d3dy53My5vcmcvMTk5OS94bGluayIgdmVyc2lvbj0iMS4xIiBpZD0iQ2FwYV8xIiB4PSIwcHgiIHk9IjBweCIgdmlld0JveD0iMCAwIDE0IDE0IiBzdHlsZT0iZW5hYmxlLWJhY2tncm91bmQ6bmV3IDAgMCAxNCAxNDsiIHhtbDpzcGFjZT0icHJlc2VydmUiIHdpZHRoPSIzMnB4IiBoZWlnaHQ9IjMycHgiPgo8Zz4KCTxnPgoJCTxwYXRoIGQ9Ik03LDlMNS4yNjgsNy40ODRsLTQuOTUyLDQuMjQ1QzAuNDk2LDExLjg5NiwwLjczOSwxMiwxLjAwNywxMmgxMS45ODYgICAgYzAuMjY3LDAsMC41MDktMC4xMDQsMC42ODgtMC4yNzFMOC43MzIsNy40ODRMNyw5eiIgZmlsbD0iIzAwMDAwMCIvPgoJCTxwYXRoIGQ9Ik0xMy42ODQsMi4yNzFDMTMuNTA0LDIuMTAzLDEzLjI2MiwyLDEyLjk5MywySDEuMDA3QzAuNzQsMiwwLjQ5OCwyLjEwNCwwLjMxOCwyLjI3M0w3LDggICAgTDEzLjY4NCwyLjI3MXoiIGZpbGw9IiMwMDAwMDAiLz4KCQk8cG9seWdvbiBwb2ludHM9IjAsMi44NzggMCwxMS4xODYgNC44MzMsNy4wNzkgICAiIGZpbGw9IiMwMDAwMDAiLz4KCQk8cG9seWdvbiBwb2ludHM9IjkuMTY3LDcuMDc5IDE0LDExLjE4NiAxNCwyLjg3NSAgICIgZmlsbD0iIzAwMDAwMCIvPgoJPC9nPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+Cjwvc3ZnPgo=">
          {{ $sub->email }}
        </a>
        <br>
        <a class="card-link text-info">
          <img style="margin-right: 5px; margin-bottom: 10px" src="data:image/svg+xml;utf8;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iaXNvLTg4NTktMSI/Pgo8IS0tIEdlbmVyYXRvcjogQWRvYmUgSWxsdXN0cmF0b3IgMTYuMC4wLCBTVkcgRXhwb3J0IFBsdWctSW4gLiBTVkcgVmVyc2lvbjogNi4wMCBCdWlsZCAwKSAgLS0+CjwhRE9DVFlQRSBzdmcgUFVCTElDICItLy9XM0MvL0RURCBTVkcgMS4xLy9FTiIgImh0dHA6Ly93d3cudzMub3JnL0dyYXBoaWNzL1NWRy8xLjEvRFREL3N2ZzExLmR0ZCI+CjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB4bWxuczp4bGluaz0iaHR0cDovL3d3dy53My5vcmcvMTk5OS94bGluayIgdmVyc2lvbj0iMS4xIiBpZD0iQ2FwYV8xIiB4PSIwcHgiIHk9IjBweCIgd2lkdGg9IjMycHgiIGhlaWdodD0iMzJweCIgdmlld0JveD0iMCAwIDkwIDkwIiBzdHlsZT0iZW5hYmxlLWJhY2tncm91bmQ6bmV3IDAgMCA5MCA5MDsiIHhtbDpzcGFjZT0icHJlc2VydmUiPgo8Zz4KCTxwYXRoIGlkPSJGYWNlYm9va19feDI4X2FsdF94MjlfIiBkPSJNOTAsMTUuMDAxQzkwLDcuMTE5LDgyLjg4NCwwLDc1LDBIMTVDNy4xMTYsMCwwLDcuMTE5LDAsMTUuMDAxdjU5Ljk5OCAgIEMwLDgyLjg4MSw3LjExNiw5MCwxNS4wMDEsOTBINDVWNTZIMzRWNDFoMTF2LTUuODQ0QzQ1LDI1LjA3Nyw1Mi41NjgsMTYsNjEuODc1LDE2SDc0djE1SDYxLjg3NUM2MC41NDgsMzEsNTksMzIuNjExLDU5LDM1LjAyNFY0MSAgIGgxNXYxNUg1OXYzNGgxNmM3Ljg4NCwwLDE1LTcuMTE5LDE1LTE1LjAwMVYxNS4wMDF6IiBmaWxsPSIjMDAwMDAwIi8+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPC9zdmc+Cg==" />
          {{ $sub->facebook }}
        </a>
        <br>
        <a class="card-link text-success">
          <img style="margin-right: 5px; margin-bottom: 10px" src="data:image/svg+xml;utf8;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iaXNvLTg4NTktMSI/Pgo8IS0tIEdlbmVyYXRvcjogQWRvYmUgSWxsdXN0cmF0b3IgMTguMC4wLCBTVkcgRXhwb3J0IFBsdWctSW4gLiBTVkcgVmVyc2lvbjogNi4wMCBCdWlsZCAwKSAgLS0+CjwhRE9DVFlQRSBzdmcgUFVCTElDICItLy9XM0MvL0RURCBTVkcgMS4xLy9FTiIgImh0dHA6Ly93d3cudzMub3JnL0dyYXBoaWNzL1NWRy8xLjEvRFREL3N2ZzExLmR0ZCI+CjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB4bWxuczp4bGluaz0iaHR0cDovL3d3dy53My5vcmcvMTk5OS94bGluayIgdmVyc2lvbj0iMS4xIiBpZD0iQ2FwYV8xIiB4PSIwcHgiIHk9IjBweCIgdmlld0JveD0iMCAwIDQ1NS43MzEgNDU1LjczMSIgc3R5bGU9ImVuYWJsZS1iYWNrZ3JvdW5kOm5ldyAwIDAgNDU1LjczMSA0NTUuNzMxOyIgeG1sOnNwYWNlPSJwcmVzZXJ2ZSIgd2lkdGg9IjMycHgiIGhlaWdodD0iMzJweCI+CjxnPgoJPHBhdGggZD0iTTE4OC43MjksMTY1LjE3NWgtMy43M2MtMy42OCwwLTYuNjYsMi45OS02LjY2LDYuNjd2NjguMTRjMCwzLjY4LDIuOTgsNi42Nyw2LjY2LDYuNjdoMy43M2MzLjY4LDAsNi42Ny0yLjk5LDYuNjctNi42NyAgIHYtNjguMTRDMTk1LjM5OSwxNjguMTY1LDE5Mi40MDksMTY1LjE3NSwxODguNzI5LDE2NS4xNzV6IiBmaWxsPSIjMDAwMDAwIi8+Cgk8cGF0aCBkPSJNMjY2LjIwOSwxNjUuMTc1Yy0yLjM2LDAtNC40OSwwLjk2LTYuMDMsMi41Yy0xLjU1LDEuNTQtMi41LDMuNjgtMi41LDYuMDN2MzkuMzVjMCwwLTM0LjA3LTQ0LjQ0LTM0LjU5LTQ1LjAyICAgYy0xLjYzLTEuODMtNC4wMy0yLjk1LTYuNjktMi44NWMtNC42NCwwLjE3LTguMiw0LjIzLTguMiw4Ljg3djY0LjA3YzAsNC43MSwzLjgyLDguNTMsOC41Myw4LjUzYzIuMzYsMCw0LjQ5LTAuOTYsNi4wMy0yLjUgICBjMS41NS0xLjU0LDIuNS0zLjY4LDIuNS02LjAzdi0zOS4xMmMwLDAsMzQuNTksNDQuODMsMzUuMSw0NS4zMWMxLjUxLDEuNDMsMy41NCwyLjMyLDUuNzcsMi4zNGM0Ljc0LDAuMDQsOC42MS00LjE1LDguNjEtOC44OSAgIHYtNjQuMDZDMjc0LjczOSwxNjguOTk0LDI3MC45MTksMTY1LjE3NSwyNjYuMjA5LDE2NS4xNzV6IiBmaWxsPSIjMDAwMDAwIi8+Cgk8cGF0aCBkPSJNMTYxLjY5OSwyMjkuNTg0aC0yNS42di01NS44OGMwLTQuNzEtMy44Mi04LjUzLTguNTMtOC41M2MtMi4zNiwwLTQuNDksMC45Ni02LjAzLDIuNWMtMS41NSwxLjU0LTIuNSwzLjY4LTIuNSw2LjAzdjY0LjQyICAgYzAsNC43MSwzLjgyLDguNTMsOC41Myw4LjUzaDM0LjEzYzQuNzEsMCw4LjUzLTMuODIsOC41My04LjUzYzAtMi4zNi0wLjk2LTQuNDktMi41LTYuMDQgICBDMTY2LjE4OSwyMzAuNTM0LDE2NC4wNDksMjI5LjU4NCwxNjEuNjk5LDIyOS41ODR6IiBmaWxsPSIjMDAwMDAwIi8+Cgk8cGF0aCBkPSJNMzMwLjE5OSwxODIuMjM1YzQuNzEsMCw4LjUzLTMuODIsOC41My04LjUzYzAtNC43MS0zLjgyLTguNTMtOC41My04LjUzaC0zNC4xM2MtNC43MSwwLTguNTMsMy44Mi04LjUzLDguNTN2NjQuNDIgICBjMCw0LjcxLDMuODIsOC41Myw4LjUzLDguNTNoMzQuMTNjNC43MSwwLDguNTMtMy44Miw4LjUzLTguNTNjMC0yLjM2LTAuOTYtNC40OS0yLjUtNi4wNGMtMS41NC0xLjU1LTMuNjgtMi41LTYuMDMtMi41aC0yNS42ICAgdi0xNS4xNGgyNS42YzQuNzEsMCw4LjUzLTMuODIsOC41My04LjUzYzAtMi4zNi0wLjk2LTQuNDktMi41LTYuMDNjLTEuNTQtMS41NS0zLjY4LTIuNS02LjAzLTIuNWgtMjUuNnYtMTUuMTVIMzMwLjE5OXoiIGZpbGw9IiMwMDAwMDAiLz4KCTxwYXRoIGQ9Ik0wLDB2NDU1LjczMWg0NTUuNzMxVjBIMHogTTM5NC41ODksMjA5LjUxNGMtMC4xNywyLjY2LTAuNTUsNi4wNi0xLjMyLDEwLjA5Yy0yLjA1LDEyLjg1LTYuNDEsMjUuMTItMTIuNzUsMzYuNTUgICBjLTIuOTgsNS4zOS0xNy42MSwyNS44OS0yMi4xLDMxLjI5Yy0yNC42NiwyOS43MS02NS45NSw2My45OS0xMzUsOTcuMzJjLTYuNDUsMy4xMS0xMy44LTIuMDctMTMuMDEtOS4xOGwzLjQ4LTMxLjMyICAgYzAuNTYtNC45OS0zLjA1LTkuNS04LjA0LTEwLjAzYy04MS43NC04LjU1LTE0NC44Mi02NC4xOC0xNDQuODItMTMxLjUyYzAtNzMuMjcsNzQuNjctMTMyLjY3LDE2Ni43OS0xMzIuNjcgICBjODkuNTIsMCwxNjIuNTcsNTYuMSwxNjYuNjIsMTI2LjUxQzM5NC41NDksMTk4LjU5NCwzOTQuODc5LDIwNS4xMTUsMzk0LjU4OSwyMDkuNTE0eiIgZmlsbD0iIzAwMDAwMCIvPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+Cjwvc3ZnPgo=" />
          {{ $sub->line }}
        </a>
      </div>
    </div>
    <div class="card-body">
      <div class="card mb-3" id="task-card">
        <div data-toggle="collapse" data-target="#tasks">
          <h3 class="card-header">
            <a data-toggle="collapse" href="#tasks">{{ count($tasks) }}  Tasks</a>
          </h3>
        </div>
        <div id="tasks" class="collapse" data-parent="#task-card">
          <div class="card-body">
            @if (count($tasks) == 0)
            <h3 class="display-5 text-muted text-center">No Task<h3>
            @else
            <table class="table">
              <thead>
                <tr class="table-primary">
                  <th scope="col"></th>
                  <th scope="col">Task Name</th>
                  <th scope="col">Created At</th>
                  <th scope="col">Updated At</th>
                </tr>
              </thead>
              <tbody>
                @foreach($tasks as $task)
                <tr class="table-secondary">
                  <td scope="row">{{ $task->id }}</td>
                  <td>
                    <a href="">
                      {{ $task->name }}
                    </a>
                  </td>
                  <td>{{ $sub->created_at }}</td>
                  <td>{{ $sub->updated_at }}</td>
                </tr>
                @endforeach
              </tbody>
            </table>
            @endif
            <div class="text-right">
              <form action="/subs/{{ $sub->id }}" method="post">
                @csrf
                <div class="row">
                  <div class="col-sm-6">

                  </div>
                  <div class="col-sm-6">
                    <div class="row">
                      <div class="col-sm-8">
                      <input name="name" value="{{ old('name') }}" type="text" class="form-control" id="name-input" placeholder="Enter Task Name">
                      <p class="form-text text-danger">{{ $errors->first('name') }}</p>
                    </div>
                    <div class="col-sm-4">
                      <button type="submit" class="btn btn-primary btn-lg text-white" style="font-size: 12px; width: 100%">
                        <img style="margin-right: 5px" src="data:image/svg+xml;utf8;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iaXNvLTg4NTktMSI/Pgo8IS0tIEdlbmVyYXRvcjogQWRvYmUgSWxsdXN0cmF0b3IgMTkuMC4wLCBTVkcgRXhwb3J0IFBsdWctSW4gLiBTVkcgVmVyc2lvbjogNi4wMCBCdWlsZCAwKSAgLS0+CjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB4bWxuczp4bGluaz0iaHR0cDovL3d3dy53My5vcmcvMTk5OS94bGluayIgdmVyc2lvbj0iMS4xIiBpZD0iQ2FwYV8xIiB4PSIwcHgiIHk9IjBweCIgdmlld0JveD0iMCAwIDQ4OS44IDQ4OS44IiBzdHlsZT0iZW5hYmxlLWJhY2tncm91bmQ6bmV3IDAgMCA0ODkuOCA0ODkuODsiIHhtbDpzcGFjZT0icHJlc2VydmUiIHdpZHRoPSIxNnB4IiBoZWlnaHQ9IjE2cHgiPgo8Zz4KCTxnPgoJCTxwYXRoIGQ9Ik00MzguMiwwSDUxLjZDMjMuMSwwLDAsMjMuMiwwLDUxLjZ2Mzg2LjZjMCwyOC41LDIzLjIsNTEuNiw1MS42LDUxLjZoMzg2LjZjMjguNSwwLDUxLjYtMjMuMiw1MS42LTUxLjZWNTEuNiAgICBDNDg5LjgsMjMuMiw0NjYuNiwwLDQzOC4yLDB6IE00NjUuMyw0MzguMmMwLDE0LjktMTIuMiwyNy4xLTI3LjEsMjcuMUg1MS42Yy0xNC45LDAtMjcuMS0xMi4yLTI3LjEtMjcuMVY1MS42ICAgIGMwLTE0LjksMTIuMi0yNy4xLDI3LjEtMjcuMWgzODYuNmMxNC45LDAsMjcuMSwxMi4yLDI3LjEsMjcuMVY0MzguMnoiIGZpbGw9IiNGRkZGRkYiLz4KCQk8cGF0aCBkPSJNMzM3LjQsMjMyLjdoLTgwLjN2LTgwLjNjMC02LjgtNS41LTEyLjMtMTIuMy0xMi4zcy0xMi4zLDUuNS0xMi4zLDEyLjN2ODAuM2gtODAuM2MtNi44LDAtMTIuMyw1LjUtMTIuMywxMi4yICAgIGMwLDYuOCw1LjUsMTIuMywxMi4zLDEyLjNoODAuM3Y4MC4zYzAsNi44LDUuNSwxMi4zLDEyLjMsMTIuM3MxMi4zLTUuNSwxMi4zLTEyLjN2LTgwLjNoODAuM2M2LjgsMCwxMi4zLTUuNSwxMi4zLTEyLjMgICAgQzM0OS43LDIzOC4xLDM0NC4yLDIzMi43LDMzNy40LDIzMi43eiIgZmlsbD0iI0ZGRkZGRiIvPgoJPC9nPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+Cjwvc3ZnPgo=" />
                        ADD NEW TASK
                      </button>
                    </div>
                  </div>
                </div>
                </div>
              </form>
            </div>
          </div>
        </div>
        <div data-toggle="collapse" data-target="#leaves">
          <h3 class="card-header">
            <a data-toggle="collapse" href="#leaves">{{ count($leaves) }}  Leave</a>
          </h3>
        </div>
        <div id="leaves" class="collapse" data-parent="#leave-card">
          <div class="card-body" class="collapse">
            @if (count($leaves) == 0)
            <h3 class="display-5 text-muted text-center">No Leave<h3>
            @else
            <table class="table">
              <thead>
                <tr class="table-primary">
                  <th scope="col"></th>
                  <th scope="col">Substitute</th>
                  <th scope="col">Category</th>
                  <th scope="col">Task</th>
                  <th scope="col"></th>
                </tr>
              </thead>
              <tbody>
                @foreach($leaves as $leave)
                <tr class="table-secondary">
                  <td scope="row">{{ $leave->id }}</td>
                  <td>
                    <a href="">
                      {{ $leave->substitute()->first()->firstname . " " . $leave->substitute()->first()->lastname }}
                    </a>
                  </td>
                  <td>{{ $leave->category()->first()->name }}</td>
                  <td>{{ $leave->task()->first()->name }}</td>
                  <td>
                    <div class="row">
                      <div class="col-sm-6">
                      </div>
                      <div class="col-sm-3">
                        <form action="/subs/{{ $sub->id }}" method="post">
                          @method('PUT')
                          @csrf
                          <input type="hidden" name="status" value="approved">
                          <input type="hidden" name="leave_id" value="{{ $leave->id }}">
                          <button type="submit" class="btn btn-success">APPROVE</button>
                        </form>
                      </div>
                      <div class="col-sm-3">
                        <form action="/subs/{{ $sub->id }}" method="post">
                          @method('PUT')
                          @csrf
                          <input type="hidden" name="status" value="rejected">
                          <input type="hidden" name="leave_id" value="{{ $leave->id }}">
                          <button type="submit" class="btn btn-danger">REJECT</button>
                        </form>
                      </div>
                    </div>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
            @endif
          </div>
        </div>
      </div>
    </div>
  </div>

</div>

@endsection
