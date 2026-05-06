<?php 
/*
Template Name: Expertise
*/
get_header();
?>
<main class="site-content" id="content">
<!-- START: Breadcrumb and Skill Marquee Section -->
<?php
get_template_part('template-parts/breadcrumb');
get_template_part('template-parts/marquee');
?>
<!-- END: Breadcrumb and Skill Marquee Section -->
<!-- start: Service Area -->
<section class="tj-service-section style-8 service-page">
<div class="container">
<div class="row">
<div class="col-12">
<div class="section-header style-3 service_nav_desktop">
<div class="sec-text">
<span class="subtitle wow fadeInLeft" data-wow-delay=".3s">My services</span>
<h2 class="title">Here's How I can Help!</h2>
</div>
</div>
</div>
</div>
<div class="row">
<div class="col-12">
<div id="portfolioContainer">
<?php
$args = array(
'post_type' => 'my-expertise', // ya custom post type
'posts_per_page' => -1,
'order' => 'ASC', // ASC = upcoming, DESC = latest
);
$query = new WP_Query($args);
if($query->have_posts()) :
while($query->have_posts()) : $query->the_post();
?>
<div class="service_card service-page">
<div class="bg-shape">
<img src="<?php echo get_template_directory_uri(); ?>/assets/images/bg-shape.png" alt="img">
</div>
<div class="row">
<div class="col-lg-6 col-md-6 col-12 service_card_left">
<h3 class="tj-service-5-accordion-list-title">
<span><?php echo str_pad($query->current_post + 1, 2, '0', STR_PAD_LEFT); ?>.</span> <?php the_title(); ?>
</h3>
<?php if( get_field('expertise_short_content') ): the_field('expertise_short_content'); endif;
if( have_rows('expertise_features') ): ?>
<div class="tj-service-5-accordion-list-item">
<?php while( have_rows('expertise_features') ) : the_row();
$feature = get_sub_field('feature_list'); ?>
<span><?php echo $feature; ?></span>
<?php endwhile; ?>
</div>
<?php endif; ?>
<div class="tj-service-5-accordion-list-button">
<a class="btn tj-btn-primary" href="<?php echo the_permalink(); ?>">View My Expertise <i class="fa-solid fa-arrow-right"></i></a>
</div>
</div>
<div class="col-lg-6 col-md-6 col-12 service_card_right">
<div class="tj-service-5-accordion-list-image">
<div class="tj-service-5-accordion-thumb">
<?php 
if ( has_post_thumbnail() ) {
$img = get_the_post_thumbnail_url(get_the_ID(), 'service_thumbnail');
echo '<img class="service-image" src="'.$img.'" alt="'.get_the_title().'">';
}
?>
</div>
</div>
</div>
</div>
</div>
<?php endwhile; wp_reset_postdata(); endif; ?>
<!-- end service card -->
</div>
</div>
</div>

</div>
</section>
<!-- end: Service Area -->
</main>
<!-- End Main Section -->
<?php get_footer(); ?>