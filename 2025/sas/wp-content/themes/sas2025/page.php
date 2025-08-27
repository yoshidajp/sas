<?php
/*
Template Name: 通常固定ページ
*/
?>

<?php get_header(); ?>
<main>

	<section id="pageHeading">
		<div class="inner">
			<div class="section__heading">
				<div class="headingBlock headingBlock--03">
					<h2><?php the_title(); ?></h2>
					<span><?php echo $post->post_name; ?></span>
				</div>
			</div>
		</div>
	</section>

	<section id="pageContent">
		<div class="inner">
			<div class="entry-content">
				<?php the_content(); ?>
			</div>
		</div>
	</section>

</main>

<?php get_footer(); ?>