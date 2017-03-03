<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Netwurxs |Admin Login</title>

    <link href="{{ url('administration/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ url('administration/font-awesome/css/font-awesome.css') }}" rel="stylesheet">

    <link href="{{ url('administration/css/animate.css') }}" rel="stylesheet">
    <link href="{{ url('administration/css/style.css') }}" rel="stylesheet">

</head>

<body class="gray-bg">

<div class="middle-box text-center loginscreen animated fadeInDown">
    <div>
        <div>

            <h1 class="logo-name"><img src="{{ url('img/logo.png') }}"></h1>

        </div>
        
        <form class="m-t" role="form" action="{{ url('admin/login') }}" method="post">
            {{ csrf_field() }}
            <div class="form-group">
                <input type="email" class="form-control" placeholder="Email" required="" name="email">
            </div>
            <div class="form-group">
                <input type="password" class="form-control" placeholder="Password" required="" name="password">
            </div>
            <button type="submit" class="btn btn-primary block full-width m-b">Login</button>

            <a href="#"><small>Forgot password?</small></a>
        </form>
        <p class="m-t"> <small>Inspinia we app framework base on Bootstrap 3 &copy; 2014</small> </p>
    </div>
</div>

<!-- Mainly scripts -->
<script src="{{ url('adminstration/js/jquery-2.1.1.js') }}"></script>
<script src="{{ url('adminisreation/js/bootstrap.min.js') }}"></script>

</body>

</html>
