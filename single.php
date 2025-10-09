<?php
/**
 * The template for displaying single posts
 * 
 * @package NOLAHoli
 */

get_header();
?>

<main id="primary" class="site-main">
    <?php
    while (have_posts()) :
        the_post();
    ?>
        
        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            
            <!-- Featured Image Header -->
            <?php if (has_post_thumbnail()) : ?>
                <div class="post-header" style="background-image: url('<?php echo esc_url(get_the_post_thumbnail_url(get_the_ID(), 'full')); ?>'); background-size: cover; background-position: center; min-height: 400px; display: flex; align-items: center; justify-content: center; position: relative;">
                    <div style="position: absolute; top: 0; left: 0; right: 0; bottom: 0; background: rgba(0,0,0,0.5);"></div>
                    <div class="container" style="position: relative; z-index: 2;">
                        <header class="entry-header" style="text-align: center;">
                            <h1 class="entry-title" style="color: white; font-size: 3rem; margin-bottom: 15px;">
                                <?php the_title(); ?>
                            </h1>
                            <div class="entry-meta" style="color: white; font-size: 1.1rem;">
                                <?php nolaholi_posted_on(); ?>
                            </div>
                        </header>
                    </div>
                </div>
            <?php else : ?>
                <div class="page-header bg-light" style="padding: 60px 0;">
                    <div class="container">
                        <header class="entry-header text-center">
                            <h1 class="entry-title section-title"><?php the_title(); ?></h1>
                            <div class="entry-meta" style="color: var(--text-light); margin-top: 15px;">
                                <?php nolaholi_posted_on(); ?>
                            </div>
                        </header>
                    </div>
                </div>
            <?php endif; ?>
            
            <!-- Post Content -->
            <div class="entry-content content-section">
                <div class="container">
                    <div style="max-width: 800px; margin: 0 auto;">
                        <?php
                        the_content();
                        
                        wp_link_pages(array(
                            'before' => '<div class="page-links">' . esc_html__('Pages:', 'nolaholi'),
                            'after'  => '</div>',
                        ));
                        ?>
                    </div>
                </div>
            </div>
            
            <!-- Post Footer -->
            <footer class="entry-footer content-section bg-light">
                <div class="container">
                    <div style="max-width: 800px; margin: 0 auto;">
                        <?php
                        // Categories
                        $categories_list = get_the_category_list(', ');
                        if ($categories_list) {
                            printf('<div style="margin-bottom: 15px;"><strong style="color: var(--mardi-gras-purple);">Categories:</strong> %s</div>', $categories_list);
                        }
                        
                        // Tags
                        $tags_list = get_the_tag_list('', ', ');
                        if ($tags_list) {
                            printf('<div><strong style="color: var(--mardi-gras-green);">Tags:</strong> %s</div>', $tags_list);
                        }
                        ?>
                    </div>
                </div>
            </footer>
            
        </article>
        
        <!-- Post Navigation -->
        <nav class="post-navigation content-section bg-white">
            <div class="container">
                <div style="max-width: 800px; margin: 0 auto; display: flex; justify-content: space-between; gap: 20px;">
                    <?php
                    $prev_post = get_previous_post();
                    $next_post = get_next_post();
                    
                    if ($prev_post) : ?>
                        <div style="flex: 1;">
                            <a href="<?php echo get_permalink($prev_post); ?>" class="btn btn-outline" style="display: block;">
                                ← Previous Post
                            </a>
                        </div>
                    <?php else : ?>
                        <div style="flex: 1;"></div>
                    <?php endif;
                    
                    if ($next_post) : ?>
                        <div style="flex: 1; text-align: right;">
                            <a href="<?php echo get_permalink($next_post); ?>" class="btn btn-outline" style="display: block;">
                                Next Post →
                            </a>
                        </div>
                    <?php else : ?>
                        <div style="flex: 1;"></div>
                    <?php endif; ?>
                </div>
            </div>
        </nav>
        
        <!-- Comments -->
        <?php
        if (comments_open() || get_comments_number()) :
        ?>
            <div class="comments-area content-section bg-light">
                <div class="container">
                    <div style="max-width: 800px; margin: 0 auto;">
                        <?php comments_template(); ?>
                    </div>
                </div>
            </div>
        <?php endif; ?>
        
    <?php endwhile; ?>
</main>

<?php
get_footer();
?>

