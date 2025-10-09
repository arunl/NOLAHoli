<?php
/**
 * The template for displaying all pages
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
            
            <?php if (has_post_thumbnail()) : ?>
                <div class="page-header" style="background-image: url('<?php echo esc_url(get_the_post_thumbnail_url(get_the_ID(), 'full')); ?>'); background-size: cover; background-position: center; min-height: 300px; display: flex; align-items: center; justify-content: center; position: relative;">
                    <div style="position: absolute; top: 0; left: 0; right: 0; bottom: 0; background: rgba(0,0,0,0.5);"></div>
                    <div class="container" style="position: relative; z-index: 2;">
                        <h1 class="entry-title" style="color: white; text-align: center; font-size: 3rem;"><?php the_title(); ?></h1>
                    </div>
                </div>
            <?php else : ?>
                <div class="page-header bg-light" style="padding: 60px 0;">
                    <div class="container">
                        <h1 class="entry-title text-center section-title"><?php the_title(); ?></h1>
                    </div>
                </div>
            <?php endif; ?>
            
            <div class="entry-content content-section">
                <div class="container">
                    <?php
                    the_content();
                    
                    wp_link_pages(array(
                        'before' => '<div class="page-links">' . esc_html__('Pages:', 'nolaholi'),
                        'after'  => '</div>',
                    ));
                    ?>
                </div>
            </div>
            
        </article>
        
    <?php endwhile; ?>
</main>

<?php
get_footer();
?>

