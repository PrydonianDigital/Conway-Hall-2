<?php
	$args = array (
		'post_type'				=> array( 'project' ),
		'posts_per_page'		=> -1,
		'orderby'				=> 'menu_order',
		'order'					=> 'ASC',
		'meta_query'			=> array(
			 'start_date'		=> array(
				 array(
					 'key'		=> '_project_enddate',
					 'value'	=> current_time('timestamp'),
					 'type'		=> 'numeric',
					 'compare'	=> '<'
				)
			)
		),
	);
	$projects = new WP_Query( $args );

	if ( $projects->have_posts() ) : while ( $projects->have_posts() ) : $projects->the_post();
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
	endif;
	wp_reset_query();
?>