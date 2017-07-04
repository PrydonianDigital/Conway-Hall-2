<div class="row">
	<div class="small-12 columns" id="tour"></div>
	<div id="controls" class="small-12 large-3 columns"></div>
	<div id="planit" data-room="<?php the_title(); ?>" class="small-12 large-9 columns"></div>
	<div id="other" class="small-12 large-12 columns">
		<div class="row">
			<div class="small-6 columns">
				<?php if( is_page( 'Balcony Room Planner') ) {} else { ?>
					<a class="button pano" id="planner" data-room=""><i class="ch-loop2"></i> 360&deg; View</a>
				<?php } ?>
			</div>
			<div class="small-6 columns">
				<a href="http://www.panaround.co.uk/" rel="noopener" target="_blank"><img src="<?php echo bloginfo('template_url'); ?>/planit/global/img/planit-logo.png" alt="planit-logo" width="56" height="35" class="alignright" /></a>
			</div>
		</div>
	</div>
</div>
<script src="<?php echo bloginfo('template_url'); ?>/planit/global/js/flash-detection.min.js"></script>
<script src="<?php echo bloginfo('template_url'); ?>/planit/global/js/swfobject.js"></script>
<script src="<?php echo bloginfo('template_url'); ?>/planit/global/embedpano.js"></script>