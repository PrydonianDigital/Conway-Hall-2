<?php
	$args = array (
		'connected_type' => 'pdf_to_event',
		'connected_items' => $post,
		'nopaging' => true,
	);
	$sunday_pdf = new WP_Query( $args );
	if ($sunday_pdf->have_posts()) : while ($sunday_pdf->have_posts()) : $sunday_pdf->the_post();
?>
	<a href="<?php global $post; $text = get_post_meta( $post->ID, '_cmb_pdf', true ); echo $text; ?>" title="<?php the_title_attribute(); ?>" class="button"><i class="ch-download"></i> Download <br /><?php the_title(); ?></a><br />

<?php
	endwhile;
	endif;
	wp_reset_postdata();
?>