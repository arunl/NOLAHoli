<?php
/**
 * Template Name: Vendors
 * Template for the Vendors page
 * 
 * @package NOLAHoli
 */

get_header();
?>

<main id="primary" class="site-main">
    <!-- Hero Section -->
    <section class="hero-section" style="<?php echo nolaholi_get_hero_background_style('linear-gradient(135deg, var(--mardi-gras-green) 0%, var(--mardi-gras-purple) 100%)'); ?>">
        <div class="hero-overlay"></div>
        <div class="hero-content">
            <h1 class="hero-title">Vendors</h1>
            <p class="hero-subtitle">Join Us at NOLA Holi Festival 2026</p>
        </div>
    </section>
    
    <!-- Intro Section -->
    <section class="content-section bg-white">
        <div class="container">
            <div style="max-width: 900px; margin: 0 auto; text-align: center;">
                <h2 class="section-title">Be Part of the Festival</h2>
                <div class="section-divider"></div>
                
                <p style="font-size: 1.2rem; line-height: 2; color: var(--text-light); margin-bottom: 30px;">
                    NOLA Holi welcomes food vendors and artisans to showcase their products at our vibrant festival! 
                    With thousands of attendees expected, this is a great opportunity to reach a diverse, engaged audience 
                    while being part of an unforgettable cultural celebration.
                </p>
            </div>
        </div>
    </section>
    
    <!-- Vendor Types -->
    <section class="content-section vendor-types bg-light">
        <div class="container">
            <h2 class="section-title text-center">Vendor Opportunities</h2>
            <div class="section-divider"></div>
            
            <div class="vendor-types">
                <!-- Food Vendors -->
                <div class="vendor-type-card">
                    <div style="text-align: center; font-size: 3rem; margin-bottom: 20px;">🍛</div>
                    <h3 class="vendor-type-title">Food Vendors</h3>
                    <p style="color: var(--text-light); line-height: 1.8; margin-bottom: 20px;">
                        We're seeking food vendors to provide delicious options for festival-goers. Indian cuisine is 
                        especially welcome, but we're open to diverse food offerings that complement the festival atmosphere.
                    </p>
                    
                    <h4 style="color: var(--mardi-gras-green); margin: 20px 0 10px;">What You Get:</h4>
                    <ul style="color: var(--text-light); line-height: 2;">
                        <li>10' x 10' vendor space</li>
                        <li>Tent, table, and chairs provided</li>
                        <li>Access to electricity (additional fee may apply)</li>
                        <li>Exposure to thousands of attendees</li>
                        <li>Promotion on our website and social media</li>
                    </ul>
                    
                    <h4 style="color: var(--mardi-gras-green); margin: 20px 0 10px;">Ideal Food Vendors:</h4>
                    <ul style="color: var(--text-light); line-height: 2;">
                        <li>Indian cuisine (appetizers, mains, desserts)</li>
                        <li>Street food and snacks</li>
                        <li>Beverages (chai, lassi, specialty drinks)</li>
                        <li>Vegetarian and vegan options</li>
                        <li>Fusion and multicultural cuisine</li>
                    </ul>
                </div>
                
                <!-- Non-Food Vendors -->
                <div class="vendor-type-card">
                    <div style="text-align: center; font-size: 3rem; margin-bottom: 20px;">🎨</div>
                    <h3 class="vendor-type-title">Artisan & Retail Vendors</h3>
                    <p style="color: var(--text-light); line-height: 1.8; margin-bottom: 20px;">
                        Showcase and sell your handmade goods, art, crafts, jewelry, clothing, and other products. 
                        We're looking for unique items that celebrate culture, creativity, and craftsmanship.
                    </p>
                    
                    <h4 style="color: var(--mardi-gras-purple); margin: 20px 0 10px;">What You Get:</h4>
                    <ul style="color: var(--text-light); line-height: 2;">
                        <li>10' x 10' vendor space</li>
                        <li>Exposure to thousands of potential customers</li>
                        <li>Promotion on website and social media</li>
                    </ul>
                    
                    <h4 style="color: var(--mardi-gras-purple); margin: 20px 0 10px;">Ideal Non-Food Vendors:</h4>
                    <ul style="color: var(--text-light); line-height: 2;">
                        <li>Handmade jewelry and accessories</li>
                        <li>Traditional clothing and textiles</li>
                        <li>Art and home decor</li>
                        <li>Henna artists</li>
                        <li>Cultural crafts and gifts</li>
                        <li>Festival merchandise</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    
    <!-- Vendor Fees -->
    <section class="content-section bg-white">
        <div class="container">
            <h2 class="section-title text-center">Vendor Fees & Details</h2>
            <div class="section-divider"></div>
            
            <div style="max-width: 900px; margin: 40px auto 0;">
                <div style="background: var(--off-white); padding: 40px; border-radius: 15px; margin-bottom: 30px;">
                    <h3 style="color: var(--mardi-gras-gold); text-align: center; font-size: 2rem; margin-bottom: 20px;">
                        Vendor Booth Fees
                    </h3>
                    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 40px; margin-top: 30px;">
                        <div style="text-align: center;">
                            <div style="font-size: 1.2rem; font-weight: 600; color: var(--text-dark); margin-bottom: 10px;">
                                Food Vendors
                            </div>
                            <div style="font-size: 2.5rem; font-weight: 700; color: var(--mardi-gras-green);">
                                $TBD
                            </div>
                            <div style="color: var(--text-light); margin-top: 5px;">10' x 10' space</div>
                        </div>
                        <div style="text-align: center;">
                            <div style="font-size: 1.2rem; font-weight: 600; color: var(--text-dark); margin-bottom: 10px;">
                                Artisan/Retail Vendors
                            </div>
                            <div style="font-size: 2.5rem; font-weight: 700; color: var(--mardi-gras-purple);">
                                $TBD
                            </div>
                            <div style="color: var(--text-light); margin-top: 5px;">10' x 10' space</div>
                        </div>
                    </div>
                    <p style="text-align: center; margin-top: 30px; color: var(--text-light); font-style: italic;">
                        * Fees subject to change. Early bird discounts may be available.
                    </p>
                </div>
                
                <div style="background: var(--white); border: 2px solid var(--mardi-gras-gold); padding: 30px; border-radius: 15px;">
                    <h4 style="color: var(--mardi-gras-purple); margin-bottom: 15px; font-size: 1.3rem;">What's Included:</h4>
                    <ul style="color: var(--text-light); line-height: 2; font-size: 1.05rem;">
                        <li>✓ 10' x 10' vendor space at the festival</li>
                        <li>✓ Listing on NOLA Holi website</li>
                        <li>✓ Promotion on social media channels</li>
                        <li>✓ 2 vendor passes (food) or 1 vendor pass (retail)</li>
                        <li>✓ Table and chairs for retail vendors</li>
                        <li>✓ Access to festival utilities (fees may apply for electricity)</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    
    <!-- Vendor Policies -->
    <section class="content-section vendor-policy bg-light">
        <div class="container">
            <h2 class="section-title text-center">Vendor Policies & Guidelines</h2>
            <div class="section-divider"></div>
            
            <div style="max-width: 900px; margin: 40px auto 0;">
                <h3 style="color: var(--mardi-gras-purple); margin-bottom: 20px; font-size: 1.5rem;">General Requirements</h3>
                <ul style="color: var(--text-light); line-height: 2; margin-bottom: 40px;">
                    <li><strong>Insurance:</strong> All vendors must carry general liability insurance</li>
                    <li><strong>Permits:</strong> Food vendors must have current health permits and licenses</li>
                    <li><strong>Setup:</strong> Vendors must arrive by designated setup time (TBD)</li>
                    <li><strong>Breakdown:</strong> Vendors must remain for entire event and clean up their space</li>
                    <li><strong>Electricity:</strong> Limited power available; request during application</li>
                    <li><strong>Weather:</strong> Event is rain or shine (rain date: March 8, 2026)</li>
                </ul>
                
                <h3 style="color: var(--mardi-gras-green); margin-bottom: 20px; font-size: 1.5rem;">What Vendors Must Provide</h3>
                <ul style="color: var(--text-light); line-height: 2; margin-bottom: 40px;">
                    <li>Your own tent/canopy (10' x 10' maximum)</li>
                    <li>Tables, chairs, and equipment (except retail - tables/chairs provided)</li>
                    <li>All inventory and supplies</li>
                    <li>Cash handling equipment (many attendees use cash)</li>
                    <li>Trash bags for your booth area</li>
                    <li>Weights or stakes to secure tent</li>
                </ul>
                
                <h3 style="color: var(--mardi-gras-gold); margin-bottom: 20px; font-size: 1.5rem;">Prohibited Items</h3>
                <ul style="color: var(--text-light); line-height: 2; margin-bottom: 40px;">
                    <li>❌ Weapons of any kind</li>
                    <li>❌ Illegal substances or products</li>
                    <li>❌ Discriminatory or offensive materials</li>
                    <li>❌ Live animals (except service animals)</li>
                    <li>❌ Amplified music without prior approval</li>
                    <li>❌ Items that conflict with existing sponsors</li>
                </ul>
                
                <div style="background: var(--white); padding: 30px; border-radius: 10px; box-shadow: var(--shadow-sm);">
                    <h4 style="color: var(--mardi-gras-purple); margin-bottom: 15px; font-size: 1.2rem; text-align: center;">
                        🌿 Eco-Friendly Festival
                    </h4>
                    <p style="color: var(--text-light); line-height: 1.8; text-align: center;">
                        NOLA Holi is committed to sustainability. We encourage vendors to use compostable or 
                        recyclable packaging, minimize waste, and follow green practices whenever possible.
                    </p>
                </div>
            </div>
        </div>
    </section>
    
    <!-- Application Process -->
    <section class="content-section bg-white">
        <div class="container">
            <h2 class="section-title text-center">How to Apply</h2>
            <div class="section-divider"></div>
            
            <div style="max-width: 800px; margin: 40px auto 0;">
                <div style="display: grid; gap: 30px;">
                    <div style="display: flex; gap: 20px; align-items: start;">
                        <div style="min-width: 80px; text-align: center;">
                            <div style="width: 60px; height: 60px; border-radius: 50%; background: var(--mardi-gras-purple); color: white; display: flex; align-items: center; justify-content: center; font-size: 2rem; font-weight: 700;">1</div>
                        </div>
                        <div>
                            <h4 style="color: var(--mardi-gras-purple); font-size: 1.3rem; margin-bottom: 10px;">Contact Us</h4>
                            <p style="color: var(--text-light); line-height: 1.8;">
                                Email us at <a href="mailto:vendors@nolaholi.org" style="color: var(--mardi-gras-green); font-weight: 600;">vendors@nolaholi.org</a> 
                                or use our contact form to express your interest.
                            </p>
                        </div>
                    </div>
                    
                    <div style="display: flex; gap: 20px; align-items: start;">
                        <div style="min-width: 80px; text-align: center;">
                            <div style="width: 60px; height: 60px; border-radius: 50%; background: var(--mardi-gras-green); color: white; display: flex; align-items: center; justify-content: center; font-size: 2rem; font-weight: 700;">2</div>
                        </div>
                        <div>
                            <h4 style="color: var(--mardi-gras-green); font-size: 1.3rem; margin-bottom: 10px;">Submit Application</h4>
                            <p style="color: var(--text-light); line-height: 1.8;">
                                Complete the vendor application form and provide required documentation (permits, insurance, photos of products).
                            </p>
                        </div>
                    </div>
                    
                    <div style="display: flex; gap: 20px; align-items: start;">
                        <div style="min-width: 80px; text-align: center;">
                            <div style="width: 60px; height: 60px; border-radius: 50%; background: var(--mardi-gras-gold); color: white; display: flex; align-items: center; justify-content: center; font-size: 2rem; font-weight: 700;">3</div>
                        </div>
                        <div>
                            <h4 style="color: var(--mardi-gras-gold); font-size: 1.3rem; margin-bottom: 10px;">Review & Approval</h4>
                            <p style="color: var(--text-light); line-height: 1.8;">
                                Our vendor committee reviews all applications. You'll receive notification of acceptance and next steps.
                            </p>
                        </div>
                    </div>
                    
                    <div style="display: flex; gap: 20px; align-items: start;">
                        <div style="min-width: 80px; text-align: center;">
                            <div style="width: 60px; height: 60px; border-radius: 50%; background: var(--mardi-gras-purple); color: white; display: flex; align-items: center; justify-content: center; font-size: 2rem; font-weight: 700;">4</div>
                        </div>
                        <div>
                            <h4 style="color: var(--mardi-gras-purple); font-size: 1.3rem; margin-bottom: 10px;">Payment & Confirmation</h4>
                            <p style="color: var(--text-light); line-height: 1.8;">
                                Pay vendor fee and sign vendor agreement. Receive booth assignment and event details.
                            </p>
                        </div>
                    </div>
                </div>
                
                <div style="background: var(--off-white); padding: 30px; border-radius: 10px; margin-top: 40px; text-align: center;">
                    <p style="font-size: 1.1rem; color: var(--mardi-gras-purple); font-weight: 600; margin-bottom: 10px;">
                        Application Deadline: TBD
                    </p>
                    <p style="color: var(--text-light);">
                        Vendor spaces are limited! Apply early to secure your spot.
                    </p>
                </div>
            </div>
        </div>
    </section>
    
    <!-- CTA Section -->
    <section class="content-section bg-purple">
        <div class="container">
            <div style="text-align: center; max-width: 700px; margin: 0 auto;">
                <h2 class="section-title" style="color: white;">Ready to Be a Vendor?</h2>
                <div class="section-divider"></div>
                <p style="font-size: 1.1rem; color: var(--off-white); line-height: 1.8; margin-bottom: 30px;">
                    Join us at NOLA Holi 2026 and be part of New Orleans' most colorful celebration! 
                    Whether you serve delicious food or sell unique artisan goods, we'd love to have you.
                </p>
                <div style="display: flex; gap: 20px; justify-content: center; flex-wrap: wrap;">
                    <a href="<?php echo esc_url(home_url('/contact/')); ?>" class="btn btn-gold">Apply Now</a>
                    <a href="mailto:vendors@nolaholi.org" class="btn btn-secondary">Email: vendors@nolaholi.org</a>
                </div>
            </div>
        </div>
    </section>
</main>

<?php
get_footer();
?>

