<?php 
/*
Template Name: About
*/
get_header();
?>
<!-- Start Main Section -->
<main class="site-content" id="content">
<!-- START: Breadcrumb and Skill Marquee Section -->
<?php
get_template_part('template-parts/breadcrumb');
get_template_part('template-parts/marquee');
?>
<!-- END: Breadcrumb and Skill Marquee Section -->
<?php
get_template_part('template-parts/resume');
get_template_part('template-parts/skills');
get_template_part('template-parts/faqs');
?>
</main>
<!-- End Main Section -->
<?php get_footer(); ?>