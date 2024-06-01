<?php $logoPos = get_theme_mod('custom_logo_placement');
$selected_font = get_theme_mod('selected_font', 'Open Sans');

$burger_colour = get_theme_mod('custom_burger_menu_colour');


$customMode = get_theme_mod('custom_dark_mode', 'light');
$background_color = '';

if ($customMode == 'light') {
  $background_color = get_theme_mod('site_background_light_color', '#f2f2f2');
} else {
  $background_color = get_theme_mod('site_background_dark_color', '#1a1a1a');
}


?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>> <!--States the language which is being used Function-->

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php wp_title('|', true, 'right');
  bloginfo('name'); ?></title>


  <?php wp_Head(); ?>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Anton&family=Archivo:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Arimo:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700&family=Fira+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Josefin+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;1,100;1,200;1,300;1,400;1,500;1,600;1,700&family=Kanit:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&family=Merriweather:ital,wght@0,300;0,400;0,700;0,900;1,300;1,400;1,700;1,900&family=Pacifico&family=Protest+Revolution&family=Protest+Riot&family=Protest+Strike&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Rubik:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Zilla+Slab:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
    rel="stylesheet">

  <script src="https://kit.fontawesome.com/cf24d7d883.js" crossorigin="anonymous"></script>


  <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</head>

<style>
  * {
    font-family: '<?php echo get_theme_mod('selected_font', 'Open Sans'); ?>', sans-serif !important;

  }

  body {
    background-color:
      <?php echo esc_attr($background_color); ?>
      !important;
    "
 font-family: '<?php echo get_theme_mod('selected_font', 'Open Sans'); ?>', sans-serif !important;
  }

  #menu-primary-menu li a {
    color:
      <?php echo get_theme_mod('custom_nav_text_colour', '#0a0a0a'); ?>
      !important;
  }

  #menu-primary-menu li ul li a {
    color:
      <?php echo get_theme_mod('custom_nav_text_colour', '#0a0a0a'); ?>
      !important;
  }

  .pageTitle h1,
  #archive-title h1,
  .text-center h1,
  .container-fluid h1,
  .genre-title,
  .textContent {
    color:
      <?php echo get_theme_mod('custom_heading_colour', '#000000'); ?>
      !important;
  }

  .navbar-toggler-icon {
    background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 30 30'%3e%3cpath stroke='rgba%28<?php echo $burger_colour; ?>, 1%29' stroke-linecap='round' stroke-miterlimit='10' stroke-width='2' d='M4 7h22M4 15h22M4 23h22'/%3e%3c/svg%3e");
  }

  .woocommerce:where(body:not(.woocommerce-uses-block-theme)) div.product .stock {
    color:
        <?php echo get_theme_mod('custom_heading_colour', '#000000'); ?>
    ;
}

.woocommerce:where(body:not(.woocommerce-uses-block-theme)) div.product p.price, .woocommerce:where(body:not(.woocommerce-uses-block-theme)) div.product span.price {
    color: <?php echo get_theme_mod('custom_onsale_bg', '#d32151'); ?>
            !important;
    font-size: 1.25em;
}
</style>



<body <?php body_class(); ?>> <!--Adds classes to body-->
  <div class='container-fluid w-100' style="max-width:100% !important; padding: 0px;   ">

    <div id="theme_header" class="navHeader">

      <div <?php if ($logoPos == "top") {
        echo "id='logo_image_top'";
      } else {
        echo "class='display_none'";
      } ?>>
        <a href="<?php echo esc_url(home_url('/')); ?>"><img src="<?php echo get_theme_mod('diwp_logo'); ?>" /></a>
      </div>

      <header class="navbar navbar-expand-lg paddinglfrt" style="box-shadow: 0px 2px 5px black">
        <div class="container-fluid menuButton">
          <div <?php if ($logoPos == "left") {
            echo "id='logo_image_left'";
          } else {
            echo "class='display_none'";
          } ?>>
            <a href="<?php echo esc_url(home_url('/')); ?>"><img src="<?php echo get_theme_mod('diwp_logo'); ?>" /></a>
          </div>
          <button data-bs-toggle="collapse" id="burgerMenu" onclick="mobilenav()" class="navbar-toggler"
            data-bs-target="#navbarSupportedContent"><span class="sr-only">Toggle navigation</span><span
              class="navbar-toggler-icon"></span></button>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <div class="navbar-nav me-auto mb-2 mb-lg-0 main-menu-div w-100 ">
              <?php
              wp_nav_menu(
                array(
                  'theme_location' => 'main-menu',
                )
              );
              ?>
            </div>
            <?php get_search_form(); ?>
          </div>
          <div <?php if ($logoPos == "right") {
            echo "id='logo_image_left'";
          } else {
            echo "class='display_none'";
          } ?>>
            <a href="<?php echo esc_url(home_url('/')); ?>"><img src="<?php echo get_theme_mod('diwp_logo'); ?>" /></a>
          </div>
        </div>
    </div>
    </header>
  </div>

  <script>
    // Get the button element
    const toggleButton = document.getElementById('burgerMenu');

    // Add a click event listener to the button
    toggleButton.addEventListener('click', function () {
      // Get the element with the class "collapse"
      const collapseElement = document.querySelector('.collapse');

      // Toggle the display by adding or removing the "show" class
      collapseElement.classList.toggle('show');
    });
  </script>