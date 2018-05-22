<?php
	if ( ! is_active_sidebar( 'sidebar-1' ) ) {
		return;
	}
?>
		<aside class="col-md-3 blog-sidebar">
			<?php dynamic_sidebar( 'sidebar-1' ); ?>
		</aside><!-- #secondary -->
	</div>
</main><!-- /.container -->
