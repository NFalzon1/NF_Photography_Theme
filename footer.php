<?php
$footer_layout = get_theme_mod('custom_footer_widget_count', '2');
$sidebars_active = false;
$CopyrightTextColour = get_theme_mod('custom_copyright_text', '#ccc');
$CopyrightBackgroundColour = get_theme_mod('custom_copyright_bg', '#222');
$CopyrightPlacement = get_theme_mod('custom_footer_copyright_placement', 'center');
$FooterBorderRadius = get_theme_mod('custom_footer_border_radius', '10px');

for ($i = 0; $i < $footer_layout; $i++) {
  if (is_active_sidebar('footer-sidebar-' . ($i + 1))) {
    $sidebars_active = true;
  }
}





if ($sidebars_active):
  ?>
  <footer class="footer darker-bg">
    <div class="container-fluid">
      <div class="row">
        <?php
        for ($i = 0; $i < $footer_layout; $i++):
          ?>
          <div class="col-md-<?php echo esc_attr(12 / $footer_layout); ?>">
            <?php if (is_active_sidebar('footer-sidebar-' . ($i + 1))) {
              dynamic_sidebar('footer-sidebar-' . ($i + 1));
            } ?>
          </div>
          <?php
        endfor;
        ?>
      </div>
    </div>
    <div class="copyright py-4" style="text-align: <?php echo $CopyrightPlacement; ?> ; padding-left:50px; padding-right:50px;">
      &copy;
      <?php echo date("Y"); ?>
      <?php echo get_bloginfo(); ?>. All Rights Reserved.
    </div>
  </footer>
  <?php
endif;
?>
<?php wp_footer(); ?>
</body>

</html>

<style>
  .footer {
    background-color: #333;
    color: #fff;
    padding: 40px 0;
  }

  .footer .container-fluid {
    display: flex;
    flex-wrap: wrap;
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.3);
    padding: 20px;
    border-radius: <?php echo $FooterBorderRadius; ?>; /* Use this */
    flex-direction: column;
    align-items: stretch;
  }

  .footer .col {
    padding: 0 15px;
  }

  .footer-widget {
    margin-bottom: 30px;
    
  }

  .footer h3 {
    color: #fff;
    font-size: 20px;
    margin-bottom: 20px;
  }

  .footer ul {
    list-style: none;
    padding: 0;
    margin: 0;
  }

  .footer ul li {
    margin-bottom: 10px;
  }

  .footer ul li a {
    color: #ccc;
    text-decoration: none;
  }

  .footer ul li a:hover {
    color: #fff;
  }

  .footer .copyright {
    background-color: <?php echo $CopyrightBackgroundColour; ?>;
    color: <?php echo $CopyrightTextColour; ?>;
    margin-top: 20px;
    font-size: 14px;
  }
</style>