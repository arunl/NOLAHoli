<?php
/**
 * Template Name: Front Page
 * The home page template
 * 
 * @package NOLAHoli
 */

get_header();
?>

<!-- Hero Section -->
<section class="hero-section" style="<?php echo nolaholi_get_hero_background_style('var(--gradient-festival)'); ?>">
    <div class="hero-overlay"></div>
    <div class="hero-content">
        <h1 class="hero-title">NOLA Holi Festival 2026</h1>
        <p class="hero-subtitle">Celebrating the Festival of Colors in the Heart of New Orleans</p>
    </div>
</section>

<!-- Event Info Bar -->
<section class="event-info-bar">
    <div class="event-info-grid">
        <div class="info-item">
            <div class="info-icon">🗓</div>
            <div class="info-label">Date</div>
            <div class="info-value"><?php echo esc_html(get_theme_mod('nolaholi_event_date', 'March 7, 2026')); ?></div>
        </div>
        <div class="info-item">
            <div class="info-icon">⏰</div>
            <div class="info-label">Time</div>
            <div class="info-value"><?php echo esc_html(get_theme_mod('nolaholi_event_time', 'TBD')); ?></div>
        </div>
        <div class="info-item">
            <div class="info-icon">📍</div>
            <div class="info-label">Location</div>
            <div class="info-value">Washington Square Park</div>
        </div>
        <div class="info-item">
            <div class="info-icon">🌧️</div>
            <div class="info-label">Rain Date</div>
            <div class="info-value"><?php echo esc_html(get_theme_mod('nolaholi_rain_date', 'March 8, 2026')); ?></div>
        </div>
    </div>
</section>

<!-- About Section -->
<section id="about" class="content-section bg-white">
    <div class="container">
        <div class="section-header">
            <h2 class="section-title">What is Holi?</h2>
            <div class="section-divider"></div>
            <p class="section-subtitle">An ancient celebration of spring, love, and the triumph of good over evil</p>
        </div>
        
        <div class="feature-grid">
            <div class="feature-card">
                <div class="feature-icon">🎨</div>
                <h3 class="feature-title">Festival of Colors</h3>
                <p class="feature-description">
                    Holi is one of the most vibrant festivals in the world, where people throw colorful powders and celebrate the arrival of spring with music, dance, and joy.
                </p>
            </div>
            
            <div class="feature-card">
                <div class="feature-icon">🕉️</div>
                <h3 class="feature-title">Cultural Heritage</h3>
                <p class="feature-description">
                    Originating in India, Holi has ancient roots in Hindu mythology, celebrating the divine love of Radha and Krishna and the victory of good over evil.
                </p>
            </div>
            
            <div class="feature-card">
                <div class="feature-icon">🤝</div>
                <h3 class="feature-title">Unity & Joy</h3>
                <p class="feature-description">
                    Holi breaks down social barriers, bringing people of all backgrounds together in a spirit of forgiveness, renewal, and celebration.
                </p>
            </div>
        </div>
        
        <div class="text-center mt-3">
            <a href="<?php echo esc_url(home_url('/about-holi/')); ?>" class="btn btn-outline">Learn More About Holi</a>
        </div>
    </div>
</section>

<!-- NOLA Holi Story -->
<section class="content-section bg-purple">
    <div class="container">
        <div class="section-header">
            <h2 class="section-title">Our Story</h2>
            <div class="section-divider"></div>
            <p class="section-subtitle">A tribute of love, bringing Holi to New Orleans</p>
        </div>
        
        <div style="max-width: 800px; margin: 0 auto; text-align: center;">
            <p style="font-size: 1.2rem; line-height: 1.8; color: var(--off-white);">
                The NOLA Holi Festival was inspired by the vision of <strong>Arun and his late wife, Michelle Lakhotia</strong>, 
                who dreamed of bringing the joy of Holi to New Orleans. Though Michelle passed before its launch, 
                the inaugural festival in 2024 was dedicated to her memory.
            </p>
            <p style="font-size: 1.2rem; line-height: 1.8; color: var(--off-white); margin-top: 20px;">
                What began as a tribute has grown into an annual tradition, bringing the ancient festival of colors 
                to the heart of New Orleans with a colorful parade through the French Quarter and a vibrant festival 
                in Washington Square Park.
            </p>
            <div class="mt-3">
                <a href="<?php echo esc_url(home_url('/about-nola-holi/')); ?>" class="btn btn-gold">Read Our Full Story</a>
            </div>
        </div>
    </div>
</section>

