<?php
if (have_posts()) {
    while (have_posts()) { ?>
        <?php the_post(); ?>

        <p>Posted on
            <?php echo get_the_date('d. M.'); ?>
            by <span>
                <?php
                //the_author();
                $first_name = get_the_author_meta('first_name');
                $last_name = get_the_author_meta('last_name');
                echo $first_name . ' ' . $last_name; ?></span>
        </p>
        <p>
            <?php
            // the_tags();
            $tags = get_the_tags();
            // echo '<pre>'; print_r($tags); echo '</pre>';
            if ($tags) {
                foreach ($tags as $tag) {
                    echo '<a class="badge badge-success" href="' . get_tag_link($tag->term_id) . '">' . $tag->name . '</a>, ';
                }
            }
            ?>
        </p>
        <p>
            <?php
            $categories = get_the_category();
            // echo '<pre>'; print_r($categories); echo '</pre>';
            if ($categories) {
                foreach ($categories as $category) {
                    echo '<a class="badge badge-success" href="' . get_category_link($category->term_id) . '">' . $category->name . '</a>, ';
                }
            }
            ?>
        </p>

        <?php comments_template('comments.php', true); ?>

<?php
        the_content();
    }
}
?>