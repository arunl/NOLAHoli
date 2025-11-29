<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<header class="site-header">
    <?php
    $event_date = get_theme_mod('nolaholi_event_date', 'March 7, 2026');
    $event_time = get_theme_mod('nolaholi_event_time', 'TBD');
    ?>
    
    <?php
    // Display popup news banner if active
    $popup_news = nolaholi_get_active_popup_news();
    if ($popup_news && !isset($_COOKIE['nolaholi_news_dismissed_' . $popup_news['id']])) :
    ?>
        <div class="news-popup-banner" id="news-popup-<?php echo esc_attr($popup_news['id']); ?>" style="background: linear-gradient(135deg, var(--mardi-gras-purple) 0%, var(--mardi-gras-gold) 100%); color: white; padding: 15px 0; position: relative; z-index: 1001;">
            <div class="container" style="display: flex; align-items: center; justify-content: space-between; gap: 20px; flex-wrap: wrap;">
                <div style="flex: 1; min-width: 250px;">
                    <div style="display: flex; align-items: center; gap: 15px;">
                        <span style="font-size: 2rem; line-height: 1;">📰</span>
                        <div>
                            <div style="font-size: 0.75rem; text-transform: uppercase; letter-spacing: 1px; opacity: 0.9; margin-bottom: 3px;">Latest News</div>
                            <div style="font-weight: 600; font-size: 1.1rem;">
                                <a href="<?php echo esc_url($popup_news['url']); ?>" style="color: white; text-decoration: none; transition: opacity 0.3s ease;">
                                    <?php echo esc_html($popup_news['title']); ?>
                                </a>
                            </div>
                            <?php if (!empty($popup_news['short_description'])) : ?>
                                <div style="font-size: 0.9rem; opacity: 0.95; margin-top: 5px; line-height: 1.4;">
                                    <?php echo esc_html(wp_trim_words($popup_news['short_description'], 15)); ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <div style="display: flex; align-items: center; gap: 15px;">
                    <a href="<?php echo esc_url($popup_news['url']); ?>" class="btn" style="background: white; color: var(--mardi-gras-purple); padding: 10px 20px; border-radius: 5px; text-decoration: none; font-weight: 600; white-space: nowrap; transition: transform 0.3s ease;">
                        Read More →
                    </a>
                    <button onclick="dismissNewsPopup(<?php echo esc_js($popup_news['id']); ?>)" style="background: none; border: none; color: white; font-size: 1.5rem; cursor: pointer; padding: 5px 10px; opacity: 0.8; transition: opacity 0.3s ease;" aria-label="Close" title="Close">
                        ×
                    </button>
                </div>
            </div>
        </div>
        
        <script>
        function dismissNewsPopup(newsId) {
            // Set cookie to remember dismissal for 7 days
            var expiryDate = new Date();
            expiryDate.setDate(expiryDate.getDate() + 7);
            document.cookie = 'nolaholi_news_dismissed_' + newsId + '=1; expires=' + expiryDate.toUTCString() + '; path=/';
            
            // Hide the banner with animation
            var banner = document.getElementById('news-popup-' + newsId);
            if (banner) {
                banner.style.transition = 'opacity 0.3s ease, max-height 0.3s ease';
                banner.style.opacity = '0';
                banner.style.maxHeight = '0';
                banner.style.padding = '0';
                banner.style.overflow = 'hidden';
                
                setTimeout(function() {
                    banner.style.display = 'none';
                }, 300);
            }
        }
        </script>
        
        <style>
        .news-popup-banner a:hover {
            opacity: 0.9;
        }
        
        .news-popup-banner .btn:hover {
            transform: scale(1.05);
        }
        
        .news-popup-banner button:hover {
            opacity: 1;
        }
        
        @media (max-width: 768px) {
            .news-popup-banner .container {
                flex-direction: column;
                text-align: center;
            }
            
            .news-popup-banner .container > div:first-child {
                justify-content: center;
            }
        }
        </style>
    <?php endif; ?>
    
    <div class="header-top">
        <p>🎨 <?php echo esc_html($event_date); ?> | <?php echo esc_html($event_time); ?> | Washington Square Park, NOLA 🎉</p>
    </div>
    
    <div class="header-main">
        <div class="container">
            <div class="header-content">
                <div class="site-branding">
                    <?php if (has_custom_logo()) : ?>
                        <div class="site-logo">
                            <?php the_custom_logo(); ?>
                        </div>
                    <?php endif; ?>
                    <div class="site-identity">
                        <h1 class="site-title">
                            <a href="<?php echo esc_url(home_url('/')); ?>" rel="home">
                                <?php bloginfo('name'); ?>
                            </a>
                        </h1>
                        <?php
                        $description = get_bloginfo('description', 'display');
                        if ($description || is_customize_preview()) :
                        ?>
                            <p class="site-description"><?php echo $description; ?></p>
                        <?php endif; ?>
                    </div>
                </div>
                
                <nav class="main-navigation">
                    <button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false">
                        ☰
                    </button>
                    <?php
                    wp_nav_menu(array(
                        'theme_location' => 'primary',
                        'menu_id'        => 'primary-menu',
                        'menu_class'     => 'nav-menu',
                        'container'      => false,
                        'fallback_cb'    => 'nolaholi_default_menu',
                    ));
                    ?>
                </nav>

                <?php
                // Get first event sponsor for header display
                $event_sponsor = nolaholi_get_first_event_sponsor();
                if ($event_sponsor) :
                ?>
                    <div class="header-presenter">
                        <div class="presented-by-text">Presented by</div>
                        <?php if ($event_sponsor['website']) : ?>
                            <a href="<?php echo esc_url($event_sponsor['website']); ?>" target="_blank" rel="noopener noreferrer" class="presenter-mark-link">
                                <?php if ($event_sponsor['logo']) : ?>
                                    <img src="<?php echo esc_url($event_sponsor['logo']); ?>" alt="<?php echo esc_attr($event_sponsor['name']); ?>" class="presenter-mark">
                                <?php else : ?>
                                    <div class="presenter-name"><?php echo esc_html($event_sponsor['name']); ?></div>
                                <?php endif; ?>
                            </a>
                        <?php else : ?>
                            <?php if ($event_sponsor['logo']) : ?>
                                <img src="<?php echo esc_url($event_sponsor['logo']); ?>" alt="<?php echo esc_attr($event_sponsor['name']); ?>" class="presenter-mark">
                            <?php else : ?>
                                <div class="presenter-name"><?php echo esc_html($event_sponsor['name']); ?></div>
                            <?php endif; ?>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</header>

