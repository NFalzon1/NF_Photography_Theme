<?php

function custom_customize_register($wp_customize)
{

    $wp_customize->add_panel(
        'header_panel',
        array(
            'priority' => 10,
            'capability' => 'edit_theme_options',
            'theme_supports' => '',
            'title' => 'Header Settings',
            'description' => '',
        )
    );

    $wp_customize->add_section(
        'custom_header_options',
        array(
            'title' => 'General Settings',
            'panel' => 'header_panel',

        )
    );

    $wp_customize->add_setting(
        'custom_heading_colour',
        array(
            'default' => '#000000',
        )
    );

    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'custom_heading_colour',
            array(
                'label' => 'Choose the Heading & Text Colour (Covers all paragraphs and headers of the website)',
                'section' => 'custom_blog_options',
                'settings' => 'custom_heading_colour'
            )
        )
    );

    $wp_customize->add_setting(
        'custom_burger_menu_colour',
        array(
            'default' => '255,255,255',
            'sanitize_callback' => 'sanitize_text_field'
        )
    );


    $wp_customize->add_control(
        'custom_burger_menu_colour',
        array(
            'type' => 'select',
            'label' => 'Mobile Hamburger Icon Colour',
            'description'=> 'Preview the options by selecting the mobile preview icon.',
            'choices' => array(
                '0,0,0' => 'Black',
                '255,255,255' => 'White'
            ),
            'section' => 'custom_header_options'
        )
    );

    $wp_customize->add_section(
        'custom_nav_options',
        array(
            'title' => 'Navigation Settings',
            'description' => 'You can change navigation opions here',
            'panel' => 'header_panel',

        )
    );

    $wp_customize->add_setting(
        'custom_logo_placement',
        array(
            'default' => 'top',
            'sanitize_callback' => 'sanitize_text_field'
        )
    );


    $wp_customize->add_control(
        'custom_logo_placement',
        array(
            'type' => 'select',
            'label' => 'Select the Navigation Logo Placement',
            'choices' => array(
                'top' => 'Top',
                'left' => 'Left',
                'right' => 'Right'
            ),
            'section' => 'custom_header_options'
        )
    );

    $wp_customize->add_setting(
        'custom_dark_mode',
        array(
            'default' => 'Light Mode',
            'sanitize_callback' => 'sanitize_text_field'
        )
    );


    $wp_customize->add_control(
        'custom_dark_mode',
        array(
            'type' => 'select',
            'label' => 'Change the dark mode setting',
            'choices' => array(
                'light' => 'Light Mode',
                'dark' => 'Dark Mode',
            ),
            'section' => 'custom_nav_options'
        )
    );

    $light_mode_colours = array(
        '#f2f2f2' => __('Light Gray', 'text-domain'),
        '#e6f7ff' => __('Light Blue', 'text-domain'),
        '#e6ffe6' => __('Light Green', 'text-domain'),
        '#fff5e6' => __('Light Beige', 'text-domain'),
        '#ffe6f2' => __('Light Pink', 'text-domain'),
        '#f2e6ff' => __('Light Lavender', 'text-domain'),
        '#ffffcc' => __('Light Yellow', 'text-domain'),
        '#ffe6cc' => __('Light Peach', 'text-domain'),
        '#e6fff2' => __('Light Mint', 'text-domain'),
        '#ffe6e6' => __('Light Coral', 'text-domain'),
        '#e6f2ff' => __('Light Sky Blue', 'text-domain'),
        '#f2ffe6' => __('Light Lime', 'text-domain'),
        '#f2e6e6' => __('Light Rose', 'text-domain'),
        '#fff2e6' => __('Light Orange', 'text-domain'),
        '#e6f2e6' => __('Light Olive', 'text-domain'),
        '#f2f2e6' => __('Light Cream', 'text-domain'),
        '#e6e6ff' => __('Light Periwinkle', 'text-domain'),
        '#f5e6f2' => __('Light Orchid', 'text-domain'),
        '#f2f2ff' => __('Light Lilac', 'text-domain'),
    );

    $dark_mode_colours = array(
        '#222222' => __('Dark Charcoal', 'text-domain'),
        '#555555' => __('Dark Steel', 'text-domain'),
        '#777777' => __('Dark Ash', 'text-domain'),
        '#999999' => __('Dark Silver', 'text-domain'),
        '#bbbbbb' => __('Dark Gunmetal', 'text-domain'),
        '#dddddd' => __('Dark Zinc', 'text-domain'),
        '#001f3f' => __('Dark Navy', 'text-domain'),
        '#003366' => __('Dark Royal Blue', 'text-domain'),
        '#660033' => __('Dark Maroon', 'text-domain'),
        '#660066' => __('Dark Purple', 'text-domain'),
        '#663300' => __('Dark Brown', 'text-domain'),
        '#333300' => __('Dark Olive', 'text-domain')
    );



    // Add Background Color setting
    $wp_customize->add_setting(
        'site_background_light_color',
        array(

            'default' => '#f2f2f2',
            'sanitize_callback' => function ($color) use ($light_mode_colours) {
                // Sanitize the selected color
                return array_key_exists($color, $light_mode_colours) ? $color : '#f2f2f2';
            },
        )
    );

    // Add Background Color control as dropdown select
    $wp_customize->add_control(
        'site_background_light_color',
        array(
            'label' => __('Background Color', 'text-domain'),
            'section' => 'custom_nav_options',
            'type' => 'select',
            'choices' => $light_mode_colours,
        )
    );

    $wp_customize->add_setting(
        'site_background_dark_color',
        array(

            'default' => '#222222',
            'sanitize_callback' => function ($color) use ($dark_mode_colours) {
                // Sanitize the selected color
                return array_key_exists($color, $dark_mode_colours) ? $color : '#1a1a1a';
            },
        )
    );

    // Add Background Color control as dropdown select
    $wp_customize->add_control(
        'site_background_dark_color',
        array(
            'label' => __('Background Color', 'text-domain'),
            'section' => 'custom_nav_options',
            'type' => 'select',
            'choices' => $dark_mode_colours,
        )
    );


    function colour_dropdown_change()
    {
        ?>
        <script>
            jQuery(document).ready(function ($) {

                // Retrieve the previously selected mode value from local storage
                var selectedModeValue = localStorage.getItem('selectedMode') || 'light';

                // Set the initial visibility of color menus based on the retrieved mode value
                if (selectedModeValue === 'light') {
                    $('#customize-control-site_background_light_color').show();
                    $('#customize-control-site_background_dark_color').hide();
                } else if (selectedModeValue === 'dark') {
                    $('#customize-control-site_background_light_color').hide();
                    $('#customize-control-site_background_dark_color').show();
                }

                // Attach change event listener to the dropdown menu
                $('#_customize-input-custom_dark_mode').on('change', function () {
                    // Log the selected value for debugging
                    console.log($(this).val());

                    // Get the selected mode value
                    selectedModeValue = $(this).val();

                    // Save the selected mode value to local storage
                    localStorage.setItem('selectedMode', selectedModeValue);

                    // Perform actions based on the selected mode value
                    if (selectedModeValue === 'light') {
                        $('#customize-control-site_background_light_color').show();
                        $('#customize-control-site_background_dark_color').hide();
                    } else if (selectedModeValue === 'dark') {
                        $('#customize-control-site_background_light_color').hide();
                        $('#customize-control-site_background_dark_color').show();
                    }
                });

            });
        </script>
        <?php
    }


    add_action('customize_controls_print_footer_scripts', 'colour_dropdown_change');

    $wp_customize->add_setting(
        'custom_nav_text_colour',
        array(
            'default' => '#0a0a0a',
        )
    );

    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'custom_nav_text_colour',
            array(
                'label' => 'Choose the text colour',
                'section' => 'custom_nav_options',
                'settings' => 'custom_nav_text_colour'
            )
        )
    );

    $wp_customize->add_section(
        'custom_search_options',
        array(
            'title' => 'Search Settings',
            'description' => 'You can change the search opions here',
            'panel' => 'header_panel',

        )
    );

    $wp_customize->add_setting(
        'custom_search_icon_placement',
        array(
            'default' => 'right',
            'sanitize_callback' => 'sanitize_text_field'
        )
    );


    $wp_customize->add_control(
        'custom_search_icon_placement',
        array(
            'type' => 'select',
            'label' => 'Search Icon Placement',
            'choices' => array(
                'left' => 'Left',
                'right' => 'Right',
            ),
            'section' => 'custom_search_options'
        )
    );



    // //$wp_customize->add_panel(
    //     'landing_page',
    //     array(
    //         'priority' => 10,
    //         'capability' => 'edit_theme_options',
    //         'theme_supports' => '',
    //         'title' => 'Landing Page Settings',
    //         'description' => '',
    //     )
    // );

    $wp_customize->add_section(
        'custom_landing_image_options',
        array(
            'title' => __('Landing Page Images', 'custom_landing_options'),
            'priority' => 10,
            'panel' => 'landing_page',
        )
    );



    $menu_items = wp_get_nav_menu_items('landing-page');

    if ($menu_items) {
        foreach ($menu_items as $key => $menu_item) {
            $theme_mod_key = 'landing_image' . ($key + 1);

            // Add setting for the image uploader
            $wp_customize->add_setting(
                $theme_mod_key,
                array(
                    'sanitize_callback' => 'esc_url_raw'
                )
            );

            // Add control for the image uploader
            $wp_customize->add_control(
                new WP_Customize_Image_Control(
                    $wp_customize,
                    $theme_mod_key,
                    array(
                        'label' => 'Upload Image for ' . esc_html($menu_item->title),
                        'priority' => 20 + $key, // Adjust priority as needed
                        'section' => 'custom_landing_image_options',
                        'settings' => $theme_mod_key,
                        'button_labels' => array(
                            'select' => 'Select Image',
                            'remove' => 'Remove Image',
                            'change' => 'Change Image',
                        )
                    )
                )
            );
        }
    }




    $wp_customize->add_section(
        'custom_blog_options',
        array(
            'title' => 'Blog & General Settings',

        )
    );

    $wp_customize->add_setting(
        'custom_excerpt_length',
        array(
            'default' => '20',
            'sanitize_callback' => 'sanitize_text_field'
        )
    );

    $wp_customize->add_control(
        'custom_excerpt_length',
        array(
            'type' => 'select',
            'label' => 'Excerpt Length',
            'choices' => array(
                '10' => '10 words',
                '15' => '15 words',
                '20' => '20 words',
                '25' => '25 words',
                '30' => '30 words',
            ),

            'section' => 'custom_blog_options'
        )
    );

    $wp_customize->add_panel(
        'store_panel',
        array(
            'priority' => 10,
            'capability' => 'edit_theme_options',
            'theme_supports' => '',
            'title' => 'Store Settings',
            'description' => '',
        )
    );

    $wp_customize->add_section(
        'custom_store_add_to_cart_options',
        array(
            'title' => 'Add to Cart Settings',
            'description' => 'You can change the add to cart styling here',
            'panel' => 'store_panel',
        )
    );

    $wp_customize->add_section(
        'custom_store_product_options',
        array(
            'title' => 'Product Settings',
            'description' => 'You can change the product styling here',
            'panel' => 'store_panel',
        )
    );

    $wp_customize->add_section(
        'custom_store_sale_options',
        array(
            'title' => 'On Sale Settings',
            'description' => 'You can change the on sale styling here',
            'panel' => 'store_panel',
        )
    );

    $wp_customize->add_section(
        'custom_store_checkout_options',
        array(
            'title' => 'Checkout Settings',
            'description' => 'You can change the Checkout styling here',
            'panel' => 'store_panel',
        )
    );


    $wp_customize->add_setting(
        'custom_add_to_card_bg',
        array(
            'default' => '#ffffff',
        )
    );

    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'custom_add_to_card_bg',
            array(
                'label' => 'Background Colour of the Add to Cart Button',
                'description'=> 'This affects the store page, product page and checkout page',
                'section' => 'custom_store_product_options',
                'settings' => 'custom_add_to_card_bg'
            )
        )
    );

    $wp_customize->add_setting(
        'custom_add_to_card_text',
        array(
            'default' => '#1e73be',
        )
    );

    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'custom_add_to_card_text',
            array(
                'label' => 'Text Colour of the Add to Cart Button',
                'description'=> 'This affects the store page, product page and checkout page',
                'section' => 'custom_store_product_options',
                'settings' => 'custom_add_to_card_text'
            )
        )
    );

    $wp_customize->add_setting(
        'custom_loop_product_title_alignment',
        array(
            'default' => 'Center',
            'sanitize_callback' => 'sanitize_text_field'
        )
    );

    $wp_customize->add_control(
        'custom_loop_product_title_alignment',
        array(
            'type' => 'select',
            'label' => 'Product Title Alignment',
            'description'=> 'This affects only the store page',
            'choices' => array(
                'Left' => 'Left',
                'center' => 'Center',
                'Right' => 'Right',
            ),

            'section' => 'custom_store_product_options'
        )
    );


    $wp_customize->add_setting(
        'custom_store_img_radius',
        array(
            'default' => '0px',
            'sanitize_callback' => 'sanitize_text_field'
        )
    );

    $wp_customize->add_control(
        'custom_store_img_radius',
        array(
            'type' => 'select',
            'label' => 'Product Image Border Radius',
            'description'=> 'This affects the store page, product page and checkout page',
            'choices' => array(
                '0px' => '0px',
                '10px' => '10px',
                '20px' => '20px',
                '30px' => '30px',
                '40px' => '40px',
                '50px' => '50px',
            ),

            'section' => 'custom_store_product_options'
        )
    );

    $wp_customize->add_setting(
        'custom_onsale_bg',
        array(
            'default' => '#d32151',
        )
    );

    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'custom_onsale_bg',
            array(
                'label' => 'Choose the background colour of the Sale icon',
                'description'=> 'This affects the store page and product page',
                'section' => 'custom_store_sale_options',
                'settings' => 'custom_onsale_bg'
            )
        )
    );

    $wp_customize->add_setting(
        'custom_onsale_text',
        array(
            'default' => '#ffffff',
        )
    );

    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'custom_onsale_text',
            array(
                'label' => 'Choose the text colour of the Sale icon',
                'description'=> 'This affects the store page and product page',
                'section' => 'custom_store_sale_options',
                'settings' => 'custom_onsale_text'
            )
        )
    );



    $wp_customize->add_setting(
        'custom_checkout_product_text',
        array(
            'default' => '#0a0a0a',
        )
    );

    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'custom_checkout_product_text',
            array(
                'label' => 'Choose the text colour of the Checkout Page text',
                'section' => 'custom_store_checkout_options',
                'settings' => 'custom_checkout_product_text'
            )
        )
    );

    $wp_customize->add_setting(
        'custom_checkout_product_text_hover',
        array(
            'default' => '#1e73be',
        )
    );

    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'custom_checkout_product_text_hover',
            array(
                'label' => 'Choose the text colour of the Checkout Page on hover',
                'section' => 'custom_store_checkout_options',
                'settings' => 'custom_checkout_product_text_hover'
            )
        )
    );

    $wp_customize->add_setting(
        'custom_checkout_title_weight',
        array(
            'default' => 'bold',
            'sanitize_callback' => 'sanitize_text_field'
        )
    );

    $wp_customize->add_control(
        'custom_checkout_title_weight',
        array(
            'type' => 'select',
            'label' => "Change the title's weight",
            'choices' => array(
                'normal' => 'Regular',
                'bold' => 'Bold',

            ),

            'section' => 'custom_store_checkout_options'
        )
    );


    $wp_customize->add_panel(
        'pagination_panel',
        array(
            'priority' => 10,
            'capability' => 'edit_theme_options',
            'theme_supports' => '',
            'title' => 'Store Pagination Settings',
            'description' => '',
        )
    );

    $wp_customize->add_section(
        'custom_store_pagination_options',
        array(
            'title' => 'General Settings',
            'description' => 'You can change the Store Pagination styling here',
            'panel' => 'pagination_panel',
        )
    );

    $wp_customize->add_section(
        'custom_store_pagination_current_panel',
        array(
            'title' => 'Current Page Settings',
            'description' => 'You can change the Store Pagination styling here',
            'panel' => 'pagination_panel',
        )
    );

    $wp_customize->add_section(
        'custom_store_pagination_not_selected_panel',
        array(
            'title' => 'Not Selected Settings',
            'description' => 'You can change the Pagination of the not selected styling here',
            'panel' => 'pagination_panel',
        )
    );

    $wp_customize->add_section(
        'custom_store_pagination_not_selected_panel_hover',
        array(
            'title' => 'Not Selected Hover Settings',
            'description' => 'You can change the hover effect of the Not Selected pagination',
            'panel' => 'pagination_panel',
        )
    );


    $wp_customize->add_setting(
        'custom_pagination_bg_not_selected',
        array(
            'default' => '#ffffff',
        )
    );

    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'custom_pagination_bg_not_selected',
            array(
                'label' => 'Choose the background colour of the not selected Pagination',
                'section' => 'custom_store_pagination_not_selected_panel',
                'settings' => 'custom_pagination_bg_not_selected'
            )
        )
    );

    $wp_customize->add_setting(
        'custom_store_pagination_text_not_selected',
        array(
            'default' => '#1e73be',
        )
    );

    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'custom_store_pagination_text_not_selected',
            array(
                'label' => 'Choose the text colour of the not selected Pagination',
                'section' => 'custom_store_pagination_not_selected_panel',
                'settings' => 'custom_store_pagination_text_not_selected'
            )
        )
    );


    $wp_customize->add_setting(
        'custom_pagination_bg_not_selected_hover',
        array(
            'default' => '#ffffff',
        )
    );

    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'custom_pagination_bg_not_selected_hover',
            array(
                'label' => 'Choose the background colour (Hover) of the not selected Pagination',
                'section' => 'custom_store_pagination_not_selected_panel_hover',
                'settings' => 'custom_pagination_bg_not_selected_hover'
            )
        )
    );

    $wp_customize->add_setting(
        'custom_store_pagination_text_not_selected_hover',
        array(
            'default' => '#1e73be',
        )
    );

    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'custom_store_pagination_text_not_selected_hover',
            array(
                'label' => 'Choose the text colour (Hover) of the not selected Pagination',
                'section' => 'custom_store_pagination_not_selected_panel_hover',
                'settings' => 'custom_store_pagination_text_not_selected_hover'
            )
        )
    );







    $wp_customize->add_setting(
        'custom_store_pagination_bg_selected',
        array(
            'default' => '#1e73be',
        )
    );

    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'custom_store_pagination_bg_selected',
            array(
                'label' => 'Choose the background colour of the selected Pagination',
                'section' => 'custom_store_pagination_current_panel',
                'settings' => 'custom_store_pagination_bg_selected'
            )
        )
    );

    $wp_customize->add_setting(
        'custom_store_pagination_text_selected',
        array(
            'default' => '#ffffff',
        )
    );

    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'custom_store_pagination_text_selected',
            array(
                'label' => 'Choose the text colour of the selected Pagination',
                'section' => 'custom_store_pagination_current_panel',
                'settings' => 'custom_store_pagination_text_selected'
            )
        )
    );

    $wp_customize->add_setting(
        'custom_pagination_size',
        array(
            'default' => '24px',
            'sanitize_callback' => 'sanitize_text_field'
        )
    );

    $wp_customize->add_control(
        'custom_pagination_size',
        array(
            'type' => 'select',
            'label' => "Pagination Size",
            'choices' => array(
                '12px' => 'Small',
                '24px' => 'Medium',
                '32px' => 'Large',

            ),

            'section' => 'custom_store_pagination_options'
        )
    );






    $wp_customize->add_panel(
        'footer_panel',
        array(
            'priority' => 10,
            'capability' => 'edit_theme_options',
            'theme_supports' => '',
            'title' => 'Footer Settings',
            'description' => '',
        )
    );




    $wp_customize->add_section(
        'custom_footer_options',
        array(
            'title' => 'Footer Options',
            'description' => 'You can change footer here',
            'panel' => 'footer_panel'
        )
    );

    $wp_customize->add_section(
        'custom_copyright_options',
        array(
            'title' => 'Copyright Options',
            'description' => 'You can change the Copyright Notice here',
            'panel' => 'footer_panel'
        )
    );

    $wp_customize->add_setting(
        'custom_footer_widget_count',
        array(
            'default' => '3',
            'sanitize_callback' => 'sanitize_text_field'
        )
    );

    $wp_customize->add_control(
        'custom_footer_widget_count',
        array(
            'type' => 'select',
            'label' => 'Footer Widget Count',
            'choices' => array(
                '1' => '1 Widget',
                '2' => '2 Widget',
                '3' => '3 Widget',
            ),

            'section' => 'custom_footer_options'
        )
    );

    $wp_customize->add_setting(
        'custom_footer_border_radius',
        array(
            'default' => '10px',
            'sanitize_callback' => 'sanitize_text_field'
        )
    );

    $wp_customize->add_control(
        'custom_footer_border_radius',
        array(
            'type' => 'select',
            'label' => 'Footer Border Radius',
            'choices' => array(
                '10px' => '10px',
                '20px' => '20px',
                '30px' => '30px',
                '40px' => '40px',
                '50px' => '50px',
            ),

            'section' => 'custom_footer_options'
        )
    );

    $wp_customize->add_setting(
        'custom_footer_bg_percentage',
        array(
            'default' => '175',
            'sanitize_callback' => 'sanitize_text_field'
        )
    );

    $wp_customize->add_control(
        'custom_footer_bg_percentage',
        array(
            'type' => 'select',
            'label' => 'Background Colour Brightness / Darkness Controller',
            'description' => 'You can change the brightness / darkness percentage of the navigation bar and footer background colour.',
            'choices' => array(
                '-200' => '-200%',
                '-175' => '-175%',
                '-150' => '-150%',
                '-125' => '-125%',
                '-100' => '-100%',
                '-75' => '-75%',
                '-50' => '-50%',
                '-25' => '-25%',
                '0' => '0%',
                '25' => '25%',
                '50' => '50%',
                '75' => '75%',
                '100' => '100%',
                '125' => '125%',
                '150' => '150%',
                '175' => '175%',
                '200' => '200%',
            ),

            'section' => 'custom_nav_options'
        )
    );





    $wp_customize->add_setting(
        'custom_copyright_bg',
        array(
            'default' => '#222',
        )
    );

    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'custom_copyright_bg',
            array(
                'label' => 'Choose the background colour of the copyright section',
                'section' => 'custom_copyright_options',
                'settings' => 'custom_copyright_bg'
            )
        )
    );

    $wp_customize->add_setting(
        'custom_copyright_text',
        array(
            'default' => '#ccc',
        )
    );

    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'custom_copyright_text',
            array(
                'label' => 'Choose the text colour of the copyright text',
                'section' => 'custom_copyright_options',
                'settings' => 'custom_copyright_text'
            )
        )
    );

    $wp_customize->add_setting(
        'custom_footer_copyright_placement',
        array(
            'default' => 'Center',
            'sanitize_callback' => 'sanitize_text_field'
        )
    );

    $wp_customize->add_control(
        'custom_footer_copyright_placement',
        array(
            'type' => 'select',
            'label' => 'Copyright Text Placement',
            'choices' => array(
                'Left' => 'Left',
                'center' => 'Center',
                'Right' => 'Right',
            ),

            'section' => 'custom_copyright_options'
        )
    );

    $wp_customize->add_panel(
        'portfolio_panel',
        array(
            'priority' => 10,
            'capability' => 'edit_theme_options',
            'theme_supports' => '',
            'title' => 'Portfolio Settings',
            'description' => '',
        )
    );

    $wp_customize->add_section(
        'custom_single_portfolio',
        array(
            'title' => 'Single Portfolio Options',
            'description' => 'You can change footer here',
            'panel' => 'portfolio_panel'
        )
    );

    $wp_customize->add_setting(
        'custom_single_grid',
        array(
            'default' => '3',
            'sanitize_callback' => 'sanitize_text_field'
        )
    );

    $wp_customize->add_control(
        'custom_single_grid',
        array(
            'type' => 'select',
            'label' => 'Amount of images per row',
            'choices' => array(
                '3' => '3 Images per row',
                '4' => '4 Images per row',
                '5' => '5 Images per row',
            ),

            'section' => 'custom_single_portfolio'
        )
    );

    $wp_customize->add_setting(
        'custom_port_title_showing',
        array(
            'default' => 'Yes',
            'sanitize_callback' => 'sanitize_text_field'
        )
    );

    $wp_customize->add_control(
        'custom_port_title_showing',
        array(
            'type' => 'select',
            'label' => 'Choose if the title of the image wants to be shown',
            'choices' => array(
                'Yes' => 'Yes',
                'No' => 'No',
            ),

            'section' => 'custom_single_portfolio'
        )
    );

    $wp_customize->add_setting(
        'custom_portfolio_card_bg',
        array(
            'default' => '#0a0a0a',
        )
    );

    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'custom_portfolio_card_bg',
            array(
                'label' => 'Choose the Photo Card Background Colour',
                'section' => 'custom_single_portfolio',
                'settings' => 'custom_portfolio_card_bg'
            )
        )
    );

    

    

    $wp_customize->add_setting(
        'custom_portfolio_text_bg',
        array(
            'default' => '#000000',
        )
    );

    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'custom_portfolio_text_bg',
            array(
                'label' => 'Choose the Photo Card Text Colour',
                'section' => 'custom_single_portfolio',
                'settings' => 'custom_portfolio_text_bg'
            )
        )
    );

}

add_action("customize_register", "custom_customize_register");

?>