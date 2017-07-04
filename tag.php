<?php get_header(); ?>

	<div class="row">

		<div class="small-12 large-9 columns">

			<div class="row">

				<div class="small-12 columns">

					<h2 class="archive-title"><?php the_archive_title(); ?></h2>

				</div>

			</div>

			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

				<div <?php post_class('row'); ?>>

					<div class="small-12 columns main">
						<h3 itemprop="name" class="page-title"><a href="<?php the_permalink(); ?>" rel="permalink" title="Permalink to <?php the_title(); ?>"><?php echo the_title(); ?></a></h3>
						<?php get_template_part('parts/ethicalrecord/ethical', 'record'); ?>
						<?php if(has_post_thumbnail()) { ?>
							<div class="row">
								<div class="small-12 large-4 columns">
									<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('related'); ?></a>
								</div>
								<div class="small-12 large-8 columns">
									<?php the_excerpt(); ?>
									<?php get_template_part('parts/issue/read', 'issue'); ?>
								</div>
							</div>
						<?php } else { ?>
							<?php the_excerpt(); ?>
							<?php get_template_part('parts/issue/read', 'issue'); ?>
						<?php } ?>
					</div>

				</div>

			<?php endwhile; ?>
			<div class="small button-group">
			<?php wp_pagenavi(); ?>
			</div>

			<?php endif; ?>

		</div>

		<aside class="small-12 large-3 columns">

			<?php get_template_part('sidebar'); ?>

		</aside>

	</div>

<?php get_footer(); ?>