<?php get_header(); ?>

<div class="container">

    <h1><?php the_title(); ?></h1>

    <?php if (has_post_thumbnail()) { ?>
        <img src="<?php the_post_thumbnail_url('blog-large'); ?>" alt="<?php the_title() ?>" class="img-thumbnail" />
    <?php } ?>

    <div class="row">
        <div class="col-lg-6">
            <?php get_template_part('includes/section', 'cars'); ?>
            <?php wp_link_pages(); ?>
        </div>
        <div class="col-lg-6">
            <ul>
                <li>Color: <?php the_field('color'); ?></li>
                <li>Registration: <?php the_field('registration'); ?></li>
            </ul>
        </div>
    </div>
</div>

<?php get_footer(); ?>