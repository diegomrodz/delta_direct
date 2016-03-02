<!DOCTYPE html>
<html>

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
    <link href="http://static.deltafaucetrep.com/assets/stylesheets/widgets.min.css" rel="stylesheet" type="text/css">
    <link href="http://static.deltafaucetrep.com/assets/stylesheets/pages.min.css" rel="stylesheet" type="text/css">
    <link href="http://static.deltafaucetrep.com/assets/stylesheets/rtl.min.css" rel="stylesheet" type="text/css">
    <link href="http://static.deltafaucetrep.com/assets/stylesheets/themes.min.css" rel="stylesheet" type="text/css">
    
    
    <link href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css" rel="stylesheet" type="text/css">

    <!--[if lt IE 9]>
    <script src="assets/javascripts/ie.min.js"></script>
  <![endif]-->

    <link href="http://static.deltafaucetrep.com/assets/stylesheets/dataTables.responsive.css" rel="stylesheet" type="text/css">
    <link href="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/css/select2.min.css" rel="stylesheet" type="text/css">
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <link href="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.4.0/fullcalendar.min.css" rel="stylesheet" type="text/css">
    
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
        @media print {    
            .no-print, .no-print * {
                display: none !important;
            }
        }
        
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
        table.dataTable thead .sorting: after {
            content: none !important;
            display: block;
        }
        table.dataTable thead .sorting_asc: after {
            content: none !important;
            display: block;
        }
        table.dataTable thead .sorting_desc: after {
            content: none !important;
            display: block;
        }
        table.dataTable thead .sorting,
        table.dataTable thead .sorting_asc,
        table.dataTable thead .sorting_desc {
            background: none !important;
        }
        .dataTable > thead > tr > th[class*="sort"]: : after {
            display: none
        }
    </style>
</head>

<body>

    <body class="theme-dust main-menu-animated main-navbar-fixed main-menu-fixed animate-mm-sm animate-mm-md animate-mm-lg" style="">

        <script>
            var init = [];
        </script>

        <div id="main-wrapper">


            <!-- 2. $MAIN_NAVIGATION ===========================================================================

  Main navigation
