<?php
/* Template Name: FAQ */

get_header();
?>
<main class="pt-20 px-4 md:px-6">
    <div class="container mx-auto max-w-6xl">
        <?php
        while ( have_posts() ) {
            the_post();
            the_content();
        }
        ?>
    </div>
</main>
<?php
get_footer();
