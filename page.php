<?php get_header(); ?>

	<div class="row">

		<div class="small-12 large-9 columns main justify">

			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

				<div itemscope itemtype="http://schema.org/Article">

					<?php get_template_part('parts/global/post', 'meta'); ?>

					<?php
						$page_id = 	get_the_ID();
					?>

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

					<h2 class="page-title" data-id="<?php echo $page_id; ?>" itemprop="headline"><?php the_title(); ?></h2>

					<?php get_template_part('parts/global/post', 'copyright'); ?>

					<?php get_template_part('parts/global/related', 'pdfmeta'); ?>

					<div itemprop="mainEntityOfPage">

						<?php the_content(); ?>

						<?php
							if(is_page('Members Area')) {
								get_template_part('parts/global/log', 'in');
							}
						?>

						<?php
							if(is_page('Password Recovery')) {
								get_template_part('parts/global/password', 'recovery');
							}
						?>

					</div>

					<?php
						if(is_page('Past Issues')) {
							get_template_part('parts/issue/decade', 'list');
						}
						if(is_page('What do you do with a PhD in Music?')) {
							get_template_part('parts/library/library', 'blog');
						}
						if(is_page('Chancery Lane')) {
							get_template_part('parts/tfl/chancery', 'lane');
						}
						if(is_page('Holborn Station')) {
							get_template_part('parts/tfl/holborn', 'station');
						}
						if(is_page('Russell Square')) {
							get_template_part('parts/tfl/russell', 'square');
						}
						if(is_page('Santander Cycle Hire')) {
							get_template_part('parts/tfl/bike', 'hire');
						}
						if(is_page('Buses')) {
							get_template_part('parts/tfl/bus', 'stops');
						}
						if(is_page('Current Projects')) {
							get_template_part('parts/projects/current', 'projects');
						}
						if(is_page('Past Projects')) {
							get_template_part('parts/projects/past', 'projects');
						}
					?>

				</div>

			<?php endwhile; ?>

			<?php endif; ?>

			<?php get_template_part('parts/global/related', 'pdf'); ?>

			<?php
				if(is_page('Concerts Programme')) {
					get_template_part('parts/sundayconcerts/sundayconcerts', 'programme');
				}
				if(is_page('People')) {
					get_template_part('parts/people/people', 'loop');
				}
				if(is_page('Our Projects')) {
					get_template_part('parts/learning/learning', 'loop');
				}
				if(is_page('Opportunities')) {
					get_template_part('parts/jobs/jobs', 'loop');
				}
				get_template_part('parts/global/sub', 'pages');
			?>

			<?php get_template_part('parts/global/related', 'pages'); ?>

		</div>

		<aside class="small-12 large-3 columns">

			<?php get_template_part('sidebar'); ?>

		</aside>

	</div>

<?php get_footer(); ?>