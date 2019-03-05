
$(document).ready(function() {

  $('.listview-wrap').click(function(event) {

      var checkedElementArr = [];

      if ($(event.target).is('.request-checkmark')) {

        var checkmark = event.target;

        if ($(checkmark).hasClass("isChecked")) {

          $(checkmark).removeClass("animatable--now");
          $(checkmark).removeClass("isChecked");
          checkedElementArr = jQuery.grep(checkedElementArr, function(value) {
            return value != checkmark;
          });

        }
        else {

          checkedElementArr.push(checkmark);
          $(checkmark).addClass("animatable--now");
          $(checkmark).addClass("isChecked");

        }

      }

      if ($(event.target).is('#request-form')) {

        console.log(checkedElementArr[0]);
        console.log(checkedElementArr[1]);
        console.log(checkedElementArr[2]);
      }

    });

});
