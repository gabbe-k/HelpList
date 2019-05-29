
function update() {

  $.ajax({
    url: '../php/print/prclass.php',
    success:
    function(data){
    $('.request-wrap').hide().html(data).fadeIn(200); //insert text of test.php into your div

    },
  });

}

$(function () {

  var id;

  console.log("h");

  console.log("running");

  $.post("./php/func/sessiongetter.php",  {param: "idToken"}, function(data) {

    id = data;

  });

  if (id != null) {
    console.log("not NULL");
  }

});
