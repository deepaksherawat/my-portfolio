<!-- start: Maquee Area -->
<style>
.maquee-slider-one .swiper-wrapper {
    transition-timing-function: linear !important;
}
.marquee-item {
    width: auto;
    display: flex;
    align-items: center;
}
</style>
<section class="tj-maquee-section maquee-style-bottom-8">
<div class="swiper maquee-slider-one">
<div class="swiper-wrapper maquee-wrapper">
<?php
$args = array(
'post_type'      => 'skills',
'posts_per_page' => -1,
'order' => 'ASC'
);
$query = new WP_Query($args);
if ($query->have_posts()) :
while ($query->have_posts()) : $query->the_post();
?>
<div class="swiper-slide marquee-item">
<div class="marquee-box">
<div class="marquee-icon">
<img src="<?php echo get_template_directory_uri(); ?>/assets/images/star.svg" alt="Icon" />
</div>
<div class="marquee-title">
<h5 class="title"><?php the_title(); ?></h5>
</div>
</div>
</div>
<?php endwhile; wp_reset_postdata(); endif; ?>                  
</div>
</div>
</section>
<!-- end: Maquee Area -->