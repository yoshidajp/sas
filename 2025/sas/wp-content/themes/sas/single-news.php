<?php get_header(); ?>
<main>

	<section id="pageHeading">
		<div class="inner">
			<div class="section__heading">
				<div class="kana">オシラセ</div>
				<h2>お知らせ</h2>
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
			</div>
			<div class="section__content">
				<div class="entry-content">
					<?php the_content(); ?>
				</div>
			</div>
		</div>
	</section>

	<section id="pageFooter">
		<div class="inner">
			<div class="linkBlock01">
				<a href="/news/" class="reverse"><span>お知らせ一覧に戻る</span></a>
			</div>
		</div>
	</section>

</main>

<?php get_footer(); ?>