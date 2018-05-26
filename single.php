<?php get_header(); ?>
<main id="main" role="main" class="container">
	<div class="row">
		 <div class="col-md-9 blog-main">
			<?php
			if ( have_posts() ) :

				if ( is_home() && ! is_front_page() ) :
					?>
				<header>
					<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
				</header>
					<?php
				endif;
				while ( have_posts() ) :
					the_post();
        	get_template_part( 'template-parts/content', get_post_type() );
				endwhile;
				the_posts_navigation();
			else :
				get_template_part( 'template-parts/content', 'none' );
			endif;
			?>
		</div>

<?php
get_sidebar();
get_footer();
