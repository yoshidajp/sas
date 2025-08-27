<?php get_header(); ?>

<?php
//SCF
$mv_gallery = get_field('mv_gallery', 'option');
$mv_message = get_field('mv_message', 'option');
$about_heading = get_field('about_heading', 'option');
$about_description = get_field('about_description', 'option');
$about_image = get_field('about_image', 'option');
$panel = get_field('panel', 'option');
$panel_heading = get_field('panel_heading', 'option');
$panel_heading_sub = get_field('panel_heading_sub', 'option');
?>

<main>

	<section id="mv" class="mv">
		<div class="mvList js-slick-mv01">
			<?php foreach ($mv_gallery as $value) {
				echo '<div class="mvList__item"><img src="' . $value['url'] . '" alt="メインビジュアル"></div>';
			} ?>
		</div>
		<?php if ($mv_message): ?>
			<div class="mvMessage">
				<div class="inner">
					<?php echo $mv_message; ?>
				</div>
			</div>
		<?php endif; ?>
	</section>

	<section id="homeAbout">
		<div class="homeAboutColumn">
			<div class="homeAboutColumn__left">
				<div class="homeAboutColumn__left__content">
					<?php if ($about_heading) { ?>
						<div class="homeAboutHeading">
							<?php echo $about_heading; ?>
						</div>
					<?php } ?>
					<?php if ($about_description) { ?>
						<div class="homeAboutDescription"><?php echo $about_description; ?></div>
					<?php } ?>
					<div class="homeAboutButton linkButton linkButton--01">
						<a href="/outline/">開催概要</a>
					</div>
				</div>
			</div>
			<?php if ($about_image) { ?>
				<div class="homeAboutColumn__right">
					<div class="homeAboutColumn__right__content">
						<img src="<?php echo $about_image; ?>" alt="">
					</div>
				</div>
			<?php } ?>

		</div>
	</section>

	<section id="homeNews">
		<div class="inner">
			<div class="section__heading">
				<div class="headingBlock headingBlock--01">
					<h2>NEWS</h2>
					<span>お知らせ</span>
				</div>
			</div>
			<div class="section__content">
				<?php
				$paged = (int) get_query_var('paged');
				$args = array(
					'post_type' => array('news'),
					'post_status' => 'publish',
					'posts_per_page' => 3,
					'orderby' => 'date',
					'order' => 'DESC',
					'has_password' => false,
					'paged' => $paged,
				);
				$the_query = new WP_Query($args);
				if ($the_query->have_posts()) {
					echo '<ul class="newsList newsList--01">';
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
	</section>

	<section id="homePanel">
		<div class="inner">
			<div class="section__heading">
				<div class="headingBlock headingBlock--01">
					<?php if($panel_heading): ?><h2><?php echo $panel_heading; ?></h2><?php endif; ?>
					<?php if($panel_heading_sub): ?><span><?php echo $panel_heading_sub; ?></span><?php endif; ?>
				</div>
			</div>
			<div class="section__content">
				<div class="homePanelGird">
					<?php foreach($panel as $value): ?>
					<div class="homePanelGrid__item">
						<a href="<?php echo $value['panel_url']; ?>">
							<div class="thumb"><img src="<?php echo $value['panel_image']; ?>" alt="<?php echo $value['panel_text']; ?>"></div>
							<div class="title"><?php echo $value['panel_text']; ?></div>
							<div class="sub"><?php echo $value['panel_sub']; ?></div>
						</a>
					</div>
					<?php endforeach; ?>
				</div>
			</div>
		</div>
	</section>

</main>

<?php get_footer(); ?>