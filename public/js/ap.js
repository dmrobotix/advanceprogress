(function($) {
  $("div").hover( function(eventObj) {
    if ($(this).is("#main-mouseover")) {
      if($(this).find('p').is(":visible")) {
        $(this).find('p').hide();
      } else {
        $(this).find('p').show();
      }
    }

  });
}(jQuery));
