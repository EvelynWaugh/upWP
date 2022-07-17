<?php

/**
 * Child theme functions
 *
 * When using a child theme (see http://codex.wordpress.org/Theme_Development
 * and http://codex.wordpress.org/Child_Themes), you can override certain
 * functions (those wrapped in a function_exists() call) by defining them first
 * in your child theme's functions.php file. The child theme's functions.php
 * file is included before the parent theme's file, so the child theme
 * functions would be used.
 *
 * Text Domain: oceanwp
 *
 * @link http://codex.wordpress.org/Plugin_API
 */

/**
 * Load the parent style.css file
 *
 * @link http://codex.wordpress.org/Child_Themes
 */
function oceanwp_child_enqueue_parent_style() {
	 // Dynamically get version number of the parent stylesheet (lets browsers re-cache your stylesheet when you update your theme)
	$theme   = wp_get_theme( 'OceanWP' );
	$version = $theme->get( 'Version' );
	// Load the stylesheet
	wp_enqueue_style( 'child-style', get_stylesheet_directory_uri() . '/style.css', array( 'oceanwp-style' ), $version );
	wp_enqueue_style( 'ow-flatpickr-css', 'https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css' );
	wp_enqueue_script( 'ow-flatpickr', 'https://cdn.jsdelivr.net/npm/flatpickr' );

	wp_enqueue_style( 'ow-nouislider-css', 'https://cdnjs.cloudflare.com/ajax/libs/noUiSlider/15.4.0/nouislider.css' );

	wp_enqueue_script( 'ow-nouislider', 'https://cdnjs.cloudflare.com/ajax/libs/noUiSlider/15.4.0/nouislider.min.js' );

	wp_enqueue_script( 'add-ons-js', get_stylesheet_directory_uri() . '/assets/js/add-ons.js', array( 'jquery' ), time(), true );
}
add_action( 'wp_enqueue_scripts', 'oceanwp_child_enqueue_parent_style' );

require_once get_stylesheet_directory() . '/add-ons/post-types.php';
require_once get_stylesheet_directory() . '/add-ons/filters/base-filter/base-filter.php';
require_once get_stylesheet_directory() . '/add-ons/filters/filter-functions.php';
require_once get_stylesheet_directory() . '/add-ons/gutenberg/gutenberg.php';

// add_filter('query_vars', function ($public_query_vars) {
// var_dump($public_query_vars);
// return $public_query_vars;
// });

add_action( 'events_add_filter_sidebar', 'add_filter_archive_event' );
function add_filter_archive_event() {
	global $wp;
	echo get_filter_by_taxonomy_links( 'events_category', 'По категории', '', 'AND' );
	// echo get_filter_by_taxonomy_forms('events_category', false, 'По категории', 'AND');
	echo get_filter_by_taxonomy_links( 'events_tags', 'По тегам', '' );

	?>
	<div class="event_filter_block">
		<h3>По дате</h3>
		<form action="<?php echo home_url( $wp->request ); ?>" id="form-date">
			<div class="date-form-wrapper">
				<input type="text" id="date_pick" name="date_event" value="<?php echo $_GET['date_event'] ?? ''; ?>">
				<a href="#" class="input-button-clear">
					<i class="icon-close"></i>
				</a>
			</div>
			<?php echo wc_query_string_form_fields( null, array( 'date_event' ), '', true ); ?>
		</form>
	</div>
	<script>
		jQuery('#date_pick').flatpickr({
			dateFormat: 'm-d',
			onChange: (selecteddates, dateStr, instance) => {
				console.log(dateStr)
				// jQuery('#form-date').submit();
				jQuery(document.body).trigger('date_event_ajax_request')


			}
		});
		jQuery('.input-button-clear').on('click', function() {
			jQuery('#date_pick').flatpickr().clear();
			jQuery('#date_pick').attr('disabled', true);
			// jQuery('#form-date').submit();
			jQuery(document.body).trigger('date_event_ajax_request')

		})
	</script>
	<?php

	$location_event = get_filter_by_meta_field_links( 'location_event', 'По локации', '', 'AND', 'events' );

	if ( is_wp_error( $location_event ) ) {
		echo $location_event->get_error_message();
	} else {
		echo $location_event;
	}
	echo get_events_range_slider( 'events_madness', 'По уровню безумия', '', '' );
	// gmap Searchbox
	?>

	<?php
}

