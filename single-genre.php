<?php
get_header();

$images_per_row = get_theme_mod('custom_single_grid', '3');
$card_bg = get_theme_mod('custom_portfolio_card_bg', '0a0a0a');
$text_colour = get_theme_mod('custom_portfolio_text_bg', '000000');


$title_showing = get_theme_mod('custom_port_title_showing', 'Yes');

$metakey = "image_taken_date";

$test = "";
$order = "desc";
$meta_key = "image_taken_date";
$meta_key_method = "meta_key";
$order_method = "meta_value_num";


if (($_GET['orderby'] == 'date') && ($_GET['order'] == 'desc')) {
    $test = "Date DESC";

    $meta_key_method = "meta_key";
    $meta_key = "image_taken_date";
    $order_method = "meta_value_num";
    $order = "desc";

} elseif (($_GET['orderby'] == 'date') && ($_GET['order'] == 'asc')) {
    $test = "Date ASC";

    $meta_key_method = "meta_key";
    $meta_key = "image_taken_date";
    $order_method = "meta_value_num";
    $order = "asc";

} elseif (($_GET['orderby'] == 'title') && ($_GET['order'] == 'desc')) {
    $test = "Title DESC";

    $meta_key_method = "";
    $meta_key = "";
    $order_method = "title";
    $order = "desc";

} elseif (($_GET['orderby'] == 'title') && ($_GET['order'] == 'asc')) {
    $test = "Title ASC";

    $meta_key_method = "";
    $meta_key = "";
    $order_method = "title";
    $order = "asc";

} else {
    $test = "Date DESC";

    $meta_key_method = "meta_key";
    $meta_key = "image_taken_date";
    $order_method = "meta_value_num";
    $order = "desc";

}

if (!isset($_GET['orderby']) && !isset($_GET['order'])) {
    $defaultQuery = "orderby=date&order=desc";

    // Get the current request URI
    $currentUrl = $_SERVER['REQUEST_URI'];

    // Check if the current URL already contains a query string
    $separator = (parse_url($currentUrl, PHP_URL_QUERY) == NULL) ? '?' : '&';

    // Append default query to the current URL
    $redirectUrl = $currentUrl . $separator . $defaultQuery;

    // Redirect to the updated URL with default sorting order
    header("Location: $redirectUrl");
    exit;
}




// Get the genre slug from the current page
$genre_slug = get_queried_object_id();

$photo_query_args = array(
    'post_type' => 'photos',
    'meta_query' => array(
        array(
            'key' => 'genre_of_photo',
            'value' => $genre_slug,
            'compare' => '='
        )
    ),
    $meta_key_method => $meta_key,
    'orderby' => array(
        $order_method => $order,
    ),

    // 'orderby' => 'meta_value', // Order by meta value as string

    'posts_per_page' => -1, // Retrieve all matching posts
);



// Custom query to fetch photos associated with the current genre
$genre_photos_query = new WP_Query($photo_query_args);

// global $wpdb;
// $query = $genre_photos_query->request;
// echo "Generated Query: {$query}";

// echo 'Current Order: ' . $genre_photos_query->get('order');

// Check if there are photos for the current genre
if ($genre_photos_query->have_posts()):
    ?>
    <div id="primary" class="content-area">
        <main id="main" class="site-main">
            <section class="genre-photos">
                <div class="container-fluid">
                    <?php $genre_title = get_the_title($genre_slug);
                    if (!empty($genre_slug)): ?>
                        <h2 class="genre-title">
                            <?php echo esc_html($genre_title); ?>
                        </h2>
                    <?php endif; ?>

                    <!-- <p><?php echo $test; ?></p>
                    <p>Order: <?php echo $order; ?></p>
                    <p>Meta Key: <?php echo $meta_key; ?></p>
                    <p>Meta Key method: <?php echo $meta_key_method; ?></p>
                    <p>Order Method: <?php echo $order_method; ?></p> -->

                    <div id="sort-drop-menu">
                        <label for="sort-by">Sort By:</label>
                        <select name="sort-posts" id="sortbox"
                            onchange="document.location.href='?'+this.options[this.selectedIndex].value;">
                            <option value="orderby=date&order=desc">Date (Descending)</option>
                            <option value="orderby=date&order=asc">Date (Ascending)</option>
                            <option value="orderby=title&order=desc">Title (Descending)</option>
                            <option value="orderby=title&order=asc">Title (Ascending)</option>
                        </select>
                    </div>

                    <div class="row photo-grid">
                        <?php while ($genre_photos_query->have_posts()):
                            $genre_photos_query->the_post();
                            // Output the custom fields
                            $photo_image = get_field('upload_the_image');
                            $date = get_field('image_taken_date');
                            $photo_title = get_the_title(); // Get the title of the current photo
                            ?>
                            <div class="col-md-3">
                                <div class="photo">
                                    <?php if ($photo_image): ?>
                                        <a href="<?php echo esc_url($photo_image['url']); ?>" data-fancybox="gallery">
                                            <img src="<?php echo esc_url($photo_image['url']); ?>" class="card-img-top"
                                                alt="<?php echo esc_attr($photo_image['alt']); ?>">
                                        </a>
                                        <p class="photo-title"><?php echo esc_html($photo_title); ?></p>
                                        <!-- <p class="photo-title"><?php echo esc_html($date); ?></p> -->
                                        <!-- Display the photo title -->
                                    <?php endif; ?>
                                </div>
                            </div>
                        <?php endwhile; ?>
                    </div>
                </div>
            </section>
        </main><!-- #main -->
    </div><!-- #primary -->

    <?php
