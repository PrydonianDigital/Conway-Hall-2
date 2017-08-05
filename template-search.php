<?php
	/**
	* Template Name: Search
	*/
	get_header();
?>

	<div class="row">

		<div class="small-12 large-9 columns">

<script>
  (function() {
    var cx = '015352071736437870634:4muuitsu3iu';
    var gcse = document.createElement('script');
    gcse.type = 'text/javascript';
    gcse.async = true;
    gcse.src = 'https://cse.google.com/cse.js?cx=' + cx;
    var s = document.getElementsByTagName('script')[0];
    s.parentNode.insertBefore(gcse, s);
  })();
</script>
<gcse:searchresults-only></gcse:searchresults-only>

		</div>

		<aside class="small-12 large-3 columns">

			<?php get_template_part('sidebar'); ?>

		</aside>

	</div>

<?php get_footer(); ?>