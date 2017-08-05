<?php
	$args = array (
		'connected_type' => 'pdf_to_page',
		'connected_items' => get_queried_object(),
		'nopaging' => true,
	);
	$lecture_speaker = new WP_Query( $args );
	$the_count = $lecture_speaker->found_posts;
	if ( $lecture_speaker->have_posts() ) {
?>
<div class="row endrelated2" id="bio">
	<div class="small-12 large-12 columns center related">
		<h3>Related Document<?php if ( ( $lecture_speaker->have_posts() ) && ( $the_count > 1 ) ) : ?>s<?php endif; ?></h3>
	</div>
	<?php
			while ( $lecture_speaker->have_posts() ) {
				$lecture_speaker->the_post();
	?>
		<div class="small-12 medium-4 large-4 columns">
			<div class="card">
				<div class="card-divider">
					<h5><a href="<?php global $post; $text = get_post_meta( $post->ID, '_cmb_pdf', true ); echo $text; ?>" title="<?php the_title_attribute(); ?>" target="_blank"><?php the_title(); ?></a></h5>
				</div>
				<a href="<?php global $post; $text = get_post_meta( $post->ID, '_cmb_pdf', true ); echo $text; ?>" title="<?php the_title_attribute(); ?>" target="_blank"><?php the_post_thumbnail('related'); ?></a>
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