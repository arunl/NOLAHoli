<?php
/**
 * Template Name: Social Share - FB Event Banner
 * Optimized for Facebook Event Cover Photo (1200x628 or 1920x1005)
 * 
 * @package NOLAHoli
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php wp_head(); ?>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Poppins', system-ui, sans-serif;
        }
        
        /* Facebook Event Banner Container - 1200x628 */
        .fb-event-banner {
            width: 1200px;
            height: 628px;
            display: flex;
            background: #fff;
            overflow: hidden;
        }
        
        /* Left Column - Hero (35%) */
        .banner-hero {
            width: 35%;
            background: linear-gradient(135deg, 
                #FF6B6B 0%, 
                #FF8E53 15%, 
                #FFCD56 30%, 
                #4ECDC4 50%, 
                #45B7D1 65%, 
                #96C93D 80%, 
                #DDA0DD 95%);
            position: relative;
            display: flex;
            flex-direction: column;
            justify-content: center;
            padding: 25px;
        }
        
        .banner-hero::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: 
                radial-gradient(ellipse at 20% 20%, rgba(255, 107, 107, 0.4) 0%, transparent 50%),
                radial-gradient(ellipse at 80% 30%, rgba(78, 205, 196, 0.4) 0%, transparent 50%),
                radial-gradient(ellipse at 40% 80%, rgba(150, 201, 61, 0.4) 0%, transparent 50%);
            pointer-events: none;
        }
        
        .hero-content {
            position: relative;
            z-index: 1;
        }
        
        .presented-by {
            font-size: 0.7rem;
            color: rgba(255,255,255,0.9);
            text-transform: uppercase;
            letter-spacing: 2px;
            margin-bottom: 3px;
        }
        
        .sponsor-name {
            font-size: 1.3rem;
            color: #FFD700;
            font-weight: 700;
            margin-bottom: 10px;
            text-shadow: 1px 1px 3px rgba(0,0,0,0.3);
        }
        
        .festival-title {
            font-family: 'Dancing Script', 'Brush Script MT', cursive;
            font-size: 2.8rem;
            color: white;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.4);
            line-height: 1.1;
            margin-bottom: 15px;
        }
        
        .event-date-location {
            font-size: 1.1rem;
            color: #FFD700;
            font-weight: 700;
            text-shadow: 1px 1px 3px rgba(0,0,0,0.3);
            line-height: 1.4;
        }
        
        /* Right Column - Content (65%) */
        .banner-content {
            width: 65%;
            display: flex;
            flex-direction: column;
        }
        
        /* Top Section - Schedule + Map */
        .content-top {
            flex: 1;
            display: flex;
            padding: 12px;
            gap: 12px;
            background: #f9f9f9;
        }
        
        /* Schedule Table */
        .schedule-section {
            flex: 1.3;
            background: white;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
        }
        
        .schedule-header {
            background: linear-gradient(135deg, #5a2d82 0%, #7b3fa0 100%);
            color: white;
            padding: 8px 12px;
            font-size: 0.85rem;
            font-weight: 700;
        }
        
        .schedule-header span {
            margin-right: 6px;
        }
        
        .dual-schedule-fb {
            font-size: 0.7rem;
        }
        
        .schedule-row-fb {
            display: grid;
            grid-template-columns: 40px 1fr 1fr;
            border-bottom: 1px solid #eee;
        }
        
        .schedule-row-fb:last-child {
            border-bottom: none;
        }
        
        .schedule-row-fb.header-row {
            background: linear-gradient(135deg, #5a2d82 0%, #6b3590 100%);
            color: white;
            font-weight: 700;
            font-size: 0.65rem;
        }
        
        .schedule-row-fb .time-col {
            background: #5a2d82;
            color: white;
            font-weight: 700;
            font-size: 0.65rem;
            padding: 5px 4px;
            text-align: center;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        
        .schedule-row-fb.header-row .time-col {
            background: transparent;
        }
        
        .schedule-row-fb .park-col,
        .schedule-row-fb .parade-col {
            padding: 5px 6px;
            border-left: 1px solid #eee;
        }
        
        .schedule-row-fb.header-row .park-col,
        .schedule-row-fb.header-row .parade-col {
            padding: 6px;
            border-left: 1px solid rgba(255,255,255,0.2);
        }
        
        .schedule-row-fb .park-col strong,
        .schedule-row-fb .parade-col strong {
            color: #5a2d82;
            font-weight: 700;
            font-size: 0.68rem;
            display: block;
        }
        
        .schedule-row-fb .sub {
            color: #333;
            font-size: 0.6rem;
            font-weight: 600;
        }
        
        .schedule-row-fb.highlight {
            background: linear-gradient(90deg, rgba(255, 215, 0, 0.25) 0%, rgba(255, 215, 0, 0.1) 100%);
        }
        
        .schedule-row-fb.reunite {
            background: linear-gradient(90deg, rgba(46, 204, 64, 0.15) 0%, rgba(46, 204, 64, 0.05) 100%);
        }
        
        .schedule-row-fb .park-col.empty,
        .schedule-row-fb .parade-col.empty {
            background: #fafafa;
        }
        
        .schedule-row-fb .lineup-time {
            color: #5a2d82;
            font-size: 0.6rem;
            font-weight: 700;
            display: block;
            margin-top: 2px;
        }
        
        .schedule-row-fb .parade-return {
            color: #5a2d82;
            font-weight: 700;
        }
        
        /* Map Section */
        .map-section {
            flex: 0.7;
            background: white;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
        }
        
        .map-header {
            background: linear-gradient(135deg, #2ECC40 0%, #27ae60 100%);
            color: white;
            padding: 8px 12px;
            font-size: 0.85rem;
            font-weight: 700;
        }
        
        .map-header span {
            margin-right: 6px;
        }
        
        .map-content {
            padding: 8px;
        }
        
        .map-content img {
            width: 100%;
            height: 120px;
            object-fit: cover;
            border-radius: 4px;
        }
        
        .route-steps-fb {
            padding: 8px;
            background: #f5f5f5;
            font-size: 0.6rem;
        }
        
        .route-steps-fb .route-label {
            font-weight: 700;
            color: #5a2d82;
            margin-bottom: 3px;
        }
        
        .route-steps-fb .route-step {
            margin: 1px 0;
            color: #333;
            font-weight: 600;
        }
        
        /* Bottom Section */
        .content-bottom {
            background: white;
            border-top: 2px solid #5a2d82;
        }
        
        /* Vendors + Info Row */
        .info-row {
            display: flex;
            padding: 8px 15px;
            gap: 20px;
            align-items: center;
            border-bottom: 1px solid #eee;
        }
        
        .vendors-info {
            flex: 1;
        }
        
        .vendors-label {
            font-size: 0.65rem;
            color: #666;
            font-style: italic;
        }
        
        .vendors-names {
            font-size: 0.8rem;
            color: #5a2d82;
            font-weight: 700;
        }
        
        .vendors-names .sep {
            color: #FFD700;
            margin: 0 8px;
        }
        
        .event-info {
            display: flex;
            gap: 15px;
            font-size: 0.75rem;
            color: #333;
            font-weight: 600;
        }
        
        .event-info span {
            color: #FFD700;
        }
        
        /* Dark Strip */
        .dark-strip {
            background: #2d1b4e;
            padding: 8px 15px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        
        .tagline {
            color: white;
            font-size: 0.8rem;
        }
        
        .tagline span {
            color: #FFD700;
            margin: 0 8px;
        }
        
        .website {
            color: #FFD700;
            font-weight: 700;
            font-size: 1rem;
        }
        
        /* Size guide */
        .size-guide {
            position: fixed;
            top: 10px;
            right: 10px;
            background: rgba(0,0,0,0.8);
            color: white;
            padding: 15px;
            border-radius: 8px;
            font-family: system-ui;
            z-index: 1000;
            font-size: 12px;
        }
    </style>
</head>
<body>

<div class="size-guide">
    <strong>📐 FB Event Cover</strong><br>
    Size: 1200 × 628 px<br>
    Hide before screenshot
</div>

<?php
$event_date = get_theme_mod('nolaholi_event_date', 'March 8, 2026');
$event_year = $event_date ? date('Y', strtotime($event_date)) : date('Y');
$presenting_sponsor = nolaholi_get_first_event_sponsor();
$sponsor_name = $presenting_sponsor ? $presenting_sponsor['name'] : '';
?>

<div class="fb-event-banner">
    <!-- Left: Hero -->
    <div class="banner-hero">
        <div class="hero-content">
            <?php if ($sponsor_name) : ?>
            <p class="presented-by">Presented by</p>
            <h2 class="sponsor-name"><?php echo esc_html($sponsor_name); ?></h2>
            <?php endif; ?>
            <h1 class="festival-title">NOLA Holi<br>Festival <?php echo esc_html($event_year); ?></h1>
            <p class="event-date-location"><?php echo esc_html($event_date); ?><br>@ Washington Square Park</p>
        </div>
    </div>
    
    <!-- Right: Content -->
    <div class="banner-content">
        <!-- Top: Schedule + Map -->
        <div class="content-top">
            <!-- Schedule -->
            <div class="schedule-section">
                <div class="schedule-header"><span>🗓</span> Schedule</div>
                <div class="dual-schedule-fb">
                    <div class="schedule-row-fb header-row">
                        <div class="time-col"></div>
                        <div class="park-col">🏞️ At the Park</div>
                        <div class="parade-col">🎭 Parade</div>
                    </div>
                    <div class="schedule-row-fb">
                        <div class="time-col">10:00</div>
                        <div class="park-col"><strong>🎧 DJ Starts Spinning</strong><span class="sub">Dance with colors</span></div>
                        <div class="parade-col"><strong>&nbsp;</strong><span class="sub">Load up colors, head to Royal & Touro</span></div>
                    </div>
                    <div class="schedule-row-fb">
                        <div class="time-col">11:00</div>
                        <div class="park-col"><strong>🎵 DJ Keeps Spinning</strong><span class="sub">Stay & splash colors</span></div>
                        <div class="parade-col"><strong>🎧 Parade DJ Cranks Up</strong><span class="sub">Pre-parade party</span><span class="lineup-time">11:45 Parade Lineup</span></div>
                    </div>
                    <div class="schedule-row-fb highlight">
                        <div class="time-col">12:00</div>
                        <div class="park-col"><strong>🔊 DJ Jams it Up</strong><span class="sub">Party continues</span></div>
                        <div class="parade-col"><strong>🎉 Parade Starts!</strong><span class="sub">Color throw on route!</span></div>
                    </div>
                    <div class="schedule-row-fb reunite">
                        <div class="time-col">1:00</div>
                        <div class="park-col"><strong>🎊 Everyone Reunites!</strong><span class="sub">Cultural Performances</span></div>
                        <div class="parade-col"><strong class="parade-return">Parade Returns</strong></div>
                    </div>
                    <div class="schedule-row-fb">
                        <div class="time-col">2:30</div>
                        <div class="park-col"><strong>💃 DJ Cranks It Up</strong><span class="sub">Dance your heart out</span></div>
                        <div class="parade-col empty"></div>
                    </div>
                    <div class="schedule-row-fb">
                        <div class="time-col">5:00</div>
                        <div class="park-col"><strong>🎨 See You Next Year!</strong></div>
                        <div class="parade-col empty"></div>
                    </div>
                </div>
            </div>
            
            <!-- Map -->
            <div class="map-section">
                <div class="map-header"><span>🗺️</span> Parade Map</div>
                <div class="map-content">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/2026-parade-route.png" alt="Parade Route">
                </div>
                <div class="route-steps-fb">
                    <p class="route-label">Route:</p>
                    <p class="route-step">📍 Start at Royal & Touro</p>
                    <p class="route-step">↓ to Esplanade</p>
                    <p class="route-step">← Left on St Philip</p>
                    <p class="route-step">← Left on Chartres</p>
                    <p class="route-step">⬤ End at Kerlerec</p>
                </div>
            </div>
        </div>
        
        <!-- Bottom: Info -->
        <div class="content-bottom">
            <div class="info-row">
                <div class="vendors-info">
                    <span class="vendors-label">Authentic Indian Cuisine by</span>
                    <div class="vendors-names">
                        Indian Delight<span class="sep">•</span>Aroma Indian Cuisine<span class="sep">•</span>Destination India
                    </div>
                </div>
                <div class="event-info">
                    <div>🎟️ Free Entrance</div>
                    <div>🎨 Colors Available</div>
                    <div>👨‍👩‍👧‍👦 Family Friendly</div>
                </div>
            </div>
            <div class="dark-strip">
                <div class="tagline">Free Entrance <span>•</span> Family Friendly <span>•</span> All Are Welcome</div>
                <div class="website">Visit: NOLAHoli.org</div>
            </div>
        </div>
    </div>
</div>

<?php wp_footer(); ?>
</body>
</html>