add_action( 'events_add_gmap_sidebar', 'events_add_gmap_sidebar' );

function events_add_gmap_sidebar() {
	global $wp;
	?>
	<div class="event_filter_block">
		<h3>По локации (Google Map)</h3>
		<form action="<?php echo home_url( $wp->request ); ?>" id="form-gmap-search">
			<div class="date-form-wrapper">
				<input type="text" id="gmap-search" value="">
				<input type="hidden" name="gmap_event_location_lat" value="">
				<input type="hidden" name="gmap_event_location_lng" value="">
				<a href="#" class="input-button-clear">
					<i class="icon-close"></i>
				</a>
			</div>
			<?php echo wc_query_string_form_fields( null, array( 'gmap_event_location_lat', 'gmap_event_location_lng' ), '', true ); ?>
		</form>
	</div>
	<?php
}

add_action( 'ocean_before_content', 'events_gmap_display_block' );

function events_gmap_display_block() {
	?>
	<div id="gmaps"></div>
	<!-- <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDU2glZ4NC5x47-lK6D6cSt-ej5oHJSmbs&libraries=places,geometry&callback=initMap"> -->
	</script>
	<script>
		function initMap() {
			const map = new google.maps.Map(document.getElementById("gmaps"), {
				center: {

					lat: 37.530868860409505,
					lng: 139.92547309625272
				},
				zoom: 2,
			});

			// Create the search box and link it to the UI element.
			const input = document.getElementById("gmap-search");
			const searchBox = new google.maps.places.SearchBox(input);

			map.addListener("bounds_changed", () => {
				searchBox.setBounds(map.getBounds());
			});
			let markers = [];

			// Listen for the event fired when the user selects a prediction and retrieve
			// more details for that place.
			searchBox.addListener("places_changed", () => {
				const places = searchBox.getPlaces();

				if (places.length == 0) {
					return;
				}

				// Clear out the old markers.
				markers.forEach((marker) => {
					marker.setMap(null);
				});
				markers = [];

				// For each place, get the icon, name and location.
				const bounds = new google.maps.LatLngBounds();
				let placeLat;
				let placeLng;
				places.forEach((place) => {
					if (!place.geometry || !place.geometry.location) {
						console.log("Returned place contains no geometry");
						return;
					}
					placeLat = place.geometry.location.lat();
					placeLng = place.geometry.location.lng();
					console.log(place.geometry.location.lat(), place.geometry.location.lng())
					const icon = {
						url: place.icon,
						size: new google.maps.Size(71, 71),
						origin: new google.maps.Point(0, 0),
						anchor: new google.maps.Point(17, 34),
						scaledSize: new google.maps.Size(25, 25),
					};

					// Create a marker for each place.
					markers.push(
						new google.maps.Marker({
							map,
							icon,
							title: place.name,
							position: place.geometry.location,
						})
					);
					if (place.geometry.viewport) {
						// Only geocodes have viewport.
						bounds.union(place.geometry.viewport);
					} else {
						bounds.extend(place.geometry.location);
					}
				});

				function initAjaxPlace() {
					let formLatLng = jQuery("#form-gmap-search");
					jQuery('[name=gmap_event_location_lat]').val(placeLat);
					jQuery('[name=gmap_event_location_lng]').val(placeLng);
					formLatLng.submit();
				}
				initAjaxPlace();
				map.fitBounds(bounds);
			});
		}
	</script>
	<?php
}

// Gutenberg

add_action(
	'rest_api_init',
	function () {

		register_rest_route(
			'maverick/v1',
			'/events',
			array(
				'methods'             => 'GET',
				'callback'            => 'events_rest_get_events',
				'permission_callback' => '__return_true',

			)
		);
	}
);
function events_rest_get_events( $request ) {

	$all_events = new WP_Query(
		array(
			'post_type'      => 'events',
			'posts_per_page' => -1,
		)
	);
	return $all_events;
}

