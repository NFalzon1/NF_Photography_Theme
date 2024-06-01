<?php

$text_colour = get_theme_mod('custom_portfolio_text_bg', '000000');
$card_bg = get_theme_mod('custom_portfolio_card_bg', '0a0a0a');

// Header
get_header();



/* 
Template Name: Display Genre Sections;
*/
?>






<div id="primary" class="content-area">
    <main id="main" class="site-main">
        <section class="photo-genres-list">
            <div class="container-fluid">
            <h1 class="text-center"> <?php the_title(); ?> </h1>
                <?php
                // Custom query to fetch photo genres
                $photo_genres_query = new WP_Query(
                    array(
                        'post_type' => 'genre', // Assuming 'genre' is the post type slug
                        'posts_per_page' => -1, // Retrieve all photo genres
                        'order' => 'ASC',
                        'orderby' => 'title',
                    ),
                );

                // Check if there are photo genres
                if ($photo_genres_query->have_posts()):
                    ?>
                    <div class="row">
                        <?php while ($photo_genres_query->have_posts()):
                            $photo_genres_query->the_post(); ?>
                            <?php
                            // Output the custom fields
                            $genre_image = get_field('image_of_genre');
                            ?>
                            <div class="col-md-3">
                                <a href="<?php the_permalink(); ?>" class="genre-link">
                                    <div class="card mb-4">
                                        <?php if ($genre_image): ?>
                                            <img src="<?php echo esc_url($genre_image['url']); ?>" class="card-img-top"
                                                alt="<?php echo esc_attr($genre_image['alt']); ?>">
                                        <?php endif; ?>
                                        <div class="card-body text-center">
                                            <h5 class="card-title">
                                                <?php the_title(); ?>
                                            </h5>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        <?php endwhile; ?>
                    </div>
                    <?php
                else:
                    // If no photo genres are found
                    ?>
                    <p>No photo genres found.</p>
                    <?php
                endif;
                ?>
            </div>
        </section>
    </main><!-- #main -->
</div><!-- #primary -->

<?php
// Footer
get_footer();
?>

<style>
    .card-title {
        margin-top: 10px;
        text-align: center;
        font-size: 16px;
        color:
            <?php echo $text_colour; ?>
        ;
        font-weight: bold;
    }

    .container-fluid h1 {
        margin-bottom: 50px;
        text-align: center;
        color:
            <?php echo $text_colour; ?>
        ;
        font-weight: bold;

    }

    .photo-genres-list {
        text-align: center;
        padding: 50px 0;
    }

    .photo-genres-list .card {
        background-color:
            <?php echo $card_bg; ?>
        ;
        border-radius: 10px;
        overflow: hidden;
        transition: box-shadow 0.3s ease;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }



    .photo-genres-list .card-img-top {
        width: 100%;
        height: 400px;
        /* Set a fixed height for all images */
        object-fit: cover;
    }

    .card-img-top:hover img{
        transform: scale(1.05);
    }

    .photo-genres-list .card-body {
        padding: 15px;
    }

    .photo-genres-list .card-title {
        margin-top: 0;
        font-size: 18px;
        font-weight: bold;
    }

    .photo-genres-list .genre-link {
        text-decoration: none;
        color: #333;
    }

    .row {
        --bs-gutter-x: 1.5rem;
        --bs-gutter-y: 0;
        display: flex;
        flex-wrap: wrap;
        margin-top: calc(-1* var(--bs-gutter-y));
        margin-right: calc(-0.5* var(--bs-gutter-x));
        margin-left: calc(-0.5* var(--bs-gutter-x));
        justify-content: center;
    }
</style>