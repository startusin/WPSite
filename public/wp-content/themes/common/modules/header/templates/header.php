<header>
    <div class="top text-right">
        <div class="container">
            <ul class="language">
                <li><a href="?lang=en" <?php if(!$_REQUEST['lang'] || $_REQUEST['lang'] === 'en'): ?>class="active"<?php endif; ?>>En</a></li>
                <li><a href="?lang=fr" <?php if ($_REQUEST['lang'] === 'fr'): ?>class="active"<?php endif; ?>>Fr</a></li>
            </ul>
            <ul class="follow_link_h">
                <?php while (has_sub_field('header_social_network', 'option')): ?>
                    <li><a href="<?php the_sub_field('header_social_network_url'); ?>"><?php the_sub_field('header_social_network_icon'); ?></a></li>
                <?php endwhile; ?>
            </ul>
            <a href="<?php the_field('header_button_url', 'option'); ?>" class="members_area"><?php the_field('header_button_icon', 'option'); ?> <?php the_field('header_button_text', 'option'); ?></a>
        </div>
    </div>
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light">
            <a class="navbar-brand" href="/?lang=<?php echo $_REQUEST['lang'] ?? 'en'; ?>">
                <?php echo wp_get_attachment_image(get_field('header_logo', 'option'), 'full'); ?>
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span ><i class="fas fa-bars"></i></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
                    <?php while (have_rows('header_menu', 'option')): the_row(); ?>

                    <?php if(get_sub_field('header_menu_dropdown_link') || get_sub_field('header_menu_news') === 'yes'): ?>
                        <li class="nav-item dropdown <?php if (get_sub_field('header_menu_full_width_dropdown') || get_sub_field('header_menu_news') === 'yes'): ?>full_width_dropdown<?php endif; ?>">
                            <a class="nav-link dropdown-toggle active_<?php the_sub_field('header_menu_url'); ?>" href="#" id="dropdown_<?php the_sub_field('header_menu_url'); ?>" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php the_sub_field('header_menu_title'); ?></a>
                            <?php if(get_sub_field('header_menu_news') === 'yes'): ?>
                            <div class="dropdown-menu full_width">
                                <div class="container">
                                    <div class="row">
                                        <?php $rows = get_posts(['post_type' => 'post', 'numberposts' => -1, 'orderby'=> 'title', 'order' => 'ASC']); ?>
                                        <?php $arr = [1 => [], 2 => [], 3 => []]; ?>

                                        <?php $divider = (int)ceil(count($rows) / 3); ?>
                                        <?php $subIndex = 0; ?>
                                        <?php $currKey = 1; ?>
                                        <?php foreach($rows as $row): $subIndex++; ?>
                                            <?php $arr[$currKey][] = ['link' => get_the_permalink($row->ID), 'name' => $row->post_title]; ?>
                                            <?php if($subIndex === $divider):
                                                $divider = (int)ceil((count($rows) - $divider) / 2);
                                                $currKey++;
                                                $subIndex = 0;
                                            endif; ?>
                                        <?php endforeach; ?>

                                        <div class="col-12 col-lg-4">
                                            <?php foreach($arr[1] as $row): ?>
                                                <a class="dropdown-item" href="<?php echo $row['link']; ?>"><?php echo $row['name']; ?></a>
                                            <?php endforeach; ?>
                                        </div>

                                        <div class="col-12 col-lg-4">
                                            <?php foreach($arr[2] as $row): ?>
                                                <a class="dropdown-item" href="<?php echo $row['link']; ?>"><?php echo $row['name']; ?></a>
                                            <?php endforeach; ?>
                                        </div>

                                        <div class="col-12 col-lg-4">
                                            <?php foreach($arr[3] as $row): ?>
                                                <a class="dropdown-item" href="<?php echo $row['link']; ?>"><?php echo $row['name']; ?></a>
                                            <?php endforeach; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php else: ?>
                            <div class="dropdown-menu" aria-labelledby="dropdown_<?php the_sub_field('header_menu_url'); ?>">
                                <?php while(have_rows('header_menu_dropdown', 'option')): the_row(); ?>
                                    <a class="dropdown-item" href="<?php echo !empty(get_sub_field('header_menu_dropdown_custom_url')) ? get_sub_field('header_menu_dropdown_custom_url') : get_sub_field('header_menu_dropdown_url'); ?>"><?php the_sub_field('header_menu_dropdown_title'); ?></a>
                                <?php endwhile; ?>
                            </div>
                            <?php endif ?>
                        </li>
                    <?php else: ?>
                        <li class="nav-item dropdown <?php the_sub_field('header_menu_full_width_dropdown') ?>">
                            <a class="nav-link active_<?php the_sub_field('header_menu_url'); ?>" href="<?php the_permalink(get_sub_field('header_menu_url')); ?>" ><?php the_sub_field('header_menu_title'); ?></a>
                        </li>
                        <?php endif ?>

                    <?php endwhile; ?>


                    <li class="nav-item p-left">
                        <a class="nav-link search_top<?php if (is_search()): ?> search-page<?php endif; ?>" href="<?php echo home_url( '/?s=' ); ?>"><i class="fas fa-search"></i></a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</header>
<?php $page_id = get_the_ID(); ?>
<?php $page = get_ancestors($page_id, 'page')[0]; ?>

<?php if($page == null): ?>
<?php $page = get_the_ID(); ?>
<?php else:?>
<?php $page = get_ancestors($page_id, 'page')[0]; ?>
<?php endif;?>



<style>
    .active_<?php echo $page; ?> {
        border-bottom: 2px solid #245590 !important;
        color: #245590 !important;
    }
</style>

