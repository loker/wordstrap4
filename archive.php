<?php get_header(); ?>
<main id="main" role="main" class="container">
	<div class="row">
		 <div class="col-md-9 blog-main">

		<?php if ( have_posts() ) : ?>

			<header class="page-header p-2">
				<?php
				single_term_title( '<h1 class="page-title">', '</h1>' );
				the_archive_description( '<div class="archive-description">', '</div>' );
				?>
			</header><!-- .page-header -->

			<?php
			while ( have_posts() ) :
				the_post();
				get_template_part( 'template-parts/content', get_post_type() );

			endwhile;

			the_posts_navigation();

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif;
		?>

	</div><!-- #primary -->
<?php
get_sidebar();
get_footer();
