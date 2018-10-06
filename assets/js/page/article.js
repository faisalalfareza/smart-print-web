
      //JQuery No Conflict
      var $ = jQuery.noConflict(); 

      $(window).load(function() { $("#preloader").fadeOut(1000); })         
      $(document).ready(function () {

          //Tooltips
          $('.artclAdd').tooltip({title: "Description", placement: "right"});
          $('.artclType').tooltip({title: "Category", placement: "right"});
          $('.artclImg').tooltip({title: "Image", placement: "right"});         
          
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
          
        //var for form article
        var formArticle = document.getElementById("formArticle");
        var artclTitle = document.getElementById("artTitle"); 
        var artclContent = document.getElementById("artContent");
        var artclType = document.getElementById("artType"); 
        //var for form u-article
        var uFormArticle = document.getElementById("uFormArticle");
        var uArtclTitle = document.getElementById("uArtclTitle"); 
        var uArtclContent = document.getElementById("uArtclContent");           
        //Message Alert
        var msgArtcl = document.getElementById("msgArtcl");  

        //Article  
        artclTitle.onkeyup = function () { validateArticle() };
        //uArtclTitle.onkeyup = function () { validateUpdateArticle() };
        artclType.onchange = function () { validateArticle() };
        $("#artContent").bind('paste', function (e) {
            validateArticle();
            return true;
        });        
        tinyMCE.init({
          selector: '#artContent',
          setup: function(editor) {
              editor.on('keyup', function(e) {
                  // Revalidate the hobbies field
                  validateArticle();
              });
          }
        });
        tinyMCE.init({
          selector: '#uArtclContent',
          setup: function(editor) {
              editor.on('keyup', function(e) {
                  // Revalidate the hobbies field
                  validateUpdateArticle();
              });
          }          
        });                

        function validateArticle() {
            var content = tinyMCE.get('artContent').getContent({format: 'text' });
            if (artclTitle.value  && artclType.value && content != "") {
                $('.finishArticle').prop('disabled', false);
                formArticle.onsubmit = function () { return true };
            }
            else {
                $('.finishArticle').prop('disabled', true);
                formArticle.onsubmit = function () { return false };
                msgArtcl.innerHTML = '<div class="alert alert-warning"> Fill the blank </div>';
            }
        }

        function validateUpdateArticle() {
            var content = tinyMCE.get('uArtclContent').getContent({format: 'text' });
            if (uArtclTitle.value && content != "") {
                $('.uFinishArticle').prop('disabled', false);
                uFormArticle.onsubmit = function () { return true };
            }
            else {
                $('.uFinishArticle').prop('disabled', true);
                uFormArticle.onsubmit = function () { return false };
            }
        }                                 

      });
        
      $(function(){
      //Auth Title
      var captArticle = document.getElementById("caption-article");

      $(".add_category").click(function(){
        $(".article_add").hide();
        $(".category_add").show();
        captArticle.innerHTML = 'Article Category'; 
        return false;
      }); 

      $(".CatToArticle").click(function(){
        $(".category_add").hide();        
        $(".article_add").show(); 
        captArticle.innerHTML = 'Article Description';           
        return false;
      });                    
          
      $(".openArticle").click(function(){
        $(".user_login").hide(); 
        $(".user_register").hide();         
        $("#login").modal('hide');
        $("#createArticle").modal('show');
        $(".formArticle").show();
        captArticle.innerHTML = 'Article Description';         
        return false;
        });             
      
      });       
    