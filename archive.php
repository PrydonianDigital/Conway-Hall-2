<?php get_header(); ?>

	<div class="row">

		<div class="small-12 large-9 columns">

			<div class="row">

				<div class="small-12 columns">

				<?php
					$post_type = get_post_type();
					$type = get_post_type_object( $post_type );
					$type_name = $type->labels->singular_name;
					if( 'issue' == get_post_type() ) {
						$type_name = 'Ethical Record';
					} else {
						$type_name = '';
					}
				?>
					<h2 class="archive-title" data-type="<?php echo $type_name; ?>"><?php echo $type_name; ?> <?php the_archive_title(); ?></h2>

					<?php
						if(is_post_type_archive( 'project' )) {
							$id=14534;
							$post = get_post($id);
							$content = apply_filters('the_content', $post->post_content);
							$title = apply_filters('the_title', $post->post_title);
							echo $content;
						}
					?>

				</div>

			</div>

			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

				<div <?php post_class('row listing'); ?>>

					<div class="small-12 columns main">
						<?php
							$term_list  = wp_get_post_terms( $post->ID, 'section', array("fields" => "all") );
							$term_list  = wp_get_post_terms( $post->ID, 'decade', array("fields" => "all") );
						?>
						<h6>
							<?php
								foreach($term_list as $term_single) {
									echo $term_single->name;
								}
							?>
						</h6>
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