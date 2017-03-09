<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>INSPINIA | Dashboard</title>

    <link href="{{ url('administration/css/bootstrap.min.css' ) }} " rel="stylesheet">
    <link href="{{ url('administration/font-awesome/css/font-awesome.css' ) }} " rel="stylesheet">

    <!-- Toastr style -->
    <link href="{{ url('administration/css/plugins/toastr/toastr.min.css' ) }} " rel="stylesheet">

    <!-- Gritter -->
    <link href="{{ url('administration/js/plugins/gritter/jquery.gritter.css' ) }} " rel="stylesheet">

    <link href="{{ url('administration/css/animate.css' ) }} " rel="stylesheet">
    <link href="{{ url('administration/css/style.css' ) }} " rel="stylesheet">
    <link href="{{ url('administration/css/custom.css' ) }} " rel="stylesheet">

    <script src="{{ url('dist/sweetalert.min.js') }}"></script>
    <link rel="stylesheet" type="text/css" href="{{ url('dist/sweetalert.css') }}">

</head>

<body>
<div id="wrapper">
    @include('admin.layouts.partials.sidebar')

    <div id="page-wrapper" class="gray-bg dashbard-1">
        <div class="row border-bottom">
            @include('admin.layouts.partials.header')
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="wrapper wrapper-content">
                    @yield('content')
                </div>
                @include('admin.layouts.partials.footer')
            </div>
        </div>

    </div>
    <div class="small-chat-box fadeInRight animated">

        <div class="heading" draggable="true">
            <small class="chat-date pull-right">
                02.19.2015
            </small>
            Small chat
        </div>

        <div class="content">

            <div class="left">
                <div class="author-name">
                    Monica Jackson
                    <small class="chat-date">
                        10:02 am
                    </small>
                </div>
                <div class="chat-message active">
                    Lorem Ipsum is simply dummy text input.
                </div>

            </div>
            <div class="right">
                <div class="author-name">
                    Mick Smith
                    <small class="chat-date">
                        11:24 am
                    </small>
                </div>
                <div class="chat-message">
                    Lorem Ipsum is simpl.
                </div>
            </div>
            <div class="left">
                <div class="author-name">
                    Alice Novak
                    <small class="chat-date">
                        08:45 pm
                    </small>
                </div>
                <div class="chat-message active">
                    Check this stock char.
                </div>
            </div>
            <div class="right">
                <div class="author-name">
                    Anna Lamson
                    <small class="chat-date">
                        11:24 am
                    </small>
                </div>
                <div class="chat-message">
                    The standard chunk of Lorem Ipsum
                </div>
            </div>
            <div class="left">
                <div class="author-name">
                    Mick Lane
                    <small class="chat-date">
                        08:45 pm
                    </small>
                </div>
                <div class="chat-message active">
                    I belive that. Lorem Ipsum is simply dummy text.
                </div>
            </div>


        </div>
        <div class="form-chat">
            <div class="input-group input-group-sm"><input type="text" class="form-control"> <span
                        class="input-group-btn"> <button
                            class="btn btn-primary" type="button">Send
                </button> </span></div>
        </div>

    </div>
    <div id="small-chat">

        <span class="badge badge-warning pull-right">5</span>
        <a class="open-small-chat">
            <i class="fa fa-comments"></i>

        </a>
    </div>

</div>

<!-- Mainly scripts -->
<script src="{{ url('administration/js/jquery-2.1.1.js') }} "></script>
<script src="{{ url('administration/js/bootstrap.min.js') }} "></script>
<script src="{{ url('administration/js/plugins/metisMenu/jquery.metisMenu.js') }} "></script>
<script src="{{ url('administration/js/plugins/slimscroll/jquery.slimscroll.min.js') }} "></script>

<!-- Flot -->
<script src="{{ url('administration/js/plugins/flot/jquery.flot.js') }} "></script>
<script src="{{ url('administration/js/plugins/flot/jquery.flot.tooltip.min.js') }} "></script>
<script src="{{ url('administration/js/plugins/flot/jquery.flot.spline.js') }} "></script>
<script src="{{ url('administration/js/plugins/flot/jquery.flot.resize.js') }} "></script>
<script src="{{ url('administration/js/plugins/flot/jquery.flot.pie.js') }} "></script>

<!-- Peity -->
<script src="{{ url('administration/js/plugins/peity/jquery.peity.min.js') }} "></script>
<script src="{{ url('administration/js/demo/peity-demo.js') }} "></script>

<!-- Custom and plugin javascript -->
<script src="{{ url('administration/js/inspinia.js') }} "></script>
<script src="{{ url('administration/js/plugins/pace/pace.min.js') }} "></script>

<!-- jQuery UI -->
<script src="{{ url('administration/js/plugins/jquery-ui/jquery-ui.min.js') }} "></script>

<!-- GITTER -->
<script src="{{ url('administration/js/plugins/gritter/jquery.gritter.min.js') }} "></script>

<!-- Sparkline -->
<script src="{{ url('administration/js/plugins/sparkline/jquery.sparkline.min.js') }} "></script>

<!-- Sparkline demo data  -->
<script src="{{ url('administration/js/demo/sparkline-demo.js') }} "></script>

<!-- ChartJS-->
<script src="{{ url('administration/js/plugins/chartJs/Chart.min.js') }} "></script>

<!-- Toastr -->
<script src="{{ url('administration/js/plugins/toastr/toastr.min.js') }} "></script>




@yield('script')
</body>
</html>
