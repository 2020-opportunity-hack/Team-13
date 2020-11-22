<?php // Silence is golden

function get_user_donations() {
    $args = array(
        'post_type'  => 'udr_receipt',
        'meta_query' => array(
            array(
                'key'   => 'udr_donor',
                'value' => get_current_user_id(),
            )
        )
    );       
    $donations = get_posts( $args );
    return $donations;
}

function list_user_donations() {
    $donations = get_user_donations();
    global $post;
    print_r($donations);
    ?>
    <?php if($donations) : ?>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">Tag #</th>
                    <th scope="col">Donor</th>
                    <th scope="col">Estimated Worth</th>
                    <th scope="col">Date</th>
                    <th scope="col">Receipt</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach ( $donations as $post ) : setup_postdata( $post ); ?>
                <tr>
                    <th scope="row"><?php echo the_title(); ?></th>
                    <td><?php echo get_field( "udr_donor_name" ); ?></td>
                    <td><?php echo get_field( "udr_donation_worth" ); ?></td>
                    <td><?php echo the_date(); ?></td>
                    <td>
                        <?php if(get_field( "udr_is_approved" )): ?>
                            <button class="btn btn-lg">Download</button>
                        <?php endif; ?>
                        <?php if(!get_field( "udr_is_approved" )): ?>
                            Processing
                        <?php endif; ?>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    <?php endif; wp_reset_postdata(); ?>
    <?php if(!$donations) : ?>
        <div style="text-align: center;">
            <h4>You're yet to start making the donations :)</h4>
        </div>
    <?php endif; ?>

    <?php
}