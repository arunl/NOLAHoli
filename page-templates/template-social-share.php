<?php
/**
 * Template Name: Social Share
 * A page optimized for social media screenshots
 * 
 * @package NOLAHoli
 */

get_header();

// Get event info from theme customizer
$event_date = get_theme_mod('nolaholi_event_date', 'March 8, 2026');
$event_time = get_theme_mod('nolaholi_event_time', '10:00am - 5:00pm');
$event_year = $event_date ? date('Y', strtotime($event_date)) : date('Y');

// Get presenting sponsor from database
$presenting_sponsor = nolaholi_get_first_event_sponsor();
$sponsor_name = $presenting_sponsor ? $presenting_sponsor['name'] : '';
?>

<main id="primary" class="site-main social-share-page">
    <!-- Hero Section - Aurora/Holi Style -->
    <section class="hero-section event-day-hero social-hero">
        <div class="hero-overlay"></div>
        <div class="hero-content">
            <?php if ($sponsor_name) : ?>
            <p class="presented-by">Presented by</p>
            <h2 class="sponsor-name"><?php echo esc_html($sponsor_name); ?></h2>
            <?php endif; ?>
            <h1 class="hero-title-large"><span class="cursive-text">NOLA Holi Festival <?php echo esc_html($event_year); ?></span></h1>
            <p class="hero-event-info"><?php echo esc_html($event_date); ?> @ Washington Square Park</p>
        </div>
    </section>
    
    <!-- Event Details Section -->
    <section class="social-details-section">
        <h2 class="social-section-title">Event Details</h2>
        
        <div class="social-three-columns">
            
            <!-- Schedule Column -->
            <div class="social-column">
                <div class="social-column-header schedule-header-bg">
                    <span class="column-icon">🗓</span>
                    <h3>Schedule</h3>
                </div>
                <div class="social-column-content">
                    <div class="schedule-item">
                        <span class="time">10:00 AM</span>
                        <span class="activity">Event Opens</span>
                    </div>
                    <div class="schedule-item">
                        <span class="time">11:00 AM</span>
                        <span class="activity">Parade Assembly</span>
                    </div>
                    <div class="schedule-item highlight">
                        <span class="time">12:00 PM</span>
                        <span class="activity">🎉 Parade Starts!</span>
                    </div>
                    <div class="schedule-item">
                        <span class="time">1:00 PM</span>
                        <span class="activity">Parade Returns</span>
                    </div>
                    <div class="schedule-item">
                        <span class="time">1:15 PM</span>
                        <span class="activity">Performances</span>
                    </div>
                    <div class="schedule-item">
                        <span class="time">2:30 PM</span>
                        <span class="activity">DJ Set</span>
                    </div>
                    <div class="schedule-item">
                        <span class="time">5:00 PM</span>
                        <span class="activity">Event Ends</span>
                    </div>
                </div>
            </div>
            
            <!-- Parade Map Column -->
            <div class="social-column">
                <div class="social-column-header map-header-bg">
                    <span class="column-icon">🗺️</span>
                    <h3>Parade Map</h3>
                </div>
                <div class="social-column-content map-content">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/2026-parade-route.png" alt="Parade Route Map" class="social-map-image">
                </div>
            </div>
            
            <!-- Parade Route Column -->
            <div class="social-column">
                <div class="social-column-header route-header-bg">
                    <span class="column-icon">🧭</span>
                    <h3>Parade Route</h3>
                </div>
                <div class="social-column-content">
                    <div class="route-item">
                        <span class="route-marker assemble">📍</span>
                        <span class="route-text">Assemble at Royal & Touro</span>
                    </div>
                    <div class="route-item">
                        <span class="route-marker start">▶</span>
                        <span class="route-text">Start down Royal St</span>
                    </div>
                    <div class="route-item">
                        <span class="route-marker turn">←</span>
                        <span class="route-text">Left on St Philip</span>
                    </div>
                    <div class="route-item">
                        <span class="route-marker turn">←</span>
                        <span class="route-text">Left on Chartres</span>
                    </div>
                    <div class="route-item">
                        <span class="route-marker straight">↑</span>
                        <span class="route-text">Continue on Chartres</span>
                    </div>
                    <div class="route-item">
                        <span class="route-marker end">⬤</span>
                        <span class="route-text">End at Chartres & Kerlerec</span>
                    </div>
                    <div class="route-note-social">
                        <strong>💡 Tip:</strong> Arrive by 11 AM to join the parade!
                    </div>
                </div>
            </div>
            
        </div>
    </section>
    
    <!-- Footer with Website -->
    <section class="social-footer">
        <p class="website-url">NOLAHoli.org</p>
        <p class="tagline">Free Admission • Family Friendly • All Are Welcome</p>
    </section>
</main>

<?php
get_footer();
?>