add_filter( 'rest_prepare_events', 'events_rest_prepare_events', 10, 3 );
function events_rest_prepare_events( $response, $post, $request ) {

	$response->data['events_featured_image'] = wp_get_attachment_image_url( $response->data['featured_media'], 'large' );
	$response->data['author_name']           = get_the_author_meta( 'display_name', $response->data['author'] );

	$terms = wp_get_post_terms( $post->ID, 'events_category' );

	if ( ! empty( $terms ) ) {
		foreach ( $terms as $term ) {
			$term->link = get_term_link( $term->term_id, $term->taxonomy );
		}
	}
	$response->data['events_cat_obj'] = $terms;

	return $response;
}
add_filter( 'acf/rest_api/field_settings/show_in_rest', '__return_true' );
add_action( 'init', 'events_register_block_type' );

function events_register_block_type() {
	register_block_type(
		'events/all-events',
		array(
			'apiVersion'      => 2,
			'attributes'      => array(
				'quantity' => array(
					'type'    => 'number',
					'default' => 6,
				),

			),
			'render_callback' => 'event_block_render_callback',
		)
	);
}

function event_block_render_callback( $atts ) {
	var_dump( $atts );
	$events = get_posts(
		array(
			'post_type'      => 'events',
			'posts_per_page' => $atts['quantity'],
		)
	);
	ob_start();
	?>
	<style>
		.date-event {
			border-radius: <?php echo $atts['borderRadius']; ?>px;
			border-width: <?php echo $atts['borderWeight']; ?>px;
			border-style: solid;
			border-color: <?php echo $atts['borderColor']; ?>;
		}
	</style>
	<?php
	echo '<div class="events-posts-block entries clr" id="blog-entries">';

	foreach ( $events as $post ) {
		setup_postdata( $post );
		$date_event = get_field( 'date_event', $post );
		$terms      = wp_get_post_terms( $post->ID, 'events_category' );

		if ( ! empty( $terms ) ) {
			foreach ( $terms as $term ) {
				$term->link = get_term_link( $term->term_id, $term->taxonomy );
			}
		}

		$author         = get_the_author_meta( 'display_name', $post->post_author );
		$location_event = get_field( 'location_event', $post );
		$date_obj       = $date_event ? DateTime::createFromFormat( 'm-d', $date_event )->format( 'Y-m-d' ) : '';
		?>

		<article class="large-entry blog-entry clr">
			<div class="blog-entry-inner clr">
				<div class="thumbnail">
					<a href="<?php echo get_permalink( $post ); ?>">
						<img src="<?php echo get_the_post_thumbnail_url( $post ); ?>" alt="" />
					</a>
				</div>
				<header>
					<h2 class="blog-entry-header"><?php echo get_the_title( $post ); ?></h2>
				</header>
				<ul class="meta obem-default clr">
					<li class="meta-author"><?php echo $author; ?> </li>
					<li class="meta-date"><?php echo get_the_date(); ?></li>
					<li class="meta-cat">
						<a href="<?php echo $terms[0]->link; ?>">
							<?php echo $terms[0]->name; ?>
						</a>
					</li>
				</ul>
				<div class="blog-entry-summary">
					<div class="events_extra-cols">
						<p class="date-event">

							<?php echo wp_date( 'j F', strtotime( $date_obj ), new DateTimeZone( 'Europe/Kiev' ) ); ?>
						</p>
						<p class="location-event"><?php echo $location_event; ?></p>
					</div>
					<p><?php echo get_the_excerpt(); ?></p>
				</div>
				<div class="blog-entry-readmore">
					<a href="<?php echo get_permalink( $post ); ?>">Продолжить чтение</a>
				</div>
			</div>
		</article>


		<?php

	}
	echo '</div>';

	$html = ob_get_clean();

	wp_reset_postdata();
	return $html;
}


// Bosch

