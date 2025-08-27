<?php
if( get_the_post_thumbnail_url() ){
	$thumb = get_the_post_thumbnail_url();
}else{
	$thumb = get_field('thumbnail_dafault', 'option');
}?>

							<li class="newsList01__item">
								<a href="<?php echo get_the_permalink(); ?>">
									<div class="thumb"><img src="<?php echo $thumb; ?>" alt="サムネイル"></div>
									<div class="title"><?php the_title(); ?></div>
									<div class="date"><?php echo get_the_date('Y.m.d'); ?></div>
								</a>
							</li>