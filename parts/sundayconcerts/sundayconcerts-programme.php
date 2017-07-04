<h3 class="center">Upcoming Events</h3>
	<?php
		$args = array (
			'post_type' => 'tribe_events',
			'posts_per_page' => '5',
			'tax_query' => array(
				array(
					'taxonomy' => 'tribe_events_cat',
					'field' => 'slug',
					'terms' => array('sunday-concerts'),
				)
			)
		);
		$event_posts = new WP_Query( $args );
		if ( $event_posts->have_posts() ) :	while ( $event_posts->have_posts() ) :	$event_posts->the_post();
	?>
			<div <?php post_class('row listing'); ?> itemscope itemtype="http://schema.org/Event">
				<div class="small-12 large-12 columns ">

					<div class="postdata">

						<h6 class="tribe-events-single-section-title"><?php echo tribe_get_organizer() ?> presents: </h6>

						<h3 itemprop="name" class="page-title"><a href="<?php the_permalink(); ?>" rel="permalink" itemprop="url" title="Permalink to <?php the_title(); ?>"><?php echo the_title(); ?></a></h3>

						<a href="https://plus.google.com/+ConwayhallOrgUk1929" rel="publisher"></a>
						<h6><?php echo tribe_events_event_schedule_details(); ?></h6>

						<?php if ( tribe_get_cost() ) : ?>
							<div class="tribe-events-event-cost">
								<span><?php echo tribe_get_cost( null, true ); ?></span>
							</div>
						<?php endif; ?>
						<?php global $post; $free = get_post_meta( $post->ID, '_cmb_free', true ); if( $free == 'on' ) : ?>
							<div class="tribe-events-event-cost">
								<span>Free</span>
							</div>
						<?php endif; ?>
						<?php global $post; $tix = get_post_meta( $post->ID, '_cmb_tickets', true ); if( $tix != '' ) :  ?>
							<div class="tribe-events-event-cost">
								<span>
									<?php global $post; $tix = get_post_meta( $post->ID, '_cmb_tickets', true ); echo $tix;  ?>
								</span>
							</div>
						<?php endif; ?>

						<meta itemprop="url" content="<?php the_permalink(); ?>">
						<meta itemprop="description" content="<?php echo(get_the_excerpt()); ?>">
						<meta itemprop="startDate" content="<?php echo tribe_get_start_date( $post->ID, false, 'c' ); ?>">
						<meta itemprop="endDate" content="<?php echo tribe_get_end_date( $post->ID, false, 'c' ); ?>">
						<span class="updated dtstart" datetime="<?php the_date( 'c' ); ?>"><?php the_time('D, jS M, Y'); ?></span>
					</div>
					<div class="row">
						<?php if(has_post_thumbnail()) { ?>
						<div class="small-12 large-4 columns">
							<a href="<?php the_permalink(); ?>" rel="permalink" title="Permalink to <?php the_title(); ?>" class="th"><?php the_post_thumbnail('related'); ?></a>
						</div>
						<div class="small-12 large-8 columns entry-content description summary" itemprop="description">
						<?php } else { ?>
						<div class="small-12 large-12 columns entry-content description summary" itemprop="description">
						<?php } ?>
							<?php the_excerpt(); ?>
							<?php if(get_post_meta( get_the_ID(), '_sundayconcert_description', true ) != ''){ ?>
								<div class="callout secondary">
									<?php echo wpautop(get_post_meta( get_the_ID(), '_sundayconcert_description', true )); ?>
								</div>
							<?php } ?>
							<p><a href="<?php the_permalink(); ?>" class="button"><i class="ch-calendar" aria-hidden="true"></i> View "<?php the_title(); ?>"</a></p>
							<span itemprop="location" itemscope itemtype="http://schema.org/Place" class="location vcard">
							<meta itemprop="name" content="Conway Hall" />
								<span itemprop="address" itemscope itemtype="http://schema.org/PostalAddress" class="adr">
									<meta itemprop="streetAddress" content="25 Red Lion Square" class="locality" />
									<meta itemprop="addressLocality" content="London" />
									<meta itemprop="postalCode" content="WC1R 4RL" />
								</span>
							</span>
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
						</div>
					</div>
				</div>
			</div>

	<?php
		endwhile;
		endif;
	?>
	<div class="row">
		<div class="small-12 columns">
			<p><a href="<?php echo tribe_get_events_link() ?>" class="button"><?php _e( '<i aria-hidden="true" class="ch-calendar"></i> All Events', 'tribe-events-calendar' ) ?></a></p>
		</div>
	</div>