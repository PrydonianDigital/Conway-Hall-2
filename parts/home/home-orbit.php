<div class="orbit show-for-medium" role="region" aria-label="Conway Hall Homepage" data-orbit>
<?php
	$args = array (
		'post_type'			=> 'carousel',
		'posts_per_page_'	=> '10',
		'orderby'			=> 'menu_order'
	);
	$carousel = new WP_Query( $args );
	if( $carousel->have_posts() ) :
?>
	<ul class="orbit-container">
		<button class="orbit-previous"><span class="show-for-sr">Previous Slide</span>&#9664;&#xFE0E;</button>
		<button class="orbit-next"><span class="show-for-sr">Next Slide</span>&#9654;&#xFE0E;</button>
<?php
	while ( $carousel->have_posts() ) : $carousel->the_post();
?>
		<li class="orbit-slide" data-slide="<?php echo get_post_field( 'menu_order', $post_id); ?>">
			<a href="<?php global $post; $text = get_post_meta( $post->ID, '_cmb_url', true ); echo $text; ?>"><?php the_post_thumbnail( 'carousel' ); ?></a>
			<figcaption class="orbit-caption">
				<a href="<?php global $post; $text = get_post_meta( $post->ID, '_cmb_url', true ); echo $text; ?>">
					<h4><?php the_title(); ?></h4>
					<?php the_excerpt(); ?>
				</a>
			</figcaption>
		</li>
<?php
	endwhile;
?>
	</ul>
</div>
<?php
	endif;
	wp_reset_postdata();
?>