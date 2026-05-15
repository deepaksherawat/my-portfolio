<!-- start: Service Area -->
<section class="tj-service-section style-8">
<div class="container">
<div class="row">
<div class="col-12">
<div class="section-header style-3 service_nav_desktop">
<div class="sec-text">
<span class="subtitle wow fadeInLeft" data-wow-delay=".3s">My services</span>
<h2 class="title">Here's How I can Help!</h2>
</div>
<div class="service-navigation wow fadeInRight" data-wow-delay=".4s">
<div class="service-prev"><i class="fa-solid fa-arrow-left"></i></div>
<div class="service-next"><i class="fa-solid fa-arrow-right"></i></div>
</div>
<div class="service-button wow fadeInRight" data-wow-delay=".5s">
<a class="btn tj-btn-primary" href="#">View All Expertise <i class="fa-solid fa-eye"></i></a>
</div>

</div>
</div>
</div>
<div class="row">
<div class="col-12">
<div class="swiper service-slider-8">
<div class="swiper-wrapper">
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
<div class="swiper-slide">
<div class="tj-service-7-wrapper wow fadeInUp" data-wow-delay=".3s" style="visibility: visible; animation-delay: 0.3s; animation-name: fadeInUp;">
<div class="bg-shape">
<img src="<?php echo get_template_directory_uri(); ?>/assets/images/bg-shape.png" alt="img">
</div>
<div class="tj-service-7-icon">
<span><img src="https://themejunction.net/html/gerold/demo/assets/img/icons/service-7-icon1.svg" alt=""></span>
</div>
<h4 class="tj-service-7-title">
<a class="" href="<?php echo the_permalink(); ?>"><span><?php echo str_pad($query->current_post + 1, 2, '0', STR_PAD_LEFT); ?>.</span><?php the_title(); ?></a>
</h4>
<div class="tj-service-7-paragraph">
<?php if( get_field('expertise_short_content') ): the_field('expertise_short_content'); endif; ?>
</div>
<div class="tj-service-7-button">
<a class="" href="<?php echo the_permalink(); ?>">
<span class="icon_box">
<i class="icon_first fa-regular fa-arrow-right"></i>
<i class="icon_second fa-regular fa-arrow-right"></i>
</span>
</a>
</div>
</div>
</div>
<?php endwhile; wp_reset_postdata(); endif; ?>                  
</div>
<div class="service-pagination"></div>
</div>
<div class="service_nav_mobile">
<div class="service-navigation wow fadeInRight" data-wow-delay=".4s">
<div class="service-prev"><i class="fa-solid fa-arrow-left"></i></div>
<div class="service-next"><i class="fa-solid fa-arrow-right"></i></div>
</div>
<div class="service-button wow fadeInRight" data-wow-delay=".5s">
<a class="btn tj-btn-primary" href="#">View All Expertise <i class="fa-solid fa-eye"></i></a>
</div>
</div>
<div class="getintouch_btn full_width">
<a class="btn tj-btn-primary modal-popup" href="#contact-wrapper">HAVE PROJECT IN MIND! LET'S DISCUSS <i class="fa-solid fa-arrow-right"></i></a>
</div>
</div>
</div>
</div>
</section>
<!-- end: Service Area -->