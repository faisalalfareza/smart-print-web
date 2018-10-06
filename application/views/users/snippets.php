<!DOCTYPE html>
<html>
   <head>
      <title>Feeds</title>
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
                <section id="pinBoot">

                  <?php foreach($listsnippets as $list) { ?>
                    <article class="white-panel">
                      <a onclick="alert('tags section!')" class="tags">Bukantahubiasa</a>
                      <a class="detail-snippet" href="#tentang" data-backdrop="false" data-toggle="modal" data-id="<?=$list->idsnippet?>" data-desc="<?=$list->description?>" data-thumb="<?=$list->thumbnail?>">
                        <img src="<?=base_img()."food/food-feeds/".$list->thumbnail.".jpg"?>" alt="">
                        
                        <h4><?=$list->title?></h4>
                        <p>
                          <?=$list->description?>
                          <?php 
                            $type = unserialize($list->tags);
                            for($x=0; $x<=(count($type)-1); $x++) { 
                              ?> <a style="color:#3498db"><?=$type[$x];?></a> <?php
                            }
                          ?>

                        </p>
                      </a>
                    </article>
                  <?php } ?>                 

                </section>                                     
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
          $('#pinBoot').pinterest_grid({
            no_columns: 4,
            padding_x: 10,
            padding_y: 10,
            margin_bottom: 50,
            single_column_breakpoint: 700
          });

          var snipdesc = document.getElementById("snippets-desc");
          if(snipdesc.innerHTML.indexOf('#') != "-1") {
          }

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
            $(".portlet .portlet-body.maksud-tujuan").show();  
            $("#sizing-tentang").attr("class", "modal-dialog modal-lg");
            document.getElementById("caption-visi-misi").innerHTML = 'Maksud & Tujuan';                  
          });   
          $(".to-tugas-fungsi").click(function(){              
            $(".portlet .portlet-body.visi-misi").hide();  
            $(".portlet .portlet-body.maksud-tujuan").hide();
            $(".portlet .portlet-body.tugas-fungsi").show();
            $("#sizing-tentang").attr("class", "modal-dialog");  
            document.getElementById("caption-visi-misi").innerHTML = 'Tugas & Fungsi';                  
          });              
          $(".to-visi-misi").click(function(){   
            $(".portlet .portlet-body.maksud-tujuan").hide();  
            $(".portlet .portlet-body.tugas-fungsi").hide();                      
            $(".portlet .portlet-body.visi-misi").show();   
            $("#sizing-tentang").attr("class", "modal-dialog modal-lg"); 
            document.getElementById("caption-visi-misi").innerHTML = 'Visi, Misi, Moto dan Janji Layanan';                 
          }); 
          $(".end-visi-misi").click(function(){   
            $(".portlet .portlet-body.maksud-tujuan").hide(); 
            $(".portlet .portlet-body.tugas-fungsi").hide();                       
            $(".portlet .portlet-body.visi-misi").show();
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

        ;(function ($, window, document, undefined) {
            var pluginName = 'pinterest_grid',
                defaults = {
                    padding_x: 10,
                    padding_y: 10,
                    no_columns: 3,
                    margin_bottom: 50,
                    single_column_breakpoint: 700
                },
                columns,
                $article,
                article_width;

            function Plugin(element, options) {
                this.element = element;
                this.options = $.extend({}, defaults, options) ;
                this._defaults = defaults;
                this._name = pluginName;
                this.init();
            }

            Plugin.prototype.init = function () {
                var self = this,
                    resize_finish;

                $(window).resize(function() {
                    clearTimeout(resize_finish);
                    resize_finish = setTimeout( function () {
                        self.make_layout_change(self);
                    }, 11);
                });

                self.make_layout_change(self);

                setTimeout(function() {
                    $(window).resize();
                }, 500);
            };

            Plugin.prototype.calculate = function (single_column_mode) {
                var self = this,
                    tallest = 0,
                    row = 0,
                    $container = $(this.element),
                    container_width = $container.width();
                    $article = $(this.element).children();

                if(single_column_mode === true) {
                    article_width = $container.width() - self.options.padding_x;
                } else {
                    article_width = ($container.width() - self.options.padding_x * self.options.no_columns) / self.options.no_columns;
                }

                $article.each(function() {
                    $(this).css('width', article_width);
                });

                columns = self.options.no_columns;

                $article.each(function(index) {
                    var current_column,
                        left_out = 0,
                        top = 0,
                        $this = $(this),
                        prevAll = $this.prevAll(),
                        tallest = 0;

                    if(single_column_mode === false) {
                        current_column = (index % columns);
                    } else {
                        current_column = 0;
                    }

                    for(var t = 0; t < columns; t++) {
                        $this.removeClass('c');
                    }

                    if(index % columns === 0) {
                        row++;
                    }

                    $this.addClass('c' + current_column);
                    $this.addClass('r' + row);

                    prevAll.each(function(index) {
                        if($(this).hasClass('c' + current_column)) {
                            top += $(this).outerHeight() + self.options.padding_y;
                        }
                    });

                    if(single_column_mode === true) {
                        left_out = 0;
                    } else {
                        left_out = (index % columns) * (article_width + self.options.padding_x);
                    }

                    $this.css({
                        'left': left_out,
                        'top' : top
                    });
                });

                this.tallest($container);
                $(window).resize();
            };

            Plugin.prototype.tallest = function (_container) {
                var column_heights = [],
                    largest = 0;

                for(var z = 0; z < columns; z++) {
                    var temp_height = 0;
                    _container.find('.c'+z).each(function() {
                        temp_height += $(this).outerHeight();
                    });
                    column_heights[z] = temp_height;
                }

                largest = Math.max.apply(Math, column_heights);
                _container.css('height', largest + (this.options.padding_y + this.options.margin_bottom));
            };

            Plugin.prototype.make_layout_change = function (_self) {
                if($(window).width() < _self.options.single_column_breakpoint) {
                    _self.calculate(true);
                } else {
                    _self.calculate(false);
                }
            };

            $.fn[pluginName] = function (options) {
                return this.each(function () {
                    if (!$.data(this, 'plugin_' + pluginName)) {
                        $.data(this, 'plugin_' + pluginName,
                        new Plugin(this, options));
                    }
                });
            }

        })(jQuery, window, document); 

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

        <div class="next">
          <button class="btn btn-primary btn-raised end-visi-misi" data-dismiss="modal" style="background-color:rgba(0, 150, 136, 0.8);"><i class="fa fa-circle-o"></i></button>
        </div> 

        <div id="sizing-tentang" class="modal-dialog modal-lg">
            <div class="modal-content" style="border:0;">
                <!-- BEGIN Portlet PORTLET-->
                <div class="portlet portlet-bordered" style="padding:0;margin:0;border:0;"">
                    <div class="portlet-container" style="padding:0;margin:0;border:0;">
                        <div class="portlet-body visi-misi" style="padding:0;margin:0;border:0;">
                            <div class="col-md-12" style="padding:0;margin:0;border:0;">
                                <a id="detail-tenant" class="btn tags-detail"><i class="fa fa-tag"></i> &nbsp; Bukantahubiasa</a>
                                <a class="btn tags-detail footer-button"><i class="fa fa-shopping-cart"></i> &nbsp; MASUKKAN KRESEK BELANJA</a>
                                <img id="detail-thumbnail" src="" alt="">
              
                            </div> 
                            <div class="col-md-12" style="padding:15px;">                 
                                <p id="detail-desc"></p>

                                <hr style="padding:10px">
                                <div class="snippets-comment">
                                  <div class="form-group comment">
                                    <div class="input-group">
                                      <?php if(isset($this->session->userdata('sc_sess')['UserId'])) { ?>
                                      
                                          <input type="text" class="form-control input-form" placeholder="Beri komentar atau tanggapan." autofocus autocomplete/> 
                                          <a type="submit" class="input-group-addon" style="background-color:transparent;"><i class="fa fa-send-o"></i></a>
                                        
                                      <?php } else { ?>
                                          <p><a href="#login" data-toggle="modal">Masuk</a> untuk menyukai atau mengomentari.</p>
                                      <?php } ?>
                                    </div>
                                  </div>
                                </div>

                                <!--
                                <div class="action_btns">                           
                                  <div class="one_half"><button type="button" class="btn to-maksud-tujuan" style="font-weight:bold">Maksud, Tujuan ?</button></div>  
                                  <div class="one_half last"><button type="button" class="btn to-tugas-fungsi" style="font-weight:bold">Tugas dan fungsi kami ?</button></div>  
                                </div> 
                                -->
                            </div>
                            <div class="action_btns"></div>
                        </div>
                        <div class="portlet-body maksud-tujuan" style="font-weight: 700">
                            <div class="col-md-12">
                                <h2>Maksud</h2>
                                <p>Maksud dibentuk Kantor Pelayanan Terpadu Kabupaten Lumajang adalah untuk <b>menyelenggarakan pelayanan perizinan kepada masyarakat yang prima</b>, sebagaimana tertuang dalam Keputusan Menteri Pendayagunaan Aparatur Negara Nomor 63 Tahun 2003 yaitu kesederhanaan, kejelasan, kepastian waktu, akurasi, keamanan, tanggung jawab, kelengkapan sarana dan prasarana, kemudahan akses, kedisiplinan, kesopanan, keramahan dan kenyamanan sehingga hal tersebut dapat mendorong terciptanya iklim usaha yang kondusif bagi investasi dalam rangka  memberdayakan ekonomi masyarakat Lumajang.</p>
                            </div>
                            <div class="col-md-12">
                                <h2>Tujuan</h2>
                                <p>Secara umum tujunan Pelayanan Prima adalah adalah <b>kepuasan dan pemenuhi kebutuhan pelanggan</b>. Untuk mencapai tujuan tersebut diperlukan kualitas pelayanan yang sesuai dengan Indeks Kepuasan Masyarakat dan Standar Pelayanan Prima. Selain itu pada tujuan dibentukan Kantor Pelayanan Terpadu adalah :</p>
                                <div class="list-group">
                                    <div class="waiting-list">
                                      <div class="list-group-item">
                                          <div class="pull-left form-control-inline">
                                              <p class="list-group-item-text sub-title time">
                                              Menyederhanakan sistem dalam pelayanan</p>     
                                          </div>
                                          <div class="clearfix"></div>
                                      </div>
                                      <div class="list-group-item">                             
                                          <div class="pull-left form-control-inline">
                                              <p class="list-group-item-text sub-title time">
                                              Meningkatkan efisiensi dan efektivitas kinerja aparatur</p>     
                                          </div>
                                          <div class="clearfix"></div>
                                      </div>
                                      <div class="list-group-item">
                                          <div class="pull-left form-control-inline">
                                              <p class="list-group-item-text sub-title time">
                                              Mewujudkan pelayanan prima</p>     
                                          </div>
                                          <div class="clearfix"></div>
                                      </div>
                                    </div>
                                </div>                                

                                <div class="action_btns">                      
                                    <div class="col-md-12"></div>
                                    <div class="one_half col-md-12"><button type="button" class="btn to-visi-misi" style="font-weight:bold"><i class="fa fa-arrow-left"></i> &nbsp; Kembali ke visi misi</button></div>   
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
