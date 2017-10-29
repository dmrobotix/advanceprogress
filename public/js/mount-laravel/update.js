jQuery(document).ready(function() {

	jQuery('header .search-box form').attr('class','search-form');



	  var serviceFinder = jQuery(".mount-service1").find(".service-footer a");

	serviceFinder.on("click", function(e) {

        e.preventDefault();

        jQuery(this).parent().closest(".service-panel").toggleClass("active");

        //$(".service-body").toggle();

    });



	jQuery('.nav.navbar-nav .mega-dropdown >ul.dropdown-menu').addClass('mega-dropdown-menu');

	jQuery('.nav.navbar-nav .mega-dropdown >ul.dropdown-menu >li >ul').removeClass('dropdown-menu');

});





if (jQuery('.contact-address-mount').val()){

    var contact_address =  jQuery(".contact-address-mount").val();



	jQuery('#googleMap').gMap({

		address: contact_address,

		zoom: 15,

		markers:[

			{

				address: contact_address,

				maptype:'ROADMAP',

			}

		]

	});

}