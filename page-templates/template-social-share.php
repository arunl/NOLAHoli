<?php
/**
 * Template Name: Social Share
 * A page optimized for social media screenshots (no header/footer for clean screenshots)
 * 
 * @package NOLAHoli
 */

// Minimal HTML head without site header
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php wp_head(); ?>
</head>
<body <?php body_class('social-share-page'); ?>>

<?php
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
        
        <div class="social-two-columns">
            
            <!-- Schedule Column (Two-Track) -->
            <div class="social-column wide">
                <div class="social-column-header schedule-header-bg">
                    <span class="column-icon">🗓</span>
                    <h3>Schedule</h3>
                </div>
                <div class="social-column-content">
                    <div class="dual-schedule-social">
                        <!-- Column Headers -->
                        <div class="schedule-row-social header-row">
                            <div class="time-col"></div>
                            <div class="park-col">🏞️ At the Park</div>
                            <div class="parade-col">🎭 Parade</div>
                        </div>
                        
                        <div class="schedule-row-social">
                            <div class="time-col">10:00</div>
                            <div class="park-col"><strong>🎧 DJ Starts Spinning</strong><br><span class="sub">Dance with colors</span></div>
                            <div class="parade-col empty"></div>
                        </div>
                        
                        <div class="schedule-row-social">
                            <div class="time-col">11:00</div>
                            <div class="park-col"><strong>🎵 DJ Keeps Spinning</strong><br><span class="sub">Stay & splash colors</span></div>
                            <div class="parade-col"><strong>🎧 Parade DJ Spinning</strong><br><span class="sub">Colors at Royal & Touro</span></div>
                        </div>
                        
                        <div class="schedule-row-social">
                            <div class="time-col">11:45</div>
                            <div class="park-col empty"></div>
                            <div class="parade-col"><strong>📣 Parade Lineup</strong><br><span class="sub">Load up your colors</span></div>
                        </div>
                        
                        <div class="schedule-row-social highlight">
                            <div class="time-col">12:00</div>
                            <div class="park-col"><strong>🔊 DJ Ramps it Up</strong><br><span class="sub">Continue the party</span></div>
                            <div class="parade-col"><strong>🎉 Parade Starts!</strong><br><span class="sub">Color throw on route!</span></div>
                        </div>
                        
                        <div class="schedule-row-social reunite">
                            <div class="time-col">1:00</div>
                            <div class="park-col"><strong>🎊 Everyone Reunites!</strong></div>
                            <div class="parade-col"><span class="sub">Parade returns</span></div>
                        </div>
                        
                        <div class="schedule-row-social">
                            <div class="time-col">1:15</div>
                            <div class="park-col"><strong>🎭 Cultural Performances</strong></div>
                            <div class="parade-col empty"></div>
                        </div>
                        
                        <div class="schedule-row-social">
                            <div class="time-col">2:30</div>
                            <div class="park-col"><strong>💃 Let's Dance!</strong><br><span class="sub">DJ cranks it up</span></div>
                            <div class="parade-col empty"></div>
                        </div>
                        
                        <div class="schedule-row-social">
                            <div class="time-col">5:00</div>
                            <div class="park-col"><strong>🎨 Event Ends</strong></div>
                            <div class="parade-col empty"></div>
                        </div>
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
                    <div class="route-steps-compact">
                        <p class="route-label">Route:</p>
                        <p class="route-step">📍 Start at Royal & Touro</p>
                        <p class="route-step">↓ to Esplanade</p>
                        <p class="route-step">← Left on St Philip</p>
                        <p class="route-step">← Left on Chartres</p>
                        <p class="route-step">⬤ End at Chartres & Kerlerec</p>
                    </div>
                </div>
            </div>
            
        </div>
    </section>
    
    <!-- Food Vendors Section -->
    <section class="social-vendors-text">
        <p class="vendors-title">Authentic Indian Cuisine by</p>
        <p class="vendors-names">
            <span>Indian Delight</span>
            <span class="separator">•</span>
            <span>Aroma Indian Cuisine</span>
            <span class="separator">•</span>
            <span>Destination India</span>
        </p>
    </section>
    
    <!-- Info Bar -->
    <section class="social-info-bar">
        <span>Free Entrance</span>
        <span class="bullet">•</span>
        <span>Family Friendly</span>
        <span class="bullet">•</span>
        <span>All Are Welcome</span>
    </section>
    
    <!-- Dark Footer Strip -->
    <section class="social-dark-strip">
        <p>Visit: <strong>NOLAHoli.org</strong></p>
    </section>
</main>

<?php wp_footer(); ?>
</body>
</html>
