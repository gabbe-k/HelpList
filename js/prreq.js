
   function expandText() {
      $(".request-text-wrap").addClass("fullSize");
   }

    function getParameterByName(name, url) {
        if (!url) url = window.location.href;
        name = name.replace(/[\[\]]/g, "\\$&");
        var regex = new RegExp("[?&]" + name + "(=([^&#]*)|&|#|$)"),
            results = regex.exec(url);
        if (!results) return null;
        if (!results[2]) return '';
        return decodeURIComponent(results[2].replace(/\+/g, " "));
    }

   $(function () {

     var classId = getParameterByName("class");

     $('#request-form').on('submit', function (e) {

       e.preventDefault();

       $.post("../php/func/post.php",  {classId: classId, reqText: $('#request-form').children().val()}, function(data) {

          console.log(data);
          update();

       });

       /*$.ajax({
         type: 'post',
         url: '../php/func/post.php',
         data: $('#request-form').serialize(), classId,
         success: function () {
           console.log("form submitted");
           update();
         }
       }); */

     });

   });
