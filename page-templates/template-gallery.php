<?php
/**
 * Template Name: Gallery
 * Template for the Photo/Video Gallery page with Google Photos integration
 * 
 * @package NOLAHoli
 */

get_header();

// Get gallery settings
$gallery_style = get_theme_mod('nolaholi_gallery_style', 'grid');
$gallery_2026 = get_theme_mod('nolaholi_gallery_2026', '');
$gallery_2025 = get_theme_mod('nolaholi_gallery_2025', 'https://photos.app.goo.gl/A7k1H1NdwU7wUvjLA');
$gallery_2024 = get_theme_mod('nolaholi_gallery_2024', 'https://photos.google.com/share/AF1QipMXoU__flN42f4HOvc_3Ue8HkTyXWUEHWSLuJulorUazYVGVsRzijEKD6GjA48MGA/memory/AF1QipPlfUZfOStBcDVTINx3OhPsgfCN77FIL4qBkiLIfzo63FJca7L1jE2KRHHm492t_g?key=MHgwV0xhLU9tYzdhMmNfR2FNbTN0eDdCWE9nRkF3&pli=1');

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
    
    <!-- Gallery Albums -->
    <section class="content-section bg-light">
        <div class="container">
            <!-- Year Tabs -->
            <div style="text-align: center; margin-bottom: 40px;">
                <div style="display: inline-flex; gap: 15px; background: var(--white); padding: 10px; border-radius: 50px; box-shadow: var(--shadow-sm); flex-wrap: wrap; justify-content: center;">
                    <?php if ($gallery_2026) : ?>
                        <a href="#gallery-2026" class="gallery-year-tab active" data-year="2026" style="padding: 12px 30px; border-radius: 50px; background: var(--mardi-gras-purple); color: white; font-weight: 600; text-decoration: none;">2026</a>
                    <?php endif; ?>
                    <?php if ($gallery_2025) : ?>
                        <a href="#gallery-2025" class="gallery-year-tab <?php echo !$gallery_2026 ? 'active' : ''; ?>" data-year="2025" style="padding: 12px 30px; border-radius: 50px; <?php echo !$gallery_2026 ? 'background: var(--mardi-gras-purple); color: white;' : 'color: var(--text-dark);'; ?> font-weight: 600; text-decoration: none;">2025</a>
                    <?php endif; ?>
                    <?php if ($gallery_2024) : ?>
                        <a href="#gallery-2024" class="gallery-year-tab <?php echo !$gallery_2026 && !$gallery_2025 ? 'active' : ''; ?>" data-year="2024" style="padding: 12px 30px; border-radius: 50px; <?php echo !$gallery_2026 && !$gallery_2025 ? 'background: var(--mardi-gras-purple); color: white;' : 'color: var(--text-dark);'; ?> font-weight: 600; text-decoration: none;">2024</a>
                    <?php endif; ?>
                </div>
            </div>
            
            <!-- 2026 Gallery -->
            <?php if ($gallery_2026) : ?>
            <div id="gallery-2026" class="gallery-year-section">
                <h2 class="section-title text-center">NOLA Holi 2026</h2>
                <div class="section-divider"></div>
                
                <div style="text-align: center; margin: 40px 0;">
                    <div style="background: var(--white); padding: 40px; border-radius: 15px; max-width: 700px; margin: 0 auto; box-shadow: var(--shadow-md);">
                        <div style="font-size: 3rem; margin-bottom: 20px;">📸</div>
                        <h3 style="color: var(--mardi-gras-purple); margin-bottom: 15px; font-size: 1.8rem;">
                            View Our 2026 Photo Album
                        </h3>
                        <p style="color: var(--text-light); line-height: 1.8; margin-bottom: 25px;">
                            Browse photos from NOLA Holi 2026 in our Google Photos album. 
                            Feel free to download and share your favorites!
                        </p>
                        <a href="<?php echo esc_url($gallery_2026); ?>" target="_blank" rel="noopener noreferrer" class="btn btn-primary">
                            Open 2026 Gallery
                        </a>
                    </div>
                </div>
                
                <!-- Embedded Album Preview -->
                <div style="max-width: 1000px; margin: 40px auto;">
                    <div style="background: var(--white); padding: 20px; border-radius: 15px; box-shadow: var(--shadow-md);">
                        <iframe src="<?php echo esc_url($gallery_2026); ?>" width="100%" height="600" frameborder="0" allowfullscreen style="border-radius: 10px;"></iframe>
                    </div>
                </div>
            </div>
            <?php endif; ?>
            
            <!-- 2025 Gallery -->
            <?php if ($gallery_2025) : ?>
            <div id="gallery-2025" class="gallery-year-section" style="<?php echo $gallery_2026 ? 'display: none;' : ''; ?>">
                <h2 class="section-title text-center">NOLA Holi 2025</h2>
                <div class="section-divider"></div>
                
                <div style="text-align: center; margin: 40px 0;">
                    <div style="background: var(--white); padding: 40px; border-radius: 15px; max-width: 700px; margin: 0 auto; box-shadow: var(--shadow-md);">
                        <div style="font-size: 3rem; margin-bottom: 20px;">📸</div>
                        <h3 style="color: var(--mardi-gras-green); margin-bottom: 15px; font-size: 1.8rem;">
                            View Our 2025 Photo Album
                        </h3>
                        <p style="color: var(--text-light); line-height: 1.8; margin-bottom: 25px;">
                            Browse hundreds of photos from NOLA Holi 2025 in our Google Photos album. 
                            Feel free to download and share your favorites!
                        </p>
                        <a href="<?php echo esc_url($gallery_2025); ?>" target="_blank" rel="noopener noreferrer" class="btn btn-primary">
                            Open 2025 Gallery
                        </a>
                    </div>
                </div>
                
                <!-- Embedded Album Preview -->
                <div style="max-width: 1000px; margin: 40px auto;">
                    <div style="background: var(--white); padding: 20px; border-radius: 15px; box-shadow: var(--shadow-md);">
                        <iframe src="<?php echo esc_url($gallery_2025); ?>" width="100%" height="600" frameborder="0" allowfullscreen style="border-radius: 10px;"></iframe>
                    </div>
                </div>
            </div>
            <?php endif; ?>
            
            <!-- 2024 Gallery -->
            <?php if ($gallery_2024) : ?>
            <div id="gallery-2024" class="gallery-year-section" style="<?php echo $gallery_2026 || $gallery_2025 ? 'display: none;' : ''; ?>">
                <h2 class="section-title text-center">NOLA Holi 2024</h2>
                <div class="section-divider"></div>
                <p style="text-align: center; color: var(--text-light); margin-bottom: 40px; font-size: 1.1rem;">
                    The inaugural NOLA Holi Festival – where it all began!
                </p>
                
                <div style="text-align: center; margin: 40px 0;">
                    <div style="background: var(--white); padding: 40px; border-radius: 15px; max-width: 700px; margin: 0 auto; box-shadow: var(--shadow-md);">
                        <div style="font-size: 3rem; margin-bottom: 20px;">📷</div>
                        <h3 style="color: var(--mardi-gras-gold); margin-bottom: 15px; font-size: 1.8rem;">
                            View Our 2024 Photo Album
                        </h3>
                        <p style="color: var(--text-light); line-height: 1.8; margin-bottom: 25px;">
                            Relive the magic of our first-ever NOLA Holi celebration! Browse photos from 
                            the inaugural festival dedicated to Michelle Lakhotia's memory.
                        </p>
                        <a href="<?php echo esc_url($gallery_2024); ?>" target="_blank" rel="noopener noreferrer" class="btn btn-secondary">
                            Open 2024 Gallery
                        </a>
                    </div>
                </div>
                
                <!-- Embedded Album Preview -->
                <div style="max-width: 1000px; margin: 40px auto;">
                    <div style="background: var(--white); padding: 20px; border-radius: 15px; box-shadow: var(--shadow-md);">
                        <iframe src="<?php echo esc_url($gallery_2024); ?>" width="100%" height="600" frameborder="0" allowfullscreen style="border-radius: 10px;"></iframe>
                    </div>
                </div>
            </div>
            <?php endif; ?>
            
            <?php if (!$gallery_2026 && !$gallery_2025 && !$gallery_2024) : ?>
            <!-- No Albums Set -->
            <div style="text-align: center; padding: 80px 20px;">
                <div style="font-size: 4rem; margin-bottom: 20px;">📸</div>
                <h3 style="color: var(--mardi-gras-purple); margin-bottom: 15px;">Gallery Coming Soon!</h3>
                <p style="color: var(--text-light); font-size: 1.1rem; max-width: 600px; margin: 0 auto 30px;">
                    Photo galleries will be added here after each festival. Check back soon!
                </p>
                <p style="color: var(--text-light); font-size: 0.95rem;">
                    <em>Site administrators: Add Google Photos album URLs in Appearance → Customize → Photo Gallery</em>
                </p>
            </div>
            <?php endif; ?>
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
                        <p>✓ Share directly to our Google Photos albums</p>
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
