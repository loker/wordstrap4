<?php
	if ( ! is_active_sidebar( 'sidebar-1' ) ) {
		return;
	}
?>
		<aside class="col-md-3 blog-sidebar">
			<section class="program widget mt-3">
			<?php $my_query = new WP_Query('category_name=program&showposts=1'); ?>
			<?php while ($my_query->have_posts()) : $my_query->the_post(); ?>
				<a href="<?php the_permalink() ?>" title="<?php the_title(); ?>">
					<?php the_title(); ?> programı için tıklayın
				</a>
			</section>
			<?php endwhile; ?>
			<div><a href="#"><img src="<?php echo get_template_directory_uri(); ?>/img/facebook.jpg" alt="ahmet şık facebook sayfası linki" /></a></div>
			<div><a href="#"><img src="<?php echo get_template_directory_uri(); ?>/img/twitter.jpg" alt="ahmet şık twitter hesabı linki" /></a></div>
			<div><a href="#"><img src="<?php echo get_template_directory_uri(); ?>/img/youtube.jpg" alt="ahmet şık youtube kanalı linki" /></a></div>
			<?php dynamic_sidebar( 'sidebar-1' ); ?>
		</aside><!-- #secondary -->
	</div>
</main><!-- /.container -->