// get meta value from db
function y_get_meta_values( $key = '', $type = 'post', $status = 'publish' ) {

	global $wpdb;

	if ( empty( $key ) ) {
		return;
	}

	$r = $wpdb->get_col(
		$wpdb->prepare(
			"
        SELECT DISTINCT (pm.meta_value) FROM {$wpdb->postmeta} pm
        LEFT JOIN {$wpdb->posts} p ON p.ID = pm.post_id
        WHERE pm.meta_key = %s 
        AND p.post_status = %s 
        AND p.post_type = %s
    ",
			$key,
			$status,
			$type
		)
	);

	return $r;
}


add_shortcode( 'y_events_filter', 'y_events_filter_function' );
function y_events_filter_function( $atts ) {
	// wp_enqueue_style('filter-fonts');
	$cats    = get_terms(
		array(
			'taxonomy'   => 'events_category',
			'hide_empty' => false,
		)
	);
	$tags    = get_terms(
		array(
			'taxonomy'   => 'events_tags',
			'hide_empty' => false,
		)
	);
	$filters = array(
		'cats'           => $cats,
		'tags'           => $tags,
		'location_event' => y_get_meta_values( 'location_event', 'events' ),
		'event_madness'  => y_get_meta_values( 'events_madness', 'events' ),
	);
	wp_enqueue_style( 'filter-fonts' );
	wp_enqueue_style( 'y-bootstrap-style' );
	wp_enqueue_style( 'filter-css' );

	wp_enqueue_script( 'y-boot-js' );
	wp_enqueue_script( 'filter-js' );

	wp_localize_script(
		'filter-js',
		'BOSCH_DATA',
		array(
			'site_url' => site_url( '/' ),
			'filters'  => $filters,
		)
	);
	ob_start();
	$query = new WP_Query(
		array(
			'posts_per_page' => -1,
			'post_type'      => 'events',
		)
	);

	locate_template(
		'/add-ons/filters/bosch-filter/filter.php',
		true,
		true,
		array(
			'filters' => $filters,
			'found'   => $query->found_posts,
		)
	);

	$output = ob_get_clean();
	return $output;
}

add_action( 'wp_enqueue_scripts', 'y_enqueu_bosch_scripts' );

function y_enqueu_bosch_scripts() {
	wp_register_style( 'y-bootstrap-style', 'https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css' );
	wp_register_script( 'y-boot-js', 'https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js' );
	wp_register_style( 'filter-css', get_stylesheet_directory_uri() . '/assets/css/bosch-filter.css', array(), time(), 'all' );
	wp_register_style( 'filter-fonts', get_stylesheet_directory_uri() . '/assets/css/fonts.css', array(), time(), 'all' );

	wp_register_script( 'filter-js', get_stylesheet_directory_uri() . '/assets/js/bosch-filter.js', array( 'jquery' ), time(), true );
}

add_action( 'rest_api_init', 'maverick_add_route' );
function maverick_add_route() {
	register_rest_route(
		'maverick/v1',
		'/filter/',
		array(
			'methods'             => WP_REST_Server::READABLE,
			'callback'            => 'maverick_build_product_data',
			'permission_callback' => '__return_true',
			'args'                => array(),
		)
	);
}

