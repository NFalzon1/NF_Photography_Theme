<?php $logoPos = "left";
$selected_font = get_theme_mod('selected_font', 'Open Sans');
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>> <!--States the language which is being used Function-->

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>
    <?php bloginfo('name'); ?>
  </title> <!--Types the name of the page/blog title Function-->
  <?php wp_Head(); ?>
  <script src="https://kit.fontawesome.com/ed3821a1ee.js" crossorigin="anonymous"></script>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Anton&family=Archivo:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Arimo:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700&family=Fira+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Josefin+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;1,100;1,200;1,300;1,400;1,500;1,600;1,700&family=Kanit:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&family=Merriweather:ital,wght@0,300;0,400;0,700;0,900;1,300;1,400;1,700;1,900&family=Pacifico&family=Protest+Revolution&family=Protest+Riot&family=Protest+Strike&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Rubik:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Zilla+Slab:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
    rel="stylesheet">
</head>

<style>
  * {
    font-family: '<?php echo get_theme_mod('selected_font', 'Open Sans'); ?>', sans-serif !important;

  }

  body {
    background-color:
      <?php echo esc_attr(get_theme_mod('site_background_color', '#f2f2f2')); ?>
      !important;
    font-family: '<?php echo get_theme_mod('selected_font', 'Open Sans'); ?>', sans-serif !important;

  }
</style>

<body <?php body_class(); ?>> <!--Adds classes to body-->
  <div class='container-fluid w-100'>

    <div id="theme_header" class="navHeader">

      <header class="navbar navbar-expand-lg paddinglfrt">
        <div class="container-fluid menuButton">
          <div <?php if ($logoPos == "left") {
            echo "id='logo_image_left'";
          } else {
            echo "class='display_none'";
          } ?>>
            <a href="<?php echo esc_url(home_url('/')); ?>"><img src="<?php echo get_theme_mod('diwp_logo'); ?>" /></a>
          </div>
          <button class="navbar-toggler " type="button" data-bs-toggle="collapse"
            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <div class="navbar-nav me-auto mb-2 mb-lg-0 main-menu-div w-100">
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

  <head>
    <script src="https://code.jquery.com/jquery-3.6.2.slim.min.js"></script>
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-1VDDWMRSTH"></script>
  </head>

  <div class="wrapp">

    <div class="menu-img">
      <?php
      // Display the WordPress navigation menu
      $menu_items = wp_get_nav_menu_items('landing-page');

      if ($menu_items) {
        foreach ($menu_items as $key => $menu_item) {
          // Get the theme mod based on the menu item's key
          $theme_mod_key = 'landing_image' . ($key + 1); // Adjust the index accordingly
      
          // Output the image with the corresponding theme mod
          ?>
          <img id="<?php echo ($key + 1); ?>-bg__img" src="<?php echo get_theme_mod($theme_mod_key); ?>"
            alt="<?php echo ($key + 1); ?>">
          <?php
        }
      }
      ?>
    </div>

    <ul class="menu">
      <?php
      if ($menu_items) {
        foreach ($menu_items as $key => $menu_item) {
          ?>
          <li class="menu__item" data-id="<?php echo esc_attr($key + 1); ?>">
            <a href="<?php echo esc_url($menu_item->url); ?>" class="menu__link">
              <?php echo esc_html($menu_item->title); ?>
            </a>
          </li>
          <?php
        }
      }
      ?>
    </ul>
  </div>

  <style>
    /* 1.1.general-setting-pages *************************/
    /****************************************************/

    .menu{
      padding-top: 5%;
    }
    :root {
      --pr-color: #fff;
      --cubicbz: cubic-bezier(.9, 0, .1, 1);
    }

    * {
      box-sizing: border-box;
      margin: 0;
      padding: 0;
    }

    body {
      background:
        <?php echo esc_attr(get_theme_mod('site_background_color', '#f2f2f2')); ?>
        !important;
    }

    /******************************************/
    .wrapp {
      position: relative;
      display: flex;
      align-items: center;
      justify-content: center;
      width: 100%;
      height: 100vh;
      overflow: hidden;
      z-index: 1;
    }

    /* hover menu with pictures **********************************/
    .menu-img {
      position: absolute;
      width: 100%;
      height: 100%;
      top: 0;
      left: 0;
      opacity: .8;
      filter: blur(6px);
      overflow: hidden;
      transform: scale(1.1);
    }

    .menu-img img {
      position: absolute;
      width: 100%;
      height: 100%;
      object-fit: cover;
      top: 0;
      left: 0;
      transition: .8s var(--cubicbz);
      transform: scale(1.2);
      clip-path: polygon(0 0, 0 0, 0 100%, 0 100%);
    }

    .menu-img img.active {
      transform: scale(1);
      clip-path: polygon(0 0, 100% 0, 100% 100%, 0 100%);
    }

    .menu__item {
      position: relative;
      list-style: none;
    }

    .menu__item+.menu__item {
      margin-top: 60px;
    }

    .menu__item::before {
      position: absolute;
      content: '';
      width: 60px;
      height: 60px;
      top: 50%;
      left: 0;
      transform: translate(-80px, -50%) rotate(225deg);
      opacity: 0;
      background: url(../img/arrow.svg);
      background-size: cover;
      background-repeat: no-repeat;
      background-position: center center;
      will-change: transform;
      transition: .8s var(--cubicbz);
    }

    .menu__link {
      position: relative;
      display: block;
      text-transform: uppercase;
      font-size: 75px;
      line-height: .8;
      text-decoration: none;
      color: transparent;
      -webkit-text-stroke: 1px var(--pr-color);
      z-index: 2;
      transition: .8s var(--cubicbz);
    }

    .menu__item:hover .menu__link {
      transform: translateX(80px);
      color: var(--pr-color);
      -webkit-text-stroke: 1px transparent;
    }

    .menu__item:hover::before {
      opacity: 1;
      transform: translate(0%, -50%) rotate(180deg);
    }

    .navbar {
      color: white;
      position: fixed;
      top: 0;
      width: 100%;
      z-index: 1000;
      padding-left: 100px;
      padding-right: 100px;
    }
  </style>

  <script>
    $(function () {

      'use strict';


      $('.menu__item').on("mouseenter", function () {
        let id = $(this).data('id');
        $('#' + id + '-bg__img').addClass('active');
      });
      $('.menu__item').on("mouseleave", function () {
        $('.menu-img img').removeClass('active');
      });

    });

    window.dataLayer = window.dataLayer || [];
    function gtag() { dataLayer.push(arguments); }
    gtag('js', new Date());
    gtag('config', 'G-1VDDWMRSTH');
  </script>