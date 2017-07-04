<h3 class="center">Library</h3>
<?php
	$args = array(
		'post_type'	  => 'page',
		'posts_per_page' => -1,
		'post_parent'	=> '13',
		'order'		  => 'ASC',
		'orderby'		=> 'menu_order'
	 );
	$library = new WP_Query( $args );

	if ( $library->have_posts() ) : while ( $library->have_posts() ) : $library->the_post();
?>
	<div <?php post_class('row listing'); ?>>
		<div class="small-12 columns">
			<div class="postdata">
				<h3 itemprop="name" class="page-title"><a href="<?php the_permalink(); ?>" rel="permalink" title="Permalink to <?php the_title(); ?>"><?php echo the_title(); ?></a></h3>
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
			<p><a href="<?php the_permalink(); ?>" class="button"><i class="ch-library2" aria-hidden="true"></i> View "<?php the_title(); ?>"</a></p>
		</div>
	</div>

<?php
	endwhile;
	endif;
	wp_reset_query();
?>