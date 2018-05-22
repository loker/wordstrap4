<?php get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">
					<?php	$pics = array('meta_query' => array(array('key' => '_thumbnail_id')));
					$query = new WP_Query($pics);
					$nop = $query->post_count; ?>
    <div id="anaDonence" class="carousel slide" data-ride="carousel">
     <ol class="carousel-indicators">
			 <?php
			 for ($i=0; $i < $nop; $i++) {
			 	echo '<li data-target="#anaDonence" data-slide-to="'.$i.'"';
				echo ($i==0) ? ' class="active"' : '';
				echo '></li>';
			}; ?>
     </ol>
      <div class="carousel-inner">
				<?php $lop = 0;
				while ( $query->have_posts() ) : $query->the_post(); $lop++;
							$class = ($lop == 1) ? 'class="carousel-item active"' : 'class="carousel-item"';
							echo '<div '.$class.'>';
							echo the_post_thumbnail();
							echo '<div class="container">
              	<div class="carousel-caption"><a href="' . get_permalink() . '">
                	<h1>'.the_title().'</h1>
                	<p>'.the_excerpt().'</p></a>
              	</div>
            	</div>
          	</div>';
				endwhile;	?>
      </div>
      <a class="carousel-control-prev" href="#anaDonence" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Önceki</span>
      </a>
      <a class="carousel-control-next" href="#anaDonence" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Sonraki</span>
      </a>
    </div>




		<?php
		if ( have_posts() ) :

			if ( is_home() && ! is_front_page() ) :
				?>
				<header>
					<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
				</header>
				<?php
			endif;

			/* Start the Loop */
			while ( have_posts() ) :
				the_post();

				/*
				 * Include the Post-Type-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
				 */
				get_template_part( 'template-parts/content', get_post_type() );

			endwhile;

			the_posts_navigation();

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif;
		?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
