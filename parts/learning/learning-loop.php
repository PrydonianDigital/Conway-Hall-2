		<h2>Current Projects</h2>

		<?php
		$args = array (
			'post_type'				=> array( 'project' ),
			'posts_per_page'		=> 3,
			'orderby'				=> 'menu_order',
			'order'					=> 'ASC',
			'meta_query'			=> array(
				'relation'			=> 'OR',
				 'ongoing'			=> array(
					 'key'			=> '_project_ongoing',
					 'compare'		=> 'EXISTS'
				 ),
				 'start_date'		=> array(
					 array(
						 'key'		=> '_project_enddate',
						 'value'	=> current_time('timestamp'),
						 'type'		=> 'numeric',
						 'compare'	=> '>='
					 )
				 )
			),
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
					<?php if($ongoing != ''){ ?>
						<h6>Ongoing</h6>
					<?php } else { ?>
						<?php if($start != '' && $end != ''){ ?>
							<h6>From: <?php echo date_i18n( 'jS F Y', $start ); ?> - <?php echo date_i18n( 'jS F Y', $end ); ?><?php if($today > $end){ echo ' (Project Ended)'; } ?></h6>
						<?php } else { ?>
							<?php if($start != ''){ ?>
								<h6>Start Date: <?php echo date_i18n( 'jS F Y', $start ); ?></h6>
							<?php } ?>
							<?php if($end != ''){ ?>
								<h6>End Date: <?php echo date_i18n( 'jS F Y', $end ); ?></h6>
							<?php } ?>
						<?php } ?>
					<?php } ?>
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
					<?php
						if($lead != '') {
					?>
						<h6>Project led by: <?php echo $lead; ?></h6>
					<?php
						}
					?>
					<p><a href="<?php the_permalink(); ?>" class="button"><i class="ch-book" aria-hidden="true"></i> View <?php the_title(); ?></a></p>
					<p class="meta">Project categories: <?php echo wpdocs_custom_taxonomies_terms_links(); ?></p>
				</div>
			</div>


		<?php endwhile; ?>
			<p>See more <a href="/learning-at-conway-hall/projects/current-projects/">Current Projects</a></p>
		<?php endif; ?>

		<hr />

		<h2>Past Projects</h2>

		<?php
		$args = array (
			'post_type'				=> array( 'project' ),
			'posts_per_page'		=> 3,
			'orderby'				=> 'menu_order',
			'order'					=> 'ASC',
			'meta_query'			=> array(
				 'start_date'		=> array(
					 array(
						 'key'		=> '_project_enddate',
						 'value'	=> current_time('timestamp'),
						 'type'		=> 'numeric',
						 'compare'	=> '<'
					)
				)
			),
		);
		$project_current = new WP_Query( $args );
		?>

		<?php if ($project_current->have_posts()) : while ($project_current->have_posts()) : $project_current->the_post(); ?>

			<div <?php post_class('row listing'); ?>>
				<div class="small-12 columns">
					<h4 itemprop="name"><a href="<?php the_permalink(); ?>" rel="permalink" title="Permalink to <?php the_title(); ?>"><?php echo the_title(); ?></a></h4>
					<?php if($ongoing != ''){ ?>
						<h6>Ongoing</h6>
					<?php } else { ?>
						<?php if($start != '' && $end != ''){ ?>
							<h6>From: <?php echo date_i18n( 'jS F Y', $start ); ?> - <?php echo date_i18n( 'jS F Y', $end ); ?><?php if($today > $end){ echo ' (Project Ended)'; } ?></h6>
						<?php } else { ?>
							<?php if($start != ''){ ?>
								<h6>Start Date: <?php echo date_i18n( 'jS F Y', $start ); ?></h6>
							<?php } ?>
							<?php if($end != ''){ ?>
								<h6>End Date: <?php echo date_i18n( 'jS F Y', $end ); ?></h6>
							<?php } ?>
						<?php } ?>
					<?php } ?>
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
					<p class="meta">Project categories: <?php echo wpdocs_custom_taxonomies_terms_links(); ?></p>
				</div>
			</div>


		<?php endwhile; ?>
			<p>See more <a href="/learning-at-conway-hall/projects/past-projects/">Past Projects</a></p>
		<?php endif; ?>
