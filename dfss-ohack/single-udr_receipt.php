<?php
global $post;
setup_postdata( $post );
$tag = $post->post_title;
$donor_name = get_field( "udr_donor_name" );

$street = get_field( "udr_street" );
$city = get_field( "udr_city" );
$state = get_field( "udr_state" );
$zip = get_field( "udr_zip" );

$email = get_field( "udr_email" );
$phone = get_field( "udr_phone" );

$suits = get_field( "udr_donation_suits" );
$separates = get_field( "udr_donation_separates" );
$shoes = get_field( "udr_donation_shoes" );
$other = get_field( "udr_donation_other" );
$worth = get_field( "udr_donation_worth" );

$date = $post->post_date;
$date = date('M-d-Y',strtotime($date));

$receiver_id = get_field( "udr_receiver" ) ?? 1;
$receiver_info = get_userdata($receiver_id);
$receiver = $receiver_info->user_login;

require_once dirname( __FILE__ ) . "/html2pdf-5.2.2/src/Html2Pdf.php";

use Spipu\Html2Pdf\Html2Pdf;
use Spipu\Html2Pdf\Exception\Html2PdfException;
use Spipu\Html2Pdf\Exception\ExceptionFormatter;

try {
    //ob_start();
    $content = get_option( 'udr_receipt_html' );//"<h1>t e s t</h1>";
    $content = str_replace('{{donor}}', $donor_name, $content);
    $content = str_replace('{{tag}}', $tag, $content);

    $content = str_replace('{{street}}', $street, $content);
    $content = str_replace('{{city}}', $city, $content);
    $content = str_replace('{{state}}', $state, $content);
    $content = str_replace('{{zip}}', $zip, $content);

    $content = str_replace('{{email}}', $email, $content);
    $content = str_replace('{{phone}}', $phone, $content);

    $content = str_replace('{{suits}}', $suits, $content);
    $content = str_replace('{{separates}}', $separates, $content);
    $content = str_replace('{{shoes}}', $shoes, $content);
    $content = str_replace('{{other}}', $other, $content);
    $content = str_replace('{{worth}}', $worth, $content);

    $content = str_replace('{{date}}', $date, $content);
    $content = str_replace('{{receiver}}', $receiver, $content);


    $html2pdf = new Html2Pdf('P', 'A5', 'en');
    $html2pdf->setDefaultFont('Arial');
    $html2pdf->writeHTML($content);
    $html2pdf->output('dressforsuccess-sanjose-'.$tag.'.pdf');
} catch (Html2PdfException $e) {
    $html2pdf->clean();

    $formatter = new ExceptionFormatter($e);
    echo $formatter->getHtmlMessage();
}

?>