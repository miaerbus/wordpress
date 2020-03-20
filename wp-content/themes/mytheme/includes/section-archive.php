<?php
if (have_posts()) {
    while (have_posts()) {
        the_post(); ?>
        <div class="card">
            <div class="card-body">
                <div class="card-title d-flex justify-content-center">
                    <?php if (has_post_thumbnail()) { ?>
                        <img src="<?php the_post_thumbnail_url('blog-small'); ?>" alt="<?php the_title() ?>" class="img-thumbnail" />
                    <?php } ?>
                    <div>
                        <h1><?php the_title(); ?></h1>
                        <?php the_excerpt(); ?>
                        <a href="<?php the_permalink() ?>">Read more</a>
                    </div>
                </div>
            </div>
        </div>
    <?php
    }
}
