<?php
$sponsor = get_field('sponsor', 'option');

?>
<footer>

	<?php get_template_part('template-parts/section', 'breadcrumb'); ?>

	<?php if($sponsor): ?>
	<section id="footerSponsor">
		<div class="inner">
			<div class="section__heading">
				<div class="headingBlock headingBlock--02">
					<h2>SPONSOR</h2>
					<span>ご協賛</span>
				</div>
			</div>
			<div class="section__content">
				<ul class="sponsorList sponsorList--01">
					<?php foreach($sponsor as $value):?>
					<li class="sponsorList__item">
						<a href="<?php echo $value['sponsor_link']['url']; ?>" target="_blank">
							<img src="<?php echo $value['sponsor_image']; ?>" alt="<?php echo $value['sponsor_link']['title']; ?>">
						</a>
					</li>
					<?php endforeach; ?>
				</ul>
			</div>
		</div>

	</section>
	<?php endif; ?>

	<section id="footerMenu">
		<div class="inner">
			<div id="footerMenu__logo">
				<h1><a href="<?php echo home_url(); ?>"><img src="<?php temp_dir(); ?>/assets/images/logo_sas02.png" alt="ロゴ画像"></a></h1>
			</div>
			<div id="footerMenu__list">
				<ul class="menu footerMenuList">
				<?php
				$menu_global = wp_nav_menu(
					array(
						'theme_location' => 'global-nav', //該当するメニュー名を入れます。
						'items_wrap' => '%3$s',//メニュー項目をかこむタグを除外したい場合は%3$sを記述します。
						'container' => false ,//コンテナをなしにする場合は、falseを明記する必要があります
						'echo' => false,//メニューをPHPの値で返すfalseにします
						'menu_class' => '',
					)
				);
				$menu_footer = wp_nav_menu(
					array(
						'theme_location' => 'footer--secondary',
						'items_wrap' => '%3$s',//メニュー項目をかこむタグを除外したい場合は%3$sを記述します。
						'container' => false ,//コンテナをなしにする場合は、falseを明記する必要があります
						'echo' => false,//メニューをPHPの値で返すfalseにします
					)
				);
				echo $menu_global;
				echo $menu_footer;
				?>
				</ul>
			</div>
		</div>
	</section>

	<section id="footerCopyright">
		<div class="inner">
			<div class="footerCopyright__copy">&copy; <?php bloginfo('name'); ?> All Right Reserved.</div>
			<div class="footerCopyright__link"><a href="/policy/">プライバシーポリシー</a></div>
		</div>
	</section>

</footer>

<?php wp_footer(); ?>
</body>

</html>