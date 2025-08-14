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
	$('.js-slick-gallery01').slick({
		autoplay: true,
		autoplaySpeed: 0, // 自動再生のスライド切り替えまでの時間を設定
		speed: 8000, // スライドが流れる速度を設定
		cssEase: "linear", // スライドの流れ方を等速に設定
		infinite: true,
		dots: false,
		arrows: false,
		variableWidth: true,
	});
	$('.js-slick-gallery02').slick({
		autoplay: true,
		autoplaySpeed: 0, // 自動再生のスライド切り替えまでの時間を設定
		speed: 8000, // スライドが流れる速度を設定
		cssEase: "linear", // スライドの流れ方を等速に設定
		infinite: true,
		dots: false,
		arrows: false,
		rtl: true,
		variableWidth: true,
	});
	$('.js-slick-mv01').slick({
		fade: true,    // fedeオン
		speed: 1500,   // 画像切り替えにかかる時間（ミリ秒）
		autoplaySpeed: 2000,   // 自動スライド切り替え速度
		arrows: false,         // 矢印表示・非表示
		autoplay: true,        // 自動再生
		slidesToShow: 1,       // スライド表示数
		slidesToScroll: 1,     // スライドする数
		infinite: true         // 無限リピート オン・オフ
	});

	// smooth scroll
	//////////////////////////////////////////////////////////////////////
	$('a[href^="#"]').click(function () {
		var speed = 500;
		var href = $(this).attr("href");
		var target = $(href == "#" || href == "" ? 'html' : href);
		var position = target.offset().top;
		$("html, body").animate({ scrollTop: position }, speed, "swing");
		return false;
	});

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