<!-- START: Breadcrumb Area -->
<section class="breadcrumb_area" data-bg-image="<?php echo get_template_directory_uri(); ?>/assets/images/breadcrumb-bg.jpg"data-bg-color="#140C1C">
<div class="container">
<div class="row">
<div class="col">
<div class="breadcrumb_content d-flex flex-column align-items-center">
<h2 class="title wow fadeInUp" data-wow-delay=".3s">
<?php
if (is_post_type_archive('project')) {
echo 'Projects';
}
elseif (is_tax('project-type')) {
$term = get_queried_object();
echo $term->name;
}
elseif (is_singular('project')) {
echo ' <span class="project_text">Project: ' . get_the_title() . '</span>';
}
elseif (is_page()) {
echo get_the_title();
}
?>
</h2>
<div class="breadcrumb_navigation wow fadeInUp" data-wow-delay=".5s">
<span><a href="<?php echo home_url(); ?>">Home</a></span>
<!-- <i class="fa-solid fa-arrow-right"></i> -->
<?php
    if (is_post_type_archive('project')) {
        echo '<i class="fa-solid fa-arrow-right"></i> Projects';
    }

    elseif (is_tax('project-type')) {
        $term = get_queried_object();
        echo ' <i class="fa-solid fa-arrow-right"></i> <span><a href="' . get_post_type_archive_link('project') . '">Projects</a></span>';
        echo ' <i class="fa-solid fa-arrow-right"></i> ' . $term->name;
    }

    elseif (is_singular('project')) {
        $terms = get_the_terms(get_the_ID(), 'project-type');

        echo ' <i class="fa-solid fa-arrow-right"></i> <span><a href="' . get_post_type_archive_link('project') . '">Projects</a></span>';

        if ($terms && !is_wp_error($terms)) {
            $term = $terms[0]; // first term
            echo '<i class="fa-solid fa-arrow-right"></i> <span><a href="' . get_term_link($term) . '">' . $term->name . '</a></span>';
        }

        echo ' / ' . get_the_title();
    }

    elseif (is_page()) {
        echo ' / ' . get_the_title();
    }
    ?>
</div>
</div>
</div>
</div>
</div>
</section>
<!-- END: Breadcrumb Area -->