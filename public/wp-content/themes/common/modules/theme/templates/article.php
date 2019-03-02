<?php if (have_posts()) : the_post(); ?>
    <?php if ( !post_password_required() ) : ?>
        <?php $author = (get_field('posted_by')) ? get_field('posted_by') : 'N-iX'; ?>
        <?php $image_id = get_post_thumbnail_id(); ?>
        <?php $category_list = get_the_category( get_the_ID() ); ?>

        <style>
        <?php
        $image_attributes = wp_get_attachment_image_src( $image_id, 'nix-banner-mobile' );
        if ( $image_attributes ) : ?>
             .article .post-header {
               background-image: url(<?php echo $image_attributes[0]; ?>);
             }
        <?php endif; ?>

        <?php
        $image_attributes = wp_get_attachment_image_src( $image_id, 'nix-banner-desktop' );
        if ( $image_attributes ) : ?>
             @media (min-width: 768px) {
                 .article .post-header {
                   background-image: url(<?php echo $image_attributes[0]; ?>);
                 }
             }
        <?php endif; ?>

        <?php
        $image_attributes = wp_get_attachment_image_src( $image_id, 'full' );
        if ( $image_attributes ) : ?>
             @media (min-width: 1200px) {
                .article .post-header {
                  background-image: url(<?php echo $image_attributes[0]; ?>);
                }
             }
        <?php endif; ?>
        </style>

        <?php
            module_template('breadcrumbs/breadcrumbs', array(
                'Home' => home_url('/'),
                'Success Stories' => false,
                'Articles' =>  home_url('/blog/'),
                get_the_title() => false,
            ));
        ?>

        <div class="article">
            <div class="post-header">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12">
                            <h1><?php the_title(); ?></h1>
                        </div>
                        <div class="col-xs-12 col-sm-6">
                            <div class="post-info">
                                <div class="post-author">By <?php echo $author; ?></div>
                                <div class="post-date"><?php the_time('F j, Y'); ?></div>
                            </div>
                        </div>
                        <div class="col-sm-6 text-right hidden-xs">
                            Share: <?php echo do_shortcode('[addtoany]'); ?>
                        </div>
                        <div class="clearfix"></div>

                        <div class="col-sm-12">
                            <?php if (get_field('tags')): ?>
                                <div class="post-categories">
                                    <?php foreach (get_field('tags') as $tag): ?>
                                        <a onclick="ga('send', 'event', location.pathname, 'TagClick', '<?php echo get_the_title($tag); ?>');" href="<?php the_permalink($tag); ?>"><?php echo get_the_title($tag); ?></a>
                                    <?php endforeach; ?>
                                </div>
                            <?php endif; ?>
                        </div>

                    </div>
                </div>
            </div>

            <div class="container">
                <div class="row">
                    <div class="col-sm-12 col-md-8">
                        <div class="post-content">
                            <?php the_content(); ?>
                        </div>
                    </div>
                    <div class="col-md-4 hidden-xs hidden-sm have-question">
                        <div class="title">HAVE A QUESTION?</div>
                        <a onclick="ga('send', 'event', location.pathname, 'Contact', 'Sidebar');" href="<?php echo get_permalink( get_page_by_path( 'contacts' ) ); ?>">SPEAK TO AN EXPERT</a>
                        <?php module_template('database/suscribe_form'); ?>
                    </div>
                </div>
                <div class="clearfix end-anchor"></div>

                <?php if (get_field('tags') || get_field('blog_related_services', get_the_ID())): ?>
                    <?php module_template('theme/related-services', array('post_ID' => get_the_ID())); ?>
                    <div class="clearfix"></div>
                <?php endif; ?>

                <div class="row post-footer">
                    <div class="col-sm-6">
                        Share: <?php echo do_shortcode('[addtoany]'); ?>
                    </div>
                    <div class="col-sm-6">
                        <div class="post-date"><?php the_time('F j, Y'); ?></div>
                    </div>
                </div>

                <div class="visible-xs visible-sm">
                    <?php module_template('database/suscribe_form'); ?>
                </div>

                <?php if (get_field('tags') || get_field('blog_related_posts', get_the_ID())): ?>
                    <div class="clearfix"></div>
                    <?php module_template('theme/related-posts', array('post_ID' => get_the_ID())); ?>
                    <div class="clearfix"></div>
                <?php endif; ?>

                <?php disqus_embed('n-ix-1'); ?>

            </div>
        </div>
    <?php else: ?>
        <?php module_template('theme/password-form'); ?>
    <?php endif; ?>
<?php endif; ?>

<?php if (!post_password_required()): module_template('components/com_about'); endif; ?><br>
