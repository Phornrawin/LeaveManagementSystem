<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
        @yield("title")
    </title>
    <script src="{{ asset('js/app.js') }}" defer></script>
    @stack("js")

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.10/css/all.css" integrity="sha384-+d0P83n9kaQMCwj8F4RJB66tzIwOKmrdb46+porD/OvrJ+37WqIM7UoBtwHO6Nlg" crossorigin="anonymous">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
        main {
            margin-top: 50px;
        }
    </style>
    @stack("css")
    
</head>
<body>
    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
        <a class="navbar-brand" href="#">LeaveManagement</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto">
                
            </ul>
            @if(Auth::check())
            <form action="/logout" method="POST" style="margin: 0px">
                @csrf
                <button class="btn btn-danger" value="submit">sign out</button>
            </form>
            @else
            <form action="/login" method="GET" style="margin: 0px">
                @csrf
                <button class="btn btn-success" value="submit">sign in</button>
            </form>
            @endif
        </div>
    </nav>
    <main class="container-fluid">
        @yield("content")
    </main>
    
</body>
</html>