<?php

/* Template Name: PDF Search Page */

global $post;
$query = isset( $_REQUEST['docsearch'] ) ? sanitize_text_field( $_REQUEST['docsearch'] ) : '';
$doc = isset( $_REQUEST['doc'] ) ? absint( $_REQUEST['doc'] ) : 1;
if ( class_exists( 'SWP_Query' ) ) {
	$engine = 'pdf';
	$swp_query = new SWP_Query(
		array(
			's'	  => $query,
			'engine' => $engine,
			'page'   => $doc,
		)
	);
	$pagination = paginate_links( array(
		'format'  => '?doc=%#%',
		'current' => $doc,
		'total'   => $swp_query->max_num_pages,
		'type'	  => 'list'
	) );
}
get_header();
?>

	<div class="row">

		<div class="small-12 large-9 columns main">

			<div class="row">
				<div class="small-12 columns">

					<form role="search" method="get" class="searchform group" action="<?php echo esc_html( get_permalink() ); ?>">
						<label>
							<span class="offscreen"><?php echo _x( 'Search PDFs for:', 'label' ) ?></span>
							<input type="search" class="search-field" placeholder="Search..." value="<?php echo $query; ?>" name="docsearch" />
						</label>
						<input type="submit" class="search-submit" value=" Search ">
					</form>

					<?php if ( ! empty( $query ) ) : ?>
					<p>Please be aware that the search results are dependant upon Optical Character Recognition (OCR) scanning technology and that, although, this has increased rapidly over the years there are limitations in regards to the source materials and character formatting.</p>
					<h4><?php echo $swp_query->found_posts; ?> results for "<?php echo $query; ?>"</h4>
					<?php endif; ?>

				</div>
			</div>

				<?php
					if ( ! empty( $query ) && isset( $swp_query ) && ! empty( $swp_query->posts ) ) {
						foreach ( $swp_query->posts as $post ) {
							setup_postdata( $post );
				?>

				<?php
					global $post;
					$pdf_content = get_post_meta( $post->ID, 'searchwp_content', true )
				?>

				<?php
					global $post;
					$lecspeaker = get_post_meta( $post->ID, '_cmb_lecspeaker', true );
					$date = get_post_meta( $post->ID, '_cmb_lecdate', true );
					$abstract = get_post_meta( $post->ID, '_cmb_abstract', true );
					$author = get_post_meta( $post->ID, '_cmb_author', true );
					$publisher = get_post_meta( $post->ID, '_cmb_publisher', true );
					$reviewer = get_post_meta( $post->ID, '_cmb_vpauthor', true );
					$lead = get_post_meta( $post->ID, '_project_lead', true );
					$bio = get_post_meta( $post->ID, '_project_bio', true );
					$jobtitle = get_post_meta( $post->ID, '_cmb_title', true );
					$searchwp_doc_content = wp_get_attachment_metadata( $post->ID, 'searchwp_doc_content', true );
					$price = get_post_meta( $post->ID, '_cmb_tickets', true );
					$free = get_post_meta( $post->ID, '_cmb_free', true );
				?>

				<div class="row">
					<div class="sticky">
						<div class="small-12 columns">
					<?php
						$post_type = get_post_type( $post->ID );
						switch( $post_type ) {
							case 'post':
								 echo '<h6><i aria-hidden="true" class="ch-file-empty2"></i> Post</h6>';
							break;
							case 'page':
								 echo '<h6><i aria-hidden="true" class="ch-file-text23"></i> Page</h6>';
							break;
							case 'tribe_events':
								 echo '<h6><i aria-hidden="true" class="ch-calendar3"></i> Event</h6>';
							break;
							case 'ethicalrecord':
								 echo '<h6><i aria-hidden="true" class="ch-books"></i> Ethical Record</h6>';
							break;
							case 'issue':
								 echo '<h6><i aria-hidden="true" class="ch-book3"></i> Issue</h6>';
							break;
							case 'jobs':
								 echo '<h6><i aria-hidden="true" class="ch-briefcase2"></i> Job</h6>';
							break;
							case 'project':
								 echo '<h6><i aria-hidden="true" class="ch-folder-open-o"></i> Project</h6>';
							break;
							case 'memorial_lecture':
								 echo '<h6><i aria-hidden="true" class="ch-bullhorn2"></i> Conway Memorial Lecture</h6>';
							break;
							case 'sunday_concerts':
								 echo '<h6><i aria-hidden="true" class="ch-music"></i> Sunday Concert</h6>';
							break;
							case 'tribe_venue':
								 echo '<h6><i aria-hidden="true" class="ch-office2"></i> Venue</h6>';
							break;
							case 'library_blog':
								 echo '<h6><i aria-hidden="true" class="ch-library2"></i> Library Blog</h6>';
							break;
						}
					?>
							<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
						</div>
						<div class="small-12 large-4 columns">

						</div>
						<div class="small-12 large-8 columns">
							<?php echo substr($pdf_content, 0, 250); ?>...
						</div>
					</div>
				</div>

				<?php
						}
				?>
			<div class="small button-group">
			<?php wp_pagenavi(); ?>
			</div>
			<?php
						wp_reset_postdata();
						if ( $swp_query->max_num_pages > 1 ) {
				?>
							<div class="navigation pagination" role="navigation">
								<h2 class="screen-reader-text">Posts navigation</h2>
								<div class="nav-links">
									<?php echo wp_kses_post( $pagination ); ?>
								</div>
							</div>
				<?php
						}
					} else {}
				?>

		</div>

		<aside class="small-12 large-3 columns">

			<?php get_template_part('sidebar'); ?>

		</aside>

	</div>

<?php get_footer(); ?>