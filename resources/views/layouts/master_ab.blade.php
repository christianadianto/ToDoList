<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>NA-Task</title>
    @include('layouts.header_ab')
    <link href="{{ asset('css/master_ab.css') }}" rel="stylesheet">
</head>
<body>
    {{--START HEADER--}}
    <div class="header">
        <nav class="navbar navbar-inverse">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand" href="#">NA-TASK</a>
                </div>
                <ul class="nav navbar-nav">
                    <li class="active"><a href="#">Home</a></li>
                    <li><a href="#">Home</a></li>
                    <li><a href="#">Insert Task</a></li>
                </ul>
            </div>
        </nav>
    </div>
    {{--END HEADER--}}
    <div class="content">
        <div class="container">
            <div class="col-md-offset-4 col-md-4">
                <div class="box">
                    <div class="form-group">
                        <div class="form-text">
                            <span>Task Name</span>
                        </div>
                        <input type="text" class="form-control">
                    </div>
                    <div class="form-group">
                        <div class="form-text">
                            <span>Description</span>
                        </div>
                        <textarea class="form-control" rows="5"></textarea>
                    </div>
                    <div class="form-group">
                        <div class="form-text">
                            <span>PIC</span>
                        </div>
                        <select class="form-control">
                            <option>AB</option>
                            <option>CA</option>
                            <option>BP</option>
                        </select>
                    </div>
                    <div class="text-center form-group btn-form-group">
                        <button class="btn btn-default btn-submit">Insert</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>