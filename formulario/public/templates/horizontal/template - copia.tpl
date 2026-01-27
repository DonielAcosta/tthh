<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="es">
<!--<![endif]-->
<head><meta http-equiv="Content-Type" content="text/html; charset=gb18030">
  
  <title>{$NOM_PROYECTO}</title>
<!--Inicio Librerias Bootstrap-->
    <link href="{$PATH_CSS}jumbotron.css" rel="stylesheet">
	<link href="{$PATH_CSS}style.css" rel="stylesheet">
	<script src="{$PATH_JS}bootstrap/ie-emulation-modes-warning.js"></script>
<!--Fin Librerias Bootstrap-->
      
<!-- Inicio hojas de estilo -->
	<link rel="stylesheet" href="{$PATH_CSS}cssDsia.css" type="text/css" media="screen" charset="{$CHARSET}">	
	<link rel="stylesheet" type="text/css" href="{$PATH_TEMPLATE}marco.css" />
	<link rel="stylesheet" type="text/css" href="{$PATH_CSS}formularioMF.css" />
	<link rel="stylesheet" href="{$PUB_URL}themes/delicious/jxtheme.css" type="text/css" media="screen" charset="{$CHARSET}">
	
	<link rel="stylesheet" href="{$PUB_URL}css/estilo.css" type="text/css" media="screen" charset="{$CHARSET}">
<!--	<link rel="stylesheet" href="{$PUB_URL}css/estilo_div.css" type="text/css" media="screen" charset="{$CHARSET}">-->
<!--	<link rel="stylesheet" href="{$PUB_URL}css/estilo_div_tabs.css" type="text/css" media="screen" charset="{$CHARSET}">-->
<!--	<link rel="stylesheet" href="{$PUB_URL}css/estilo_div_tabs_plan.css" type="text/css" media="screen" charset="{$CHARSET}">-->
	<link rel="stylesheet" href="{$PUB_URL}css/estilo_php.css" type="text/css" media="screen" charset="{$CHARSET}">
<!-- Fin hojas de estilo -->
	
<!-- Inicio Configuracion del calendario -->
	<link rel='stylesheet' type='text/css' media='all' href='{$PATH_JS}jscalendar/calendar-blue.css' title='winter' />
	<script type='text/javascript' src='{$PATH_JS}jscalendar/calendar.js'></script>
	<script type='text/javascript' src='{$PATH_JS}jscalendar/lang/calendar-es.js'></script>
	<script type='text/javascript' src='{$PATH_JS}jscalendar/calendar-setup.js'></script>
<!-- Fin Configuracion del calendario -->

<!--Inicio Librerias grid-->
	<link rel='stylesheet' type='text/css' href='{$PATH_JS}grid2/dhtmlx.css'/>
	<script  src='{$PATH_JS}grid2/dhtmlx.js'></script>
<!--Fin Librerias grid-->

<!--Inicio Librerias js-->
	<script type='text/javascript' src='{$PATH_JS}combo.js'></script>
	<script type="text/javascript" src="{$PATH_JS}sha1.js"></script>
  	<script type="text/javascript" src="{$PATH_JS}jxlib.uncompressed.js"></script>
	<script type="text/javascript" src="{$PATH_JS_SIST}plantillaDsia1.js"></script>
	<script type="text/javascript" src="{$PATH_JS}xajax05/xajax_js/xajax_core_uncompressed.js"></script>	
	<script type='text/javascript' src="{$PATH_JS}validar.js"></script>
	{if $MENU_USU != ''}
		<script type='text/javascript' src="{$PATH_JS_SIST}{$MENU_USU}.js"></script>
	{/if}
	<!-- jquery-1.11.3.js -->
    <link type="text/css" href="{$PATH_JS}jquery-ui1.11.4/jquery-ui.css" rel="Stylesheet" />
    <script type="text/javascript" src="{$PATH_JS}jquery.min.js"></script>
<!--    <script type="text/javascript" src="{$PATH_JS}jquery-1.12.0.min.js"></script>-->
    <script>jQuery.noConflict();</script>
    <script type="text/javascript" src="{$PATH_JS}jquery-ui1.11.4/jquery-ui.min.js"></script>    
<!--Fin Librerias js-->	
	<!-- LIBRERIAS DE METRONIC -->
		<!-- BEGIN GLOBAL MANDATORY STYLES -->
        <link href="{$PUB_URLSIST}assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <link href="{$PUB_URLSIST}assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css" />
        <link href="{$PUB_URLSIST}assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="{$PUB_URLSIST}assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css" />
        <!-- END GLOBAL MANDATORY STYLES -->
        <!-- BEGIN THEME GLOBAL STYLES -->
        <link href="{$PUB_URLSIST}assets/global/css/components.min.css" rel="stylesheet" id="style_components" type="text/css" />
        <link href="{$PUB_URLSIST}assets/global/css/plugins.min.css" rel="stylesheet" type="text/css" />
        <!-- END THEME GLOBAL STYLES -->
        <!-- BEGIN THEME LAYOUT STYLES -->
        <link href="{$PUB_URLSIST}assets/layouts/layout2/css/layout.min.css" rel="stylesheet" type="text/css" />
        <link href="{$PUB_URLSIST}assets/layouts/layout2/css/themes/blue.min.css" rel="stylesheet" type="text/css" id="style_color" />
        <link href="{$PUB_URLSIST}assets/layouts/layout2/css/custom.min.css" rel="stylesheet" type="text/css" />
        <!-- END THEME LAYOUT STYLES -->
	<!-- FIN DE LAS LIBRERIAS -->
