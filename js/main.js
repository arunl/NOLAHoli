/**
 * NOLA Holi Theme JavaScript
 * Main JavaScript file for interactive elements
 * 
 * @package NOLAHoli
 */

(function($) {
    'use strict';

    /**
     * Mobile Menu Toggle
     */
    function initMobileMenu() {
        $('.menu-toggle').on('click', function() {
            $(this).toggleClass('active');
            $('.nav-menu').toggleClass('active');
            
            // Toggle aria-expanded
            var expanded = $(this).attr('aria-expanded') === 'true';
            $(this).attr('aria-expanded', !expanded);
        });

        // Close menu when clicking outside
        $(document).on('click', function(e) {
            if (!$(e.target).closest('.main-navigation').length) {
                $('.menu-toggle').removeClass('active');
                $('.nav-menu').removeClass('active');
                $('.menu-toggle').attr('aria-expanded', 'false');
            }
        });

        // Close menu on ESC key
        $(document).on('keyup', function(e) {
            if (e.key === 'Escape') {
                $('.menu-toggle').removeClass('active');
                $('.nav-menu').removeClass('active');
                $('.menu-toggle').attr('aria-expanded', 'false');
            }
        });
    }

    /**
     * Smooth Scrolling for Anchor Links
     */
    function initSmoothScroll() {
        $('a[href*="#"]:not([href="#"])').on('click', function(e) {
            if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') 
                && location.hostname == this.hostname) {
                
                var target = $(this.hash);
                target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
                
                if (target.length) {
                    e.preventDefault();
                    $('html, body').animate({
                        scrollTop: target.offset().top - 100
                    }, 800, function() {
                        // Focus target for accessibility
                        var $target = $(target);
                        $target.focus();
                        if ($target.is(":focus")) {
                            return false;
                        } else {
                            $target.attr('tabindex','-1');
                            $target.focus();
                        }
                    });
                }
            }
        });
    }

    /**
     * Sticky Header on Scroll
     */
    function initStickyHeader() {
        var header = $('.site-header');
        var headerHeight = header.outerHeight();
        
        $(window).on('scroll', function() {
            if ($(window).scrollTop() > headerHeight) {
                header.addClass('scrolled');
            } else {
                header.removeClass('scrolled');
            }
        });
    }

    /**
     * Gallery Year Tabs
     */
    function initGalleryTabs() {
        $('.gallery-year-tab').on('click', function(e) {
            e.preventDefault();
            
            var year = $(this).data('year');
            
            // Update active tab
            $('.gallery-year-tab').removeClass('active');
            $('.gallery-year-tab').css({
                'background': 'transparent',
                'color': 'var(--text-dark)'
            });
            
            $(this).addClass('active');
            $(this).css({
                'background': 'var(--mardi-gras-purple)',
                'color': 'white'
            });
            
            // Show corresponding gallery
            $('.gallery-year-section').hide();
            $('#gallery-' + year).fadeIn(400);
        });
    }

    /**
     * Image Lazy Loading Enhancement
     */
    function initLazyLoading() {
        if ('loading' in HTMLImageElement.prototype) {
            // Browser supports native lazy loading
            const images = document.querySelectorAll('img[loading="lazy"]');
            images.forEach(img => {
                img.src = img.dataset.src || img.src;
            });
        } else {
            // Fallback for older browsers
            const script = document.createElement('script');
            script.src = 'https://cdnjs.cloudflare.com/ajax/libs/lazysizes/5.3.2/lazysizes.min.js';
            document.body.appendChild(script);
        }
    }

    /**
     * Form Validation
     */
    function initFormValidation() {
        $('form').on('submit', function(e) {
            var form = $(this);
            var isValid = true;

            // Check required fields
            form.find('[required]').each(function() {
                if ($(this).val().trim() === '') {
                    isValid = false;
                    $(this).css('border-color', 'red');
                } else {
                    $(this).css('border-color', '');
                }
            });

            // Email validation
            form.find('[type="email"]').each(function() {
                var email = $(this).val();
                var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                if (email && !emailRegex.test(email)) {
                    isValid = false;
                    $(this).css('border-color', 'red');
                    alert('Please enter a valid email address.');
                }
            });

            if (!isValid) {
                e.preventDefault();
                $('html, body').animate({
                    scrollTop: form.find('[style*="border-color: red"]').first().offset().top - 100
                }, 500);
            }
        });

        // Remove error styling on input
        $('input, textarea, select').on('input change', function() {
            if ($(this).val().trim() !== '') {
                $(this).css('border-color', '');
            }
        });
    }

    /**
     * Animate on Scroll
     */
    function initScrollAnimations() {
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        };

        const observer = new IntersectionObserver(function(entries) {
            entries.forEach(function(entry) {
                if (entry.isIntersecting) {
                    entry.target.classList.add('animate-in');
                    observer.unobserve(entry.target);
                }
            });
        }, observerOptions);

        // Observe elements
        const animateElements = document.querySelectorAll('.feature-card, .team-member, .sponsor-tier');
        animateElements.forEach(function(element) {
            observer.observe(element);
        });
    }

    /**
     * Back to Top Button
     */
    function initBackToTop() {
        // Create back to top button
        var backToTop = $('<button class="back-to-top" aria-label="Back to top">↑</button>');
        backToTop.css({
            'position': 'fixed',
            'bottom': '30px',
            'right': '30px',
            'width': '50px',
            'height': '50px',
            'border-radius': '50%',
            'background': 'var(--mardi-gras-purple)',
            'color': 'white',
            'border': 'none',
            'font-size': '24px',
            'cursor': 'pointer',
            'display': 'none',
            'z-index': '999',
            'box-shadow': 'var(--shadow-md)',
            'transition': 'all 0.3s ease'
        });

        $('body').append(backToTop);

        // Show/hide button on scroll
        $(window).on('scroll', function() {
            if ($(this).scrollTop() > 300) {
                backToTop.fadeIn();
            } else {
                backToTop.fadeOut();
            }
        });

        // Scroll to top on click
        backToTop.on('click', function() {
            $('html, body').animate({scrollTop: 0}, 600);
        });

        // Hover effect
        backToTop.hover(
            function() {
                $(this).css({
                    'background': 'var(--mardi-gras-gold)',
                    'transform': 'translateY(-5px)'
                });
            },
            function() {
                $(this).css({
                    'background': 'var(--mardi-gras-purple)',
                    'transform': 'translateY(0)'
                });
            }
        );
    }

    /**
     * Counter Animation for Stats
     */
    function initCounters() {
        $('.counter').each(function() {
            var $this = $(this);
            var countTo = $this.attr('data-count');
            
            $({ countNum: $this.text()}).animate({
                countNum: countTo
            }, {
                duration: 2000,
                easing: 'swing',
                step: function() {
                    $this.text(Math.floor(this.countNum));
                },
                complete: function() {
                    $this.text(this.countNum);
                }
            });
        });
    }

    /**
     * Add active class to current menu item
     */
    function initActiveMenuItem() {
        var currentPage = window.location.pathname;
        $('.nav-menu a').each(function() {
            var linkPath = $(this).attr('href');
            if (currentPage.indexOf(linkPath) !== -1 && linkPath !== '/') {
                $(this).addClass('current');
            } else if (currentPage === '/' && linkPath === '/') {
                $(this).addClass('current');
            }
        });
    }

    /**
     * Photo Lightbox
     */
    function initPhotoLightbox() {
        var currentIndex = 0;
        var currentGallery = [];
        var $lightbox = $('#photo-lightbox');
        var $lightboxImage = $('#lightbox-image');
        var $lightboxCounter = $('#lightbox-counter');
        var $lightboxDownload = $('#lightbox-download');

        // Open lightbox when clicking a photo
        $(document).on('click', '.photo-item', function() {
            var $gallery = $(this).closest('.photo-gallery');
            var $allPhotos = $gallery.find('.photo-item');
            
            currentIndex = $(this).data('index');
            currentGallery = [];
            
            // Build gallery array
            $allPhotos.each(function() {
                var $img = $(this).find('img');
                currentGallery.push({
                    full: $img.data('full'),
                    original: $img.data('original'),
                    alt: $img.attr('alt')
                });
            });
            
            showPhoto(currentIndex);
            $lightbox.removeClass('hidden');
            $('body').css('overflow', 'hidden');
        });

        // Close lightbox
        function closeLightbox() {
            $lightbox.addClass('hidden');
            $('body').css('overflow', '');
        }

        $('.lightbox-close, .lightbox-overlay').on('click', closeLightbox);

        // Navigate photos
        $('.lightbox-prev').on('click', function(e) {
            e.stopPropagation();
            currentIndex = (currentIndex - 1 + currentGallery.length) % currentGallery.length;
            showPhoto(currentIndex);
        });

        $('.lightbox-next').on('click', function(e) {
            e.stopPropagation();
            currentIndex = (currentIndex + 1) % currentGallery.length;
            showPhoto(currentIndex);
        });

        // Keyboard navigation
        $(document).on('keydown', function(e) {
            if (!$lightbox.hasClass('hidden')) {
                if (e.key === 'Escape') {
                    closeLightbox();
                } else if (e.key === 'ArrowLeft') {
                    $('.lightbox-prev').click();
                } else if (e.key === 'ArrowRight') {
                    $('.lightbox-next').click();
                }
            }
        });

        // Show photo
        function showPhoto(index) {
            if (currentGallery.length === 0) return;
            
            var photo = currentGallery[index];
            $lightboxImage.attr('src', photo.full);
            $lightboxImage.attr('alt', photo.alt);
            $lightboxDownload.attr('href', photo.original);
            $lightboxCounter.text((index + 1) + ' / ' + currentGallery.length);
        }

        // Prevent lightbox content from closing when clicked
        $('.lightbox-content').on('click', function(e) {
            e.stopPropagation();
        });
    }

    /**
     * Initialize all functions when document is ready
     */
    $(document).ready(function() {
        initMobileMenu();
        initSmoothScroll();
        initStickyHeader();
        initGalleryTabs();
        initPhotoLightbox();
        initLazyLoading();
        initFormValidation();
        initBackToTop();
        initActiveMenuItem();

        // Initialize scroll animations if IntersectionObserver is supported
        if ('IntersectionObserver' in window) {
            initScrollAnimations();
        }

        // Initialize counters when visible
        if ($('.counter').length) {
            var counterObserver = new IntersectionObserver(function(entries) {
                entries.forEach(function(entry) {
                    if (entry.isIntersecting) {
                        initCounters();
                        counterObserver.disconnect();
                    }
                });
            });
            counterObserver.observe($('.counter')[0]);
        }
    });

    /**
     * Window load events
     */
    $(window).on('load', function() {
        // Remove any loading states
        $('body').removeClass('loading');
        
        // Trigger scroll events for initial state
        $(window).trigger('scroll');
    });

})(jQuery);

