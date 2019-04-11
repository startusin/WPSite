<?php
/*
Template Name: Timeline
*/
?>
<?php get_header(); ?>
<div class="container">
    <div class="clear"></div>
    <div class="title bold timeline-no-padding"><?php the_field('timeline_page_title'); ?></div>
    <div class="history_description open_sans"><?php the_field('timeline_page_description'); ?></div>

    <?php $timeline = get_field('timeline_page_timeline'); ?>

    <ul class="timeline">
        <?php foreach ($timeline as $i => $row): ?>
        <li<?php if (($i+1) % 2 === 0): ?> class="timeline-inverted"<?php endif; ?>>
            <div class="timeline-badge"></div>
            <div class="timeline-panel">
                <div class="timeline_date bold"><?php echo $row['timeline_page_timeline_year']; ?></div>
                <?php echo wp_get_attachment_image($row['timeline_page_timeline_image'], 'full'); ?>
                <div class="history_title bold"><?php echo $row['timeline_page_timeline_title']; ?></div>
                <div class="open_sans history_desc"><?php echo $row['timeline_page_timeline_text']; ?></div>
            </div>
        </li>
        <?php endforeach; ?>
    </ul>
    <div class="clear"></div>
</div>
<?php get_footer(); ?>
