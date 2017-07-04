<?php
/**
 * Related Events Template
 * The template for displaying related events on the single event page.
 *
 * You can recreate an ENTIRELY new related events view by doing a template override, and placing
 * a related-events.php file in a tribe-events/pro/ directory within your theme directory, which
 * will override the /views/related-events.php.
 *
 * You can use any or all filters included in this file or create your own filters in
 * your functions.php. In order to modify or extend a single filter, please see our
 * readme on templates hooks and filters
 *
 * @package TribeEventsCalendarPro
 *
 */

if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

$posts = tribe_get_related_posts();

if ( is_array( $posts ) && ! empty( $posts ) ) : ?>
<div class="row endrelated" id="bio">
	<div class="small-12 large-12 columns center related">
		<h3><?php printf( __( 'Related %s', 'tribe-events-calendar-pro' ), tribe_get_event_label_plural() ); ?></h3>
	</div>
	<?php foreach ( $posts as $post ) : ?>
		<div class="small-12 medium-4 large-4 columns">
			<div class="card">
				<div class="card-divider">
					<h5><a href="<?php echo tribe_get_event_link( $post ); ?>" class="url" rel="bookmark"><?php echo get_the_title( $post->ID ); ?></a></h5>
					<?php
					if ( $post->post_type == Tribe__Events__Main::POSTTYPE ) {
						echo tribe_events_event_schedule_details( $post );
					}
					?>
				</div>
				<?php $thumb = ( has_post_thumbnail( $post->ID ) ) ? get_the_post_thumbnail( $post->ID, 'large' ) : '<img src="' . esc_url( trailingslashit( Tribe__Events__Pro__Main::instance()->pluginUrl ) . 'src/resources/images/tribe-related-events-placeholder.png' ) . '" alt="' . esc_attr( get_the_title( $post->ID ) ) . '" />'; ?>
				<a href="<?php echo esc_url( tribe_get_event_link( $post ) ); ?>" class="url" rel="bookmark"><?php echo $thumb ?></a>
				<div class="card-section">
					<?php the_excerpt(); ?>
				</div>
			</div>
		</div>
	<?php endforeach; ?>
</div>
<?php
endif;

