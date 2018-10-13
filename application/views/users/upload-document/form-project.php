<?php $UserId = $this->session->userdata('sc_sess')['UserId']; ?>  
     
    <!--Create Project-->
    <div class="modal fade" id="createProject" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="project/create" method="post" id="formProject" class="formProject" onsubmit="return false">
                    
                <input type="hidden" name="CreatedBy" value="<?=$UserId?>">   
                    
                <!-- BEGIN Portlet PORTLET-->
                <div class="portlet portlet-bordered">
                    <div class="portlet-container startStepone">
                        <div class="portlet-title">
                            <div class="caption caption-red">
                                <img src="<?=base_img()."icon/briefcase-1.png"?>" class="icon-form">
                                <span class="caption-subject"> Team & Description </span>
                                <span class="caption-helper"> For Employee </span>
                            </div>
                        </div>
                        <div id="msgOne"></div>
                        <div class="portlet-body">
                            <div class="col-sm-6">
                                <div class="form-group">
                                   <label class="control-label" for="inputDefault">Project Name</label>
                                   <input id="ProName" type="text" name="ProName" class="form-control input-form" placeholder="Name of the project ?" autofocus>
                                </div>                                
                                
                                <div class="form-group">
                                   <label class="control-label" for="inputDefault">Team Work</label>
                                    <div class="list-group">
                                        <?php 
                                            foreach($resume as $getRsum){
                                        ?>
                                        <div class="list-add">
                                            <div class="list-group-item">
                                                <div class="checkbox pull-left">
                                                    <label>
                                                        <input type="checkbox" name="item[]" value="<?=$getRsum->RsumId?>">                                        
                                                    </label>   
                                                </div>
                                                <div class="pull-left form-control-inline">
                                                    <a href="" class="list-group-item-heading title"><?=$getRsum->RsumName?></a>
                                                    <p class="list-group-item-text sub-title">As <?=$getRsum->RsumJob?></p>			
                                                </div>  
                                                <div class="clearfix"></div>
                                            </div>
                                        </div>
                                        <?php
                                            }
                                        ?>
                                        
                                        <ul class="pagination pagination-sm mark" id="paging-add"></ul>                                       
                                    </div>
                                </div>                                
                            </div> 
                            <div class="col-sm-6">
                                <div class="form-group">
                                   <label class="control-label" for="inputDefault">Sites</label>
                                   <input id="ProSites" type="url" name="ProSites" class="form-control" placeholder="example: www.yourdomain.com" >
                                </div>                              
                                
                                <div class="form-group">
                                   <label class="control-label" for="inputDefault">Project Status</label>
                                    <select id="ProStatus" name="ProStatus" class="form-control selectpicker show-menu-arrow show-tick" title="Select status for project" data-header="Choose those that are included in this project">
                                        <option value="onprogress">On Progress</option>
                                        <option value="finish">Finished</option>
                                    </select>
                                </div>                                
                                <div class="form-group">
                                   <label class="control-label" for="inputDefault">Description</label>
                                   <textarea id="ProDesc" name="ProDesc" class="form-control" placeholder="Give a brief description about this project .."></textarea>
                                </div> 
                                <div class="action_btns">
                                   <div class="one_half"><button type="button" id="exit_one" data-dismiss="modal" class="btn">Cancel</button></div> 
                                   <div class="one_half last"><button type="submit" class="btn btn-success endProjectone" disabled>Finish</button></div>     
                                </div>
                            </div>
                            <div class="action_btns"></div>
                        </div>
                    </div>    
                </div>
                <!-- END Portlet PORTLET-->
                </form>
            </div>
        </div>
    </div>
    <!--/End Modal-->

    <!--UpdateProject-->
    <div class="modal fade" id="updateProject" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="project/updateproject" method="post" id="formUpdate" class="formUpdate">
                    <input id="uProId" type="hidden" name="ProId" value="">  
                    
                    <!-- BEGIN Portlet PORTLET-->
                    <div class="portlet portlet-bordered">
                        <div class="portlet-container startStepone">
                            <div class="portlet-title">
                                <div class="caption caption-red">
                                    <img src="<?=base_img()."icon/briefcase-1.png"?>" class="icon-form">
                                    <span class="caption-subject">Change Project Information </span>
                                    <span class="caption-helper"> For Employee </span>
                                </div>
                            </div>
                            <div class="portlet-body">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                       <label class="control-label" for="inputDefault">Project Name</label>
                                       <input id="uProName" type="text" name="ProName" class="form-control input-form" value="" placeholder="Name of the project ?" autofocus>
                                    </div>
                                    <div class="form-group">
                                       <label class="control-label" for="inputDefault">Team Work</label>
                                       <div class="alert alert-info" id="alert">Disscard team with "<i class="fa fa-check"></i>"</div>
                                        <div class="list-group">
                                        <?php 
                                        $proid =  $_COOKIE['proid'];

                                        $link = mysqli_connect('localhost', 'root', '', 'db_ngc');
                                        $query = "SELECT * from tbresume_project where ProId=".$proid;
                                        $queryjoin = "SELECT * from tbresume WHERE RsumId in (SELECT RsumId from tbresume_project where ProId=".$proid." AND AsignStatus=1)";
                                        $result = mysqli_query($link, $query); 
                                        $join = mysqli_query($link, $queryjoin);

                                        foreach($resume as $getRsum){
                                            
                                            while($row = mysqli_fetch_object($result)) { $id = $row->RsumId; 
                                            while($getJoin = mysqli_fetch_object($join)) {
                                        ?>
                                            <div class="list-update">
                                                <div class="list-group-item">
                                                    <div class="checkbox pull-left">
                                                        <label>
                                                            <input type="checkbox" name="item[]" value="<?=$id?>"> 
                                                        </label>   
                                                    </div>
                                                    <div class="pull-left form-control-inline">
                                                        <a href="" class="list-group-item-heading title"><?=$getJoin->RsumName?></a>
                                                        <p class="list-group-item-text sub-title">As <?=$getJoin->RsumJob?></p>			
                                                    </div>  
                                                    <div class="clearfix"></div>
                                                </div>
                                            </div>
                                        <?php
                                            }
                                            }
                                        }
                                        ?>

                                            <ul class="pagination pagination-sm mark" id="paging-update"></ul>                                       
                                        </div>
                                    </div>                                    
                                </div> 
                                <div class="col-sm-6">
                                    <div class="form-group">
                                       <label class="control-label" for="inputDefault">Sites</label>
                                       <input id="uProSites" type="text" name="ProSites" class="form-control input-form" value="">
                                    </div>
                                </div>
                            </div>    
                            <div class="portlet-body">
                                <div class="col-sm-6">                              
                                </div> 
                                <div class="col-sm-6">
                                    <div class="form-group prostat">
                                        <?php 
                                           $prostatus =  $_COOKIE['prostatus'];
                                        ?>
                                         <label class="control-label" for="inputDefault">Project Status</label>
                                        <select id="uProStatus" name="ProStatus" class="form-control selectpicker show-menu-arrow show-tick">
                                            <?php if($prostatus=='finish'){
                                            $selectedfinish = 'selected'; } ?>
                                            
                                            <?php if($prostatus=='onprogress'){
                                            $selectedonprog = 'selected'; } ?>
                                            <option value="finish" id='finish' <?=$selectedfinish?>>finish</option>
                                            <option value="onprogress" id="onprog" <?=$selectedonprog?> >onprogress</option>
                                            
                                        </select>
                                    </div>      
                                    <div class="form-group">
                                       <label class="control-label" for="inputDefault">Description</label>
                                       <textarea id="uProDesc" name="ProDesc" rows="4" class="form-control"></textarea>
                                    </div> 
                                    <div class="action_btns">
                                       <div class="one_half"><button type="button" id="exit_two" data-dismiss="modal" class="btn">Cancel</button></div> 
                                       <div class="one_half last"><button type="submit" class="btn btn-success endProjectone">Finish</button></div>     
                                    </div>
                                </div>
                                <div class="action_btns"></div>
                            </div>
                        </div> 
                    </div>
                    <!-- END Portlet PORTLET-->
                </form>
            </div>
        </div>
    </div>
    <!--/End Modal-->