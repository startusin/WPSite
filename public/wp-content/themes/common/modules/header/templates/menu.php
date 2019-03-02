<div class="top-nav-menu <?php echo !is_front_page() && !is_home() ? 'white' : 'index'; ?>">
    <div class="container">
        <div class="top">
            <nav class="navbar navbar-default">
                <div class="container">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                            <span class="sr-only">Navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>

                        <div class="logo"><a href="/"><img src="<?php module_img('header/'.(!is_front_page() && !is_home() ? 'logo-white' : 'logo').'.png'); ?>" alt="logo" /></a></div>
                    </div>
                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <?php
                        $args = array(
                            'theme_location' => 'primary',
                            'menu_id' => '',
                            'menu_class' => 'nav navbar-nav',
                            'container' => 'nav',
                            'items_wrap'      => '<ul class="%2$s">%3$s</ul>',
                            'walker' => new Walker_Nav_Primary()
                        );
                        ?>
                        <?php wp_nav_menu($args); ?>


                        <div class="right">
                            <a href="//buyer.marketman.com" class="login">Login</a>
                            <a href="#start-saving" class="request-demo">Request Demo</a>
                        </div>
                    </div><!-- /.navbar-collapse -->
                </div><!-- /.container-fluid -->
            </nav>
        </div>
    </div>
</div>

