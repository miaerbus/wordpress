<?php get_header(); ?>

<div class="container">
    <div class="row">
        <div class="col-lg-3">
            <ul style="list-style-type: none; padding: 0;">
                <?php if (is_active_sidebar('page-sidebar')) { ?>
                    <?php dynamic_sidebar('page-sidebar'); ?>
                <?php } ?>
            </ul>
        </div>
        <div class="col-lg-9">
            <h1><?php the_title(); ?></h1>
            <?php get_template_part('includes/section', 'content'); ?>
        </div>
    </div>
</div>
<?php get_footer(); ?>