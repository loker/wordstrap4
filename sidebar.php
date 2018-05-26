<?php
	if ( ! is_active_sidebar( 'sidebar-1' ) ) {
		return;
	}
?>
		<aside class="col-md-3 blog-sidebar">
			<section class="widget mt-3">
			<?php $my_query = new WP_Query('category_name=program&showposts=1'); ?>
			<?php while ($my_query->have_posts()) : $my_query->the_post(); ?>
				<a href="<?php the_permalink() ?>" title="<?php the_title(); ?>">
					<?php the_title(); ?> programı
					<?php the_content('', TRUE ); ?>
				</a>
			</section>
			<?php endwhile; ?>

			<?php dynamic_sidebar( 'sidebar-1' ); ?>
		</aside><!-- #secondary -->
	</div>
</main><!-- /.container -->
