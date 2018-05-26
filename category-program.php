<?php get_header(); ?>
<main id="main" role="main" class="container">
	<div class="row">
		 <div class="col-md-9 blog-main">
			 <?php
			    // the query
			    $the_query = new WP_Query( array(
			      'category_name' => 'program',
			      'posts_per_page' => 3,
			    ));
			 ?>

			 <?php if ( $the_query->have_posts() ) : ?>
			   <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>

			     <?php the_title(); ?>
			     <?php the_content(); ?>

			   <?php endwhile; ?>
			   <?php wp_reset_postdata(); ?>

			 <?php else : ?>
			   <p><?php __('No News'); ?></p>
			 <?php endif; ?>

			 <ul>
<?php

global $post;
$args = array( 'offset'=> 1, 'category' => 2 );

$myposts = get_posts( $args );
foreach ( $myposts as $post ) : setup_postdata( $post ); ?>
	<li>
		<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
	</li>
<?php endforeach;
wp_reset_postdata();?>

</ul>
		</div>

<?php
get_sidebar();
get_footer();
