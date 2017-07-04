			<?php
    			$args = array (
    				'connected_type' => 'issue2post',
    				'connected_items' => $post,
    				'nopaging' => true,
    			);
    			$issue = new WP_Query( $args );
    			if ( $issue->have_posts() ) : while ( $issue->have_posts() ) : $issue->the_post();
    		?>
			<div class="row">
				<div <?php post_class('small-12 large-12 columns'); ?>>
					<?php if( has_tag() ) { ?>
					    <p><i class="ch-tag" aria-hidden="true"></i><?php the_tags('', ', ', ''); ?></p>
					<?php } else { ?>

					<?php } ?>
					<h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
					<?php get_template_part('parts/ethicalrecord/ethical', 'record'); ?>
				</div>
			</div>
    		<?php
    			endwhile;
    			endif;

    			wp_reset_postdata();
    		?>