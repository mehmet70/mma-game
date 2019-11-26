<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, shrink-to-fit=no, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Simple Sidebar - Start Bootstrap Template</title>

    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

    <!-- Bootstrap Core CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">

    <!-- Custom CSS -->
    <link href="/css/simple-sidebar.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>

    <![endif]-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>


</head>

<body>

<div id="wrapper">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Sidebar -->
    <div id="sidebar-wrapper" style=" background-image: linear-gradient(to right, red ,red, darkred);">
        <ul class="sidebar-nav">
            <li class="sidebar-brand">
                <a href="#menu-toggle   " style="background-color:darkred; color:white; font-weight: lighter;">
                    Start Bootstrap
                </a>
            </li>
            <li id=".menu-toggle" class="sidebar-brand">

            </li>
            <li >
                <hr style="border-color:darkred;">
            </li>
            <li>
                <a href="/dashboard" style="font-weight:lighter; font-size:20px; color:white"><p>Dashboard</p></a>
            </li>
            <li>
                <a href="/matchestoday" style="color:white; font-size:20px;"><p>Tonight's Matches</p></a>
            </li>
            <li>
                <a href="/results" style="color:white; font-size:20px;"><p>Results</p></a>
            </li>
            <li>
                <a href="#" style="color:white; font-size:20px;"><p>Events</p></a>
            </li>
            <li>
                <a href="#" style="color:white; font-size:20px;"><p>About</p></a>
            </li>
            <li>
                <a href="#" style="color:white; font-size:20px;"><p>Services</p></a>
            </li>
            <li>
                <a href="{{ url('/logout') }}"> <p style="color:white; font-size:20px;">logout</p> </a>
            </li>
        </ul>
    </div>
    <!-- /#sidebar-wrapper -->

    <!-- Page Content -->
    <div style=" background-position: center; -webkit-filter: grayscale(100%); background-size: cover; margin-bottom:5px;padding-bottom:100px; background-image: url('/img/myfighter.jpg');" id="banner">
            <div class="row">
                <div style="float:left;" class="col-sm">
                    <a href="#menu-toggle" class="btn btn-danger" id="menu-toggle">Menu</a>
                </div>
                <div style="height:100%;" class="col-sm">
                    <h1 style="font-size: 50px; margin-top:12%; vertical-align: middle;color:white; text-align: center;">@yield('title')</h1>
                </div>
                <div class="col-sm">

                </div>
            </div>
    </div>
    <div id="page-content-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    @yield('content')
                </div>
            </div>
        </div>
    </div>
    <!-- /#page-content-wrapper -->

</div>
<!-- /#wrapper -->

<!-- jQuery -->
<script src="/js/jquery.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="/js/bootstrap.min.js"></script>

<!-- Menu Toggle Script -->
<script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
</script>

</body>

</html>
