<?php get_header(); ?>
<main class="site-content" id="content">
<!-- START: Breadcrumb and Skill Marquee Section -->
<?php
get_template_part('template-parts/breadcrumb');
get_template_part('template-parts/marquee');
?>
<!-- END: Breadcrumb and Skill Marquee Section -->
<!-- start: Service Area -->
<?php
$service_sub_heading      = get_field('service_sub_heading', 'option') ?: 'my services';
$service_main_heading      = get_field('service_main_heading', 'option') ?: 'Here is How I can Help!';
$service_content_text      = get_field('service_content_text', 'option') ?: 'I break down complex user the experience problems the create integrity focused to solutions that’s connect. I break down complex user the experience problems the create integrity focused to solutions thats connect.';
?>
<section class="tj-service-section style-8 service-page">
<div class="container">
<div class="row">
<div class="col-12">
<div class="section-header style-3 service_nav_desktop page_expertise">
<div class="sec-text">
<span class="subtitle wow fadeInUp" data-wow-delay=".3s"><?php echo esc_html( $service_sub_heading ); ?></span>
<h2 class="title wow fadeInUp" data-wow-delay=".3s"><?php echo esc_html( $service_main_heading ); ?></h2>
<p class="service_para wow fadeInUp" data-wow-delay=".3s"><?php echo esc_html( wp_strip_all_tags( $service_content_text ) ); ?></p>
</div>
</div>
</div>
</div>
<div class="row">
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
<div class="col-lg-4 col-md-6 col-12 wow fadeInUp" data-wow-delay=".3s">
<div class="tj-service-7-wrapper wow fadeInUp" data-wow-delay=".3s">
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

</div>
</section>
<!-- end: Service Area -->
</main>
<?php get_footer(); ?>