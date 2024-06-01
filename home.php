<!-- Blog Page -->

<?php get_header() ?>


<div class="container-fluid">

<h1 id="archive-title"> Blog </h1>

  <section class="categories-section">
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
    $args = array('section_title' => 'Home');
    get_template_part("template-parts/loop", null, $args);
    ?>
  </div>
</div>

<?php get_footer() ?>

<style>
  @media only screen and (max-width: 991px) {
    .categories-list li {
      padding: 6px;
    }
  }

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



  /* Optional: Add styles for previous and next links */
  .pagination .prev,
  .pagination .next {
    margin: 0 10px;
  }

  .pagination .prev a,
  .pagination .next a {
    display: inline-block;
    padding: 8px 12px;
    text-decoration: none;
    color: #fff;
    border-radius: 4px;
    transition: background-color 0.3s;
  }

</style>