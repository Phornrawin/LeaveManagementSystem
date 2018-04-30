@extends('layouts.user')

@section('main')

<div class="container">
  <div class="card mb-3"  >
    <div class="card-body row">
      <div class="col-sm-4">
        <img class="text-center card-pic border border-dark width="315" height="315" src="/profile_images/{{ $sub->image ?? 'default'.$sub->gender.'.png'}}">
      </div>
      <div class="col-sm-8">
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
          <h3 class="card-header bg-info">
            <a data-toggle="collapse" href="#tasks" class="text-white">
              <img src="data:image/svg+xml;utf8;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iaXNvLTg4NTktMSI/Pgo8IS0tIEdlbmVyYXRvcjogQWRvYmUgSWxsdXN0cmF0b3IgMTkuMS4wLCBTVkcgRXhwb3J0IFBsdWctSW4gLiBTVkcgVmVyc2lvbjogNi4wMCBCdWlsZCAwKSAgLS0+CjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB4bWxuczp4bGluaz0iaHR0cDovL3d3dy53My5vcmcvMTk5OS94bGluayIgdmVyc2lvbj0iMS4xIiBpZD0iQ2FwYV8xIiB4PSIwcHgiIHk9IjBweCIgdmlld0JveD0iMCAwIDQ4MS42IDQ4MS42IiBzdHlsZT0iZW5hYmxlLWJhY2tncm91bmQ6bmV3IDAgMCA0ODEuNiA0ODEuNjsiIHhtbDpzcGFjZT0icHJlc2VydmUiIHdpZHRoPSIyNHB4IiBoZWlnaHQ9IjI0cHgiPgo8Zz4KCTxnPgoJCTxwYXRoIGQ9Ik00ODAuNCwzNC40SDE2NC4xYy0wLjYsMC0xLjIsMC41LTEuMiwxLjJ2MjguMmMwLDAuNiwwLjUsMS4yLDEuMiwxLjJoMzE2LjNjMC42LDAsMS4yLTAuNSwxLjItMS4yVjM1LjYgICAgQzQ4MS42LDM0LjksNDgxLjEsMzQuNCw0ODAuNCwzNC40eiIgZmlsbD0iI0ZGRkZGRiIvPgoJCTxwYXRoIGQ9Ik0xNjQuMSwxMTZoMTU3LjVjMC42LDAsMS4yLTAuNSwxLjItMS4yVjg2LjZjMC0wLjYtMC41LTEuMi0xLjItMS4ySDE2NC4xYy0wLjYsMC0xLjIsMC41LTEuMiwxLjJ2MjguMiAgICBDMTYyLjksMTE1LjUsMTYzLjQsMTE2LDE2NC4xLDExNnoiIGZpbGw9IiNGRkZGRkYiLz4KCQk8cGF0aCBkPSJNNDgwLjQsMjAwSDE2NC4xYy0wLjYsMC0xLjIsMC41LTEuMiwxLjJ2MjguMmMwLDAuNiwwLjUsMS4yLDEuMiwxLjJoMzE2LjNjMC42LDAsMS4yLTAuNSwxLjItMS4ydi0yOC4yICAgIEM0ODEuNiwyMDAuNSw0ODEuMSwyMDAsNDgwLjQsMjAweiIgZmlsbD0iI0ZGRkZGRiIvPgoJCTxwYXRoIGQ9Ik0xNjQuMSwyODEuNmgxNTcuNWMwLjYsMCwxLjItMC41LDEuMi0xLjJ2LTI4LjJjMC0wLjYtMC41LTEuMi0xLjItMS4ySDE2NC4xYy0wLjYsMC0xLjIsMC41LTEuMiwxLjJ2MjguMiAgICBDMTYyLjksMjgxLjEsMTYzLjQsMjgxLjYsMTY0LjEsMjgxLjZ6IiBmaWxsPSIjRkZGRkZGIi8+CgkJPHBhdGggZD0iTTQ4MC40LDM2NS42SDE2NC4xYy0wLjYsMC0xLjIsMC41LTEuMiwxLjJWMzk1YzAsMC42LDAuNSwxLjIsMS4yLDEuMmgzMTYuM2MwLjYsMCwxLjItMC41LDEuMi0xLjJ2LTI4LjIgICAgQzQ4MS42LDM2Ni4xLDQ4MS4xLDM2NS42LDQ4MC40LDM2NS42eiIgZmlsbD0iI0ZGRkZGRiIvPgoJCTxwYXRoIGQ9Ik0zMjEuNiw0MTYuN0gxNjQuMWMtMC42LDAtMS4yLDAuNS0xLjIsMS4ydjI4LjJjMCwwLjYsMC41LDEuMiwxLjIsMS4yaDE1Ny41YzAuNiwwLDEuMi0wLjUsMS4yLTEuMnYtMjguMiAgICBDMzIyLjcsNDE3LjIsMzIyLjIsNDE2LjcsMzIxLjYsNDE2Ljd6IiBmaWxsPSIjRkZGRkZGIi8+CgkJPHBvbHlnb24gcG9pbnRzPSI1MS45LDc5IDI2LjUsNTMuNCAwLDc5LjggMjUuNCwxMDUuMyA1MS44LDEzMS44IDc4LjMsMTA1LjUgMTM4LjksNDUuMSAxMTIuNiwxOC42ICAgIiBmaWxsPSIjRkZGRkZGIi8+CgkJPHBvbHlnb24gcG9pbnRzPSI1MS45LDI0NC42IDI2LjUsMjE5IDAsMjQ1LjQgMjUuNCwyNzAuOSA1MS44LDI5Ny40IDc4LjMsMjcxLjEgMTM4LjksMjEwLjcgMTEyLjYsMTg0LjIgICAiIGZpbGw9IiNGRkZGRkYiLz4KCQk8cG9seWdvbiBwb2ludHM9IjUxLjksNDEwLjIgMjYuNSwzODQuNiAwLDQxMSAyNS40LDQzNi41IDUxLjgsNDYzIDc4LjMsNDM2LjYgMTM4LjksMzc2LjMgMTEyLjYsMzQ5LjggICAiIGZpbGw9IiNGRkZGRkYiLz4KCTwvZz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8L3N2Zz4K" />
              {{ count($tasks) }}  Tasks
            </a>
          </h3>
        </div>
        <div id="tasks" class="collapse" data-parent="#task-card">
          <div class="card-body">
            @if (count($tasks) == 0)
            <h3 class="display-5 text-muted text-center">No Task<h3>
            @else
            <table class="table table-hover">
              <thead>
                <tr class="table-info">
                  <th scope="col"></th>
                  <th scope="col">Task Name</th>
                  <th scope="col">Created At</th>
                  <th scope="col">Updated At</th>
                </tr>
              </thead>
              <tbody>
                @foreach($tasks as $task)
                <tr class="table-light">
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
                      <button type="submit" class="btn btn-info btn-lg text-white" style="font-size: 12px; width: 100%">
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
          <h3 class="card-header bg-warning">
            <a data-toggle="collapse" href="#leaves" class="text-white">
              <img src="data:image/svg+xml;utf8;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iaXNvLTg4NTktMSI/Pgo8IS0tIEdlbmVyYXRvcjogQWRvYmUgSWxsdXN0cmF0b3IgMTYuMC4wLCBTVkcgRXhwb3J0IFBsdWctSW4gLiBTVkcgVmVyc2lvbjogNi4wMCBCdWlsZCAwKSAgLS0+CjwhRE9DVFlQRSBzdmcgUFVCTElDICItLy9XM0MvL0RURCBTVkcgMS4xLy9FTiIgImh0dHA6Ly93d3cudzMub3JnL0dyYXBoaWNzL1NWRy8xLjEvRFREL3N2ZzExLmR0ZCI+CjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB4bWxuczp4bGluaz0iaHR0cDovL3d3dy53My5vcmcvMTk5OS94bGluayIgdmVyc2lvbj0iMS4xIiBpZD0iQ2FwYV8xIiB4PSIwcHgiIHk9IjBweCIgd2lkdGg9IjI0cHgiIGhlaWdodD0iMjRweCIgdmlld0JveD0iMCAwIDMxLjcwOSAzMS43MDkiIHN0eWxlPSJlbmFibGUtYmFja2dyb3VuZDpuZXcgMCAwIDMxLjcwOSAzMS43MDk7IiB4bWw6c3BhY2U9InByZXNlcnZlIj4KPGc+Cgk8Zz4KCQk8cGF0aCBkPSJNMTAuNTk1LDI1LjcxOUg0LjY5NmMtMS4xMjcsMC0yLjA2LTAuODg2LTIuMDYtMi4wMTNWNS40MmMwLTEuMTI3LDAuOTMzLTIuMDA2LDIuMDYtMi4wMDZoMTQuMjc3ICAgIGMxLjEyNywwLDIuMDQ3LDAuODc5LDIuMDQ3LDIuMDA2djE1LjMyM2wyLjYzNy0zLjEzNVYzLjQ2MmMwLTEuNDgyLTEuMTcyLTIuNjg0LTIuNjUyLTIuNjg0SDIuNTU5QzEuMTM2LDAuNzc4LDAsMS45MzIsMCwzLjM1NCAgICB2MjIuMzgyYzAsMS40ODIsMS4xODUsMi42ODgsMi42NjksMi42ODhoMTAuMzU4bC0xLjIyNC0xLjA2M0MxMS4yNjcsMjYuODk2LDEwLjg2NCwyNi4zMjcsMTAuNTk1LDI1LjcxOXoiIGZpbGw9IiNGRkZGRkYiLz4KCQk8cGF0aCBkPSJNMTcuODc1LDYuNzk0SDYuMDM0Yy0wLjcyOCwwLTEuMzE0LDAuNTkxLTEuMzE0LDEuMzE4YzAsMC43MjYsMC41ODcsMS4zMTcsMS4zMTQsMS4zMTdoMTEuODQgICAgYzAuNzI4LDAsMS4zMTItMC41OTEsMS4zMTItMS4zMTdDMTkuMTg4LDcuMzg2LDE4LjYwMiw2Ljc5NCwxNy44NzUsNi43OTR6IiBmaWxsPSIjRkZGRkZGIi8+CgkJPHBhdGggZD0iTTE3Ljg3NSwxMS4xODdINi4wMzRjLTAuNzI4LDAtMS4zMTQsMC41OS0xLjMxNCwxLjMxOGMwLDAuNzI0LDAuNTg3LDEuMzE4LDEuMzE0LDEuMzE4aDExLjg0ICAgIGMwLjcyOCwwLDEuMzEyLTAuNTk0LDEuMzEyLTEuMzE4QzE5LjE4OCwxMS43NzcsMTguNjAyLDExLjE4NywxNy44NzUsMTEuMTg3eiIgZmlsbD0iI0ZGRkZGRiIvPgoJCTxwYXRoIGQ9Ik0xNy44NzUsMTUuNTgxSDYuMDM0Yy0wLjcyOCwwLTEuMzE0LDAuNTU4LTEuMzE0LDEuMjg2YzAsMC43MjUsMC41ODcsMS4yODIsMS4zMTQsMS4yODJoMTEuODQgICAgYzAuNzI4LDAsMS4zMTItMC41NiwxLjMxMi0xLjI4MkMxOS4xODgsMTYuMTM5LDE4LjYwMiwxNS41ODEsMTcuODc1LDE1LjU4MXoiIGZpbGw9IiNGRkZGRkYiLz4KCQk8cGF0aCBkPSJNNC43MTksMjEuMDU2YzAsMC43MjcsMC41ODcsMS4yODMsMS4zMTQsMS4yODNoNC40MThjMC4xODUtMC40NzMsMC40NjktMS4wMjIsMC44NTctMS40NzkgICAgYzAuNDA4LTAuNDczLDAuODg5LTAuODIsMS40MTItMS4wOTJINi4wMzRDNS4zMDYsMTkuNzcxLDQuNzE5LDIwLjMzMSw0LjcxOSwyMS4wNTZ6IiBmaWxsPSIjRkZGRkZGIi8+CgkJPHBhdGggZD0iTTE3Ljg3NSwxOS43NzFoLTAuOTg4YzAuMzI0LDAuMTM3LDAuNjMzLDAuMzY2LDAuOTE2LDAuNjExbDEuMzEyLDEuMTIzYzAuMDUtMC4xMzUsMC4wNzYtMC4yOCwwLjA3Ni0wLjQzNyAgICBDMTkuMTg4LDIwLjM0NiwxOC42MDIsMTkuNzcxLDE3Ljg3NSwxOS43NzF6IiBmaWxsPSIjRkZGRkZGIi8+CgkJPHBhdGggZD0iTTMwLjg5OCwxNi4yNDljLTAuOTY1LTAuODI4LTIuNDItMC43MS0zLjI0NiwwLjI2bC03LjU2NCw4Ljg2N2wtMy43ODEtMy4yNDhjLTAuOTY4LTAuODI2LTIuNDIxLTAuNzE3LTMuMjQ4LDAuMjQ4ICAgIGMtMC44MjksMC45NjctMC43MTcsMi40MTgsMC4yNDgsMy4yNDZsNS41MzMsNC43NTJjMC40MjIsMC4zNTgsMC45NTEsMC41NTcsMS41LDAuNTU3YzAuMDYyLDAsMC4xMTktMC4wMDIsMC4xODItMC4wMDggICAgYzAuNjA3LTAuMDQ3LDEuMTc2LTAuMzM2LDEuNTcyLTAuODAxbDkuMDY2LTEwLjYyN0MzMS45ODIsMTguNTI4LDMxLjg2OSwxNy4wNzcsMzAuODk4LDE2LjI0OXoiIGZpbGw9IiNGRkZGRkYiLz4KCTwvZz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8L3N2Zz4K" />
              {{ count($leaves) }}  Leave
            </a>
          </h3>
        </div>
        <div id="leaves" class="collapse" data-parent="#leave-card">
          <div class="card-body" class="collapse">
            @if (count($leaves) == 0)
            <h3 class="display-5 text-muted text-center">No Leave<h3>
            @else
            <table class="table table-hover">
              <thead>
                <tr class="table-warning">
                  <th scope="col"></th>
                  <th scope="col">Substitute</th>
                  <th scope="col">Category</th>
                  <th scope="col">Task</th>
                  <th scope="col">Period</th>
                  <th scope="col">Start Date</th>
                  <th>Status</th>
                </tr>
              </thead>
              <tbody>
                @foreach($leaves as $leave)
                <tr class="table-default" onclick="window.location='/requests/' + {{ $leave->id }}">
                  <td scope="row">{{ $leave->id }}</td>
                  <td>{{ $leave->substitute()->first()->fullName }}</td>
                  <td>{{ $leave->category()->first()->name }}</td>
                  <td>{{ $leave->task()->first()->name }}</td>
                  <td>
                    <?php
                    $start = date_create($leave->start_date);
                    $end = date_create($leave->end_date);
                    echo date_diff($start, $end)->format("%a days");
                    ?>
                  </td>
                  <td>{{ $leave->start_date }}</td>
                  <td>{{ $leave->status }}</td>
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
