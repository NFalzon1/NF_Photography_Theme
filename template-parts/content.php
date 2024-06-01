<div class="card"
    style="border-radius: 10px; border: 0px; margin-bottom: 5%;">
    <div class="card-body">
        <h5 class="card-title" style="padding-bottom: 1%; font-weight: bold;">
            <?php the_title(); ?>
        </h5>
        <p class="card-text">
            <?php the_excerpt(); ?>
        </p>
        <div class="card-link">
            <a href="<?php the_permalink(); ?>" class="btn"
                style="border-radius: 10px; border: none; color: white;">
                Read More
            </a>
        </div>
    </div>
</div>