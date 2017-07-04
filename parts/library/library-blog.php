<?php
	$args = array(
		'post_type'	  => 'library_blog',
	 );
	$library = new WP_Query( $args );

	if ( $library->have_posts() ) : while ( $library->have_posts() ) : $library->the_post();
?>
	<div <?php post_class('row sticky'); ?>>
		<div class="small-12 columns">
			<h4 itemprop="name"><a href="<?php the_permalink(); ?>" rel="permalink" title="Permalink to <?php the_title(); ?>"><?php echo the_title(); ?></a></h4>
		</div>
		<?php if(has_post_thumbnail()) { ?>
		<div class="small-12 large-4 columns">
			<a href="<?php the_permalink(); ?>" rel="permalink" title="Permalink to <?php the_title(); ?>" class="th"><?php the_post_thumbnail('related'); ?></a>
		</div>
		<div class="small-12 large-8 columns entry-content description summary" itemprop="description">
		<?php } else { ?>
		<div class="small-12 large-12 columns entry-content description summary" itemprop="description">
		<?php } ?>
			<?php the_excerpt(); ?>
			<p><a href="<?php the_permalink(); ?>" class="button"><i class="ch-book" aria-hidden="true"></i> View <?php the_title(); ?></a></p>
		</div>
	</div>

<?php
	endwhile;
?>
	<div class="row">
		<div class="small-12 columns">
			<a href="/library/what-do-you-do-with-a-phd-in-music/library_blog/" class="button"><i class="ch-library2" aria-hidden="true"></i> See more Library Blog posts</a>
		</div>
	</div>
<?php
	endif;
	wp_reset_query();
?>