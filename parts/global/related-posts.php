<?php
	$type = get_post_type();
	$custom_taxterms = wp_get_object_terms(	$post->ID, 'post_tag', array('fields' => 'ids') );
	$args = array(
		'post_type' => $type,
		'post_status' => 'publish',
		'posts_per_page' => 3,
		'orderby' => 'rand',
		'tax_query' => array(
			array(
				'taxonomy' => 'post_tag',
				'field' => 'id',
				'terms' => $custom_taxterms
			)
		),
		'post__not_in' => array ($post->ID),
	);
	$related_items = new WP_Query( $args );
	if ($related_items->have_posts()) :
	if($type === 'ethicalrecord') {
		$type = 'Ethical Record';
	}
	if($type === 'memorial_lecture') {
		$type = 'Conway Memorial Lecture';
	}
	if($type === 'amazon_product') {
		$type = 'Amazon Product';
	}
	if($type === 'sunday_concerts') {
		$type = 'Sunday Concert';
	}
	if($type === 'library_blog') {
		$type = 'Library Blog';
	}
	echo '<div class="row endrelated"><div class="small-12 large-12 columns center related"><h3>Other <span>' . $type . 's</span> to consider</h3></div>';
	while ( $related_items->have_posts() ) : $related_items->the_post();
	?>
		<div class="small-12 medium-4 large-4 columns">
			<div class="card">
				<div class="card-divider">
					<h5><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h5>
				</div>
				<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_post_thumbnail('related'); ?></a>
				<div class="card-section">
					<?php the_excerpt(); ?>
				</div>
			</div>
		</div>
	<?php
	endwhile;
	echo '</div>';
	endif;
	wp_reset_postdata();
?>
