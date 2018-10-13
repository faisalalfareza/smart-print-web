<?php
    $UserId = $this->session->userdata('sc_sess')['UserId']; 
    $this->load->view('general/intern/head'); 
?>  

    <section id="portfolio-information">
        <div class="container">
            <div class="row">
                <div class="col-sm-4">
                    <ul class="breadcrumb">
                      <li><a href="<?=site_url('home/project')?>">Collection Project</a></li>
                      <li><?=$hasil->ProName?></li>
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
                            <div class="portfolio-thumb">
                                <div class="thumb-caption">
                                    <h4><?=$hasil->ProName?></h4>
                                    <h6 class="sites"><?=$hasil->ProSites?></h6>
                                    <p><?=$hasil->ProDesc?></p>
                                    
                                    <hr class="divider">
                                    <h5>Team Work</h5> 
                                    <p>
                                        <?php foreach($getJoinRsum as $getJoin) { ?>
                                        <a href="<?=site_url('home/resume/cvDetails/'.$this->encrypt->encode($getJoin->RsumId))?>"><?=$getJoin->RsumName?></a> .
                                        <?php } ?>
                                    </p>
                                                                        
                                    <hr class="divider">
                                    <h5>Project Since on <?=$hasil->CreatedOn?></h5>                                  
                                    <?php 
                                     if(isset($this->session->userdata('sc_sess')['UserId'])) {   
                                    ?>         
                                    <button type="button" class="btn btn-submit full" data-backdrop="false" data-toggle="modal" data-target="#updateTeam"><i class="fa fa-plus-circle"></i> &nbsp; Assign to Member</button>
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
                        <li role="presentation"><a href="#team" aria-controls="team" role="tab" data-toggle="tab"><img src="<?=base_img()."icon/list-project.png"?>"> &nbsp; Team Work <sup><?=$rowsJoinRsum?></sup></a></li>

                        <?php 
                        if($hasil->CreatedBy == $UserId) {
                            if($rowsJoinRsumConf != null) { 
                        ?>
                        <li role="presentation"><a href="#confirm" aria-controls="confirm" role="tab" data-toggle="tab"><img src="<?=base_img()."icon/round-clock.png"?>"> &nbsp; Confirmation <sup><?=$rowsJoinRsumConf?></sup></a></li>
                        <?php 
                            }
                        } 
                        ?>

                    </ul>

                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane active" id="team">
                            <div class="row">
                            <div class="col-sm-12">
                            <div class="portfolio-items">
                            <?php 
                                foreach($getJoinRsum as $getJoin){
                            ?>
                                <div class="col-xs-6 col-sm-6 col-md-4 portfolio-item">
                                    <div class="portfolio-wrapper">
                                        <div class="portfolio-single">
                                            <div class="portfolio-thumb">
                                                <div class="thumb-caption">
                                                    <h4 class="name"><?=$getJoin->RsumName?></h4>
                                                    <div class="check pull-right"><i class="fa fa-check-circle"></i></div>                                                
                                                    <h6 class="sites">As <?=$getJoin->RsumJob?></h6>
                                                    <p>Focus on <?=$getJoin->RsumSkill1?> <?=$getJoin->RsumSkill2?> <?=$getJoin->RsumSkill3?> <?=$getJoin->RsumSkill4?> <?=$getJoin->RsumSkill5?> and i'm graduate from <?=$getJoin->LastEducation1?></p>
                                                    <div class="progress">
                                                        <div class="progress-bar progress-bar-success six-sec-ease-in-out" role="progressbar"  data-transition="<?=$getJoin->SkillPercent?>" aria-valuemin="0" aria-valuemax="100"></div>
                                                    </div> 
                                                </div>
                                            </div>
                                            <div class="portfolio-view">
                                                <ul class="nav nav-pills">
                                                    <li><a href="<?=site_url('home/resume/cvDetails/'.$this->encrypt->encode($getJoin->RsumId))?>">
                                                        <i class="fa fa-link"></i></a>
                                                    </li>                                                           
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="portfolio-info "></div>
                                    </div>
                                </div> 
                            <?php 
                                }
                            ?>                                  
                            </div> 
                            </div>   
                            </div>
                        </div>

                        <div role="tabpanel" class="tab-pane" id="confirm">
                        <?=form_open('home/project/confirm_group')?>
                            <div class="row">
                            <div class="col-sm-12">
                            <label>
                                <input type="checkbox" type="checkbox" id="confirmAll">  
                                <span class="label label-success confirmAll">Confirm all members</span>
                            </label> 
                            <div class="portfolio-items">
                            <?php 
                                foreach($getJoinRsumConf as $getJoinConf) {
                            ?>
                                <div class="col-xs-6 col-sm-6 col-md-4 portfolio-item">
                                <input type="hidden" name="ProId" value="<?=$hasil->ProId?>">
                                <input type="checkbox" class="confirm" name="members[]" value="<?=$getJoinConf->RsumId?>">
                                    <div class="portfolio-wrapper">
                                        <div class="portfolio-single">
                                            <div class="portfolio-thumb">
                                                <div class="thumb-caption">
                                                    <h4 class="name"><?=$getJoinConf->RsumName?></h4>
                                                    <div class="check pull-right"><i class="fa fa-check-circle"></i></div>                                                
                                                    <h6 class="sites">As <?=$getJoinConf->RsumJob?></h6>
                                                    <p>Focus on <?=$getJoinConf->RsumSkill1?> <?=$getJoinConf->RsumSkill2?> <?=$getJoinConf->RsumSkill3?> <?=$getJoinConf->RsumSkill4?> <?=$getJoinConf->RsumSkill5?> and i'm graduate from <?=$getJoinConf->LastEducation1?></p>
                                                    <div class="progress">
                                                        <div class="progress-bar progress-bar-success six-sec-ease-in-out" role="progressbar"  data-transition="<?=$getJoinConf->SkillPercent?>" aria-valuemin="0" aria-valuemax="100"></div>
                                                    </div> 
                                                </div>
                                            </div>
                                            <div class="portfolio-view">
                                                <ul class="nav nav-pills">
                                                    <li><a href="<?=site_url('home/resume/cvDetails/'.$this->encrypt->encode($getJoinConf->RsumId))?>">
                                                        <i class="fa fa-link"></i></a>
                                                    </li>                                         
                                                    <li><a href="<?=site_url('home/project/confirm/'.$this->encrypt->encode($getJoinConf->RsumId).'/'.$this->encrypt->encode($hasil->ProId))?>" class="confirm">
                                                    <i class="fa fa-check-circle"></i></a>
                                                    </li>                
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="portfolio-info "></div>
                                    </div>
                                </div> 
                            <?php 
                                }
                            ?>                                  
                            </div> 
                            </div>   
                            </div> 
                        <button type="submit" class="btn"><i class="fa fa-check-circle-o"></i> &nbsp; Confirm Members</button>    
                        <?=form_close()?>                        
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

    <!--Update Team-->
    <div class="modal fade" id="updateTeam" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="<?php echo base_url()."home/project/updateteam"?>" method="post">
                    
                <input type="hidden" name="ProId" value="<?=$hasil->ProId?>">   
                    
                <!-- BEGIN Portlet PORTLET-->
                <div class="portlet portlet-bordered">
                    <div class="portlet-container startStepone">
                        <div class="portlet-title">
                            <div class="caption caption-red">
                                <span class="caption-subject"> Assign Member </span>
                            </div>
                        </div>
                        <div class="portlet-body">  
                          <div class="col-lg-6">
                            <div class="centeredText ruleterms">
                              <div class="portlet-title">
                                <div class="caption caption-red">
                                    <img src="<?=base_img()."icon/id-card.png"?>" class="icon-form">
                                    <span class="caption-subject" id="caption-news"></span>
                                </div>
                              </div>
                              <span>Assign this project to member. so that members can contribute in this project <a>You can choose member that competent in the execution of this project.</a></span>
                            </div>                               
                          </div>
                          <div class="col-lg-6">
                            <div class="form-group">
                                <div class="list-group">
                                    <?php 
                                    if($asignMember != null) {                                  
                                        foreach($asignMember as $asign){
                                    ?>
                                    <div class="group-list">
                                        <div class="list-group-item">
                                            <div class="checkbox pull-left">
                                                <label>
                                                    <input type="checkbox" name="item[]" value="<?=$asign->RsumId?>">                                        
                                                </label>   
                                            </div>
                                            <div class="pull-left form-control-inline">
                                                <a href="" class="list-group-item-heading title"><?=$asign->RsumName?></a>
                                                <p class="list-group-item-text sub-title">As <?=$asign->RsumJob?></p>       
                                            </div>  
                                            <div class="clearfix"></div>
                                        </div>
                                    </div>
                                    <?php
                                        }
                                    } 
                                    else {
                                    ?>
                                        <div class="alert alert-success"> Users resume already choosen before </div>
                                    <?php
                                    }
                                    ?>

                                    <ul class="pagination pagination-sm mark" id="paging"></ul>                                       
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

    <?php $this->load->view('form/fproject'); ?>
    <?php $this->load->view('general/intern/foot'); ?>

    <!-- Custom Javascript -->
    <script type="text/javascript" src="<?=base_js()."page/project.js"?>" ></script>
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
                $('#confirmAll').change(function () {
                    $("input:checkbox.confirm").prop('checked', $(this).prop("checked"));
                });
                $('.group-list') .pageMe({pagerSelector:'#paging',showPrevNext:true,hidePageNumbers:false,perPage:2});   
              });
          });
        </script>

</body>
</html>