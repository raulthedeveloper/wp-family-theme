
<?php global $post; ?>

<nav class="navbar navbar-expand-lg navbar-dark  <?php echo $post->post_name !== "home" ? "mobile-nav" : null ?>">
  <div class="container-fluid">
    <a class="navbar-brand" href="#"></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <?php 
    wp_nav_menu( array(
    'theme_location'  => 'top-menu',
    'depth'           => 2, // 1 = no dropdowns, 2 = with dropdowns.
    'container'       => 'div',
    'container_class' => 'collapse navbar-collapse navbar-collapse-home',
    'container_id'    => 'navbarSupportedContent',
    'menu_class'      => 'navbar-nav mr-auto',
    'fallback_cb'     => 'WP_Bootstrap_Navwalker::fallback',
    'walker'          => new WP_Bootstrap_Navwalker(),
) );
?>
  </div>
</nav>


