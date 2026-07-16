<!-- start: Footer Area -->
<?php
$facebook_link  =  get_field('facebook_link', 'option') ?: 'https://www.facebook.com/';
$linkedin_link  =  get_field('linkedin_link', 'option') ?: 'https://www.linkedin.com/';
$instagram_link  =  get_field('instagram_link', 'option') ?: 'https://www.instagram.com/';
$whatsapp_link  =  get_field('whatsapp_link', 'option') ?: 'https://web.whatsapp.com/';
$about_email  =  get_field('about_email', 'option') ?: 'info@mail.com';
$footer_main_heading = get_field('footer_main_heading', 'option') ?: 'Lets Have a Chat';
$head_right_button_link = get_field('head_right_button_link', 'option') ?: '#contact-wrapper';
$target_url = '#contact-wrapper';
?>
<div class="main-footer">
<div class="bg-shape">
<img src="http://deepakwebdeveloper.42web.io/wp-content/themes/deepaksherawat/assets/images/bg-shape.png" alt="img">
</div>
<!-- start: Text Area -->
<section class="text-section">
<div class="container">
<div class="row">
<div class="col-12">
<div class="section-header">
<div class="heading-left">

<p class="wow fadeInUp" data-wow-delay=".3s"><a class="link modal-popup" href="#contact-wrapper"><?php echo get_field('footer_sub_heading', 'option'); ?></a></p>

<a href="<?php echo ! empty( $head_right_button_link ) ? esc_url( $head_right_button_link ) : '#'; ?>" class="<?php if( $head_right_button_link === $target_url ) : ?>link modal-popup<?php endif; ?>"><h2 id="anim" class="section-title wow fadeInUp" data-wow-delay=".4s"><?php echo esc_html( $footer_main_heading ); ?></h2></a>

</div>
<div class="chat-mail wow fadeInRight" data-wow-delay=".5s">
<a class="link modal-popup" href="#contact-wrapper"><?php echo get_field('footer_email_id', 'option'); ?><i class="fa-solid fa-arrow-right"></i></a>
<!-- <a class="btn tj-btn-primary modal-popup" href="#service-wrapper">Learn More <i class="fa-solid fa-arrow-right"></i></a> -->
</div>
</div>
</div>
</div>
</div>
</section>
<!-- end: Text Area -->
<section class="tj-footer-6-area">
<div class="container">
<div class="row">
<div class="col">
<div class="tj-footer-6-wrapper">
<div class="tj-footer-6-left">
<p class="tj-footer-6-paragraph">AVAILABLE FOR FREELANCE</p>
</div>
<div class="tj-footer-6-middle">
<div class="footer-menu tj-footer-6-menu">
<nav>
<ul class="desktop_social_icon">
<li><a href="<?php echo esc_html( $whatsapp_link ); ?>" target="_blank"><i class="fa-brands fa-whatsapp"></i>WhatsApp.</a></li>
<li><a href="<?php echo esc_html( $linkedin_link ); ?>" target="_blank"><i class="fa-brands fa-linkedin-in"></i>Linkedin.</a></li>
<li><a href="<?php echo esc_html( $facebook_link ); ?>" target="_blank"><i class="fa-brands fa-facebook"></i>Facebook.</a></li>
<li><a href="<?php echo esc_html( $instagram_link ); ?>" target="_blank"><i class="fa-brands fa-instagram"></i>Instagram.</a></li>
</ul>
<ul class="mobile_social_icon">
<li><a href="portfolio.html"><i class="fa-brands fa-whatsapp"></i></a></li>
<li><a href="services.html"><i class="fa-brands fa-linkedin-in"></i></a></li>
<li><a href="about.html"><i class="fa-brands fa-facebook"></i></a></li>
<li><a href="contact.html"><i class="fa-brands fa-instagram"></i></a></li>
</ul>
</nav>
</div>
</div>
<div class="tj-footer-6-right">
<p class="tj-footer-6-copyright">© All rights reserved by <a href="index.html">Deepak Sherawat Web developer</a></p>
</div>
</div>
</div>
</div>
</div>
</section>
<!-- end: Footer Area -->

<!-- start: Footer Contact Popup -->
<?php get_template_part('template-parts/popup-contact-form'); ?>
<!-- end: Footer Contact Popup -->
</div>
<?php wp_footer(); ?>
</body>
</html>