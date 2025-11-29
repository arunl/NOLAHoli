<?php
/**
 * Template for displaying single news items
 * 
 * @package NOLAHoli
 */

get_header();
?>

<main id="primary" class="site-main">
    <?php
    while (have_posts()) :
        the_post();
        
        // Get meta data
        $pub_date = get_post_meta(get_the_ID(), '_news_publication_date', true);
        $short_desc = get_post_meta(get_the_ID(), '_news_short_description', true);
        $image_1 = get_post_meta(get_the_ID(), '_news_image_1', true);
        $image_2 = get_post_meta(get_the_ID(), '_news_image_2', true);
        $image_3 = get_post_meta(get_the_ID(), '_news_image_3', true);
        
        // Use publication date if set, otherwise use post date
        $display_date = $pub_date ? $pub_date : get_the_date('Y-m-d');
    ?>
        
        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            
            <!-- Featured Image Header -->
            <?php if (has_post_thumbnail()) : ?>
                <div class="post-header" style="background-image: url('<?php echo esc_url(get_the_post_thumbnail_url(get_the_ID(), 'full')); ?>'); background-size: cover; background-position: center; min-height: 400px; display: flex; align-items: center; justify-content: center; position: relative;">
                    <div style="position: absolute; top: 0; left: 0; right: 0; bottom: 0; background: rgba(0,0,0,0.5);"></div>
                    <div class="container" style="position: relative; z-index: 2;">
                        <header class="entry-header" style="text-align: center;">
                            <div style="color: white; font-size: 0.9rem; text-transform: uppercase; letter-spacing: 2px; margin-bottom: 15px;">
                                📰 News
                            </div>
                            <h1 class="entry-title" style="color: white; font-size: 3rem; margin-bottom: 15px;">
                                <?php the_title(); ?>
                            </h1>
                            <div class="entry-meta" style="color: white; font-size: 1.1rem;">
                                <time datetime="<?php echo esc_attr($display_date); ?>">
                                    <?php echo date('F j, Y', strtotime($display_date)); ?>
                                </time>
                            </div>
                        </header>
                    </div>
                </div>
            <?php else : ?>
                <div class="page-header bg-light" style="padding: 80px 0;">
                    <div class="container">
                        <header class="entry-header text-center">
                            <div style="color: var(--mardi-gras-purple); font-size: 0.9rem; text-transform: uppercase; letter-spacing: 2px; margin-bottom: 15px;">
                                📰 News
                            </div>
                            <h1 class="entry-title section-title"><?php the_title(); ?></h1>
                            <div class="entry-meta" style="color: var(--text-light); margin-top: 15px; font-size: 1.1rem;">
                                <time datetime="<?php echo esc_attr($display_date); ?>">
                                    <?php echo date('F j, Y', strtotime($display_date)); ?>
                                </time>
                            </div>
                        </header>
                    </div>
                </div>
            <?php endif; ?>
            
            <!-- Post Content -->
            <div class="entry-content content-section">
                <div class="container">
                    <div style="max-width: 900px; margin: 0 auto;">
                        
                        <?php if ($short_desc) : ?>
                            <div class="news-excerpt" style="font-size: 1.2rem; line-height: 1.8; color: var(--text-light); margin-bottom: 40px; padding: 25px; background: #f8f9fa; border-left: 4px solid var(--mardi-gras-purple); border-radius: 5px;">
                                <?php echo wp_kses_post(wpautop($short_desc)); ?>
                            </div>
                        <?php endif; ?>
                        
                        <?php
                        the_content();
                        
                        wp_link_pages(array(
                            'before' => '<div class="page-links">' . esc_html__('Pages:', 'nolaholi'),
                            'after'  => '</div>',
                        ));
                        ?>
                        
                        <?php 
                        // Display additional images
                        $additional_images = array();
                        if ($image_1) $additional_images[] = $image_1;
                        if ($image_2) $additional_images[] = $image_2;
                        if ($image_3) $additional_images[] = $image_3;
                        
                        if (!empty($additional_images)) : ?>
                            <div class="news-gallery" style="margin-top: 50px;">
                                <h3 style="color: var(--mardi-gras-purple); margin-bottom: 25px; text-align: center;">Photo Gallery</h3>
                                <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 20px;">
                                    <?php foreach ($additional_images as $image_id) : 
                                        $image_url = wp_get_attachment_image_url($image_id, 'large');
                                        $image_full = wp_get_attachment_image_url($image_id, 'full');
                                        $image_alt = get_post_meta($image_id, '_wp_attachment_image_alt', true);
                                    ?>
                                        <a href="<?php echo esc_url($image_full); ?>" class="news-gallery-item" target="_blank" style="display: block; border-radius: 10px; overflow: hidden; box-shadow: var(--shadow-sm); transition: transform 0.3s ease, box-shadow 0.3s ease;">
                                            <img src="<?php echo esc_url($image_url); ?>" alt="<?php echo esc_attr($image_alt); ?>" style="width: 100%; height: 250px; object-fit: cover; display: block;">
                                        </a>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        <?php endif; ?>
                        
                    </div>
                </div>
            </div>
            
            <!-- Back to News Link -->
            <div class="content-section bg-light">
                <div class="container">
                    <div style="max-width: 900px; margin: 0 auto; text-align: center;">
                        <a href="<?php echo home_url('/news/'); ?>" class="btn btn-outline">
                            ← Back to All News
                        </a>
                    </div>
                </div>
            </div>
            
        </article>
        
        <!-- Post Navigation -->
        <nav class="post-navigation content-section bg-white">
            <div class="container">
                <div style="max-width: 900px; margin: 0 auto; display: flex; justify-content: space-between; gap: 20px; flex-wrap: wrap;">
                    <?php
                    $prev_post = get_previous_post();
                    $next_post = get_next_post();
                    
                    if ($prev_post) : ?>
                        <div style="flex: 1; min-width: 200px;">
                            <a href="<?php echo get_permalink($prev_post); ?>" class="btn btn-outline" style="display: block; text-align: left;">
                                <small style="display: block; margin-bottom: 5px; opacity: 0.7;">← Previous</small>
                                <?php echo esc_html(wp_trim_words($prev_post->post_title, 6)); ?>
                            </a>
                        </div>
                    <?php else : ?>
                        <div style="flex: 1; min-width: 200px;"></div>
                    <?php endif;
                    
                    if ($next_post) : ?>
                        <div style="flex: 1; min-width: 200px; text-align: right;">
                            <a href="<?php echo get_permalink($next_post); ?>" class="btn btn-outline" style="display: block; text-align: right;">
                                <small style="display: block; margin-bottom: 5px; opacity: 0.7;">Next →</small>
                                <?php echo esc_html(wp_trim_words($next_post->post_title, 6)); ?>
                            </a>
                        </div>
                    <?php else : ?>
                        <div style="flex: 1; min-width: 200px;"></div>
                    <?php endif; ?>
                </div>
            </div>
        </nav>
        
    <?php endwhile; ?>
</main>

<style>
.news-gallery-item:hover {
    transform: translateY(-5px);
    box-shadow: var(--shadow-lg);
}

@media (max-width: 768px) {
    .post-header h1 {
        font-size: 2rem !important;
    }
    
    .news-gallery {
        grid-template-columns: 1fr !important;
    }
}
</style>

<?php
get_footer();
?>

