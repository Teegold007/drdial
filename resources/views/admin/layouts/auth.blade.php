
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Login | Dynamic Admin Template</title>
    <!-- Mobile specific metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1 user-scalable=no">
    <!-- Force IE9 to render in normal mode -->
    <!--[if IE]><meta http-equiv="x-ua-compatible" content="IE=9" /><![endif]-->
    <meta name="author" content="Razaq Ogunlade" />
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <meta name="application-name" content="Cms Dynamic" />
    <!-- Import google fonts - Heading first/ text second -->
    <link href='http://fonts.googleapis.com/css?family=Quattrocento+Sans:400,700' rel='stylesheet' type='text/css'>
    <!-- All Css files -->
    <link rel="stylesheet" href="{{ url('administrator/assets/css/all.css') }}">

    <link rel="icon" href="img/ico/favicon.ico" type="image/png">
    <!-- Windows8 touch icon ( http://www.buildmypinnedsite.com/ )-->
    <meta name="msapplication-TileColor" content="#3399cc" />
</head>
<body class="login-page">
<!-- Start login container -->
<div class="container login-container">

    @yield('content')

</div>
<!-- End login container -->
<div class="container">
    <div class="footer">
        <p class="text-center">&copy;2014 Copyright Dynamic admin. All right reserved !!!</p>
    </div>
</div>
<!-- Javascripts -->
<!-- Important javascript libs(put in all pages) -->
<script src="http://code.jquery.com/jquery-2.1.1.min.js"></script>
<script>
    window.jQuery || document.write('<script src="{{url('administrator/dynamic/js/jquery/jquery-2.1.1.min.js')}}">\x3C/script>')
</script>
<script src="http://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
<script>
    window.jQuery || document.write('<script src="assets/js/libs/jquery-ui-1.10.4.min.js">\x3C/script>')
</script>
<!--[if lt IE 9]>
<script type="text/javascript" src="{{url('administrator/dynamic/js/libs/excanvas.min.js')}}"></script>
<script type="text/javascript" src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
<script type="text/javascript" src="dynamic/js/libs/respond.min.js"></script>
<![endif]-->
<!-- Bootstrap plugins -->
<script src="{{url('administrator/dynamic/js/bootstrap/bootstrap.js')}}"></script>
<!-- Form plugins -->
<script src="{{url('administrator/dynamic/plugins/forms/validation/jquery.validate.js')}}"></script>
<script src="{{url('administrator/dynamic/plugins/forms/validation/additional-methods.min.js')}}"></script>
<!-- Init plugins olny for this page -->
<script src="{{url('administrator/dynamic/js/pages/login.js')}}"></script>
</body>
</html>