<?php
/**
 * Template Name: Social Share - Instagram
 * A page optimized for Instagram screenshots with crop guides
 * Shows boundary lines for 1:1 (square) and 4:5 (portrait) aspect ratios
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
    <style>
        /* Instagram-specific overrides */
        .instagram-container {
            position: relative;
            width: 1080px;
            margin: 0 auto;
            background: var(--white);
        }
        
        /* Crop guide overlays - toggle with checkboxes */
        .crop-guides {
            position: fixed;
            top: 10px;
            right: 10px;
            background: rgba(0, 0, 0, 0.8);
            padding: 15px;
            border-radius: 8px;
            z-index: 1000;
            color: white;
            font-family: system-ui, sans-serif;
        }
        
        .crop-guides label {
            display: flex;
            align-items: center;
            gap: 8px;
            margin: 5px 0;
            cursor: pointer;
        }
        
        .crop-guides .guide-info {
            font-size: 11px;
            color: #aaa;
            margin-left: 24px;
        }
        
        /* Square guide (1:1 - 1080x1080) */
        .guide-square {
            position: fixed;
            top: 0;
            left: 50%;
            transform: translateX(-50%);
            width: 1080px;
            height: 1080px;
            border: 3px dashed #00ff00;
            pointer-events: none;
            z-index: 999;
            display: none;
        }
        
        .guide-square::before {
            content: "1:1 Square (1080×1080)";
            position: absolute;
            top: -25px;
            left: 50%;
            transform: translateX(-50%);
            background: #00ff00;
            color: black;
            padding: 2px 10px;
            font-size: 12px;
            font-weight: bold;
            border-radius: 4px;
        }
        
        /* Portrait guide (4:5 - 1080x1350) */
        .guide-portrait {
            position: fixed;
            top: 0;
            left: 50%;
            transform: translateX(-50%);
            width: 1080px;
            height: 1350px;
            border: 3px dashed #ff00ff;
            pointer-events: none;
            z-index: 998;
            display: none;
        }
        
        .guide-portrait::before {
            content: "4:5 Portrait (1080×1350)";
            position: absolute;
            top: -25px;
            left: 50%;
            transform: translateX(-50%);
            background: #ff00ff;
            color: white;
            padding: 2px 10px;
            font-size: 12px;
            font-weight: bold;
            border-radius: 4px;
        }
        
        #toggle-square:checked ~ .guide-square {
            display: block;
        }
        
        #toggle-portrait:checked ~ .guide-portrait {
            display: block;
        }
        
        /* Instagram optimized layout - more compact */
        .insta-hero {
            min-height: 200px;
            padding: 30px 20px;
        }
        
        .insta-hero .sponsor-name {
            font-size: 1.6rem;
            margin-bottom: 5px;
        }
        
        .insta-hero .hero-title-large {
            font-size: 2.8rem;
        }
        
        .insta-hero .hero-event-info {
            font-size: 1.2rem;
            margin-top: 10px;
        }
        
        .insta-details-section {
            padding: 12px 15px 15px;
        }
        
        .insta-details-section .social-section-title {
            font-size: 1.5rem;
            margin-bottom: 12px;
            padding-bottom: 6px;
        }
        
        .insta-details-section .social-column-header h3 {
            font-size: 1rem;
        }
        
        .insta-details-section .schedule-item .time,
        .insta-details-section .schedule-item .activity {
            font-size: 0.9rem;
        }
        
        .insta-details-section .route-text {
            font-size: 0.9rem;
        }
        
        .insta-footer {
            padding: 12px 15px;
        }
        
        .insta-footer .website-url {
            font-size: 1.5rem;
        }
        
        .insta-footer .tagline {
            font-size: 0.9rem;
        }
        
        /* Food Vendors Section */
        .insta-vendors-section {
            background: #f8f8f8;
            padding: 15px 20px;
            text-align: center;
        }
        
        .vendors-label {
            font-size: 0.85rem;
            color: #666;
            margin: 0 0 10px 0;
            text-transform: uppercase;
            letter-spacing: 1px;
        }
        
        .vendors-logos {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 30px;
        }
        
        .vendor-logo-small {
            height: 50px;
            width: auto;
            max-width: 120px;
            object-fit: contain;
            filter: grayscale(0%);
            transition: transform 0.2s ease;
        }
        
        .vendor-logo-small:hover {
            transform: scale(1.05);
        }
        
        /* Hide guides panel when taking screenshot */
        @media print {
            .crop-guides,
            .guide-square,
            .guide-portrait {
                display: none !important;
            }
        }
    </style>
</head>
<body <?php body_class('social-share-page instagram-page'); ?>>

