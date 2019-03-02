<?php get_header(); ?>
<?php $bg = wp_get_attachment_image_src(get_field('blog_basic_image', get_the_ID()), 'full'); ?>

<div class="blog-template-item">
    <header class="article" style="background-image: url('<?php echo $bg[0]; ?>');">
        <div class="container">

            <div class="col-md-12">
                <div class="banner-text-article">
                    <h1 class="p-description-banner-text-article"><?php echo get_the_title(); ?></h1>

                    <?php if(get_field('blog_basic_tags', get_the_ID())): ?>
                        <?php foreach (get_field('blog_basic_tags', get_the_ID()) as $tag): ?>
                            <a class="botton-article" href="<?php the_permalink($tag); ?>"><?php echo get_the_title($tag); ?></a>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </header>

    <main>
        <div class="container">
            <div class="article-p">

                <?php
                $content_post = get_post(get_the_ID());
                echo $content_post->post_content;
                ?>

                <?php if(get_field('blog_basic_tags', get_the_ID())): ?>
                    <div class="blog-f">
                        <?php foreach (get_field('blog_basic_tags', get_the_ID()) as $tag): ?>
                            <a class="teg" href="<?php the_permalink($tag); ?>"><?php echo get_the_title($tag); ?></a>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>

                <div class="clear"></div>

                <?php if(get_field('blog_basic_related_posts', get_the_ID())): ?>
                    <?php foreach (get_field('blog_basic_related_posts', get_the_ID()) as $related): ?>
                        <div class="col-md-4">
                            <div class="blog-page">
                                <?php echo wp_get_attachment_image(get_field('blog_basic_image', $related), 'wp-blog', false, array('class' => 'blog-page-img')); ?>
                                <p class="blog-page-header"><?php echo get_the_title($related); ?></p>
                                <p class="blog-page-d"><?php the_field('blog_basic_short_description', $related); ?></p>

                                <div class="read">
                                    <a class="read-more" href="<?php the_permalink($related); ?>">Read more</a>
                                    <p class="share">Share</p>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>

                <div class="clearfix"></div>
            </div>
        </div>
    </main>
</div>

<?php get_footer(); ?>