<div class="row description">

	<div class="postdata small-12 large-6 columns">
		<?php global $post; $date2 = get_post_meta( $post->ID, '_cmb_lecdate2', true ); if( $date2 != '' ) :  ?>
			<h6>Lecture date: <?php echo date_i18n('D, jS M, Y', $date2);  ?></h6>
		<?php else : ?>
			<?php global $post; $date = get_post_meta( $post->ID, '_cmb_lecdate', true ); if( $date != '' ) :  ?>
				<h6>Lecture date: <?php echo date('D, jS M, Y', strtotime($date));  ?></h6>
			<?php endif; ?>
		<?php endif; ?>

		<h6>Posted on: <time datetime="Publish Date"><?php the_time( 'D, jS M, Y' ); ?></time></h6>

		<?php if(get_post_type( get_the_ID() ) == 'ethicalrecord') { ?>
			<h6><?php echo ch_reading(); ?></h6>
		<?php } ?>

		<?php global $post; $author = get_post_meta( $post->ID, '_cmb_author', true ); if( $author != '' ) :  ?>
			<p>By: <strong><?php global $post; $publisher = get_post_meta( $post->ID, '_cmb_author', true ); echo $publisher;  ?></strong>
			<?php global $post; $author = get_post_meta( $post->ID, '_cmb_publisher', true ); if( $author != '' ) :  ?>
				(<?php global $post; $publisher = get_post_meta( $post->ID, '_cmb_publisher', true ); echo $publisher;  ?>)
			<?php endif; ?>
			</p>
			<?php global $post; $reviewer = get_post_meta( $post->ID, '_cmb_vpauthor', true ); if( $reviewer != '' ) :  ?>
				<p>Review by: <?php global $post; $reviewer = get_post_meta( $post->ID, '_cmb_vpauthor', true ); echo $reviewer;  ?></p>
			<?php endif; ?>
		<?php endif; ?>
	</div>

	<div class="postdata small-12 large-6 columns">
		<?php if(is_singular('ethicalrecord')) { ?>
		<?php get_template_part('parts/ethicalrecord/related', 'meta'); ?>
		<?php } ?>
	</div>

</div>