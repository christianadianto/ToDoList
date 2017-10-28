<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('bootstrap-3.3.7-dist/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{asset('css/bootstrap.css')}}" rel="stylesheet">
    <link href="{{asset('css/bootstrap-select.css')}}" rel="stylesheet">
    <script src="{{asset('js/jquery-3.2.1.js')}}"></script>
    <script src={{asset('js/bootstrap.js')}}></script>
    <script src="{{asset('js/bootstrap-select.js')}}"></script>
    <link href="{{ asset('css/master_ab.css') }}" rel="stylesheet">

    <title>NA-Task</title>
</head>
<body>
    <div class="header">
        <nav class="navbar navbar-inverse">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand" href="#">NA-TASK</a>
                </div>
                <ul class="nav navbar-nav">
                    <li class="active"><a href="/home_ab">Home</a></li>
                    <li><a href="#">Insert Task</a></li>
                </ul>
            </div>
        </nav>
    </div>
    @yield('content')
</body>
</html>