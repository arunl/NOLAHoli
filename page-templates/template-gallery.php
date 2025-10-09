<?php
/**
 * Template Name: Gallery
 * Template for the Photo/Video Gallery page
 * 
 * @package NOLAHoli
 */

get_header();
?>

<main id="primary" class="site-main">
    <!-- Hero Section -->
    <section class="hero-section" style="min-height: 400px; background: var(--gradient-festival);">
        <div class="hero-overlay"></div>
        <div class="hero-content">
            <h1 class="hero-title">Photo & Video Gallery</h1>
            <p class="hero-subtitle">Relive the Colors, Joy, and Magic</p>
        </div>
    </section>
    
    <!-- Intro Section -->
    <section class="content-section bg-white">
        <div class="container">
            <div style="max-width: 900px; margin: 0 auto; text-align: center;">
                <h2 class="section-title">Captured Moments</h2>
                <div class="section-divider"></div>
                
                <p style="font-size: 1.2rem; line-height: 2; color: var(--text-light); margin-bottom: 30px;">
                    Explore our collection of photos and videos from past NOLA Holi celebrations. Each image tells 
                    a story of joy, color, community, and the beautiful chaos that makes Holi unforgettable!
                </p>
            </div>
        </div>
    </section>
    
    <!-- Year Filter/Tabs -->
    <section class="content-section bg-light">
        <div class="container">
            <div style="text-align: center; margin-bottom: 40px;">
                <div style="display: inline-flex; gap: 15px; background: var(--white); padding: 10px; border-radius: 50px; box-shadow: var(--shadow-sm);">
                    <a href="#gallery-2025" class="gallery-year-tab active" data-year="2025" style="padding: 12px 30px; border-radius: 50px; background: var(--mardi-gras-purple); color: white; font-weight: 600; text-decoration: none;">2025</a>
                    <a href="#gallery-2024" class="gallery-year-tab" data-year="2024" style="padding: 12px 30px; border-radius: 50px; color: var(--text-dark); font-weight: 600; text-decoration: none;">2024</a>
                </div>
            </div>
            
            <!-- 2025 Gallery -->
            <div id="gallery-2025" class="gallery-year-section">
                <h2 class="section-title text-center">NOLA Holi 2025</h2>
                <div class="section-divider"></div>
                
                <div style="text-align: center; margin: 40px 0;">
                    <div style="background: var(--white); padding: 40px; border-radius: 15px; max-width: 700px; margin: 0 auto; box-shadow: var(--shadow-md);">
                        <div style="font-size: 3rem; margin-bottom: 20px;">📸</div>
                        <h3 style="color: var(--mardi-gras-purple); margin-bottom: 15px; font-size: 1.8rem;">
                            View Our 2025 Photo Album
                        </h3>
                        <p style="color: var(--text-light); line-height: 1.8; margin-bottom: 25px;">
                            Browse hundreds of photos from NOLA Holi 2025 in our Google Photos album. 
                            Feel free to download and share your favorites!
                        </p>
                        <a href="https://photos.app.goo.gl/A7k1H1NdwU7wUvjLA" target="_blank" rel="noopener noreferrer" class="btn btn-primary">
                            Open 2025 Gallery
                        </a>
                    </div>
                </div>
                
                <?php
                // Query gallery items for 2025
                $args_2025 = array(
                    'post_type' => 'gallery',
                    'posts_per_page' => 12,
                    'tax_query' => array(
                        array(
                            'taxonomy' => 'gallery_year',
                            'field'    => 'slug',
                            'terms'    => '2025',
                        ),
                    ),
                );
                
                $gallery_2025 = new WP_Query($args_2025);
                
                if ($gallery_2025->have_posts()) : ?>
                    <div class="photo-gallery">
                        <?php while ($gallery_2025->have_posts()) : $gallery_2025->the_post(); ?>
                            <div class="gallery-item">
                                <?php if (has_post_thumbnail()) : ?>
                                    <a href="<?php the_permalink(); ?>">
                                        <?php the_post_thumbnail('nolaholi-gallery'); ?>
                                    </a>
                                <?php endif; ?>
                                <div class="gallery-overlay">
                                    <p><?php the_title(); ?></p>
                                </div>
                            </div>
                        <?php endwhile; wp_reset_postdata(); ?>
                    </div>
                <?php else : ?>
                    <p style="text-align: center; color: var(--text-light); margin-top: 30px;">
                        Gallery items will be added here soon. Visit our Google Photos album above to see all photos!
                    </p>
                <?php endif; ?>
            </div>
            
            <!-- 2024 Gallery -->
            <div id="gallery-2024" class="gallery-year-section" style="display: none;">
                <h2 class="section-title text-center">NOLA Holi 2024</h2>
                <div class="section-divider"></div>
                <p style="text-align: center; color: var(--text-light); margin-bottom: 40px; font-size: 1.1rem;">
                    The inaugural NOLA Holi Festival – where it all began!
                </p>
                
                <div style="text-align: center; margin: 40px 0;">
                    <div style="background: var(--white); padding: 40px; border-radius: 15px; max-width: 700px; margin: 0 auto; box-shadow: var(--shadow-md);">
                        <div style="font-size: 3rem; margin-bottom: 20px;">📷</div>
                        <h3 style="color: var(--mardi-gras-green); margin-bottom: 15px; font-size: 1.8rem;">
                            View Our 2024 Photo Album
                        </h3>
                        <p style="color: var(--text-light); line-height: 1.8; margin-bottom: 25px;">
                            Relive the magic of our first-ever NOLA Holi celebration! Browse photos from 
                            the inaugural festival dedicated to Michelle Lakhotia's memory.
                        </p>
                        <a href="https://photos.google.com/share/AF1QipMXoU__flN42f4HOvc_3Ue8HkTyXWUEHWSLuJulorUazYVGVsRzijEKD6GjA48MGA/memory/AF1QipPlfUZfOStBcDVTINx3OhPsgfCN77FIL4qBkiLIfzo63FJca7L1jE2KRHHm492t_g?key=MHgwV0xhLU9tYzdhMmNfR2FNbTN0eDdCWE9nRkF3&pli=1" target="_blank" rel="noopener noreferrer" class="btn btn-secondary">
                            Open 2024 Gallery
                        </a>
                    </div>
                </div>
                
                <?php
                // Query gallery items for 2024
                $args_2024 = array(
                    'post_type' => 'gallery',
                    'posts_per_page' => 12,
                    'tax_query' => array(
                        array(
                            'taxonomy' => 'gallery_year',
                            'field'    => 'slug',
                            'terms'    => '2024',
                        ),
                    ),
                );
                
                $gallery_2024 = new WP_Query($args_2024);
                
                if ($gallery_2024->have_posts()) : ?>
                    <div class="photo-gallery">
                        <?php while ($gallery_2024->have_posts()) : $gallery_2024->the_post(); ?>
                            <div class="gallery-item">
                                <?php if (has_post_thumbnail()) : ?>
                                    <a href="<?php the_permalink(); ?>">
                                        <?php the_post_thumbnail('nolaholi-gallery'); ?>
                                    </a>
                                <?php endif; ?>
                                <div class="gallery-overlay">
                                    <p><?php the_title(); ?></p>
                                </div>
                            </div>
                        <?php endwhile; wp_reset_postdata(); ?>
                    </div>
                <?php else : ?>
                    <p style="text-align: center; color: var(--text-light); margin-top: 30px;">
                        Gallery items will be added here soon. Visit our Google Photos album above to see all photos!
                    </p>
                <?php endif; ?>
            </div>
        </div>
    </section>
    
    <!-- Video Section -->
    <section class="content-section bg-white">
        <div class="container">
            <h2 class="section-title text-center">Festival Videos</h2>
            <div class="section-divider"></div>
            <p style="text-align: center; max-width: 700px; margin: 20px auto 40px; font-size: 1.1rem; color: var(--text-light);">
                Experience the energy, music, and joy of NOLA Holi through video highlights
            </p>
            
            <div style="max-width: 1000px; margin: 0 auto;">
                <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(350px, 1fr)); gap: 30px;">
                    <!-- Video placeholders - replace with actual embedded videos -->
                    <div style="background: var(--off-white); padding: 30px; border-radius: 15px; text-align: center;">
                        <div style="aspect-ratio: 16/9; background: #ddd; border-radius: 10px; margin-bottom: 20px; display: flex; align-items: center; justify-content: center; color: #666;">
                            <div>
                                <div style="font-size: 3rem; margin-bottom: 10px;">▶️</div>
                                <p>2025 Highlight Reel</p>
                            </div>
                        </div>
                        <h4 style="color: var(--mardi-gras-purple); margin-bottom: 10px;">NOLA Holi 2025 Highlights</h4>
                        <p style="color: var(--text-light); font-size: 0.95rem;">Coming soon!</p>
                    </div>
                    
                    <div style="background: var(--off-white); padding: 30px; border-radius: 15px; text-align: center;">
                        <div style="aspect-ratio: 16/9; background: #ddd; border-radius: 10px; margin-bottom: 20px; display: flex; align-items: center; justify-content: center; color: #666;">
                            <div>
                                <div style="font-size: 3rem; margin-bottom: 10px;">▶️</div>
                                <p>2024 Parade</p>
                            </div>
                        </div>
                        <h4 style="color: var(--mardi-gras-green); margin-bottom: 10px;">Inaugural Parade 2024</h4>
                        <p style="color: var(--text-light); font-size: 0.95rem;">Coming soon!</p>
                    </div>
                </div>
                
                <div style="text-align: center; margin-top: 40px; background: var(--off-white); padding: 30px; border-radius: 10px;">
                    <p style="color: var(--text-light); font-size: 1.1rem;">
                        📹 Have videos from the festival? Share them with us at 
                        <a href="mailto:media@nolaholi.org" style="color: var(--mardi-gras-purple); font-weight: 600;">media@nolaholi.org</a>
                    </p>
                </div>
            </div>
        </div>
    </section>
    
    <!-- Share Your Photos -->
    <section class="content-section bg-purple">
        <div class="container">
            <div style="text-align: center; max-width: 700px; margin: 0 auto;">
                <h2 class="section-title" style="color: white;">Share Your Holi Memories</h2>
                <div class="section-divider"></div>
                <p style="font-size: 1.1rem; color: var(--off-white); line-height: 1.8; margin-bottom: 30px;">
                    Did you take amazing photos or videos at NOLA Holi? We'd love to feature them in our gallery! 
                    Share your colorful memories with us and help tell the story of our festival.
                </p>
                <div style="background: rgba(255,255,255,0.1); padding: 30px; border-radius: 10px; margin-bottom: 30px;">
                    <h4 style="color: var(--mardi-gras-gold); margin-bottom: 15px; font-size: 1.3rem;">How to Share:</h4>
                    <div style="color: var(--off-white); line-height: 2; text-align: left; max-width: 500px; margin: 0 auto;">
                        <p>✓ Tag us on social media with <strong>#NOLAHoli</strong></p>
                        <p>✓ Email photos to <strong>photos@nolaholi.org</strong></p>
                        <p>✓ Share in our Google Photos album</p>
                        <p>✓ DM us on Instagram or Facebook</p>
                    </div>
                </div>
                <a href="<?php echo esc_url(home_url('/contact/')); ?>" class="btn btn-gold">Contact Us</a>
            </div>
        </div>
    </section>
    
    <!-- Looking Forward -->
    <section class="content-section bg-light">
        <div class="container">
            <div style="text-align: center; max-width: 800px; margin: 0 auto;">
                <h2 class="section-title">See You at NOLA Holi 2026!</h2>
                <div class="section-divider"></div>
                <p style="font-size: 1.1rem; color: var(--text-light); line-height: 1.8; margin-bottom: 30px;">
                    Can't wait to add more colorful memories to this gallery? Mark your calendar for 
                    <strong style="color: var(--mardi-gras-purple);">
                        <?php echo esc_html(get_theme_mod('nolaholi_event_date', 'March 7, 2026')); ?>
                    </strong> 
                    and join us for another unforgettable celebration!
                </p>
                <div style="display: flex; gap: 20px; justify-content: center; flex-wrap: wrap;">
                    <a href="<?php echo esc_url(home_url('/')); ?>" class="btn btn-primary">Festival Info</a>
                    <a href="<?php echo esc_url(home_url('/volunteers/')); ?>" class="btn btn-secondary">Volunteer</a>
                </div>
            </div>
        </div>
    </section>
</main>

<?php
get_footer();
?>

