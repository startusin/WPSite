<?php
/*
Template Name: Article
*/
?>
<?php get_header(); ?>

<?php include('_components.php'); ?>

<div class="container article-content">
    <div class="row">
        <div class="col-md-8 text-inner">
            <?php the_content(); ?>
        </div>
        <div class="col-md-4 right-inner">
            <h2>Have a Question?</h2>
            <div class="btns">
                <a href="/contact-us/">Speak to an expert</a>
            </div>
            <div class="estimate">
                Estimated reading time: <strong><?php echo get_reading_time(get_the_content()); ?></strong>
            </div>
        </div>
    </div>
</div>

<?php get_footer(); ?>
