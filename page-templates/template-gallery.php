<?php
/**
 * Template Name: Gallery
 * Template for the Photo/Video Gallery page with Google Photos API integration
 * 
 * @package NOLAHoli
 */

get_header();

// Get gallery settings
$gallery_style = get_theme_mod('nolaholi_gallery_style', 'grid');
$gallery_2026 = get_theme_mod('nolaholi_gallery_2026', '');
$gallery_2025 = get_theme_mod('nolaholi_gallery_2025', 'https://photos.app.goo.gl/A7k1H1NdwU7wUvjLA');
$gallery_2024 = get_theme_mod('nolaholi_gallery_2024', 'https://photos.google.com/share/AF1QipMXoU__flN42f4HOvc_3Ue8HkTyXWUEHWSLuJulorUazYVGVsRzijEKD6GjA48MGA/memory/AF1QipPlfUZfOStBcDVTINx3OhPsgfCN77FIL4qBkiLIfzo63FJca7L1jE2KRHHm492t_g?key=MHgwV0xhLU9tYzdhMmNfR2FNbTN0eDdCWE9nRkF3&pli=1');

// Initialize the Google Photos API handler
$google_photos = new NOLA_Holi_Google_Photos();

?>

<main id="primary" class="site-main">
    <!-- Hero Section -->
    <section class="hero-section" style="min-height: 400px; background: var(--gradient-festival);">
        <div class="hero-overlay"></div>
        <div class="hero-content">
            <h1 class="hero-title">Photo & Video Gallery</h1>
            <p class="hero-subtitle">Relive the Colors, Joy, and Magic</p>
        </div>
    </section>
    
    <!-- Intro Section -->
    <section class="content-section bg-white">
        <div class="container">
            <div style="max-width: 900px; margin: 0 auto; text-align: center;">
                <h2 class="section-title">Captured Moments</h2>
                <div class="section-divider"></div>
                
                <p style="font-size: 1.2rem; line-height: 2; color: var(--text-light); margin-bottom: 30px;">
                    Explore our collection of photos and videos from past NOLA Holi celebrations. Each image tells 
                    a story of joy, color, community, and the beautiful chaos that makes Holi unforgettable!
                </p>
            </div>
        </div>
    </section>
    
    <!-- Gallery Albums -->
    <section class="content-section bg-light">
        <div class="container">
            <!-- Controls Row -->
            <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 40px; flex-wrap: wrap; gap: 20px;">
                <!-- Year Tabs -->
                <div style="display: inline-flex; gap: 15px; background: var(--white); padding: 10px; border-radius: 50px; box-shadow: var(--shadow-sm); flex-wrap: wrap;">
                    <?php if ($gallery_2026) : ?>
                        <a href="#gallery-2026" class="gallery-year-tab active" data-year="2026">2026</a>
                    <?php endif; ?>
                    <?php if ($gallery_2025) : ?>
                        <a href="#gallery-2025" class="gallery-year-tab <?php echo !$gallery_2026 ? 'active' : ''; ?>" data-year="2025">2025</a>
                    <?php endif; ?>
                    <?php if ($gallery_2024) : ?>
                        <a href="#gallery-2024" class="gallery-year-tab <?php echo !$gallery_2026 && !$gallery_2025 ? 'active' : ''; ?>" data-year="2024">2024</a>
                    <?php endif; ?>
                </div>
                
                <!-- View Toggle -->
                <div class="view-toggle" style="display: inline-flex; gap: 10px; background: var(--white); padding: 8px; border-radius: 50px; box-shadow: var(--shadow-sm);">
                    <button class="view-btn active" data-view="grid" title="Grid View">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M3 3h8v8H3V3zm10 0h8v8h-8V3zM3 13h8v8H3v-8zm10 0h8v8h-8v-8z"/>
                        </svg>
                    </button>
                    <button class="view-btn" data-view="carousel" title="Carousel View">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M18 4l-4 4h3v12h2V8h3l-4-4zm-6 2H6v2h6V6zm-6 4v2h8v-2H6zm0 4v2h6v-2H6zm8-10v2h4V4h-4z"/>
                        </svg>
                    </button>
                </div>
            </div>
            
            <!-- 2026 Gallery -->
            <?php if ($gallery_2026) : 
                $photos_2026 = $google_photos->fetch_album_photos($gallery_2026);
            ?>
            <div id="gallery-2026" class="gallery-year-section">
                <h2 class="section-title text-center">NOLA Holi 2026</h2>
                <div class="section-divider"></div>
                
                <?php if ($photos_2026 && !empty($photos_2026)) : ?>
                    <div class="photo-gallery grid">
                        <?php foreach ($photos_2026 as $index => $media) : ?>
                            <div class="photo-item <?php echo $media['type'] === 'video' ? 'is-video' : ''; ?>" 
                                 data-index="<?php echo $index; ?>"
                                 data-type="<?php echo esc_attr($media['type']); ?>"
                                 data-video-url="<?php echo $media['type'] === 'video' && isset($media['video_url']) ? esc_url($media['video_url']) : ''; ?>">
                                <img src="<?php echo esc_url($media['thumbnail']); ?>" 
                                     alt="NOLA Holi 2026 <?php echo $media['type'] === 'video' ? 'Video' : 'Photo'; ?> <?php echo $index + 1; ?>"
                                     data-full="<?php echo esc_url($media['full']); ?>"
                                     data-original="<?php echo esc_url($media['original']); ?>"
                                     loading="lazy">
                                <div class="photo-overlay">
                                    <?php if ($media['type'] === 'video') : ?>
                                        <span class="view-icon">▶️</span>
                                    <?php else : ?>
                                        <span class="view-icon">🔍</span>
                                    <?php endif; ?>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php else : ?>
                    <div style="text-align: center; margin: 40px 0;">
                        <div style="background: var(--white); padding: 40px; border-radius: 15px; max-width: 700px; margin: 0 auto; box-shadow: var(--shadow-md);">
                            <div style="font-size: 3rem; margin-bottom: 20px;">📸</div>
                            <h3 style="color: var(--mardi-gras-purple); margin-bottom: 15px; font-size: 1.8rem;">
                                View Our 2026 Photo Album
                            </h3>
                            <p style="color: var(--text-light); line-height: 1.8; margin-bottom: 25px;">
                                Browse photos from NOLA Holi 2026 in our Google Photos album. 
                                Feel free to download and share your favorites!
                            </p>
                            <a href="<?php echo esc_url($gallery_2026); ?>" target="_blank" rel="noopener noreferrer" class="btn btn-primary">
                                Open 2026 Gallery
                            </a>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
            <?php endif; ?>
            
            <!-- 2025 Gallery -->
            <?php if ($gallery_2025) : 
                $photos_2025 = $google_photos->fetch_album_photos($gallery_2025);
            ?>
            <div id="gallery-2025" class="gallery-year-section <?php echo $gallery_2026 ? 'hidden' : ''; ?>">
                <h2 class="section-title text-center">NOLA Holi 2025</h2>
                <div class="section-divider"></div>
                
                <?php if ($photos_2025 && !empty($photos_2025)) : ?>
                    <div class="photo-gallery grid">
                        <?php foreach ($photos_2025 as $index => $media) : ?>
                            <div class="photo-item <?php echo $media['type'] === 'video' ? 'is-video' : ''; ?>" 
                                 data-index="<?php echo $index; ?>"
                                 data-type="<?php echo esc_attr($media['type']); ?>"
                                 data-video-url="<?php echo $media['type'] === 'video' && isset($media['video_url']) ? esc_url($media['video_url']) : ''; ?>">
                                <img src="<?php echo esc_url($media['thumbnail']); ?>" 
                                     alt="NOLA Holi 2025 <?php echo $media['type'] === 'video' ? 'Video' : 'Photo'; ?> <?php echo $index + 1; ?>"
                                     data-full="<?php echo esc_url($media['full']); ?>"
                                     data-original="<?php echo esc_url($media['original']); ?>"
                                     loading="lazy">
                                <div class="photo-overlay">
                                    <?php if ($media['type'] === 'video') : ?>
                                        <span class="view-icon">▶️</span>
                                    <?php else : ?>
                                        <span class="view-icon">🔍</span>
                                    <?php endif; ?>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php else : ?>
                    <div style="text-align: center; margin: 40px 0;">
                        <div style="background: var(--white); padding: 40px; border-radius: 15px; max-width: 700px; margin: 0 auto; box-shadow: var(--shadow-md);">
                            <div style="font-size: 3rem; margin-bottom: 20px;">📸</div>
                            <h3 style="color: var(--mardi-gras-purple); margin-bottom: 15px; font-size: 1.8rem;">
                                View Our 2025 Photo Album
                            </h3>
                            <p style="color: var(--text-light); line-height: 1.8; margin-bottom: 25px;">
                                Browse photos from NOLA Holi 2025 in our Google Photos album. 
                                Feel free to download and share your favorites!
                            </p>
                            <a href="<?php echo esc_url($gallery_2025); ?>" target="_blank" rel="noopener noreferrer" class="btn btn-primary">
                                Open 2025 Gallery
                            </a>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
            <?php endif; ?>
            
            <!-- 2024 Gallery -->
            <?php if ($gallery_2024) : 
                $photos_2024 = $google_photos->fetch_album_photos($gallery_2024);
            ?>
            <div id="gallery-2024" class="gallery-year-section <?php echo $gallery_2026 || $gallery_2025 ? 'hidden' : ''; ?>">
                <h2 class="section-title text-center">NOLA Holi 2024 - Where It All Began</h2>
                <div class="section-divider"></div>
                
                <?php if ($photos_2024 && !empty($photos_2024)) : ?>
                    <div class="photo-gallery grid">
                        <?php foreach ($photos_2024 as $index => $media) : ?>
                            <div class="photo-item <?php echo $media['type'] === 'video' ? 'is-video' : ''; ?>" 
                                 data-index="<?php echo $index; ?>"
                                 data-type="<?php echo esc_attr($media['type']); ?>"
                                 data-video-url="<?php echo $media['type'] === 'video' && isset($media['video_url']) ? esc_url($media['video_url']) : ''; ?>">
                                <img src="<?php echo esc_url($media['thumbnail']); ?>" 
                                     alt="NOLA Holi 2024 <?php echo $media['type'] === 'video' ? 'Video' : 'Photo'; ?> <?php echo $index + 1; ?>"
                                     data-full="<?php echo esc_url($media['full']); ?>"
                                     data-original="<?php echo esc_url($media['original']); ?>"
                                     loading="lazy">
                                <div class="photo-overlay">
                                    <?php if ($media['type'] === 'video') : ?>
                                        <span class="view-icon">▶️</span>
                                    <?php else : ?>
                                        <span class="view-icon">🔍</span>
                                    <?php endif; ?>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php else : ?>
                    <div style="text-align: center; margin: 40px 0;">
                        <div style="background: var(--white); padding: 40px; border-radius: 15px; max-width: 700px; margin: 0 auto; box-shadow: var(--shadow-md);">
                            <div style="font-size: 3rem; margin-bottom: 20px;">📸</div>
                            <h3 style="color: var(--mardi-gras-purple); margin-bottom: 15px; font-size: 1.8rem;">
                                View Our 2024 Photo Album
                            </h3>
                            <p style="color: var(--text-light); line-height: 1.8; margin-bottom: 25px;">
                                Browse photos from our inaugural NOLA Holi 2024 celebration in our Google Photos album. 
                                This is where the magic began!
                            </p>
                            <a href="<?php echo esc_url($gallery_2024); ?>" target="_blank" rel="noopener noreferrer" class="btn btn-primary">
                                Open 2024 Gallery
                            </a>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
            <?php endif; ?>
            
        </div>
    </section>
    
    <!-- Call to Action -->
    <section class="cta-section">
        <div class="cta-content">
            <h2 style="margin-bottom: 20px; font-size: 2.5rem; color: white;">Share Your Photos!</h2>
            <p style="font-size: 1.2rem; margin-bottom: 30px; color: white; opacity: 0.95;">
                Captured great moments at NOLA Holi? We'd love to see them!<br>
                Share your photos with us on social media using <strong>#NOLAHoli</strong>
            </p>
            <div class="cta-buttons">
                <?php 
                $facebook = get_theme_mod('nolaholi_facebook');
                $instagram = get_theme_mod('nolaholi_instagram');
                $twitter = get_theme_mod('nolaholi_twitter');
                ?>
                <?php if ($facebook) : ?>
                    <a href="<?php echo esc_url($facebook); ?>" target="_blank" rel="noopener noreferrer" class="btn btn-white">
                        Facebook
                    </a>
                <?php endif; ?>
                <?php if ($instagram) : ?>
                    <a href="<?php echo esc_url($instagram); ?>" target="_blank" rel="noopener noreferrer" class="btn btn-white">
                        Instagram
                    </a>
                <?php endif; ?>
                <?php if ($twitter) : ?>
                    <a href="<?php echo esc_url($twitter); ?>" target="_blank" rel="noopener noreferrer" class="btn btn-white">
                        Twitter
                    </a>
                <?php endif; ?>
            </div>
        </div>
    </section>
