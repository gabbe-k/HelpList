function getParameterByName(name, url) {
    if (!url) url = window.location.href;
    name = name.replace(/[\[\]]/g, "\\$&");
    var regex = new RegExp("[?&]" + name + "(=([^&#]*)|&|#|$)"),
        results = regex.exec(url);
    if (!results) return null;
    if (!results[2]) return '';
    return decodeURIComponent(results[2].replace(/\+/g, " "));
}


function update() {

  console.log("update");

  var classId = getParameterByName("class");

  $.post("../php/print/prreq.php",  {classId: classId}, function(data) {

    $('.request-wrap').hide().html(data).fadeIn(200);

  });

}

$(document).ready(function() {

  update();

  /*setInterval(function(){
        update();
  }, 2000); */

  var checkedElementArr = [];
  var listElementArr = [];

  $('.listview-wrap').click(function(event) {

      if ($(event.target).is('.request-checkmark')) {

        var checkmark = event.target;

        if ($(checkmark).hasClass("isChecked")) {

          var postId = $(checkmark).parent().next().children().val();
          var listElement = $(checkmark).parent();
          $(checkmark).removeClass("animatable--now");
          $(checkmark).removeClass("isChecked");

          checkedElementArr = jQuery.grep(checkedElementArr, function(value) {
            return value != postId;
          });

          listElementArr = jQuery.grep(listElementArr, function(value) {
            return value != postId;
          });

        }
        else {
          var postId = $(checkmark).parent().next().children().val();
          var listElement = $(checkmark).parent();
          checkedElementArr.push(postId);
          listElement.push(postId);
          $(checkmark).addClass("animatable--now");
          $(checkmark).addClass("isChecked");

        }

      }



      if ($(event.target).is('#remove-tags-button') && checkedElementArr.length > 0) {

        /*jQuery.each(listElement, function(index, item) {
            console.log(item);
            $(item).fadeOut();
        }); */

        $.post("../php/print/prremovepost.php",  {postIdArr: checkedElementArr}, function(output) {

          console.log(output);
          update();

        });

      }

    });

});
