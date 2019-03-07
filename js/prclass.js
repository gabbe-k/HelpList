   $(function () {

     $('#request-form').on('submit', function (e) {

       e.preventDefault();

       $.ajax({
         type: 'post',
         url: '../php/func/class.php',
         data: $('#request-form').serialize(),
         success: function () {
           console.log("form submitted");
           update();
         }
       });

     });

   });
