<!doctype html>
<html class="gt-ie8 gt-ie9 not-ie pxajs">
<!--<![endif]-->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>Delta Direct - @yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0">

    <!-- Open Sans font from Google CDN -->
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,400,600,700,300&amp;subset=latin" rel="stylesheet" type="text/css">

    <!-- Pixel Admin's stylesheets -->
    <link href="http://static.deltafaucetrep.com/assets/stylesheets/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="http://static.deltafaucetrep.com/assets/stylesheets/pixel-admin.min.css" rel="stylesheet" type="text/css">
    <link href="http://static.deltafaucetrep.com/assets/stylesheets/pages.min.css" rel="stylesheet" type="text/css">
    <link href="http://static.deltafaucetrep.com/assets/stylesheets/rtl.min.css" rel="stylesheet" type="text/css">
    <link href="http://static.deltafaucetrep.com/assets/stylesheets/themes.min.css" rel="stylesheet" type="text/css">

    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">

    <!--[if lt IE 9]>
		<script src="assets/javascripts/ie.min.js"></script>
	<![endif]-->


    <!-- $DEMO =========================================================================================

	Remove this section on production
-->
    <style>
        #signin-demo {
            position: fixed;
            right: 0;
            bottom: 0;
            z-index: 10000;
            background: rgba(0, 0, 0, .6);
            padding: 6px;
            border-radius: 3px;
        }
        #signin-demo img {
            cursor: pointer;
            height: 40px;
        }
        #signin-demo img: hover {
            opacity: .5;
        }
        #signin-demo div {
            color: #fff;
            font-size: 10px;
            font-weight: 600;
            padding-bottom: 6px;
        }
    </style>
    <!-- / $DEMO -->

    <style type="text/css">
        .jqstooltip {
            position: absolute;
            left: 0px;
            top: 0px;
            visibility: hidden;
            background: rgb(0, 0, 0) transparent;
            background-color: rgba(0, 0, 0, 0.6);
            filter: progid: DXImageTransform.Microsoft.gradient(startColorstr=#99000000, endColorstr=#99000000);
            -ms-filter: "progid:DXImageTransform.Microsoft.gradient(startColorstr=#99000000, endColorstr=#99000000)";
            color: white;
            font: 10px arial, san serif;
            text-align: left;
            white-space: nowrap;
            padding: 5px;
            border: 1px solid white;
            z-index: 10000;
        }
        .jqsfield {
            color: white;
            font: 10px arial, san serif;
            text-align: left;
        }
    </style>
    <style>
        #demo-themes {
            display: table;
            table-layout: fixed;
            width: 100%;
            border-bottom-left-radius: 5px;
            overflow: hidden;
        }
        #demo-themes .demo-themes-row {
            display: block;
        }
        #demo-themes .demo-theme {
            display: block;
            float: left;
            text-align: center;
            width: 50%;
            padding: 25px 0;
            color: #888;
            position: relative;
            overflow: hidden;
        }
        #demo-themes .demo-theme: hover {
            color: #fff;
        }
        #demo-themes .theme-preview {
            width: 100%;
            position: absolute;
            top: 0;
            left: 0;
            bottom: 0;
            overflow: hidden !important;
        }
        #demo-themes .theme-preview img {
            width: 100%;
            position: absolute;
            display: block;
            top: 0;
            left: 0;
        }
        #demo-themes .demo-theme .overlay {
            background: #1d1d1d;
            background: rgba(0, 0, 0, .8);
            position: absolute;
            top: 0;
            bottom: 0;
            left: -100%;
            width: 100%;
        }
        #demo-themes .demo-theme span {
            position: relative;
            color: #fff;
            color: rgba(255, 255, 255, 0);
        }
        #demo-themes .demo-theme span,
        #demo-themes .demo-theme .overlay {
            -webkit-transition: all .3s;
            -moz-transition: all .3s;
            -ms-transition: all .3s;
            -o-transition: all .3s;
            transition: all .3s;
        }
        #demo-themes .demo-theme.active span,
        #demo-themes .demo-theme: hover span {
            color: #fff;
            color: rgba(255, 255, 255, 1);
        }
        #demo-themes .demo-theme.active .overlay,
        #demo-themes .demo-theme: hover .overlay {
            left: 0;
        }
        #demo-settings {
            position: fixed;
            right: -270px;
            width: 270px;
            top: 70px;
            padding-right: 10px;
            background: #333;
            border-radius: 5px;
            -webkit-transition: all .3s;
            -moz-transition: all .3s;
            -ms-transition: all .3s;
            -o-transition: all .3s;
            transition: all .3s;
            -webkit-touch-callout: none;
            -webkit-user-select: none;
            -khtml-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
            z-index: 999998;
        }
        #demo-settings.open {
            right: -10px;
        }
        #demo-settings > .header {
            position: relative;
            z-index: 100000;
            line-height: 20px;
            background: #444;
            color: #fff;
            font-size: 11px;
            font-weight: 600;
            padding: 10px 20px;
            margin: 0;
        }
        #demo-settings > div {
            position: relative;
            z-index: 100000;
            background: #282828;
            border-bottom-right-radius: 5px;
            border-bottom-left-radius: 5px;
        }
        #demo-settings-toggler {
            font-size: 21px;
            width: 50px;
            height: 40px;
            padding-right: 10px;
            position: absolute;
            left: -40px;
            top: 0;
            background: #444;
            text-align: center;
            line-height: 40px;
            color: #fff;
            border-radius: 5px;
            z-index: 99999;
            text-decoration: none !important;
            -webkit-transition: color .3s;
            -moz-transition: color .3s;
            -ms-transition: color .3s;
            -o-transition: color .3s;
            transition: color .3s;
        }
        #demo-settings.open #demo-settings-toggler {
            font-size: 16px;
            color: #888;
        }
        #demo-settings.open #demo-settings-toggler: hover {
            color: #fff;
        }
        #demo-settings.open #demo-settings-toggler: before {
            content: "\f00d";
        }
        #demo-settings-list {
            padding: 0;
            margin: 0;
        }
        #demo-settings-list li {
            padding: 0;
            margin: 0;
            list-style: none;
            position: relative;
        }
        #demo-settings-list li > span {
            line-height: 20px;
            color: #fff;
            display: block;
            padding: 12px 20px;
            cursor: pointer;
        }
        #demo-settings-list li + li {
            border-top: 1px solid #333;
        }
        #demo-settings .demo-checkbox {
            position: absolute;
            right: 20px;
            top: 12px;
        }
        .right-to-left #demo-settings {
            left: -270px;
            right: auto;
            padding-right: 0;
            padding-left: 10px;
        }
        .right-to-left #demo-settings.open {
            left: -10px;
            right: auto;
        }
        .right-to-left #demo-settings-toggler {
            padding-left: 10px;
            padding-right: 0;
            left: auto;
            right: -40px;
        }
        .right-to-left #demo-settings .demo-checkbox {
            right: auto;
            left: 20px;
        }
    </style>
