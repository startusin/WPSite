<?php get_header(); ?>
<?php global $wp_query; ?>

<div class="clear"></div>
<div class="filter_page">
    <div class="container">
        <p class="title">Search</p>
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-7 col-lg-7">
                <?php echo get_search_form(false); ?>
            </div>
        </div>
        <p class="results open_sans"><?php echo $wp_query->post_count; ?> results</p>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-9">
                <?php while ( have_posts() ): the_post(); ?>
                    <?php global $post; ?>
                    <?php $categories = wp_get_post_categories( $post->ID, array('fields' => 'all') ); ?>
                    <?php $catgs = array(); ?>
                    <?php foreach ($categories as $category): $catgs[] = $category->name; endforeach; ?>
                    <div class="publication_block">
                        <p class="title_new bold"><a class="link_title" href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a></p>
                        <p class="description_new open_sans"><?php echo get_the_excerpt(); ?></p>
                        <div class="row">
                            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-2">
                                <div class="date open_sans"><?php echo get_the_date('d/m/Y'); ?></div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-8 col-lg-10">
                                <a class="category-list" href="<?php echo get_permalink(); ?>" class="arrow"><?php echo implode($catgs, ','); ?></a>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
                <?php echo paginate_links(); ?>

                <div class="clear"></div>
            </div>
        </div>
    </div>


    <div class="filter">
        <p class="filter_title bold" data-toggle="collapse" data-target="#f_policy">Filters by policy</p>
        <div id="f_policy" class="collapse show">
            <a href="" class="select_all open_sans">Select All</a>
            <ul class="filter_list open_sans">
                <li><input type="checkbox"><label>Active and Healthy Ageing</label></li>
                <li><input type="checkbox"><label>Active and Healthy Ageing</label></li>
                <li><input type="checkbox"><label>Active and Healthy Ageing</label></li>
                <li><input type="checkbox"><label>Active and Healthy Ageing</label></li>
                <li><input type="checkbox"><label>Active and Healthy Ageing</label></li>
                <li><input type="checkbox"><label>Active and Healthy Ageing</label></li>
                <li><input type="checkbox"><label>Active and Healthy Ageing</label></li>
                <li><input type="checkbox"><label>Active and Healthy Ageing</label></li>
                <li><input type="checkbox"><label>Active and Healthy Ageing</label></li>
                <li><input type="checkbox"><label>Active and Healthy Ageing</label></li>
            </ul>
        </div>

        <p class="filter_title bold" data-toggle="collapse" data-target="#f_category">Filters by category</p>
        <div id="f_category" class="collapse show">
            <a href="" class="select_all open_sans">Select All</a>
            <ul class="filter_list open_sans">
                <li><input type="checkbox"><label>Active and Healthy Ageing</label></li>
                <li><input type="checkbox"><label>Active and Healthy Ageing</label></li>
                <li><input type="checkbox"><label>Active and Healthy Ageing</label></li>
            </ul>
        </div>

        <p class="filter_title bold" data-toggle="collapse" data-target="#f_date">Filters by date</p>
        <div id="f_date" class="collapse">
            <ul class="filter_list open_sans">
                <li><input type="checkbox"><label>Active and Healthy Ageing</label></li>
                <li><input type="checkbox"><label>Active and Healthy Ageing</label></li>
                <li><input type="checkbox"><label>Active and Healthy Ageing</label></li>
            </ul>
        </div>

        <button type="submit" class="btn apply">Apply</button>
    </div>
</div>
<?php get_footer(); ?>
