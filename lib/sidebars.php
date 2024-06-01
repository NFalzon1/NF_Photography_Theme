<?php

function classExample_sidebar_widgets()
{

    // register_sidebar(
    //     array(
    //         'id' => 'footer-1-sidebar',
    //         'name' => 'Footer 1 Sidebar',
    //         'description' => 'Footer 1 Sidebar ',
    //         'before_widget' => '<section id="%1$s" class="sidebar-widget %2$s">',
    //         'after_widget' => '</section>',
    //     )
    // );
    // register_sidebar(
    //     array(
    //         'id' => 'footer-2-sidebar',
    //         'name' => 'Footer 2 Sidebar',
    //         'description' => 'Footer 2 Sidebar ',
    //         'before_widget' => '<section id="%1$s" class="sidebar-widget %2$s">',
    //         'after_widget' => '</section>',
    //     )
    // );
    // register_sidebar(
    //     array(
    //         'id' => 'footer-3-sidebar',
    //         'name' => 'Footer 3 Sidebar',
    //         'description' => 'Footer 3 Sidebar ',
    //         'before_widget' => '<section id="%1$s" class="sidebar-widget %2$s">',
    //         'after_widget' => '</section>',
    //     )
    // );
}

function custom_footer_sidebars()
{
    $footer_layout = get_theme_mod('custom_footer_widget_count', '2');
    for ($i = 0; $i < $footer_layout; $i++) {
        register_sidebar(array('id' => 'footer-sidebar-' . ($i + 1), 'name' => 'Footer Sidebar ' . ($i + 1), 'description' => 'Footer Widgets Section', 'before_widget' => '<section id="%1$s" class="footer-widget %2$s">', 'after_widget' => '</section>'));
    }
}

add_action('widgets_init', 'custom_footer_sidebars');


add_action('widgets_init', 'classExample_sidebar_widgets');
add_action('widgets_init', 'custom_footer_sidebars');
?>