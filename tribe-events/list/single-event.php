<?php
/**
 * List View Single Event
 * This file contains one event in the list view
 *
 * Override this template in your own theme by creating a file at [your-theme]/tribe-events/list/single-event.php
 *
 * @package TribeEventsCalendar
 *
 */
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

// Setup an array of venue details for use later in the template
$venue_details = tribe_get_venue_details();

// Venue microformats
$has_venue_address = ( ! empty( $venue_details['address'] ) ) ? ' location' : '';

// Organizer
$organizer = tribe_get_organizer();
$website = tribe_get_event_website_url();
$price = get_post_meta( get_the_ID(), '_cmb_tickets', true );
$free = get_post_meta( get_the_ID(), '_cmb_free', true );
?>
<div class="small-12 columns">

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

	<!-- Event Title -->
	<div class="postdata">
		<?php do_action( 'tribe_events_before_the_event_title' ) ?>
		<h5 class="tribe-events-single-section-title aligncenter"><?php echo tribe_get_organizer() ?> presents: </h5>
		<h3 class="entry-title summary">
			<a class="url" href="<?php echo esc_url( tribe_get_event_link() ); ?>" title="<?php the_title_attribute() ?>" rel="bookmark">
				<?php the_title() ?>
			</a>
		</h3>
		<?php do_action( 'tribe_events_after_the_event_title' ) ?>
		<!-- Event Meta -->
		<?php do_action( 'tribe_events_before_the_meta' ) ?>
		<div class="tribe-events-event-meta vcard">
			<div class="author <?php echo esc_attr( $has_venue_address ); ?>">

				<!-- Schedule & Recurrence Details -->
				<div class="updated published time-details">
					<?php echo tribe_events_event_schedule_details() ?>
				</div>

				<?php if ( $venue_details ) : ?>
					<!-- Venue Display Info -->
					<div class="tribe-events-venue-details">
						<?php echo implode( ', ', $venue_details ); ?>
					</div> <!-- .tribe-events-venue-details -->
				<?php endif; ?>

			</div>
		</div><!-- .tribe-events-event-meta -->
		<?php do_action( 'tribe_events_after_the_meta' ) ?>
	</div>
</div>


	<div class="small-12 large-4 columns">
		<!-- Event Image -->
		<?php echo tribe_event_featured_image( null, 'medium' ) ?>
	</div>

	<div class="small-12 large-8 columns">
		<!-- Event Content -->
		<?php do_action( 'tribe_events_before_the_content' ) ?>
		<div class="tribe-events-list-event-description tribe-events-content description entry-summary">
			<?php the_excerpt() ?>
			<?php if(get_post_meta( get_the_ID(), '_sundayconcert_description', true ) != ''){ ?>
				<div class="alert callout">
					<?php echo wpautop(get_post_meta( get_the_ID(), '_sundayconcert_description', true )); ?>
				</div>
			<?php } ?>
			<p>
				<a href="<?php the_permalink(); ?>" class="button"><i class="ch-calendar" aria-hidden="true"></i> View <?php the_title(); ?></a>
				<?php if ( ! empty( $website ) ) : ?>
					<a href="<?php echo $website; ?>" class="tribe-events-button">BOOK NOW</a>
				<?php endif ?>
			</p>
			<div class="callout secondary">
				<div class="row">
					<div class="small-12 large-6 columns eventCategory">
						<?php echo tribe_get_event_categories(); ?>
					</div>
					<div class="small-12 large-6 columns">
						<div>Organiser:</div>
						<ul class="tribe-event-categories">
							<li><span class="vcard author"><span class="fn"><?php echo tribe_get_organizer_link() ?></span></span></li>
						</ul>
					</div>
				</div>
			</div>
			<?php if ( tribe_get_cost() ) : ?>
			<div class="tribe-events-event-cost">
				<span><?php echo tribe_get_cost( null, true ); ?></span>
			</div>
			<?php endif; ?>
		</div><!-- .tribe-events-list-event-description -->
	</div>

<?php
do_action( 'tribe_events_after_the_content' );
