<footer>
  <?php
  $site_info = get_field('site_settings', 'option');
  $logo = $site_info['site_logo'];
  $social_links = $site_info['social_links'];
  ?>
  <div class="container">
    <div class="row footer-top-row">
      <div class="col-lg-7 col-md-4 left-col">
        <div class="logo-wrapper">
          <a href="/">
            <img src="<?php echo $logo; ?>" alt="Reload Page">
          </a>
        </div>
      </div>
      <div class="col-lg-5 col-md-8 right-col">
        <div class="footer-nav-wrapper">
          <?php
          // Primary footer menu
          wp_nav_menu(array(
            'theme_location' => 'menu-2',
            'menu_id'        => 'footer-menu',
          ));
          // Second footer menu
          wp_nav_menu(array(
            'theme_location' => 'menu-3',
            'menu_id'        => 'footer-menu',
          ));
          ?>
        </div>
      </div>
    </div>

    <?php
    if ($social_links) :
    ?>
      <div class="row footer-bottom-row">
        <div class="col-md-7"></div>
        <div class="col-md-5">
          <ul class="social-links">
            <?php
            if ($social_links) :
              foreach ($social_links as $link) :
                $url = $link["links"]['url'];
                $icon = $link["links"]['title'];
            ?>
                <li>
                  <a href="<?php echo $url; ?>" target="_blank">
                    <?php echo $icon; ?>
                  </a>
                </li>
            <?php
              endforeach;
            endif;
            ?>
          </ul>
        </div>
      </div>
    <?php
    endif;
    ?>
  </div>
</footer>

<?php
wp_footer();
?>