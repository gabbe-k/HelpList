function update() {

  $.ajax({
    url: '../php/print/prreq.php',
    success:
    function(data){
    $('.request-wrap').hide().html(data).fadeIn(200); //insert text of test.php into your div

    },
  });

}

$(document).ready(function() {

  update();

  var checkedElementArr = [];

  $('.listview-wrap').click(function(event) {

      if ($(event.target).is('.request-checkmark')) {

        var checkmark = event.target;

        if ($(checkmark).hasClass("isChecked")) {

          var postId = $(checkmark).parent().next().children().val();
          $(checkmark).removeClass("animatable--now");
          $(checkmark).removeClass("isChecked");

          checkedElementArr = jQuery.grep(checkedElementArr, function(value) {
            return value != postId;
          });

        }
        else {
          var postId = $(checkmark).parent().next().children().val();
          console.log(postId);
          checkedElementArr.push(postId);
          $(checkmark).addClass("animatable--now");
          $(checkmark).addClass("isChecked");

        }

      }



      if ($(event.target).is('#remove-tags-button') && checkedElementArr.length > 0) {

        $.post("../php/print/prremovepost.php",  {postIdArr: checkedElementArr}, function(output) {

          console.log(output);
          update();

        });

      }

    });

});
