
      //JQuery No Conflict
      var $ = jQuery.noConflict(); 

      $(window).load(function() { $("#preloader").fadeOut(1000); })         
      $(document).ready(function () {      
          
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

        //var for form news 
        var formNews = document.getElementById("formNews");
        var newsTitle = document.getElementById("nwsTitle"); 
        var newsContent = document.getElementById("nwsContent");
        var readContent = document.getElementById("readContent");
        //var for form u-news
        var uFormNews = document.getElementById("uFormNews");
        var uNewsTitle = document.getElementById("uNewsTitle"); 
        var uNewsContent = document.getElementById("uNewsContent");  
         
        //Message Alert
        var msgNews = document.getElementById("msgNews");         

        //News  
        newsTitle.onkeyup = function () { validateNews() };
        //uNewsTitle.onkeyup = function () { validateUpdateNews() };
        $("#nwsContent").bind('paste', function (e) {
            validateNews();
            return true;
        });      
        tinyMCE.init({
          selector: '#nwsContent',
          setup: function(editor) {
              editor.on('keyup', function(e) {
                  // Revalidate the hobbies field
                  validateNews();
              });
          }
        });
        tinyMCE.init({
          selector: '#uNewsContent',
          setup: function(editor) {
              editor.on('keyup', function(e) {
                  // Revalidate the hobbies field
                  validateUpdateNews();
              });
          }          
        });                     

        function validateNews() {
            var content = tinyMCE.get('nwsContent').getContent({format: 'text'});
            if (newsTitle.value && content != "") {
                $('.finishNews').prop('disabled', false);
                formNews.onsubmit = function () { return true };                                         
                //readContent.value = content;
                //document.getElementById("lengthContent").innerHTML = readContent.value.length;
            }        
            else {
                $('.finishNews').prop('disabled', true);
                formNews.onsubmit = function () { return false };
                msgNews.innerHTML = '<div class="alert alert-warning"> Fill the blank </div>';   
            }                                 
        }      

        function validateUpdateNews() {
            var content = tinyMCE.get('uNewsContent').getContent({format: 'text'});
            if (uNewsTitle.value && content != "") {
                $('.uFinishNews').prop('disabled', false);
                uFormNews.onsubmit = function () { return true };                                         
            }        
            else {
                $('.uFinishNews').prop('disabled', true);
                uFormNews.onsubmit = function () { return false }; 
            }                                 
        }                   

      });
        
      $(function(){
      //Auth Title
      var captNews = document.getElementById("caption-news");                   
          
      $(".openNews").click(function(){
        $(".user_login").hide(); 
        $(".user_register").hide();
        $(".portlet.article").hide();            
        $("#login").modal('hide');
        $("#createNews").modal('show');
        $(".formNews").show(); 
        captNews.innerHTML = 'News Description';         
        return false;
      });            
    
    });       
    