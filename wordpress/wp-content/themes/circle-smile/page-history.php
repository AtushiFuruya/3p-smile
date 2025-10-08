<?php
/* Template Name: History */

get_header();
?>
<main class="pt-20 px-6">
    <div class="container mx-auto max-w-4xl">
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
