<!DOCTYPE html>
<?php error_reporting(0); ?>

<html lang="en">
   <head>
      <title><?=$title?> | Innovation Center</title>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
      <meta name="description" content="Neogeeks Portofolio" />
      <meta name="author" content="MIS Visionet" />
      <link rel="shortcut icon" type="image/x-icon" href="<?=base_img()."logo2.png"?>" >
       
      <!-- URL Theme Color untuk Chrome, Firefox OS, Opera dan Vivaldi -->
      <meta name="theme-color" content="#fff" />
      <!-- URL Theme Color untuk Windows Phone -->
      <meta name="msapplication-navbutton-color" content="#fff" />
      <!-- URL Theme Color untuk iOS Safari -->
      <meta name="apple-mobile-web-app-capable" content="yes" />
      <meta name="apple-mobile-web-app-status-bar-style" content="#fff" />        
       
      <link href="<?=base_css()."bootstrap.min.css"?>" rel="stylesheet" />
      <link href="<?=base_css()."bootstrap-select.min.css"?>" rel="stylesheet">
      <link href="<?=base_css()."font-awesome.min.css"?>" rel="stylesheet">        
      <link href="<?=base_css()."screen.css"?>" rel="stylesheet" />
      <link href="<?=base_css()."main.css"?>" rel="stylesheet" /> 
      <link href="<?=base_css()."chosen.min.css"?>" rel="stylesheet" />    
      <link href="<?=base_css()."ripples.min.css"?>" rel="stylesheet">
      <link href="<?=base_css()."snackbar.min.css"?>" rel="stylesheet"> 
      <link href="<?=base_css()."main.css"?>" rel="stylesheet">
      <link href="<?=base_css()."responsive.css"?>" rel="stylesheet">
      <link href="<?=base_css()."owl.carousel/owl.transitions.css"?>" rel="stylesheet">
      <link href="<?=base_css()."owl.carousel/owl.carousel.css"?>" rel="stylesheet">
      <link href="<?=base_css()."owl.carousel/owl.theme.css"?>" rel="stylesheet">
            
   </head>
   <body class="home" id="page">
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
                    <h1><img src="<?= base_img()."neogeeks-ekstern.png" ?>" width="190px" height="160px"></h1>
                    </a>
                    
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-right">
                        
                        <li><a href="<?=site_url('home')?>">Home</a></li>
                        <?php
                          if(isset($this->session->userdata('sc_sess')['UserId'])) {
                            $UserEmail = $this->session->userdata('sc_sess')['UserEmail'];
                            $UserId = $this->session->userdata('sc_sess')['UserId']; 
                            ?>

                            <li class="dropdown"><a href="<?=site_url('home/resume')?>">Portfolio <i class="fa fa-angle-down"></i></a>
                                <ul role="menu" class="sub-menu">
                                    <li><a href="<?=site_url('home/resume')?>">Curriculum Vitae</a></li>
                                    <li><a href="<?=site_url('home/project')?>">Collection Project</a></li>
                                </ul>
                            </li>                     
                            <li class="dropdown"><a class="btn" href="javascript:void(0)"><?=$UserEmail?> <i class="fa fa-angle-down"></i></a>
                                <ul role="menu" class="sub-menu">
                                    <li><a href="<?=site_url('home/history')?>">User History</a></li>
                                    <li><a href="<?=site_url('auth/logout')?>">Logut</a></li>
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