<!-- start: Footer Contact Popup -->
<div id="hire_me_wrapper" class="popup_content_area zoom-anim-dialog mfp-hide" data-lenis-prevent>
<div class="popup_modal_content">
<div class="hire_me_wrapper_details">
<div class="row">
<div class="col-12">

<div class="popup_contact_area">
<div class="popup_contact_form order-2 order-md-1 wow fadeInLeft" data-wow-delay=".3s">
<div class="section-header">
<?php
$categories = get_the_category();
if ($categories) {
$category_slugs = wp_list_pluck($categories, 'slug');
// WordPress + Shopify
if (
in_array('wordpress', $category_slugs) &&
in_array('shopify', $category_slugs)
) {
echo '<h2 class="section-title">Hire Me For WordPress & Shopify Development</h2>';
echo '<p class="hire-form-text">WordPress & Shopify Development I design and code beautifully simple things and i love what i do. Just simple like that!</p>';
}// WordPress only
elseif (in_array('wordpress', $category_slugs)) {
echo '<h2 class="section-title">Hire Me For WordPress Development</h2>';
echo '<p class="hire-form-text">WordPress Development I design and code beautifully simple things and i love what i do. Just simple like that!</p>';
}// Shopify only
elseif (in_array('shopify', $category_slugs)) {
echo '<h2 class="section-title">Hire Me For Shopify Development</h2>';
echo '<p class="hire-form-text">hopify Development I design and code beautifully simple things and i love what i do. Just simple like that!</p>';
}// HTML CSS
elseif (in_array('html-css', $category_slugs)) {
echo '<h2 class="section-title">Hire Me For HTML/CSS Development</h2>';
echo '<p class="hire-form-text">HTML/CSS Development I design and code beautifully simple things and i love what i do. Just simple like that!</p>';
}
}
?>
</div>
<div class="tj-contact-form style-2">
<?php
$categories = get_the_category();
if ($categories) {
$category_slugs = wp_list_pluck($categories, 'slug');
// WordPress + Shopify
if (
in_array('wordpress', $category_slugs) &&
in_array('shopify', $category_slugs)
) {
echo do_shortcode('[contact-form-7 id="b8209b0" title="Hire WordPress & Shopify Developer Form"]');
}// WordPress only
elseif (in_array('wordpress', $category_slugs)) {
echo do_shortcode('[contact-form-7 id="f27ecf3" title="Hire WordPress Developer Form"]');
}// Shopify only
elseif (in_array('shopify', $category_slugs)) {
echo do_shortcode('[contact-form-7 id="b11504f" title="Hire Shopify Developer Form"]');
}// HTML CSS
elseif (in_array('html-css', $category_slugs)) {
echo do_shortcode('[contact-form-7 id="ff291ee" title="Hire HTML/CSS Developer Form"]');
}
}
?>
</div>
<div class="popup_contact_info">
    <div class="pop_cont_box cont_box">
        <i class="fa-solid fa-location-arrow"></i>
        <p>Warne Park Street Pine, FL 33157, New York</p>
    </div>
    <div class="pop_cont_box cont_box">
        <a href="mailto:gerolddesign@mail.com"><i class="fa-solid fa-at"></i></a>
        <a href="mailto:<?php echo get_field('footer_email_id', 'option'); ?>"><p><?php echo get_field('footer_email_id', 'option'); ?></p></a>
    </div>
    <div class="pop_cont_box cont_box">
        <a href="tel:+011236548096"><i class="fa-solid fa-phone"></i></a>
        <a href="tel:+011236548096"><p>+01 123 654 8096</p></a>
    </div>
    <div class="pop_cont_box my_social_icons">
        <p>Follow Us:</p>
        <ul class="ul-reset social-icons style-3 wow fadeInRight" data-wow-delay=".6s">
<li>
<a href="#"><i class="fa-brands fa-whatsapp"></i></a>
</li>
<li>
<a href="#"><i class="fa-brands fa-linkedin"></i></a>
</li>
<li>
<a href="#"><i class="fa-brands fa-facebook"></i></a>
</li>
<li>
<a href="#"><i class="fa-brands fa-instagram"></i></a>
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