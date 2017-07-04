<?php global $post; $date2 = get_post_meta( $post->ID, '_cmb_lecdate2', true ); if( $date2 != '' ) :  ?>
	<h6>Lecture date: <?php echo date_i18n('D, jS M, Y', $date2);  ?></h6>
<?php else : ?>
	<?php global $post; $date = get_post_meta( $post->ID, '_cmb_lecdate', true ); if( $date != '' ) :  ?>
		<h6>Lecture date: <?php echo date('D, jS M, Y', strtotime($date));  ?></h6>
	<?php endif; ?>
<?php endif; ?>