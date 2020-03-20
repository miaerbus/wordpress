<?php get_header(); ?>

<div class="container">
    <div class="row">
        <div class="col-lg-3">
            <ul style="list-style-type: none; padding: 0;">
                <?php if (is_active_sidebar('blog-sidebar')) { ?>
                    <?php dynamic_sidebar('blog-sidebar'); ?>
                <?php } ?>
            </ul>
        </div>
        <div class="col-lg-9">
            <h1><?php echo single_cat_title() ?></h1>
            <?php get_template_part('includes/section', 'archive'); ?>
            <?php previous_posts_link(); ?>
            <?php next_posts_link(); ?>
        </div>
    </div>
</div>

<?php get_footer(); ?>