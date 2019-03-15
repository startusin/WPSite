<div class="container">
    <div class="row">
        <div class="col-xs-12 col-lg-8">
            <div class="title_margin">
                <div class="row align-items-center no-gutters">
                    <div class="col-xs-12 col-sm-8"><p class="title_no_margin"><?php the_sub_field('com_news_title'); ?></p></div>
                    <div class="col-xs-12 col-sm-4 col-lg-3 text-right"><a class="more open_sans" href="">View more</a></div>
                </div>
            </div>
            <div class="home_new_block">
                <div class="row">
                    <?php $news = get_sub_field('com_news_news'); ?>
                    <?php if (isset($news[0])): ?>
                    <div class="col-xs-12 col-sm-5">
                        <img src="<?php echo wp_get_attachment_image_src(get_field('blog_basic_image', $news[0]), 'full')[0]; ?>">
                        <a href="<?php the_permalink($news[0]); ?>"><p class="home_new_title"><?php echo get_the_title($news[0]); ?></p></a>
                    </div>
                    <?php endif; ?>

                    <div class="col-xs-12 col-sm-7 second-section">
                        <?php foreach ($news as $i => $id): ?>
                            <?php if ($i === 0): continue; endif; ?>
                            <div class="row">
                                <div class="col-4">
                                    <img src="<?php echo wp_get_attachment_image_src(get_field('blog_basic_image', $id), 'full')[0]; ?>">
                                </div>
                                <div class="col-7 col-lg-6 subitem">
                                    <a href="<?php the_permalink($id); ?>"><strong><?php echo get_the_title($id); ?></strong></a>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-lg-4 green_block">
            <?php while (have_rows('com_news_tips')): the_row(); ?>
                <div>
                    <div class="p_header bold"><?php the_sub_field('com_news_tips_title'); ?></div>
                    <div class="p_description"><?php the_sub_field('com_news_tips_description'); ?></div>
                </div>
            <?php endwhile; ?>
        </div>
    </div>
</div>
<div class="clearfix"></div>
