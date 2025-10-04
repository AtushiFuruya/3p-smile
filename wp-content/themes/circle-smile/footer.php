<?php
?>
    <!-- Footer -->
    <footer class="py-8 px-6 border-t border-gray-700">
        <div class="container mx-auto text-center">
            <p class="text-gray-400">
                &copy; 2025 3PサークルSmile. All rights reserved.
            </p>
            <div class="mt-4 text-xl md:text-2xl gradient-text font-bold animate-pulse-3d">
                Together We Smile
            </div>
        </div>
    </footer>

    <script>
        // Intersection Observer for scroll animations
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        };

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.style.opacity = '1';
                    entry.target.style.animationPlayState = 'running';
                }
            });
        }, observerOptions);

        // Observe all animated elements
        document.addEventListener('DOMContentLoaded', () => {
            const animatedElements = document.querySelectorAll('[class*="animate-"]');
            animatedElements.forEach(el => {
                if (el.style.animationDelay) {
                    el.style.opacity = '0';
                    observer.observe(el);
                }
            });

            const heroStage = document.querySelector('.hero-intro-stage');
            if (heroStage) {
                document.body.classList.add('hero-intro-active');
                const HERO_INTRO_DURATION = 3000;
                const concludeIntro = () => {
                    heroStage.classList.add('hero-intro-exit');
                    document.body.classList.remove('hero-intro-active');
                    setTimeout(() => {
                        heroStage.remove();
                    }, 650);
                };

                setTimeout(concludeIntro, HERO_INTRO_DURATION);
            } else {
                document.body.classList.remove('hero-intro-active');
            }

            const heroVideo = document.getElementById('hero-video');
            if (heroVideo) {
                const videoContainer = heroVideo.closest('.video-container');
                const revealVideo = () => {
                    if (videoContainer) {
                        videoContainer.classList.add('video-ready');
                    }
                };

                const attemptPlay = () => {
                    const playPromise = heroVideo.play();
                    if (playPromise) {
                        playPromise.catch(() => {
                            heroVideo.muted = true;
                            heroVideo.play().catch(() => {
                                // Autoplay may still be blocked; leave the default UI in place.
                            });
                        });
                    }
                };

                const playWhenReady = () => {
                    revealVideo();
                    attemptPlay();
                };

                if (heroVideo.readyState >= 3) {
                    playWhenReady();
                } else {
                    heroVideo.addEventListener('canplaythrough', playWhenReady, { once: true });
                    heroVideo.addEventListener('canplay', playWhenReady, { once: true });
                    heroVideo.addEventListener('loadeddata', revealVideo, { once: true });
                }

                heroVideo.addEventListener('playing', revealVideo, { once: true });
                heroVideo.addEventListener('error', revealVideo, { once: true });
            }

            const menuToggle = document.getElementById('menu-toggle');
            const mobileMenu = document.getElementById('mobile-menu');
            const menuClose = document.getElementById('menu-close');
            const mobileLinks = document.querySelectorAll('[data-menu-link]');

            const setMenuState = (isOpen) => {
                if (!menuToggle || !mobileMenu) return;
                menuToggle.classList.toggle('open', isOpen);
                mobileMenu.classList.toggle('open', isOpen);
                mobileMenu.setAttribute('aria-hidden', (!isOpen).toString());
                menuToggle.setAttribute('aria-expanded', isOpen.toString());
                document.body.classList.toggle('menu-open', isOpen);
            };

            if (menuToggle) {
                menuToggle.addEventListener('click', () => {
                    const isOpen = !menuToggle.classList.contains('open');
                    setMenuState(isOpen);
                });
            }

            if (menuClose) {
                menuClose.addEventListener('click', () => setMenuState(false));
            }

            mobileLinks.forEach(link => {
                link.addEventListener('click', () => setMenuState(false));
            });

            if (mobileMenu) {
                mobileMenu.addEventListener('click', (event) => {
                    if (event.target === mobileMenu) {
                        setMenuState(false);
                    }
                });
            }

            document.addEventListener('keydown', (event) => {
                if (event.key === 'Escape') {
                    setMenuState(false);
                }
            });
        });

        // Smooth scroll for navigation links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth'
                    });
                }
            });
        });

        // Dynamic highlight interaction
        const interactiveCards = document.querySelectorAll('.nav-card, .cta-card');

        interactiveCards.forEach(card => {
            const updateHighlight = (event) => {
                const rect = card.getBoundingClientRect();
                const x = ((event.clientX - rect.left) / rect.width) * 100;
                const y = ((event.clientY - rect.top) / rect.height) * 100;
                card.style.setProperty('--pointer-x', `${x}%`);
                card.style.setProperty('--pointer-y', `${y}%`);
            };

            card.addEventListener('pointermove', updateHighlight);
            card.addEventListener('pointerleave', () => {
                card.style.setProperty('--pointer-x', '50%');
                card.style.setProperty('--pointer-y', '50%');
            });
        });

    </script>
    <?php wp_footer(); ?>
</body>
</html>
