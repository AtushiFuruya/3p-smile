<?php
/* Template Name: Blog */

get_header();
?>
<main class="pt-20 px-6">
    <div class="container mx-auto max-w-5xl space-y-12">
        <?php if ( have_posts() ) : the_post(); ?>
            <section class="text-center py-12">
                <h1 class="text-4xl md:text-5xl font-bold mb-4 gradient-text sexy-glow"><?php the_title(); ?></h1>
                <div class="text-pink-200 text-lg leading-relaxed max-w-3xl mx-auto">
                    <?php the_content(); ?>
                </div>
            </section>
        <?php endif; ?>

        <?php
        $paged = max( 1, get_query_var( 'paged' ), get_query_var( 'page' ) );
        $blog_query = new WP_Query([
            'post_type'      => 'post',
            'post_status'    => 'publish',
            'posts_per_page' => 10,
            'paged'          => $paged,
            'category_name'  => 'blog',
        ]);
        ?>

        <section class="space-y-6">
            <?php if ( $blog_query->have_posts() ) : ?>
                <?php while ( $blog_query->have_posts() ) : $blog_query->the_post(); ?>
                    <article class="glass-effect rounded-2xl p-6 md:p-8">
                        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
                            <div>
                                <h2 class="text-2xl font-semibold gradient-text">
                                    <a href="<?php the_permalink(); ?>" class="hover:text-pink-300 transition-colors duration-200"><?php the_title(); ?></a>
                                </h2>
                                <p class="text-sm text-pink-200 mt-2"><?php echo esc_html( get_the_date( 'Y.m.d' ) ); ?></p>
                            </div>
                            <div class="text-gray-200 leading-relaxed max-w-2xl">
                                <?php the_excerpt(); ?>
                            </div>
                        </div>
                    </article>
                <?php endwhile; ?>

                <div class="flex justify-center gap-4 pt-4 text-pink-200">
                    <?php
                    echo paginate_links([
                        'total'   => $blog_query->max_num_pages,
                        'current' => $paged,
                        'prev_text' => '&laquo;',
                        'next_text' => '&raquo;',
                    ]);
                    ?>
                </div>
            <?php else : ?>
                <div class="glass-effect rounded-2xl p-8 text-center text-pink-200">
                    投稿がまだありません。
                </div>
            <?php endif; ?>
        </section>
        <?php wp_reset_postdata(); ?>
    </div>
</main>
<?php
get_footer();
