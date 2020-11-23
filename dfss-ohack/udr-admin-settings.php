<?php
function my_admin_menu() {
    add_menu_page(
        'UDR Admin Options',
        'UDR Options',
        'manage_options',
        'udr-admin-options',
        'udr_admin_page_contents',
        'dashicons-schedule',
        3
    );
}
add_action( 'admin_menu', 'my_admin_menu' );

function udr_admin_page_contents() {
    ?>
    <h1> <?php esc_html_e( 'UDR | DFSS-OHACK Plugin', 'udr-textdomain' ); ?> </h1>
    <form method="POST" action="options.php" name="udr-admin-options-form">
    <?php
    settings_fields( 'udr-admin-options' );
    do_settings_sections( 'udr-admin-options' );
    submit_button();
    ?>
    </form>
    <?php
}


add_action( 'admin_init', 'my_settings_init' );

function my_settings_init() {

    add_settings_section(
        'udr_plugin_setting_section',
        'Custom Plugin Settings',
        'my_setting_section_callback_function',
        'udr-admin-options'
    );

		add_settings_field(
		   'udr_receipt_html',
		   'Receipt format',
		   'udr_setting_markup',
		   'udr-admin-options',
		   'udr_plugin_setting_section'
		);

		register_setting( 'udr-admin-options', 'udr_receipt_html' );
}


function my_setting_section_callback_function() {
    echo '<p>Please update settings related to Donation/Receipt Tracker (DFSS-OHACK Plugin Options) here.</p>';
}

/*
function udr_setting_markup() {
    ?>
    <label for="udr_receipt_html"><?php _e( '(HTML Template)' ); ?></label>
    <br/>
    <textarea rows="40" cols="100" form="udr-admin-options-form" id="udr_receipt_html" name="udr_receipt_html" value="<?php echo get_option( 'udr_receipt_html' ); ?>" ></textarea>
    <?php
}
*/

function udr_setting_markup() {
    $content = get_option( 'udr_receipt_html' );
    wp_editor( $content, 'udr_receipt_html', array( 
        'textarea_name' => 'udr_receipt_html',
        'media_buttons' => false,
    ) );
}
?>