<!DOCTYPE html>
<!--
Template Name: Metronic - Responsive Admin Dashboard Template build with Twitter Bootstrap 3.3.7
Version: 4.7.5
Author: KeenThemes
Website: http://www.keenthemes.com/
Contact: support@keenthemes.com
Follow: www.twitter.com/keenthemes
Dribbble: www.dribbble.com/keenthemes
Like: www.facebook.com/keenthemes
Purchase: http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes
Renew Support: http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes
License: You must have a valid license purchased only from themeforest(the above link) in order to legally use the theme for your project.
-->
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html>
<!--<![endif]-->
<!-- BEGIN HEAD -->

<head>
    <meta charset="utf-8" />
    <title>Login</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <meta content="Startpoint It Admin panel" name="description" />
    <meta content="" name="author" />

    <!-- BEGIN GLOBAL MANDATORY STYLES -->

    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
    <link href="{{asset('admin-panel/assets/global/plugins/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('admin-panel/assets/global/plugins/simple-line-icons/simple-line-icons.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('admin-panel/assets/global/plugins/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('Admin')}}" rel="stylesheet" type="text/css" />
    <!-- END GLOBAL MANDATORY STYLES -->
    <!-- BEGIN PAGE LEVEL PLUGINS -->
    <link href="{{asset('admin-panel/assets/global/plugins/bootstrap-daterangepicker/daterangepicker.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('admin-panel/assets/global/plugins/morris/morris.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('admin-panel/assets/global/plugins/fullcalendar/fullcalendar.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('admin-panel/assets/global/plugins/jqvmap/jqvmap/jqvmap.css')}}" rel="stylesheet" type="text/css" />
    <!-- END PAGE LEVEL PLUGINS -->
    <!-- BEGIN THEME GLOBAL STYLES -->
    <link href="{{asset('admin-panel/assets/global/css/components.min.css')}}" rel="stylesheet" id="style_components" type="text/css" />
    <link href="{{asset('admin-panel/assets/global/css/plugins.min.css')}}" rel="stylesheet" type="text/css" />
    <!-- END THEME GLOBAL STYLES -->
    <!-- BEGIN THEME LAYOUT STYLES -->
    <link href="{{asset('admin-panel/assets/layouts/layout/css/layout.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('admin-panel/assets/layouts/layout/css/themes/darkblue.min.css')}}" rel="stylesheet" type="text/css" id="style_color" />
    <link href="{{asset('admin-panel/assets/layouts/layout/css/custom.min.css')}}" rel="stylesheet" type="text/css" />
    <!-- END THEME LAYOUT STYLES -->

    <!-- BEGIN PAGE LEVEL PLUGINS -->
    <link href="{{asset('admin-panel/assets/global/plugins/select2/css/select2.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('admin-panel/assets/global/plugins/select2/css/select2-bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
    <!-- END PAGE LEVEL PLUGINS -->

    <!-- BEGIN PAGE LEVEL STYLES -->
    <link href="{{asset('admin-panel/assets/pages/css/login-4.min.css')}}" rel="stylesheet" type="text/css" />
    <!-- END PAGE LEVEL STYLES -->

    <link rel="shortcut icon" href="favicon.ico" />
</head>
<!-- END HEAD -->