</head>
<body class="page-header-fixed page-sidebar-closed-hide-logo page-container-bg-solid">
<!--<body class="">-->
	
	<!-- BEGIN HEADER -->
        <div class="page-header navbar navbar-fixed-top">
            <!-- BEGIN HEADER INNER -->
            <div class="page-header-inner ">
                <!-- BEGIN LOGO -->
                <div class="page-logo">
                    <a href="javascript:;">
                        <img src="{$PUB_URLSIST}img/home/logo.jpeg" alt="logo" class="logo-default" width="120" height="40" style="margin: 15px 0 0;" /> </a>
                    <div class="menu-toggler sidebar-toggler">
                        <!-- DOC: Remove the above "hide" to enable the sidebar toggler button on header -->
                    </div>
                </div>
                <!-- END LOGO -->
                <!-- BEGIN RESPONSIVE MENU TOGGLER -->
                <a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse"> </a>
                <!-- END RESPONSIVE MENU TOGGLER -->
                <!-- BEGIN PAGE TOP -->
                <div class="page-top">
                    <!-- BEGIN TOP NAVIGATION MENU -->
                    <div class="top-menu">
                        <ul class="nav navbar-nav pull-right">
                            <!-- BEGIN NOTIFICATION DROPDOWN -->
                            <!-- DOC: Apply "dropdown-dark" class below "dropdown-extended" to change the dropdown styte -->
                            <!-- DOC: Apply "dropdown-hoverable" class after below "dropdown" and remove data-toggle="dropdown" data-hover="dropdown" data-close-others="true" attributes to enable hover dropdown mode -->
                            <!-- DOC: Remove "dropdown-hoverable" and add data-toggle="dropdown" data-hover="dropdown" data-close-others="true" attributes to the below A element with dropdown-toggle class -->
                            <!--<li class="dropdown dropdown-extended dropdown-notification" id="header_notification_bar">
                                <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                                    <i class="icon-bell"></i>
                                    <span class="badge badge-default"> 7 </span>
                                </a>
                                <ul class="dropdown-menu">
                                    <li class="external">
                                        <h3>
                                            <span class="bold">12 pending</span> notifications</h3>
                                        <a href="page_user_profile_1.html">view all</a>
                                    </li>
                                    <li>
                                        <ul class="dropdown-menu-list scroller" style="height: 250px;" data-handle-color="#637283">
                                            <li>
                                                <a href="javascript:;">
                                                    <span class="time">just now</span>
                                                    <span class="details">
                                                        <span class="label label-sm label-icon label-success">
                                                            <i class="fa fa-plus"></i>
                                                        </span> New user registered. </span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="javascript:;">
                                                    <span class="time">3 mins</span>
                                                    <span class="details">
                                                        <span class="label label-sm label-icon label-danger">
                                                            <i class="fa fa-bolt"></i>
                                                        </span> Server #12 overloaded. </span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="javascript:;">
                                                    <span class="time">10 mins</span>
                                                    <span class="details">
                                                        <span class="label label-sm label-icon label-warning">
                                                            <i class="fa fa-bell-o"></i>
                                                        </span> Server #2 not responding. </span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="javascript:;">
                                                    <span class="time">14 hrs</span>
                                                    <span class="details">
                                                        <span class="label label-sm label-icon label-info">
                                                            <i class="fa fa-bullhorn"></i>
                                                        </span> Application error. </span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="javascript:;">
                                                    <span class="time">2 days</span>
                                                    <span class="details">
                                                        <span class="label label-sm label-icon label-danger">
                                                            <i class="fa fa-bolt"></i>
                                                        </span> Database overloaded 68%. </span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="javascript:;">
                                                    <span class="time">3 days</span>
                                                    <span class="details">
                                                        <span class="label label-sm label-icon label-danger">
                                                            <i class="fa fa-bolt"></i>
                                                        </span> A user IP blocked. </span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="javascript:;">
                                                    <span class="time">4 days</span>
                                                    <span class="details">
                                                        <span class="label label-sm label-icon label-warning">
                                                            <i class="fa fa-bell-o"></i>
                                                        </span> Storage Server #4 not responding dfdfdfd. </span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="javascript:;">
                                                    <span class="time">5 days</span>
                                                    <span class="details">
                                                        <span class="label label-sm label-icon label-info">
                                                            <i class="fa fa-bullhorn"></i>
                                                        </span> System Error. </span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="javascript:;">
                                                    <span class="time">9 days</span>
                                                    <span class="details">
                                                        <span class="label label-sm label-icon label-danger">
                                                            <i class="fa fa-bolt"></i>
                                                        </span> Storage server failed. </span>
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>-->
                            <!-- END NOTIFICATION DROPDOWN -->
                            <!-- BEGIN INBOX DROPDOWN -->
                            <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
                            <!--<li class="dropdown dropdown-extended dropdown-inbox" id="header_inbox_bar">
                                <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                                    <i class="icon-envelope-open"></i>
                                    <span class="badge badge-default"> 4 </span>
                                </a>
                                <ul class="dropdown-menu">
                                    <li class="external">
                                        <h3>You have
                                            <span class="bold">7 New</span> Messages</h3>
                                        <a href="app_inbox.html">view all</a>
                                    </li>
                                    <li>
                                        <ul class="dropdown-menu-list scroller" style="height: 275px;" data-handle-color="#637283">
                                            <li>
                                                <a href="#">
                                                    <span class="photo">
                                                        <img src="{$PUB_URLSIST}assets/layouts/layout3/img/avatar2.jpg" class="img-circle" alt=""> </span>
                                                    <span class="subject">
                                                        <span class="from"> Lisa Wong </span>
                                                        <span class="time">Just Now </span>
                                                    </span>
                                                    <span class="message"> Vivamus sed auctor nibh congue nibh. auctor nibh auctor nibh... </span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <span class="photo">
                                                        <img src="{$PUB_URLSIST}assets/layouts/layout3/img/avatar3.jpg" class="img-circle" alt=""> </span>
                                                    <span class="subject">
                                                        <span class="from"> Richard Doe </span>
                                                        <span class="time">16 mins </span>
                                                    </span>
                                                    <span class="message"> Vivamus sed congue nibh auctor nibh congue nibh. auctor nibh auctor nibh... </span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <span class="photo">
                                                        <img src="{$PUB_URLSIST}assets/layouts/layout3/img/avatar1.jpg" class="img-circle" alt=""> </span>
                                                    <span class="subject">
                                                        <span class="from"> Bob Nilson </span>
                                                        <span class="time">2 hrs </span>
                                                    </span>
                                                    <span class="message"> Vivamus sed nibh auctor nibh congue nibh. auctor nibh auctor nibh... </span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <span class="photo">
                                                        <img src="{$PUB_URLSIST}assets/layouts/layout3/img/avatar2.jpg" class="img-circle" alt=""> </span>
                                                    <span class="subject">
                                                        <span class="from"> Lisa Wong </span>
                                                        <span class="time">40 mins </span>
                                                    </span>
                                                    <span class="message"> Vivamus sed auctor 40% nibh congue nibh... </span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <span class="photo">
                                                        <img src="{$PUB_URLSIST}assets/layouts/layout3/img/avatar3.jpg" class="img-circle" alt=""> </span>
                                                    <span class="subject">
                                                        <span class="from"> Richard Doe </span>
                                                        <span class="time">46 mins </span>
                                                    </span>
                                                    <span class="message"> Vivamus sed congue nibh auctor nibh congue nibh. auctor nibh auctor nibh... </span>
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>-->
                            <!-- END INBOX DROPDOWN -->
                            <!-- BEGIN TODO DROPDOWN -->
                            <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
                            <!--<li class="dropdown dropdown-extended dropdown-tasks" id="header_task_bar">
                                <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                                    <i class="icon-calendar"></i>
                                    <span class="badge badge-default"> 3 </span>
                                </a>
                                <ul class="dropdown-menu extended tasks">
                                    <li class="external">
                                        <h3>You have
                                            <span class="bold">12 pending</span> tasks</h3>
                                        <a href="app_todo.html">view all</a>
                                    </li>
                                    <li>
                                        <ul class="dropdown-menu-list scroller" style="height: 275px;" data-handle-color="#637283">
                                            <li>
                                                <a href="javascript:;">
                                                    <span class="task">
                                                        <span class="desc">New release v1.2 </span>
                                                        <span class="percent">30%</span>
                                                    </span>
                                                    <span class="progress">
                                                        <span style="width: 40%;" class="progress-bar progress-bar-success" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100">
                                                            <span class="sr-only">40% Complete</span>
                                                        </span>
                                                    </span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="javascript:;">
                                                    <span class="task">
                                                        <span class="desc">Application deployment</span>
                                                        <span class="percent">65%</span>
                                                    </span>
                                                    <span class="progress">
                                                        <span style="width: 65%;" class="progress-bar progress-bar-danger" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100">
                                                            <span class="sr-only">65% Complete</span>
                                                        </span>
                                                    </span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="javascript:;">
                                                    <span class="task">
                                                        <span class="desc">Mobile app release</span>
                                                        <span class="percent">98%</span>
                                                    </span>
                                                    <span class="progress">
                                                        <span style="width: 98%;" class="progress-bar progress-bar-success" aria-valuenow="98" aria-valuemin="0" aria-valuemax="100">
                                                            <span class="sr-only">98% Complete</span>
                                                        </span>
                                                    </span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="javascript:;">
                                                    <span class="task">
                                                        <span class="desc">Database migration</span>
                                                        <span class="percent">10%</span>
                                                    </span>
                                                    <span class="progress">
                                                        <span style="width: 10%;" class="progress-bar progress-bar-warning" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100">
                                                            <span class="sr-only">10% Complete</span>
                                                        </span>
                                                    </span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="javascript:;">
                                                    <span class="task">
                                                        <span class="desc">Web server upgrade</span>
                                                        <span class="percent">58%</span>
                                                    </span>
                                                    <span class="progress">
                                                        <span style="width: 58%;" class="progress-bar progress-bar-info" aria-valuenow="58" aria-valuemin="0" aria-valuemax="100">
                                                            <span class="sr-only">58% Complete</span>
                                                        </span>
                                                    </span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="javascript:;">
                                                    <span class="task">
                                                        <span class="desc">Mobile development</span>
                                                        <span class="percent">85%</span>
                                                    </span>
                                                    <span class="progress">
                                                        <span style="width: 85%;" class="progress-bar progress-bar-success" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100">
                                                            <span class="sr-only">85% Complete</span>
                                                        </span>
                                                    </span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="javascript:;">
                                                    <span class="task">
                                                        <span class="desc">New UI release</span>
                                                        <span class="percent">38%</span>
                                                    </span>
                                                    <span class="progress progress-striped">
                                                        <span style="width: 38%;" class="progress-bar progress-bar-important" aria-valuenow="18" aria-valuemin="0" aria-valuemax="100">
                                                            <span class="sr-only">38% Complete</span>
                                                        </span>
                                                    </span>
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>-->
                            <!-- END TODO DROPDOWN -->
                            <!-- BEGIN USER LOGIN DROPDOWN -->
                            <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
                            <li class="dropdown dropdown-user">
                                <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                                    <img alt="" class="img-circle" src="{$PUB_URLSIST}assets/layouts/layout2/img/avatar3_small.jpg" />
                                    <span class="username username-hide-on-mobile"> {$NOMBRE_USUARIO} </span>
                                    <i class="fa fa-angle-down"></i>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-default">
                                    <!--<li>
                                        <a href="">
                                            <i class="icon-user"></i> My Profile </a>
                                    </li>
                                    <li>
                                        <a href="">
                                            <i class="icon-calendar"></i> My Calendar </a>
                                    </li>
                                    <li>
                                        <a href="">
                                            <i class="icon-envelope-open"></i> My Inbox
                                            <span class="badge badge-danger"> 3 </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="">
                                            <i class="icon-rocket"></i> My Tasks
                                            <span class="badge badge-success"> 7 </span>
                                        </a>
                                    </li>
                                    <li class="divider"> </li>
                                    <li>
                                        <a href="">
                                            <i class="icon-lock"></i> Lock Screen </a>
                                    </li>-->
                                    <li>
                                        <a href="">
                                            <i class="icon-key"></i> Salir </a>
                                    </li>
                                </ul>
                            </li>
                            <!-- END USER LOGIN DROPDOWN -->
                        </ul>
                    </div>
                    <!-- END TOP NAVIGATION MENU -->
                </div>
                <!-- END PAGE TOP -->
            </div>
            <!-- END HEADER INNER -->
        </div>
        <!-- END HEADER -->
        <!-- BEGIN HEADER & CONTENT DIVIDER -->
        <div class="clearfix"> </div>
        <!-- END HEADER & CONTENT DIVIDER -->
        <!-- BEGIN CONTAINER -->
        <div class="page-container">
            <!-- BEGIN SIDEBAR -->
            <div class="page-sidebar-wrapper">
                <!-- END SIDEBAR -->
                <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
                <!-- DOC: Change data-auto-speed="200" to adjust the sub menu slide up/down speed -->
                <div class="page-sidebar navbar-collapse collapse">
                    <!-- BEGIN SIDEBAR MENU -->
                    <!-- DOC: Apply "page-sidebar-menu-light" class right after "page-sidebar-menu" to enable light sidebar menu style(without borders) -->
                    <!-- DOC: Apply "page-sidebar-menu-hover-submenu" class right after "page-sidebar-menu" to enable hoverable(hover vs accordion) sub menu mode -->
                    <!-- DOC: Apply "page-sidebar-menu-closed" class right after "page-sidebar-menu" to collapse("page-sidebar-closed" class must be applied to the body element) the sidebar sub menu mode -->
                    <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
                    <!-- DOC: Set data-keep-expand="true" to keep the submenues expanded -->
                    <!-- DOC: Set data-auto-speed="200" to adjust the sub menu slide up/down speed -->
                    <ul class="page-sidebar-menu  page-header-fixed page-sidebar-menu-hover-submenu " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">
                        <li class="nav-item start active open">
                            <a href="javascript:;" class="nav-link nav-toggle">
                                <i class="icon-home"></i>
                                <span class="title">Principal</span>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a href="javascript:;" class="nav-link nav-toggle">
                                <i class="icon-puzzle"></i>
                                <span class="title">Formularios</span>
                                <span class="arrow"></span>
                            </a>
                            <ul class="sub-menu">
                                <li class="nav-item  ">
                                    <a href="{$URLSIST}base/hc_ini" class="nav-link ">
                                        <span class="title">Historia Clinica Nefrol?gica Inicial</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <!--<li class="nav-item  ">
                            <a href="javascript:;" class="nav-link nav-toggle">
                                <i class="icon-puzzle"></i>
                                <span class="title">Components</span>
                                <span class="arrow"></span>
                            </a>
                            <ul class="sub-menu">
                                <li class="nav-item  ">
                                    <a href="components_date_time_pickers.html" class="nav-link ">
                                        <span class="title">Date & Time Pickers</span>
                                    </a>
                                </li>
                                <li class="nav-item  ">
                                    <a href="components_color_pickers.html" class="nav-link ">
                                        <span class="title">Color Pickers</span>
                                        <span class="badge badge-danger">2</span>
                                    </a>
                                </li>
                                <li class="nav-item  ">
                                    <a href="components_select2.html" class="nav-link ">
                                        <span class="title">Select2 Dropdowns</span>
                                    </a>
                                </li>
                                <li class="nav-item  ">
                                    <a href="components_bootstrap_select.html" class="nav-link ">
                                        <span class="title">Bootstrap Select</span>
                                    </a>
                                </li>
                                <li class="nav-item  ">
                                    <a href="components_multi_select.html" class="nav-link ">
                                        <span class="title">Bootstrap Multiple Select</span>
                                    </a>
                                </li>
                                <li class="nav-item  ">
                                    <a href="components_bootstrap_multiselect_dropdown.html" class="nav-link ">
                                        <span class="title">Bootstrap Multiselect Dropdowns</span>
                                    </a>
                                </li>
                                <li class="nav-item  ">
                                    <a href="components_bootstrap_select_splitter.html" class="nav-link ">
                                        <span class="title">Select Splitter</span>
                                    </a>
                                </li>
                                <li class="nav-item  ">
                                    <a href="components_clipboard.html" class="nav-link ">
                                        <span class="title">Clipboard</span>
                                    </a>
                                </li>
                                <li class="nav-item  ">
                                    <a href="components_typeahead.html" class="nav-link ">
                                        <span class="title">Typeahead Autocomplete</span>
                                    </a>
                                </li>
                                <li class="nav-item  ">
                                    <a href="components_bootstrap_tagsinput.html" class="nav-link ">
                                        <span class="title">Bootstrap Tagsinput</span>
                                    </a>
                                </li>
                                <li class="nav-item  ">
                                    <a href="components_bootstrap_switch.html" class="nav-link ">
                                        <span class="title">Bootstrap Switch</span>
                                        <span class="badge badge-success">6</span>
                                    </a>
                                </li>
                                <li class="nav-item  ">
                                    <a href="components_bootstrap_maxlength.html" class="nav-link ">
                                        <span class="title">Bootstrap Maxlength</span>
                                    </a>
                                </li>
                                <li class="nav-item  ">
                                    <a href="components_bootstrap_fileinput.html" class="nav-link ">
                                        <span class="title">Bootstrap File Input</span>
                                    </a>
                                </li>
                                <li class="nav-item  ">
                                    <a href="components_bootstrap_touchspin.html" class="nav-link ">
                                        <span class="title">Bootstrap Touchspin</span>
                                    </a>
                                </li>
                                <li class="nav-item  ">
                                    <a href="components_form_tools.html" class="nav-link ">
                                        <span class="title">Form Widgets & Tools</span>
                                    </a>
                                </li>
                                <li class="nav-item  ">
                                    <a href="components_context_menu.html" class="nav-link ">
                                        <span class="title">Context Menu</span>
                                    </a>
                                </li>
                                <li class="nav-item  ">
                                    <a href="components_editors.html" class="nav-link ">
                                        <span class="title">Markdown & WYSIWYG Editors</span>
                                    </a>
                                </li>
                                <li class="nav-item  ">
                                    <a href="components_code_editors.html" class="nav-link ">
                                        <span class="title">Code Editors</span>
                                    </a>
                                </li>
                                <li class="nav-item  ">
                                    <a href="components_ion_sliders.html" class="nav-link ">
                                        <span class="title">Ion Range Sliders</span>
                                    </a>
                                </li>
                                <li class="nav-item  ">
                                    <a href="components_noui_sliders.html" class="nav-link ">
                                        <span class="title">NoUI Range Sliders</span>
                                    </a>
                                </li>
                                <li class="nav-item  ">
                                    <a href="components_knob_dials.html" class="nav-link ">
                                        <span class="title">Knob Circle Dials</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item  ">
                            <a href="javascript:;" class="nav-link nav-toggle">
                                <i class="icon-settings"></i>
                                <span class="title">Form Stuff</span>
                                <span class="arrow"></span>
                            </a>
                            <ul class="sub-menu">
                                <li class="nav-item  ">
                                    <a href="form_controls.html" class="nav-link ">
                                        <span class="title">Bootstrap Form
                                            <br>Controls</span>
                                    </a>
                                </li>
                                <li class="nav-item  ">
                                    <a href="form_controls_md.html" class="nav-link ">
                                        <span class="title">Material Design
                                            <br>Form Controls</span>
                                    </a>
                                </li>
                                <li class="nav-item  ">
                                    <a href="form_validation.html" class="nav-link ">
                                        <span class="title">Form Validation</span>
                                    </a>
                                </li>
                                <li class="nav-item  ">
                                    <a href="form_validation_states_md.html" class="nav-link ">
                                        <span class="title">Material Design
                                            <br>Form Validation States</span>
                                    </a>
                                </li>
                                <li class="nav-item  ">
                                    <a href="form_validation_md.html" class="nav-link ">
                                        <span class="title">Material Design
                                            <br>Form Validation</span>
                                    </a>
                                </li>
                                <li class="nav-item  ">
                                    <a href="form_layouts.html" class="nav-link ">
                                        <span class="title">Form Layouts</span>
                                    </a>
                                </li>
                                <li class="nav-item  ">
                                    <a href="form_repeater.html" class="nav-link ">
                                        <span class="title">Form Repeater</span>
                                    </a>
                                </li>
                                <li class="nav-item  ">
                                    <a href="form_input_mask.html" class="nav-link ">
                                        <span class="title">Form Input Mask</span>
                                    </a>
                                </li>
                                <li class="nav-item  ">
                                    <a href="form_editable.html" class="nav-link ">
                                        <span class="title">Form X-editable</span>
                                    </a>
                                </li>
                                <li class="nav-item  ">
                                    <a href="form_wizard.html" class="nav-link ">
                                        <span class="title">Form Wizard</span>
                                    </a>
                                </li>
                                <li class="nav-item  ">
                                    <a href="form_icheck.html" class="nav-link ">
                                        <span class="title">iCheck Controls</span>
                                    </a>
                                </li>
                                <li class="nav-item  ">
                                    <a href="form_image_crop.html" class="nav-link ">
                                        <span class="title">Image Cropping</span>
                                    </a>
                                </li>
                                <li class="nav-item  ">
                                    <a href="form_fileupload.html" class="nav-link ">
                                        <span class="title">Multiple File Upload</span>
                                    </a>
                                </li>
                                <li class="nav-item  ">
                                    <a href="form_dropzone.html" class="nav-link ">
                                        <span class="title">Dropzone File Upload</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item  ">
                            <a href="javascript:;" class="nav-link nav-toggle">
                                <i class="icon-bulb"></i>
                                <span class="title">Elements</span>
                                <span class="arrow"></span>
                            </a>
                            <ul class="sub-menu">
                                <li class="nav-item  ">
                                    <a href="elements_steps.html" class="nav-link ">
                                        <span class="title">Steps</span>
                                    </a>
                                </li>
                                <li class="nav-item  ">
                                    <a href="elements_lists.html" class="nav-link ">
                                        <span class="title">Lists</span>
                                    </a>
                                </li>
                                <li class="nav-item  ">
                                    <a href="elements_ribbons.html" class="nav-link ">
                                        <span class="title">Ribbons</span>
                                    </a>
                                </li>
                                <li class="nav-item  ">
                                    <a href="elements_overlay.html" class="nav-link ">
                                        <span class="title">Overlays</span>
                                    </a>
                                </li>
                                <li class="nav-item  ">
                                    <a href="elements_cards.html" class="nav-link ">
                                        <span class="title">User Cards</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item  ">
                            <a href="javascript:;" class="nav-link nav-toggle">
                                <i class="icon-briefcase"></i>
                                <span class="title">Tables</span>
                                <span class="arrow"></span>
                            </a>
                            <ul class="sub-menu">
                                <li class="nav-item  ">
                                    <a href="table_static_basic.html" class="nav-link ">
                                        <span class="title">Basic Tables</span>
                                    </a>
                                </li>
                                <li class="nav-item  ">
                                    <a href="table_static_responsive.html" class="nav-link ">
                                        <span class="title">Responsive Tables</span>
                                    </a>
                                </li>
                                <li class="nav-item  ">
                                    <a href="table_bootstrap.html" class="nav-link ">
                                        <span class="title">Bootstrap Tables</span>
                                    </a>
                                </li>
                                <li class="nav-item  ">
                                    <a href="javascript:;" class="nav-link nav-toggle">
                                        <span class="title">Datatables</span>
                                        <span class="arrow"></span>
                                    </a>
                                    <ul class="sub-menu">
                                        <li class="nav-item ">
                                            <a href="table_datatables_managed.html" class="nav-link "> Managed Datatables </a>
                                        </li>
                                        <li class="nav-item ">
                                            <a href="table_datatables_buttons.html" class="nav-link "> Buttons Extension </a>
                                        </li>
                                        <li class="nav-item ">
                                            <a href="table_datatables_colreorder.html" class="nav-link "> Colreorder Extension </a>
                                        </li>
                                        <li class="nav-item ">
                                            <a href="table_datatables_rowreorder.html" class="nav-link "> Rowreorder Extension </a>
                                        </li>
                                        <li class="nav-item ">
                                            <a href="table_datatables_scroller.html" class="nav-link "> Scroller Extension </a>
                                        </li>
                                        <li class="nav-item ">
                                            <a href="table_datatables_fixedheader.html" class="nav-link "> FixedHeader Extension </a>
                                        </li>
                                        <li class="nav-item ">
                                            <a href="table_datatables_responsive.html" class="nav-link "> Responsive Extension </a>
                                        </li>
                                        <li class="nav-item ">
                                            <a href="table_datatables_editable.html" class="nav-link "> Editable Datatables </a>
                                        </li>
                                        <li class="nav-item ">
                                            <a href="table_datatables_ajax.html" class="nav-link "> Ajax Datatables </a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item  ">
                            <a href="?p=" class="nav-link nav-toggle">
                                <i class="icon-wallet"></i>
                                <span class="title">Portlets</span>
                                <span class="arrow"></span>
                            </a>
                            <ul class="sub-menu">
                                <li class="nav-item  ">
                                    <a href="portlet_boxed.html" class="nav-link ">
                                        <span class="title">Boxed Portlets</span>
                                    </a>
                                </li>
                                <li class="nav-item  ">
                                    <a href="portlet_light.html" class="nav-link ">
                                        <span class="title">Light Portlets</span>
                                    </a>
                                </li>
                                <li class="nav-item  ">
                                    <a href="portlet_solid.html" class="nav-link ">
                                        <span class="title">Solid Portlets</span>
                                    </a>
                                </li>
                                <li class="nav-item  ">
                                    <a href="portlet_ajax.html" class="nav-link ">
                                        <span class="title">Ajax Portlets</span>
                                    </a>
                                </li>
                                <li class="nav-item  ">
                                    <a href="portlet_draggable.html" class="nav-link ">
                                        <span class="title">Draggable Portlets</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item  ">
                            <a href="javascript:;" class="nav-link nav-toggle">
                                <i class="icon-bar-chart"></i>
                                <span class="title">Charts</span>
                                <span class="arrow"></span>
                            </a>
                            <ul class="sub-menu">
                                <li class="nav-item  ">
                                    <a href="charts_amcharts.html" class="nav-link ">
                                        <span class="title">amChart</span>
                                    </a>
                                </li>
                                <li class="nav-item  ">
                                    <a href="charts_flotcharts.html" class="nav-link ">
                                        <span class="title">Flot Charts</span>
                                    </a>
                                </li>
                                <li class="nav-item  ">
                                    <a href="charts_flowchart.html" class="nav-link ">
                                        <span class="title">Flow Charts</span>
                                    </a>
                                </li>
                                <li class="nav-item  ">
                                    <a href="charts_google.html" class="nav-link ">
                                        <span class="title">Google Charts</span>
                                    </a>
                                </li>
                                <li class="nav-item  ">
                                    <a href="charts_echarts.html" class="nav-link ">
                                        <span class="title">eCharts</span>
                                    </a>
                                </li>
                                <li class="nav-item  ">
                                    <a href="charts_morris.html" class="nav-link ">
                                        <span class="title">Morris Charts</span>
                                    </a>
                                </li>
                                <li class="nav-item  ">
                                    <a href="javascript:;" class="nav-link nav-toggle">
                                        <span class="title">HighCharts</span>
                                        <span class="arrow"></span>
                                    </a>
                                    <ul class="sub-menu">
                                        <li class="nav-item ">
                                            <a href="charts_highcharts.html" class="nav-link "> HighCharts </a>
                                        </li>
                                        <li class="nav-item ">
                                            <a href="charts_highstock.html" class="nav-link "> HighStock </a>
                                        </li>
                                        <li class="nav-item ">
                                            <a href="charts_highmaps.html" class="nav-link "> HighMaps </a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item  ">
                            <a href="javascript:;" class="nav-link nav-toggle">
                                <i class="icon-pointer"></i>
                                <span class="title">Maps</span>
                                <span class="arrow"></span>
                            </a>
                            <ul class="sub-menu">
                                <li class="nav-item  ">
                                    <a href="maps_google.html" class="nav-link ">
                                        <span class="title">Google Maps</span>
                                    </a>
                                </li>
                                <li class="nav-item  ">
                                    <a href="maps_vector.html" class="nav-link ">
                                        <span class="title">Vector Maps</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="javascript:;" class="nav-link nav-toggle">
                                <i class="icon-layers"></i>
                                <span class="title">Page Layouts</span>
                                <span class="selected"></span>
                                <span class="arrow open"></span>
                            </a>
                            <ul class="sub-menu">
                                <li class="nav-item  active open">
                                    <a href="layout_blank_page.html" class="nav-link ">
                                        <span class="title">Blank Page</span>
                                        <span class="selected"></span>
                                    </a>
                                </li>
                                <li class="nav-item  ">
                                    <a href="layout_language_bar.html" class="nav-link ">
                                        <span class="title">Header Language Bar</span>
                                    </a>
                                </li>
                                <li class="nav-item  ">
                                    <a href="layout_footer_fixed.html" class="nav-link ">
                                        <span class="title">Fixed Footer</span>
                                    </a>
                                </li>
                                <li class="nav-item  ">
                                    <a href="layout_boxed_page.html" class="nav-link ">
                                        <span class="title">Boxed Page</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item  ">
                            <a href="javascript:;" class="nav-link nav-toggle">
                                <i class="icon-feed"></i>
                                <span class="title">Sidebar Layouts</span>
                                <span class="arrow"></span>
                            </a>
                            <ul class="sub-menu">
                                <li class="nav-item  ">
                                    <a href="layout_sidebar_menu_accordion.html" class="nav-link ">
                                        <span class="title">Sidebar Accordion Menu</span>
                                    </a>
                                </li>
                                <li class="nav-item  ">
                                    <a href="layout_sidebar_menu_compact.html" class="nav-link ">
                                        <span class="title">Sidebar Compact Menu</span>
                                    </a>
                                </li>
                                <li class="nav-item  ">
                                    <a href="layout_sidebar_reversed.html" class="nav-link ">
                                        <span class="title">Reversed Sidebar Page</span>
                                    </a>
                                </li>
                                <li class="nav-item  ">
                                    <a href="layout_sidebar_fixed.html" class="nav-link ">
                                        <span class="title">Fixed Sidebar Layout</span>
                                    </a>
                                </li>
                                <li class="nav-item  ">
                                    <a href="layout_sidebar_closed.html" class="nav-link ">
                                        <span class="title">Closed Sidebar Layout</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item  ">
                            <a href="javascript:;" class="nav-link nav-toggle">
                                <i class=" icon-wrench"></i>
                                <span class="title">Custom Layouts</span>
                                <span class="arrow"></span>
                            </a>
                            <ul class="sub-menu">
                                <li class="nav-item  ">
                                    <a href="layout_disabled_menu.html" class="nav-link ">
                                        <span class="title">Disabled Menu Links</span>
                                    </a>
                                </li>
                                <li class="nav-item  ">
                                    <a href="layout_full_height_portlet.html" class="nav-link ">
                                        <span class="title">Full Height Portlet</span>
                                    </a>
                                </li>
                                <li class="nav-item  ">
                                    <a href="layout_full_height_content.html" class="nav-link ">
                                        <span class="title">Full Height Content</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item  ">
                            <a href="javascript:;" class="nav-link nav-toggle">
                                <i class="icon-basket"></i>
                                <span class="title">eCommerce</span>
                                <span class="arrow"></span>
                            </a>
                            <ul class="sub-menu">
                                <li class="nav-item  ">
                                    <a href="ecommerce_index.html" class="nav-link ">
                                        <i class="icon-home"></i>
                                        <span class="title">Dashboard</span>
                                    </a>
                                </li>
                                <li class="nav-item  ">
                                    <a href="ecommerce_orders.html" class="nav-link ">
                                        <i class="icon-basket"></i>
                                        <span class="title">Orders</span>
                                    </a>
                                </li>
                                <li class="nav-item  ">
                                    <a href="ecommerce_orders_view.html" class="nav-link ">
                                        <i class="icon-tag"></i>
                                        <span class="title">Order View</span>
                                    </a>
                                </li>
                                <li class="nav-item  ">
                                    <a href="ecommerce_products.html" class="nav-link ">
                                        <i class="icon-graph"></i>
                                        <span class="title">Products</span>
                                    </a>
                                </li>
                                <li class="nav-item  ">
                                    <a href="ecommerce_products_edit.html" class="nav-link ">
                                        <i class="icon-graph"></i>
                                        <span class="title">Product Edit</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item  ">
                            <a href="javascript:;" class="nav-link nav-toggle">
                                <i class="icon-docs"></i>
                                <span class="title">Apps</span>
                                <span class="arrow"></span>
                            </a>
                            <ul class="sub-menu">
                                <li class="nav-item  ">
                                    <a href="app_todo.html" class="nav-link ">
                                        <i class="icon-clock"></i>
                                        <span class="title">Todo 1</span>
                                    </a>
                                </li>
                                <li class="nav-item  ">
                                    <a href="app_todo_2.html" class="nav-link ">
                                        <i class="icon-check"></i>
                                        <span class="title">Todo 2</span>
                                    </a>
                                </li>
                                <li class="nav-item  ">
                                    <a href="app_inbox.html" class="nav-link ">
                                        <i class="icon-envelope"></i>
                                        <span class="title">Inbox</span>
                                    </a>
                                </li>
                                <li class="nav-item  ">
                                    <a href="app_calendar.html" class="nav-link ">
                                        <i class="icon-calendar"></i>
                                        <span class="title">Calendar</span>
                                    </a>
                                </li>
                                <li class="nav-item  ">
                                    <a href="app_ticket.html" class="nav-link ">
                                        <i class="icon-notebook"></i>
                                        <span class="title">Support</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item  ">
                            <a href="javascript:;" class="nav-link nav-toggle">
                                <i class="icon-user"></i>
                                <span class="title">User</span>
                                <span class="arrow"></span>
                            </a>
                            <ul class="sub-menu">
                                <li class="nav-item  ">
                                    <a href="page_user_profile_1.html" class="nav-link ">
                                        <i class="icon-user"></i>
                                        <span class="title">Profile 1</span>
                                    </a>
                                </li>
                                <li class="nav-item  ">
                                    <a href="page_user_profile_1_account.html" class="nav-link ">
                                        <i class="icon-user-female"></i>
                                        <span class="title">Profile 1 Account</span>
                                    </a>
                                </li>
                                <li class="nav-item  ">
                                    <a href="page_user_profile_1_help.html" class="nav-link ">
                                        <i class="icon-user-following"></i>
                                        <span class="title">Profile 1 Help</span>
                                    </a>
                                </li>
                                <li class="nav-item  ">
                                    <a href="page_user_profile_2.html" class="nav-link ">
                                        <i class="icon-users"></i>
                                        <span class="title">Profile 2</span>
                                    </a>
                                </li>
                                <li class="nav-item  ">
                                    <a href="javascript:;" class="nav-link nav-toggle">
                                        <i class="icon-notebook"></i>
                                        <span class="title">Login</span>
                                        <span class="arrow"></span>
                                    </a>
                                    <ul class="sub-menu">
                                        <li class="nav-item ">
                                            <a href="page_user_login_1.html" class="nav-link " target="_blank"> Login Page 1 </a>
                                        </li>
                                        <li class="nav-item ">
                                            <a href="page_user_login_2.html" class="nav-link " target="_blank"> Login Page 2 </a>
                                        </li>
                                        <li class="nav-item ">
                                            <a href="page_user_login_3.html" class="nav-link " target="_blank"> Login Page 3 </a>
                                        </li>
                                        <li class="nav-item ">
                                            <a href="page_user_login_4.html" class="nav-link " target="_blank"> Login Page 4 </a>
                                        </li>
                                        <li class="nav-item ">
                                            <a href="page_user_login_5.html" class="nav-link " target="_blank"> Login Page 5 </a>
                                        </li>
                                        <li class="nav-item ">
                                            <a href="page_user_login_6.html" class="nav-link " target="_blank"> Login Page 6 </a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="nav-item  ">
                                    <a href="page_user_lock_1.html" class="nav-link " target="_blank">
                                        <i class="icon-lock"></i>
                                        <span class="title">Lock Screen 1</span>
                                    </a>
                                </li>
                                <li class="nav-item  ">
                                    <a href="page_user_lock_2.html" class="nav-link " target="_blank">
                                        <i class="icon-lock-open"></i>
                                        <span class="title">Lock Screen 2</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item  ">
                            <a href="javascript:;" class="nav-link nav-toggle">
                                <i class="icon-social-dribbble"></i>
                                <span class="title">General</span>
                                <span class="arrow"></span>
                            </a>
                            <ul class="sub-menu">
                                <li class="nav-item  ">
                                    <a href="page_general_about.html" class="nav-link ">
                                        <i class="icon-info"></i>
                                        <span class="title">About</span>
                                    </a>
                                </li>
                                <li class="nav-item  ">
                                    <a href="page_general_contact.html" class="nav-link ">
                                        <i class="icon-call-end"></i>
                                        <span class="title">Contact</span>
                                    </a>
                                </li>
                                <li class="nav-item  ">
                                    <a href="javascript:;" class="nav-link nav-toggle">
                                        <i class="icon-notebook"></i>
                                        <span class="title">Portfolio</span>
                                        <span class="arrow"></span>
                                    </a>
                                    <ul class="sub-menu">
                                        <li class="nav-item ">
                                            <a href="page_general_portfolio_1.html" class="nav-link "> Portfolio 1 </a>
                                        </li>
                                        <li class="nav-item ">
                                            <a href="page_general_portfolio_2.html" class="nav-link "> Portfolio 2 </a>
                                        </li>
                                        <li class="nav-item ">
                                            <a href="page_general_portfolio_3.html" class="nav-link "> Portfolio 3 </a>
                                        </li>
                                        <li class="nav-item ">
                                            <a href="page_general_portfolio_4.html" class="nav-link "> Portfolio 4 </a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="nav-item  ">
                                    <a href="javascript:;" class="nav-link nav-toggle">
                                        <i class="icon-magnifier"></i>
                                        <span class="title">Search</span>
                                        <span class="arrow"></span>
                                    </a>
                                    <ul class="sub-menu">
                                        <li class="nav-item ">
                                            <a href="page_general_search.html" class="nav-link "> Search 1 </a>
                                        </li>
                                        <li class="nav-item ">
                                            <a href="page_general_search_2.html" class="nav-link "> Search 2 </a>
                                        </li>
                                        <li class="nav-item ">
                                            <a href="page_general_search_3.html" class="nav-link "> Search 3 </a>
                                        </li>
                                        <li class="nav-item ">
                                            <a href="page_general_search_4.html" class="nav-link "> Search 4 </a>
                                        </li>
                                        <li class="nav-item ">
                                            <a href="page_general_search_5.html" class="nav-link "> Search 5 </a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="nav-item  ">
                                    <a href="page_general_pricing.html" class="nav-link ">
                                        <i class="icon-tag"></i>
                                        <span class="title">Pricing</span>
                                    </a>
                                </li>
                                <li class="nav-item  ">
                                    <a href="page_general_pricing_2.html" class="nav-link ">
                                        <i class="icon-tag"></i>
                                        <span class="title">Pricing 2</span>
                                    </a>
                                </li>
                                <li class="nav-item  ">
                                    <a href="page_general_faq.html" class="nav-link ">
                                        <i class="icon-wrench"></i>
                                        <span class="title">FAQ</span>
                                    </a>
                                </li>
                                <li class="nav-item  ">
                                    <a href="page_general_blog.html" class="nav-link ">
                                        <i class="icon-pencil"></i>
                                        <span class="title">Blog</span>
                                    </a>
                                </li>
                                <li class="nav-item  ">
                                    <a href="page_general_blog_post.html" class="nav-link ">
                                        <i class="icon-note"></i>
                                        <span class="title">Blog Post</span>
                                    </a>
                                </li>
                                <li class="nav-item  ">
                                    <a href="page_general_invoice.html" class="nav-link ">
                                        <i class="icon-envelope"></i>
                                        <span class="title">Invoice</span>
                                    </a>
                                </li>
                                <li class="nav-item  ">
                                    <a href="page_general_invoice_2.html" class="nav-link ">
                                        <i class="icon-envelope"></i>
                                        <span class="title">Invoice 2</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item  ">
                            <a href="javascript:;" class="nav-link nav-toggle">
                                <i class="icon-settings"></i>
                                <span class="title">System</span>
                                <span class="arrow"></span>
                            </a>
                            <ul class="sub-menu">
                                <li class="nav-item  ">
                                    <a href="page_cookie_consent_1.html" class="nav-link ">
                                        <span class="title">Cookie Consent 1</span>
                                    </a>
                                </li>
                                <li class="nav-item  ">
                                    <a href="page_cookie_consent_2.html" class="nav-link ">
                                        <span class="title">Cookie Consent 2</span>
                                    </a>
                                </li>
                                <li class="nav-item  ">
                                    <a href="page_system_coming_soon.html" class="nav-link " target="_blank">
                                        <span class="title">Coming Soon</span>
                                    </a>
                                </li>
                                <li class="nav-item  ">
                                    <a href="page_system_404_1.html" class="nav-link ">
                                        <span class="title">404 Page 1</span>
                                    </a>
                                </li>
                                <li class="nav-item  ">
                                    <a href="page_system_404_2.html" class="nav-link " target="_blank">
                                        <span class="title">404 Page 2</span>
                                    </a>
                                </li>
                                <li class="nav-item  ">
                                    <a href="page_system_404_3.html" class="nav-link " target="_blank">
                                        <span class="title">404 Page 3</span>
                                    </a>
                                </li>
                                <li class="nav-item  ">
                                    <a href="page_system_500_1.html" class="nav-link ">
                                        <span class="title">500 Page 1</span>
                                    </a>
                                </li>
                                <li class="nav-item  ">
                                    <a href="page_system_500_2.html" class="nav-link " target="_blank">
                                        <span class="title">500 Page 2</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="javascript:;" class="nav-link nav-toggle">
                                <i class="icon-folder"></i>
                                <span class="title">Multi Level Menu</span>
                                <span class="arrow "></span>
                            </a>
                            <ul class="sub-menu">
                                <li class="nav-item">
                                    <a href="javascript:;" class="nav-link nav-toggle">
                                        <i class="icon-settings"></i> Item 1
                                        <span class="arrow"></span>
                                    </a>
                                    <ul class="sub-menu">
                                        <li class="nav-item">
                                            <a href="?p=dashboard-2" target="_blank" class="nav-link">
                                                <i class="icon-user"></i> Arrow Toggle
                                                <span class="arrow nav-toggle"></span>
                                            </a>
                                            <ul class="sub-menu">
                                                <li class="nav-item">
                                                    <a href="#" class="nav-link">
                                                        <i class="icon-power"></i> Sample Link 1</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a href="#" class="nav-link">
                                                        <i class="icon-paper-plane"></i> Sample Link 1</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a href="#" class="nav-link">
                                                        <i class="icon-star"></i> Sample Link 1</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li class="nav-item">
                                            <a href="#" class="nav-link">
                                                <i class="icon-camera"></i> Sample Link 1</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="#" class="nav-link">
                                                <i class="icon-link"></i> Sample Link 2</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="#" class="nav-link">
                                                <i class="icon-pointer"></i> Sample Link 3</a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="nav-item">
                                    <a href="?p=dashboard-2" target="_blank" class="nav-link">
                                        <i class="icon-globe"></i> Arrow Toggle
                                        <span class="arrow nav-toggle"></span>
                                    </a>
                                    <ul class="sub-menu">
                                        <li class="nav-item">
                                            <a href="#" class="nav-link">
                                                <i class="icon-tag"></i> Sample Link 1</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="#" class="nav-link">
                                                <i class="icon-pencil"></i> Sample Link 1</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="#" class="nav-link">
                                                <i class="icon-graph"></i> Sample Link 1</a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="icon-bar-chart"></i> Item 3 </a>
                                </li>
                            </ul>
                        </li>-->
                    </ul>
                    <!-- END SIDEBAR MENU -->
                </div>
                <!-- END SIDEBAR -->
            </div>
            <!-- END SIDEBAR -->
            <!-- BEGIN CONTENT -->
            <div class="page-content-wrapper">
                <!-- BEGIN CONTENT BODY -->
                <div class="page-content">
                    <!-- BEGIN PAGE HEADER-->
                    <h1 class="page-title"> Di?lisis
                        <small>Inicio</small>
                    </h1>
                    <div class="page-bar">
                        <ul class="page-breadcrumb">
                            <li>
                                <i class="icon-home"></i>
                                <a href="">Di?lisis</a>
                                <i class="fa fa-angle-right"></i>
                            </li>
                            <li>
                                <a href="">Inicio</a>
                            </li>
                        </ul>
                    </div>
                    <!-- END PAGE HEADER-->
                    <!--botonera -->
                    <div id="barra3" >
                    	{if $desactivarOpciones != true}
                    		{include file='../../../app/comun/botoneraH.tpl'}	
                    	{/if}		
                    </div>
                    <div class="row">
                    	{include file="$pagina"}
                    </div>
                </div>
                <!-- END CONTENT BODY -->
            </div>
            <!-- END CONTENT -->
        </div>

        <!-- END CONTAINER -->
        <!-- BEGIN FOOTER -->
        <div class="page-footer">
            <div class="page-footer-inner"> 2017 &copy; Dialsis Software Todos los derechos reservados
                <!--<a target="_blank" href="http://keenthemes.com">Keenthemes</a>-->
                <div class="scroll-to-top">
                    <i class="icon-arrow-up"></i>
                </div>
            </div>
            <!-- END FOOTER -->

	{literal}
		<script type="text/javascript">
			configuracion();
		</script>
	{/literal}	
	{if $desactivar != true}	
		{literal}	
		<script type="text/javascript">
			menuPrincipal();
		</script>		
		{/literal}
	{/if}
	<div id='idVentanaEmergente'></div>	
