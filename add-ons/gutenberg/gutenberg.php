<?php
add_action('enqueue_block_editor_assets', 'events_enqueue_block_editor_assets');

function events_enqueue_block_editor_assets()
{
    wp_enqueue_script('events-block', get_stylesheet_directory_uri() . '/assets/dist/blocks.js', ['wp-blocks', 'wp-editor', 'wp-element', 'wp-i18n', 'wp-date', 'wp-components', 'wp-data', 'wp-core-data', 'wp-block-editor'], time(), true);
}

add_action('enqueue_block_assets', 'events_enqueue_block_assets');
function events_enqueue_block_assets()
{
    wp_enqueue_style('event-block', get_stylesheet_directory_uri() . '/assets/dist/blocks.css');
}
