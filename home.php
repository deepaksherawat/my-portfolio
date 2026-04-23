<?php 
/*
Template Name: Homepage
*/
get_header();
?>
<!-- Start Main Section -->
<main class="site-content" id="content">
<?php
get_template_part('template-parts/hero');
get_template_part('template-parts/service');

?>
</main>
<!-- End Main Section -->
<?php get_footer(); ?>