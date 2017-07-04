<?php
	/**
	* Template Name: Full Width Page
	*/
	get_header();
?>

	<div class="row">

		<div class="small-12 large-12 columns main justify">

			<h2 class="page-title" data-id="<?php echo $page_id; ?>" id="topofpage"><?php the_title(); ?></h2>

			<?php
				if( is_page( array( 'Main Hall Room Planner', 'Foyer Room Planner', 'Bertrand Russell Room Planner', 'Brockway Room Planner', 'Artists Room Planner', 'Club Room Planner', 'Balcony Room Planner' ) ) ) {
					get_template_part('parts/planit/room', 'planner');
				}
				if( is_page( array( 'Main Hall 360 Degree Tour', 'Foyer 360 Degree Tour', 'Bertrand Russell Room 360 Degree Tour', 'Brockway Room 360 Degree Tour', 'Artists Room 360 Degree Tour', 'Club Room 360 Degree Tour', 'Balcony 360 Degree Tour', 'Library 360 Degree Tour', 'Foyer (Open Doors) 360 Degree Tour' ) ) ) {
					get_template_part('parts/planit/pano', 'tour');
				}
			?>

			<?php
				$custom_taxterms = wp_get_object_terms( $post->ID, 'page_tag', array('fields' => 'ids') );
				$args = array(
					'post_type' => 'page',
					'post_status' => 'publish',
					'posts_per_page' => 3,
					'orderby' => 'rand',
					'tax_query' => array(
						array(
							'taxonomy' => 'page_tag',
							'field' => 'id',
							'terms' => $custom_taxterms
						)
					),
					'post__not_in' => array ($post->ID),
				);
				$related_items = new WP_Query( $args );
				if ($related_items->have_posts()) :
				echo '<div class="row endrelated"><div class="small-12 large-12 columns center related"><h3>Other pages to consider</h3></div>';
				while ( $related_items->have_posts() ) : $related_items->the_post();
				?>
					<div class="small-12 large-4 columns">
						<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_post_thumbnail( ); ?></a>
						<h5><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h5>
						<?php the_excerpt(); ?>
					</div>
				<?php
				endwhile;
				echo '</div>';
				endif;
				wp_reset_postdata();
			?>

		</div>

	</div>

<?php get_footer(); ?>