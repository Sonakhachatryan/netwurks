<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <title>Netwurxs</title>
    <link rel="stylesheet" href="{{ url('css/font-awesome.css') }}">
    <link rel="stylesheet" href="{{ url('css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ url('css/main.css') }}">
    <link rel="stylesheet" href="{{ url('css/hover.css') }}">
    @yield('style')
</head>
<body>

<header class="">
    <div id="first-block-content">
        <h1>
            <a href="#">
                <img src="img/logo.png" alt="logo">
            </a>
        </h1>
        <ul class="contentId">
            <li>
                <a href="{{ url('/') }}" data-list="one">
                    Welcome
                </a>
            </li>
            <li>
                <a href="#" data-list="two">
                    About Us
                </a>
            </li>
            <li>
                <a href="#" data-list="three">
                    Customer submission
                </a>
            </li>
            <li>
                <a href="#" data-list="four">
                    Associates
                </a>
            </li>
            <li>
                <a href="#" data-list="five">
                    Feedback
                </a>
            </li>
            <li>
                <a href="#" data-list="six">
                    Organizational structure
                </a>
            </li>
            <li>
                <a href="#" data-list="seven">
                    Contact
                </a>
            </li>
            <li>
                <div>
                    @if(!auth()->guard('user')->check())
                        <a class="login-popup" href="#">Login</a>
                    @else
                        <a href="{{ url('/home') }}">{{ $user->name }}</a>
                    @endif
                </div>
            </li>

        </ul>
        <div class="clear-both"></div>
    </div>
    <div class="nav-icon">
        <i class="fa fa-bars" aria-hidden="true"></i>
    </div>
    <!-- <div class="first-block">
         <div class="first-block-left first-block-inner"></div>
         <div class="first-block-center">
             <h1>
                 <a href="#">
                     <img src="img/logo.png" alt="logo">
                 </a>
             </h1>
             <ul>
                 <li>
                     <a href="#">
                         Welcome
                     </a>
                 </li>
                 <li>
                     <a href="#">
                         About Us
                     </a>
                 </li>
                 <li>
                     <a href="#">
                         Customer submission
                     </a>
                 </li>
                 <li>
                     <a href="#">
                         Associates
                     </a>
                 </li>
                 <li>
                     <a href="#">
                         Feedback
                     </a>
                 </li>
                 <li>
                     <a href="#">
                         Organizational structure
                     </a>
                 </li>
                 <li>
                     <a href="#">
                         Contact
                     </a>
                 </li>
                 <li>
                     <a href="#">
                         Login
                     </a>
                 </li>
             </ul>
         </div>
         <div class="first-block-right first-block-inner"></div>
     </div>-->
</header>

<div class="login-inner">
    <div class="times-list pull-right"></div>
    <div class="clear-both"></div>
    <div class="login-inner-list">
        <h3>Login to your account</h3>
        <form action="{{ url('login') }}" method="post">
            {{ csrf_field() }}
            <div class="username">
                <input type="email" placeholder="Email" name="email">
            </div>
            <div class="password">
                <input type="password" placeholder="Password" name="password">
            </div>
            <div class="login-inner-list-bottom">
                <a href="{{ url('') }}">Forgot your Password</a>
                <button class="pull-right">Login</button>
                <div class="clear-both"></div>
            </div>
        </form>
    </div>
</div>

<main>
    @yield('content')
</main>

@yield('footer')

<script src="{{ url('js/jquery-2.2.4.min.js') }}"></script>
<script src="{{ url('js/bootstrap.js') }}"></script>
<script src="{{ url('js/script-js.js') }}"></script>
@yield('script')
</body>
</html>