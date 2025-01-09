  <?php
  /**
 * Hlavička šablony
 */
  ?>
  <!DOCTYPE html>
  <html <?php language_attributes(); ?>>
  <head>
      <meta charset="<?php bloginfo('charset'); ?>">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <?php wp_head(); ?>
  </head>
  <body <?php body_class(); ?>>
  <?php wp_body_open(); ?>

  <header id="masthead" class="site-header">
      <div class="container">
          <div class="header_top">
              <div class="contact_info">
                  <a href="tel:<?php echo esc_attr(str_replace(' ', '', get_theme_mod('my_theme_phone', '(+420) 123 456 789'))); ?>">
                      <i class="fa-solid fa-phone"></i> <?php echo esc_html(get_theme_mod('my_theme_phone', '(+420) 123 456 789')); ?>
                  </a>
                  <a href="mailto:<?php echo esc_attr(get_theme_mod('my_theme_email', 'info@example.com')); ?>">
                      <i class="fa-solid fa-envelope"></i> <?php echo esc_html(get_theme_mod('my_theme_email', 'info@example.com')); ?>
                  </a>
              </div>
              <div class="social_icons">
                  <?php
                  $social_links = array(
                      'facebook' => 'fa-brands fa-facebook',
                      'instagram' => 'fa-brands fa-instagram',
                      'pinterest' => 'fa-brands fa-pinterest',
                      'youtube' => 'fa-brands fa-youtube',
                  );

                  foreach ($social_links as $network => $icon) {
                      $url = get_theme_mod('my_theme_' . $network, '#');
                      if ($url && $url !== '#') {
                          echo '<a href="' . esc_url($url) . '" target="_blank" rel="noopener"><i class="' . esc_attr($icon) . '"></i></a>';
                      }
                  }
                  ?>
              </div>
          </div>
          <hr class="header_hr">
          <div class="header_bottom">
              <div class="logo-container">
                  <?php
                  if (has_custom_logo()) {
                      the_custom_logo();
                  } else {
                      echo '<h1><a href="' . esc_url(home_url('/')) . '">' . get_bloginfo('name') . '</a></h1>';
                  }
                  ?>
              </div>
              <div class="menu-container">
                  <nav id="site-navigation" class="main-navigation">
                      <?php
                      wp_nav_menu(array(
                          'theme_location' => 'max_mega_menu_1', // Zde použijte správné umístění pro Max Mega Menu
                          'menu_id'        => 'primary-menu',
                          'container_class' => 'mega-menu-wrap'
                      ));
                      ?>
                  </nav>
              </div>
          </div>
      </div>
  </header>
