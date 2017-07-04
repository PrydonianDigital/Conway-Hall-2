<?php
/**
 * Single Event Template
 * A single event. This displays the event title, description, meta, and
 * optionally, the Google map for the event.
 *
 * Override this template in your own theme by creating a file at [your-theme]/tribe-events/single-event.php
 *
 * @package TribeEventsCalendar
 *
 */

if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

$events_label_singular = tribe_get_event_label_singular();
$events_label_plural = tribe_get_event_label_plural();

$event_id = get_the_ID();
$website = tribe_get_event_website_url();
$price = get_post_meta( get_the_ID(), '_cmb_tickets', true );
$free = get_post_meta( get_the_ID(), '_cmb_free', true );
?>

<div id="tribe-events-content" class="tribe-events-single vevent hentry">

	<p class="tribe-events-back">
		<a href="<?php echo esc_url( tribe_get_events_link() ); ?>" class="button"> <?php printf( __( '<i aria-hidden="true" class="ch-calendar"></i> All %s', 'the-events-calendar' ), $events_label_plural ); ?></a>
	</p>

	<!-- Notices -->
	<?php tribe_events_the_notices() ?>

	<div class="postdata">

		<?php echo tribe_event_featured_image( $event_id, 'top', false ); ?>
		<!-- Event Cost -->
		<?php if ( $free === 'on' ) : ?>
			<div class="tribe-events-event-cost">
				<span>Free</span>
			</div>
		<?php endif; ?>
		<?php if ( $price != '' ) : ?>
			<div class="tribe-events-event-cost">
				<span><?php echo $price; ?></span>
			</div>
		<?php endif; ?>
		<h5 class="tribe-events-single-section-title aligncenter"><?php echo tribe_get_organizer() ?> presents: </h5>

		<?php the_title( '<h3 class="entry-title">', '</h3>' ); ?>

		<h5><?php echo tribe_events_event_schedule_details() ?></h5>

		<div class="tribe-events-schedule updated published tribe-clearfix">
			<?php echo tribe_events_event_schedule_details( $event_id, '<h5>', '</h5>' ); ?>
		</div>

	</div>

	<!-- Event header -->
	<div id="tribe-events-header" <?php tribe_events_the_header_attributes() ?>>
		<!-- Navigation -->
		<h3 class="tribe-events-visuallyhidden"><?php printf( __( '%s Navigation', 'the-events-calendar' ), $events_label_singular ); ?></h3>
	</div>
	<!-- #tribe-events-header -->

	<?php while ( have_posts() ) :  the_post(); ?>
		<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<!-- Event content -->
			<?php do_action( 'tribe_events_single_event_before_the_content' ) ?>
			<div class="tribe-events-single-event-description tribe-events-content entry-content description">
				<?php if ( ! empty( $website ) ) : ?>
					<p><a href="<?php echo $website; ?>" class="tribe-events-button">BOOK NOW</a></p>
				<?php endif ?>
				<?php the_content(); ?>
				<?php if(get_post_meta( get_the_ID(), '_sundayconcert_description', true ) != ''){ ?>
					<div class="alert callout">
						<?php echo wpautop(get_post_meta( get_the_ID(), '_sundayconcert_description', true )); ?>
					</div>
				<?php } ?>
				<?php get_template_part('parts/sundayconcerts/related', 'pdf'); ?>
				<?php if ( ! empty( $website ) ) : ?>
					<a href="<?php echo $website; ?>" class="tribe-events-button">BOOK NOW</a>
				<?php endif ?>
			</div>
			<!-- .tribe-events-single-event-description -->
			<?php do_action( 'tribe_events_single_event_after_the_content' ) ?>

			<!-- Event meta -->
			<?php do_action( 'tribe_events_single_event_before_the_meta' ) ?>
			<?php tribe_get_template_part( 'modules/meta' ); ?>
			<?php do_action( 'tribe_events_single_event_after_the_meta' ) ?>
		</div> <!-- #post-x -->
		<?php if ( get_post_type() == Tribe__Events__Main::POSTTYPE && tribe_get_option( 'showComments', false ) ) comments_template() ?>
	<?php endwhile; ?>

	<!-- Event footer -->
	<div id="tribe-events-footer">
		<!-- Navigation -->
		<h3 class="tribe-events-visuallyhidden"><?php printf( __( '%s Navigation', 'the-events-calendar' ), $events_label_singular ); ?></h3>
		<ul class="tribe-events-sub-nav">
			<li class="tribe-events-nav-previous"><?php tribe_the_prev_event_link( '<span>&laquo;</span> %title%' ) ?></li>
			<li class="tribe-events-nav-next"><?php tribe_the_next_event_link( '%title% <span>&raquo;</span>' ) ?></li>
		</ul>
		<!-- .tribe-events-sub-nav -->
	</div>
	<!-- #tribe-events-footer -->

</div><!-- #tribe-events-content -->