</head>

<body class="page-404" style="">

    <script>
        var init = [];
    </script>

    <div class="header">
        <a href="http://deltafaucetrep.com" class="logo">
            <div class="demo-logo">
                <img width=219 height=57 style="padding-bottom:15px;" alt="Delta Direct" src="http://static.deltafaucetrep.com/assets/images/main-navbar-logo.jpg">
            </div>&nbsp;
        </a>
        <!-- / .logo -->
    </div>
    <!-- / .header -->

    <div class="error-code">405</div>

    <div class="error-text">
        <span class="oops">OOPS!</span>
        <br>
        <span class="hr"></span>
        <br>Metodo invocado não é permitido.
    </div>
    <!-- / .error-text -->

    <form action="" class="search-form">
        <input data-toggle="modal" data-target="#modal-faq" type="button" value="ABRIR CHAMADO" class="search-btn">
    </form>
    <!-- / .search-form -->

    <div id="modal-faq" class="modal fade" tabindex="-1" role="dialog" style="display: none;" aria-hidden="true">
        <div class="modal-dialog ">
            <div class="modal-content">
                <form action="" class="modal-body">
                    <input id="faqSubject" type="text" placeholder="Assunto" class="form-control form-group-margin input-lg">
                    <textarea id="faqText" placeholder="Sua dúvida, problema ou sugestão." class="form-control form-group-margin input-lg" rows="6"></textarea>
                    <div class="clearfix">
                        <button id="faqSubmit" type="submit" class="btn btn-lg btn-block btn-flat btn-primary">Criar Chamado</button>
                    </div>
                </form>
            </div>
            <!-- / .modal-content -->
        </div>
        <!-- / .modal-dialog -->
    </div>

<input id="_token" type="hidden" value="{{csrf_token()}}">
    
    <!-- Get jQuery from Google CDN -->
    <!--[if !IE]> -->
    <script type="text/javascript">
        window.jQuery || document.write('<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js">' + "<" + "/script>");
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
    <!-- <![endif]-->
    <!--[if lte IE 9]>
	<script type="text/javascript"> window.jQuery || document.write('<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js">'+"<"+"/script>"); </script>
<![endif]-->


    <!-- Pixel Admin's javascripts -->
    <script src="http://static.deltafaucetrep.com/assets/javascripts/bootstrap.min.js"></script>
    <script src="http://static.deltafaucetrep.com/assets/javascripts/pixel-admin.min.js"></script>

    <script type="text/javascript">
        init.push(function() {
            // Javascript code here
        })
         window.PixelAdmin.start(init);
    </script>


    <script type="text/javascript">
        $("#searchInput").keyup(function () {
            $(".tut-topic").css("display", "none");

            $(".tut-topic:contains('"+ $(this).val() +"')").css("display", "block");

            if ($(this).val() == "") {
                $(".tut-topic").css("display", "block");    
            }
        });

        $("#faqSubmit").click(function () {
            var data = {};

            data.subject = $("#faqSubject").val();
            data.text = $("#faqText").val();
            data._token = $("#_token").val();

            $.ajax({
                url: "http://deltafaucetrep.com/inbox/new/faq",
                dataType: "json",
                type: "post",
                data: data
            }).done(function () {
                window.location.href = "http://deltafaucetrep.com/inbox/index";    
            });   
        });

    </script>
    
    <div id="small-screen-width-point" style="position:absolute;top:-10000px;width:10px;height:10px;background:#fff;"></div>
    <div id="tablet-screen-width-point" style="position:absolute;top:-10000px;width:10px;height:10px;background:#fff;"></div>
</body>

</html>