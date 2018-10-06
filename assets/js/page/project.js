
      //JQuery No Conflict
      var $ = jQuery.noConflict(); 

      $(window).load(function() { $("#preloader").fadeOut(1000); })

      $(document).ready(function () {
          
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
          
        //var for form project  
        var formProject = document.getElementById("formProject");
        var formUpdate = document.getElementById("formUpdate");  
            //step one
            var proName = document.getElementById("ProName");
            var proSites = document.getElementById("ProSites"); 
            var proStatus = document.getElementById("ProStatus");
            var proDesc = document.getElementById("ProDesc"); 
            var uProName = document.getElementById("uProName");
            var uProSites = document.getElementById("uProSites"); 
            var uProStatus = document.getElementById("uProStatus");
            var uProDesc = document.getElementById("uProDesc");            
          
        var msgOne = document.getElementById("msgOne");
        var exit_one = document.getElementById("exit_one");
        var exit_two = document.getElementById("exit_two");  

        exit_two.onclick = function () { resetUpdate() };           
        exit_one.onclick = function () { resetProject() }; 
        
        //Action  to Function Project
            //step one
            proName.onkeyup = function () { validateProjectone() };
            proSites.onkeyup = function () { validateProjectone() };
            proStatus.onchange = function () { validateProjectone() };
            proDesc.onkeyup = function () { validateProjectone() };  
            uProName.onkeyup = function () { validateuProjectone() };
            uProSites.onkeyup = function () { validateuProjectone() };
            uProStatus.onchange = function () { validateuProjectone() };
            uProDesc.onkeyup = function () { validateuProjectone() };                       

        //Function Project
        function validateProjectone() {
            if (proName.value && proSites.value != "" && proStatus.value != "" && proDesc.value != "") {
                $('.endProjectone').prop('disabled', false);
                formProject.onsubmit = function () { return true };
                msgOne.innerHTML = '<div class="alert alert-success"> Good </div>';
            }
            else {
                $('.endProjectone').prop('disabled', true);
                formProject.onsubmit = function () { return false };
                msgOne.innerHTML = '<div class="alert alert-warning"> Fill the blank </div>';
            }
        }   

        function validateuProjectone() {
            if (uProName.value && uProSites.value != "" && uProSites.value != "" && uProDesc.value != "") {
                $('.endProjectone').prop('disabled', false);
                formProject.onsubmit = function () { return true };
            }
            else {
                $('.endProjectone').prop('disabled', true);
                formProject.onsubmit = function () { return false };
            }
        }                 
          
        function resetProject() {
            formProject.reset();
            $(".modal").modal('hide');
        } 
          
        function resetUpdate() {
            formUpdate.reset();
            $(".modal").modal('hide');
        }           

      });
        
      $(function(){
          var formProject = document.getElementById("formProject");
          /* Form Resume */ 
          $(".endProjectone").click(function(){
            formProject.submit();
            return true;
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
    