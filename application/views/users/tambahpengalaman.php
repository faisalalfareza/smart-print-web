<!DOCTYPE html>
<html>
   <head>
      <title>Pengalaman Berkarir</title>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
      <meta name="description" content="Mlijo is a market place of food and cullinary" />
      <meta name="author" content="Btb Group" />
      <link rel="shortcut icon" type="image/x-icon" href="<?=base_img()."icon/mini-icon-yellow.jpg"?>">
       
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
      <link href="<?=base_css()."main.css"?>" rel="stylesheet" />    
      <link href="<?=base_css()."ripples.min.css"?>" rel="stylesheet">
      <link href="<?=base_css()."snackbar.min.css"?>" rel="stylesheet"> 
      <link href="<?=base_css()."home.css"?>" rel="stylesheet">
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
            border-radius: 6px;
            box-shadow: 0px 3px 2px rgba(0, 0, 0, 0.3);
            background-color:rgba(0, 150, 136, 0.8);
            -webkit-transition: all 0.3s ease-in-out;
            -moz-transition: all 0.3s ease-in-out;
            -o-transition: all 0.3s ease-in-out;
            transition: all 0.3s ease-in-out;
            color: white;
            z-index: 9;
          } .tags-detail:hover {
            color: white;
          }

          .tags-detail.footer-button {
            background-color: rgba(0,0,0, 0.5);
            border-radius: 0px;
            box-shadow: none;
            width: 100%;
            height: 3em;
            margin: 0;
            bottom: 0;
            top: auto;
            left: 0;
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

          @media (max-width: 768px) {

          }  
      </style>       
   </head>
   <body class="home">

      <!-- Header -->
      <header class="main-header">
         <div class="container">
            <div class="header-content">        
               <nav class="site-nav">
                  <ul class="clean-list site-links">
                      <?php
                      if(isset($this->session->userdata('sc_sess')['UserId'])) {
                        $UserEmail = $this->session->userdata('sc_sess')['UserEmail'];
                        $UserEmail = substr($UserEmail, strpos($UserEmail,"<")+0, strrpos($UserEmail, "@")-strpos($UserEmail,"<")-0);  
                        $UserId = $this->session->userdata('sc_sess')['UserId'];
                        $Remember = $this->session->userdata('sc_sess')['Remember'];  
                      ?>                   
                      <div class="btn-group">
                      <a href="<?=site_url('index.php/auth/logout')?>" class="btn btn-white"><?=$UserEmail?></a>
                      </div>      
                      <?php
                      } else {
                      ?>    
 
                      <a id="modal_trigger" href="javascript:void(0)" class="btn btn-yellow openLogin" style="box-shadow: 0px 3px 3px rgba(52, 52, 52, 0.15);">Masuk</a> 

                      <a href="<?=site_url('index.php/careers')?>" class="btn btn-white">Kerjasama</a>

                      <a href="<?=site_url('index.php/snippets')?>" class="btn btn-white" style="border:0;">Produk</a>  
                        
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

         <!-- Destinations Section -->
         <section class="section section-destination" style="padding-top: 40px">

            <!-- Content -->
            <div class="container">     

                  <div class="col-md-8 col-sm-12 col-xs-24">
                     <div class="destination-box">
                        <div class="box-cover">
                           <a href="#">
                              <img src="<?=base_img()."food/3.jpg"?>" alt="destination image" />
                           </a>
                        </div>

                        <span class="boats-qty">Now We Are Hiring !</span>

                        <div class="box-details">
                           <div class="box-meta">
                              <h4 class="city">Partner</h4>
                              <p class="country">Bekerjasama dengan Bukantahubiasa dalam hal mengembangkan bisnis. Dari sisi Finansial, Teknikal, maupun Marketing</p>
                           </div>
                        </div>
                     </div>
                  </div>

                  <div class="col-md-8 col-sm-12 col-xs-24">
                     <div class="destination-box">
                        <div class="box-cover">
                           <a href="#">
                              <img src="<?=base_img()."food/7.jpg"?>" alt="destination image" />
                           </a>
                        </div>

                        <div class="box-details">
                           <div class="box-meta">
                              <h4 class="city">Gabung sebagai tim Produksi</h4>
                              <p class="country">Bergabung sebagai Tim Produksi untuk berpartisipasi dalam pembuatan produk dari Bukantahubiasa. Mulai dari tahap Destruction, Rarefaction, Compaction, dan Maturation</p>
                           </div>
                        </div>
                     </div>
                  </div>     

                  <div class="col-md-8 col-sm-12 col-xs-24">
                     <div class="destination-box">
                        <div class="box-cover">
                           <a href="#tentang" data-toggle="modal">
                              <img src="<?=base_img()."food/5.jpg"?>" alt="destination image" />
                           </a>
                        </div>

                        <div class="box-details">
                           <div class="box-meta">
                              <h4 class="city">Gabung sebagai tim Sales & Support</h4>
                              <p class="country">Bergabung sebagai Tim Sales & Support untuk bisa berinteraksi langsung dengan Pelanggan. Anda nantinya akan terkait dengan Event - event tertentu</p>
                           </div>
                        </div>
                     </div>
                  </div>

                  <div class="col-md-8 col-sm-12 col-xs-24">
                     <div class="destination-box">
                        <div class="box-cover">
                           <a href="#">
                              <img src="<?=base_img()."food/2.jpg"?>" alt="destination image" />
                           </a>
                        </div>

                        <div class="box-details">
                           <div class="box-meta">
                              <h4 class="city">Gabung sebagai tim Engineer & Maintenance</h4>
                              <p class="country">Bergabung sebagai Tim Engineer dan gunakan latar belakang teknik Anda untuk menjembatani dan mensuport Bukantahubiasa untuk Sistem Informasi.</p>
                           </div>
                        </div>
                     </div>
                  </div>

                  <div class="col-md-8 col-sm-12 col-xs-24">
                    <div class="destination-box">
                       <h2>Equal opportunity</h2>
                       <p>Di Bukantahubiasa, kita tidak hanya menerima perbedaan - kita merayakannya, kita mendukungnya. Bukantahubiasa bangga menjadi tempat kerja peluang yang setara. <br>
                       Visi kami adalah untuk mengangkat makanan tradisional terutama komoditas tahu untuk bisa dikonsumsi bukan hanya masyarakat bawah, tetapi juga kalangan menengah keatas</p>
                    </div>
                  </div>
                                    
            </div>
         </section>                     
      </div>          

      <?php $this->load->view('users/modals/fauth'); ?>
      <?php $this->load->view('masterpages/foot'); ?> 

      <!-- Custom Javascript -->
      <script type="text/javascript" src="<?=base_js()."page/home.js"?>" ></script>
      <!-- End Custom Javascript -->        

      <script type="text/javascript">
        $(document).ready(function() {
          $(function(){
            $.material.init();
            $('.modal-dialog').draggable(); 
            $('input[data-toggle="popover"]').popover({
                placement: 'top', trigger: 'focus'
            });                         

          /* Start : Tentang Kami */
          $(".to-maksud-tujuan").click(function(){              
            $(".portlet .portlet-body.visi-misi").hide();  
            $(".portlet .portlet-body.tugas-fungsi").hide();
            $(".portlet .portlet-body.maksud-tujuan").fadeIn(1000);  
            $("#sizing-tentang").attr("class", "modal-dialog modal-lg");
            document.getElementById("caption-visi-misi").innerHTML = 'Maksud & Tujuan';                  
          });   
          $(".to-tugas-fungsi").click(function(){              
            $(".portlet .portlet-body.visi-misi").hide();  
            $(".portlet .portlet-body.maksud-tujuan").hide();
            $(".portlet .portlet-body.tugas-fungsi").fadeIn(1000);
            $("#sizing-tentang").attr("class", "modal-dialog");  
            document.getElementById("caption-visi-misi").innerHTML = 'Tugas & Fungsi';                  
          });              
          $(".to-visi-misi").click(function(){   
            $(".portlet .portlet-body.maksud-tujuan").hide();  
            $(".portlet .portlet-body.tugas-fungsi").hide();                      
            $(".portlet .portlet-body.visi-misi").fadeIn(1000);   
            $("#sizing-tentang").attr("class", "modal-dialog modal-lg"); 
            document.getElementById("caption-visi-misi").innerHTML = 'Visi, Misi, Moto dan Janji Layanan';                 
          }); 
          $(".end-visi-misi").click(function(){   
            $(".portlet .portlet-body.maksud-tujuan").hide(); 
            $(".portlet .portlet-body.tugas-fungsi").hide();                       
            $(".portlet .portlet-body.visi-misi").fadeIn(1000);
            $("#sizing-tentang").attr("class", "modal-dialog modal-lg");
            document.getElementById("caption-visi-misi").innerHTML = 'Visi, Misi, Moto dan Janji Layanan';                                   
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

        $(".detail-snippet").click(function(){ 
            //alert('detail-snippet detected!');
            
            var id = $(this).attr("data-id");
            $("#detail-id").attr("value", id);
            var desc = $(this).attr("data-desc");
            $("p#detail-desc").html(desc);
            var thumb = $(this).attr("data-thumb");
            $("#detail-thumbnail").attr("src", thumb);          
        });        
      </script>
       
   </body>

    <!-- Detail Snippets -->
    <div class="modal fade" id="tentang" role="dialog">
        <div id="sizing-tentang" class="modal-dialog modal-lg">
            <div class="modal-content" style="border:0;">
                <!-- BEGIN Portlet PORTLET-->
                <div class="portlet portlet-bordered">
                    <div class="portlet-container">
                        <div class="portlet-body visi-misi">
                            <div class="col-md-24" style="padding:15px;"> 
                              <div class="row">
                                  <p><a href="#login" data-toggle="modal">Masuk</a> untuk melihat lebih</p>
                                  <div class="col-md-12">
                                    <h2 style="color:#444444;padding-left:15px;">Reseller Produk</h2>
                                    <h2 style="color:rgba(243, 156, 18,0.5);padding-left:15px;margin-top:-18px;padding-top:3px;font-size:15px;font-weight:700;">IDR ( Harga Jual Reseller - Standar Harga Jual )</h2>
                                    <p>Dengan menjadi reseller dari Bukantahubiasa, Anda berhak untuk menjual kembali produk dari Bukantahubiasa dengan harga dan tempat jual yang bebas. Ciptakan keuntungan anda sendiri</p>

                                    <div class="action_btns">  
                                      <div class="one_half"></div>                
                                      <div class="one_half last"><button type="button" class="btn to-maksud-tujuan" style="font-weight:bold;font-size:12px;">Syarat & Tanggung Jawab</button></div>  
                                    </div>

                                  </div>
                                  <div class="col-md-12">
                                    <h2 style="color:#444444;padding-left:15px;">Seller Support</h2>
                                    <h2 style="color:rgba(243, 156, 18,0.5);padding-left:15px;margin-top:-18px;padding-top:3px;font-size:15px;font-weight:700;">IDR 50.000,00 - 150.000,00</h2>
                                    <p>Seller Support adalah nantinya anda akan bekerja sama dengan Reseller Produk dari Bukantahubiasa, untuk membantu mencapai dari target penjualan.</p>

                                    <div class="action_btns">  
                                      <div class="one_half"></div>                
                                      <div class="one_half last"><button type="button" class="btn to-maksud-tujuan" style="font-weight:bold;font-size:12px;">Syarat & Tanggung Jawab</button></div>  
                                    </div>

                                  </div>
                              </div>                              
                            </div>
                            <div class="col-md-24">
                              <div class="row" style="text-align:center;padding:25px;">
                                  <p>Untuk Reseller Produk dan Seller Support merupakan yang tinggal dikota yang sama, <br>lebih khususnya di Kota Malang. Sehingga kolaborasi bisa terjalin lebih baik</p>
                              </div>
                            </div>
                            <div class="action_btns"></div>
                        </div>
                        <div class="portlet-body maksud-tujuan">
                            <div class="col-md-24" style="padding:15px;"> 
                              <div class="row">
                                  <p><a href="#login" data-toggle="modal">Masuk</a> untuk melihat lebih</p>

                                  <div class="col-md-12">
                                    <h2 style="color:#444444;padding-left:15px;">Seller Support</h2>
                                    <h2 style="color:rgba(243, 156, 18,0.5);padding-left:15px;margin-top:-18px;padding-top:3px;font-size:15px;font-weight:700;">IDR 50.000,00 - 150.000,00</h2>
                                    <p>Seller Support adalah nantinya anda akan bekerja sama dengan Reseller Produk dari Bukantahubiasa, untuk membantu mencapai dari target penjualan.</p>  
                                  </div>
                                  <div class="col-md-12">
                                    <p>Tanggung Jawab</p>
                                    <p>The backbone of Bukantahubiasa’s success, the account managers, consultants, admins, and analysts in these roles are all dedicated to top-notch client service and growing the business.</p>

                                    <p>Syarat & Ketentuan</p>
                                    <p>The backbone of Bukantahubiasa’s success, the account managers, consultants, admins, and analysts in these roles are all dedicated to top-notch client service and growing the business.</p>

                                    <div class="action_btns col-md-24">                  
                                      <div class="one_half"><button type="button" class="btn to-visi-misi" style="font-weight:bold;font-size:12px;">Kembali</button></div>  
                                      <div class="one_half last"><button type="submit" class="btn" style="font-weight:bold;font-size:12px;">Assign Pekerjaan</button></div>  
                                    </div>

                                  </div>
                              </div>
                            </div>
                            <div class="action_btns"></div>
                        </div>
                        <div class="portlet-body tugas-fungsi" style="font-weight: 700">
                            <div class="col-md-24">
                                <h2>Tugas</h2>
                                <p>Kantor Pelayanan Terpadu mempunyai tugas melaksanakan penyusunan dan pelaksanaan di bidang pelayanan perizinan</p>

                                <h3>Untuk melaksanakan tugas tersebut KPT mempunyai fungsi untuk :</h3>
                                  <blockquote>
                                    <ul class="layanan" style="font-weight: 700">
                                      <li>Perumusan kebijakan teknis di bidang pelayanan perizinan</li>
                                      <li>Pemberian dukungan atas penyelenggaraan pemerintahan daerah di bidang pelayanan perizinan</li>
                                      <li>Pembinaan dan pelaksanaan tugas dibidang pelayanan perizinan</li>
                                      <li>Pelaksanaan tugas lain yang diberikan oleh Bupati sesuai dengan tugas dan fungsinya</li> 
                                    </ul>
                                  </blockquote>                               

                                <div class="action_btns">                      
                                    <div class="col-md-12"></div>
                                    <div class="one_half col-md-12"><button type="button" class="btn to-visi-misi" style="font-weight:bold"><i class="fa fa-arrow-left"></i> &nbsp; Kembali ke visi misi</button></div>   
                                </div>                                  
                            </div>
                            <div class="action_btns"></div>
                        </div>                        
                    </div>    
                </div>
                <!-- END Portlet PORTLET-->
            </div>
        </div>
    </div>
    <!--/End Modal-->

</html>
