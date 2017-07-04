<?php
	$args = array (
		'connected_type' => 'pdf_to_concert',
		'connected_items' => $post,
		'nopaging' => true,
	);
	$sunday_pdf = new WP_Query( $args );
	if ($sunday_pdf->have_posts()) : while ($sunday_pdf->have_posts()) : $sunday_pdf->the_post();
?>
	<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" class="button"><?php the_title(); ?></a>

<?php endwhile; ?>

<?php
	endif;
	wp_reset_postdata();
?>
<?php
// Find connected pages
$connected = new WP_Query( array(
  'connected_type' => 'pdf_to_concert',
  'connected_items' => get_queried_object(),
  'nopaging' => true,
) );

// Display connected pages
if ( $connected->have_posts() ) :
?>
<h3>Related pages:</h3>
<ul>
<?php while ( $connected->have_posts() ) : $connected->the_post(); ?>
    <li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
<?php endwhile; ?>
</ul>

<?php
// Prevent weirdness
wp_reset_postdata();

endif;
?>