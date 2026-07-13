<!-- start: Testimonial Area -->
<?php
$Client_sub_heading      = get_field('testimonial_sub_heading', 'option') ?: 'Clients feedback';
$Client_main_heading      = get_field('testimonial_main_heading', 'option') ?: 'Let’s Hear From Dear Clients.';
$Client_content      = get_field('testimonial_content', 'option') ?: 'I break down complex user the experience problems the create integrity focused to solutions that’s connect. I break down complex user the experience problems the create integrity focused to solutions that’s connect.';
?>
<section class="testimonial-section style-4">
<div class="container">
<div class="row">
<div class="col-12">
<div class="section-header style-5">
<div class="sec-text">
<div class="test-_content">
<span class="subtitle wow fadeInUp" data-wow-delay=".3s"><?php echo esc_html( $Client_sub_heading ); ?></span>
<h2 class="section-title wow fadeInUp" data-wow-delay=".3s"><?php echo esc_html( $Client_main_heading ); ?></h2>
<p class="testimonial-para wow fadeInUp"><?php echo esc_html( $Client_content ); ?></p>
</div>
<!-- <div class="tj-about-9-button">
<a href="#" class="btn tj-btn-primary">Write Review <i class="fa-solid fa-arrow-right"></i></a>
</div> -->
</div>
</div>
</div>
</div>
<div class="row">
<div class="col-12">
<div class="swiper tj-testimonial-slider">
<div class="swiper-wrapper">
<?php
$args = array(
'post_type'      => 'testimonials',
'posts_per_page' => -1,
'order' => 'ASC'
);
$query = new WP_Query($args);
if ($query->have_posts()) :
while ($query->have_posts()) : $query->the_post();
?>
<div class="swiper-slide">
<div class="testimonial-item style-4 wow fadeInUp" data-wow-delay=".3s">
<div class="bg-shape">
<img src="<?php echo get_template_directory_uri(); ?>/assets/images/bg-shape.png" alt="img">
</div>
<div class="top-infos">
<div class="testimonial-title">
<?php if(get_field('review_title')): ?><h4 class="title"><?php the_field('review_title'); ?></h4><?php endif; ?>
</div>

</div>
<?php if(get_field('review_content')): ?>
<div class="desc">
<?php the_field('review_content'); ?>
</div>
<?php endif; ?>
<div class="testimonial-auother">
<div class="auother-image">
<?php 
if ( has_post_thumbnail() ) {
$img = get_the_post_thumbnail_url(get_the_ID(), 'full');
echo '<img src="'.$img.'" alt="'.get_the_title().'">';
}
?>
</div>
<div class="auother-text">
<h6 class="title"><?php the_title(); ?></h6>
<?php if(get_field('author_designation')): ?><span class="subtitle"><?php the_field('author_designation'); ?></span><?php endif; ?>
<div class="testimonial-rating">
<?php 
$rating = get_field('rating'); // ACF range value (0 - 5)
// safety check
$rating = floatval($rating);
// convert to percentage
$width = $rating * 20;
?>
<div class="star-ratings">
<div class="fill-ratings" style="width: <?php echo $width; ?>%">
<span>★★★★★</span>
</div>
<div class="empty-ratings">
<span>★★★★★</span>
</div>
</div>
</div>
</div>

</div>
</div>
</div>
<?php endwhile; wp_reset_postdata(); endif; ?>             
</div>
<div class="testimonial-pagination"></div>
</div>
</div>
</div>
</div>
</section>
<!-- end: Testimonial Area -->