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
    echo '</ul>';
    echo '</li>';
    echo '<li><a href="' . esc_url(home_url('/organizers/')) . '">Organizers</a></li>';
    echo '<li><a href="' . esc_url(home_url('/contact/')) . '">Contact</a></li>';
    echo '</ul>';
}
?>

