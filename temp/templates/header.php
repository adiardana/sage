<header class="banner">
    <nav class="navbar navbar-inverse nav-primary" role="navigation">
      <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="<?php echo home_url(); ?>"><?php bloginfo('name'); ?></a>
        </div>

        <div class="collapse navbar-collapse" id="navbar">

          <div class="input-group navbar-right">
            <form action="<?php echo home_url(); ?>" method="get" class="navbar-form navbar-right" role="search">
              <input type="text" name="s" class="form-control" placeholder="Search">
              <span class="input-group-btn">
                <button class="btn btn-primary" type="button">
                  <span class="glyphicon glyphicon-search"></span>
                </button>
              </span>
            </form>
          </div>

          <?php
          if (has_nav_menu('primary_navigation')) :
            wp_nav_menu( array(
                'theme_location'    => 'primary_navigation',
                'depth'             => 2,
                'container'         => '',
                'container_class'   => '',
                'container_id'      => '',
                'menu_class'        => 'nav navbar-nav navbar-right',
                'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
                'walker'            => new wp_bootstrap_navwalker())
            );
          endif;
          ?>
        </div>

      </div>
    </nav>

</header>
