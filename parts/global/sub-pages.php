<?php
	$args = array(
		'post_type'	  => 'page',
		'posts_per_page' => -1,
		'post_parent'	=> get_the_ID(),
		'order'		  => 'ASC',
		'orderby'		=> 'menu_order'
	 );
	$hire = new WP_Query( $args );

	if ( $hire->have_posts() ) : while ( $hire->have_posts() ) : $hire->the_post();
?>
	<div <?php post_class('row listing'); ?>>
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
	endif;
	wp_reset_query();
?>