<?php
    $UserId = $this->session->userdata('sc_sess')['UserId']; 
    $this->load->view('masterpages/inside/inside-header'); 
?>  

    <section id="portfolio-information">
        <div class="container">
            <div class="row">
                <div class="col-sm-4">
                    <ul class="breadcrumb">
                      <li><a href="<?=site_url('home/resume')?>">Curriculum Vitae</a></li>
                      <li><?=$hasil->RsumName?></li>
                    </ul>
                </div>
                <div class="col-sm-8">
                    <?=$this->session->flashdata('pesan')?>
                </div>            
            </div>
            <div class="row">
                <div class="col-sm-4">
                    <div class="portfolio-wrapper">
                        <div class="portfolio-single">
                            <div class="portfolio-thumb tags">
                                <?php if ($hasil->RsumImage != null) {?>
                                <img src="<?=$hasil->RsumImage?>" class="img-responsive" alt="">
                                <?php } ?>
                                
                                <div class="thumb-caption">
                                    <h4><?=$hasil->RsumName?></h4>
                                    <h6 class="sites">As <?=$hasil->RsumJob?></h6>
                                    <p>Focus on <?=$hasil->RsumSkill1?> <?=$hasil->RsumSkill2?> <?=$hasil->RsumSkill3?> <?=$hasil->RsumSkill4?> <?=$hasil->RsumSkill5?> and i'm graduate from <?=$hasil->LastEducation1?></p>
                                                                        
                                    <hr class="divider">
                                    <h5>Member Since on <?=$hasil->CreatedOn?></h5>                     
                                    
                                    <?php 
                                     if(isset($this->session->userdata('sc_sess')['UserId'])) {
                                    ?> 
                                    <button type="button" class="btn btn-submit full" data-backdrop="false" data-toggle="modal" data-target="#updateProject"><i class="fa fa-plus-circle"></i> &nbsp; Assign to Project</button>
                                    <?php
                                     }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                </div>
                <div class="col-sm-8">
                 <div class="row">    
                 <div class="card">
                    <ul class="nav nav-tabs" role="tablist">
                        <li role="presentation" class="active"><a href="#project" aria-controls="project" role="tab" data-toggle="tab"><img src="<?=base_img()."icon/list-project.png"?>"> &nbsp; History Projects <sup><?=$rowsJoinPro?></sup></a></li>
                    </ul>

                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane active" id="project">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="portfolio-items">
                                        <?php 
                                            foreach($document as $getDoc) {
                                        ?>                            
                                            <div class="col-xs-6 col-sm-6 col-md-3 portfolio-item <?=$getDoc['AllDocumentStatus']?>">
                                                <div class="portfolio-wrapper">
                                                    <div class="portfolio-single">
                                                        <div class="portfolio-thumb">
                                                            <div class="thumb-caption">
                                                                <h4><?=$getDoc['DocumentName']?></h4>
                                                                
                                                                <?php
                                                                if($getDoc['AllDocumentStatus'] == 'finished') {
                                                                ?>  
                                                                    <div class="check pull-right"><i class="fa fa-check-circle"></i></div>        
                                                                    
                                                                <?php
                                                                }
                                                                else if($getDoc['AllDocumentStatus'] == 'inprogress') {
                                                                ?>     
                                                                    <div class="check onprogress pull-right" style="background-color:#f1c40f !important"><i class="fa fa-check-circle"></i></div>
                                                                <?php
                                                                }    
                                                                else {
                                                                ?>
                                                                    <div class="check onprogress pull-right" style="background-color:#f1c40f !important"><i class="fa fa-spinner"></i></div>
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
                                                                            if($getDocDet->Status == "finished") $countFinish += 1;
                                                                            if($getDocDet->Status == "inprogress") $countFinish += 0.5;

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
                                                                <li><a href="<?=site_url('home/document/projectDetails/'.$this->encrypt->encode($getPro->ProId))?>">
                                                                    <i class="fa fa-link"></i></a>
                                                                </li>   
                                                                
                                                                <li>
                                                                    <a href="javascript:void(0)" class="updateProject" data-backdrop="false" data-toggle="modal" data-id="<?=$getPro->ProId?>" data-name="<?=$getPro->ProName?>" data-sites="<?=$getPro->ProSites?>"  data-desc="<?=$getPro->ProDesc?>" data-status="<?=$getPro->ProStatus?>" data-target="#updateProject" >
                                                                    <i class="fa fa-edit"></i></a>
                                                                </li>
                                                                
                                                                <li><a href="<?=site_url('home/document/delete/'.$getPro->ProId)?>" class="delete">
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
                                                                <li><a href="<?=site_url('home/document/delete/'.$this->encrypt->encode($getPro->ProId))?>" class="delete">
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
                    </div>
                </div>
                </div>    
                </div>
                <!--end col8-->
            </div>
        </div>
    </section>
    <!--/#portfolio-information-->

    <!--Update Project-->
    <div class="modal fade" id="updateProject" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="<?php echo base_url()."home/resume/updateproject"?>" method="post">
                    
                <input type="hidden" name="RsumId" value="<?=$hasil->RsumId?>">   
                    
                <!-- BEGIN Portlet PORTLET-->
                <div class="portlet portlet-bordered">
                    <div class="portlet-container startStepone">
                        <div class="portlet-title">
                            <div class="caption caption-red">
                                <span class="caption-subject">Assign Project</span>
                            </div>
                        </div>
                        <div class="portlet-body"> 
                          <div class="col-lg-6">
                            <div class="centeredText ruleterms">
                              <div class="portlet-title">
                                <div class="caption caption-red">
                                    <img src="<?=base_img()."icon/briefcase-1.png"?>" class="icon-form">
                                    <span class="caption-subject" id="caption-news"></span>
                                </div>
                              </div>
                              <span>Assign this member to project. so that members can contribute in this project <a>You can choose member that competent in the execution of this project.</a></span>
                            </div>                               
                          </div>
                          <div class="col-lg-6">                                                  
                            <div class="form-group">
                                <div class="list-group">
                                    <?php 
                                    if($asignProject != null) {
                                        foreach($asignProject as $asign){
                                        $ProDesc = strip_tags($asign->ProDesc);
                                        if (strlen($ProDesc) > 90) {
                                            // truncate string
                                            $stringCut = substr($ProDesc, 0, 90);
                                            $ProDesc = substr($stringCut, 0, strrpos($stringCut, ' ')).'...'; 
                                        }
                                    ?>
                                    <div class="details-list">
                                        <div class="list-group-item">
                                            <div class="checkbox pull-left">
                                                <label>
                                                    <input type="checkbox" name="item[]" value="<?=$asign->ProId?>">                                        
                                                </label>   
                                            </div>
                                            <div class="pull-left form-control-inline">
                                                <a href="" class="list-group-item-heading title"><?=$asign->ProName?></a>
                                                <p class="list-group-item-text sub-title"><?=$ProDesc?></p>			
                                            </div>  
                                            <div class="clearfix"></div>
                                        </div>
                                    </div>
                                    <?php
                                        }
                                    }
                                    else {
                                    ?>
                                        <div class="alert alert-success"> Projects already choosen before </div>
                                    <?php
                                    }
                                    ?>

                                    <ul class="pagination pagination-sm mark" id="paging-ddetails"></ul>                                       
                                </div>
                            </div>                              
                            <div class="action_btns">
                               <div class="one_half"><button type="button" id="exit_one" data-dismiss="modal" class="btn">Cancel</button></div> 
                               <div class="one_half last"><button type="submit" class="btn btn-success endProjectone">Assign</button></div>     
                            </div>
                          </div>
                        </div>
                        <div class="action_btns"></div>
                    </div>    
                </div>
                <!-- END Portlet PORTLET-->
                </form>
            </div>
        </div>
    </div>
    <!--/End Modal-->

    <?php $this->load->view('masterpages/inside/inside-footer'); ?>

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
            $('.details-list')
                .pageMe({pagerSelector:'#paging-ddetails',showPrevNext:true,hidePageNumbers:false,perPage:2});   
          });
      });     
    </script>

    </body>
</html>