<!-- Crop Guide Controls -->
<div class="crop-guides">
    <strong>📐 Crop Guides</strong>
    <label>
        <input type="checkbox" id="toggle-square-ctrl" onchange="document.getElementById('guide-square').style.display = this.checked ? 'block' : 'none'">
        <span style="color: #00ff00;">■</span> Square (1:1)
    </label>
    <div class="guide-info">Best for feed posts</div>
    <label>
        <input type="checkbox" id="toggle-portrait-ctrl" onchange="document.getElementById('guide-portrait').style.display = this.checked ? 'block' : 'none'">
        <span style="color: #ff00ff;">■</span> Portrait (4:5)
    </label>
    <div class="guide-info">More visible in feed</div>
    <hr style="border-color: #444; margin: 10px 0;">
    <small>Hide this panel before screenshot</small>
</div>

<!-- Crop Guide Overlays -->
<div class="guide-square" id="guide-square"></div>
<div class="guide-portrait" id="guide-portrait"></div>

<?php
// Get event info from theme customizer
$event_date = get_theme_mod('nolaholi_event_date', 'March 8, 2026');
$event_time = get_theme_mod('nolaholi_event_time', '10:00am - 5:00pm');
$event_year = $event_date ? date('Y', strtotime($event_date)) : date('Y');

// Get presenting sponsor from database
$presenting_sponsor = nolaholi_get_first_event_sponsor();
$sponsor_name = $presenting_sponsor ? $presenting_sponsor['name'] : '';
?>

<div class="instagram-container">
<main id="primary" class="site-main social-share-page">
    <!-- Hero Section - Aurora/Holi Style -->
    <section class="hero-section event-day-hero social-hero insta-hero">
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
    <section class="social-details-section insta-details-section">
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
                        <span class="dotted-line"></span>
                        <span class="activity">Event Opens</span>
                    </div>
                    <div class="schedule-item highlight">
                        <span class="time">11:00 AM</span>
                        <span class="dotted-line"></span>
                        <span class="activity">Parade Assembly</span>
                    </div>
                    <div class="schedule-item">
                        <span class="time">12:00 PM</span>
                        <span class="dotted-line"></span>
                        <span class="activity">🎉 Parade Starts!</span>
                    </div>
                    <div class="schedule-item">
                        <span class="time">1:00 PM</span>
                        <span class="dotted-line"></span>
                        <span class="activity">Parade Returns</span>
                    </div>
                    <div class="schedule-item">
                        <span class="time">1:15 PM</span>
                        <span class="dotted-line"></span>
                        <span class="activity">Performances</span>
                    </div>
                    <div class="schedule-item">
                        <span class="time">2:30 PM</span>
                        <span class="dotted-line"></span>
                        <span class="activity">DJ Set</span>
                    </div>
                    <div class="schedule-item">
                        <span class="time">5:00 PM</span>
                        <span class="dotted-line"></span>
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
                    <div class="route-item highlight">
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
                        <span class="route-marker straight">↓</span>
                        <span class="route-text">Continue on Chartres</span>
                    </div>
                    <div class="route-item">
                        <span class="route-marker end">⬤</span>
                        <span class="route-text">End at Chartres & Kerlerec</span>
                    </div>
                </div>
            </div>
            
        </div>
    </section>
    
    <!-- Footer with Website -->
    <section class="social-footer insta-footer">
        <p class="website-url">NOLAHoli.org</p>
        <p class="tagline">Free Admission • Family Friendly • All Are Welcome</p>
    </section>
    
    <!-- Food Vendors - Logos Only -->
    <section class="insta-vendors-section">
        <p class="vendors-label">Food Vendors</p>
        <div class="vendors-logos">
            <a href="https://www.indiandelightms.com/" target="_blank" rel="noopener noreferrer">
                <img src="<?php echo get_template_directory_uri(); ?>/images/Indian Delight logo.png" alt="Indian Delight" class="vendor-logo-small">
            </a>
            <a href="https://aromanolaindiancuisine.com/" target="_blank" rel="noopener noreferrer">
                <img src="<?php echo get_template_directory_uri(); ?>/images/Aroma Logo.png" alt="Aroma Indian Cuisine" class="vendor-logo-small">
            </a>
            <a href="https://destinationindiala.com/" target="_blank" rel="noopener noreferrer">
                <img src="<?php echo get_template_directory_uri(); ?>/images/Destination India Logo.PNG" alt="Destination India" class="vendor-logo-small">
            </a>
        </div>
    </section>
</main>
</div>

<?php wp_footer(); ?>
</body>
</html>
