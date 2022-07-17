<?php

/**
 * Displays post entry content
 *
 * @package OceanWP WordPress theme
 */

// Exit if accessed directly.
if (!defined('ABSPATH')) {
	exit;
}

?>

<?php do_action('ocean_before_blog_entry_content'); ?>

<div class="blog-entry-summary clr" <?php oceanwp_schema_markup('entry_content'); ?>>

	<?php
	// Display excerpt.
	if ('500' !== get_theme_mod('ocean_blog_entry_excerpt_length', '30')) :
		$date_event = get_field('date_event');

		$date_obj = $date_event ? DateTime::createFromFormat('m-d', $date_event)->format('Y-m-d') : '';
		$location_event = get_field('location_event');

	?>
		<?php if (get_post_type() === 'events') : ?>
			<div class="events_extra-cols">
				<?php if ($date_event) : ?>
					<p class="date-event">
						<?php echo wp_date('j F', strtotime($date_obj), new DateTimeZone('Europe/Kiev')); ?>
					</p>
				<?php endif; ?>

				<p class="location-event">
					<?php if ($location_event) : ?>
						<?php echo $location_event; ?>
					<?php else : ?>
						Мир
					<?php endif; ?>
				</p>

			</div>
		<?php endif; ?>
		<p>
			<?php
			// Display custom excerpt.
			echo oceanwp_excerpt(get_theme_mod('ocean_blog_entry_excerpt_length', '30')); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
			?>
		</p>

	<?php

	// If excerpts are disabled, display full content.
	else :

		the_content('', '&hellip;');

	endif;
	?>

</div><!-- .blog-entry-summary -->

<?php do_action('ocean_after_blog_entry_content'); ?>