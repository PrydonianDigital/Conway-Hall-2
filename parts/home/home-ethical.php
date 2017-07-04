<h3 class="center">Ethical Record</h3>
<?php
	$args = array(
		'post_type'	  => 'ethicalrecord',
	 );
	$ethical = new WP_Query( $args );

	if ( $ethical->have_posts() ) : while ( $ethical->have_posts() ) : $ethical->the_post();
?>
	<div <?php post_class('row listing'); ?>>
		<div class="small-12 columns">
			<div class="postdata">
				<?php
					$term_list  = wp_get_post_terms( $post->ID, 'section', array("fields" => "all") );
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
			</div>
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
			<p><a href="<?php the_permalink(); ?>" class="button"><i class="ch-book" aria-hidden="true"></i> View "<?php the_title(); ?>"</a></p>
		</div>
	</div>

<?php
	endwhile;
	endif;
	wp_reset_query();
?>
	<div class="row">
		<div class="small-12 columns">
			<p><a href="<?php echo tribe_get_events_link() ?>" class="button"><?php _e( '<i aria-hidden="true" class="ch-book"></i> More from the Ethical Record', 'ch' ) ?></a></p>
		</div>
	</div>
