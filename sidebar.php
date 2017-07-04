			<ul class="sidebar">
				<?php if ( ! dynamic_sidebar('joinsidebar') ) : ?>
					<li>{static sidebar item 1}</li>
				<?php endif; ?>

				<?php if ( ! dynamic_sidebar('right') ) : ?>
					<?php
					// Find connected pages
					$connected = new WP_Query( array(
						'connected_type' => 'pdf_to_job',
						'connected_items' => get_queried_object(),
						'nopaging' => true,
					) );

					// Display connected pages
					if ( $connected->have_posts() ) :
					?>
					<li class="widget">
					<h5 class="widgettitle">Related Job:</h3>
					<ul class="menu related">
					<?php while ( $connected->have_posts() ) : $connected->the_post(); ?>
					    <li><a href="<?php global $post; $text = get_post_meta( $post->ID, '_cmb_pdf', true ); echo $text; ?>" download><?php the_title(); ?></a></li>
					<?php endwhile; ?>
					</ul>
					</li>
					<?php
					// Prevent weirdness
					wp_reset_postdata();

					endif;
					?>
					<li>{static sidebar item 1}</li>
				<?php endif; ?>
			</ul>
			<ul class="sidebar">
				<li class="widget"><h2 class="widgettitle">Facebook</h2><div class="fb-page" data-href="https://www.facebook.com/conwayhallethicalsociety/" data-tabs="timeline" data-small-header="true" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="false"><blockquote cite="https://www.facebook.com/conwayhallethicalsociety/" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/conwayhallethicalsociety/">Conway Hall</a></blockquote></div></li>
				<li class="widget"><h2 class="widgettitle">@ConwayHall</h2><a class="twitter-timeline" data-chrome="nofooter noheader noborders transparent" data-dnt="true" href="https://twitter.com/ConwayHall" data-widget-id="545334184664117248">Tweets by @ConwayHall</a> <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script></li>
			</ul>