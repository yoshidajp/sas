<?php get_header(); ?>

<?php
//SCF
$mv = get_field('mv', home_id());
$date = get_field('date', home_id());
$note = get_field('note', home_id());
$about = get_field('about', home_id());
$gallery01 = get_field('gallery01', home_id());
$gallery02 = get_field('gallery02', home_id());
?>

<main>

	<section id="mv">
		<div class="mv__catch"><img src="<?php temp_dir(); ?>/assets/images/img_catch01.png" alt="" class="js-fadeIn"></div>
		<div class="mv__bg js-slick-mv01">
			<?php foreach ($mv as $value) {
				echo '<div class="mvBg__item"><img src="' . $value['url'] . '" alt="メインビジュアル"></div>';
			} ?>
		</div>
	</section>

	<section id="homeAbout">
		<div class="inner">
			<?php if ($date) { ?>
				<div class="homeAbout__date">
					<?php echo $date; ?>
				</div>
			<?php } ?>
			<?php if ($note) { ?>
				<div class="homeAbout__note"><?php echo $note; ?></div>
			<?php } ?>
			<?php if ($about) { ?>
				<div class="homeAbout__lead js-fadeIn">
					<?php echo $about; ?>
				</div>
			<?php } ?>
		</div>
	</section>

	<section id="homeGallery">
		<div class="homeGallery__block">

			<?php //var_dump($gallery01);
			?>
			<ul class="homeGallery__list js-slick-gallery01">
				<?php foreach ($gallery01 as $value) {
					echo '<li><img src="' . $value['url'] . '" alt="ギャラリー"></li>';
				} ?>
			</ul>
		</div>
		<div class="homeGallery__block">
			<ul class="homeGallery__list js-slick-gallery02" dir="rtl">
				<?php foreach ($gallery02 as $value) {
					echo '<li><img src="' . $value['url'] . '" alt="ギャラリー"></li>';
				} ?>
			</ul>
		</div>
	</section>

	<section id="homeNews">
		<div class="homeNews__wrapper">
			<div class="inner">
				<div class="section__heading">
					<h2>お知らせ</h2>
				</div>
				<div class="section__content">
					<?php
					$paged = (int) get_query_var('paged');
					$args = array(
						'post_type' => array('news'),
						'post_status' => 'publish',
						'posts_per_page' => 4,
						'orderby' => 'date',
						'order' => 'DESC',
						'has_password' => false,
						'paged' => $paged,
					);
					$the_query = new WP_Query($args);
					if ($the_query->have_posts()) {
						echo '<ul class="newsList01">';
						while ($the_query->have_posts()) {
							$the_query->the_post();
							get_template_part('template-parts/newsList01', 'item');
						}
						echo '</ul>';
					} else {
					}
					wp_reset_postdata();
					?>
				</div>
			</div>
		</div>
	</section>

	<section id="homeLink">
		<div class="inner">
			<?php wp_nav_menu(array(
				'theme_location' => 'home-panel',
				'menu_class' => 'linkList01',
				'add_li_class' => 'js-fadeIn js-fadeIn--bottom',
				)); ?>
		</div>
	</section>

</main>

<?php get_footer(); ?>