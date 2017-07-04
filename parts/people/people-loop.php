<?php
// WP_Query arguments
$args = array (
	'post_type' => 'people',
	'order' => 'ASC',
	'orderby' => 'menu_order',
);
// The Query
$room_hire = new WP_Query( $args );
// The Loop
if ( $room_hire->have_posts() ) {
	while ( $room_hire->have_posts() ) {
		$room_hire->the_post();
?>
	<div <?php post_class('row listing'); ?>>
		<div class="small-12 columns">
			<h4 itemprop="name"><a href="<?php the_permalink(); ?>" rel="permalink" title="Permalink to <?php the_title(); ?>"><?php echo the_title(); ?></a></h4>
			<h5><?php global $post; $text = get_post_meta( $post->ID, '_cmb_title', true ); echo $text; ?></h5>
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
			<p><a href="<?php the_permalink(); ?>" class="button"><i class="ch-user" aria-hidden="true"></i> View <?php the_title(); ?></a></p>
		</div>
	</div>
<?php
	}
} else {
	// no posts found
}
// Restore original Post Data
wp_reset_postdata();
?>