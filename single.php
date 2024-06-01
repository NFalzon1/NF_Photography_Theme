<?php
get_header();
?>

<div class="container-fluid">
    <div class="row prsRow">
        <div class="col">
            <main>
                <?php if (have_posts()):
                    while (have_posts()):
                        the_post(); ?>
                        <article>
                            <div class="pageTitle">
                                <h1>
                                    <?php the_title(); ?>
                                </h1>
                                <!--<div class="authorSingle">
                                    <h6> Written by
                                        <?php the_author_meta('first_name'); ?>
                                        <?php the_author_meta('last_name'); ?>
                                    </h6>
                                </div>-->
                            </div>
                            <div class="textContent">
                                <?php the_content(); ?>
                            </div>
                        </article>
                        <?php
                    endwhile;
                endif;
                ?>
            </main>
        </div>
    </div>
</div>

<?php get_footer(); ?>

<style>
    .woocommerce button.button.alt {
        background-color:
            <?php echo get_theme_mod('custom_add_to_card_bg', '#ffffff'); ?>
        ;
        color:
            <?php echo get_theme_mod('custom_add_to_card_text', '#000000'); ?>
        ;
    }

    .woocommerce-product-gallery__image {
        border-radius:
            <?php echo get_theme_mod('custom_store_img_radius', '0px'); ?>
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

    .related {
        padding-top: 5%;
    }

    .woocommerce-Price-amount {
        color: <?php echo get_theme_mod('custom_heading_colour', '#000000'); ?>;
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
            !important;
        color:
            <?php echo get_theme_mod('custom_add_to_card_text', '#1e73be'); ?>
            !important
    }

    .single_add_to_cart_button button {
        background-color:
            <?php echo get_theme_mod('custom_add_to_card_bg', '#ffffff'); ?>
            !important;
        color:
            <?php echo get_theme_mod('custom_add_to_card_text', '#1e73be'); ?>
            !important
    }

    .single_add_to_cart_button button:hover {
        background-color:
            <?php echo get_theme_mod('custom_add_to_card_text', '#1e73be'); ?>
            !important;

        color:
            <?php echo get_theme_mod('custom_add_to_card_bg', '#ffffff'); ?>
            !important;
    }

    .woocommerce-loop-product__title {
        color:
            <?php echo get_theme_mod('custom_heading_colour', '#000000') ?>
        ;
    }

    /* Style the quantity input */
    .quantity input[type="number"] {
        width: 60px;
        /* Adjust width as needed */
        padding: 8px;
        font-size: 16px;
        border: 1px solid;
        border-radius: 4px;
    }

    /* Style the quantity input arrows */
    .quantity input[type="number"]::-webkit-inner-spin-button,
    .quantity input[type="number"]::-webkit-outer-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }

    .quantity input[type="number"]::-webkit-inner-spin-button,
    .quantity input[type="number"]::-webkit-outer-spin-button,
    .quantity input[type="number"]::-moz-outer-spin-button,
    .quantity input[type="number"]::-moz-inner-spin-button {
        appearance: none;
        margin: 0;
    }

    .quantity input[type="number"] {
        -moz-appearance: textfield;
    }

    .onsale {
        background-color:
            <?php echo get_theme_mod('custom_onsale_bg', '#d32151'); ?>
            !important;
        color:
            <?php echo get_theme_mod('custom_onsale_text', '#ffffff'); ?>
            !important;
    }

    @media only screen and (max-width: 600px) {

        .woocommerce .products ul,
        .woocommerce ul.products {
            margin: 0 0 1em;
            padding: 0;
            list-style: none outside;
            clear: both;
            display: flex;
            flex-direction: column;
            align-items: center;
            padding-top: 25px;
        }

        .woocommerce ul.products li.product a img {
            border-radius: 25px;
        }

        .woocommerce ul.products[class*=columns-] li.product,
        .woocommerce-page ul.products[class*=columns-] li.product {
            width: 85%;
            float: left;
            clear: both;
            margin: 0 0 2.992em;
        }

        .woocommerce ul.products li.product .woocommerce-loop-category__title,
        .woocommerce ul.products li.product .woocommerce-loop-product__title,
        .woocommerce ul.products li.product h3 {
            padding: .5em 0;
            margin: 0;
            font-size: 1em;
            text-align: center;
        }
    }
</style>