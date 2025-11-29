<?php
/**
 * Template for displaying news archive
 * 
 * @package NOLAHoli
 */

get_header();
?>

<main id="primary" class="site-main">
    <!-- Hero Section -->
    <section class="hero-section" style="min-height: 400px; background: linear-gradient(135deg, var(--mardi-gras-purple) 0%, var(--mardi-gras-gold) 100%);">
        <div class="hero-overlay"></div>
        <div class="hero-content">
            <h1 class="hero-title">📰 NOLA Holi News</h1>
            <p class="hero-subtitle">Stay Updated with the Latest Announcements and Stories</p>
        </div>
    </section>
    
    <!-- News Archive -->
    <section class="content-section bg-white">
        <div class="container">
            <div style="max-width: 1200px; margin: 0 auto;">
                
                <?php if (have_posts()) : ?>
                    
                    <div class="news-grid" style="display: grid; grid-template-columns: repeat(auto-fill, minmax(350px, 1fr)); gap: 40px; margin-top: 30px;">
                        <?php while (have_posts()) : the_post(); 
                            // Get meta data
                            $pub_date = get_post_meta(get_the_ID(), '_news_publication_date', true);
                            $short_desc = get_post_meta(get_the_ID(), '_news_short_description', true);
                            
                            // Use publication date if set, otherwise use post date
                            $display_date = $pub_date ? $pub_date : get_the_date('Y-m-d');
                        ?>
                            
                            <article class="news-card" style="background: white; border-radius: 15px; overflow: hidden; box-shadow: var(--shadow-md); transition: transform 0.3s ease, box-shadow 0.3s ease;">
                                
                                <?php if (has_post_thumbnail()) : ?>
                                    <div class="news-card-image" style="position: relative; height: 250px; background-image: url('<?php echo esc_url(get_the_post_thumbnail_url(get_the_ID(), 'medium_large')); ?>'); background-size: cover; background-position: center;">
                                        <div style="position: absolute; top: 15px; left: 15px; background: rgba(255,255,255,0.95); padding: 8px 15px; border-radius: 20px; font-size: 0.85rem; font-weight: 600; color: var(--mardi-gras-purple);">
                                            <?php echo date('M j, Y', strtotime($display_date)); ?>
                                        </div>
                                    </div>
                                <?php else : ?>
                                    <div class="news-card-image" style="position: relative; height: 250px; background: linear-gradient(135deg, var(--mardi-gras-purple) 0%, var(--mardi-gras-gold) 100%); display: flex; align-items: center; justify-content: center;">
                                        <div style="font-size: 4rem;">📰</div>
                                        <div style="position: absolute; top: 15px; left: 15px; background: rgba(255,255,255,0.95); padding: 8px 15px; border-radius: 20px; font-size: 0.85rem; font-weight: 600; color: var(--mardi-gras-purple);">
                                            <?php echo date('M j, Y', strtotime($display_date)); ?>
                                        </div>
                                    </div>
                                <?php endif; ?>
                                
                                <div class="news-card-content" style="padding: 30px;">
                                    <h2 style="font-size: 1.5rem; margin-bottom: 15px; line-height: 1.4;">
                                        <a href="<?php the_permalink(); ?>" style="color: var(--text-dark); text-decoration: none; transition: color 0.3s ease;">
                                            <?php the_title(); ?>
                                        </a>
                                    </h2>
                                    
                                    <div class="news-card-excerpt" style="color: var(--text-light); line-height: 1.7; margin-bottom: 20px;">
                                        <?php if ($short_desc) : ?>
                                            <?php echo esc_html(wp_trim_words($short_desc, 20)); ?>
                                        <?php else : ?>
                                            <?php echo get_the_excerpt(); ?>
                                        <?php endif; ?>
                                    </div>
                                    
                                    <a href="<?php the_permalink(); ?>" class="btn btn-outline" style="display: inline-block;">
                                        Read More →
                                    </a>
                                </div>
                                
                            </article>
                            
                        <?php endwhile; ?>
                    </div>
                    
                    <!-- Pagination -->
                    <?php
                    $pagination = paginate_links(array(
                        'prev_text' => '← Previous',
                        'next_text' => 'Next →',
                        'type' => 'array'
                    ));
                    
                    if ($pagination) : ?>
                        <nav class="pagination" style="margin-top: 60px; text-align: center;">
                            <div style="display: flex; justify-content: center; gap: 10px; flex-wrap: wrap;">
                                <?php foreach ($pagination as $page) : ?>
                                    <?php echo $page; ?>
                                <?php endforeach; ?>
                            </div>
                        </nav>
                    <?php endif; ?>
                    
                <?php else : ?>
                    
                    <!-- No News Found -->
                    <div style="text-align: center; padding: 80px 20px;">
                        <div style="font-size: 4rem; margin-bottom: 25px;">📰</div>
                        <h2 style="color: var(--mardi-gras-purple); margin-bottom: 20px; font-size: 2rem;">
                            No News Yet
                        </h2>
                        <p style="color: var(--text-light); font-size: 1.1rem; max-width: 600px; margin: 0 auto 30px;">
                            We don't have any news to share at the moment, but check back soon for updates about NOLA Holi events, announcements, and community stories!
                        </p>
                        <a href="<?php echo home_url('/'); ?>" class="btn btn-primary">
                            Return to Home
                        </a>
                    </div>
                    
                <?php endif; ?>
                
            </div>
        </div>
    </section>
</main>

<style>
.news-card:hover {
    transform: translateY(-10px);
    box-shadow: var(--shadow-xl);
}

.news-card h2 a:hover {
    color: var(--mardi-gras-purple);
}

.pagination a,
.pagination span {
    display: inline-block;
    padding: 10px 18px;
    border: 2px solid var(--mardi-gras-purple);
    border-radius: 5px;
    color: var(--mardi-gras-purple);
    text-decoration: none;
    font-weight: 600;
    transition: all 0.3s ease;
}

.pagination a:hover {
    background: var(--mardi-gras-purple);
    color: white;
}

.pagination .current {
    background: var(--mardi-gras-purple);
    color: white;
}

@media (max-width: 768px) {
    .news-grid {
        grid-template-columns: 1fr !important;
        gap: 30px !important;
    }
    
    .pagination a,
    .pagination span {
        padding: 8px 15px;
        font-size: 0.9rem;
    }
}
</style>

<?php
get_footer();
?>

