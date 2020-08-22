<div class="wrap">
    <h1>Custom post types</h1>
    <?php settings_errors(); ?>

    <ul class="nav nav-tabs">
        <li class="<?php echo !isset($_POST["edit_post"]) ? 'active' : '' ?>"><a href="#tab-1">Your Custom Post Types</a></li>
        <li class="<?php echo isset($_POST["edit_post"]) ? 'active' : '' ?>">
            <a href="#tab-2"><?php echo isset($_POST["edit_post"]) ? 'Edit' : 'Add' ?>Custom Post Type</a>
        </li>
        <li><a href="#tab-3">Export</a></li>
    </ul>

    <div class="tab-content">
        <div id="tab-1" class="tab-pane <?php echo !isset($_POST["edit_post"]) ? 'active' : '' ?>">
            <h3>Manage your custom post types</h3>
            <table class="cpt-table">
                <tr>
                    <th>ID</th>
                    <th>Singular Name</th>
                    <th>Plural Name</th>
                    <th>Public</th>
                    <th>Archive</th>
                    <th>Actions</th>
                </tr>
                <?php
                $options = get_option('my_plugin_cpt') ?: array();

                foreach ($options as $option) {
                    $public = isset($option['public']) ? "TRUE" : "FALSE";
                    $archive = isset($option['has_archive']) ? "TRUE" : "FALSE";

                    echo "<tr><td>{$option['post_type']}</td><td>{$option['singular_name']}</td><td>{$option['plural_name']}</td><td>{$public}</td><td>{$archive}</td><td>";

                    // edit button
                    echo '<form method="post" action="" class="inline-block" style="display: inline-block">';
                    echo '<input type="hidden" name="edit_post" value="' . $option['post_type'] . '">';
                    submit_button('Edit', 'primary small', 'submit', false);
                    echo "</form> ";


                    // delete button
                    echo '<form method="post" action="options.php" class="inline-block" style="display: inline-block">';

                    settings_fields('my_plugin_cpt_settings');
                    echo '<input type="hidden" name="remove" value="' . $option['post_type'] . '" >';
                    submit_button('Delete', 'delete small', 'submit', false, array(
                        'onclick' => 'return confirm("Are you sure you want to delete this Custom Post Type? The data associated with it will NOT be deleted.");',
                    ));

                    echo "</form></td></tr>";
                }
                ?>
            </table>
        </div>
        <div id="tab-2" class="tab-pane <?php echo isset($_POST["edit_post"]) ? 'active' : '' ?>">
            <form method="post" action="options.php">
                <?php
                settings_fields('my_plugin_cpt_settings');
                do_settings_sections('my_plugin_cpt');
                submit_button();
                ?>
            </form>
        </div>
        <div id="tab-3" class="tab-pane">
            <h3>Export your custom post types</h3>
        </div>
    </div>
</div>