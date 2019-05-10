<?php get_header(); ?>
<?php global $wp_query; ?>
<?php global $wpdb; ?>
<?php
$s = esc_sql($_REQUEST['s']);
$posts = get_posts(['posts_per_page' => -1, 'post_type'	=> 'post']);
$categories = $_REQUEST['cats'] ?? [];
$policys = $_REQUEST['policy'] ?? [];
$date_value = $_REQUEST['date'] ?? false;
$meta_query = ['relation' => 'AND'];
$category_buider = ['relation' => 'OR'];
$policy_buider = ['relation' => 'OR'];

foreach ($categories as $category){
    $category_buider[] = [
        'key' => 'publications_basic_categories',
        'value' => $category,
        'compare' => 'LIKE',
    ];
}

foreach ($policys as $policy){
    $policy_buider[] = [
        'key' => 'publications_basic_policies',
        'value' => $policy,
        'compare' => 'LIKE',
    ];
}

$meta_query[] = $category_buider;
$meta_query[] = $policy_buider;

if ($date_value) {
    $after = null;
    $before = null;

    if ($date_value === 'today') {
        $after = date("Y-m-d");
        $before = date("Y-m-d");
    }

    if ($date_value === 'week') {
        $newdate = strtotime( '-1 week', strtotime (date("Y-m-d")));
        $newdate = date( "Y-m-d" , $newdate);

        $after = $newdate;
        $before = date("Y-m-d");
    }

    if ($date_value === 'month') {
        $newdate = strtotime( '-1 month', strtotime (date("Y-m-d")));
        $newdate = date( "Y-m-d" , $newdate);

        $after = $newdate;
        $before = date("Y-m-d");
    }

    if ($date_value === 'year') {
        $newdate = strtotime( '-1 year', strtotime (date("Y-m-d")));
        $newdate = date( "Y-m-d" , $newdate);

        $after = $newdate;
        $before = date("Y-m-d");
    }

    $date_query = [
        [
            'after' => $after,
            'before' => $before,
            'inclusive' => true,
        ]
    ];
}

$posts_filter = get_posts(array(
    'posts_per_page'	=> -1,
    'post_type'			=> 'publications',
    'meta_query'	=> $meta_query,
    'date_query' => $date_value ? $date_query : false,
));

$ids = [];
foreach ($posts_filter as $post) {
    $ids[] = $post->ID;
}

function custom_excerpt($x, $length = 450) {
    return strlen($x)<=$length ? $x : substr($x,0,$length) . '...';
}