</main>

<!-- Lightbox Modal -->
<div id="photo-lightbox" class="photo-lightbox hidden">
    <div class="lightbox-overlay"></div>
    <div class="lightbox-content">
        <button class="lightbox-close" aria-label="Close lightbox">&times;</button>
        <button class="lightbox-prev" aria-label="Previous">‹</button>
        <button class="lightbox-next" aria-label="Next">›</button>
        <div class="lightbox-media-container">
            <img id="lightbox-image" src="" alt="" style="display: none;">
            <video id="lightbox-video" controls playsinline preload="metadata" style="display: none; max-width: 100%; max-height: 80vh; border-radius: 10px;">
                <source src="" type="video/mp4">
                Your browser does not support the video tag.
            </video>
        </div>
        <div class="lightbox-info">
            <span id="lightbox-counter"></span>
            <a id="lightbox-download" href="" download target="_blank" rel="noopener noreferrer" class="btn-small">
                Download Original
            </a>
        </div>
    </div>
</div>

<style>
/* Gallery Styles */
.gallery-year-tab {
    padding: 12px 30px;
    border-radius: 50px;
    color: var(--text-dark);
    font-weight: 600;
    text-decoration: none;
    transition: all 0.3s ease;
    cursor: pointer;
}

.gallery-year-tab:hover {
    background: var(--mardi-gras-green) !important;
    color: white !important;
}

