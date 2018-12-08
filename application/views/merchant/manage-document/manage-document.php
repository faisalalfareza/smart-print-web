    <?php
        $UserId = $this->session->userdata('sc_sess')['UserId']; 
        $this->load->view('masterpages/inside/inside-header'); 
    ?>   
    <style>
        #header { padding: 30px 0 0 0 !important; }
        .list-group-item-heading.title { 
            line-height: 1em !important;
            font-size: 15px !important;
            color: #343435 !important;
            font-weight: 900 !important; 
        }
    </style>  
       
    <section id="document">
        <div class="container"> 
            <div class="section-title">
                <div class="container">
                    <h2 class="title"><?=$title?></h2>
                    <p class="sub-title" style="padding-left:0">Confirmation of any project that comes in, before entering into the list of projects that will be done</p>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-3">
                    <div class="sidebar content-box left-box" style="display: block;">
                        <ul class="nav">
                            <!-- Main menu -->              
                            <li><a href="<?=site_url('home/usermanage')?>">User Manager</a></li>                          
                            <li><a href="<?=site_url('forum')?>">Forum Discussion</a></li>   
                            <li><a href="<?=site_url('home/artikel')?>">Collection Articles</a></li>                         
                            <li><a href="<?=site_url('home/news')?>">Latest News</a></li>                     
                        </ul>
                    </div>  
                </div>

                <div class="col-lg-7">
                    <?=$this->session->flashdata('pesan')?>                                               
                    
                    <div class="tab-content usermanager">
                        <div role="tabpanel" class="tab-pane active" id="requested">
                            <?=form_open('index.php/document/updateStatusDoc_group/inprogress')?>
                            <div class="list-group">
                                    <a class="list-group-item">
                                        <div class="checkbox pull-left">
                                            <label>
                                                <input type="checkbox" type="checkbox" id="allWaiting"> 		
                                            </label>   
                                        </div>
                                        <div class="pull-left form-control-inline">
                                            <h4 class="list-group-item-heading title">
                                                <span class="label label-success checkAll">Check all requested document</span>
                                            </h4>			
                                        </div>   
                                        <div class="clearfix"></div>
                                    </a>                            
                                <?php
                                    foreach($requested as $getReqDoc) {
                                ?>
                                    <!--Start User Data-->
                                    <div class="requested-list">
                                        <div class="list-group-item">
                                            <div class="row">
                                                <div class="col-sm-1">
                                                    <div class="checkbox pull-left">
                                                        <label>
                                                            <input type="checkbox" class="waiting" name="item[]" value="<?=$getReqDoc->DocumentId?>">
                                                        </label>   
                                                    </div>
                                                </div>
                                                <div class="col-sm-11">
                                                    <div class="pull-left form-control-inline">
                                                        <a href="<?=$getReqDoc->LinkFileUrl?>" class="list-group-item-heading title"><?=$getReqDoc->FileName?></a>
                                                        <p class="list-group-item-heading title"><?=$getReqDoc->DocumentName?></p>
                                                        <p class="list-group-item-text sub-title"><?=$getReqDoc->UserEmail?></p>
                                                        <p class="list-group-item-text"><?=$getReqDoc->Note?></p>
                                                    
                                                        <!--<p class="list-group-item-text sub-title">accept</p>	-->		
                                                    </div>
                                                    <div class="pull-right">
                                                        <span onclick="window.location='<?=site_url('index.php/document/updateStatusDoc/'.$getReqDoc->DocumentId.'/inprogress')?>';" class="label label-success">Accept</span>                                
                                                        <span onclick="window.location='<?=site_url('index.php/document/setAsRejectedDoc/'.$getReqDoc->DocumentId)?>';" class="label label-danger">Reject</span>    
                                                    </div>  
                                                </div>
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>
                                    </div>
                                    <!--End User Data-->
                                <?php
                                    }
                                ?>  
                                <ul class="pagination pagination-sm mark" id="paging-requested"></ul>                         
                            </div>
                            
                            <?php if(count($requested) > 0) { ?>
                                <button type="submit" class="btn"><i class="fa fa-check-circle-o"></i> &nbsp; Mark as processed document</button>
                            <?php } ?>

                            <?=form_close()?>                         
                        </div>
                        <div role="tabpanel" class="tab-pane" id="processed">
                            <?=form_open('index.php/document/updateStatusDoc_group/finished')?>
                            <div class="list-group">
                                    <a class="list-group-item">
                                        <div class="checkbox pull-left">
                                            <label>
                                                <input type="checkbox" type="checkbox" id="allWaiting"> 		
                                            </label>   
                                        </div>
                                        <div class="pull-left form-control-inline">
                                            <h4 class="list-group-item-heading title">
                                                <span class="label label-success checkAll">Check all processed document</span>
                                            </h4>			
                                        </div>   
                                        <div class="clearfix"></div>
                                    </a>                            
                                <?php
                                    foreach($processed as $getProcDoc) {
                                ?>
                                    <!--Start User Data-->
                                    <div class="processed-list">
                                        <div class="list-group-item">
                                            <div class="row">
                                                <div class="col-sm-1">
                                                    <div class="checkbox pull-left">
                                                        <label>
                                                            <input type="checkbox" class="waiting" name="item[]" value="<?=$getProcDoc->DocumentId?>">
                                                        </label>   
                                                    </div>
                                                </div>
                                                <div class="col-sm-11">
                                                    <div class="pull-left form-control-inline">
                                                        <a href="<?=$getProcDoc->LinkFileUrl?>" class="list-group-item-heading title"><?=$getProcDoc->FileName?></a>
                                                        <p class="list-group-item-heading title"><?=$getProcDoc->DocumentName?></p>
                                                        <p class="list-group-item-text sub-title"><?=$getProcDoc->UserEmail?></p>
                                                        <p class="list-group-item-text"><?=$getProcDoc->Note?></p>
                                                    
                                                        <!--<p class="list-group-item-text sub-title">accept</p>	-->		
                                                    </div>
                                                    <div class="pull-right">
                                                        <span onclick="window.location='<?=site_url('index.php/document/updateStatusDoc/'.$getProcDoc->DocumentId.'/finished')?>';" class="label label-success">Finish</span>                                
                                                        <span onclick="window.location='<?=site_url('index.php/document/updateStatusDoc/'.$getProcDoc->DocumentId.'/requested')?>';" class="label label-warning">Rollback</span>    
                                                    </div>  
                                                </div>
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>
                                    </div>
                                    <!--End User Data-->
                                <?php
                                    }
                                ?>  
                                <ul class="pagination pagination-sm mark" id="paging-processed"></ul>                         
                            </div>
                            <button type="submit" class="btn"><i class="fa fa-check-circle-o"></i> &nbsp; Mark as finished document</button>
                            <?=form_close()?>                         
                        </div>
                        <div role="tabpanel" class="tab-pane" id="finished">
                            <?=form_open('home/projectmanage/activate_group')?>
                            <div class="list-group">
                                    <a class="list-group-item">
                                        <div class="checkbox pull-left">
                                            <label>
                                                <input type="checkbox" type="checkbox" id="allWaiting"> 		
                                            </label>   
                                        </div>
                                        <div class="pull-left form-control-inline">
                                            <h4 class="list-group-item-heading title">
                                                <span class="label label-success checkAll">Check all finished document</span>
                                            </h4>			
                                        </div>   
                                        <div class="clearfix"></div>
                                    </a>                            
                                <?php
                                    foreach($finished as $getFinDoc) {
                                ?>
                                    <!--Start User Data-->
                                    <div class="finished-list">
                                        <div class="list-group-item">
                                            <div class="row">
                                                <div class="col-sm-1">
                                                    <div class="checkbox pull-left">
                                                        <label>
                                                            <input type="checkbox" class="waiting" name="item[]" value="<?=$getFinDoc->DocumentId?>">
                                                        </label>   
                                                    </div>
                                                </div>
                                                <div class="col-sm-11">
                                                    <div class="pull-left form-control-inline">
                                                        <a href="<?=$getFinDoc->LinkFileUrl?>" class="list-group-item-heading title"><?=$getFinDoc->FileName?></a>
                                                        <p class="list-group-item-heading title"><?=$getFinDoc->DocumentName?></p>
                                                        <p class="list-group-item-text sub-title"><?=$getFinDoc->UserEmail?></p>
                                                        <p class="list-group-item-text"><?=$getFinDoc->Note?></p>
                                                    
                                                        <!--<p class="list-group-item-text sub-title">accept</p>	-->		
                                                    </div>
                                                    <div class="pull-right">
                                                        <span onclick="window.location='<?=site_url('index.php/document/updateStatusDoc/'.$getFinDoc->DocumentId.'/inprogress')?>';" class="label label-warning">Rollback</span>    
                                                    </div>  
                                                </div>
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>
                                    </div>
                                    <!--End User Data-->
                                <?php
                                    }
                                ?>  
                                <ul class="pagination pagination-sm mark" id="paging-finished"></ul>                         
                            </div>
                            <?=form_close()?>                         
                        </div>
                    </div>                                             
                </div>

                <div class="col-lg-2">
                    <div class="sidebar content-box left-box" style="display: block;">
                        <ul class="nav">
                            <!-- Main menu -->              
                            <li><a href="#requested" aria-controls="requested" role="tab" data-toggle="tab">Requested Document</a></li>
                            <li><a href="#processed" aria-controls="processed" role="tab" data-toggle="tab">Processed Document</a></li>                       
                            <li><a href="#finished" aria-controls="finished" role="tab" data-toggle="tab">Finished Document</a></li>                       
                        </ul>
                    </div>                     
                </div>
            </div>
        </div>
    </section>           
    
    <?php 
        $this->load->view('masterpages/inside/inside-footer');
    ?>

    <!-- Custom Javascript -->
    <script type="text/javascript" src="<?=base_js()."page/home.js"?>" ></script>
    <!-- End Custom Javascript -->       

    <script type="text/javascript">
        $(document).ready(function () {    
            $(function() {
                $.material.init();
                $('.modal-dialog').draggable();
                $('.popup-container').draggable();
                $('#allWaiting').change(function () {
                    $("input:checkbox.waiting").prop('checked', $(this).prop("checked"));
                });
                $('#allAccepted').change(function () {
                    $("input:checkbox.accepted").prop('checked', $(this).prop("checked"));
                });     
                $('.requested-list')
                    .pageMe({pagerSelector:'#paging-requested',showPrevNext:true,hidePageNumbers:false,perPage:3});
                $('.processed-list')
                    .pageMe({pagerSelector:'#paging-processed',showPrevNext:true,hidePageNumbers:false,perPage:3});                            
            });
            $('.finished-list')
                .pageMe({pagerSelector:'#paging-finished',showPrevNext:true,hidePageNumbers:false,perPage:3});                            
        });
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
        });
             
    </script>       
   </body>
</html>