<!-- Modal -->
<div class="modal fade" id="alertModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="alertModalTitulo">Información</h4>
      </div>
      <div class="modal-body" id="alertModalContenido">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal" id="alertModalBoton">Cerrar</button>
        <div id="contenedorBoton" name="contenedorBoton"></div>
      </div>
    </div>
  </div>
</div>	

  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 style="color:red;"><span class="glyphicon glyphicon-lock"></span>ENTRADA AL SISTEMA</h4>
        </div>
        <div class="modal-body">
				<form class="form-signin" role="form" name="formSignIn" id="formSignIn">				
					<div>
						<input id="login" name="login" type="text" class="form-control" placeholder="Usuario" aria-describedby="basic-addon1">
					    <br>
						<input id="password" name="password" type="password" class="form-control" placeholder="Clave" aria-describedby="basic-addon1">
						<br>	
						<button type="button" class="btn btn-primary" onclick='iniciarSesion();'>Registrar</button>
						<button type="button" class="btn btn-default" onclick='limpiar();'>Limpiar</button>
<!--						<button type="submit" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span>Salir</button>-->
						<button type="submit" class="btn btn-default" data-dismiss="modal">Salir</button>
						<br><br>	
							<br>
					</div>
				  </form>
        </div>
      </div>
    </div>
  </div>  

