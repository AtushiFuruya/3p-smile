<?php
get_header();
$asset_base = get_template_directory_uri() . '/assets';
?>
<main class="page-shell">
    <!-- Hero Section with Video -->
    <section id="home" class="hero-section perspective">
        <div class="absolute inset-0 z-0 video-container">
            <video
                id="hero-video"
                class="hero-video"
                autoplay
                muted
                loop
                playsinline
                webkit-playsinline
                preload="auto"
            >
                <source src="<?php echo esc_url( $asset_base . '/videos/1_please_check_202509250226_n8psp.mp4' ); ?>" type="video/mp4">
                <source src="<?php echo esc_url( $asset_base . '/videos/1_please_check_202509250226_n8psp.webm' ); ?>" type="video/webm">
                Your browser does not support the video tag.
            </video>
        </div>

        <div class="relative z-10 w-full h-full flex flex-col justify-center items-center">
            <!-- Text Container -->
            <div class="text-container-inner hero-stage hero-intro-stage">
                <svg viewBox="-60 -40 1120 360" preserveAspectRatio="xMidYMid meet" class="hero-svg">
                    <defs>
                        <linearGradient id="redGradient" x1="0%" y1="0%" x2="100%" y2="0%">
                            <stop offset="0%" stop-color="#ff1744" />
                            <stop offset="50%" stop-color="#e91e63" />
                            <stop offset="100%" stop-color="#ff6b9d" />
                        </linearGradient>
                        <filter id="glow">
                            <feGaussianBlur stdDeviation="4" result="coloredBlur"/>
                            <feMerge>
                                <feMergeNode in="coloredBlur"/>
                                <feMergeNode in="SourceGraphic"/>
                            </feMerge>
                        </filter>
                    </defs>
                    <text x="50%" y="50%" text-anchor="middle" dominant-baseline="middle" class="hero-title">
                        <tspan x="50%" dy="-0.6em">火戯び知らずに、</tspan>
                        <tspan x="50%" dy="1.2em">生きていく？</tspan>
                    </text>
                </svg>
            </div>

            <!-- Page Links Section -->
            <div class="blur-fade-in navigation-section">
                <div class="flex justify-center items-center w-full">
                    <div class="nav-grid">
                        <a href="<?php echo esc_url( home_url( '/about/' ) ); ?>" class="nav-card">
                            <div class="nav-card-badge">About</div>
                            <div class="nav-card-content">
                                <span class="nav-card-title">概要</span>
                                <p class="nav-card-text">サークルの理念とコンセプトを、思想の背景とともに丁寧にご紹介します。</p>
                                <span class="nav-card-cta">More Details
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M5 12h14" />
                                        <path d="M13 5l7 7-7 7" />
                                    </svg>
                                </span>
                            </div>
                        </a>
                        <a href="<?php echo esc_url( home_url( '/profiles/' ) ); ?>" class="nav-card">
                            <div class="nav-card-badge">Members</div>
                            <div class="nav-card-content">
                                <span class="nav-card-title">メンバー紹介</span>
                                <p class="nav-card-text">参加メンバーの雰囲気やスタンスを、丁寧なプロフィールでご確認いただけます。</p>
                                <span class="nav-card-cta">Meet Members
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M5 12h14" />
                                        <path d="M13 5l7 7-7 7" />
                                    </svg>
                                </span>
                            </div>
                        </a>
                        <a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>" class="nav-card">
                            <div class="nav-card-badge">Contact</div>
                            <div class="nav-card-content">
                                <span class="nav-card-title">お問い合わせ</span>
                                <p class="nav-card-text">進め方の相談から不安な点の確認まで、個別にヒアリングいたします。</p>
                                <span class="nav-card-cta">Start Talk
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M5 12h14" />
                                        <path d="M13 5l7 7-7 7" />
                                    </svg>
                                </span>
                            </div>
                        </a>
                        <a href="<?php echo esc_url( home_url( '/faq/' ) ); ?>" class="nav-card">
                            <div class="nav-card-badge">FAQ</div>
                            <div class="nav-card-content">
                                <span class="nav-card-title">FAQ</span>
                                <p class="nav-card-text">よくある疑問と答えをまとめ、初参加でも迷わないようサポートします。</p>
                                <span class="nav-card-cta">Read Answers
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M5 12h14" />
                                        <path d="M13 5l7 7-7 7" />
                                    </svg>
                                </span>
                            </div>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Application Buttons Section -->
            <div class="application-buttons-section">
                <div class="apply-grid">
                    <a href="<?php echo esc_url( add_query_arg( 'type', 'female', home_url( '/contact/' ) ) ); ?>" class="cta-card">
                        <div class="cta-card-badge">Female</div>
                        <div class="cta-card-content">
                            <span class="cta-card-title">女性エントリー</span>
                            <p class="cta-card-text">安心できるヒアリングからスタート。ご希望やペースを大切に、体験まで伴走します。</p>
                            <span class="cta-card-cta">Apply Now
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M5 12h14" />
                                    <path d="M13 5l7 7-7 7" />
                                </svg>
                            </span>
                        </div>
                    </a>
                    <a href="<?php echo esc_url( add_query_arg( 'type', 'male', home_url( '/contact/' ) ) ); ?>" class="cta-card">
                        <div class="cta-card-badge">Male</div>
                        <div class="cta-card-content">
                            <span class="cta-card-title">男性エントリー</span>
                            <p class="cta-card-text">マナーと共感性を重視した選考で、心地よい空間づくりに共に取り組みます。</p>
                            <span class="cta-card-cta">Join Circle
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M5 12h14" />
                                    <path d="M13 5l7 7-7 7" />
                                </svg>
                            </span>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </section>
</main>
<?php
get_footer();
