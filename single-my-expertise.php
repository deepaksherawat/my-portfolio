<?php get_header(); ?>
<!-- Start Main Section -->
<main class="site-content" id="content">
<!-- START: Breadcrumb and Skill Marquee Section -->
<?php
get_template_part('template-parts/breadcrumb');
get_template_part('template-parts/marquee');
?>
<!-- END: Breadcrumb and Skill Marquee Section -->
 <!-- START: Expertise Section -->
<section class="full-width tj-post-details__area">
<div class="container">
<div class="row justify-content-center">
<div class="col-lg-8">
<div class="tj-post-details__container">
<article class="tj-single__post wow fadeInUp" data-wow-delay=".3s">
<?php 
if ( has_post_thumbnail() ) {
 ?>
<div class="tj-post__thumb single_expertise_image">
<?php $img = get_the_post_thumbnail_url(get_the_ID(), 'service-thumbnails-page');
echo '<img src="'.$img.'" alt="'.get_the_title().'">';
?>
</div>
<?php } ?>
<div class="tj-post__content">
<h3 class="tj-post__title entry-title"><span>My Expertise:</span> <?php the_title(); ?>
</h3>
<div class="tj-post__content">
<?php the_content(); ?>
</div>
</div>
</article>
<!-- post navigation -->
<?php
$prev_post = get_previous_post();
$next_post = get_next_post();
?>
<div class="single-post__navigation wow fadeInUp" data-wow-delay=".3s">
<!-- Previous Post -->
<?php if (!empty($prev_post)) : ?>
<div class="tj-navigation_post previous">
<div class="tj-navigation-post_inner prev_post">
<div class="bg-shape">
<img src="<?php echo get_template_directory_uri(); ?>/assets/images/bg-shape.png" alt="img">
</div>
<div class="navigation-post_img">
<a href="<?php echo get_permalink($prev_post->ID); ?>">
<?php
if (has_post_thumbnail($prev_post->ID)) {
echo get_the_post_thumbnail($prev_post->ID, 'thumbnail');
}
?>
</a>
</div>
<div class="tj-content">
<div class="post_pagination_nav">
<i class="fa-solid fa-arrow-left"></i> Previous
</div>
<div class="post_pagination_title">
<h5 class="title">
<a href="<?php echo get_permalink($prev_post->ID); ?>">
<?php echo get_the_title($prev_post->ID); ?>
</a>
</h5>
</div>
</div>
</div>
</div>
<?php endif; ?>
<!-- Next Post -->
<?php if (!empty($next_post)) : ?>
<div class="tj-navigation_post next">
<div class="tj-navigation-post_inner next_post">
<div class="bg-shape">
<img src="<?php echo get_template_directory_uri(); ?>/assets/images/bg-shape.png" alt="img">
</div>
<div class="tj-content">
<div class="post_pagination_nav">
Next <i class="fa-solid fa-arrow-right"></i>
</div>
<div class="post_pagination_title">
<h5 class="title">
<a href="<?php echo get_permalink($next_post->ID); ?>">
<?php echo get_the_title($next_post->ID); ?>
</a>
</h5>
</div>
</div>
<div class="navigation-post_img">
<a href="<?php echo get_permalink($next_post->ID); ?>">
<?php
if (has_post_thumbnail($next_post->ID)) {
echo get_the_post_thumbnail($next_post->ID, 'thumbnail');
}
?>
</a>
</div>
</div>
</div>
<?php endif; ?>
</div>
</div>
<?php get_template_part('template-parts/single-faq'); ?>
</div>
<div class="col-lg-4">
<div class="tj_main_sidebar">
<div class="sidebar_widget widget_search wow fadeInUp" data-wow-delay=".3s">
<div class="bg-shape">
<img src="<?php echo get_template_directory_uri(); ?>/assets/images/bg-shape.png" alt="img">
</div>
<!-- search Form -->
<?php get_template_part('template-parts/search-form');  ?>
<!-- end search Form -->
</div>
<div class="sidebar_widget services_list wow fadeInUp" data-wow-delay=".3s">
<div class="bg-shape">
<img src="<?php echo get_template_directory_uri(); ?>/assets/images/bg-shape.png" alt="img">
</div>
<div class="widget_title">
<h3 class="title">My Other Expertise</h3>
</div>
<?php
$current_id = get_the_ID();
$args = array(
'post_type'      => 'my-expertise',
'posts_per_page' => -1,
'post__not_in'   => array($current_id), // current post exclude
);
$expertise_query = new WP_Query($args);
if ($expertise_query->have_posts()) : ?>
<ul>
<?php while ($expertise_query->have_posts()) : $expertise_query->the_post(); ?>
<li><a href="<?php the_permalink(); ?>"><button fdprocessedid="3a30ld"><?php the_title(); ?></button></a></li>
<?php endwhile; ?>
</ul>
<?php endif; wp_reset_postdata(); ?>
</div>

<!-- get in touch sidebar -->
<div class="sidebar_widget contact_form wow fadeInUp" data-wow-delay=".3s">
<div class="bg-shape">
<img src="<?php echo get_template_directory_uri(); ?>/assets/images/bg-shape.png" alt="img">
</div>
<div class="sidebar_getintouch">
<div class="getintouch_logo">
<a href="<?php echo site_url(); ?>">
<?php 
$logo = get_field('main_logo', 'option');
if( !empty( $logo ) ): ?>
    <img src="<?php echo esc_url($logo['url']); ?>" alt="<?php echo esc_attr($logo['alt']); ?>" />
<?php endif; ?>
<p class="logo_tagline"><?php echo get_field('main_logo_tagline', 'option'); ?></p>
</a>
</div>
<div class="getintouch_text">
<p>Don't Hesitate to Contact Me</p>
<?php $about_phone  =  get_field('about_phone_number', 'option') ?: '9999999999'; ?>
<a class="call_me" href="tel:+<?php echo esc_html( $about_phone ); ?>"><i class="fa-solid fa-phone"></i> +<?php echo esc_html( $about_phone ); ?></a>
<div class="hire-btn"><a href="#contact-wrapper" class="tj-primary-btn modal-popup">Get Free Quote Now<i class="fa-solid fa-arrow-right"></i></a></div>
</div>
</div>
</div>
<!-- end get in touch sidebar -->
</div>
</div>
</div>
</div>
</section>
<!-- END: Expertise Section -->
</main>
<!-- End Main Section -->

<?php get_footer(); ?>