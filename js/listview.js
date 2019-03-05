
$(document).ready(function() {

  $('.listview-wrap').click(function(event) {

      if ($(event.target).is('.request-checkmark')) {

        var checkmark = event.target;

        if ($(checkmark).hasClass("isChecked")) {

          $(checkmark).removeClass("animatable--now");
          $(checkmark).removeClass("isChecked");

        }
        else {

          $(checkmark).addClass("animatable--now");
          $(checkmark).addClass("isChecked");

        }

      }

    });

});
