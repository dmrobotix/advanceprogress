var toggle = $('.nav-toggle');
var menu = $('.nav-menu');

toggle.on('click', function(event) {
  menu.toggleClass('is-active');
});