
		<?php
		$args = array (
			'post_type'				=> array( 'jobs' ),
			'posts_per_page'		=> -1,
			'orderby'				=> 'menu_order',
			'order'					=> 'ASC',
		);
		$project_current = new WP_Query( $args );
		?>

		<?php if ($project_current->have_posts()) : while ($project_current->have_posts()) : $project_current->the_post(); ?>

		<?php
			date_default_timezone_set('Europe/London');
			$start = get_post_meta( get_the_ID(), '_project_startdate', true );
			$end = get_post_meta( get_the_ID(), '_project_enddate', true );
			$ongoing = get_post_meta( get_the_ID(), '_project_ongoing', true );
			$lead = get_post_meta( get_the_ID(), '_project_lead', true );
		?>

			<div <?php post_class('row listing'); ?>>
				<div class="small-12 columns">
					<h4 itemprop="name"><a href="<?php the_permalink(); ?>" rel="permalink" title="Permalink to <?php the_title(); ?>"><?php echo the_title(); ?></a></h4>
				</div>
				<?php if(has_post_thumbnail()) { ?>
				<div class="small-12 large-4 columns">
					<a href="<?php the_permalink(); ?>" rel="permalink" title="Permalink to <?php the_title(); ?>" class="th"><?php the_post_thumbnail('related'); ?></a>
				</div>
				<div class="small-12 large-8 columns entry-content description summary" itemprop="description">
				<?php } else { ?>
				<div class="small-12 large-12 columns entry-content description summary" itemprop="description">
				<?php } ?>
					<?php the_excerpt(); ?>
					<p><a href="<?php the_permalink(); ?>" class="button"><i class="ch-book" aria-hidden="true"></i> View <?php the_title(); ?></a></p>
					<p><strong>Closing Date:</strong> <?php echo do_shortcode('[postexpirator]'); ?></p>
					<p><?php echo get_the_term_list( $post->ID, 'job_type', 'Posted in: ', ', ', '' ); ?></p>
				</div>
			</div>


		<?php endwhile; ?>

		<?php endif; ?>
