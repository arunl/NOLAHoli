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
        
        /* Facebook Event Banner Container - 1200x628 aspect ratio */
        .fb-event-banner {
            width: 1200px;
            height: 628px;
            background: linear-gradient(135deg, 
                #FF6B6B 0%, 
                #FF8E53 15%, 
                #FFCD56 30%, 
                #4ECDC4 50%, 
                #45B7D1 65%, 
                #96C93D 80%, 
                #DDA0DD 95%);
            position: relative;
            overflow: hidden;
            display: flex;
        }
        
        /* Aurora overlay effect */
        .fb-event-banner::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: 
                radial-gradient(ellipse at 20% 20%, rgba(255, 107, 107, 0.4) 0%, transparent 50%),
                radial-gradient(ellipse at 80% 30%, rgba(78, 205, 196, 0.4) 0%, transparent 50%),
                radial-gradient(ellipse at 40% 80%, rgba(150, 201, 61, 0.4) 0%, transparent 50%),
                radial-gradient(ellipse at 70% 70%, rgba(221, 160, 221, 0.5) 0%, transparent 50%);
            pointer-events: none;
        }
        
        /* Left side - Event Info */
        .banner-left {
            flex: 1.2;
            display: flex;
            flex-direction: column;
            justify-content: center;
            padding: 40px 50px;
            position: relative;
            z-index: 1;
        }
        
        .presented-by {
            font-size: 1rem;
            color: rgba(255,255,255,0.9);
            text-transform: uppercase;
            letter-spacing: 2px;
            margin-bottom: 5px;
        }
        
        .sponsor-name {
            font-size: 1.8rem;
            color: #FFD700;
            font-weight: 700;
            margin-bottom: 15px;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.3);
        }
        
        .festival-title {
            font-family: 'Dancing Script', 'Brush Script MT', cursive;
            font-size: 4.5rem;
            color: white;
            text-shadow: 3px 3px 6px rgba(0,0,0,0.4);
            line-height: 1.1;
            margin-bottom: 20px;
        }
        
        .event-date-location {
            font-size: 1.6rem;
            color: #FFD700;
            font-weight: 700;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.3);
        }
        
        /* Right side - Schedule Summary */
        .banner-right {
            flex: 1;
            display: flex;
            flex-direction: column;
            justify-content: center;
            padding: 30px 40px 30px 20px;
            position: relative;
            z-index: 1;
        }
        
        .schedule-box {
            background: rgba(255,255,255,0.95);
            border-radius: 15px;
            padding: 20px 25px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.2);
        }
        
        .schedule-title {
            font-size: 1.3rem;
            color: #5a2d82;
            font-weight: 700;
            margin-bottom: 15px;
            text-align: center;
            border-bottom: 2px solid #5a2d82;
            padding-bottom: 10px;
        }
        
        .schedule-item {
            display: flex;
            align-items: flex-start;
            margin-bottom: 10px;
            font-size: 0.95rem;
        }
        
        .schedule-item:last-child {
            margin-bottom: 0;
        }
        
        .schedule-time {
            min-width: 55px;
            font-weight: 700;
            color: #5a2d82;
        }
        
        .schedule-event {
            color: #333;
            font-weight: 600;
        }
        
        .schedule-highlight {
            background: linear-gradient(90deg, rgba(255, 215, 0, 0.3) 0%, rgba(255, 215, 0, 0.1) 100%);
            margin: 0 -25px;
            padding: 8px 25px;
        }
        
        /* Bottom tagline */
        .bottom-strip {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            background: rgba(90, 45, 130, 0.9);
            padding: 10px 30px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            z-index: 2;
        }
        
        .tagline {
            color: white;
            font-size: 1rem;
        }
        
        .tagline span {
            margin: 0 10px;
            color: #FFD700;
        }
        
        .website {
            color: #FFD700;
            font-weight: 700;
            font-size: 1.2rem;
        }
        
        /* Size guide overlay */
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
        }
        
        .size-guide p {
            margin: 5px 0;
            font-size: 12px;
        }
    </style>
</head>
<body>

<!-- Size Guide (hide before screenshot) -->
<div class="size-guide">
    <strong>📐 FB Event Cover</strong>
    <p>Size: 1200 × 628 px</p>
    <p>Hide this before screenshot</p>
</div>

<?php
// Get event info
$event_date = get_theme_mod('nolaholi_event_date', 'March 8, 2026');
$event_year = $event_date ? date('Y', strtotime($event_date)) : date('Y');

// Get presenting sponsor
$presenting_sponsor = nolaholi_get_first_event_sponsor();
$sponsor_name = $presenting_sponsor ? $presenting_sponsor['name'] : '';
?>

<div class="fb-event-banner">
    <!-- Left Side: Event Info -->
    <div class="banner-left">
        <?php if ($sponsor_name) : ?>
        <p class="presented-by">Presented by</p>
        <h2 class="sponsor-name"><?php echo esc_html($sponsor_name); ?></h2>
        <?php endif; ?>
        <h1 class="festival-title">NOLA Holi<br>Festival <?php echo esc_html($event_year); ?></h1>
        <p class="event-date-location"><?php echo esc_html($event_date); ?><br>@ Washington Square Park</p>
    </div>
    
    <!-- Right Side: Schedule -->
    <div class="banner-right">
        <div class="schedule-box">
            <h3 class="schedule-title">🗓 Event Schedule</h3>
            <div class="schedule-item">
                <span class="schedule-time">10:00</span>
                <span class="schedule-event">🎧 DJ Starts • Dance with Colors</span>
            </div>
            <div class="schedule-item">
                <span class="schedule-time">11:00</span>
                <span class="schedule-event">🎵 Parade DJ at Royal & Touro</span>
            </div>
            <div class="schedule-item schedule-highlight">
                <span class="schedule-time">12:00</span>
                <span class="schedule-event">🎉 Parade Starts!</span>
            </div>
            <div class="schedule-item">
                <span class="schedule-time">1:00</span>
                <span class="schedule-event">🎊 Everyone Reunites</span>
            </div>
            <div class="schedule-item">
                <span class="schedule-time">2:30</span>
                <span class="schedule-event">💃 DJ Cranks It Up</span>
            </div>
            <div class="schedule-item">
                <span class="schedule-time">5:00</span>
                <span class="schedule-event">🎨 See You Next Year!</span>
            </div>
        </div>
    </div>
    
    <!-- Bottom Strip -->
    <div class="bottom-strip">
        <div class="tagline">
            Free Entrance <span>•</span> Family Friendly <span>•</span> All Are Welcome
        </div>
        <div class="website">NOLAHoli.org</div>
    </div>
</div>

<?php wp_footer(); ?>
</body>
</html>
