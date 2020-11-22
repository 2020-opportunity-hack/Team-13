<?php // Silence is golden
if(isset($_POST['udr_donor_name'])) {
    echo '<script>alert("'.$_POST['udr_donor_name'].'");</script>';

    // include_once('udr_receipt_template.php');
    $current_user_id = get_current_user_id();
    $unique_id = "DR" . current_time( 'ymd', true ) . $current_user_id . wp_rand( 111, 999 );
    wp_insert_post( array(
        'post_title'    => $unique_id,
        'post_type'     => 'udr_receipt',
        'meta_input' => array(
            'udr_email' => $_POST['udr_donor_email'],
            'udr_phone' => $_POST['udr_donor_phone'],
            'udr_street' => $_POST['udr_donor_address_street'],
            'udr_city' => $_POST['udr_donor_address_city'],
            'udr_state' => $_POST['udr_donor_address_state'],
            'udr_zip' => $_POST['udr_donor_address_zip'],
            'udr_donation_suits' => $_POST['udr_donor_donation_suits'],
            'udr_donation_separates' => $_POST['udr_donor_donation_separates'],
            'udr_donation_shoes' => $_POST['udr_donor_donation_shoes'],
            'udr_donation_other' => $_POST['udr_donor_donation_other'],
            'udr_donation_worth' => $_POST['udr_donor_donation_worth'],
            'udr_donor_name' => $_POST['udr_donor_name'],
            'udr_donor' => $current_user_id
        )
    ) ); 
}

