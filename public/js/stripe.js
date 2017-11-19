(function($) {
  "use strict";

  $("#amt").on("keyup paste", function() {
    var amt = $(this).val()*100;
    $("#stripe").html("<script id=\"stripe\" src=\"https://checkout.stripe.com/checkout.js\" class=\"stripe-button\" data-key=\"pk_test_6pRNASCoBOKtIshFeQd4XMUh\" data-description=\"Donation to Advance Progress\" data-amount=\"" + amt + "\" data-locale=\"auto\"></script>");
  });
}(jQuery));
