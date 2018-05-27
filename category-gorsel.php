<?php get_header(); ?>
<main id="main" role="main" class="container">
	<div class="row">
		 <div class="col-md-9 blog-main p-4">
			 <?php
			    $the_query = new WP_Query( array(
			      'category_name' => 'gorsel',
			    ));
        if ( $the_query->have_posts() ) :
			    while ( $the_query->have_posts() ) : $the_query->the_post();
					echo '<a href="'. get_permalink() .'"><div>';
					the_title( '<h4 class="etkinlik d-inline-block">', '</h4>' );
						 $post_tags = get_the_tags();
						 if ($post_tags) {
						   foreach($post_tags as $tag) {
								 echo ' <span class="badge badge-secondary align-top">'.$tag->name.'</span>';
						   }
						 }
						 echo '</div></a>';
				endwhile;
			  endif; ?>
			 <ul>
		</div>

<?php
get_sidebar();
get_footer();
