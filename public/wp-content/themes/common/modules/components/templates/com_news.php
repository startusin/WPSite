<div class="container">
    <div class="row">
        <div class="col-xs-12 col-lg-8">
            <div class="title_margin">
                <div class="row align-items-end no-gutters">
                    <div class="col-xs-12 col-sm-8"><p class="title_no_margin"><?php the_sub_field('com_news_title'); ?></p></div>
                    <div class="col-xs-12 col-sm-4 col-lg-3 text-right"><a class="more open_sans" href="<?php the_sub_field('com_news_url'); ?>">View more</a></div>
                </div>
            </div>
            <div class="home_new_block">
                <div class="row">
                    <?php $news = get_sub_field('com_news_news'); ?>
                    <?php if (isset($news[0])): ?>
                    <div class="col-xs-12 col-sm-5 no-pdn-lg custom-news-pdn">
                        <a href="<?php the_permalink($news[0]); ?>">
                        <img src="<?php echo wp_get_attachment_image_src(get_field('publications_basic_image', $news[0]), 'wp-thumb-img')[0]; ?>">
                        <p class="home_new_title"><?php echo get_the_title($news[0]); ?></p>
                        </a>
                    </div>
                    <?php endif; ?>

                    <?php if (isset($news[1])): ?>
                    <div class="col-xs-12 col-sm-5 no-pdn-lg custom-news-pdn cmrg-left">
                        <a href="<?php the_permalink($news[1]); ?>">
                        <img src="<?php echo wp_get_attachment_image_src(get_field('publications_basic_image', $news[1]), 'wp-thumb-img')[0]; ?>">
                        <p class="home_new_title"><?php echo get_the_title($news[1]); ?></p>
                        </a>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-lg-4">
            <div class="green_block">
                <?php while (have_rows('com_news_tips')): the_row(); ?>
                    <div>
                        <div class="p_header bold"><?php the_sub_field('com_news_tips_title'); ?></div>
                        <div class="p_description"><?php the_sub_field('com_news_tips_description'); ?></div>
                    </div>
                <?php endwhile; ?>
            </div>
        </div>
    </div>
</div>
<div class="clearfix"></div>
