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
			<div class="entry-content">
				<?php the_content(); ?>

				<?php if (is_page('outline')) : ?>
					<?php
					$host = get_field('host', settings_id());
					$nominal_support = get_field('nominal_support', settings_id());
					$sponsor_big = get_field('sponsor_big', settings_id());
					$sponsor = get_field('sponsor', settings_id());
					?>
					<h2>運営情報</h2>

					<table>
						<?php if ($host) { ?>
							<tr>
								<th>主催</th>
								<td><?php echo $host; ?></td>
							</tr>
						<?php } ?>
						<?php if ($nominal_support) { ?>
							<tr>
								<th>後援</th>
								<td><?php echo $nominal_support; ?></td>
							</tr>
						<?php } ?>
						<?php if ($sponsor or $sponsor_big) { ?>
							<tr>
								<th>協賛</th>
								<td>
									<?php
									if ($sponsor_big) {
										echo '<ul class="sponsorList01">';
										foreach ($sponsor_big as $value) {
											echo '<li><a href="' . $value['url'] . '" target="_blank"><img src="' . $value['image'] . '" alt="' . $value['text'] . '"></a></li>';
										}
										echo '</ul>';
									}
									if ($sponsor) {
										echo '<p>' . $sponsor . '</p>';
									} ?>
								</td>
							</tr>
						<?php } ?>
					</table>
					<div class="linkBlock01">
						<a href="<?php echo home_url();?>/about/"><span>実行委員会について</span></a>
					</div>

				<?php endif; ?>
			</div>
		</div>
	</section>

</main>

<?php get_footer(); ?>