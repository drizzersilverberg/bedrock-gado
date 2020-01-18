<?php

namespace App;

use Carbon_Fields\Container;
use Carbon_Fields\Field;

add_action('carbon_fields_register_fields', function () {
    // Theme Options Fields
    $theme_options_container = Container::make('theme_options', __('Theme Options', 'gado'))
        ->add_tab(__('General', 'gado'), array(
            Field::make('text', 'crb_foo', __('Foo')),
            // Field::make('text', 'crb_last_name', __('Last Name')),
            // Field::make('text', 'crb_position', __('Position')),
        ))
        ->add_tab(__('Date/Time', 'gado'), array(
            Field::make('text', 'crb_php_date_format', __('PHP Date Format')),
            Field::make('text', 'crb_js_date_format', __('Javascript Date Format')),
        ));

    // Theme Options - Header Fields
    Container::make('theme_options', __('Header', 'gado'))
        ->set_page_parent($theme_options_container) // reference to a top level container
        ->add_fields(array(
            Field::make('complex', 'crb_header_fields', __('Social Links', 'gado'))
                ->add_fields(array(
                    Field::make('text', 'facebook_link', __('Facebook Link', 'gado')),
                    Field::make('text', 'twitter_link', __('Twitter Link', 'gado')),
                ))->set_max(1)
        ));


    // Theme Options - Footer Fields
    // Container::make('theme_options', __('Footer', 'gado'))
    //     ->set_page_parent($theme_options_container) // reference to a top level container
    //     ->add_fields('crb_footer_fields', array(
    //     // Field::make('text', 'copyright', __('Copyright', 'gado')),
    //         Field::make('complex', 'crb_test')
    //             ->add_fields(array(
    //                 Field::make('text', 'name'),
    //                 Field::make('text', 'job_title'),
    //             ))
    //     ));

    // Pages - Front Page Fields
    Container::make( 'post_meta', __('Homepage Fields', 'gado'))
        ->where( 'post_id', '=', get_option( 'page_on_front' ))
        ->add_tab(__('Recipe', 'gado'), array(
            Field::make('complex', 'crb_fp_ingredients', __('Ingredients', 'gado'))
                ->add_fields(array(
                    Field::make('text', 'qty_mass', __('Quantity/Mass', 'gado'))
                        ->set_width(30), // condense layout so field takes only 50% of the available width
                    Field::make('text', 'name', __('Name', 'gado'))
                        ->set_width(70), // condense layout so field takes only 50% of the available width
                ))
        ))
        ->add_tab(__('How to Cook', 'gado'), array(
            Field::make('complex', 'crb_fp_how_to_cook', __('Instructions', 'gado'))
                ->add_fields(array(
                    Field::make('textarea', 'instruction', __('Instruction', 'gado'))
                        ->set_rows(3)
                ))
        ));
});

/**
 * Boot Carbon Fields
 */
add_action('after_setup_theme', function () {
    \Carbon_Fields\Carbon_Fields::boot();
});