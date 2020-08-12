<div class="wrap">
    <h1>My awesome plugin</h1>
    <?php settings_errors(); ?>

    <form method="post" action="options.php">
        <?php 
            settings_fields('my_plugin_options_group');
            do_settings_sections('my_plugin');
            submit_button();
        ?>
    </form>
</div>