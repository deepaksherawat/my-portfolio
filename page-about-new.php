<?php
/*
Template Name: About Me - Freelancer
Description: Redesigned About page for a freelance WordPress & Shopify developer.
             Duplicate of the "About" template concept, built to sit alongside
             page-about.php without touching it.
*/
get_header();
?>
<!-- Start Main Section -->
<main class="site-content" id="content">

<?php
get_template_part('template-parts/breadcrumb');
get_template_part('template-parts/marquee');
?>


<style>
.about-intro-freelancer.tj-about-section {background: linear-gradient(to right, var(--dark-blue-2) 0%, var(--dark-blue-3) 51%, var(--dark-blue-1) 100%); position: relative; z-index: 9; padding: 70px 0px;}
.about-intro-freelancer.tj-about-section .section-header.style-3 span.subtitle.wow.fadeInRight{background: linear-gradient(90deg, var(--golden-yellow-1), var(--golden-yellow-2), var(--golden-yellow-3)); color: var(--full-black); font-weight: 600;}
.about-intro-freelancer.tj-about-section .section-header .section-title{color: var(--white-1);}
.about-intro-freelancer.tj-about-section .desc p{color: var(--white-1);}
.about-intro-freelancer.tj-about-section .bg-shape {position: absolute; left: 0; right: 0; top: 0; bottom: 0; z-index: -1;}
.about-intro-freelancer.tj-about-section .bg-shape img {width: 100%; height: 100%;}
.about-intro-freelancer .personal-info-list{list-style:none;margin:24px 0 0;padding:0;display:grid;grid-template-columns:1fr 1fr;gap:14px 24px;}
.about-intro-freelancer .personal-info-list li{display:flex;flex-direction:column;gap:2px;font-family:var(--tj-ff-body);}
.about-intro-freelancer .personal-info-list li span.label{font-size:13px;text-transform:uppercase;letter-spacing:.05em;color:var(--tj-theme-primary);font-weight:var(--tj-fw-medium);}
.about-intro-freelancer .personal-info-list li span.value{font-size:16px;color:var(--tj-white);font-weight:var(--tj-fw-medium);}
.about-intro-freelancer .spec-tags{list-style:none;display:flex;flex-wrap:wrap;gap:10px;margin:24px 0 0;padding:0;}
.about-intro-freelancer .spec-tags li{padding:8px 18px;border:1px solid var(--tj-border1);border-radius:30px;font-size:14px;color:var(--tj-white);}
.about-intro-freelancer .spec-tags li i{color:var(--tj-theme-primary);margin-right:6px;}
.simple-funfact-area{padding:40px 0;border-top:1px solid var(--tj-border1);border-bottom:1px solid var(--tj-border1);}
.simple-funfact-area .funfact-item{text-align:center;}
.simple-funfact-area .funfact-item .number{font-family:var(--tj-ff-heading);font-size:42px;font-weight:var(--tj-fw-bold);color:var(--tj-theme-primary);}
.simple-funfact-area .funfact-item .text{font-size:15px;color:var(--tj-grey-1);margin-top:4px;}
</style>
<section class="about-intro-freelancer tj-about-section">
<div class="bg-shape">
<img src="<?php echo get_template_directory_uri(); ?>/assets/images/bg-shape.png" alt="img">
</div>
<!-- start: About Intro (Freelancer) -->
<div class="container">
<div class="row align-items-center">

<?php
// Pull everything from the "About Page - Personal Info" ACF field group
// (Theme Settings options page). Falls back to sensible defaults if a
// field hasn't been filled in yet, so the page never looks broken.
$sub_heading      = get_field('about_sub_heading', 'option') ?: 'Get To Know Me';
$main_heading      = get_field('about_main_heading', 'option') ?: 'A Freelance WordPress Shopify Developer Who Ships Working Stores Sites.';
$full_name      = get_field('about_full_name', 'option') ?: 'Deepak Sherawat';
$email          = get_field('about_email', 'option') ?: 'hello@deepaksherawat.com';
$experience     = get_field('about_experience_years', 'option') ?: '4+ Years';
$availability   = get_field('about_availability', 'option') ?: 'Open For Freelance Projects';
$location       = get_field('about_location', 'option') ?: 'India (Remote — Worldwide)';
$response_time  = get_field('about_response_time', 'option') ?: 'Within 24 Hours';
$bio_1          = get_field('about_bio_paragraph_1', 'option') ?: "I'm Deepak Sherawat, an independent WordPress and Shopify developer helping founders, agencies, and small businesses launch fast, reliable, and easy-to-manage websites and online stores.";
$bio_2          = get_field('about_bio_paragraph_2', 'option') ?: "Every project starts with your business goals, not just the design — clean code, SEO-friendly markup, and a backend that's simple for you to update yourself once I hand it over.";
$profile_image  = get_field('about_profile_image', 'option') ?: get_template_directory_uri() . '/assets/images/ab-8-images.png';
$cv_file        = get_field('about_cv_file', 'option');

