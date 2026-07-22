<!-- start: Footer Contact Popup -->
<?php
$about_email  =  get_field('about_email', 'option') ?: 'info@mail.com';
$about_phone  =  get_field('about_phone_number', 'option') ?: '9999999999';
$about_address  =  get_field('about_address', 'option') ?: 'Your Address Here';
$facebook_link  =  get_field('facebook_link', 'option') ?: 'https://www.facebook.com/';
$linkedin_link  =  get_field('linkedin_link', 'option') ?: 'https://www.linkedin.com/';
$instagram_link  =  get_field('instagram_link', 'option') ?: 'https://www.instagram.com/';
$whatsapp_link  =  get_field('whatsapp_link', 'option') ?: 'https://web.whatsapp.com/';
$wordpress_shopify_form_heading        = get_field('wordpress_&_shopify_form_heading', 'option') ?: 'Lets Work Together';
$wordpress_shopify_form_content        = get_field('wordpress_&_shopify_form_content', 'option') ?: 'I design and code beautifully simple things and i love what i do. Just simple like that!';
$wordpress_shopify_form_shortcode        = get_field('wordpress_&_shopify_form_shortcode', 'option') ?: 'No Form Are Availble. Please Add Contact Form 7 Shortcode';
?>
<div id="contact-wrapper" class="popup_content_area zoom-anim-dialog mfp-hide" data-lenis-prevent>
<div class="popup_modal_content">
<div class="contact-wrapper_details">
<div class="row">
<div class="col-12">

<div class="popup_contact_area">
<div class="popup_contact_form order-2 order-md-1 wow fadeInUp" data-wow-delay=".3s">
<div class="section-header">
<h2 class="section-title"><?php echo esc_html( $wordpress_shopify_form_heading ); ?></h2>
<p><?php echo esc_html( wp_strip_all_tags( $wordpress_shopify_form_content ) ); ?></p>
</div>
<div class="tj-contact-form style-2">
<?php
$wordpress_shopify_form_shortcode = get_field('wordpress_&_shopify_form_shortcode', 'option') ?: '';

if (!empty($wordpress_shopify_form_shortcode)) {
    echo do_shortcode($wordpress_shopify_form_shortcode);
} else {
    echo 'No Form Available. Please add the Contact Form 7 shortcode in ACF Options.';
}
?>
</div>
<div class="popup_contact_info">
    <div class="pop_cont_box cont_box">
        <i class="fa-solid fa-location-arrow"></i>
        <p><?php echo esc_html( $about_address ); ?></p>
    </div>
    <div class="pop_cont_box cont_box">
        <a href="mailto:<?php echo esc_html( $about_email ); ?>"><i class="fa-solid fa-at"></i></a>
        <a href="mailto:<?php echo esc_html( $about_email ); ?>"><p><?php echo esc_html( $about_email ); ?></p></a>
    </div>
    <div class="pop_cont_box cont_box">
        <a href="tel:+<?php echo esc_html( $about_phone ); ?>"><i class="fa-solid fa-phone"></i></a>
        <a href="tel:+<?php echo esc_html( $about_phone ); ?>"><p>+<?php echo esc_html( $about_phone ); ?></p></a>
    </div>
    <div class="pop_cont_box my_social_icons">
        <p>Follow Us:</p>
        <ul class="ul-reset social-icons style-3 wow fadeInUp" data-wow-delay=".6s">
<li>
<a href="<?php echo esc_html( $whatsapp_link ); ?>" target="_blank"><i class="fa-brands fa-whatsapp"></i></a>
</li>
<li>
<a href="<?php echo esc_html( $linkedin_link ); ?>" target="_blank"><i class="fa-brands fa-linkedin"></i></a>
</li>
<li>
<a href="<?php echo esc_html( $facebook_link ); ?>" target="_blank"><i class="fa-brands fa-facebook"></i></a>
</li>
<li>
<a href="<?php echo esc_html( $instagram_link ); ?>" target="_blank"><i class="fa-brands fa-instagram"></i></a>
</li>
</ul>
    </div>
</div>
</div>

</div>

</div>
</div>
</div>
</div>
</div>
<!-- end: Footer Contact Popup -->