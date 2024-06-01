<?php

$search_placement = get_theme_mod('custom_search_icon_placement', 'right');
?>

<style>
    .search-submit {
        <?php if ($search_placement == "right") {
            echo " right: 10px; /* Adjust the distance from the right side */
            top: 50%; /* Align vertically in the middle */";
        } else {
            echo "left: 7px; /* Adjust the distance from the left side */
            top: 50%; /* Align vertically in the middle */";
        } ?>
    }
</style>


<form role="search" method="get" class="search-form" action="<?php echo esc_url(home_url('/')); ?>">
    <div class="search-container-fluid">
        <input type="search" class="search-field"
            placeholder="<?php echo esc_attr_x('Search...', 'placeholder', 'text-domain'); ?>"
            value="<?php echo get_search_query(); ?>" name="s" />
        <button type="submit" class="search-submit">
        <ion-icon name="search-outline"></ion-icon>
    </div>
</form>

<style>
    .search-container-fluid {
        position: relative;
        display: flex;
        align-items: center;
    }

    .search-field {
        border-radius: 20px;
        /* Adjust border radius */
        padding: 8px 38px 8px 30px;
        /* Adjust padding to accommodate the button */
        border: none;
        width: 200px;
        /* Adjust width as needed */
    }

    .search-submit {
        position: absolute;
        /* Align vertically in the middle */
        transform: translateY(-50%);
        background: transparent;
        border: none;
        cursor: pointer;
        padding: 0;
        outline: none;
    }

    .search-submit i {
        color: #333;
        /* Adjust icon color */
        font-size: 16px;
        /* Adjust icon size */
    }

    .search-submit:hover {
        opacity: 0.7;
        /* Adjust opacity on hover */
    }

    ion-icon{
        font-size: 20px;
    }
</style>