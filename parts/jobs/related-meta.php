<?php
	$args = array (
		'connected_type' => 'pdf_to_job',
		'connected_items' => get_queried_object(),
		'nopaging' => true,
	);
	$lecture_speaker = new WP_Query( $args );
	$the_count = $lecture_speaker->found_posts;
	if ( $lecture_speaker->have_posts() ) {
?>
		<div class="metaData">
			<a href="#bio" class="button"><i class="ch-chevron-down" aria-hidden="true"></i> More Info</a>
		</div>
	<?php
		} else {
			// no posts found
		}
		wp_reset_postdata();
	?>