else:
    // If no photos are found for the current genre
    ?>
    <div class="container-fluid">
        <p>No photos found for the genre
            <?php echo esc_html($genre_slug); ?>
        </p>
    </div>
    <?php
endif;

// Restore original post data
wp_reset_postdata();

get_footer();
?>

<script>
    <?php if (($_GET['orderby'] == 'date') && ($_GET['order'] == 'desc')) { ?>
        document.getElementById('sortbox').value = 'orderby=date&order=desc';

    <?php } elseif (($_GET['orderby'] == 'date') && ($_GET['order'] == 'asc')) { ?>
        document.getElementById('sortbox').value = 'orderby=date&order=asc';


    <?php } elseif (($_GET['orderby'] == 'title') && ($_GET['order'] == 'desc')) { ?>
        document.getElementById('sortbox').value = 'orderby=title&order=desc';

    <?php } elseif (($_GET['orderby'] == 'title') && ($_GET['order'] == 'asc')) { ?>
        document.getElementById('sortbox').value = 'orderby=title&order=asc';

    <?php } elseif (($_GET['orderby'] == 'rand')) { ?>
        document.getElementById('sortbox').value = 'orderby=rand';

    <?php } else { ?>
        document.getElementById('sortbox').value = 'orderby=date&order=desc';<?
    } ?>


</script>


<style>
    .photo-title {
        <?php if ($title_showing == "Yes") {
            echo "display: block;";
        } else {
            echo "display: none;";
        } ?>
        margin-top: 10px;
        text-align: center;
        font-size: 16px;
        color:
            <?php echo $text_colour; ?>
        ;
        font-weight: bold;
    }

    .genre-title {
        margin-top: 50px;
        margin-bottom: 50px;
        text-align: center;
        color:
            <?php echo $text_colour; ?>
        ;
        font-weight: bold;
    }


    .photo {
        background-color:
            <?php echo $card_bg; ?>
        ;
        margin-bottom: 20px;
        overflow: hidden;
        position: relative;
        border-radius: 10px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }


    .photo img {
        width: 100%;
        height: 300px;
        /* Set a fixed height for all images */
        display: block;
        transition: transform 0.3s ease-in-out;
        object-fit: cover;
        /* Maintain aspect ratio */
    }


    .photo:hover img {
        transform: scale(1.05);
    }

    .photo-grid {
        display: flex;
        flex-wrap: wrap;
        margin: -10px;
    }

    .photo-grid .col-md-3 {
        <?php if ($images_per_row == "3") {
            echo "flex: 0 0 calc(33.33% - 20px);
            max-width: calc(33.33% - 20px);";
        } else if ($images_per_row == "4") {
            echo "flex: 0 0 calc(25% - 20px);
            max-width: calc(25% - 20px);";
        } else {
            echo "flex: 0 0 calc(20% - 20px);
            max-width: calc(20% - 20px);";
        } ?>

        margin: 10px;
    }

    #sort-drop-menu {
        display: flex;
        justify-content: flex-end;
        margin-bottom: 20px;
        align-items: center;
    }
    

    @media (max-width: 991px) {
        .photo-grid .col-md-3 {
            flex: 0 0 calc(33.33% - 20px);
            max-width: calc(33.33% - 20px);
        }
    }

    @media (max-width: 767px) {
        .photo-grid .col-md-3 {
            flex: 0 0 calc(50% - 20px);
            max-width: calc(50% - 20px);
        }
    }

    @media (max-width: 575px) {
        .photo-grid .col-md-3 {
            flex: 0 0 calc(100% - 20px);
            max-width: calc(100% - 20px);
        }
    }

    label {
        margin-right: 10px;
        font-weight: bold;
        color:
      <?php echo get_theme_mod('custom_heading_colour', '#000000'); ?>
      !important;
    }

    /* Style for the select dropdown */
    select#sortbox {
        padding: 5px;
        font-size: 16px;
        border-radius: 5px;
        border: 1px solid #ccc;
        cursor: pointer;
    }

    /* Style for the options in the dropdown */
    select#sortbox option {
        background-color: #fff;
        /* Background color of options */
        color: #333;
        /* Text color of options */
    }

    /* Hover style for options */
    select#sortbox option:hover {
        background-color: #f0f0f0;
        /* Hover background color */
    }
</style>