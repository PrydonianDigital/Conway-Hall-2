<?php global $post; $issue = get_post_meta( $post->ID, '_cmb_issue', true ); if( $issue != '' ) :  ?>
	<p><a href="<?php global $post; $issue = get_post_meta( $post->ID, '_cmb_issue', true ); echo $issue;  ?>" class="button"><i class="ch-download" aria-hidden="true"></i> Download PDF version of <?php the_title(); ?></a></p>
<?php else: ?>
	<p><a href="<?php the_permalink(); ?>" class="button"><i class="ch-book" aria-hidden="true"></i> Read "<?php the_title(); ?>"</a></p>
<?php endif; ?>