<?php
	$args = array (
		'connected_type' => 'issue2post',
		'connected_items' => get_queried_object(),
		'nopaging' => true,
	);
	$lecture_speaker = new WP_Query( $args );
	$the_count = $lecture_speaker->found_posts;
	if ( $lecture_speaker->have_posts() ) {
?>
<div class="row endrelated" id="bio">
	<div class="small-12 large-12 columns center related2">
		<h3>Related Ethical Record<?php if ( ( $lecture_speaker->have_posts() ) && ( $the_count > 1 ) ) : ?>(s)<?php endif; ?></h3>
	</div>
	<?php
			while ( $lecture_speaker->have_posts() ) {
				$lecture_speaker->the_post();
	?>
		<div class="small-12 medium-4 large-4 columns">
			<div class="card">
				<div class="card-divider">
					<h5><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h5>
				</div>
				<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_post_thumbnail('related'); ?></a>
			</div>
		</div>

	<?php
			}
	?>
</div>
	<?php
		} else {
			// no posts found
		}
		wp_reset_postdata();
	?>