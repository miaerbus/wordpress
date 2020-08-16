<div class="wrap">
    <h1>Custom post types</h1>
    <?php settings_errors(); ?>

    <form method="post" action="options.php">
        <?php
        settings_fields('my_plugin_cpt_settings');
        do_settings_sections('my_plugin_cpt');
        submit_button();
        ?>
    </form>
</div>