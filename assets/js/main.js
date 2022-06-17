(function($){

	/* Preloader */
	$(window).load(function() {
		$('#status').fadeOut();
		$('#preloader').delay(300).fadeOut('slow');
	});

	$(document).ready(function() {
		$('#event_slider').slick({
			centerPadding: '20px',
			slidesToShow: 4,
			responsive: [
			{
				breakpoint: 992,
				settings: {
					arrows: false,
					centerPadding: '20px',
					slidesToShow: 2
				}
			},
			{
				breakpoint: 768,
				settings: {
					arrows: false,
					centerMode: true,
					centerPadding: '0px',
					slidesToShow: 1
				}
			}
			]
		});

		/* Smooth scroll / Scroll To Top */
		$('a[href*=#home],a[href*=#event]').bind("click", function(e){
			var anchor = $(this);
			$('html, body').stop().animate({
				scrollTop: $(anchor.attr('href')).offset().top
			}, 1000);
			e.preventDefault();
		});

		$(window).scroll(function() {
			if ($(this).scrollTop() > 100) {
				$('.scroll-up').fadeIn();
			} else {
				$('.scroll-up').fadeOut();
			}
		});

		/* Home BG */
		$(".screen-height").height($(window).height());

		$(window).resize(function(){
			$(".screen-height").height($(window).height());
		});

		if (/Android|webOS|iPhone|iPad|iPod|BlackBerry/i.test(navigator.userAgent)) {
			$('#home').css({'background-attachment': 'scroll'});
		} else {
			$('#home').parallax('50%', 0.1);
		}

		/* WOW Animation When You Scroll */
		wow = new WOW({
			mobile: false
		});
		wow.init();

	});

})(jQuery);