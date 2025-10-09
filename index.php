<?php
/**
 * The main template file
 * 
 * @package NOLAHoli
 */

get_header();
?>

<main id="primary" class="site-main">
    <div class="container">
        <div class="content-section">
            <?php if (have_posts()) : ?>
                
                <div class="blog-posts">
                    <?php while (have_posts()) : the_post(); ?>
                        
                        <article id="post-<?php the_ID(); ?>" <?php post_class('blog-post'); ?>>
                            <?php if (has_post_thumbnail()) : ?>
                                <div class="post-thumbnail">
                                    <a href="<?php the_permalink(); ?>">
                                        <?php the_post_thumbnail('large'); ?>
                                    </a>
                                </div>
                            <?php endif; ?>
                            
                            <header class="entry-header">
                                <h2 class="entry-title">
                                    <a href="<?php the_permalink(); ?>">
                                        <?php the_title(); ?>
                                    </a>
                                </h2>
                                <div class="entry-meta">
                                    <?php nolaholi_posted_on(); ?>
                                </div>
                            </header>
                            
                            <div class="entry-content">
                                <?php the_excerpt(); ?>
                            </div>
                            
                            <footer class="entry-footer">
                                <a href="<?php the_permalink(); ?>" class="btn btn-primary">Read More</a>
                            </footer>
                        </article>
                        
                    <?php endwhile; ?>
                    
                    <div class="pagination">
                        <?php
                        the_posts_pagination(array(
                            'mid_size'  => 2,
                            'prev_text' => __('&laquo; Previous', 'nolaholi'),
                            'next_text' => __('Next &raquo;', 'nolaholi'),
                        ));
                        ?>
                    </div>
                    
                <?php else : ?>
                    
                    <div class="no-posts">
                        <h1><?php _e('Nothing Found', 'nolaholi'); ?></h1>
                        <p><?php _e('It seems we can\'t find what you\'re looking for.', 'nolaholi'); ?></p>
                    </div>
                    
                <?php endif; ?>
            </div>
        </div>
    </div>
</main>

<?php
get_footer();
?>