-->
            <div id="main-navbar" class="navbar navbar-inverse" role="navigation">
                <!-- Main menu toggle -->
                <button style="padding-top:3px;" type="button" id="main-menu-toggle"><i class="navbar-icon fa fa-bars icon"></i><span class="hide-menu-text">HIDE MENU</span>
                </button>

                <div class="navbar-inner">
                    <!-- Main navbar header -->
                    <div class="navbar-header">

                        <!-- Logo -->
                        <a href="/" class="navbar-brand">
                            <div>
                                <img style="padding-bottom:5px;" alt="Delta Direct" src="http://static.deltafaucetrep.com/assets/images/main-navbar-logo.jpg">
                            </div>
                        </a>

                        <!-- Main navbar toggle -->
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#main-navbar-collapse"><i class="navbar-icon fa fa-bars"></i>
                        </button>

                    </div>
                    <!-- / .navbar-header -->

                    <div id="main-navbar-collapse" class="collapse navbar-collapse main-navbar-collapse" style="">
                        <div class="slimScrollDiv" style="position: relative; width: auto;">
                            <div style="width: auto; max-height: none;">
                                <ul class="nav navbar-nav">
                                    <li>
                                        <a href="http://deltafaucetrep.com">Home</a>
                                    </li>
                                    <li class="dropdown">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">{{trans('layouts_master.top_navbar.files')}}</a>
                                        <ul class="dropdown-menu">
                                            <li><a target="_blank" href="http://static.deltafaucetrep.com/commercial/police/2016/Jan/IA 01_2016.pdf">Instrução Comercial, Janeiro</a>
                                            </li>
                                          <li><a target="_blank" href="http://static.deltafaucetrep.com/commercial/police/2016/Jan/aumentodepreco_pt_repjan2016.pdf">Comunicado Janeiro: Aumento de Preço </a>
                                            </li>
                                            <li class="divider"></li>
                                            <li><a target="_blank" href="http://static.deltafaucetrep.com/commercial/price_list/2015/Sep/Revenda.xlsm">Lista de Preços - Revenda, Janeiro</a>
                                            </li>
                                            <li><a target="_blank" href="http://static.deltafaucetrep.com/commercial/price_list/2015/Sep/Engenharia.xlsm">Lista de Preços - Engenharia, Janeiro</a>
                                            </li>
                                            <li><a target="_blank" href="http://static.deltafaucetrep.com/commercial/price_list/2015/Sep/Consumidor.xlsm">Lista de Preços - Consumidor, Janeiro</a>
                                            </li>
                                            <li class="divider"></li>
                                            <li><a target="_blank" href="http://origin.international.prod.deltafaucet.com.br/shopping-tools-resources/research/literature/brazil-assets/DL-1759.pdf">Catálogo Comercial, Delta</a>
                                            </li>
                                            <!-- Comentario:
                                         
                                                Coloque o caminho completo para um arquivo na pasta static_files
                                          
                                               <li><a target="_blank" href="http://static.deltafaucetrep.com/commercial/price_list/2015/Sep/Revenda.xlsm">Lista de Preços - Revenda, Setembro</a>
                                               </li>
                                          
                                             -->
                                          
                                            <li><a target="_blank" href="http://origin.international.prod.deltafaucet.com.br/shopping-tools-resources/research/literature/brazil-assets/DI-0490_Complete.pdf">Catálogo Internacional, Delta</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="dropdown">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">{{trans('layouts_master.top_navbar.help')}}</a>
                                        <ul class="dropdown-menu">
                                            <li><a href="http://deltafaucetrep.com/tutorials/portfolio">{{trans('layouts_master.top_navbar.help_portfolio')}}</a>
                                            </li>
                                            <li><a href="http://deltafaucetrep.com/tutorials/budgets">{{trans('layouts_master.top_navbar.help_budgets')}}</a>
                                            </li>
                                            <li><a href="http://deltafaucetrep.com/tutorials/orders">{{trans('layouts_master.top_navbar.help_orders')}}</a>
                                            </li>
                                            <li><a href="http://deltafaucetrep.com/tutorials/fees">{{trans('layouts_master.top_navbar.help_fees')}}</a>
                                            </li>
                                            <li class="divider"></li>
                                            <li><a href="#">{{trans('layouts_master.top_navbar.help_call')}}</a>
                                            </li>
                                        </ul>
                                    </li>
                                    @if ($user->getUserType()->cod == 40)
                                    <li>
                                        <a href="http://static.deltafaucetrep.com/assets/docs/Documentation.pdf" target="_blank">{{trans('layouts_master.top_navbar.docs')}}</a>
                                    </li>
                                    @endif
                                </ul>
                                <!-- / .navbar-nav -->

                                <div class="right clearfix">
                                    <ul class="nav navbar-nav pull-right right-navbar-nav">

                                         <li class="dropdown">
                                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">{{trans('layouts_master.top_navbar.language')}}</a>
                                            <ul class="dropdown-menu">
                                                <li><a href="/profile/set_language/pt"><img src="http://www.ip2location.com/images/flags_16/br_16.png"> {{trans('layouts_master.top_navbar.language_pt')}}</a>
                                                </li>
                                                <li class="divider"></li>
                                                <li><a href="/profile/set_language/en"><img src="http://www.ip2location.com/images/flags_16/us_16.png" /> {{trans('layouts_master.top_navbar.language_en')}}</a>
                                                </li>
                                            </ul>
                                        </li>
                                        
                                        <li class="dropdown">
                                            <a href="#" class="dropdown-toggle user-menu" data-toggle="dropdown">
                                                <img src="{{$user->avatar_path == null ? "http://static.deltafaucetrep.com/assets/demo/avatars/1.jpg" : $user->avatar_path}}" alt="">
                                                <span>{{$user->name . " " . $user->surname}}</span>
                                            </a>
                                            <ul class="dropdown-menu">
                                                <li><a href="/profile/{{$user->user_id}}/detail"><i class="dropdown-icon fa fa-user"></i>&nbsp;&nbsp;{{trans('layouts_master.user.profile')}}</a>
                                                </li>
                                                <li><a href="/inbox/index"><i class="dropdown-icon fa fa-inbox"></i>&nbsp;&nbsp;{{trans('layouts_master.user.inbox')}}&nbsp;&nbsp;@if (count($user->getUnreadPosts()) > 0)<span class="label label-warning pull-right">{{count($user->getUnreadPosts())}}</span>@endif</a>
                                                </li>
                                                <li class="divider"></li>
                                                <li><a href="/auth/logout"><i class="dropdown-icon fa fa-power-off"></i>&nbsp;&nbsp;{{trans('layouts_master.user.logoff')}}</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <!-- /3. $END_NAVBAR_ICON_BUTTONS -->
                                    </ul>
                                    <!-- / .navbar-nav -->
                                </div>
                                <!-- / .right -->
                            </div>
                            <div class="slimScrollBar" style="width: 2px; position: absolute; top: 0px; opacity: 0.4; display: block; border-radius: 0px; z-index: 99; right: 1px; background: rgb(0, 0, 0);"></div>
                            <div class="slimScrollRail" style="width: 2px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 0px; opacity: 0.2; z-index: 90; right: 1px; background: rgb(0, 0, 0);"></div>
                        </div>
                    </div>
                    <!-- / #main-navbar-collapse -->
                </div>
                <!-- / .navbar-inner -->
            </div>
            <!-- / #main-navbar -->

            <div class="no-print" id="main-menu" role="navigation">
                    <div id="main-menu-inner" style="overflow: hidden; width: auto; height: 100%;">
                        <div class="menu-content top animated fadeIn" id="menu-content-demo">
                            <!-- Menu custom content demo
           CSS:        styles/pixel-admin-less/demo.less or styles/pixel-admin-scss/_demo.scss
           Javascript: htmlhttp://static.deltafaucetrep.com/assets/demo/demo.js
         -->
                            <div>
                                <div style="font-size:12px;" class="text-bg"><span class="text-slim">{{ trans('layouts_master.greeting') }}</span>  <span class="text-semibold">{{$user->name}}</span>
                                </div>

                                <img src="{{$user->avatar_path == null ? "http://static.deltafaucetrep.com/assets/demo/avatars/1.jpg" : $user->avatar_path}}" alt="" class="">
                                <div class="btn-group">
                                    <a href="/inbox/index" class="btn btn-xs btn-primary btn-outline dark"><i class="fa fa-envelope"></i></a>
                                    <a href="/profile/{{$user->user_id}}/detail" class="btn btn-xs btn-primary btn-outline dark"><i class="fa fa-user"></i></a>
                                    <a href="/auth/logout" class="btn btn-xs btn-danger btn-outline dark"><i class="fa fa-power-off"></i></a>
                                </div>
                            </div>
                        </div>
                        <ul class="navigation">
                            <li>
                                <a href="/"><i class="menu-icon fa fa-dashboard"></i><span class="mm-text mmc-dropdown-delay animated fadeIn">{{trans('layouts_master.left_navbar.homepage')}}</span></a>
                            </li>
                        
                            @if ($user->getUserType()->cod > 10 || $user->user_id == 46 || $user->user_id == 41)
                                <li class="mm-dropdown mm-dropdown-root">
                                    <a href="#"><i class="menu-icon fa fa-binoculars"></i><span class="mm-text mmc-dropdown-delay animated fadeIn">{{trans('layouts_master.left_navbar.project_tracker')}}</span></a>
                                    <ul class="mmc-dropdown-delay animated fadeInLeft">
                                      <li>
                                         <a href="/tracker/project/new"><i class="menu-icon fa fa-plus"></i><span class="mm-text mmc-dropdown-delay animated fadeIn">{{trans('layouts_master.left_navbar.project_tracker_new')}}</span></a>
                                      </li>
                                      <li>
                                         <a href="/tracker/index"><i class="menu-icon fa fa-list"></i><span class="mm-text mmc-dropdown-delay animated fadeIn">{{trans('layouts_master.left_navbar.project_tracker_list')}}</span></a>
                                      </li>
                                      
                                      @if ($user->getUserType()->cod != 40)
                                      <li>
                                         <a href="/tracker/influencer/list"><i class="menu-icon fa fa-users"></i><span class="mm-text mmc-dropdown-delay animated fadeIn">{{trans('layouts_master.left_navbar.project_tracker_inf')}}</span></a>
                                      </li>
                                      @endif
                                      <li>
                                         <a href="/tracker/agenda"><i class="menu-icon fa fa-calendar"></i><span class="mm-text mmc-dropdown-delay animated fadeIn">{{trans('layouts_master.left_navbar.project_tracker_agenda')}}</span></a>
                                       </li>
                                       @if ($user->getUserType()->cod == 40)
                                            <li>
                                                <a href="/tracker/dp"><i class="menu-icon fa fa-flag-o"></i><span class="mm-text mmc-dropdown-delay animated fadeIn">{{trans('layouts_master.left_navbar.project_tracker_dp')}}</span></a>
                                            </li>
                                       @endif
                                    </ul>
                                </li>
                            @endif
                            
                            @if ($user->getUserType()->cod >= 20)
                               <li class="mm-dropdown mm-dropdown-root">
                                    <a href="#"><i class="menu-icon fa fa-users"></i><span class="mm-text mmc-dropdown-delay animated fadeIn">{{trans('layouts_master.left_navbar.crm')}}</span></a>
                                    <ul class="mmc-dropdown-delay animated fadeInLeft">
                                      <li>
                                         <a href="/tracker/influencer/list"><i class="menu-icon fa fa-list"></i><span class="mm-text mmc-dropdown-delay animated fadeIn">{{trans('layouts_master.left_navbar.crm_list')}}</span></a>
                                      </li>
                                      <li>
                                         <a href="/tracker/influencer/new"><i class="menu-icon fa fa-plus"></i><span class="mm-text mmc-dropdown-delay animated fadeIn">{{trans('layouts_master.left_navbar.crm_new')}}</span></a>
                                      </li>

                                    </ul>
                                </li>
                            @endif
                            
                            @if ($user->getUserType()->cod == 40 || $user->getUserType()->cod == 20)
                            
                            <li class="mm-dropdown mm-dropdown-root">
                                <a href="#"><i class="menu-icon fa fa-bar-chart"></i><span class="mm-text mmc-dropdown-delay animated fadeIn">{{trans('layouts_master.left_navbar.reports')}}</span></a>
                                <ul class="mmc-dropdown-delay animated fadeInLeft">
                                    <li>
                                        <a tabindex="-1" href="/report/sales"><i class="menu-icon fa fa-money"></i><span class="mm-text">{{trans('layouts_master.left_navbar.reports_sales')}}</span></a>
                                    </li>
                                    <li>
                                        <a tabindex="-1" href="/report/sellout"><i class="menu-icon fa fa-sign-out"></i><span class="mm-text">{{trans('layouts_master.left_navbar.reports_sellout')}}</span></a>
                                    </li>
                                    <li>
                                        <a tabindex="-1" href="/report/crm/influencer"><i class="menu-icon fa fa-users"></i><span class="mm-text">{{trans('layouts_master.left_navbar.reports_crm_inf')}}</span></a>
                                    </li>
                                    <li>
                                        <a tabindex="-1" href="/report/crm/organization"><i class="menu-icon fa fa-users"></i><span class="mm-text">{{trans('layouts_master.left_navbar.reports_crm_org')}}</span></a>
                                    </li>
                                    <li>
                                        <a tabindex="-1" href="#"><i class="menu-icon fa fa-archive"></i><span class="mm-text">{{trans('layouts_master.left_navbar.reports_inventory')}}</span></a>
                                    </li>
                                    <li>
                                        <a tabindex="-1" href="/report/goals"><i class="menu-icon fa fa-bookmark-o"></i><span class="mm-text">{{trans('layouts_master.left_navbar.reports_goals')}}</span></a>
                                    </li>
                                    <li>
                                        <a tabindex="-1" href="#"><i class="menu-icon fa fa-binoculars"></i><span class="mm-text">{{trans('layouts_master.left_navbar.reports_project_tracker')}}</span></a>
                                    </li>
                                </ul>
                            </li>
                            
                            <li class="mm-dropdown mm-dropdown-root">
                                <a href="#"><i class="menu-icon fa fa-database"></i><span class="mm-text mmc-dropdown-delay animated fadeIn">{{trans('layouts_master.left_navbar.data')}}</span></a>
                                <ul class="mmc-dropdown-delay animated fadeInLeft">
                                    @if ($user->getUserType()->cod == 40)
                                        <li>
                                            <a tabindex="-1" href="/data/console"><i class="menu-icon fa fa-terminal"></i><span class="mm-text">{{trans('layouts_master.left_navbar.data_console')}}</span></a>
                                        </li>
                                    @endif
                                    <li>
                                        <a target="_blank" tabindex="-1" href="/data/customers"><i class="menu-icon fa fa-suitcase"></i><span class="mm-text">{{trans('layouts_master.left_navbar.data_customers')}}</span></a>
                                    </li>
                                    <li>
                                        <a target="_blank" tabindex="-1" href="/data/products"><i class="menu-icon fa fa-shopping-cart"></i><span class="mm-text">{{trans('layouts_master.left_navbar.data_products')}}</span></a>
                                    </li>
                                </ul>
                            </li>
                            
                            @endif
                            
                            @if ($user->getUserType()->cod == 5 || $user->getUserType()->cod == 40)
                                <li>
                                    <a href="/storage/index"><i class="menu-icon fa fa-cloud"></i><span class="mm-text mmc-dropdown-delay animated fadeIn">{{trans('layouts_master.left_navbar.files')}}</span></a>
                                </li>
                            @endif

                            <li>
                                <a href="/budget/list"><i class="menu-icon fa fa-file-text-o"></i><span class="mm-text mmc-dropdown-delay animated fadeIn">{{trans('layouts_master.left_navbar.budgets')}}</span></a>
                            </li>
                            <li>
                                <a href="/order/in_progress/list"><i class="menu-icon fa fa-truck"></i><span class="mm-text mmc-dropdown-delay animated fadeIn">{{trans('layouts_master.left_navbar.orders')}}</span></a>
                            </li>
                                @if ($user->getUserType()->cod != 40)
                                <li class="mm-dropdown mm-dropdown-root">
                                    <a href="#"><i class="menu-icon fa fa-book"></i><span class="mm-text mmc-dropdown-delay animated fadeIn">{{trans('layouts_master.left_navbar.portfolio')}}</span></a>
                                    <ul class="mmc-dropdown-delay animated fadeInLeft">
                                        <li>
                                            <a tabindex="-1" href="/portfolio/new"><i class="menu-icon fa fa-plus"></i><span class="mm-text">{{trans('layouts_master.left_navbar.portfolio_new')}}</span></a>
                                        </li>
                                        <li>
                                            <a tabindex="-1" href="/portfolio/list"><i class="menu-icon fa fa-list"></i><span class="mm-text">{{trans('layouts_master.left_navbar.portfolio_registered')}}</span></a>
                                        </li>
                                    </ul>
                                </li>
                                @endif

                            @if ($user->getUserType()->cod == 20)

                            <li class="mm-dropdown mm-dropdown-root">
                                <a href="#"><i class="menu-icon fa fa-users"></i><span class="mm-text mmc-dropdown-delay animated fadeIn">{{trans('layouts_master.left_navbar.reps')}}</span></a>
                                <ul class="mmc-dropdown-delay animated fadeInLeft">
                                    <li>
                                        <a tabindex="-1" href="/representants/list"><i class="menu-icon fa fa-book"></i><span class="mm-text">{{trans('layouts_master.left_navbar.reps_portfolio')}}</span></a>
                                    </li>
                                </ul>
                            </li>
                            
                            @endif  @if ($user->getUserType()->cod > 10)

                            <li class="mm-dropdown mm-dropdown-root">
                                <a href="#"><i class="menu-icon fa fa-archive"></i><span class="mm-text mmc-dropdown-delay animated fadeIn">{{trans('layouts_master.left_navbar.inventory')}}</span></a>
                                <ul class="mmc-dropdown-delay animated fadeInLeft">
                                   <li>
                                        <a tabindex="-1" href="/inventory/advanced_search"><i class="menu-icon fa fa-search"></i><span class="mm-text">{{trans('layouts_master.left_navbar.inventory_adv_search')}}</span></a>
                                    </li>
                                    <li>
                                        <a tabindex="-1" href="/inventory/positions"><i class="menu-icon fa fa-calendar"></i><span class="mm-text">{{trans('layouts_master.left_navbar.inventory_positions')}}</span></a>
                                    </li>
                                </ul>
                            </li>
                            
                            @endif @if ($user->getUserType()->cod == 40)

                            <li class="mm-dropdown mm-dropdown-root">
                                <a href="#"><i class="menu-icon fa  fa-users"></i><span class="mm-text mmc-dropdown-delay animated fadeIn">{{trans('layouts_master.left_navbar.users')}}</span></a>
                                <ul class="mmc-dropdown-delay animated fadeInLeft">
                                    <li>
                                        <a tabindex="-1" href="/admin/new_user"><i class="menu-icon fa fa-ticket"></i><span class="mm-text">{{trans('layouts_master.left_navbar.users_new')}}</span></a>
                                    </li>
                                    <li>
                                       <a tabindex="-1" href="/admin/new_rep_company"><i class="menu-icon fa fa-plus"></i><span class="mm-text">{{trans('layouts_master.left_navbar.users_new_rep_company')}}</span></a>
                                    </li>
                                    <li>
                                        <a tabindex="-1" href="/admin/list_users"><i class="menu-icon fa fa-list"></i><span class="mm-text">{{trans('layouts_master.left_navbar.users_registered')}}</span></a>
                                    </li>
                                </ul>
                            </li>
                            
                            @endif  @if ($user->getUserType()->cod == 40)
                            
                            <li class="mm-dropdown mm-dropdown-root">
                                <a href="#"><i class="menu-icon fa fa-suitcase"></i><span class="mm-text mmc-dropdown-delay animated fadeIn">{{trans('layouts_master.left_navbar.customers')}}</span></a>
                                <ul class="mmc-dropdown-delay animated fadeInLeft">
                                  <li>
                                       <a tabindex="-1" href="/portfolio/new"><i class="menu-icon fa fa-plus"></i><span class="mm-text">{{trans('layouts_master.left_navbar.customers_new')}}</span></a>
                                   </li>
                                    <li>
                                        <a tabindex="-1" href="/customer/list"><i class="menu-icon fa fa-th-list"></i><span class="mm-text">{{trans('layouts_master.left_navbar.customers_registered')}}</span></a>
                                    </li>
                                </ul>
                            </li>

                            @endif @if ($user->getUserType()->cod == 5)


                            <li class="mm-dropdown mm-dropdown-root">
                                <a href="#"><i class="menu-icon fa fa-archive"></i><span class="mm-text mmc-dropdown-delay animated fadeIn">{{trans('layouts_master.left_navbar.inventory')}}</span></a>
                                <ul class="mmc-dropdown-delay animated fadeInLeft">
                                    <li>
                                        <a tabindex="-1" href="/distributor/inventory/view"><i class="menu-icon fa fa-list"></i><span class="mm-text">{{trans('layouts_master.left_navbar.inventory_view')}}</span></a>
                                    </li>
                                </ul>
                            </li>
                          
                            @endif
                            
                            
                            <li class="mm-dropdown mm-dropdown-root">
                                <a href="#"><i class="menu-icon fa fa-money"></i><span class="mm-text mmc-dropdown-delay animated fadeIn">{{trans('layouts_master.left_navbar.billing')}}</span></a>
                                @if ($user->getUserType()->cod != 10)
                                <ul class="mmc-dropdown-delay animated fadeInLeft">
                                    <li>
                                        <a tabindex="-1" href="/billing/list"><i class="menu-icon fa fa-truck"></i><span class="mm-text">{{trans('layouts_master.left_navbar.billing_orders')}}</span></a>
                                    </li>
                                </ul>
                                @endif
                                
                                @if ($user->getUserType()->cod == 5 || $user->getUserType()->cod == 40)
                                <ul class="mmc-dropdown-delay animated fadeInLeft">
                                    <li>
                                        <a tabindex="-1" href="/billing/installments/list"><i class="menu-icon fa fa-list-ol"></i><span class="mm-text">{{trans('layouts_master.left_navbar.billing_installments')}}</span></a>
                                    </li>
                                </ul>
                                @endif
                                
                                @if ($user->getUserType()->cod != 5 )
                                <ul class="mmc-dropdown-delay animated fadeInLeft">
                                    <li>
                                        <a tabindex="-1" href="/billing/fees"><i class="menu-icon fa fa-pie-chart"></i><span class="mm-text">{{trans('layouts_master.left_navbar.billing_fees')}}</span></a>
                                    </li>
                                </ul>
                                @endif
                                
                                @if ($user->getUserType()->cod != 5 )
                                <ul class="mmc-dropdown-delay animated fadeInLeft">
                                    <li>
                                        <a tabindex="-1" href="/billing/fee_report/list"><i class="menu-icon fa fa-book"></i><span class="mm-text">{{trans('layouts_master.left_navbar.billing_reports')}}</span></a>
                                    </li>
                                </ul>
                                @endif
                                
                                @if ($user->getUserType()->cod == 40)
                                <ul class="mmc-dropdown-delay animated fadeInLeft">
                                    <li>
                                        <a tabindex="-1" href="/billing/not_invoiced_products"><i class="menu-icon fa fa-list"></i><span class="mm-text">{{trans('layouts_master.left_navbar.billing_not_invoice_products')}}</span></a>
                                    </li>
                                </ul>
                                @endif
                            </li>

                        </ul>
                        <!-- / .navigation -->

                        <div class="menu-content animated fadeIn">
                            <a href="/budget/new" class="btn btn-primary btn-block btn-outline dark">{{trans('layouts_master.new_budget_btn')}}</a>
                        </div>

                    </div>
                <!-- / #main-menu-inner -->
            </div>
            <!-- / #main-menu -->
            <!-- /4. $MAIN_MENU -->


            <div id="content-wrapper">
                @yield('content')
            </div>
            <!-- / #content-wrapper -->
            <div id="main-menu-bg"></div>
        </div>
        <!-- / #main-wrapper -->

        <!-- Pixel Admin's javascripts -->
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
        <script src="http://netdna.bootstrapcdn.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>
        <script src="http://static.deltafaucetrep.com/assets/javascripts/pixel-admin.min.js"></script>
        <script src="http://static.deltafaucetrep.com/assets/javascripts/jquery.dataTables.min.js"></script>
        <script src="http://static.deltafaucetrep.com/assets/javascripts/dataTables0.responsive.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jQuery-slimScroll/1.3.6/jquery.slimscroll.min.js"></script>
        <script src="//cdn.datatables.net/plug-ins/a5734b29083/integration/bootstrap/3/dataTables.bootstrap.js"></script>
        
        
        @yield('end')
        
        <script type="text/javascript">
            $(document).ready(function() {
                var _tb = $("#search_table");
                _tb.dataTable({
                    paging: false,
                    ordering: false,
                    sDom: 't'
                });

                $("#navbar_search").keyup(function() {
                    _tb.api().search($(this).val()).draw();
                });

                $("#navbar_search").focus(function() {
                    $("#navbar_search_dropdown").toggleClass("open");
                });

               $("#main-menu-content").slimScroll({
                    alwaysVisible: true,
                    color: '#888',
                    allowPageScroll: true
                });
                
                $.ajax({
                    url: "http://deltafaucetrep.com/utils/cities/1",
                    type: "get",
                    dataType: "json"
                }).error(function (data) {
                    window.location.href = "http://deltafaucetrep.com/auth/login";
                });
                
            });
            window.PixelAdmin.start(init);
        </script>

    </body>

</html>