$qPosts = $wpdb->get_results( 'SELECT wp_posts.*, wp_postmeta.* FROM wp_posts LEFT JOIN wp_postmeta ON wp_posts.ID = wp_postmeta.post_id WHERE wp_posts.id IN ('.implode(',', $ids).') AND (LOWER(wp_posts.post_title) LIKE "%'.strtolower($s).'%" OR LOWER(wp_postmeta.meta_value) LIKE "%'.strtolower($s).'%") GROUP BY wp_posts.id ORDER BY wp_posts.post_date DESC' );
?>
    <div class="filter_page">
        <div class="container">
            <div class="clear"></div>
            <p class="title search_t"><?php echo i18nString('Search'); ?></p>
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-7 col-lg-7">
                    <?php echo get_search_form(false); ?>
                </div>
            </div>
            <p class="results open_sans"><?php echo count($qPosts); ?> <?php echo i18nString('results'); ?></p>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-9">
                    <?php foreach( $qPosts as $post ):setup_postdata( $post ); ?>
                        <?php global $post; ?>
                        <?php $categories = wp_get_post_categories( $post->ID, array('fields' => 'all') ); ?>
                        <?php $catgs = array(); ?>
                        <?php foreach ($categories as $category): $catgs[] = $category->name; endforeach; ?>
                        <div class="publication_block">
                            <p class="title_new bold"><a class="link_title" href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a></p>
                            <a class="link_title" href="<?php echo get_permalink(); ?>">
                                <p class="description_new open_sans"><?php echo custom_excerpt(strip_tags(get_field('publications_basic_content'))); ?></p>
                            </a>
                            <div class="row">
                                <div class="col-xs-12 col-sm-6 col-md-4 col-lg-2">
                                    <div class="date open_sans"><?php echo get_the_date('d/m/Y'); ?></div>
                                </div>
                                <div class="col-xs-12 col-sm-6 col-md-8 col-lg-10">
                                    <div class="сategory_r">
                                        <?php $post_categories = get_field('publications_basic_categories'); ?>
                                        <?php if( $post_categories ): ?>
                                            <?php
                                            $links = [];
                                            foreach($post_categories as $category)
                                                $links[] = '<a href="/?s=&cats%5B%5D='.$category.'&date=all&lang='.(isset($_REQUEST['lang']) && !empty($_REQUEST['lang']) ? $_REQUEST['lang'] : 'en').'" class="category-list bold">'.get_the_title($category).'</a>';
                                            echo join(', ',$links);
                                            ?>
                                        <?php endif; ?>
                                        <a href="<?php echo get_permalink(); ?>" class="arrow"></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                    <?php wp_reset_postdata(); ?>
                    <div class="clear"></div>
                </div>
            </div>
        </div>
        <div class="filter">
            <form name="filter" id="filter" method="get">
                <input type="hidden" name="s" value="<?php echo get_search_query(); ?>">
                <input type="hidden" name="lang" value="<?php echo $_REQUEST['lang'] ?? 'en'; ?>">
                <p class="filter_title bold" data-toggle="collapse" data-target="#f_category" aria-expanded="true">
                    <?php echo i18nString('Filters by category'); ?>
                </p>
                <div id="f_category" class="collapse show">
                    <a href="" id="select_all_categorys" class="select_all open_sans">
                        <?php echo i18nString('Select All'); ?>
                    </a>
                    <ul class="filter_list open_sans">
                        <?php $categorys = get_posts(['numberposts' => -1, 'post_type' => 'categories']); ?>
                        <?php foreach ($categorys as $catg): ?>
                            <li>
                                <label class="checkbox" for="<?php echo $catg->ID ?>"><?php echo $catg->post_title ?>
                                    <input
                                            type="checkbox"
                                            name="cats[]"
                                            id="<?php echo $catg->ID ?>"
                                            value="<?php echo $catg->ID ?>"
                                            <?php if (!empty($_REQUEST['cats']) && in_array($catg->ID, $_REQUEST['cats'])): ?>checked<?php endif; ?>
                                    >
                                    <span class="checkmark"></span>
                                </label>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
                <p class="filter_title bold" data-toggle="collapse" data-target="#f_policy" aria-expanded="true">
                    <?php echo i18nString('Filters by policy'); ?>
                </p>
                <div id="f_policy" class="collapse show">
                    <a href="#" id="select_all_policies" class="select_all open_sans"><?php echo i18nString('Select All'); ?></a>
                    <ul class="filter_list open_sans">
                        <?php $policys = get_posts(['numberposts' => -1, 'post_type' => 'post', 'orderby'=> 'title', 'order' => 'ASC']); ?>
                        <?php foreach ($policys as $policy): ?>
                            <li>
                                <label class="checkbox" for="<?php echo $policy->ID ?>"><?php echo $policy->post_title ?>
                                    <input
                                            type="checkbox"
                                            name="policy[]"
                                            id="<?php echo $policy->ID ?>"
                                            value="<?php echo $policy->ID ?>"
                                            <?php if (!empty($_REQUEST['policy']) && in_array($policy->ID, $_REQUEST['policy'])): ?>checked<?php endif; ?>
                                    >
                                    <span class="checkmark"></span>
                                </label>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
                <p class="filter_title bold collapsed" data-toggle="collapse" data-target="#f_date" aria-expanded="false">
                    <?php echo i18nString('Filters by date'); ?>
                </p>
                <div id="f_date" class="collapse">
                    <ul class="filter_list open_sans">
                        <li>
                            <label class="checkbox""><?php echo i18nString('Today'); ?>
                                <input type="checkbox" name="date" value="today"<?php if ($_REQUEST['date'] === 'today'): ?> checked<?php endif; ?>>
                                <span class="checkmark"></span>
                            </label>
                        </li>
                        <li>
                            <label class="checkbox""><?php echo i18nString('Last Week'); ?>
                                <input type="checkbox" name="date" value="week"<?php if ($_REQUEST['date'] === 'week'): ?> checked<?php endif; ?>>
                                <span class="checkmark"></span>
                            </label>
                        </li>
                        <li>
                            <label class="checkbox""><?php echo i18nString('Last Month'); ?>
                                <input type="checkbox" name="date" value="month"<?php if ($_REQUEST['date'] === 'month'): ?> checked<?php endif; ?>>
                                <span class="checkmark"></span>
                            </label>
                        </li>
                        <li>
                            <label class="checkbox""><?php echo i18nString('Last Year'); ?>
                                <input type="checkbox" name="date" value="year"<?php if ($_REQUEST['date'] === 'year'): ?> checked<?php endif; ?>>
                                <span class="checkmark"></span>
                            </label>
                        </li>
                        <li>
                            <label class="checkbox""><?php echo i18nString('Since Beginning'); ?>
                                <input type="checkbox" name="date" value="all"<?php if ($_REQUEST['date'] === 'all' || !$_REQUEST['date']): ?> checked<?php endif; ?>>
                                <span class="checkmark"></span>
                            </label>
                        </li>
                    </ul>
                </div>
                <button type="submit" class="btn apply"><?php echo i18nString('Apply'); ?></button>
            </form>
        </div>
    </div>
<?php get_footer(); ?>
