<?php get_header(); ?>

<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <h1>Search results for '<?php echo get_search_query(); ?>'</h1>
            <?php get_template_part('includes/section', 'searchresults'); ?>
            <?php previous_posts_link(); ?>
            <?php next_posts_link(); ?>
        </div>
    </div>
</div>

<?php get_footer(); ?>