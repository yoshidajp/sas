<?php get_header(); ?>
<main>

<section id="pageHeading">
		<div class="inner">
			<div class="section__heading">
				<div class="headingBlock headingBlock--03">
					<h2>お知らせ</h2>
					<span>NEWS</span>
				</div>
			</div>
		</div>
	</section>


	<section id="pageContent">
		<div class="inner">
			<div class="section__heading">
				<div class="sectionHeading__heading">
					<h2><?php the_title(); ?></h2>
				</div>
				<div class="sectionHeading__meta">
					<div class="date"><?php echo get_the_date('Y.m.d'); ?></div>
				</div>
				<?php if(get_the_post_thumbnail_url()): ?>
				<div class="sectionHeading__thumb">
					<div class="thumb"><img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="サムネイル"></div>
				</div>
				<?php endif; ?>
			</div>
			<div class="section__content">
				<div class="entry-content">
					<?php the_content(); ?>
				</div>
			</div>
		</div>
	</section>

</main>

<?php get_footer(); ?>