<?php
/**
 * Default menu fallback if no menu is assigned
 */
function nolaholi_default_menu() {
    echo '<ul class="nav-menu">';
    echo '<li class="menu-item-home"><a href="' . esc_url(home_url('/')) . '" title="Home"><span class="home-icon">⌂</span></a></li>';
    echo '<li><a href="' . esc_url(home_url('/about-holi/')) . '">About Holi</a></li>';
    echo '<li><a href="' . esc_url(home_url('/about-nola-holi/')) . '">Our Story</a></li>';
    echo '<li class="menu-item-has-children">';
    echo '<a href="javascript:void(0)">Celebrations <span class="submenu-icon">▼</span></a>';
    echo '<ul class="sub-menu">';
    echo '<li><a href="' . esc_url(home_url('/parade/')) . '">Parade</a></li>';
    echo '<li><a href="' . esc_url(home_url('/festival/')) . '">Festival</a></li>';
    echo '<li><a href="' . esc_url(home_url('/gallery/')) . '">Gallery</a></li>';
    echo '<li class="menu-item-has-children">';
    echo '<a href="javascript:void(0)">Supporters <span class="submenu-icon">▼</span></a>';
    echo '<ul class="sub-menu">';
    echo '<li><a href="' . esc_url(home_url('/sponsors/')) . '">Sponsors</a></li>';
    echo '<li><a href="' . esc_url(home_url('/vendors/')) . '">Vendors</a></li>';
    echo '<li><a href="' . esc_url(home_url('/volunteers/')) . '">Volunteers</a></li>';
    echo '<li><a href="' . esc_url(home_url('/organizers/')) . '">Organizers</a></li>';
    echo '</ul>';
    echo '</li>';
    echo '<li><a href="' . esc_url(home_url('/contact/')) . '">Contact</a></li>';
    echo '</ul>';
}
?>

