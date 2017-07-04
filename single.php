<?php get_header(); ?>

	<div class="row">

		<div class="small-12 large-9 columns main justify">

			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

				<?php
					date_default_timezone_set('Europe/London');
					$start = get_post_meta( get_the_ID(), '_project_startdate', true );
					$end = get_post_meta( get_the_ID(), '_project_enddate', true );
					$ongoing = get_post_meta( get_the_ID(), '_project_ongoing', true );
					$lead = get_post_meta( get_the_ID(), '_project_lead', true );
				?>

				<div itemscope itemtype="http://schema.org/Article">

					<?php get_template_part('parts/global/post', 'meta'); ?>

					<?php if(has_post_thumbnail()) { ?>
					<figure itemprop="associatedMedia">
						<span itemscope itemtype="http://schema.org/ImageObject">
							<?php the_post_thumbnail('top', array('itemprop' => 'contentURL')); ?>
							<?php if(get_post_meta(get_post_thumbnail_id(), 'owner', true) != '') { ?>
							<figcaption>
								Image Credit:
									<span itemscope itemprop="author" itemtype="http://schema.org/Person">
										<?php if(get_post_meta(get_post_thumbnail_id(), 'ownerurl', true) != '') { ?>
										<a href="<?php echo get_post_meta(get_post_thumbnail_id(), 'ownerurl', true); ?>" target="_blank">
										<?php } ?>
											<span itemprop="name"><?php echo get_post_meta(get_post_thumbnail_id(), 'owner', true); ?></span>
										<?php if(get_post_meta(get_post_thumbnail_id(), 'ownerurl', true) != '') { ?>
										</a>
										<?php } ?>
									</span>
							</figcaption>
							<?php } ?>
						</span>
					</figure>
					<?php } ?>

					<h2 class="page-title" itemprop="name headline"><?php the_title(); ?></h2>

					<?php get_template_part('parts/global/post', 'copyright'); ?>

					<?php get_template_part('parts/jobs/related', 'meta'); ?>

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

					<?php get_template_part('parts/ethicalrecord/ethical', 'record'); ?>

					<?php get_template_part('parts/global/lecture', 'video'); ?>

					<?php
						if($lead != '') {
					?>
						<h6>Project led by: <?php echo $lead; ?></h6>
					<?php
						}
					?>
					<div itemprop="mainEntityOfPage">

						<div itemprop="articleBody">

							<?php the_content(); ?>

						</div>

					</div>

					<?php get_template_part('parts/global/post', 'tags'); ?>

					<?php get_template_part('parts/ethicalrecord/speaker', 'bio'); ?>
					<?php get_template_part('parts/ethicalrecord/related', 'issue'); ?>
					<?php get_template_part('parts/jobs/related', 'doc'); ?>

					<div class="row">

						<div class="small-12 large-6 columns postsnav left">

							<?php previous_post_link('%link', '<i class="ch-chevron-left"></i> %title'); ?>

						</div>

						<div class="small-12 large-6 columns postsnav right">

							<?php next_post_link('%link', '%title <i class="ch-chevron-right"></i>'); ?>

						</div>

					</div>

				</div>

			<?php endwhile; ?>

			<?php endif; ?>

		</div>

		<aside class="small-12 large-3 columns">

			<?php get_template_part('sidebar'); ?>

		</aside>

	</div>

<?php get_footer(); ?>