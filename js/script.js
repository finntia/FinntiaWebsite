// JavaScript Document


//jQuery for page scrolling feature - requires jQuery Easing plugin
$(function () {
	$('a.page-scroll').bind('click', function (event) {
		var $anchor = $(this);
		$('html, body').stop().animate({
			scrollTop: $($anchor.attr('href')).offset().top
		}, 1500, 'easeInOutExpo');
		event.preventDefault();
	});
});


$(document).ready(function () {
	$(".owl-carousel").owlCarousel({
		items: 4,
		loop: true,
		margin: 30,
		responsiveClass: true,
		autoplay: true,
		autoplayTimeout: 2500,
		responsive: {
			0: {
				items: 1,
			},
			600: {
				items: 2.2,
			},
			1000: {
				items: 4,
			}
		}
	});

});


var line = document.getElementById("line");

line.addEventListener('input', function () {
	var lineValue = line.value;
	var count = document.getElementById("count");
	count.innerHTML = lineValue;
});



$(window).scroll(function () {
	 if ( $(window).width() <= 769 ) {
		
		if ($(this).scrollTop() > 50) {
			$('.navbar-fixed-top').removeClass('transcroll');
			$('.navbar .navbar-brand img').attr("src", "imgs/logo_colored.png");
		} else {
			$('.navbar-fixed-top').addClass('transcroll');
			$('.navbar .navbar-brand img').attr("src", "imgs/logo_colored.png");
		}
	 }else{
		
		if ($(this).scrollTop() > 50) {
			$('.navbar-fixed-top').removeClass('transcroll');
			$('.navbar .navbar-brand img').attr("src", "imgs/logo_colored.png");
		} else {
			$('.navbar-fixed-top').addClass('transcroll');
			$('.navbar .navbar-brand img').attr("src", "imgs/logo_white.png");
		}
	 }
});

