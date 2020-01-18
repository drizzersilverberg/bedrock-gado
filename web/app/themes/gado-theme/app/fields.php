<?php

namespace App;

use Carbon_Fields\Container;
use Carbon_Fields\Field;

/**
 * Define custom fields
 * Docs: https://carbonfields.net/docs/
 */
add_action('carbon_fields_register_fields', function () {
    Container::make('theme_options', __('Theme Options', 'gado'))
        ->add_fields(array(
            Field::make('text', 'crb_text', 'A simple text field'),
        ));
});


/**
 * Boot Carbon Fields
 */
add_action('after_setup_theme', function () {
    \Carbon_Fields\Carbon_Fields::boot();
});