.gallery-year-tab.active {
    background: var(--mardi-gras-purple) !important;
    color: white !important;
}

/* View Toggle Buttons */
.view-btn {
    padding: 10px 15px;
    background: transparent;
    border: none;
    color: var(--text-dark);
    cursor: pointer;
    border-radius: 50px;
    transition: all 0.3s ease;
    display: flex;
    align-items: center;
    justify-content: center;
}

.view-btn:hover {
    background: rgba(94, 43, 122, 0.1);
}

.view-btn.active {
    background: var(--mardi-gras-purple);
    color: white;
}

.view-btn svg {
    width: 24px;
    height: 24px;
}

.gallery-year-section {
    animation: fadeIn 0.5s ease;
}

.gallery-year-section.hidden {
    display: none;
}

/* Grid View */
.photo-gallery.grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
    gap: 20px;
    margin: 40px 0;
}

/* Carousel View */
.photo-gallery.carousel {
    display: flex;
    overflow-x: auto;
    scroll-snap-type: x mandatory;
    gap: 20px;
    padding: 20px 0;
    scrollbar-width: thin;
    scrollbar-color: var(--mardi-gras-purple) #f0f0f0;
}

.photo-gallery.carousel::-webkit-scrollbar {
    height: 12px;
}

.photo-gallery.carousel::-webkit-scrollbar-track {
    background: #f0f0f0;
    border-radius: 10px;
}

