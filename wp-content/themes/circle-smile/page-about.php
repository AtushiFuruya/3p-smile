<?php
/* Template Name: About */

get_header();
?>
<!-- page-about template -->
<main class="pt-20 px-6">
    <?php
    while ( have_posts() ) {
        the_post();
        the_content();
    }
    ?>
</main>
<?php
get_footer();
