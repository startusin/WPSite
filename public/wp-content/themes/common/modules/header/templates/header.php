<header id="top">
    <nav class="nav-v2 navShadow">
        <div class="container">
            <div class="row">
                <div class="col-lg-2 col-md-2">
                    <div id="brand" class="brand-logo">
                        <div id="logo" class="logo-v2">
                            <a href="/">
                                <?php echo wp_get_attachment_image( 158, 'full', "", ["class" => "img-responsive"]);  ?>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-10 col-md-10">
                    <div id="menu" class="menu-v2">
                        <div id="menu-toggle">
                            <div id="menu-icon">
                                <div class="bar"></div>
                                <div class="bar"></div>
                                <div class="bar"></div>
                            </div>
                        </div>
                        <ul class="nav2">
                            <?php wp_nav_menu(['theme_location' => 'head']); ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </nav>
</header>
