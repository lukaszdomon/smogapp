$(function () {
      $('.stations').popover({
        html: true,
        placement: "right",
        trigger: "hover",
        title: function () {
            return $(this).find('.pop-title').html();
        },
        content: function () {
            return $(this).find('.pop-content').html();
        }
      });
    });
