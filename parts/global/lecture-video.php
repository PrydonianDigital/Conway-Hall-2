<?php global $post; $video = get_post_meta( $post->ID, '_cmb_lecture_video', true ); if( $video != '' ) :  ?>
	<?php echo apply_filters( 'the_content', get_post_meta( get_the_ID(), $prefix . '_cmb_video', true ) );  ?>
<?php endif; ?>