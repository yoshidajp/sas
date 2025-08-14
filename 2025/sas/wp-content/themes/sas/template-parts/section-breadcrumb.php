<?php
$the_obj = get_queried_object();
//var_dump($wp_query);
?>

<?php if( is_front_page(  ) ){
	return;
}?>

<section  id="breadcrumb">
	<div class="inner ">
		<ul>
			<li><a href="/"><img src="<?php temp_dir(); ?>/assets/images/icon_home01.svg" alt="トップページ"></a></li>
			<?php if (is_singular('group')) { ?>

				<li><a href="/group/">Group</a></li>
				<li class="is-current"><?php echo get_the_title(); ?></li>
			<?php }elseif (is_singular('article')) { ?>

				<li><a href="/article/">Article</a></li>
				<li class="is-current"><?php echo get_the_title(); ?></li>
			<?php }elseif (is_singular('news')) { ?>

				<li><a href="/news/">お知らせ</a></li>
				<li class="is-current"><?php echo get_the_title(); ?></li>
			<?php } elseif (is_search()) { ?>
				<?php if( $wp_query->query['paged'] > 1 ): ?>

					<li>Search</li>
					<li class="is-current">Page <?php echo $wp_query->query['paged']; ?></li>
				<?php else: ?>

					<li class="is-current">Search</li>
				<?php endif; ?>
			<?php } elseif (is_tax()) { ?>
				<?php if( $wp_query->query['paged'] > 1 ): ?>

					<li><a href="/group">Group</a></li>
					<li><?php echo get_taxonomy($the_obj->taxonomy)->label; ?></li>
					<li><a href="/<?php echo $the_obj->taxonomy ?>/<?php echo $the_obj->slug; ?>"><?php echo $the_obj->name; ?></a></li>
					<li class="is-current">Page <?php echo $wp_query->query['paged']; ?></li>
				<?php else: ?>

					<li><a href="/group">Group</a></li>
					<li><?php echo get_taxonomy($the_obj->taxonomy)->label; ?></li>
					<li class="is-current"><a href="/<?php echo $the_obj->taxonomy ?>/<?php echo $the_obj->slug; ?>"><?php echo $the_obj->name; ?></a></li>
				<?php endif; ?>
			<?php } elseif (is_page()) { ?>
				<?php if( $wp_query && $wp_query->query_vars['paged'] > 1 ): ?>

					<li><?php echo get_the_title(); ?></li>
					<li class="is-current">Page <?php echo $wp_query->query['paged']; ?></li>
				<?php else: ?>

					<li class="is-current"><?php echo get_the_title(); ?></li>
				<?php endif; ?>
			<?php } ?>

		</ul>
	</div>
</section>