function update() {

  $.ajax({
    url: '../php/print/prclass.php',
    success:
    function(data){
    $('.request-wrap').hide().html(data).fadeIn(200); //insert text of test.php into your div

    },
  });

}

$(document).ready(function() {

  update();

});
