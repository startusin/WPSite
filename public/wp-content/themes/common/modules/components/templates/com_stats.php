<div class="number_block">
    <div class="container">

        <div class="row">
            <?php $rows = get_sub_field('com_stats_rows'); ?>
            <?php foreach ($rows as $i => $row): ?>
                <div class="item col-6 col-sm-3 col-md-3 col-lg-3<?php if (($i+1) % 4 !== 0): ?> shadow-right<?php endif; ?>">
                    <span class="number open_sans"><?php echo $row['com_stats_rows_title']; ?></span>
                    <span class="after_text open_sans"><?php echo $row['com_stats_rows_description']; ?></span>
                </div>
            <?php endforeach; ?>
        </div>

        <div class="clear"></div>
    </div>
</div>
