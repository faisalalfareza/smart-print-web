
      //JQuery No Conflict
      var $ = jQuery.noConflict(); 

      $(window).load(function() { $("#preloader").fadeOut(1000); })
      
      function randomString() {
            var chars = "@v5N#1";
            var string_length = 8;
            var randomstring = '';
            for (var i = 0; i < string_length; i++) {
                var rnum = Math.floor(Math.random() * chars.length);
                randomstring += chars.substring(rnum, rnum + 1);
            }
            document.getElementById("RegPass").value = "ngc"+randomstring;
      }          

      //Place this plugin snippet into another file in your applicationb
      (function ($) {
          $.toggleShowPassword = function (options) {
              var settings = $.extend({
                  field: "#password",
                  control: "#toggle_show_password",
              }, options);

              var control = $(settings.control);
              var field = $(settings.field)

              control.bind('click', function () {
                  if (control.is(':checked')) {
                      field.attr('type', 'text');
                  } else {
                      field.attr('type', 'password');
                  }
              })
          };
      }(jQuery));  
      
      //Here how to call above plugin from everywhere in your application document body
      $.toggleShowPassword({
          field: '#RegPass',
          control: '#showPass'
      });          
      
      $(document).ready(function () {

          //Tooltip
          $('.RegPass').tooltip({title: "Generate Password", placement: "right"});      
          
          //Carousel News
          var news = $(".slide-news");
          news.owlCarousel({
              navigation : false, // Show next and prev buttons
              slideSpeed : 300,
              paginationSpeed : 400,
              singleItem:true
          });
          news.trigger('owl.play',15000);
          
          //Carousel Header
          var owl = $("#owl-demo");
          owl.owlCarousel({
              navigation : false, // Show next and prev buttons
              slideSpeed : 300,
              paginationSpeed : 400,
              singleItem:true
          });
          owl.trigger('owl.play',5000);
          
        //var for form login   
        var formLogin = document.getElementById("formLogin");
        var logUser = document.getElementById("logUser");
        var logPass = document.getElementById("logPass");
        //var for form register   
        var formRegist = document.getElementById("formRegister");
        var RegUser = document.getElementById("RegUser");
        var RegPass = document.getElementById("RegPass");  
        var RegPassConf = document.getElementById("RegPassConf");  
        //var for form recover
        var formRecover = document.getElementById("formRecover");
        var recUser = document.getElementById("recUser");  

        //exit
        var exitLogin = document.getElementById("exit_login");
        var exitRegist = document.getElementById("exit_regist");          
        //Message Alert
        var msgLog = document.getElementById("msgLog"); 
        var msgReg = document.getElementById("msgReg"); 
        var msgNews = document.getElementById("msgNews");  
        
        //Front  
        logUser.onkeyup = function () { validateLogin() };
        logPass.onkeyup = function () { validateLogin() };
        RegUser.onkeyup = function () { validateRegister() };
        RegPass.onkeyup = function () { 
          validateRegister();
          RegPass.value.length > 8 ? $('.RegPassConf').prop('readonly', false) : $('.RegPassConf').prop('readonly', true);
        };  
        RegPassConf.onkeyup = function () { validateRegister() };    
        recUser.onkeyup = function () { validateRecovery() };

        //Exit  
        exitLogin.onclick = function () { resetForm() };
        exitRegist.onclick = function () { resetForm() };         

        function validateLogin() {
            if (logUser.value && logPass.value != "") {
                $('.finishLogin').prop('disabled', false);
                formLogin.onsubmit = function () { return true };
                msgLog.innerHTML = '<div class="alert alert-success"> Good </div>';
            }
            else {
                $('.finishLogin').prop('disabled', true);
                formLogin.onsubmit = function () { return false };
                msgLog.innerHTML = '<div class="alert alert-warning"> Fill the blank </div>';
            }
        }

        function validateRegister() {
            if (RegUser.value && RegPass.value && RegPassConf.value != "") {
                if (RegPass.value.length < 8) {
                  msgReg.innerHTML = '<div class="alert alert-danger"> Min 8 password character </div>';
                  $('.finishRegist').prop('disabled', true);
                  formRegist.onsubmit = function () { return false };
                }              
                else {
                  if (RegPass.value != RegPassConf.value) {
                      msgReg.innerHTML = '<div class="alert alert-danger"> Password not match </div>';
                      $('.finishRegist').prop('disabled', true);
                      formRegist.onsubmit = function () { return false };
                  }
                  else {
                    msgReg.innerHTML = '<div class="alert alert-success"> Match </div>';
                    $('.finishRegist').prop('disabled', false);
                    formRegist.onsubmit = function () { return true };
                  }
                }
            }
            else {
                msgReg.innerHTML = '<div class="alert alert-warning"> Fill the blank </div>';
                $('.finishRegist').prop('disabled', true);
                formRegist.onsubmit = function () { return false };
            }
        }  

        function validateRecovery() {
            if (recUser.value != "") {
                $('.finishRecobery').prop('disabled', false);
                formRecover.onsubmit = function () { return true };
            }
            else {
                $('.finishRecobery').prop('disabled', true);
                formRecover.onsubmit = function () { return false };
            }
        }                 

        function resetForm() {
            formLogin.reset();
            formRegist.reset();
            formRecover.reset();
            $(".modal").modal('hide');
            msgLog.innerHTML = null;
            msgReg.innerHTML = null;
        } 

        function openRegister() {
            $(".user_login").hide();
            $(".user_register").show();           
            $(".modal").modal('show');
            return false; 
        }            

      });
        
    $(function(){
      //Auth Title
      var authTitle = document.getElementById("auth-title");       

      // Calling Login Form
      $(".forgot_password").click(function(){
        $(".user_login").hide();
        $(".forgot").show();
        authTitle.innerHTML = 'Forgot Password'; 
        return false;
      }); 
          
      $(".register").click(function(){
        $(".user_login").hide();
        $(".user_register").show();
        authTitle.innerHTML = 'Register Account';
        return false;
      }); 
          
      $(".openLogin").click(function(){
        $(".user_register").hide();
        $(".user_login").show();   
        $(".createOption").hide();  
        $("#createArticle").modal('hide');         
        $("#login").modal('show');  
        authTitle.innerHTML = 'Sign In'; 
        return false;
      });            

      $(".openRegister").click(function(){
        $(".user_login").hide(); 
        $(".user_register").show();
        $(".createOption").hide();  
        $("#createArticle").modal('hide');           
        $("#login").modal('show');  
        authTitle.innerHTML = 'Register Account';
        return false;
      });                         

      // Going back to Login Forms
      $("#recBack").click(function(){
        $(".forgot").hide();
        $(".user_register").hide();  
        $(".user_login").show(); 
        authTitle.innerHTML = 'Sign In';             
        return false;
      });
          
      // Going back to Login Forms
      $("#regBack").click(function(){
        $(".forgot").hide();
        $(".user_register").hide();  
        $(".user_login").show(); 
        authTitle.innerHTML = 'Sign In';              
        return false;
      });      
    });       
    