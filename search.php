<?php

get_header();

$search = isset($_GET['s']) ? sanitize_text_field($_GET['s']) : '';

?>

<div class="pageTitle">
    <h1>
        Search Results for:
        <?php echo $search; ?>
    </h1>
</div>


<div class="container-fluid">

    <div class="row">
        <?php

        $args = array('section_title' => 'Search Results');
        get_template_part("template-parts/loop", null, $args);

        ?>
    </div>
</div>

<?php get_footer() ?>