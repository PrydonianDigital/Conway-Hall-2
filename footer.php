	</main>

	<footer id="colophon" class="site-footer" role="contentinfo" itemscope itemtype="http://schema.org/WPFooter">

		<div class="row">

			<div class="small-12 large-8 columns">

				<strong><?php bloginfo('name'); ?></strong><br />

				<p><?php echo nl2br( get_theme_mod('ch_address') ); ?></p>

				<p><?php echo get_theme_mod('ch_phone'); ?></p>

				<p><?php echo nl2br( get_theme_mod('ch_hours') ); ?></p>

				<p><?php echo get_theme_mod('ch_tagline'); ?> (registered charity <?php echo get_theme_mod('ch_charity'); ?>)</p>

				<?php dynamic_sidebar( 'footer_left' ); ?>

				&copy; 1787 - <?php echo date('Y'); ?> Conway Hall</p>
			</div>

			<div class="small-12 large-4 columns">

				<?php dynamic_sidebar( 'footer_right' ); ?>

			</div>

		</div>

	</footer>

	</div>

</div>

<?php wp_footer(); ?>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-30440586-1', 'auto');
  ga('send', 'pageview');
</script>
<!-- Google Code for Remarketing Tag -->
<!--------------------------------------------------
Remarketing tags may not be associated with personally identifiable information or placed on pages related to sensitive categories. See more information and instructions on how to setup the tag on: http://google.com/ads/remarketingsetup?utm_source=Email&utm_medium=Email&utm_term=Email&utm_content=Emails&utm_campaign=Emails
--------------------------------------------------->
<script type="text/javascript">
var google_tag_params = {
ecomm_prodid: 'REPLACE_WITH_VALUE',
ecomm_pagetype: 'REPLACE_WITH_VALUE',
ecomm_totalvalue: 'REPLACE_WITH_VALUE',
};
</script>
<script type="text/javascript">
/* <![CDATA[ */
var google_conversion_id = 980427979;
var google_custom_params = window.google_tag_params;
var google_remarketing_only = true;
/* ]]> */
</script>
<script type="text/javascript" src="//http://www.googleadservices.com/pagead/conversion.js?utm_source=Email&utm_medium=Email&utm_term=Email&utm_content=Emails&utm_campaign=Emails">
</script>
<noscript>
<div style="display:inline;">
<img height="1" width="1" style="border-style:none;" alt="" src="//http://googleads.g.doubleclick.net/pagead/viewthroughconversion/980427979/?value=0&guid=ON&script=0%22%2F&utm_source=Email&utm_medium=Email&utm_term=Email&utm_content=Emails&utm_campaign=Emails>
</div>
</noscript>
</body>
</html>