.photo-gallery.carousel::-webkit-scrollbar-thumb {
    background: var(--mardi-gras-purple);
    border-radius: 10px;
}

.photo-gallery.carousel::-webkit-scrollbar-thumb:hover {
    background: var(--mardi-gras-green);
}

.photo-gallery.carousel .photo-item {
    flex: 0 0 350px;
    scroll-snap-align: start;
}

.photo-item {
    position: relative;
    aspect-ratio: 1;
    border-radius: 15px;
    overflow: hidden;
    cursor: pointer;
    box-shadow: var(--shadow-md);
    transition: transform 0.3s ease;
}

.photo-item:hover {
    transform: scale(1.05);
}

.photo-item.is-video::after {
    content: '▶';
    position: absolute;
    top: 10px;
    right: 10px;
    background: rgba(0, 0, 0, 0.7);
    color: white;
    width: 40px;
    height: 40px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.2rem;
    z-index: 2;
}

.photo-item img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    display: block;
}

.photo-overlay {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: rgba(0, 0, 0, 0.5);
    display: flex;
    align-items: center;
    justify-content: center;
    opacity: 0;
    transition: opacity 0.3s ease;
}

.photo-item:hover .photo-overlay {
    opacity: 1;
}

.view-icon {
    font-size: 3rem;
}

