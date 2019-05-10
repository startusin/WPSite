<footer>
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-5">
                <p class="footer_h open_sans bold"><?php the_field('footer_first_block_title', 'option'); ?></p>
                <div class="footer_text open_sans">
                    <?php the_field('footer_first_block_description', 'option'); ?>
                </div>
                <p class="footer_email open_sans">
                    <?php the_field('footer_first_block_text_before_email', 'option'); ?> <a href="mailto:<?php the_field('footer_first_block_email', 'option'); ?>"><?php the_field('footer_first_block_email', 'option'); ?></a>
                </p>
            </div>

            <div class="col-xs-12 col-sm-4 col-md-4 col-lg-3">
                <p class="footer_h open_sans bold"><?php the_field('footer_second_block_title', 'option'); ?></p>
                <ul class="links_nav">
                    <?php while( have_rows('footer_second_block_menu','option')): the_row(); ?>
                        <?php $link = !empty(get_sub_field('footer_second_block_menu_url_custom')) ? get_sub_field('footer_second_block_menu_url_custom') : get_permalink(get_sub_field('footer_second_block_menu_url', $footer_menu)); ?>
                        <li><a href="<?php echo $link; ?>"><?php the_sub_field('footer_second_block_menu_title', $footer_menu); ?></a></li>
                    <?php endwhile; ?>
                </ul>
            </div>

            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4 text-right">
                <p class="footer_h_right open_sans bold"><?php the_field('footer_third_block_title', 'option'); ?></p>
                <ul class="follow_link">
                    <?php while (has_sub_field('footer_third_block_social_network', 'option')): ?>
                        <li><a href="<?php the_sub_field('footer_third_block_social_network_url'); ?>"><?php the_sub_field('footer_third_block_social_network_icon'); ?></a></li>
                    <?php endwhile; ?>
                </ul>
            </div>
        </div>
        <hr>
        <div class="powered open_sans">
            <?php the_field('footer_third_block_bottom_text', 'option'); ?>
        </div>
    </div>
</footer>

<div id="cookies-main-wrapper" class="cookie-bar" style="display: none; bottom: 0;">
    <div class="txt-block"><?php echo i18nString('We use cookies to improve your browsing experience'); ?>
        <a href="/cookie-policy/" class="cookie-link"><?php echo i18nString('Learn more'); ?></a>
        <a href="#" class="cookie-close-link accept-cookie"><?php echo i18nString('Accept'); ?></a>
    </div>
    <div class="close-btn">
        <a href="#" class="w-inline-block accept-cookie">
            <i class="fa fa-window-close"></i>
        </a>
    </div>
</div>

