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
								echo '<img src="'.get_the_post_thumbnail_url().'">';
								echo '<div class="container">
	              	<div class="carousel-caption">
	                	<a href="' . get_permalink() . '"><h1>';
										the_title();
										echo '</h1></a>
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

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
	get_footer();