<!doctype html>
<html lang="ja">

<head>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!--wp_head-->
	<?php

use function AC\Vendor\DI\value;

 wp_head() ?>

	<!-- css -->
	<link rel="stylesheet" type="text/css" href="<?php temp_dir(); ?>/style.css?<?php echo date("YmdHi") ?>" />
	<link rel="stylesheet" type="text/css" href="<?php temp_dir(); ?>/assets/css/destyle.css" />
	<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
	<link rel="stylesheet" type="text/css" href="<?php temp_dir(); ?>/assets/css/foundation.css?<?php echo date("YmdHi") ?>" />
	<link rel="stylesheet" type="text/css" href="<?php temp_dir(); ?>/assets/css/layout.css?<?php echo date("YmdHi") ?>" />
	<link rel="stylesheet" type="text/css" href="<?php temp_dir(); ?>/assets/css/entry-content.css?<?php echo date("YmdHi") ?>" />
	<link rel="stylesheet" type="text/css" href="<?php temp_dir(); ?>/assets/css/object.css?<?php echo date("YmdHi") ?>" />

	<!--fonts-->
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Gravitas+One&family=Zen+Maru+Gothic:wght@500;700;900&display=swap" rel="stylesheet">

	<!--js-->
	<script src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
	<script type="text/javascript" src="<?php temp_dir(); ?>/assets/js/common.js?<?php echo date("YmdHi") ?>"></script>

	<?php //get_template_part('template-parts/schema', '');
	?>

	<!-- Google tag (gtag.js) -->

</head>

<body <?php body_class(); ?>>

	<header>
		<div class="header__logo">
			<h1><a href="<?php echo home_url();?>"><img src="<?php temp_dir(); ?>/assets/images/logo_01.png" alt="<?php echo bloginfo('name'); ?>"></a></h1>
		</div>
		<div class="header__menu is-pc">
			<nav class="header__nav">
				<?php wp_nav_menu(array('theme_location' => 'global-nav')); ?>
			</nav>
		</div>
		<div id="hamburger" class="is-sp">
			<div id="hamburger__button" class="is-close">
				<span></span>
				<span></span>
				<span></span>
			</div>
			<nav id="hamburger__content" class="is-close" style="display: none;">
				<div class="hamburgerContent__block">
					<?php wp_nav_menu(array('theme_location' => 'footer--primary', 'menu_id' => 'hamburgerMenu--primary')); ?>
				</div>
				<div class="hamburgerContent__block">
					<?php wp_nav_menu(array('theme_location' => 'footer--secondary', 'menu_id' => 'hamburgerMenu--secondary')); ?>
				</div>

				<?php
				$sns = get_field('sns', settings_id());
				if ($sns) {
				?>
				<div class="hamburgerContent__block">
					<ul class="snsList01">
						<?php foreach( $sns as $value ){
							echo '<li><a href="' .$value['url']. '" target="_blank"><img src="' .$value['image']. '" alt="' .$value['text']. '"></a></li>';
						} ?>
					</ul>
				</div>
				<?php } ?>
			</nav>
			<div id="hamburger__bg"></div>
		</div>

	</header>