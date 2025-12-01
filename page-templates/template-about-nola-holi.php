<?php
/**
 * Template Name: About NOLA Holi
 * Template for the About NOLA Holi page (Our Story)
 * 
 * @package NOLAHoli
 */

get_header();
?>

<main id="primary" class="site-main">
    <!-- Hero Section -->
    <section class="hero-section" style="<?php echo nolaholi_get_hero_background_style('var(--gradient-festival)'); ?>">
        <div class="hero-overlay"></div>
        <div class="hero-content">
            <h1 class="hero-title">Our Story</h1>
            <p class="hero-subtitle">A Tribute of Love, A Celebration of Community</p>
        </div>
    </section>
    
    <!-- Michelle & Arun's Story -->
    <section class="content-section bg-white">
        <div class="container">
            <div style="max-width: 900px; margin: 0 auto; text-align: center;">
                <h2 class="section-title">In Loving Memory of Michelle Lakhotia</h2>
                <div class="section-divider"></div>
                
                <div style="margin: 40px 0;">
                    <p style="font-size: 1.2rem; line-height: 2; color: var(--text-light); margin-bottom: 30px;">
                        The NOLA Holi Festival was inspired by the vision of <strong style="color: var(--mardi-gras-purple);">
                        Arun and his late wife, Michelle Lakhotia</strong>, who dreamed of bringing the joy and vibrancy 
                        of Holi to the streets of New Orleans.
                    </p>
                    
                    <p style="font-size: 1.2rem; line-height: 2; color: var(--text-light); margin-bottom: 30px;">
                        Michelle was passionate about bridging cultures and creating spaces where diverse communities could 
                        come together in celebration. She envisioned a Holi festival that would blend the ancient Indian 
                        tradition with the unique spirit of New Orleans – a city already known for its love of festivals, 
                        music, and bringing people together.
                    </p>
                    
                    <p style="font-size: 1.2rem; line-height: 2; color: var(--text-light);">
                        Though Michelle passed away before seeing her dream come to life, Arun honored her vision by 
                        launching the inaugural NOLA Holi Festival in <strong style="color: var(--mardi-gras-green);">2024</strong>, 
                        dedicated to her memory. What began as a heartfelt tribute has blossomed into an annual tradition 
                        that brings together thousands of people to celebrate love, color, and community.
                    </p>
                </div>
                
                <div style="background: var(--off-white); padding: 40px; border-radius: 15px; margin-top: 60px;">
                    <p style="font-size: 1.3rem; font-style: italic; color: var(--mardi-gras-purple); margin: 0;">
                        "Michelle believed in the power of celebration to heal, unite, and inspire. Every year, 
                        as we throw colors in the air, we honor her spirit and the joy she wanted to share with this city."
                    </p>
                    <p style="margin-top: 20px; color: var(--text-light); font-weight: 600;">
                        – Arun Lakhotia, Founder
                    </p>
                </div>
            </div>
        </div>
    </section>
    
    <!-- Why New Orleans -->
    <section class="content-section bg-light">
        <div class="container">
            <h2 class="section-title text-center">Why New Orleans?</h2>
            <div class="section-divider"></div>
            
            <div class="feature-grid" style="margin-top: 40px;">
                <div class="feature-card">
                    <div class="feature-icon">🎭</div>
                    <h3 class="feature-title">City of Festivals</h3>
                    <p class="feature-description">
                        New Orleans is the festival capital of America. From Mardi Gras to Jazz Fest, this city knows 
                        how to celebrate. Holi fits perfectly into NOLA's cultural tapestry.
                    </p>
                </div>
                
                <div class="feature-card">
                    <div class="feature-icon">🌈</div>
                    <h3 class="feature-title">Cultural Diversity</h3>
                    <p class="feature-description">
                        NOLA has always been a melting pot of cultures. Holi adds another vibrant thread to the city's 
                        rich multicultural heritage, celebrating diversity through color.
                    </p>
                </div>
                
                <div class="feature-card">
                    <div class="feature-icon">💜</div>
                    <h3 class="feature-title">Perfect Timing</h3>
                    <p class="feature-description">
                        Held a few weeks after Mardi Gras, NOLA Holi extends the spirit of celebration and brings 
                        the community together again with Mardi Gras colors – purple, green, and gold!
                    </p>
                </div>
            </div>
        </div>
    </section>
    
    <!-- Our Growth -->
    <section class="content-section bg-white">
        <div class="container">
            <h2 class="section-title text-center">Our Journey</h2>
            <div class="section-divider"></div>
            
            <div style="max-width: 900px; margin: 40px auto 0;">
                <div style="display: grid; gap: 40px;">
                    <div style="display: flex; gap: 30px; align-items: start;">
                        <div style="min-width: 120px; text-align: center;">
                            <div style="font-size: 3rem; font-weight: 700; color: var(--mardi-gras-purple);">2024</div>
                        </div>
                        <div style="flex: 1;">
                            <h3 class="text-green" style="font-size: 1.5rem; margin-bottom: 10px;">The Beginning</h3>
                            <p style="color: var(--text-light); line-height: 1.8;">
                                The inaugural NOLA Holi Festival launched with a parade through the French Quarter and 
                                a festival at Washington Square Park. Hundreds gathered to honor Michelle's memory and 
                                celebrate the festival of colors for the first time in New Orleans.
                            </p>
                        </div>
                    </div>
                    
                    <div style="display: flex; gap: 30px; align-items: start;">
                        <div style="min-width: 120px; text-align: center;">
                            <div style="font-size: 3rem; font-weight: 700; color: var(--mardi-gras-green);">2025</div>
                        </div>
                        <div style="flex: 1;">
                            <h3 class="text-purple" style="font-size: 1.5rem; margin-bottom: 10px;">Growing Together</h3>
                            <p style="color: var(--text-light); line-height: 1.8;">
                                The festival grew, attracting more participants, vendors, and sponsors. The parade expanded, 
                                performances increased, and the celebration became a must-attend event on the NOLA calendar.
                            </p>
                        </div>
                    </div>
                    
                    <div style="display: flex; gap: 30px; align-items: start;">
                        <div style="min-width: 120px; text-align: center;">
                            <div style="font-size: 3rem; font-weight: 700; color: var(--mardi-gras-gold);">2026</div>
                        </div>
                        <div style="flex: 1;">
                            <h3 class="text-gold" style="font-size: 1.5rem; margin-bottom: 10px;">Looking Ahead</h3>
                            <p style="color: var(--text-light); line-height: 1.8;">
                                We continue to build on Michelle's vision, creating an even more spectacular celebration 
                                that brings together New Orleans' diverse communities in a riot of color, music, and joy.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <!-- Board & Organizers Preview -->
    <section class="content-section bg-purple">
        <div class="container">
            <h2 class="section-title text-center" style="color: white;">The People Behind the Magic</h2>
            <div class="section-divider"></div>
            
            <p style="max-width: 800px; margin: 20px auto 40px; text-align: center; font-size: 1.1rem; color: var(--off-white); line-height: 1.8;">
                NOLA Holi is made possible by our dedicated Board of Directors and an incredible team of volunteers 
                who work tirelessly to bring this festival to life each year. From planning to execution, it takes 
                a village – and what a colorful village it is!
            </p>
            
            <div class="text-center">
                <a href="<?php echo esc_url(home_url('/organizers/')); ?>" class="btn btn-gold">
                    Meet Our Team
                </a>
            </div>
        </div>
    </section>
    
    <!-- Get Involved CTA -->
    <section class="content-section bg-light">
        <div class="container">
            <h2 class="section-title text-center">Be Part of Our Story</h2>
            <div class="section-divider"></div>
            
            <p style="max-width: 700px; margin: 20px auto 40px; text-align: center; font-size: 1.1rem; color: var(--text-light); line-height: 1.8;">
                Whether you attend as a participant, volunteer your time, sponsor the event, or simply spread the word, 
                you become part of NOLA Holi's ongoing story. Join us in making 
                New Orleans a little more colorful every year.
            </p>
            
            <div style="display: flex; gap: 20px; justify-content: center; flex-wrap: wrap;">
                <a href="<?php echo esc_url(home_url('/volunteers/')); ?>" class="btn btn-primary">Volunteer</a>
                <a href="<?php echo esc_url(home_url('/sponsors/')); ?>" class="btn btn-secondary">Become a Sponsor</a>
                <a href="<?php echo esc_url(home_url('/contact/')); ?>" class="btn btn-gold">Contact Us</a>
            </div>
        </div>
    </section>
</main>

<?php
get_footer();
?>

