<?php get_header(); ?>
    <div class="clear"></div>
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-8">
                <?php echo wp_get_attachment_image(get_field('blog_basic_image'), 'full margin'); ?>
                <p class="title"><?php echo get_the_title(); ?></p>
                <p class="text_after open_sans">
                    <?php
                    $content_post = get_post(get_the_ID());
                    echo $content_post->post_content;
                    ?>
                </p>
                <hr>
                <?php if(get_field('blog_basic_download')): ?>
                    <div class="title">Downloads</div>
                    <?php while(has_sub_field('blog_basic_download')): ?>
                        <?php $file = get_sub_field('blog_basic_download_file');?>
                        <a href="<?php echo $file['url']; ?>" class="url open_sans folder"><?php echo $file['filename']; ?></a>
                    <?php endwhile; ?>
                <?php endif; ?>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-4 policies">
                <div class="right_block">
                    <p class="title bold">All Policies</p>
                    <ul class="policies_menu open_sans">
                        <li><a href="">Vision and Mission</a></li>
                        <li><a href="">History of the organisation</a></li>
                        <li><a href="">Structure</a></li>
                        <li><a href="">Financial information</a></li>
                        <li><a href="">Members</a></li>
                        <li><a href="">Secretariat</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="clear"></div>
    <div class="blog-template-item">
        <header class="article" style="background-image: url('<?php echo $bg[0]; ?>');">
            <div class="container">
                <div class="col-md-12">
                    <div class="banner-text-article">
                        <?php if(get_field('blog_basic_tags', get_the_ID())): ?>
                            <?php foreach (get_field('blog_basic_tags', get_the_ID()) as $tag): ?>
                                <a class="botton-article" href="<?php the_permalink($tag); ?>"><?php echo get_the_title($tag); ?></a>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </header>
    </div>
<?php get_footer(); ?>