<body class=" login">
    <!-- BEGIN LOGO -->
    <div class="logo">
        <a href="#">
            <img src="{{asset('admin-panel/assets/pages/img/logo-big.png')}}" alt="" /> </a>
    </div>
    <!-- END LOGO -->
    <!-- BEGIN LOGIN -->
    <div class="content">
        <!-- BEGIN LOGIN FORM -->
        <form class="login-form" action="{{route('admin.login.submit')}}" method="POST">
            {{ csrf_field() }}
            <h3 class="form-title">Login to your account</h3>
            <div class="alert alert-danger display-hide">
                <button class="close" data-close="alert"></button>
                <span> Enter any username and password. </span>
            </div>
            <div class="form-group">
                <!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
                <label class="control-label visible-ie8 visible-ie9">Mail</label>
                <div class="input-icon">
                    <i class="fa fa-user"></i>
                    <input class="form-control placeholder-no-fix" type="email" value="{{old('mail')}}" autocomplete="off" placeholder="Email" name="mail" /> </div>
            </div>
            <div class="form-group">
                <label class="control-label visible-ie8 visible-ie9">Password</label>
                <div class="input-icon">
                    <i class="fa fa-lock"></i>
                    <input class="form-control placeholder-no-fix" type="password" autocomplete="off" placeholder="Password" name="password" /> </div>
            </div>
            <div class="form-actions">
                <label class="rememberme mt-checkbox mt-checkbox-outline">
                    <input type="checkbox" name="remember" {{old('remember' ? 'checked':'')}} /> Remember me
                    <span></span>
                </label>
                <button type="submit" class="btn green pull-right"> Login </button>
            </div>

        </form>
        <!-- END LOGIN FORM -->
    </div>
    <!-- END LOGIN -->


    <!-- BEGIN CORE PLUGINS -->
    <script src="{{asset('admin-panel/assets/global/plugins/jquery.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('admin-panel/assets/global/plugins/bootstrap/js/bootstrap.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('admin-panel/assets/global/plugins/js.cookie.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('admin-panel/assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('admin-panel/assets/global/plugins/jquery.blockui.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('admin-panel/assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js')}}" type="text/javascript"></script>
    <!-- END CORE PLUGINS -->
    <!-- BEGIN PAGE LEVEL PLUGINS -->
    <script src="{{asset('admin-panel/assets/global/plugins/moment.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('admin-panel/assets/global/plugins/bootstrap-daterangepicker/daterangepicker.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('admin-panel/assets/global/plugins/morris/morris.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('admin-panel/assets/global/plugins/morris/raphael-min.js')}}" type="text/javascript"></script>
    <script src="{{asset('admin-panel/assets/global/plugins/counterup/jquery.waypoints.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('admin-panel/assets/global/plugins/counterup/jquery.counterup.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('admin-panel/assets/global/plugins/amcharts/amcharts/amcharts.js')}}" type="text/javascript"></script>
    <script src="{{asset('admin-panel/assets/global/plugins/amcharts/amcharts/serial.js')}}" type="text/javascript"></script>
    <script src="{{asset('admin-panel/assets/global/plugins/amcharts/amcharts/pie.js')}}" type="text/javascript"></script>
    <script src="{{asset('admin-panel/assets/global/plugins/amcharts/amcharts/radar.js')}}" type="text/javascript"></script>
    <script src="{{asset('admin-panel/assets/global/plugins/amcharts/amcharts/themes/light.js')}}" type="text/javascript"></script>
    <script src="{{asset('admin-panel/assets/global/plugins/amcharts/amcharts/themes/patterns.js')}}" type="text/javascript"></script>
    <script src="{{asset('admin-panel/assets/global/plugins/amcharts/amcharts/themes/chalk.js')}}" type="text/javascript"></script>
    <script src="{{asset('admin-panel/assets/global/plugins/amcharts/ammap/ammap.js')}}" type="text/javascript"></script>
    <script src="{{asset('admin-panel/assets/global/plugins/amcharts/ammap/maps/js/worldLow.js')}}" type="text/javascript"></script>
    <script src="{{asset('admin-panel/assets/global/plugins/amcharts/amstockcharts/amstock.js')}}" type="text/javascript"></script>
    <script src="{{asset('admin-panel/assets/global/plugins/fullcalendar/fullcalendar.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('admin-panel/assets/global/plugins/horizontal-timeline/horizontal-timeline.js')}}" type="text/javascript"></script>
    <script src="{{asset('admin-panel/assets/global/plugins/flot/jquery.flot.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('admin-panel/assets/global/plugins/flot/jquery.flot.resize.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('admin-panel/assets/global/plugins/flot/jquery.flot.categories.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('admin-panel/assets/global/plugins/jquery-easypiechart/jquery.easypiechart.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('admin-panel/assets/global/plugins/jquery.sparkline.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('admin-panel/assets/global/plugins/jqvmap/jqvmap/jquery.vmap.js')}}" type="text/javascript"></script>
    <script src="{{asset('admin-panel/assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.russia.js')}}" type="text/javascript"></script>
    <script src="{{asset('admin-panel/assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.world.js')}}" type="text/javascript"></script>
    <script src="{{asset('admin-panel/assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.europe.js')}}" type="text/javascript"></script>
    <script src="{{asset('admin-panel/assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.germany.js')}}" type="text/javascript"></script>
    <script src="{{asset('admin-panel/assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.usa.js')}}" type="text/javascript"></script>
    <script src="{{asset('admin-panel/assets/global/plugins/jqvmap/jqvmap/data/jquery.vmap.sampledata.js')}}" type="text/javascript"></script>
    <!-- END PAGE LEVEL PLUGINS -->
    <!-- BEGIN THEME GLOBAL SCRIPTS -->
    <script src="{{asset('admin-panel/assets/global/scripts/app.min.js')}}" type="text/javascript"></script>
    <!-- END THEME GLOBAL SCRIPTS -->
    <!-- BEGIN PAGE LEVEL SCRIPTS -->
    <script src="{{asset('admin-panel/assets/pages/scripts/dashboard.min.js')}}" type="text/javascript"></script>
    <!-- END PAGE LEVEL SCRIPTS -->
    <!-- BEGIN THEME LAYOUT SCRIPTS -->
    <script src="{{asset('admin-panel/assets/layouts/layout/scripts/layout.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('admin-panel/assets/layouts/layout/scripts/demo.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('admin-panel/assets/layouts/global/scripts/quick-sidebar.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('admin-panel/assets/layouts/global/scripts/quick-nav.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('admin-panel/custom-assets/js/localization.js')}}" type="text/javascript"></script>
    <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>

    <!-- BEGIN PAGE LEVEL PLUGINS -->
    <script src="{{asset('admin-panel/assets/global/plugins/jquery-validation/js/jquery.validate.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('admin-panel/assets/global/plugins/jquery-validation/js/additional-methods.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('admin-panel/assets/global/plugins/select2/js/select2.full.min.js" type="text/javascript')}}"></script>
    <script src="{{asset('admin-panel/assets/global/plugins/backstretch/jquery.backstretch.min.js')}}" type="text/javascript"></script>
    <!-- END PAGE LEVEL PLUGINS -->
    <!-- BEGIN PAGE LEVEL SCRIPTS -->
    <script src="{{asset('admin-panel/assets/pages/scripts/login-4.min.js')}}" type="text/javascript"></script>
    <!-- END PAGE LEVEL SCRIPTS -->
    <!-- END THEME LAYOUT SCRIPTS -->
    <script>
        $(document).ready(function()
        {
            $('#clickmewow').click(function()
            {
                $('#radio1003').attr('checked', 'checked');
            });
        })
    </script>

</body>

</html>
