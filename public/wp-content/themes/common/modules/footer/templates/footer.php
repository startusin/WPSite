<footer>
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
                <p class="footer_h open_sans bold"><?php the_field('footer_first_block_title', 'option'); ?></p>
                <p class="footer_text open_sans">
                    <?php the_field('footer_first_block_description', 'option'); ?>
                </p>
                <p class="footer_email open_sans">
                    <?php the_field('footer_first_block_text_before_email', 'option'); ?> <a href="mailto:<?php the_field('footer_first_block_email', 'option'); ?>"><?php the_field('footer_first_block_email', 'option'); ?></a>
                </p>
            </div>

            <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                <p class="footer_h open_sans bold"><?php the_field('footer_second_block_title', 'option'); ?></p>
                <ul class="links_nav">
                    <?php $footer_second_block_menu = get_field('footer_second_block_menu', 'option');?>
                    <?php foreach($footer_second_block_menu as $links): ?>
                        <li><a href="<?php echo get_permalink($links); ?>"><?php echo get_the_title($links); ?></a></li>
                    <?php endforeach; ?>
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
        <div class="powered">
            <?php the_field('footer_third_block_bottom_text', 'option'); ?>
        </div>
    </div>
</footer>
