<?php get_header() ?>



<div class="container-fluid">

  <h1 id="archive-title">
    <?php single_cat_title(); ?> Posts
  </h1>

  <section class="categories-section ">
    <ul class="categories-list">
      <?php
      $categories = get_categories();
      foreach ($categories as $category) {
        echo '<li><a href="' . get_category_link($category->term_id) . '">' . $category->name . '</a></li>';
      }
      ?>
    </ul>
  </section>

  <div class="row">
    <?php

    $args = array('section_title' => 'Archive');
    get_template_part("template-parts/loop", null, $args);

    ?>
  </div>
</div>
</div>

<?php get_footer() ?>

<style>
  /* Categories Section */
  .categories-section {
    margin-bottom: 30px;
    text-align: center;
  }

  .categories-list {
    list-style: none;
    padding: 0;
    margin: 0;
  }

  .categories-list li {
    display: inline-block;
    margin-right: 15px;
  }

  .categories-list li:last-child {
    margin-right: 0;
  }

  .categories-list li a {
    display: inline-block;
    padding: 12px 24px;
    color: #fff;
    text-decoration: none;
    border-radius: 4px;
    transition: background-color 0.3s ease;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
  }



  @media only screen and (max-width: 991px) {
    .categories-list li {
      padding: 6px;
    }
  }
</style>