// Specialization tags: pulled from the repeater if filled in, otherwise
// falls back to this default WordPress/Shopify set.
$default_specs = array(
    array('icon_class' => 'fa-brands fa-wordpress', 'label' => 'WordPress Development'),
    array('icon_class' => 'fa-brands fa-shopify', 'label' => 'Shopify Development'),
    array('icon_class' => 'fa-solid fa-cart-shopping', 'label' => 'WooCommerce'),
    array('icon_class' => 'fa-solid fa-code', 'label' => 'Custom Theme Dev'),
    array('icon_class' => 'fa-solid fa-puzzle-piece', 'label' => 'Elementor / ACF Pro'),
    array('icon_class' => 'fa-solid fa-gauge-high', 'label' => 'Speed & SEO Optimization'),
);
$specializations = have_rows('about_specializations', 'option') ? true : false;
?>

<div class="col-lg-5">
<div class="about-8-images wow fadeInLeft" data-wow-delay=".3s">
<img src="<?php echo esc_url( $profile_image ); ?>" alt="<?php echo esc_attr( $full_name ); ?> - WordPress & Shopify Developer">
<div class="about_shapes">
<img src="<?php echo get_template_directory_uri(); ?>/assets/images/ab-8-shapes.png" alt="shape">
</div>
</div>
</div>

<div class="col-lg-7">
<div class="about-8-content">
<div class="section-header style-3">
<span class="subtitle wow fadeInRight" data-wow-delay=".3s"><?php echo esc_html( $sub_heading ); ?></span>
<h2 class="section-title wow fadeInUp" data-wow-delay=".3s"><?php echo esc_html( $main_heading ); ?></h2>
</div>
<div class="desc">
<p class="wow fadeInUp" data-wow-delay=".4s"><?php echo esc_html( $bio_1 ); ?></p>
<p class="wow fadeInUp" data-wow-delay=".5s"><?php echo esc_html( $bio_2 ); ?></p>
</div>

<ul class="personal-info-list wow fadeInUp" data-wow-delay=".6s">
<li><span class="label">Name</span><span class="value"><?php echo esc_html( $full_name ); ?></span></li>
<li><span class="label">Email</span><span class="value"><?php echo esc_html( $email ); ?></span></li>
<li><span class="label">Experience</span><span class="value"><?php echo esc_html( $experience ); ?></span></li>
<li><span class="label">Availability</span><span class="value"><?php echo esc_html( $availability ); ?></span></li>
<li><span class="label">Based In</span><span class="value"><?php echo esc_html( $location ); ?></span></li>
<li><span class="label">Response Time</span><span class="value"><?php echo esc_html( $response_time ); ?></span></li>
</ul>

<ul class="spec-tags wow fadeInUp" data-wow-delay=".7s">
<?php if ( $specializations ) : ?>
<?php while ( have_rows('about_specializations', 'option') ) : the_row();
    $icon = get_sub_field('icon_class');
    $label = get_sub_field('label');
    ?>
<li><i class="<?php echo esc_attr( $icon ); ?>"></i><?php echo esc_html( $label ); ?></li>
<?php endwhile; ?>
<?php else : ?>
<?php foreach ( $default_specs as $spec ) : ?>
<li><i class="<?php echo esc_attr( $spec['icon_class'] ); ?>"></i><?php echo esc_html( $spec['label'] ); ?></li>
<?php endforeach; ?>
<?php endif; ?>
</ul>

<div class="about-button wow fadeInUp" data-wow-delay=".8s">
<a href="<?php echo esc_url( $cv_file ? $cv_file : '#' ); ?>" class="btn tj-btn-primary" target="_blank" rel="noopener">Download CV <i class="fa-solid fa-download"></i></a>
<a href="#contact-wrapper" class="btn tj-btn-secondary modal-popup">Hire Me <i class="fa-solid fa-arrow-right"></i></a>
</div>

</div>
</div>

</div>
</div>
<!-- end: About Intro (Freelancer) -->
<!-- start: Quick Stats -->
<div class="container">
<div class="row">
<div class="col-6 col-lg-3">
<div class="funfact-item wow fadeInUp" data-wow-delay=".2s">
<div class="number">4+</div>
<div class="text">Years Freelancing</div>
</div>
</div>
<div class="col-6 col-lg-3">
<div class="funfact-item wow fadeInUp" data-wow-delay=".3s">
<div class="number">80+</div>
<div class="text">Projects Delivered</div>
</div>
</div>
<div class="col-6 col-lg-3">
<div class="funfact-item wow fadeInUp" data-wow-delay=".4s">
<div class="number">50+</div>
<div class="text">Happy Clients</div>
</div>
</div>
<div class="col-6 col-lg-3">
<div class="funfact-item wow fadeInUp" data-wow-delay=".5s">
<div class="number">100%</div>
<div class="text">WordPress &amp; Shopify Focus</div>
</div>
</div>
</div>
</div>
<!-- end: Quick Stats -->
</section>


<?php
// Experience & Education tabs (existing "resume" CPT)
get_template_part('template-parts/resume');

// Skill list + CTA (existing "skills" CPT)
get_template_part('template-parts/skills');

// "My services" slider - pulls from the "my-expertise" CPT.
// Add/edit entries there for things like "WordPress Development",
// "Shopify Store Setup", "Speed Optimization", "Theme Customization", etc.
get_template_part('template-parts/service');

// Client testimonials (existing "testimonials" CPT)
get_template_part('template-parts/testimonials');

// FAQs - add rows to the "faq_content" repeater on THIS page in wp-admin
get_template_part('template-parts/faqs');
?>

</main>
<!-- End Main Section -->
<?php get_footer(); ?>
