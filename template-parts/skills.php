<!-- start: Skills Area -->
<?php
$skills_sub_heading      = get_field('skill_sub_heading', 'option') ?: 'My Skills';
$skills_main_heading      = get_field('skills_main_heading', 'option') ?: 'Mastering SEO Skills';
$skills_button_1_text      = get_field('skills_button_1_text', 'option') ?: 'Download CV';
$skills_button_1_link      = get_field('skills_button_1_link', 'option') ?: 'http://localhost/deepak/';
$skills_button_2_text      = get_field('skills_button_2_text', 'option') ?: 'Get in Touch';
$skills_button_2_link      = get_field('skills_button_2_link', 'option') ?: 'http://localhost/deepak/';
?>
<section class="tj-progress-7-area">
<div class="bg-shape">
<img src="<?php echo get_template_directory_uri(); ?>/assets/images/bg-shape.png" alt="img">
</div>
<div class="container-fluid">
<div class="row">
<div class="col-12">
<div class="section-header style-5">
<div class="sec-text">
<span class="subtitle wow fadeInUp" data-wow-delay=".3s"><?php echo esc_html( $skills_sub_heading ); ?></span>
<!-- <h2 class="title tj-text-invert">Mastering SEO Skills</h2> -->
<h2 class="section-title wow fadeInUp" data-wow-delay=".3s"><?php echo esc_html( $skills_main_heading ); ?></h2>
</div>
</div>
</div>
</div>
<div class="row">
<div class="col-12">
<div class="my-skills">
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
<a href="<?php the_permalink(); ?>"><div class="skill_title wow fadeInUp" data-wow-delay=".3s"><?php the_title(); ?></div></a>
<?php endwhile; wp_reset_postdata(); endif; ?>
</div>
<div class="skills-button">
<a href="<?php echo esc_html( $skills_button_1_link ); ?>" class="btn tj-btn-primary wow fadeInUp" data-wow-delay=".3s"><?php echo esc_html( $skills_button_1_text ); ?> <i class="fa-solid fa-arrow-right"></i></a>
<a href="#contact-wrapper" class="btn tj-btn-secondary modal-popup wow fadeInUp" data-wow-delay=".3s"><?php echo esc_html( $skills_button_2_text ); ?> <i class="fa-solid fa-arrow-right"></i></a>
</div>
</div>
</div>

</div>
</section>
<!-- end: Sills Area -->
<!-- start: Footer Contact Popup -->
<?php get_template_part('template-parts/popup-contact-form'); ?>
<!-- end: Footer Contact Popup -->