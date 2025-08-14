<footer>

	<section id="footerWave">
		<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 10" preserveAspectRatio="none">
			<path fill="#d9cfc2" id="wave1" d="M100,10H0V9C49.83,9,50,2,100,2v8Z">
				<animate attributeType="XML" attributeName="d" dur="10s" repeatCount="indefinite" values="
 M100,10H0V9C49.83,9,50,2,100,2v8Z;
 M100,10H0V5.58C50.08,0,50.08,0,100,5.5V10Z;
 M100,10H0V2C49.83,2,50,9,100,9v1Z;
 M100,10H0V5.5C50,10,50,10,100,5.5V10Z;
 M100,10H0V9C49.83,9,50,2,100,2v8Z
 "></animate>
			</path>
		</svg>
	</section>

	<section id="footerCatch">
		<div class="inner">
			<img src="<?php temp_dir(); ?>/assets/images/img_catch02.png" alt="歌う語らうあったまる。" class="js-fadeIn">
		</div>
	</section>

	<?php get_template_part('template-parts/section', 'breadcrumb'); ?>

	<section id="footerMenu">
		<div class="inner">
			<div id="footerMenu__logo">
				<h1><a href="/"><img src="<?php temp_dir(); ?>/assets/images/logo_02.png" alt="ロゴ画像"></a></h1>
			</div>
			<div id="footerMenu__list">
				<div class="footerMenu__block footerMenu__block--primary">
					<?php wp_nav_menu(array('theme_location' => 'footer--primary')); ?>
				</div>
				<div class="footerMenu__block footerMenu__block--secondary">
					<?php wp_nav_menu(array('theme_location' => 'footer--secondary')); ?>
				</div>
			</div>
		</div>
	</section>
	<section id="footerOrganization">
		<div class="inner">
			<?php
			$host = get_field('host', settings_id());
			$nominal_support = get_field('nominal_support', settings_id());
			$sponsor_big = get_field('sponsor_big', settings_id());
			$sponsor = get_field('sponsor', settings_id());
			?>
			<table>
				<?php if($host){ ?>
				<tr>
					<th>主催</th>
					<td><?php echo $host; ?></td>
				</tr>
				<?php } ?>
				<?php if($nominal_support){ ?>
				<tr>
					<th>後援</th>
					<td><?php echo $nominal_support; ?></td>
				</tr>
				<?php } ?>
				<?php if($sponsor or $sponsor_big){ ?>
				<tr>
					<th>協賛</th>
					<td>
						<?php
						if( $sponsor_big ){
							echo '<ul class="sponsorList01">';
							foreach($sponsor_big as $value){
								echo '<li><a href="'. $value['url'] .'" target="_blank"><img src="'. $value['image'] .'" alt="'. $value['text'] .'"></a></li>';
							}
							echo '</ul>';
						}
						if( $sponsor ){
							echo '<p>' .$sponsor. '</p>';
						}?>
					</td>
				</tr>
				<?php } ?>
			</table>
			<p id="footerOrganization__copy">
				&copy; <?php bloginfo('name'); ?> .</p>
		</div>
	</section>
</footer>

<?php wp_footer(); ?>
</body>

</html>