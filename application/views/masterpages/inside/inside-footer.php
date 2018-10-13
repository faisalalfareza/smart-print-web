      <!-- Footer -->
      <footer class="main-footer">
         <div class="container">
            <div class="row">
               <div class="col-md-2">
                  <div class="widget widget_links">
                     <h5 class="widget-title">Populer Project</h5>
                     <ul>
                        <?php 
                            foreach($project as $getPro){
                        ?>   
                            <li><a href="<?=site_url('home/project/projectDetails/'.$getPro->ProId)?>"><?=$getPro->ProName?></a></li>
                        <?php 
                            }
                        ?>                            
                     </ul>
                  </div>
               </div>

               <div class="col-md-2">
                  <div class="widget widget_links">
                     <h5 class="widget-title">Related Pages</h5>
                     <ul>
                        <li><a href="<?=site_url('home/resume')?>">Curriculum Vitae</a></li>
                        <li><a href="<?=site_url('home/project')?>">Collection Project</a></li>
                        <li><a href="<?=site_url('forum')?>">Forum Discussion</a></li> 
                        <li><a href="<?=site_url('home/artikel')?>">Blogpost</a></li>
                        <li><a href="<?=site_url('home/news')?>">News</a></li>
                     </ul>
                  </div>
               </div>
                
               <div class="col-md-2">
                  <div class="widget widget_links">
                     <h5 class="widget-title">Latest News</h5>
                     <ul>
                        <?php 
                            $i = 0;
                            foreach($news as $getNews){
                        ?>   
                            <li><a href="<?=site_url('home/news/detailnews/'.$getNews->NewsId)?>"><?=$getNews->NewsTitle?></a></li>
                        <?php 
                            if (++$i == 5) break;
                            }
                        ?>                            
                     </ul> 
                  </div>
               </div> 

               <div class="col-md-2">
                  <div class="widget widget_links">
                     <h5 class="widget-title">Learning Resources</h5>
                     <ul>
                        <li><a href="https://mva.microsoft.com/">Microsoft Virtual Academy</a></li>
                        <li><a href="https://www.visualstudio.com/team-services/">Visual Studio Team Services</a></li>
                        <li><a href="https://ilearning.oracle.com/ilearn/en/learner/jsp/login.jsp?site=OracleAcad">Oracle Academy</a></li>
                        <li><a href="http://www.androidhive.info/">Androidhive</a></li>
                        <li><a href="https://asana.com/">Asana</a></li>
                     </ul>
                  </div>
               </div>

               <div class="col-md-2">
                  <div class="widget widget_links">
                     <h5 class="widget-title">Products & Services</h5>
                     <ul>
                        <li><a href="http://www.visionet.co.id/en/products-services/branch-it-managed-services/">Branch IT Managed Services</a></li>
                        <li><a href="http://www.visionet.co.id/en/products-services/merchants-it-services/">Merchant IT Services</a></li>
                        <li><a href="http://www.visionet.co.id/en/products-services/field-operation-managed-services/">Field Operation Managed Services</a></li>
                        <li><a href="http://www.visionet.co.id/en/products-services/it-managed-services/">IT Managed Services</a></li>
                        <li><a href="http://www.visionet.co.id/en/products-services/it-application-managed-services/">IT Application Managed Services</a></li>
                        <li><a href="http://www.visionet.co.id/en/contact-center/">Contact Center Services</a></li> 
                     </ul>
                  </div>
               </div>

               <div class="col-md-2">
                  <div class="widget widget_links">
                     <h5 class="widget-title">Company</h5>
                     <ul>
                        <li><a href="http://www.visionet.co.id/en/job-lists/">Careers</a></li>
                        <li><a href="http://www.visionet.co.id/en/">About Visionet</a></li>
                        <li><a href="http://www.visionet.co.id/en/alliances-clienteles/">Alliances & Clienteles</a></li> 
                     </ul>
                  </div>
               </div>                                             
                                
            </div>
         </div>
      </footer>
    
    <script type="text/javascript" src="<?=base_js()."jquery.js"?>" ></script>
    <script type="text/javascript" src="<?=base_js()."owl.carousel/owl.carousel.min.js"?>" ></script>
    <!-- <script type="text/javascript" src="<?=base_js()."bootstrap-datetimepicker.id.js"?>"></script> -->
    <script type="text/javascript" src="<?=base_js()."bootstrap-datetimepicker.min.js"?>"></script>
    <script type="text/javascript" src="<?=base_js()."bootstrap-select.min.js"?>" ></script>
    <script type="text/javascript" src="<?=base_js()."chosen.jquery.min.js"?>" ></script>
    <script type="text/javascript" src="<?=base_js()."bootstrap.min.js"?>" ></script>
    <script type="text/javascript" src="<?=base_js()."jquery.isotope.min.js"?>" ></script>
    <script type="text/javascript" src="<?=base_js()."jquery-ui.min.js"?>" ></script> 
    <script type="text/javascript" src="<?=base_js()."wow.min.js"?>" ></script>
    <script type="text/javascript" src="<?=base_js()."material.min.js"?>"></script>
    <script type="text/javascript" src="<?=base_js()."ripples.min.js"?>"></script>
    <script type="text/javascript" src="<?=base_js()."snackbar.min.js"?>"></script>  
    <script type="text/javascript" src="<?=base_js()."main.js"?>" ></script> 

    <script type="text/javascript">
      $(document).ready(function () {    
          $(function(){
            $.material.init();
            $('.modal-dialog').draggable(); 
          });    
      });            
   
    </script>