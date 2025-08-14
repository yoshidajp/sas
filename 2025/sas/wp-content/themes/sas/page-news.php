<?php
/*
Template Name: 通常固定ページ
*/
?>

<?php get_header(); ?>
<main>

	<?php
	//CFS
	$kana = get_field('kana');
	?>

	<section id="pageHeading">
		<div class="inner">
			<div class="section__heading">
				<?php if ($kana) { ?><div class="kana"><?php echo $kana; ?></div><?php } ?>
				<h2><?php the_title(); ?></h2>
			</div>
		</div>
	</section>

	<section id="pageContent">
		<div class="inner">
			<?php
			$paged = (int) get_query_var('paged');
			$args = array(
				'post_type' => array('news'),
				'post_status' => 'publish',
				'posts_per_page' => 12,
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
	</section>
	<section id="pageFooter">
		<div class="inner">

			<div id="pagination">
				<?php

				if ($the_query->max_num_pages > 1) {
					echo paginate_links(array(
						'base' => get_pagenum_link() .  '%_%',
						'format' => 'page/%#%/',
						'end_size' => 1,
						'mid_size' => 1,
						'current' => max(1, $paged),
						'total' => $the_query->max_num_pages,
						'prev_text' => '',
						'next_text' => '',
						'type' => 'list',
					));
				}
				?>
			</div>
		</div>
	</section>

</main>

<?php get_footer(); ?>