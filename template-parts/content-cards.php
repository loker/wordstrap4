<article id="post-<?php the_ID(); ?>">
<div class="card">
	<div class="card-header">
		<a href="<?php echo get_permalink(); ?>">
		<?php the_title( '<h5 class="card-title">', '</h5>' ); ?>
	<small class="text-muted"><?php echo get_the_date('j.n.Y'); ?></small></div>
	<?php the_post_thumbnail('medium', array('class' => 'img-fluid card-image-top')); ?></a>
	<div class="card-body">
		<p class="card-text"><?php echo get_the_excerpt(); ?></p>
	</div>
</div>
</article><!-- #post-<?php the_ID(); ?> -->
