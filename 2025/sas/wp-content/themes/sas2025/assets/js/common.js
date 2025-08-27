$(function () {

	// アコーディオン
	//////////////////////////////////////////////////////////////////////
	$('.js-acc_button').on('click', function () {
		$(this).parent().toggleClass('is-open');
		$(this).nextAll('.js-acc_content').slideToggle();
	});



	// hbg
	//////////////////////////////////////////////////////////////////////

	$('.nav__button').on('click', function () {
		toggleNav();
	});
	$('.nav__content a').on('click', function () {
		toggleNav();
	});
	function toggleNav() {
		$('.nav__button').toggleClass('is-open').toggleClass('is-close');
		$('.nav__content').toggleClass('is-open').toggleClass('is-close').fadeToggle();
	}

	// slick
	//////////////////////////////////////////////////////////////////////
	$('.js-slick-mv01').slick({
		arrows: true,         // 矢印表示・非表示
		autoplay: true,        // 自動再生
		infinite: true,         // 無限リピート オン・オフ
		slidesToShow: 3,       // スライド表示数
		slidesToScroll: 1,     // スライドする数
		speed: 1500,   // 画像切り替えにかかる時間（ミリ秒）
		autoplaySpeed: 2000,   // 自動スライド切り替え速度
		centerMode: true,
		variableWidth: true,
		responsive: [
			{
				breakpoint: 1120,
				settings:{
					arrows: false,
					fade: true,    // fedeオン
					slidesToShow: 1,       // スライド表示数
					centerMode: false,
					variableWidth: false,
				}
			}
		]
	});

	// smooth scroll
	//////////////////////////////////////////////////////////////////////

	$(window).on('load resize', function () {

		var headerHeight = $('.header__logo').outerHeight();
		var urlHash = location.hash;
		var speed = 500;
		//console.log(headerHeight);

		$('a[href^="#"]').click(function () {
			var href = $(this).attr("href");
			var target = $(href == "#" || href == "" ? 'html' : href);
			var position = target.offset().top - ( headerHeight * 1.2);
			$("html, body").animate({ scrollTop: position }, speed, "swing");
			return false;
		});

		if (urlHash) {
			var target = $(urlHash);
			var position = target.offset().top - ( headerHeight * 1.2);
			$("html, body").animate({ scrollTop: position }, speed, "swing");
		}
	});


	// hbg
	//////////////////////////////////////////////////////////////////////
	$('#hamburger__button').on('click', function () {
		hbgMenu();
	});
	$('#hamburger__bg').on('click', function () {
		hbgMenu();
	});
	function hbgMenu() {
		$('#hamburger__button').toggleClass('is-open').toggleClass('is-close');
		$('#hamburger__content').toggleClass('is-open').toggleClass('is-close').fadeToggle();
		$('#hamburger__bg').toggleClass('is-open').toggleClass('is-close');
	}

	// fade
	//////////////////////////////////////////////////////////////////////
	$(window).on('load scroll', function () {

		var box = $('.js-fadeIn');
		var animated = 'is-show';

		box.each(function () {

			var boxOffset = $(this).offset().top;
			var scrollPos = $(window).scrollTop();
			var wh = $(window).height();

			if (scrollPos > boxOffset - wh + 100) {
				$(this).addClass(animated);
			}
		});
	});

});