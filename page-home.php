<?php get_header(); ?>

	<div class="row">

		<div class="small-12 large-9 columns main">

			<?php get_template_part('parts/home/home', 'orbit'); ?>
			<h4 class="description"><?php echo bloginfo( 'description' ); ?></h4>

			<ul class="accordion" data-responsive-accordion-tabs="tabs small-accordion large-tabs">
				<li class="accordion-item is-active" data-accordion-item>
					<a href="#" class="accordion-title">Events</a>
					<div class="accordion-content" data-tab-content>
						<?php get_template_part('parts/home/home', 'events'); ?>
					</div>
				</li>
				<li class="accordion-item" data-accordion-item>
					<a href="#" class="accordion-title">Venue Hire</a>
					<div class="accordion-content" data-tab-content>
						<?php get_template_part('parts/home/home', 'hire'); ?>
					</div>
				</li>
				<li class="accordion-item" data-accordion-item>
					<a href="#" class="accordion-title">Library</a>
					<div class="accordion-content" data-tab-content>
						<?php get_template_part('parts/home/home', 'library'); ?>
					</div>
				</li>
				<li class="accordion-item" data-accordion-item>
					<a href="#" class="accordion-title">Sunday Concerts</a>
					<div class="accordion-content" data-tab-content>
						<?php get_template_part('parts/home/sunday', 'concerts'); ?>
					</div>
				</li>
				<li class="accordion-item" data-accordion-item>
					<a href="#" class="accordion-title">Ethical Record</a>
					<div class="accordion-content" data-tab-content>
						<?php get_template_part('parts/home/home', 'ethical'); ?>
					</div>
				</li>
			</ul>

		</div>

		<aside class="small-12 large-3 columns">

			<?php get_template_part('sidebar'); ?>

		</aside>

	</div>

<?php get_footer(); ?>