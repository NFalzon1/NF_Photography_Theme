<?php get_header();
?>

<style>
  .textCentre {
    text-align: center;
  }
</style>


<div class="container-fluid">
<div class="row">
    <?php if (have_posts()):
      while (have_posts()):
        the_post() // The : are used instead of the curly brackets ?>

        <?php the_content();
      endwhile;
    endif;
    ?>

    <p>
      <?php //the_content();//
      // the_excerpt();
      ?>
    </p>



  </div>
</div>




<?php get_footer(); ?>