/* Lightbox Styles */
.photo-lightbox {
    position: fixed;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    z-index: 10000;
    display: flex;
    align-items: center;
    justify-content: center;
}

.photo-lightbox.hidden {
    display: none;
}

.lightbox-overlay {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: rgba(0, 0, 0, 0.95);
}

.lightbox-content {
    position: relative;
    z-index: 10001;
    max-width: 95vw;
    max-height: 95vh;
    display: flex;
    flex-direction: column;
    align-items: center;
}

.lightbox-media-container {
    max-width: 90vw;
    max-height: 80vh;
    display: flex;
    align-items: center;
    justify-content: center;
}

.lightbox-media-container img,
.lightbox-media-container video {
    max-width: 100%;
    max-height: 80vh;
    object-fit: contain;
    border-radius: 10px;
}

.lightbox-close,
.lightbox-prev,
.lightbox-next {
    position: absolute;
    background: rgba(0, 0, 0, 0.7);
    border: 3px solid rgba(255, 255, 255, 0.9);
    color: white;
    font-size: 3rem;
    cursor: pointer;
    padding: 10px 20px;
    border-radius: 50%;
    transition: all 0.3s ease;
    z-index: 10002;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.5);
}

.lightbox-close:hover,
.lightbox-prev:hover,
.lightbox-next:hover {
    background: var(--mardi-gras-purple);
    border-color: var(--mardi-gras-gold);
    transform: scale(1.1);
    box-shadow: 0 6px 20px rgba(0, 0, 0, 0.7);
}

.lightbox-close {
    top: 20px;
    right: 20px;
}

.lightbox-prev {
    left: 20px;
    top: 50%;
    transform: translateY(-50%);
}

.lightbox-prev:hover {
    transform: translateY(-50%) scale(1.1);
}

.lightbox-next {
    right: 20px;
    top: 50%;
    transform: translateY(-50%);
}

.lightbox-next:hover {
    transform: translateY(-50%) scale(1.1);
}

.lightbox-info {
    margin-top: 20px;
    display: flex;
    gap: 20px;
    align-items: center;
    color: white;
    font-size: 1.1rem;
}

.btn-small {
    padding: 8px 20px;
    background: var(--mardi-gras-purple);
    color: white;
    border-radius: 25px;
    text-decoration: none;
    font-weight: 600;
    transition: background 0.3s ease;
}

.btn-small:hover {
    background: var(--mardi-gras-green);
}

@keyframes fadeIn {
    from {
        opacity: 0;
    }
    to {
        opacity: 1;
    }
}

@media (max-width: 768px) {
    .photo-gallery {
        grid-template-columns: repeat(auto-fill, minmax(150px, 1fr));
        gap: 10px;
    }
    
    .lightbox-close,
    .lightbox-prev,
    .lightbox-next {
        font-size: 2rem;
        padding: 8px 15px;
        background: rgba(0, 0, 0, 0.8);
        border-width: 2px;
    }
    
    .lightbox-prev {
        left: 10px;
    }
    
    .lightbox-next {
        right: 10px;
    }
    
    .lightbox-close {
        top: 10px;
        right: 10px;
    }
}
</style>

<?php
get_footer();