</body>
</html>
<!--     Bootstrap core JavaScript-->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="{$PATH_JS}bootstrap/bootstrap.min.js"></script>    
	<link href="{$PATH_CSS}bootstrap.min.css" rel="stylesheet">    
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="{$PATH_JS}bootstrap/ie10-viewport-bug-workaround.js"></script>
    <link rel="stylesheet" href="{$PUB_URLSIST}css/cssSist.css" type="text/css" media="screen" charset="{$CHARSET}">
   
<!-- END QUICK NAV -->
            <!--[if lt IE 9]>
<script src="{$PUB_URLSIST}assets/global/plugins/respond.min.js"></script>
<script src="{$PUB_URLSIST}assets/global/plugins/excanvas.min.js"></script> 
<script src="{$PUB_URLSIST}assets/global/plugins/ie8.fix.min.js"></script> 
<![endif]-->
            <!-- BEGIN CORE PLUGINS 
            <script>jQuery.noConflict();</script>
            <script src="{$PUB_URLSIST}assets/global/plugins/jquery.min.js" type="text/javascript"></script>
            <script src="{$PUB_URLSIST}assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
            <script src="{$PUB_URLSIST}assets/global/plugins/js.cookie.min.js" type="text/javascript"></script>
            <script src="{$PUB_URLSIST}assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
            <script src="{$PUB_URLSIST}assets/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
            <script src="{$PUB_URLSIST}assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
             END CORE PLUGINS
             BEGIN THEME GLOBAL SCRIPTS
            <script src="{$PUB_URLSIST}assets/global/scripts/app.min.js" type="text/javascript"></script>
            END THEME GLOBAL SCRIPTS
             BEGIN THEME LAYOUT SCRIPTS
            <script src="{$PUB_URLSIST}assets/layouts/layout2/scripts/layout.min.js" type="text/javascript"></script>
            <script src="{$PUB_URLSIST}assets/layouts/layout2/scripts/demo.min.js" type="text/javascript"></script>
            <script src="{$PUB_URLSIST}assets/layouts/global/scripts/quick-sidebar.min.js" type="text/javascript"></script>
            <script src="{$PUB_URLSIST}assets/layouts/global/scripts/quick-nav.min.js" type="text/javascript"></script>
            END THEME LAYOUT SCRIPTS -->
    
    {literal}
    <script>
    jQuery( "#contenedor" ).click(function() {
//      alert( "Handler for .click() called." );
//      xajax_edoSession();
    });
    </script>
    {/literal}    