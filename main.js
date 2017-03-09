$(function () {
      $('#station1').popover({
        html: true,
        placement: "right",
        trigger: "hover",
        title: function () {
            return $("#station1 .pop-title").html();
        },
        content: function () {
            return $("#station1 .pop-content").html();
        }
      });
    });
