<!DOCTYPE html>
<html>
   <head>
      <title>Smart Print | Everywhere, Anytime</title>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
      <meta name="author" content="Smart Print" />
      <link rel="shortcut icon" type="image/x-icon" href="<?=base_img()."icon/logo-1.png"?>">
       
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
      <link href="<?=base_css()."animate.min.css"?>" rel="stylesheet" />      
      <link href="<?=base_css()."screen.css"?>" rel="stylesheet" />
      <link href="<?=base_css()."home.css"?>" rel="stylesheet">
      <link href="<?=base_css()."main.css"?>" rel="stylesheet" />    
      <link href="<?=base_css()."ripples.min.css"?>" rel="stylesheet">
      <link href="<?=base_css()."snackbar.min.css"?>" rel="stylesheet"> 
	  <link href="<?=base_css()."main.css"?>" rel="stylesheet">
	  <link href="<?=base_css()."responsive.css"?>" rel="stylesheet">
      <link href="<?=base_css()."owl.carousel/owl.transitions.css"?>" rel="stylesheet">
      <link href="<?=base_css()."owl.carousel/owl.carousel.css"?>" rel="stylesheet">
      <link href="<?=base_css()."owl.carousel/owl.theme.css"?>" rel="stylesheet">  

      <link href='//fonts.googleapis.com/css?family=Lato:100' rel='stylesheet' type='text/css'> 

      <style>

          /* -------- Snippets Grid -------- */

          #pinBoot {
            position: relative;
            max-width: 100%;
            width: 100%;
          }
          .white-panel img {
            width: 100%;
            max-width: 100%;
            height: auto;
            border-radius: 10px 10px 10px 10px;
          }

          a.tags { display: none; }

          .white-panel {
            position: absolute;
            background: white;
            
            border-radius: 10px;
            z-index: 1;
            padding: 0px;
            outline: 0;
            border: 0;
          }  
          .white-panel:hover {
            box-shadow: 0px 1px 2px rgba(0, 0, 0, 0.3);
            margin-top: -5px;
            -webkit-transition: all 0.3s ease-in-out;
            -moz-transition: all 0.3s ease-in-out;
            -o-transition: all 0.3s ease-in-out;
            transition: all 0.3s ease-in-out;
          }             
          .white-panel:hover .tags {
            top: 1em;
            left: 1em;
            width: 80% auto;
            padding: 5px 15px 5px 15px;
            display: block;
            font-size: 13px;
            font-family: "Calibri Light";  
            font-weight: 900;
            text-align: center;
            position: absolute;
            border-radius: 6px;
            box-shadow: 0px 3px 2px rgba(0, 0, 0, 0.3);
            background-color:rgba(0, 150, 136, 0.8);
            -webkit-transition: all 0.3s ease-in-out;
            -moz-transition: all 0.3s ease-in-out;
            -o-transition: all 0.3s ease-in-out;
            transition: all 0.3s ease-in-out;
            color: white;
            z-index: 9;
          }                 
          .white-panel h4 {
            color: #343435;  
            padding: 15px 15px 0px 15px;
            font-size: 15px;
            font-weight: 900;
            line-height: 1em;
            font-family: "Lato";
          }
          .white-panel p {
            color: #343435;  
            font-size: 12px;
            font-weight: 900;
            line-height: 1em;
            font-family: "Calibri Light";
          }

          .tags-detail {
            top: 1em;
            left: 1em;
            width: 80% auto;
            padding: 10px 15px 10px 15px;
            display: block;
            font-size: 13px;
            font-family: "Calibri Light";  
            font-weight: 900;
            text-align: center;
            position: absolute;
            box-shadow: 0px 3px 2px rgba(0, 0, 0, 0.3);
            background-color: #3498db;
            -webkit-transition: all 0.3s ease-in-out;
            -moz-transition: all 0.3s ease-in-out;
            -o-transition: all 0.3s ease-in-out;
            transition: all 0.3s ease-in-out;
            color: white;
            z-index: 9;
          } .tags-detail:hover {
            color: white;
          }

          .form-group.comment {
            background-color: transparent;
            position: fixed;
            border-radius: 0px;
            display: block;
            width: 100% auto;
            height: 3em;
            margin: 0;
            bottom: 0;
          } 

          body.dom-ready {
              background-color: rgba(99,1,88, 0.8);
          }
      </style>          
       
   </head>
   <body class="home">

      <!-- Header -->
      <header class="main-header">
         <div class="container">
            <div class="header-content"> 
               <a style="font-size: 25px;color: white;font-family: 'Trebuchet MS';">
                   <img src="<?= base_img()."icon/logo-3.png" ?>" style="width: 70px;margin-top: -10px;">
                   Smart Print
               </a>          
               <nav class="site-nav">
                  <ul class="clean-list site-links">
                    <?php
                    if(isset($this->session->userdata('sc_sess')['UserId'])) {
                        $UserEmail = $this->session->userdata('sc_sess')['UserEmail'];
                        $UserEmail = substr($UserEmail, strpos($UserEmail,"<")+0, strrpos($UserEmail, "@")-strpos($UserEmail,"<")-0);  
                        $UserId = $this->session->userdata('sc_sess')['UserId'];
                        $Remember = $this->session->userdata('sc_sess')['Remember'];  
                        ?>    
               
                        <?php 
                            switch($role->RoleId) {
                                case "1":
                                break;

                                case "2":
                                    ?>

                                    <a class="btn btn-white">Timeline</a>  
                                    <a href="<?=site_url('index.php/document')?>" class="btn btn-white" style="border:0;">Print Document</a>  
                                    <a class="btn btn-white" style="border:0;">My Document History</a>
                                    
                                    <?php
                                break;

                                case "3":
                                    ?>

                                    <a href="<?=site_url('index.php/document')?>" class="btn btn-white">Manage Document</a>  

                                    <?php
                                break;
                            }
                        ?>
                        <a href="<?=site_url('index.php/auth/logout')?>" class="btn btn-white" style="border:0;">Logout</a>

                        <?php
                    } else {
                        ?>    
 
                      <a id="modal_trigger" href="javascript:void(0)" class="btn btn-yellow openLogin" style="box-shadow: 0px 3px 3px rgba(52, 52, 52, 0.15);">Masuk</a> 

                      <a class="btn btn-white">Kerjasama</a>

                      <div class="alert-top">
                          <?=$this->session->flashdata('regMsg')?>
                      </div>
                    
                    <?php
                    }         
                    ?>
                  </ul>     
               </nav>
                
            </div>
         </div>
      </header>
       
      <!-- Main Content -->
      <div class="content-box">
         <!-- Hero Section -->
         <section class="section section-hero">
            <div class="hero-box">
               <div class="container">
                  <div class="hero-text align-center">
                    <div class="col-md-12 first">

                     <div class="title">
                     "Selalu ada memberikan Anda pengalaman mencetak dokumen yang terbaik. Kepuasan Anda adalah bagian kepuasaan dari Kami"</div>

                     <!-- <div class="quote">Selalu ada memberikan anda pengalaman kuliner dan cita rasa yang terbaik</div>  -->

                     <div class="quote" style="margin-top:0.8em;">
                        <span style="background-color:#fdfdfd;padding:5px;box-shadow: 2px 2px 15px rgba(52, 52, 52, 0.15);border-radius:3px;color:#9b59b6;margin:0.01em;">1</span>
                        <span style="color:white;margin:0.01em;">,</span>
                        <span style="background-color:#fdfdfd;padding:5px;box-shadow: 2px 2px 15px rgba(52, 52, 52, 0.15);border-radius:3px;color:#9b59b6;margin:0.01em;">1</span>
                         <span style="background-color:#fdfdfd;padding:5px;box-shadow: 2px 2px 15px rgba(52, 52, 52, 0.15);border-radius:3px;color:#9b59b6;margin:0.01em;">3</span>
                         <span style="background-color:#fdfdfd;padding:5px;box-shadow: 2px 2px 15px rgba(52, 52, 52, 0.15);border-radius:3px;color:#9b59b6;margin:0.01em;">2</span>
                        &nbsp; Orang telah menjadi pelanggan kami
                     </div>

                     <form action="<?php echo base_url()."index.php/auth/interested"?>" method="post" class="destinations-form">
                       <div class="input-line">
                          <input type="email" name="RespondenEmail" class="form-input check-value" placeholder="Support kami dengan email anda .." required />
                          <button type="submit" name="destination-submit" class="form-submit btn btn-special">Support</button>
                       </div>
                    </form>

                    </div>
                    <div class="col-md-12 last paddingme">  
                  
                          <div class="sidebar content-box left-box">
                              <ul class="nav">
                                  <!-- Main menu -->                   
                                  
                                  <li><a href="javascript:void(0)"><img src="<?=base_img()."icon/hand-care.png"?>"> &nbsp; Memudahkan cetak dokumen tanpa ribet</a></li>   
                                  <li><a href="javascript:void(0)"><img src="<?=base_img()."icon/organic-food.png"?>"> &nbsp; Tersedia pilihan merchant yang terpercaya</a></li>                              
                                  <li><a href="javascript:void(0)"><img src="<?=base_img()."icon/mask.png"?>"> &nbsp; Fleksibilitas menghemat waktu dan tenaga  </a></li>
                                  
                              </ul>
                          </div>
                 
                    </div>
                  </div>         
               </div>
            </div>
         </section>                                
      </div>    

      <!-- Parallax Box -->
      <div class="parallax-box">
         <div class="container-list">

                <div class="col-lg-12 padding-none"> 
                     <div class="slide-text news">
                      <h3>Highlight News</h3>
                        <div class="slide-news">
                            <?php
                                $i = 0;
                                foreach($news as $getNews){
                                $getContent = strip_tags($getNews->NewsContent);
                                if (strlen($getContent) > 250) {
                                    // truncate string
                                    $stringCut = substr($getContent, 0, 250);
                                    $getContent = substr($stringCut, 0, strrpos($stringCut, ' ')).'...'; 
                                }
                            ?>
                            <a href="<?=site_url('home/news/detailnews/'.$this->encrypt->encode($getNews->NewsId))?>" class="single-news first">
                                <h1><?=$getNews->NewsTitle?></h1>
                                <p><?=$getContent?></p>
                            </a> 
                            <?php
                                if (++$i == 5) break;
                                }
                            ?>                                
                        </div>
                    </div>                                  
                </div>
                <div class="col-lg-12 padding-none">
                     <div class="slide-text artikel">
                     <h3>Collection Articles</h3>
                        <div class="slide-news">
                            <?php
                                $i = 0;
                                foreach($artikel as $getArtikel){
                                $getContent = strip_tags($getArtikel->ArtclContent);
                                if (strlen($getContent) > 250) {
                                    // truncate string
                                    $stringCut = substr($getContent, 0, 250);
                                    $getContent = substr($stringCut, 0, strrpos($stringCut, ' ')).'...'; 
                                }
                            ?>
                            <a href="<?=site_url('home/artikel/detailarticle/'.$this->encrypt->encode($getArtikel->ArtclId))?>" class="single-news first">
                                <h1><?=$getArtikel->ArtclTitle?></h1>
                                <p><?=$getContent?></p>
                            </a> 
                            <?php
                                if (++$i == 5) break;
                                }
                            ?>                                
                        </div>
                    </div>                                  
                </div>              
    
        </div>
      </div>   
       
      <?php $this->load->view('form-auth'); ?>
      <?php $this->load->view('masterpages/foot'); ?> 
       
        <!-- Custom Javascript -->
        <script type="text/javascript" src="<?=base_js()."page/home.js"?>" ></script>
        <!-- End Custom Javascript -->       
  
        <script type="text/javascript">
          $(document).ready(function () {    
              $(function(){
                $.material.init();
                $(".form-group select").dropdown();
                $('.modal-dialog').draggable(); 
                $('input[data-toggle="popover"]').popover({
                    placement: 'top', trigger: 'focus'
                });

                /* Start : Tentang Kami */
                $(".to-maksud-tujuan").click(function(){              
                  $(".portlet .portlet-body.visi-misi").hide();  
                  $(".portlet .portlet-body.tugas-fungsi").hide();
                  $(".portlet .portlet-body.maksud-tujuan").show();  
                  $("#sizing-tentang").attr("class", "modal-dialog modal-lg");                  
                });   
                $(".to-tugas-fungsi").click(function(){              
                  $(".portlet .portlet-body.visi-misi").hide();  
                  $(".portlet .portlet-body.maksud-tujuan").hide();
                  $(".portlet .portlet-body.tugas-fungsi").show();
                  $("#sizing-tentang").attr("class", "modal-dialog modal-lg");               
                });              
                $(".to-visi-misi").click(function(){   
                  $(".portlet .portlet-body.maksud-tujuan").hide();  
                  $(".portlet .portlet-body.tugas-fungsi").hide();                      
                  $(".portlet .portlet-body.visi-misi").show();   
                  $("#sizing-tentang").attr("class", "modal-dialog modal-lg");              
                }); 
                /* End : Tentang Kami */                     
              });   

              //minimum 8 characters
              var bad = /(?=.{8,}).*/;
              //Alpha Numeric plus minimum 8
              var good = /^(?=\S*?[a-z])(?=\S*?[0-9])\S{8,}$/;
              //Must contain at least one upper case letter, one lower case letter and (one number OR one special char).
              var better = /^(?=\S*?[A-Z])(?=\S*?[a-z])((?=\S*?[0-9])|(?=\S*?[^\w\*]))\S{8,}$/;
              //Must contain at least one upper case letter, one lower case letter and (one number AND one special char).
              var best = /^(?=\S*?[A-Z])(?=\S*?[a-z])(?=\S*?[0-9])(?=\S*?[^\w\*])\S{8,}$/;

              $('#RegPass').on('keyup', function () {
                  var password = $(this);
                  var pass = password.val();
                  var passLabel = $('[for="password"]');
                  var stength = 'Weak';
                  var pclass = 'danger';
                  if (best.test(pass) == true) {
                      stength = 'Very Strong';
                      pclass = 'success';
                  } else if (better.test(pass) == true) {
                      stength = 'Strong';
                      pclass = 'warning';
                  } else if (good.test(pass) == true) {
                      stength = 'Almost Strong';
                      pclass = 'warning';
                  } else if (bad.test(pass) == true) {
                      stength = 'Weak';
                  } else {
                      stength = 'Very Weak';
                  }

                  var popover = password.attr('data-content', stength).data('bs.popover');
                  popover.setContent();
                  popover.$tip.addClass(popover.options.placement).removeClass('danger success info warning primary').addClass(pclass);

              });

          });
        </script>       
   </body>

    <!-- Detail Snippets -->
    <!-- <div class="modal fade" id="tentang" role="dialog">

        <div id="sizing-tentang" class="modal-dialog modal-lg">
            <div class="modal-content" style="border:0;">
                <div class="portlet portlet-bordered" style="padding:0;margin:0;border:0;">
                    <div class="portlet-container" style="padding:0;margin:0;border:0;">
                    <form action="<?php echo base_url()."index.php/auth/collaboration"?>" method="post">
                        <div class="portlet-body visi-misi" style="padding:0;margin:0;border:0;">
                            <div class="col-md-6" style="padding:0;margin:0;border:0;">
                              <img src="<?=base_img()."food/karir-btb.jpg"?>">
                            </div> 
                            <div class="col-md-18" style="padding:15px;">  
                           
                                <div class="list-group">
                                    <div class="group-list">
                                        <div class="list-group-item">
                                            <div class="checkbox pull-left">
                                                <label>
                                                    <input type="radio" name="CollaborateStatus" value="Pengelola" class="to-maksud-tujuan">                                        
                                                </label>   
                                            </div>
                                            <div class="pull-left form-control-inline-">
                                                <a class="list-group-item-heading title">Pemilik, Pengelola & Penanggung Jawab Lahan Parkir</a>
                                                <p class="list-group-item-text sub-title">Yang berhak mengatur dan mengelola lahan parkir</p>       
                                            </div>  
                                            <div class="clearfix"></div>
                                        </div>
                                        <div class="list-group-item">
                                            <div class="checkbox pull-left">
                                                <label>
                                                    <input type="radio" name="CollaborateStatus" value="Jukir" class="to-maksud-tujuan">                                        
                                                </label>   
                                            </div>
                                            <div class="pull-left form-control-inline">
                                                <a class="list-group-item-heading title">Juru Parkir</a>
                                                <p class="list-group-item-text sub-title">Yang mengatur akses dalam tempat parkir</p>       
                                            </div>  
                                            <div class="clearfix"></div>
                                        </div>
                                        <div class="list-group-item">
                                            <div class="checkbox pull-left">
                                                <label>
                                                    <input type="radio" name="CollaborateStatus" value="Lainnya" class="to-maksud-tujuan">                                        
                                                </label>   
                                            </div>
                                            <div class="pull-left form-control-inline">
                                                <a class="list-group-item-heading title">Lainnya</a>
                                                <p class="list-group-item-text sub-title">Selain pilihan diatas, yang masih terkait</p>       
                                            </div>  
                                            <div class="clearfix"></div>
                                        </div>
                                    </div>                                       
                                </div>                                 
                            </div>
                            <div class="action_btns"></div>
                        </div>                    
                        <div class="portlet-body maksud-tujuan" style="padding:0;margin:0;border:0;">
                            <div class="col-md-6" style="padding:0;margin:0;border:0;">
                                <img src="<?=base_img()."food/karir-btb.jpg"?>">
                            </div> 
                            <div class="col-md-18" style="padding:15px;">    
                                <h2 id="detail-desc" style="padding-left:12px;font-size:30px;color:#444444">Bergabung Sebagai Mitra</h2>             
                                <p id="detail-desc" style="font-size:15px;">Iyopark membuka peluang kemitraan sinergis untuk dapat tumbuh kembang bersama. Silahkan isi form kemitraan di samping ini terkait kemitraan yang ingin Anda tawarkan.</p>

                                <div class="form-group" style="padding-left:12px;">
                                 <label class="control-label" for="inputDefault" style="font-family:'Lato'">Nama Lengkap</label>
                                 <input type="text" name="CollaborateName" class="form-control" placeholder="Tulis nama lengkap Anda disini .." autofocus required>
                                </div>
                                
                                <div class="action_btns">                           
                                  <div class="one_half"><button type="button" class="btn to-visi-misi" style="font-weight:bold">Kembali</button></div>  
                                  <div class="one_half last"><button type="button" class="btn to-tugas-fungsi" style="font-weight:bold">Selanjutnya</button></div>  
                                </div> 
                                
                            </div>
                            <div class="action_btns"></div>
                        </div>
                        <div class="portlet-body tugas-fungsi" style="padding:0;margin:0;border:0;">
                            <div class="col-md-6" style="padding:0;margin:0;border:0;">
                              <img src="<?=base_img()."food/karir-btb.jpg"?>">
                            </div> 
                            <div class="col-md-18" style="padding:15px;"> 

                             <div class="row">  
                              <div class="col-md-12">
                                <div class="form-group" style="padding-left:12px;">
                                 <label class="control-label" for="inputDefault" style="font-family:'Lato'">No. Handpone</label>
                                  <div class="input-group">
                                    <a onclick="randomString()" style="cursor:pointer" class="input-group-addon">
                                        +62
                                    </a>
                                    <input id="logUser" type="telp" name="CollaborateContact" maxlength="11" class="form-control" required>
                                   </div>
                                </div>
                              </div>
                              <div class="col-md-12">  
                                <div class="form-group" style="padding-left:12px;">
                                 <label class="control-label" for="inputDefault" style="font-family:'Lato'">Email</label>
                                 <input type="email" name="CollaborateEmail" class="form-control" required>
                                </div>
                              </div>
                             </div>

                             <div class="form-group" style="padding-left:12px;">
                               <label class="control-label" for="inputDefault" style="font-family:'Lato'">Deskripsi Kemitraan</label>
                               <p style="padding:0;">Jelaskan sedetail-detailnya demi mencapai pemahaman yang sama.</p>
                               <textarea name="CollaborateDescription" placeholder="Kemitraan Anda .." class="form-control" required></textarea>
                              </div>

                            <div class="action_btns">                           
                              <div class="one_half"><button type="button" class="btn to-maksud-tujuan" style="font-weight:bold">Kembali</button></div>  
                              <div class="one_half last"><button type="submit" style="font-weight:bold">Gabung</button></div>  
                            </div>

                            </div>
                            <div class="action_btns"></div>
                        </div>                                               
                    </div> 
                    </form>   
                </div>
            </div>
        </div>
    </div> -->
    <!--/End Modal--> 

</html>
