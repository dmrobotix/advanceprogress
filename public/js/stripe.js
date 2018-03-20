(function($) {
  "use strict";

  $("#amt").on("keyup paste", function() {
    var amt = $(this).val()*100;
    $("#stripe").html("<script id=\"stripe\" src=\"https://checkout.stripe.com/checkout.js\" class=\"stripe-button\" data-key=\"pk_live_dwVbjMBEoByGdfMGR8SZrW1d\" data-description=\"Donation to Advance Progress\" data-amount=\"" + amt + "\" data-locale=\"auto\"></script>");
  });
}(jQuery));
