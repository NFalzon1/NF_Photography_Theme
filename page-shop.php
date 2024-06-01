<?php get_header(); ?>

<h1 class="text-center"> <?php the_title(); ?> </h1>

<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <?php
            $args = array('section_title' => '');
            get_template_part("template-parts/loop", null, $args);
            ?>
        </div>
    </div>
</div>

<?php get_footer(); ?>

<style>
    .text-center {
        padding-top: 30px;
        color:
            <?php echo get_theme_mod('custom_heading_colour', '#000000'); ?>
        ;
    }

    .woocommerce:where(body:not(.woocommerce-block-theme-has-button-styles)) #respond input#submit,
    .woocommerce:where(body:not(.woocommerce-block-theme-has-button-styles)) a.button,
    .woocommerce:where(body:not(.woocommerce-block-theme-has-button-styles)) button.button,
    .woocommerce:where(body:not(.woocommerce-block-theme-has-button-styles)) input.button,
    :where(body:not(.woocommerce-block-theme-has-button-styles)) .woocommerce #respond input#submit,
    :where(body:not(.woocommerce-block-theme-has-button-styles)) .woocommerce a.button,
    :where(body:not(.woocommerce-block-theme-has-button-styles)) .woocommerce button.button,
    :where(body:not(.woocommerce-block-theme-has-button-styles)) .woocommerce input.button {
        background-color:
            <?php echo get_theme_mod('custom_add_to_card_bg', '#ffffff'); ?>
        ;
        color:
            <?php echo get_theme_mod('custom_add_to_card_text', '#000000'); ?>
        ;
    }

    .woocommerce ul.products li.product a img {
        border-radius:
            <?php echo get_theme_mod('custom_store_img_radius', '0px'); ?>
        ;
    }

    .woocommerce-ordering {
        margin-bottom: 20px;
        font-size: 16px;
    }

    /* Professional styling for WooCommerce Sort By dropdown */

    /* container-fluid styling */
    .woocommerce-ordering {
        margin-bottom: 20px;
    }

    /* Dropdown select styling */
    .woocommerce-ordering select {
        appearance: none;
        -webkit-appearance: none;
        -moz-appearance: none;
        padding: 10px 15px;
        font-size: 16px;
        border: 1px solid #ccc;
        border-radius: 4px;
        background-color: #fff;
        color: #333;
        cursor: pointer;
        transition: border-color 0.3s ease, background-color 0.3s ease;
    }

    /* Dropdown arrow icon styling */
    .woocommerce-ordering select::after {
        content: '\25BC';
        /* Unicode character for down arrow */
        font-size: 16px;
        color: #555;
        pointer-events: none;
        position: absolute;
        top: 50%;
        right: 15px;
        transform: translateY(-50%);
    }

    /* Hover effect for the dropdown */
    .woocommerce-ordering select:hover {
        border-color: #007bff;
    }

    /* Focus effect for the dropdown */
    .woocommerce-ordering select:focus {
        outline: none;
        border-color: #007bff;
        background-color: #f0f8ff;
        /* Light blue background when focused */
    }

    .woocommerce-loop-product__title {
        color:
            <?php echo get_theme_mod('custom_heading_colour', '#000000'); ?>
        ;
        text-align:
            <?php echo get_theme_mod('custom_loop_product_title_alignment', 'center'); ?>
    }

    .woocommerce:where(body:not(.woocommerce-uses-block-theme)) ul.products li.product .price {
        color:
            <?php echo get_theme_mod('custom_heading_colour', '#000000'); ?>
        ;
        text-align:
            <?php echo get_theme_mod('custom_loop_product_title_alignment', 'center'); ?>
    }

    .onsale {
        background-color:
            <?php echo get_theme_mod('custom_onsale_bg', '#d32151'); ?>
            !important;
        color:
            <?php echo get_theme_mod('custom_onsale_text', '#ffffff'); ?>
            !important;
    }

    .woocommerce ul.products li.product .button {
        display: flex;
        justify-content: center;
    }

    .wc-block-components-button:not(.is-link) .wc-block-components-button__text {
        display: block;
        background-color: #ffffff;
        padding: 10px;
        color: #000000;
        text-decoration: none;
    }

    .body:not(.woocommerce-block-theme-has-button-styles) .wc-block-components-button:not(.is-link) {
        text-decoration: none;
    }

    .wc-block-cart__submit-button {
        text-decoration: none;
    }

    .wc-block-components-product-name {
        color:
            <?php echo get_theme_mod('custom_checkout_product_text', '#0a0a0a'); ?>
            !important;
        text-decoration: none;
        font-weight:
            <?php echo get_theme_mod('custom_checkout_title_weight', 'bold'); ?>
            !important;
    }

    .wc-block-components-product-name:hover {
        color:
            <?php echo get_theme_mod('custom_checkout_product_text_hover', '#1e73be'); ?>
            !important;
        text-decoration: none;
        font-weight:
            <?php echo get_theme_mod('custom_checkout_title_weight', 'bold'); ?>
            !important;
        ;
    }


    /* Current Page */
    .woocommerce nav.woocommerce-pagination ul li span.current {
        color:
            <?php echo get_theme_mod('custom_store_pagination_text_selected', '#ffffff'); ?>
            !important;
        background-color:
            <?php echo get_theme_mod('custom_store_pagination_bg_selected', '#1e73be'); ?>
            !important;
    }

    /* Other pages */
    .woocommerce nav.woocommerce-pagination ul li a {
        color:
            <?php echo get_theme_mod('custom_store_pagination_text_not_selected', '#1e73be'); ?>
            !important;
        background-color:
            <?php echo get_theme_mod('custom_store_pagination_bg_not_selected', '#ffffff'); ?>
            !important;
    }

    /* Other pages | Hover*/
    .woocommerce nav.woocommerce-pagination ul li a:hover {
        color:
            <?php echo get_theme_mod('custom_store_pagination_text_not_selected_hover', '#1e73be'); ?>
            !important;
        background-color:
            <?php echo get_theme_mod('custom_store_pagination_bg_not_selected_hover', '#ffffff'); ?>
            !important;
    }

    /* Changing font size of pagination */
    .woocommerce nav.woocommerce-pagination ul {
        font-size:
            <?php echo get_theme_mod('custom_pagination_size', '24px'); ?>
            !important;

        border: 0px;
    }

    .woocommerce ul.products li.product .button {
        color:
            <?php echo get_theme_mod('custom_add_to_card_text', '#1e73be'); ?>
            !important;
        background-color:
            <?php echo get_theme_mod('custom_add_to_card_bg', '#ffffff'); ?>
            !important;
    }

    .woocommerce ul.products li.product .button:hover {
        color:
            <?php echo get_theme_mod('custom_add_to_card_bg', '#ffffff'); ?>
            !important;
        background-color:
            <?php echo get_theme_mod('custom_add_to_card_text', '#1e73be'); ?>
            !important;
    }

    /* Set flexbox layout for product container-fluid */
    .woocommerce ul.products {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
    }

    /* Adjust product item width */
    .woocommerce ul.products li.product {
        flex: 0 0 calc(30% - 10px);
        /* Adjust the width as needed */
        margin-bottom: 20px;
        position: relative;

    }

    /* Position product information */
    .woocommerce ul.products li.product .woocommerce-loop-product__title {
        position: relative;
        z-index: 1;
        padding-bottom: 20px;
        /* Add padding between title and button */
        color:
            <?php echo get_theme_mod('custom_heading_colour', '#000000'); ?>
            !important;
    }

    /* Position "Add to Cart" button at the bottom */
    .woocommerce ul.products li.product .button {
        position: absolute;
        bottom: 0;
        /* Adjust the distance from the bottom as needed */
        left: 0;
        right: 0;
        margin: 0 auto;
        /* Center horizontally */
        z-index: 1;
        padding: 10px 20px;
        /* Add padding to the button */
    }



    .wc-block-components-button:not(.is-link) .wc-block-components-button__text {
        background-color:
            <?php echo get_theme_mod('custom_add_to_card_bg', '#ffffff'); ?>
            !important;
        color:
            <?php echo get_theme_mod('custom_add_to_card_text', '#1e73be'); ?>
            !important
    }


    .woocommerce ul.products li.product {
        /* height: 650px; */
        /* Adjust height for this breakpoint */
    }



    @media only screen and (min-width: 1921px) and (max-width: 2000px) {
        .woocommerce ul.products li.product {
            height: 650px;
            /* Adjust height for this breakpoint */
        }
    }


    /* Desktops, large screens – 1025px — 1200px */
    @media only screen and (min-width: 1025px) and (max-width: 1200px) {
        .woocommerce ul.products li.product {
            height: 450px;
            /* Adjust height for this breakpoint */
        }
    }

    @media only screen and (min-width: 1201px) and (max-width: 1400px) {
        .woocommerce ul.products li.product {
            height: 500px;
            /* Adjust height for this breakpoint */
        }
    }

    @media only screen and (min-width: 1401px) and (max-width: 1620px) {
        .woocommerce ul.products li.product {
            height: 550px;
            /* Adjust height for this breakpoint */
        }
    }

    @media only screen and (min-width: 1621px) and (max-width: 1750px) {
        .woocommerce ul.products li.product {
            height: 600px;
            /* Adjust height for this breakpoint */
        }
    }

    @media only screen and (min-width: 1750px) and (max-width: 1800px) {
        .woocommerce ul.products li.product {
            height: 600px;
            /* Adjust height for this breakpoint */
        }
    }

    @media only screen and (min-width: 1801px) and (max-width: 1920px) {
        .woocommerce ul.products li.product {
            height: 650px;
            /* Adjust height for this breakpoint */
        }
    }



    /* Small screens, laptops – 769px — 1024px */
    @media only screen and (min-width: 769px) and (max-width: 1024px) {
        .woocommerce ul.products li.product {
            height: 420px;
            /* Adjust height for this breakpoint */
        }

        /* Center align products in this breakpoint */
        .woocommerce ul.products {
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
        }
    }

    /* iPads, Tablets – 481px — 768px */
    @media only screen and (min-width: 481px) and (max-width: 768px) {

        .woocommerce ul.products {
            padding-top: 50px;
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
            flex-direction: column;
            align-content: center;
        }
    }



    /* Mobile devices – 320px — 480px */
    @media only screen and (min-width: 380px) and (max-width: 480px) {
        .woocommerce ul.products li.product {
            flex: 0 0 calc(100% - 10px);
            /* Full width for mobile devices */
            height: auto;
            /* Allow height to adjust based on content */
        }
    }



    /* Set flexbox layout for product container-fluid */
    .woocommerce ul.products {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
    }

    @media only screen and (min-width:2001px) and (max-width: 2150px) {
        .woocommerce ul.products li.product {
            height: 700px;

        }
    }

    
    @media only screen and (min-width:2151px) and (max-width: 2200px) {
        .woocommerce ul.products li.product {
            height: 700px;

        }
    }

    @media only screen and (min-width:2201px) and (max-width: 2300px) {
        .woocommerce ul.products li.product {
            height: 750px;

        }
    }

    @media only screen and (min-width:2301px) and (max-width: 2510px) {
        .woocommerce ul.products li.product {
            height: 780px;

        }
    }

    @media only screen and (min-width:2511px) and (max-width: 2560px) {
        .woocommerce ul.products li.product {
            height: 850px;

        }
    }





    @media only screen and (max-width: 768px) {

        .woocommerce ul.products[class*=columns-] li.product,
        .woocommerce-page ul.products[class*=columns-] li.product {
            width: 85%;
            float: left;
            clear: both;
            margin: 0 0 2.992em;
        }
    }

    @media only screen and (max-width: 600px) {

        .woocommerce ul.products li.product a img {
            border-radius: 25px !important;
        }

        .woocommerce ul.products {
            padding-top: 20px;
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            flex-direction: column;
            align-content: center;
        }

        .woocommerce .woocommerce-ordering,
        .woocommerce-page .woocommerce-ordering {
            float: none;
            display: flex;
            flex-direction: column;
            align-items: center;
            align-content: center;
        }
    }

    .woocommerce .woocommerce-result-count,
    .woocommerce-page .woocommerce-result-count {
        float: initial;
        padding-top: 50px;
        color:
            <?php echo get_theme_mod('custom_heading_colour', '#000000'); ?>
        ;
    }
</style>