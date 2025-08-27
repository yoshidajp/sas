<?php
$x = get_field('x_id', 'option');
$ig = get_field('instagram_id', 'option');
$yt = get_field('youtube_url', 'option');
?>

<!doctype html>
<html lang="ja">

<head>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!--wp_head-->
	<?php wp_head() ?>

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
	<link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@300;500&family=Noto+Sans+JP:wght@400;500;700;900&display=swap" rel="stylesheet">

	<!--js-->
	<script src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
	<script type="text/javascript" src="<?php temp_dir(); ?>/assets/js/common.js?<?php echo date("YmdHi") ?>"></script>

	<?php //get_template_part('template-parts/schema', '');
	?>

	<!-- Google tag (gtag.js) -->

</head>

<body <?php body_class(); ?>>

	<header class="header">
		<div class="header__logo">
			<h1>
				<a href="<?php echo home_url();?>">
					<img src="<?php temp_dir(); ?>/assets/images/logo_sas01.png" alt="<?php echo bloginfo('name'); ?>">
					<span class="year">'25</span>
			</a>
		</h1>
		</div>
		<div class="header__menu is-pc">
			<nav class="headerNav">
				<?php $gmenu = wp_nav_menu(array(
					'theme_location' => 'global-nav',
					'container' => false ,//コンテナをなしにする場合は、falseを明記する必要があります
					'menu_id' => 'headerNavList',
					'menu_class' => 'headerNavList',
					'echo' => false,//メニューをPHPの値で返すfalseにします
					));
					$gmenu = str_replace('<ul class="sub-menu">', '<div class="headerNavList__child"><div class="inner"><ul class="sub-menu">', $gmenu);
					$gmenu = str_replace("</li>\n</ul>\n</li>", '</li></ul></div></div></li>', $gmenu);
					echo $gmenu;
				?>
			</nav>
			<div class="headerSns">
				<ul>
					<?php if($x){ ?><li><a href="https://x.com/<?php echo $x; ?>" target="_blank"><img src="<?php temp_dir(); ?>/assets/images/icon_x.png" alt="X公式アカウント"></a></li><?php } ?>
					<?php if($ig){ ?><li><a href="https://instagram.com/<?php echo $ig; ?>" target="_blank"><img src="<?php temp_dir(); ?>/assets/images/icon_instagram.png" alt="Instagram公式アカウント"></a></li><?php } ?>
					<?php if($yt){ ?><li><a href="<?php echo $yt; ?>" target="_blank"><img src="<?php temp_dir(); ?>/assets/images/icon_youtube.png" alt="YouTube公式アカウント"></a></li><?php } ?>
				</ul>
			</div>
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