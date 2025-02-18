<?php
/**
 * Plugin Name: Advanced Custom Fields REST API Filter
 * Plugin URI: https://otha.me?wp=acf-rest-filter
 * Description: A WordPress plugin that adds ACF fields to the REST API and enables dynamic filtering via query parameters.
 * Version: 1.1
 * Author: Othmane N.
 * Author URI: https://otha.me
 * License: GPLv2 or later
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain: acf-rest-filter
 */


if (!defined('ABSPATH')) {
    exit; // Prevent direct access
}

// 1. Add all ACF fields to the REST API response
function acf_add_fields_to_rest_api($response, $post, $request) {
    if (function_exists('get_fields')) {
        $acf_fields = get_fields($post->ID);
        if ($acf_fields) {
            $response->data['acf'] = $acf_fields;
        }
    }
    return $response;
}
add_filter('rest_prepare_work', 'acf_add_fields_to_rest_api', 10, 3);

// 2. Enable filtering by ANY ACF field dynamically
function acf_filter_work_by_acf_fields($args, $request) {
    if (!isset($request->get_params()['acf_filter'])) {
        return $args; // No filtering applied if acf_filter parameter is missing
    }

    $acf_filters = $request->get_params()['acf_filter']; // Expecting an array of filters

    if (!is_array($acf_filters)) {
        return $args;
    }

    $meta_query = ['relation' => 'AND'];

    foreach ($acf_filters as $field_key => $field_value) {
        $meta_query[] = [
            'key'     => sanitize_text_field($field_key), // ACF field key
            'value'   => sanitize_text_field($field_value), // Field value
            'compare' => '=' // Change to 'LIKE', '>', '<' if needed
        ];
    }

    $args['meta_query'] = $meta_query;

    return $args;
}
add_filter('rest_work_query', 'acf_filter_work_by_acf_fields', 10, 2);
