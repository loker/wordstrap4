<?php get_header(); ?>
<main id="main" role="main" class="container">
	<div class="row">
		 <div class="col-md-9 blog-main">
			 <?php
			    // the query
			    $the_query = new WP_Query( array(
			      'category_name' => 'program',
			      'posts_per_page' => 1,
			    ));
			 ?>

			 <?php if ( $the_query->have_posts() ) :
			    while ( $the_query->have_posts() ) : $the_query->the_post();

				 get_template_part( 'template-parts/content', get_post_type() );

				endwhile;
			  endif; ?>
			 <ul>
<?php

$args = array( 'offset'=> 1, 'category' => 2 );

$the_query = get_posts( $args );
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
