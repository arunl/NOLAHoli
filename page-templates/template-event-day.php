<?php
/**
 * Template Name: Event Day
 * Template for Event Day schedule and parade route
 * 
 * @package NOLAHoli
 */

get_header();

// Get event info from theme customizer
$event_date = get_theme_mod('nolaholi_event_date', 'March 8, 2026');
$event_year = $event_date ? date('Y', strtotime($event_date)) : date('Y');

// Get presenting sponsor from database
$presenting_sponsor = nolaholi_get_first_event_sponsor();
$sponsor_name = $presenting_sponsor ? $presenting_sponsor['name'] : '';
?>

<main id="primary" class="site-main">
    <!-- Hero Section - Aurora/Holi Style -->
    <section class="hero-section event-day-hero">
        <div class="hero-overlay"></div>
        <div class="hero-content">
            <?php if ($sponsor_name) : ?>
            <p class="presented-by">Presented by</p>
            <h2 class="sponsor-name"><?php echo esc_html($sponsor_name); ?></h2>
            <?php endif; ?>
            <p class="hero-tagline">The Biggest</p>
            <h1 class="hero-title-large"><span class="cursive-text">Festival of Colors</span></h1>
            <div class="gold-ribbon">
                <span>IN NEW ORLEANS</span>
            </div>
        </div>
    </section>
    
    <!-- Main Content: Schedule + Parade Route -->
    <section class="content-section bg-white">
        <div class="container">
            
            <!-- Section Header -->
            <div class="event-day-section-header">
                <h2>Event Details</h2>
                <p><?php echo esc_html($event_date); ?> • Washington Square Park</p>
            </div>
            
            <div class="event-day-grid-new">
                
                <!-- Left Column: Two-Track Schedule -->
                <div class="event-schedule-dual">
                    <div class="schedule-header">
                        <span class="schedule-icon">🗓</span>
                        <h2>Event Schedule</h2>
                    </div>
                    
                    <div class="dual-schedule">
                        <!-- Column Headers -->
                        <div class="schedule-row header-row">
                            <div class="time-col"></div>
                            <div class="park-col"><span class="col-icon">🏞️</span> At the Park</div>
                            <div class="parade-col"><span class="col-icon">🎭</span> Parade</div>
                        </div>
                        
                        <!-- 10:00 AM -->
                        <div class="schedule-row">
                            <div class="time-col">10:00 AM</div>
                            <div class="park-col">
                                <strong>🎧 DJ Starts Spinning</strong><br>
                                <span class="sub">Dance with colors</span>
                            </div>
                            <div class="parade-col empty"></div>
                        </div>
                        
                        <!-- 11:00 AM -->
                        <div class="schedule-row">
                            <div class="time-col">11:00 AM</div>
                            <div class="park-col">
                                <strong>🎵 DJ Keeps Spinning</strong><br>
                                <span class="sub">Stay & splash colors</span>
                            </div>
                            <div class="parade-col">
                                <strong>🎧 Parade DJ Starts Spinning</strong><br>
                                <span class="sub">Dance with colors at Royal & Touro</span>
                            </div>
                        </div>
                        
                        <!-- 11:45 AM -->
                        <div class="schedule-row">
                            <div class="time-col">11:45 AM</div>
                            <div class="park-col empty"></div>
                            <div class="parade-col">
                                <strong>📣 Parade Lineup</strong><br>
                                <span class="sub">Load up your colors</span>
                            </div>
                        </div>
                        
                        <!-- 12:00 PM -->
                        <div class="schedule-row highlight">
                            <div class="time-col">12:00 PM</div>
                            <div class="park-col">
                                <strong>🔊 DJ Ramps it Up</strong><br>
                                <span class="sub">Continue the party</span>
                            </div>
                            <div class="parade-col">
                                <strong>🎉 Parade Starts!</strong><br>
                                <span class="sub">Color throw on the route!</span>
                            </div>
                        </div>
                        
                        <!-- 1:00 PM -->
                        <div class="schedule-row reunite">
                            <div class="time-col">1:00 PM</div>
                            <div class="park-col">
                                <strong>🎊 Everyone Reunites!</strong>
                            </div>
                            <div class="parade-col">
                                <span class="sub">Parade returns to Park</span>
                            </div>
                        </div>
                        
                        <!-- 1:15 PM -->
                        <div class="schedule-row">
                            <div class="time-col">1:15 PM</div>
                            <div class="park-col">
                                <strong>🎭 Cultural Performances</strong>
                            </div>
                            <div class="parade-col empty"></div>
                        </div>
                        
                        <!-- 2:30 PM -->
                        <div class="schedule-row">
                            <div class="time-col">2:30 PM</div>
                            <div class="park-col">
                                <strong>💃 Let's Dance!</strong><br>
                                <span class="sub">DJ cranks it up</span>
                            </div>
                            <div class="parade-col empty"></div>
                        </div>
                        
                        <!-- 5:00 PM -->
                        <div class="schedule-row last">
                            <div class="time-col">5:00 PM</div>
                            <div class="park-col">
                                <strong>🎨 Event Ends</strong>
                            </div>
                            <div class="parade-col empty"></div>
                        </div>
                    </div>
                </div>
                
                <!-- Right Column: Parade Route Map -->
                <div class="parade-route-map">
                    <div class="route-header">
                        <span class="route-icon">🗺️</span>
                        <h2>Parade Map</h2>
                    </div>
                    
                    <div class="route-map">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/2026-parade-route.png" alt="NOLA Holi 2026 Parade Route Map">
                    </div>
                    
                    <div class="route-text">
                        <strong>Route:</strong> Royal & Touro → St Philip → Chartres → Kerlerec
                    </div>
                </div>
                
            </div>
        </div>
    </section>
    
    <!-- General Info Section -->
    <section class="content-section bg-light">
        <div class="container">
            <h2 class="section-title" style="text-align: center; margin-bottom: 30px;">Event Information</h2>
            <div class="event-quick-info">
                <div class="quick-info-card featured">
                    <span class="quick-icon">🎟️</span>
                    <h3>Free Entrance</h3>
                    <p>Open to everyone!</p>
                </div>
                <div class="quick-info-card">
                    <span class="quick-icon">🎨</span>
                    <h3>Colors</h3>
                    <p>
                        1 packet — $3<br>
                        4 packets — $10
                    </p>
                </div>
                <div class="quick-info-card">
                    <span class="quick-icon">👕</span>
                    <h3>T-Shirts</h3>
                    <p>NOLA Holi T-Shirt<br><strong>$20</strong></p>
                </div>
                <div class="quick-info-card">
                    <span class="quick-icon">🍛</span>
                    <h3>Food & Drinks</h3>
                    <p>Food, Drinks, Beer & Liquor available from vendors</p>
                </div>
            </div>
        </div>
    </section>
    
    <!-- Food Vendors Section -->
    <section class="content-section bg-white">
        <div class="container">
            <h2 class="section-title" style="text-align: center; margin-bottom: 10px;">Food Vendors</h2>
            <p style="text-align: center; color: var(--text-light); margin-bottom: 30px;">Authentic Indian cuisine from the Gulf South</p>
            
            <div class="food-vendors-grid">
                <a href="https://www.indiandelightms.com/" target="_blank" rel="noopener noreferrer" class="vendor-card">
                    <div class="vendor-logo">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/Indian Delight logo.png" alt="Indian Delight Logo">
                    </div>
                    <div class="vendor-info">
                        <h3>Indian Delight</h3>
                        <p>Hattiesburg, MS</p>
                    </div>
                </a>
                
                <a href="https://aromanolaindiancuisine.com/" target="_blank" rel="noopener noreferrer" class="vendor-card">
                    <div class="vendor-logo">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/Aroma Logo.png" alt="Aroma Indian Cuisine Logo">
                    </div>
                    <div class="vendor-info">
                        <h3>Aroma Indian Cuisine</h3>
                        <p>New Orleans, LA</p>
                    </div>
                </a>
                
                <a href="https://destinationindiala.com/" target="_blank" rel="noopener noreferrer" class="vendor-card">
                    <div class="vendor-logo">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/Destination India Logo.PNG" alt="Destination India Logo">
                    </div>
                    <div class="vendor-info">
                        <h3>Destination India</h3>
                        <p>Lafayette, LA</p>
                    </div>
                </a>
            </div>
        </div>
    </section>
    
    <!-- CTA Section -->
    <section class="content-section bg-purple text-white" style="padding: 50px 20px;">
        <div class="container">
            <div style="text-align: center; max-width: 600px; margin: 0 auto;">
                <h2 style="color: white; margin-bottom: 15px;">Join the Celebration!</h2>
                <p style="color: rgba(255,255,255,0.9); margin-bottom: 25px;">
                    NOLA Holi is free and open to everyone. Bring your friends, bring your family, and let's celebrate together!
                </p>
                <div style="display: flex; gap: 15px; justify-content: center; flex-wrap: wrap;">
                    <a href="<?php echo esc_url(home_url('/volunteers/')); ?>" class="btn btn-gold">Volunteer</a>
                    <a href="<?php echo esc_url(home_url('/donate/')); ?>" class="btn" style="background: white; color: var(--mardi-gras-purple);">Donate</a>
                </div>
            </div>
        </div>
    </section>
</main>

<?php
get_footer();
?>
