<?php

require_once ("lib/enqueue-assets.php");
require_once ("lib/navigation.php");
require_once ("lib/sidebars.php");
require_once ("lib/customize.php");


show_admin_bar(false);

function custom_excerptLength($words)
{
    $excerpt_length = get_theme_mod('custom_excerpt_length', '20');

    return $excerpt_length;
}

function custom_product_title_excerpt_length($title)
{
    $length = 10; // Change the number to the desired length for the title excerpt
    $title_excerpt = wp_trim_words($title, $length, '...');
    return $title_excerpt;
}

add_filter('the_title', 'custom_product_title_excerpt_length');


//add_filter('the_title', 'custom_h6title');

add_filter('excerpt_length', 'custom_excerptLength');



function custom_postorderasc($query)
{
    $query->set('order', 'ASC');
}

add_action('pre_get_posts', 'custom_postorderasc');

function diwp_theme_customizer_options($wp_customize)
{

    $wp_customize->add_setting(
        'diwp_logo',
        array(
            'sanitize_callback' => 'esc_url_raw'
        )
    );

    $wp_customize->add_control(
        new WP_Customize_Image_Control(
            $wp_customize,
            'diwp_logo_control',
            array(
                'label' => 'Upload Website Logo',
                'priority' => 20,
                'section' => 'title_tagline',
                'settings' => 'diwp_logo',
                'button_labels' => array( // All These labels are optional
                    'select' => 'Select Logo',
                    'remove' => 'Remove Logo',
                    'change' => 'Change Logo',
                )
            )
        )
    );

}

add_action('customize_register', 'diwp_theme_customizer_options');

//Darkening the background colour - footer

function output_footer_bg_color_css()
{
    // Get the footer background color from customizer
    $footer_bg_color = ""; // Default color

    $customMode = get_theme_mod('custom_dark_mode', 'light');


    if ($customMode == 'light') {
        $footer_bg_color = get_theme_mod('site_background_light_color', '#f2f2f2');
    } else {
        $footer_bg_color = get_theme_mod('site_background_dark_color', '#1a1a1a');
    }

    $Customiser_Dark_Percentage = get_theme_mod('custom_footer_bg_percentage', '175%'); //Customiser Percentage


    // Calculate a darker shade of the footer background color
    $darker_footer_bg_color = adjust_color_brightness($footer_bg_color, $Customiser_Dark_Percentage); // Decrease brightness by 20%

    ?>
    <style type="text/css">
        /* Footer Background Color */
        .footer {
            background-color:
                <?php echo esc_attr($footer_bg_color); ?>
            ;
        }

        /* Darker Footer Background Color */
        .footer.darker-bg,
        header,
        .navbar ul ul,
        .navbar ul li,
        .categories-list li a,
        .card-link a,
        .pagination .prev a,
        .pagination .next a {
            background-color:
                <?php echo esc_attr($darker_footer_bg_color); ?>
            ;
        }

        .categories-list li a:hover,
        .card-link a:hover,
        .pagination a:hover,
        .pagination span.current:hover,
        .pagination .prev a:hover,
        .pagination .next a:hover {
            background-color:
                <?php echo esc_attr($darker_footer_bg_color); ?>
            ;
            opacity: 90%;
            color: #fff;
        }
    </style>
    <?php
}

// Add action to output the CSS in the header
add_action('wp_head', 'output_footer_bg_color_css');


// Function to adjust color brightness
function adjust_color_brightness($hex, $steps)
{
    // Remove '#' from hex color code
    $hex = str_replace('#', '', $hex);

    // Convert hex color to RGB
    $rgb = array_map('hexdec', str_split($hex, 2));

    // Adjust brightness for each RGB component
    foreach ($rgb as &$color) {
        $color = max(0, min(255, $color + $steps)); // Ensure color value stays within 0-255 range
    }

    // Convert adjusted RGB back to hex
    $hex = implode('', array_map('dechex', $rgb));

    // Return adjusted hex color
    return '#' . $hex;
}


//Font Installation

function customizer_settings($wp_customize)
{

    // Add setting for font selection
    $wp_customize->add_setting(
        'selected_font',
        array(
            'default' => 'Open Sans',
        )
    );

    // Add control for font selection
    $wp_customize->add_control(
        'selected_font',
        array(
            'label' => __('Select the Website Font', 'text-domain'),
            'section' => 'custom_header_options',
            'type' => 'select',
            'choices' => array(
                'Anton' => 'Anton',
                'Archivo' => 'Archivo',
                'Arimo' => 'Arimo',
                'Fira Sans' => 'Fira Sans',
                'Josefin Sans' => 'Josefin Sans',
                'Kanit' => 'Kanit',
                'Lato' => 'Lato',
                'Merriweather' => 'Merriweather',
                'Pacifico' => 'Pacifico',
                'Protest Revolution' => 'Protest Revolution',
                'Protest Riot' => 'Protest Riot',
                'Protest Strike' => 'Protest Strike',
                'Roboto' => 'Roboto',
                'Rubik' => 'Rubik',
                'Zilla Slab' => 'Zilla Slab'
            ),
        )
    );
}
add_action('customize_register', 'customizer_settings');
add_action('customize_register', 'customizer_settings');


// Lightbox
function enqueue_fancybox()
{
    // Enqueue Fancybox JavaScript file
    wp_enqueue_script('fancybox', 'https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js', array('jquery'), '3.5.7', true);

    // Enqueue Fancybox CSS file
    wp_enqueue_style('fancybox-css', 'https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.css', array(), '3.5.7');
}
add_action('wp_enqueue_scripts', 'enqueue_fancybox');

?>