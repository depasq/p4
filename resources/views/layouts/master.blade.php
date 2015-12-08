<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" href="favicon-rocket.ico">
  <title>
     @yield('title',"Chandra Peer Review")
  </title>
  <!-- <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css" type='text/css'> -->
  <link href='https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css' rel='stylesheet'>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="css/p4.css" type='text/css'>

    @yield('head')

</head>

<body>

@if(\Session::has('flash_message'))
    <div class="flash_message">
        <p>{!! \Session::get('flash_message') !!}</p>
    </div>
@endif
<br>
<div class="page">
    <!-- Navigation -->
    <div class="container-fluid">
        <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
            <div class="container">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <!-- <img src="img/logo.png"></img> -->
                    <a class="navbar-brand" href="welcome">Chandra Cycle 18 Peer Review</a>
                </div>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        @if (Auth::check())
                            <li>
                                <a href="/travel">Travel</a>
                            </li>
                        @endif
                        <li>
                            <a href="/contact">Contact</a>
                        </li>
                        <li>
                            <a href="/about">About</a>
                        </li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        @if (Auth::check())
                            <li><a href="/profile">{!! $user->first !!}'s Profile</a></li>
                            <li><a href="/logout">Log Out</a></li>
                        @else
                            <li><a href="/login">Login</a></li>
                            <li><a href="/register">Register</a></li>
                        @endif
                    </ul>

                </div>
                <!-- /.navbar-collapse -->
            </div>
            <!-- /.container -->
        </nav>

        <div class="container-fluid">
            <div class="row">
                <div class="col-md-4 col-md-offset-4">
                    @if(Session::has('message'))
                    <div class="alert-box success">
                        <h2>{{ Session::get('message') }}</h2>
                    </div>
                    @endif
                </div>
            </div>
        </div>
        <div class="container">
            <!-- Page Content -->
            {{-- Main page content will be yielded here --}}
            @yield('content')
        </div>
    </div>

    <!-- jQuery Version 1.11.1 -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    {{-- Yield any page specific JS files or anything else you might want at the end of the body --}}
    @yield('body')
    
</div>
</body>
</html>
