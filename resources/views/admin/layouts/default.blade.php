
<!doctype html>
<!--[if lt IE 8]><html class="no-js lt-ie8"> <![endif]-->
<html class="no-js">
<head>
    <meta charset="utf-8">
    <title>@yield('title') | Cms Dynamic</title>
    <!-- Mobile specific metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1 user-scalable=no">
    <!-- Force IE9 to render in normal mode -->
    <!--[if IE]>
    <meta http-equiv="x-ua-compatible" content="IE=9" /><![endif]-->

    <!-- Import google fonts - Heading first/ text second -->
    <link href='http://fonts.googleapis.com/css?family=Quattrocento+Sans:400,700' rel='stylesheet' type='text/css'>
    <!-- Css files -->
    <link href="{{url('administrator/assets/css/all.css')}}" rel="stylesheet">

    <link rel="icon" href="{{url('administrator/dynamic/img/ico/favicon.ico')}}" type="image/png">
    <!-- Windows8 touch icon ( http://www.buildmypinnedsite.com/ )-->
    <meta name="msapplication-TileColor" content="#3399cc" />
</head>
<body>

@include('admin.includes.header')
<!-- #wrapper -->
<div id="wrapper">
    @include('admin.includes.nav')
    <!-- .page-content -->
        <div class="page-content sidebar-page right-sidebar-page clearfix">
            <!-- .page-content-wrapper -->
            <div class="page-content-wrapper">
    @yield('content')
            </div>
        </div>
</div>
@include('admin.includes.footer')
<!-- Back to top -->
<div id="back-to-top"><a href="#">Back to Top</a>
</div>
<!-- Javascripts -->

<!--[if lt IE 9]>
<script type="text/javascript" src="js/libs/excanvas.min.js"></script>
<script type="text/javascript" src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
<script type="text/javascript" src="js/libs/respond.min.js"></script>
<![endif]-->
<script src="{{url('administrator/assets/js/global.js')}}"></script>
<script>
    $(document).ready(function(){
        $.gritter.add({
            // (string | mandatory) the heading of the notification
            title: 'Warrning !!!',
            // (string | mandatory) the text inside the notification
            text: '22 users closed their accounts, due to spam issues on server.',
            // (int | optional) the time you want it to be alive for before fading out
            time: '',
            // (string) specify font-face icon  class for close message
            close_icon: 'l-arrows-remove s16',
            // (string) specify font-face icon class for big icon in left. if are specify image this will not show up.
            icon: 'glyphicon glyphicon-user',
            // (string | optional) the class name you want to apply to that specific message
            class_name: 'error-notice'
        });
    });
</script>
<!-- Other plugins ( load only nessesary plugins for every page) -->
<script src="{{url('administrator/dynamic/js/libs/date.js')}}"></script>
<script src="{{url('administrator/dynamic/plugins/charts/flot/jquery.flot.custom.js')}}"></script>
<script src="{{url('administrator/dynamic/plugins/charts/flot/jquery.flot.pie.js')}}"></script>
<script src="{{url('administrator/dynamic/plugins/charts/flot/jquery.flot.time.js')}}"></script>
<script src="{{url('administrator/dynamic/plugins/charts/flot/jquery.flot.growraf.js')}}"></script>
<script src="{{url('administrator/dynamic/plugins/charts/flot/jquery.flot.categories.js')}}"></script>
<script src="{{url('administrator/dynamic/plugins/charts/flot/jquery.flot.stack.js')}}"></script>
<script src="{{url('administrator/dynamic/plugins/charts/flot/jquery.flot.orderBars.js')}}"></script>
<script src="{{url('administrator/dynamic/plugins/charts/flot/jquery.flot.tooltip.min.js')}}"></script>
<script src="{{url('administrator/dynamic/plugins/charts/flot/jquery.flot.curvedLines.js')}}"></script>
<script src="{{url('administrator/dynamic/plugins/charts/sparklines/jquery.sparkline.js')}}"></script>
<script src="{{url('administrator/dynamic/plugins/charts/progressbars/progressbar.js')}}"></script>
<script src="{{url('administrator/dynamic/plugins/ui/waypoint/waypoints.js')}}"></script>
<script src="{{url('administrator/dynamic/plugins/ui/weather/skyicons.js')}}"></script>
<script src="{{url('administrator/dynamic/plugins/ui/notify/jquery.gritter.js')}}"></script>
<script src="{{url('administrator/dynamic/plugins/misc/vectormaps/jquery-jvectormap-1.2.2.min.js')}}"></script>
<script src="{{url('administrator/dynamic/plugins/misc/vectormaps/maps/jquery-jvectormap-world-mill-en.js')}}"></script>
<script src="{{url('administrator/dynamic/plugins/misc/countTo/jquery.countTo.js')}}"></script>
<script src="{{url('administrator/dynamic/js/jquery.dynamic.js')}}"></script>
<script src="{{url('administrator/dynamic/js/main.js')}}"></script>
<script src="{{url('administrator/dynamic/js/pages/dashboard.js')}}"></script>
</body>
</html>