<?php if( has_tag() ) { ?>
	<h6>Tagged</h6>
	<p><i class="ch-tag" aria-hidden="true"></i> <?php the_tags('', ', ', ''); ?></p>
<?php } else { ?>

<?php } ?>

<?php
$terms = get_the_terms( $post->ID, 'taxonomy' );
if ( $terms && ! is_wp_error( $terms ) ) :
	$taxonomy_links = array();
	foreach ( $terms as $term ) {
		$taxonomy_links[] = '<a href="/ethicalrecord/taxonomy/'.$term->slug.'">'.$term->name.'</a>';
	}
	$taxonomy = join( ", ", $taxonomy_links );
?>
<p class="taxonomy">
	<i class="ch-map-signs" aria-hidden="true"></i> <?php echo $taxonomy; ?>
</p>
<?php endif; ?>