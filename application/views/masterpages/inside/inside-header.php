<!DOCTYPE html>
<?php error_reporting(0); ?>

<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="author" content="Smart Print" />
    <link rel="shortcut icon" type="image/x-icon" href="<?=base_img()."icon/logo-1.png"?>">
    
    <!-- URL Theme Color untuk Chrome, Firefox OS, Opera dan Vivaldi -->
    <meta name="theme-color" content="#000" />
    <!-- URL Theme Color untuk Windows Phone -->
    <meta name="msapplication-navbutton-color" content="#000" />
    <!-- URL Theme Color untuk iOS Safari -->
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="apple-mobile-web-app-status-bar-style" content="#000" />    
    
    <title><?=$title?> | Innovation Center</title>
    <link href="<?=base_css()."bootstrap.min.css"?>" rel="stylesheet">
    <link href="<?=base_css()."bootstrap-select.min.css"?>" rel="stylesheet">
    <link href="<?=base_css()."chosen.min.css"?>" rel="stylesheet">
    <link href="<?=base_css()."bootstrap-datetimepicker.min.css"?>" rel="stylesheet">  
	<link href="<?=base_css()."font-awesome.min.css"?>" rel="stylesheet">
    <link href="<?=base_css()."main.css"?>" rel="stylesheet">
	<link href="<?=base_css()."responsive.css"?>" rel="stylesheet">
    <link href="<?=base_css()."ripples.min.css"?>" rel="stylesheet">
    <link href="<?=base_css()."snackbar.min.css"?>" rel="stylesheet">     
    <link href="<?=base_css()."owl.carousel/owl.transitions.css"?>" rel="stylesheet">
    <link href="<?=base_css()."owl.carousel/owl.carousel.css"?>" rel="stylesheet">
    <link href="<?=base_css()."owl.carousel/owl.theme.css"?>" rel="stylesheet">

    <!--[if lt IE 9]>
	    <script src="js/html5shiv.js"></script>
	    <script src="js/respond.min.js"></script>
    <![endif]-->  
    
    <link rel="shortcut icon" href="<?=base_img()."logo2.png"?>" >
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?=base_img()."ico/apple-touch-icon-144-precomposed.png"?>" >
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?=base_img()."ico/apple-touch-icon-114-precomposed.png"?>" >
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?=base_img()."ico/apple-touch-icon-72-precomposed.png"?>" >
    <link rel="apple-touch-icon-precomposed" href="<?=base_img()."ico/apple-touch-icon-57-precomposed.png"?>" >
</head><!--/head-->
    
<body>
    <!-- Preloader -->
    <!-- <div id="preloader">
        <div class="pre-container">
            <div class="spinner">
                <div class="double-bounce1"></div>
                <div class="double-bounce2"></div>
            </div>
        </div>
    </div> -->
    <!-- end Preloader -->
    
	<header id="header">      
        <div class="navbar navbar-inverse" role="banner">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <a class="navbar-brand">
                        <!-- <h1><img src="<?= base_img()."icon/logo-3.png" ?>" width="190px" height="100px"></h1> -->
                    </a>
                    
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-right">
                        
                        <li><a href="<?=site_url('home')?>">Home</a></li>
                        <?php
                          if(isset($this->session->userdata('sc_sess')['UserId'])) {
                            $UserEmail = $this->session->userdata('sc_sess')['UserEmail'];
                            $UserId = $this->session->userdata('sc_sess')['UserId'];
                            
                            if($role->RoleId == 1){  
                            ?>
                            <li class="dropdown"><a href="">Admin Manager <i class="fa fa-angle-down"></i></a>
                                <ul role="menu" class="sub-menu">
                                    <li><a href="<?=site_url('usermanage')?>">User Manager</a></li>
                                    <li><a href="<?=site_url('projectmanage')?>">Project Manager</a></li>
                                </ul>
                            </li> 
                            <?php } ?>
                            <li class="dropdown"><a href="<?=site_url('resume')?>">Portfolio <i class="fa fa-angle-down"></i></a>
                                <ul role="menu" class="sub-menu">
                                    <li><a href="<?=site_url('resume')?>">Curriculum Vitae</a></li>
                                    <li><a href="<?=site_url('project')?>">Collection Project</a></li>
                                    <li><hr></li>
                                    <li><a href="<?=site_url('forum')?>">Forum Discussion</a></li>
                                    <li><hr></li>
                                    <li><a href="<?=site_url('artikel')?>">Collection Articles</a></li>
                                    <li><a href="<?=site_url('news')?>">Latest News</a></li>
                                </ul>
                            </li>                     
                            <li class="dropdown"><a class="btn" href="javascript:void(0)"><?=$UserEmail?> <i class="fa fa-angle-down"></i></a>
                                <ul role="menu" class="sub-menu">
                                    <li><a href="<?=site_url('history')?>">User History</a></li>
                                    <li><a href="<?=site_url('index.php/auth/logout')?>">Logout</a></li>
                                </ul>
                            </li>                        
                            <?php
                          } else {
                            ?>
                            <li><a class="btn openLogin" id="modal_trigger" href="javascript:void(0)">Login</a></li>
                            <?php
                          }         
                        ?>
                        
                    </ul>
                </div>
                <div class="search">
                    <form action="search" method="get" role="form">
                        <i class="fa fa-search"></i>
                        <div class="field-toggle">
                            <input type="text" name="destination" class="form-control search-form" autocomplete="on" placeholder="Find Resume, Project, or Article.">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </header>
    <!--/#header-->    