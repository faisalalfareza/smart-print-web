    <?php
        $UserId = $this->session->userdata('sc_sess')['UserId']; 
        $this->load->view('masterpages/inside/inside-header'); 
    ?>   

    <section id="projects">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <nav class="navbar navbar-info navbar-static resume">
                        <div class="col-sm-12">
                            <div class="navbar-header resume">
                                <button class="btn btn-submit navbar-toggle" type="button" data-toggle="collapse" data-target=".js-navbar-collapse">
                                    Collection Resume &nbsp; <i class="fa fa-th-large"></i>
                                </button>
                            </div>
                        </div>  
                        
                        <div class="section-title">
                            <div class="container">
                                <h2 class="title">Document(s) History</h2>
                                <p class="sub-title" style="padding-left:0">Jelajahi daftar terpilih untuk riwayat pendidikan terbaik, kemampuan &amp; pengalaman di sekitar anda, berdasarkan tren</p>
                            </div>
                        </div>

                        <div class="collapse navbar-collapse js-navbar-collapse">
                            <ul class="nav navbar-nav resume">
                                <li>
                                    <a class="menu" href="javascript:void(0)" data-backdrop="false" data-toggle="modal" data-target="#createResume">Upload New Document </a>                 
                                </li>                                        
                                <li class="dropdown dropdown-large"> 
                                    <a href="#" class="dropdown-toggle menu" data-toggle="dropdown">Filter By</a>

                                    <ul class="dropdown-menu dropdown-menu-large row">
                                        <li class="col-sm-6">
                                            <ul class="portfolio-filter resume">
                                                <li class="dropdown-header">Status Project</li>
                                                <li><a class="active" href="#" data-filter="*">All</a></li>
                                                <li><a href="#" data-filter=".finished"><i class="fa fa-check-circle done"></i> &nbsp; Finish</a></li>
                                                <li><a href="#" data-filter=".inprogress"><i class="fa fa-check-circle onprog"></i> &nbsp; On Progress</a></li>
                                                <li><a href="#" data-filter=".requested"><i class="fa fa-spinner onprog"></i> &nbsp; Requested</a></li>
                                            </ul><!--/#portfolio-filter-->
                                        </li>
                                        <li class="col-sm-6">
                                            <ul>
                                                <li class="dropdown-header">Position</li>
                                                <li><a class="asc" href="javascript:void(0);">Ascending</a></li>
                                                <li><a class="desc" href="javascript:void(0);">Descending</a></li>
                                                <li class="divider"></li> 
                                                <li class="dropdown-header">Alphabetical</li>
                                                <li><a class="alph" href="javascript:void(0);">In alphabetical order</a></li>  
                                            </ul>
                                        </li>
                                    </ul>

                                </li>
                            </ul>

                        </div><!-- /.nav-collapse -->
                    </nav> 

                    <?=$this->session->flashdata('pesan')?>                             
                    
                    <div class="portfolio-items">
                        <?php 
                            foreach($document as $getDoc) {
                        ?>                            
                        <div class="col-xs-6 col-sm-6 col-md-3 portfolio-item <?=$getDoc->Status?>">
                            <div class="portfolio-wrapper">
                                <div class="portfolio-single">
                                    <div class="portfolio-thumb">
                                        <div class="thumb-caption">
                                            <h4><?=$getDoc['DocumentName']?></h4>
                                            
                                            <?php
                                            if($getDoc->Status == 'finished') {
                                            ?>  
                                                <div class="check pull-right"><i class="fa fa-check-circle"></i></div>        
                                                
                                            <?php
                                            }
                                            else if($getDoc->Status == 'inprogress') {
                                            ?>     
                                                <div class="check onprogress pull-right"><i class="fa fa-spinner"></i></div>
                                            <?php
                                            }    
                                            else {
                                            ?>
                                                <div class="check onprogress pull-right"><i class="fa fa-spinner"></i></div>
                                            <?php
                                            }
                                            ?>

                                            <h6 class="sites name"><i class="fa fa-location fa-lg"></i> <?=$getDoc['MerchantName']?></h6>
                                                                                
                                            <ul>
                                                <?php 
                                                    $count = 0;
                                                    $countFinish = 0;
                                                    foreach($getDoc['DocumentDetail'] as $getDocDet){
                                                ?>   
                                                    <li class="ellipsis" style="margin-left: -25px;">
                                                        <?php 
                                                            $status = "";
                                                            if($getDocDet->Status == "finished") $status = "success|F";
                                                            else if($getDocDet->Status == "inprogress") $status = "warning|I";
                                                            else if($getDocDet->Status == "requested") $status = "primary|R";
                                                        ?>
                                                        <span class="label label-<?=explode('|', $status)[0]?>"><?=explode('|', $status)[1]?></span> 
                                                        <a href="<?=$getDocDet->LinkFileUrl?>"><?=$getDocDet->FileName?></a>
                                                    </li>
                                                <?php
                                                        $count++;
                                                        if($getDocDet->Status == "finished") $countFinish++;

                                                        $i = $countFinish / $count;
                                                        $finishedPresentage = ($i * 100);
                                                    }
                                                ?>
                                            </ul>
                                            
                                            <p><?=$getDoc['Note']?></p>
                                            <div class="progress">
                                                <div class="progress-bar progress-bar-success six-sec-ease-in-out" role="progressbar" data-transition="<?=$finishedPresentage?>" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div> 
                                        </div>
                                    </div>
                                    <div class="portfolio-view">   
                                        <ul class="nav nav-pills">
                                            <?php
                                            if($role->RoleId == 1) {
                                            ?>
                                            <li><a href="<?=site_url('home/project/projectDetails/'.$this->encrypt->encode($getPro->ProId))?>">
                                                <i class="fa fa-link"></i></a>
                                            </li>   
                                            
                                            <li>
                                                <a href="javascript:void(0)" class="updateProject" data-backdrop="false" data-toggle="modal" data-id="<?=$getPro->ProId?>" data-name="<?=$getPro->ProName?>" data-sites="<?=$getPro->ProSites?>"  data-desc="<?=$getPro->ProDesc?>" data-status="<?=$getPro->ProStatus?>" data-target="#updateProject" >
                                                <i class="fa fa-edit"></i></a>
                                            </li>
                                            
                                            <li><a href="<?=site_url('home/project/delete/'.$getPro->ProId)?>" class="delete">
                                                <i class="fa fa-trash-o"></i></a>
                                            </li> 
                                            <?php
                                            } else {
                                            ?>
                                            <li><a href="<?=site_url('home/project/projectDetails/'.$this->encrypt->encode($getPro->ProId))?>">
                                                <i class="fa fa-link"></i></a>
                                            </li>                
                                            <?php
                                                if($getPro->CreatedBy == $UserId){
                                            ?>
                                            <li>
                                                <a href="javascript:void(0)" class="edit updateProject" data-backdrop="false" data-toggle="modal" data-id="<?=$getPro->ProId?>" data-name="<?=$getPro->ProName?>" data-sites="<?=$getPro->ProSites?>" data-desc="<?=$getPro->ProDesc?>" data-status="<?=$getPro->ProStatus?>" data-target="#updateProject" >
                                                <i class="fa fa-edit"></i></a>
                                            </li>                                                
                                            <li><a href="<?=site_url('home/project/delete/'.$this->encrypt->encode($getPro->ProId))?>" class="delete">
                                                <i class="fa fa-trash-o"></i></a>
                                            </li>                                                             
                                            <?php
                                                }
                                            }
                                            ?>                                                
                                        </ul> 
                                    </div>
                                </div>
                                <div class="portfolio-info"></div>
                            </div>
                        </div>
                        <?php
                            }
                        ?>                              
                    </div>
                </div>    
            </div>
        </div>
    </section>
    
    <?php 
        $this->load->view('users/upload-document/form-document'); 
        $this->load->view('masterpages/inside/inside-footer');
    ?>

    <!-- Custom Javascript -->
    <script type="text/javascript" src="<?=base_js()."page/portfolio.js"?>" ></script>
    <!-- End Custom Javascript -->
        <script type="text/javascript">
            var $ = jQuery.noConflict(); 
            $.fn.pageMe = function(opts){
                var $this = this,
                    defaults = {
                        perPage: 2,
                        showPrevNext: true,
                        hidePageNumbers: false
                    },
                    settings = $.extend(defaults, opts);

                var listElement = $this;
                var perPage = settings.perPage; 
                var children = listElement.children();
                var pager = $('.mark');

                if (typeof settings.childSelector!="undefined") {
                    children = listElement.find(settings.childSelector);
                }

                if (typeof settings.pagerSelector!="undefined") {
                    pager = $(settings.pagerSelector);
                }

                var numItems = children.size();
                var numPages = Math.ceil(numItems/perPage);

                pager.data("curr",0);

                if (settings.showPrevNext){
                    $('<li><a href="#" class="prev_link"><i class="fa fa-chevron-circle-left"></i></a></li>').appendTo(pager);
                }

                var curr = 0;
                while(numPages > curr && (settings.hidePageNumbers==false)){
                    $('<li><a href="#" class="page_link">'+(curr+1)+'</a></li>').appendTo(pager);
                    curr++;
                }

                if (settings.showPrevNext){
                    $('<li><a href="#" class="next_link"><i class="fa fa-chevron-circle-right"></i></a></li>').appendTo(pager);
                }

                pager.find('.page_link:first').addClass('active');
                pager.find('.prev_link').hide();
                if (numPages<=1) {
                    pager.find('.next_link').hide();
                }
                  pager.children().eq(1).addClass("active");

                children.hide();
                children.slice(0, perPage).show();

                pager.find('li .page_link').click(function(){
                    var clickedPage = $(this).html().valueOf()-1;
                    goTo(clickedPage,perPage);
                    return false;
                });
                pager.find('li .prev_link').click(function(){
                    previous();
                    return false;
                });
                pager.find('li .next_link').click(function(){
                    next();
                    return false;
                });

                function previous(){
                    var goToPage = parseInt(pager.data("curr")) - 1;
                    goTo(goToPage);
                }

                function next(){
                    goToPage = parseInt(pager.data("curr")) + 1;
                    goTo(goToPage);
                }

                function goTo(page){
                    var startAt = page * perPage,
                        endOn = startAt + perPage;

                    children.css('display','none').slice(startAt, endOn).show();

                    if (page>=1) {
                        pager.find('.prev_link').show();
                    }
                    else {
                        pager.find('.prev_link').hide();
                    }

                    if (page<(numPages-1)) {
                        pager.find('.next_link').show();
                    }
                    else {
                        pager.find('.next_link').hide();
                    }

                    pager.data("curr",page);
                    pager.children().removeClass("active");
                    pager.children().eq(page+1).addClass("active");

                }
            };             
            
          $(document).ready(function () {    
              $(function(){
                $.material.init();
                $(".form-group select").dropdown();
                $('.modal-dialog').draggable();
                $('.popup-container').draggable();
                $('#checkAll').change(function () {
                    $("input:checkbox").prop('checked', $(this).prop("checked"));
                }); 
                $('.list-add').pageMe({pagerSelector:'#paging-add',showPrevNext:true,hidePageNumbers:false,perPage:2});
                $('.list-update').pageMe({pagerSelector:'#paging-update',showPrevNext:true,hidePageNumbers:false,perPage:2});
              });
          });           
            
          //update-project
          $(".updateProject").click(function(){
            var ProId = $(this).attr("data-id");
            $("#uProId").attr("value", ProId);
            document.cookie = "proid="+ProId;

            var ProName = $(this).attr("data-name");
            $("#uProName").attr("value", ProName);

            var ProSites = $(this).attr("data-sites");
            $("#uProSites").attr("value", ProSites); 

            var ProDesc = $(this).attr("data-desc");
            $("textarea#uProDesc").html(ProDesc);   

            var ProStatus = $(this).attr("data-status");
            document.cookie = "prostatus="+ProStatus;
            
          });                   
        </script>

</body>
</html>

