
      //JQuery No Conflict
      var $ = jQuery.noConflict(); 

      $(window).load(function() { $("#preloader").fadeOut(1000); })

      $(document).ready(function () {
        resetUpdate();
        var skill = 1; var edc = 1; var acv = 1; 
          
        $("#tambah").click(function(){
            skill++;
            if(skill>5){
                alert("Maksimal 5 input.");
                return false;
            }
            var div = $(document.createElement('div'))
                      .attr("class", 'form-group');
            div.after()
               .html('<input class="form-control input-form" type="text" id="rsmSkill'+skill+'" name="RsumSkill'+skill+'" placeholder="Another ability that you have ?" />');
            div.appendTo("#group");
        });
        $("#addEducation").click(function(){
            edc++;
            if(edc>3){
                alert("Maksimal 3 input.");
                return false;
            }
            var div = $(document.createElement('div'))
                      .attr("class", 'form-group');
            div.after()
               .html('<input class="form-control input-form" type="text" id="rsmEducation'+edc+'" name="LastEducation'+edc+'" placeholder="Another education history ?" />');
            div.appendTo("#education-group");
        });
        $("#addAchieve").click(function(){
            acv++;
            if(acv>3){
                alert("Maksimal 3 input.");
                return false;
            }
            var div = $(document.createElement('div'))
                      .attr("class", 'form-group');
            div.after()
               .html('<input class="form-control input-form" type="text" id="rsmAchieve'+acv+'" name="Achieve'+acv+'" placeholder="Award what you have achieved ?" />');
            div.appendTo("#achievment-group");
        });  
          
        var items = $('.portfolio-items');           
          
        items.isotope({
          sortBy: 'number',
          sortAscending: true
        });  
          
        //Datetimepicker of Date of Birth
        $('.date').datetimepicker({
            language: 'fr',
            weekStart: 1,
            todayBtn: 1,
            autoclose: 1,
            todayHighlight: 1,
            startView: 2,
            minView: 2,
            forceParse: 0
        });  
        
          
        //var for form resume
        var formResume = document.getElementById("formResume");
        //step one
        var rsmName = document.getElementById("rsmName");
        var rsmGender = document.getElementById("rsmGender");
        var rsmReligion = document.getElementById("rsmReligion");
        //step two
        var rsmEmail = document.getElementById("rsmEmail");
        var rsmTelp = document.getElementById("rsmTelp");
        //step three
        var rsmSkill1 = document.getElementById("rsmSkill1");
        var rsmPrcent = document.getElementById("rsmPrcent");
        var rsmJob = document.getElementById("rsmJob");
        //step four
        var rsmEducation1 = document.getElementById("rsmEducation1");
        var rsmAchieve1 = document.getElementById("rsmAchieve1");
        //step five
        var msgOne = document.getElementById("msgOne");
        var msgTwo = document.getElementById("msgTwo");
        var msgThree = document.getElementById("msgThree");
        var msgFour = document.getElementById("msgFour");  
      
        //exit 
        var exitProfile = document.getElementById("exit_profile");
        var exitContact = document.getElementById("exit_contact");
        var exitJob = document.getElementById("exit_job");
        var exitEducation = document.getElementById("exit_education");
        var exitProject = document.getElementById("exit_project");  
        exitProfile.onclick = function () { resetResume() };
        exitContact.onclick = function () { resetResume() };
        exitJob.onclick = function () { resetResume() };
        exitEducation.onclick = function () { resetResume() };
        exitProject.onclick = function () { resetResume() };

        var uexitProfile = document.getElementById("uexit_profile");
        var uexitContact = document.getElementById("uexit_contact");
        var uexitJob = document.getElementById("uexit_job");
        var uexitEducation = document.getElementById("uexit_education");
        var uexitProject = document.getElementById("uexit_project");        
        uexitProfile.onclick = function () { resetUpdate() };
        uexitContact.onclick = function () { resetUpdate() };
        uexitJob.onclick = function () { resetUpdate() };
        uexitEducation.onclick = function () { resetUpdate() };
        uexitProject.onclick = function () { resetUpdate() };
    
    
        //Action  to Function
        //step one
        rsmName.onkeyup = function () { validateStepone() };
        rsmGender.onchange = function () { validateStepone() };
        rsmReligion.onchange = function () { validateStepone() };
        //step two
        rsmEmail.onkeyup = function () { validateSteptwo() };
        rsmTelp.onkeyup = function () { 
            validateSteptwo(); 
            this.value = this.value.replace(/[^0-9.]/g,'');
        };
        //step three
        rsmSkill1.onkeyup = function () { validateStepthree() };
        rsmPrcent.onkeyup = function () { this.value = this.value.replace(/[^0-9.]/g,''); };
        rsmJob.onkeyup = function () { validateStepthree() };
        //step four
        rsmEducation1.onkeyup = function () { validateStepfour() };
        
        //Function
        function validateStepone() {
            if (rsmName.value && rsmGender.value && rsmReligion.value != "") {
                $('.endStepone').prop('disabled', false);
                formResume.onsubmit = function () { return true };
                msgOne.innerHTML = '<div class="alert alert-success"> Good </div>';
            }
            else {
                $('.endStepone').prop('disabled', true);
                formResume.onsubmit = function () { return false };
                msgOne.innerHTML = '<div class="alert alert-warning"> Fill the blank </div>';
            }
        } 
        function validateSteptwo() {
            if (rsmEmail.value && rsmTelp.value != "") {
                if(rsmEmail.value.indexOf('@') != "-1"){
                    if(rsmEmail.value.indexOf('.') != "-1"){
                        $('.endSteptwo').prop('disabled', false);
                        formResume.onsubmit = function () { return true };
                        msgTwo.innerHTML = '<div class="alert alert-success"> Good </div>';
                    }
                    else{
                        $('.endStepone').prop('disabled', true);
                        formResume.onsubmit = function () { return false };
                        msgTwo.innerHTML = '<div class="alert alert-warning"> Fill the blank </div>';
                    }
                }
                else{
                    $('.endStepone').prop('disabled', true);
                    formResume.onsubmit = function () { return false };
                    msgTwo.innerHTML = '<div class="alert alert-danger"> Email must contain "@" </div>';
                }
            }
            else {
                $('.endStepone').prop('disabled', true);
                formResume.onsubmit = function () { return false };
                msgTwo.innerHTML = '<div class="alert alert-warning"> Fill the blank </div>';
            }
        } 
        function validateStepthree() {
            if (rsmSkill1.value && rsmJob.value != "") {
                $('.endStepthree').prop('disabled', false);
                formResume.onsubmit = function () { return true };
                msgThree.innerHTML = '<div class="alert alert-success"> Good </div>';
            }
            else {
                $('.endStepthree').prop('disabled', true);
                formResume.onsubmit = function () { return false };
                msgThree.innerHTML = '<div class="alert alert-warning"> Fill the blank </div>';
            }
        } 
        function validateStepfour() {
            if (rsmEducation1.value != "") {
                $('.endStepfour').prop('disabled', false);
                formResume.onsubmit = function () { return true };
                msgFour.innerHTML = '<div class="alert alert-success"> Good </div>';
            }
            else {
                $('.endStepfour').prop('disabled', true);
                formResume.onsubmit = function () { return false };
                msgFour.innerHTML = '<div class="alert alert-warning"> Fill the blank </div>';
            }
        }  
        
        function resetResume() {
            formResume.reset();
            $(".portlet-container.startStepfive").hide();
            $(".portlet-container.startStepfour").hide();
            $(".portlet-container.startStepthree").hide();
            $(".portlet-container.startSteptwo").hide();
            $(".portlet-container.startStepone").show();
            $(".modal").modal('hide');
            msgOne.innerHTML = null;
            msgTwo.innerHTML = null;
            msgThree.innerHTML = null;
            msgFour.innerHTML = null;
            msgFive.innerHTML = null;
        } 

        function resetUpdate() {
            formUpdateResume.reset();
            $(".portlet-container.ustartStepfive").hide();
            $(".portlet-container.ustartStepfour").hide();
            $(".portlet-container.ustartStepthree").hide();
            $(".portlet-container.ustartSteptwo").hide();
            $(".portlet-container.ustartStepone").show();
            $(".modal").modal('hide');
            umsgOne.innerHTML = null;
            umsgTwo.innerHTML = null;
            umsgThree.innerHTML = null;
            umsgFour.innerHTML = null;
            umsgFive.innerHTML = null;
        }     

        function resetOption() {
            formArticle.reset();
            formNews.reset();
            $(".formArticle").hide();
            $(".formNews").hide();
            $(".createOption").show();
            $(".modal").modal('hide');
        }            

      });
        
      $(function(){
          /* Form Post */
          $(".openOption").click(function(){
            $(".user_login").hide(); 
            $(".user_register").hide();
            $(".createOption").show();             
            $("#login").modal('hide');
            $("#createArticle").modal('show');          
            return false;
          }); 
          //Entry another form
          $(".articleOpt").click(function(){
            $(".createOption").hide();
            $(".formArticle").show();
            return false;
          });  
          $(".newsOpt").click(function(){
            $(".createOption").hide();
            $(".formNews").show();
            return false;
          });           
          $(".artclType").click(function(){
            $(".portlet-body.add").hide();
            $(".portlet-body.type").show();
            return false;
          });  
          $(".artclAdd").click(function(){
            $(".portlet-body.add").show();
            $(".portlet-body.type").hide();
            return false;
          });             
          // Going back to Create Option 
          $("#artclBack").click(function(){
            $(".formArticle").hide(); 
            $(".createOption").show();              
            return false;
          });   
          $("#nwsBack").click(function(){
            $(".formNews").hide();  
            $(".createOption").show();              
            return false;
          });          
          
          /* Form Resume */ 
          $(".endStepone").click(function(){
            $(".portlet-container.startStepone").hide();
            $(".portlet-container.startSteptwo").show();
            return false;
          });  
          $(".endSteptwo").click(function(){
            $(".portlet-container.startSteptwo").hide();
            $(".portlet-container.startStepthree").show();  
            return false;
          });  
          $(".endStepthree").click(function(){
            $(".portlet-container.startStepthree").hide();
            $(".portlet-container.startStepfour").show();  
            return false;
          });  
          $(".endStepfour").click(function(){
            $(".portlet-container.startStepfour").hide();
            $(".portlet-container.startStepfive").show();  
            return false;
          });            
          $("#exit_two").click(function(){
            $(".portlet-container.startSteptwo").hide();
            $(".portlet-container.startStepthree").hide();  
            $('.endStepone').prop('disabled', false);  
            $(".portlet-container.startStepone").show();              
            return false;
          }); 
          $("#exit_three").click(function(){
            $(".portlet-container.startStepthree").hide();
            $('.endSteptwo').prop('disabled', false);            
            $(".portlet-container.startSteptwo").show();              
            return false;
          }); 
          $("#exit_four").click(function(){
            $(".portlet-container.startStepfour").hide();
            $('.endStepthree').prop('disabled', false);            
            $(".portlet-container.startStepthree").show();              
            return false;
          });   
          $("#exit_five").click(function(){
            $(".portlet-container.startStepfive").hide();
            $('.endStepfour').prop('disabled', false);            
            $(".portlet-container.startStepfour").show();              
            return false;
          });    

            /* Form Update Resume */ 
          $(".uendStepone").click(function(){
            $(".portlet-container.ustartStepone").hide();
            $(".portlet-container.ustartSteptwo").show();
            return false;
          });  
          $(".uendSteptwo").click(function(){
            $(".portlet-container.ustartSteptwo").hide();
            $(".portlet-container.ustartStepthree").show();  
            return false;
          });  
          $(".uendStepthree").click(function(){
            $(".portlet-container.ustartStepthree").hide();
            $(".portlet-container.ustartStepfour").show();  
            return false;
          });  
          $(".uendStepfour").click(function(){
            $(".portlet-container.ustartStepfour").hide();
            $(".portlet-container.ustartStepfive").show();  
            return false;
          });            
          $("#uexit_two").click(function(){
            $(".portlet-container.ustartSteptwo").hide();
            $(".portlet-container.ustartStepthree").hide();  
            $('.uendStepone').prop('disabled', false);  
            $(".portlet-container.ustartStepone").show();              
            return false;
          }); 
          $("#uexit_three").click(function(){
            $(".portlet-container.ustartStepthree").hide();
            $('.uendSteptwo').prop('disabled', false);            
            $(".portlet-container.ustartSteptwo").show();              
            return false;
          }); 
          $("#uexit_four").click(function(){
            $(".portlet-container.ustartStepfour").hide();
            $('.uendStepthree').prop('disabled', false);            
            $(".portlet-container.ustartStepthree").show();              
            return false;
          });   
          $("#uexit_five").click(function(){
            $(".portlet-container.ustartStepfive").hide();
            $('.uendStepfour').prop('disabled', false);            
            $(".portlet-container.ustartStepfour").show();              
            return false;
          });            
          
          /* Dragable */
          $("#createResume").draggable({
            handle: ".modal-header"
          });
          
          /* Filter Ascending - Descending */
          $(".asc").click(function(){  
            $('.portfolio-items').isotope({
              sortBy: 'number',
              sortAscending: true
            });                
          });

          $(".desc").click(function(){  
            $('.portfolio-items').isotope({
              sortBy: 'number',
              sortAscending: false
            });                
          }); 
          
          $(".alph").click(function(){  
            $('.portfolio-items').isotope({
              sortAscending: {
                name: true
              }
            });                
          });           
    });       
    