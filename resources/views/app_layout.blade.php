<?
include base_path().'/resources/views/init.php'
?>

<html>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<!-- Meta, title, CSS, favicons, etc. -->
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>{{Lang::get('app.appName')}}</title>

@include('css')

@include('js')

<body class="nav-md">

@yield ('screen header')

<ul class="nav navbar-nav navbar-right">
    <li class="">
        <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
            <img src="/images/foto.jpg" alt="">John Doe
            <span class=" fa fa-angle-down"></span>
        </a>
        <ul class="dropdown-menu dropdown-usermenu pull-right">
            <li><a href="javascript:;"> Profile</a>
            </li>
            <li>
                <a href="javascript:;">Help</a>
            </li>
            <li><a href="/logout"><i class="fa fa-sign-out pull-right"></i> Log Out</a>
            </li>
        </ul>
    </li>
</ul>
<div class="container body col-md-12">

    <div class="row">
        @yield ('screen body')
    </div>
</div>

@yield ('screen footer')
@include('notify')
@include('please_wait')


</body>
</html>