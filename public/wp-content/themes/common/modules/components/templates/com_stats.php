<div class="number_block">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-lg-7 color-in">
                <div class="title"><?php the_sub_field('com_stats_title'); ?></div>
                <div class="text"><?php the_sub_field('com_stats_text'); ?></div>

                <?php $rows = get_sub_field('com_stats_rows'); ?>
                <?php foreach ($rows as $i => $row): ?>
                    <div class="item">
                        <span class="number open_sans"><?php echo $row['com_stats_rows_title']; ?></span>
                        <span class="after_text open_sans"><?php echo $row['com_stats_rows_description']; ?></span>
                    </div>
                    <?php if (($i + 1) % 2 === 0): ?><div class="clearfix"></div><?php endif; ?>
                <?php endforeach; ?>

                <div class="more">
                    <a href="<?php the_sub_field('com_stats_link_url'); ?>">
                        <?php the_sub_field('com_stats_link_text'); ?>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="globe"></div>

<div class="globe-outliner">
    <div class="dot dot-id-1"></div>
    <div class="dot dot-id-2"></div>
    <div class="dot dot-id-3"></div>
    <div class="dot dot-id-4"></div>
    <div class="dot dot-id-5"></div>
    <div class="dot dot-id-6"></div>
    <div class="dot dot-id-7"></div>
    <div class="dot dot-id-8"></div>
    <div class="dot dot-id-9"></div>
    <div class="dot dot-id-10"></div>
    <div class="dot dot-id-11"></div>
    <div class="dot dot-id-12"></div>
</div>