<!-- Events Section -->
<section class="content-section bg-light">
    <div class="container">
        <div class="section-header">
            <h2 class="section-title">Two Celebrations, One Day</h2>
            <div class="section-divider"></div>
        </div>
        
        <div class="feature-grid">
            <div class="feature-card">
                <div class="feature-icon">🎭</div>
                <h3 class="feature-title">Holi Parade</h3>
                <p class="feature-description">
                    Join our vibrant walking parade through the French Quarter with DJ and Krewe da Bhan Gras! 
                    Experience the colors, music, and energy as we march through the historic streets of New Orleans.
                </p>
                <a href="<?php echo esc_url(home_url('/parade/')); ?>" class="btn btn-primary mt-2">Parade Details</a>
            </div>
            
            <div class="feature-card">
                <div class="feature-icon">🎪</div>
                <h3 class="feature-title">Holi Festival</h3>
                <p class="feature-description">
                    Celebrate at Washington Square Park with live performances, authentic Indian food, local vendors, 
                    and massive color throws! Fun for the whole family with music, dance, and culture.
                </p>
                <a href="<?php echo esc_url(home_url('/festival/')); ?>" class="btn btn-secondary mt-2">Festival Details</a>
            </div>
        </div>
    </div>
</section>

<!-- Gallery Preview -->
<section class="content-section bg-white">
    <div class="container">
        <div class="section-header">
            <h2 class="section-title">Moments of Joy</h2>
            <div class="section-divider"></div>
            <p class="section-subtitle">Relive the vibrant memories from past celebrations</p>
        </div>
        
        <div class="photo-gallery">
            <!-- Sample gallery items - these would be dynamically populated -->
            <div class="gallery-item">
                <img src="<?php echo get_template_directory_uri(); ?>/images/parade-photo-1.jpg" alt="Holi Parade" loading="lazy">
                <div class="gallery-overlay">
                    <p>Parade</p>
                </div>
            </div>
            <div class="gallery-item">
                <img src="<?php echo get_template_directory_uri(); ?>/images/celebration-photo-1.jpg" alt="Color throw" loading="lazy">
                <div class="gallery-overlay">
                    <p>Colors</p>
                </div>
            </div>
            <div class="gallery-item">
                <img src="<?php echo get_template_directory_uri(); ?>/images/food-photo.jpg" alt="Food" loading="lazy">
                <div class="gallery-overlay">
                    <p>Food</p>
                </div>
            </div>
        </div>
        
        <div class="text-center mt-3">
            <a href="<?php echo esc_url(home_url('/gallery/')); ?>" class="btn btn-primary">View Full Gallery</a>
        </div>
    </div>
</section>

<!-- Get Involved -->
<section class="content-section bg-light">
    <div class="container">
        <div class="section-header">
            <h2 class="section-title">Get Involved</h2>
            <div class="section-divider"></div>
            <p class="section-subtitle">Be part of something colorful</p>
        </div>
        
        <div class="feature-grid">
            <div class="feature-card">
                <div class="feature-icon">🤲</div>
                <h3 class="feature-title">Volunteer</h3>
                <p class="feature-description">
                    Help us create magic! We need volunteers for setup, event day support, and cleanup. 
                    Join our amazing team and be part of NOLA Holi.
                </p>
                <a href="<?php echo esc_url(home_url('/volunteers/')); ?>" class="btn btn-primary mt-2">Sign Up to Volunteer</a>
            </div>
            
            <div class="feature-card">
                <div class="feature-icon">🎭</div>
                <h3 class="feature-title">Perform</h3>
                <p class="feature-description">
                    Share your talent on our stage! We welcome performances of all styles — classical Indian dances, 
                    bhajans, Bollywood dances, and more. All ages welcome!
                </p>
                <a href="<?php echo esc_url(home_url('/performers/')); ?>" class="btn btn-gold mt-2">Apply to Perform</a>
            </div>
            
            <div class="feature-card">
                <div class="feature-icon">⭐</div>
                <h3 class="feature-title">Sponsor</h3>
                <p class="feature-description">
                    Support our festival and gain visibility! Multiple sponsorship tiers available from 
                    Event Sponsor to Friends of NOLA Holi.
                </p>
                <a href="<?php echo esc_url(home_url('/sponsors/')); ?>" class="btn btn-secondary mt-2">Sponsorship Packages</a>
            </div>
            
            <div class="feature-card">
                <div class="feature-icon">🍜</div>
                <h3 class="feature-title">Vendor</h3>
                <p class="feature-description">
                    Showcase your products or food at our festival! We welcome food vendors and 
                    non-food vendors to participate.
                </p>
                <a href="<?php echo esc_url(home_url('/vendors/')); ?>" class="btn btn-gold mt-2">Vendor Information</a>
            </div>
        </div>
    </div>
</section>

<?php
get_footer();
?>