function maverick_build_product_data( $request ) {
	$cats       = $request->get_param( 'cat' );
	$tags       = $request->get_param( 'tag' );
	$location   = $request->get_param( 'location' );
	$madness    = $request->get_param( 'madness' );
	$search     = $request->get_param( 'search' );
	$period     = $request->get_param( 'period' );
	$tax_query  = array(
		'relation' => 'AND',
	);
	$meta_query = array(
		'relation' => 'AND',
	);
	$date_query = array();
	if ( $cats ) {
		$tax_query[] = array(
			'taxonomy' => 'events_category',
			'field'    => 'slug',
			'terms'    => explode( ',', $cats ),
		);
	}
	if ( $tags ) {
		$tax_query[] = array(
			'taxonomy' => 'events_tags',
			'field'    => 'slug',
			'terms'    => explode( ',', $tags ),
		);
	}
	if ( $location ) {
		$meta_query[] = array(
			'key'     => 'location_event',
			'value'   => explode( ',', $location ),
			'compare' => 'IN',
		);
	}
	if ( $madness ) {
		$meta_query[] = array(
			'key'     => 'events_madness',
			'value'   => array_map(
				function( $el ) {
					return (int) $el; },
				explode( ',', $madness )
			),
			'compare' => 'IN',
			'type'    => 'numeric',
		);
	}
	if ( $period ) {
		$period_options = explode( ',', $period );
		if ( $period_options[0] === 'day' ) {
			$date_query[] = array(
				'after'  => $period_options[1],
				'before' => $period_options[2],
			);
		} elseif ( $period_options[0] === 'week' ) {
			$date_query[] = array(
				'after' => 'Monday this week',

			);
		} elseif ( $period_options[0] === 'lastweek' ) {
			$date_query[] = array(
				'after' => 'last week',

			);
		} elseif ( $period_options[0] === 'month' ) {
			$date_query[] = array(
				'after' => 'this month',

			);
		} elseif ( $period_options[0] === 'quarter' ) {
			$date_query[] = array(
				'after' => 'last 3 months',

			);
		} elseif ( $period_options[0] === 'year' ) {
			$date_query[] = array(
				'after' => 'this year',

			);
		}
	}
	$args = array(
		'posts_per_page' => -1,
		'post_type'      => 'events',
		'tax_query'      => $tax_query,
		'meta_query'     => $meta_query,
		'date_query'     => $date_query,
	);
	if ( $search ) {
		$args['s'] = $search;
	}
	$events_query = new WP_Query( $args );
	ob_start();
	if ( $events_query->have_posts() ) :
		while ( $events_query->have_posts() ) :
			$events_query->the_post();
			?>
				<div class="module-theme theme-custom-grid">
					<div class="theme-wrapper">
						<a href="" class="theme-container">
								<div class="theme-image-wrapper">
									<div class="theme-image-cropper">
									
										<img class="theme-image" alt="" src="<?php echo the_post_thumbnail_url(); ?>">
									</div>
								</div>
							<div class="theme-content">
								<p class="theme-date copy-small">
									<?php get_the_date( 'd.m.Y' ); ?>
								</p>
								<p class="theme-type copy-small">
									<?php $cats = wp_get_post_terms( get_the_ID(), 'events_category' ); ?>

									<?php echo $cats[0]->name; ?>
								</p>
								<h4 class="theme-title">
									<?php echo get_the_title(); ?>
										<span class="icon icon-right"></span>
								</h4>
							</div>
						</a>
						<div class="tag-wrapper">
							<a href="/pressportal/de/en/tag/bosch-group/">
								<p class="theme-tag copy-small">
								<?php $tags = wp_get_post_terms( get_the_ID(), 'events_tags' ); ?>
								<?php echo $tags[0]->name; ?>
								</p>
							</a>
						</div>
						<div class="module-theme-actions theme-actions-icons-only">
							<ul class="list-unstyled">
						
								<li>
									<a class="theme-action action-share" href="#" title="share">
										<span class="icon icon-share"></span>
										<span class="btn-text">share</span>
									</a>
									<div class="share-links">
										<ul class="list-unstyled">
											<li>
												<a class="icon-facebook-blank" href="https://www.facebook.com/sharer/sharer.php?u=https://www.bosch-presse.de/pressportal/de/en/software-gaining-in-prominence-for-automakers-236503.html" target="_blank">Share Facebook</a>
											</li>
											<li>
												<a class="icon-twitter-blank" href="https://twitter.com/intent/tweet?url=https://www.bosch-presse.de/pressportal/de/en/software-gaining-in-prominence-for-automakers-236503.html&amp;text=Software gaining in prominence for automakers" target="_blank">Tweet</a>
											</li>
											<li>
												<a class="icon-linkedin-blank" href="https://www.linkedin.com/shareArticle?url=https://www.bosch-presse.de/pressportal/de/en/software-gaining-in-prominence-for-automakers-236503.html&amp;title=Software gaining in prominence for automakers" target="_blank">LinkedIn</a>
											</li>
										</ul>
									</div>
								</li>
							</ul>
						</div>
					</div>
				</div>

				<?php
				endwhile;
endif;
	$html = ob_get_clean();
	return array(
		'html'  => $html,
		'posts' => $events_query,
	);
}

