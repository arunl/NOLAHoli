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
    // Display popup news carousel if active
    $popup_news_items = nolaholi_get_active_popup_news();
    
    // Check if user has dismissed the carousel (use a single cookie for all items)
    $carousel_dismissed = isset($_COOKIE['nolaholi_news_carousel_dismissed']);
    
    if ($popup_news_items && !$carousel_dismissed) :
        $carousel_id = 'news-carousel-' . time();
        $item_count = count($popup_news_items);
    ?>
        <div class="news-popup-carousel" id="<?php echo esc_attr($carousel_id); ?>" style="background: linear-gradient(135deg, var(--mardi-gras-purple) 0%, var(--mardi-gras-gold) 100%); color: white; padding: 15px 0; position: relative; z-index: 1001; overflow: hidden;">
            <div class="container" style="position: relative;">
                
                <!-- Carousel Slides -->
                <div class="carousel-slides" style="position: relative;">
                    <?php foreach ($popup_news_items as $index => $item) : ?>
                        <div class="carousel-slide" data-slide="<?php echo $index; ?>" style="display: <?php echo $index === 0 ? 'flex' : 'none'; ?>; align-items: center; justify-content: space-between; gap: 20px; flex-wrap: wrap; transition: opacity 0.5s ease;">
                            
                            <div style="flex: 1; min-width: 250px;">
                                <div style="display: flex; align-items: center; gap: 15px;">
                                    
                                    <!-- Thumbnail -->
                                    <?php if (!empty($item['thumbnail'])) : ?>
                                        <a href="<?php echo esc_url($item['url']); ?>" style="flex-shrink: 0;">
                                            <img src="<?php echo esc_url($item['thumbnail']); ?>" alt="<?php echo esc_attr($item['title']); ?>" style="width: 80px; height: 80px; object-fit: cover; border-radius: 8px; border: 2px solid rgba(255,255,255,0.3);">
                                        </a>
                                    <?php else : ?>
                                        <span style="font-size: 2.5rem; line-height: 1; flex-shrink: 0;">📰</span>
                                    <?php endif; ?>
                                    
                                    <!-- Content -->
                                    <div style="flex: 1; min-width: 200px;">
                                        <div style="font-size: 0.75rem; text-transform: uppercase; letter-spacing: 1px; opacity: 0.9; margin-bottom: 3px;">
                                            Latest News <?php if ($item_count > 1) : ?>(<?php echo $index + 1; ?>/<?php echo $item_count; ?>)<?php endif; ?>
                                        </div>
                                        <div style="font-weight: 600; font-size: 1.1rem; margin-bottom: 5px;">
                                            <a href="<?php echo esc_url($item['url']); ?>" style="color: white; text-decoration: none; transition: opacity 0.3s ease;">
                                                <?php echo esc_html($item['title']); ?>
                                            </a>
                                        </div>
                                        <?php if (!empty($item['short_description'])) : ?>
                                            <div style="font-size: 0.9rem; opacity: 0.95; line-height: 1.4;">
                                                <?php echo esc_html(wp_trim_words($item['short_description'], 12)); ?>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Actions -->
                            <div style="display: flex; align-items: center; gap: 15px;">
                                <a href="<?php echo esc_url($item['url']); ?>" class="btn carousel-read-more" style="background: white; color: var(--mardi-gras-purple); padding: 10px 20px; border-radius: 5px; text-decoration: none; font-weight: 600; white-space: nowrap; transition: transform 0.3s ease;">
                                    Read More →
                                </a>
                                <?php if ($index === 0) : // Only show close on first slide ?>
                                    <button onclick="dismissNewsCarousel()" style="background: none; border: none; color: white; font-size: 1.5rem; cursor: pointer; padding: 5px 10px; opacity: 0.8; transition: opacity 0.3s ease;" aria-label="Close" title="Close">
                                        ×
                                    </button>
                                <?php endif; ?>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
                
                <!-- Carousel Navigation Dots (only show if more than 1 item) -->
                <?php if ($item_count > 1) : ?>
                    <div class="carousel-dots" style="display: flex; justify-content: center; gap: 8px; margin-top: 12px;">
                        <?php for ($i = 0; $i < $item_count; $i++) : ?>
                            <button class="carousel-dot" data-slide="<?php echo $i; ?>" onclick="goToSlide(<?php echo $i; ?>)" style="width: 10px; height: 10px; border-radius: 50%; border: 2px solid white; background: <?php echo $i === 0 ? 'white' : 'transparent'; ?>; cursor: pointer; transition: all 0.3s ease; padding: 0;" aria-label="Go to slide <?php echo $i + 1; ?>">
                            </button>
                        <?php endfor; ?>
                    </div>
                <?php endif; ?>
                
            </div>
        </div>
        
        <script>
        (function() {
            var currentSlide = 0;
            var totalSlides = <?php echo $item_count; ?>;
            var autoRotateInterval;
            var autoRotateDelay = 5000; // 5 seconds
            
            function showSlide(index) {
                // Hide all slides
                var slides = document.querySelectorAll('.carousel-slide');
                slides.forEach(function(slide) {
                    slide.style.display = 'none';
                });
                
                // Show current slide
                if (slides[index]) {
                    slides[index].style.display = 'flex';
                }
                
                // Update dots
                var dots = document.querySelectorAll('.carousel-dot');
                dots.forEach(function(dot, i) {
                    dot.style.background = i === index ? 'white' : 'transparent';
                });
                
                currentSlide = index;
            }
            
            function nextSlide() {
                var next = (currentSlide + 1) % totalSlides;
                showSlide(next);
            }
            
            function prevSlide() {
                var prev = (currentSlide - 1 + totalSlides) % totalSlides;
                showSlide(prev);
            }
            
            window.goToSlide = function(index) {
                showSlide(index);
                // Reset auto-rotate timer when manually navigating
                if (totalSlides > 1) {
                    clearInterval(autoRotateInterval);
                    autoRotateInterval = setInterval(nextSlide, autoRotateDelay);
                }
            };
            
            // Start auto-rotation if more than one slide
            if (totalSlides > 1) {
                autoRotateInterval = setInterval(nextSlide, autoRotateDelay);
                
                // Pause on hover
                var carousel = document.getElementById('<?php echo esc_js($carousel_id); ?>');
                if (carousel) {
                    carousel.addEventListener('mouseenter', function() {
                        clearInterval(autoRotateInterval);
                    });
                    
                    carousel.addEventListener('mouseleave', function() {
                        autoRotateInterval = setInterval(nextSlide, autoRotateDelay);
                    });
                }
            }
            
            window.dismissNewsCarousel = function() {
                // Set cookie to remember dismissal for 7 days
                var expiryDate = new Date();
                expiryDate.setDate(expiryDate.getDate() + 7);
                document.cookie = 'nolaholi_news_carousel_dismissed=1; expires=' + expiryDate.toUTCString() + '; path=/';
                
                // Stop auto-rotation
                clearInterval(autoRotateInterval);
                
                // Hide the carousel with animation
                var carousel = document.getElementById('<?php echo esc_js($carousel_id); ?>');
                if (carousel) {
                    carousel.style.transition = 'opacity 0.3s ease, max-height 0.3s ease';
                    carousel.style.opacity = '0';
                    carousel.style.maxHeight = '0';
                    carousel.style.padding = '0';
                    carousel.style.overflow = 'hidden';
                    
                    setTimeout(function() {
                        carousel.style.display = 'none';
                    }, 300);
                }
            };
        })();
        </script>
        
        <style>
        .news-popup-carousel a:hover {
            opacity: 0.9;
        }
        
        .carousel-read-more:hover {
            transform: scale(1.05);
        }
        
        .carousel-dot:hover {
            transform: scale(1.3);
        }
        
        @media (max-width: 768px) {
            .carousel-slide {
                flex-direction: column !important;
                text-align: center;
            }
            
            .carousel-slide > div:first-child {
                width: 100%;
            }
            
            .carousel-slide > div:first-child > div {
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

