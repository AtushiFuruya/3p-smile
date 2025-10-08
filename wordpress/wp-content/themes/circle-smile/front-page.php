<?php
get_header();
if ( ! function_exists( 'circle_smile_render_nav_card' ) ) {
    function circle_smile_render_nav_card( array $card ) {
        ?>
        <a href="<?php echo esc_url( $card['url'] ); ?>" class="nav-card">
            <div class="nav-card-badge"><?php echo esc_html( $card['badge'] ); ?></div>
            <div class="nav-card-content">
                <span class="nav-card-title"><?php echo esc_html( $card['title'] ); ?></span>
                <p class="nav-card-text"><?php echo esc_html( $card['text'] ); ?></p>
                <span class="nav-card-cta"><?php echo esc_html( $card['cta'] ); ?></span>
            </div>
        </a>
        <?php
    }
}

if ( ! function_exists( 'circle_smile_render_cta_card' ) ) {
    function circle_smile_render_cta_card( array $card ) {
        ?>
        <a href="<?php echo esc_url( $card['url'] ); ?>" class="cta-card">
            <div class="cta-card-badge"><?php echo esc_html( $card['badge'] ); ?></div>
            <div class="cta-card-content">
                <span class="cta-card-title"><?php echo esc_html( $card['title'] ); ?></span>
                <p class="cta-card-text"><?php echo esc_html( $card['text'] ); ?></p>
                <span class="cta-card-cta"><?php echo esc_html( $card['cta'] ); ?></span>
            </div>
        </a>
        <?php
    }
}

$asset_base = get_template_directory_uri() . '/assets';

$nav_cards = [
    [
        'badge' => 'About',
        'title' => '概要',
        'text'  => 'サークルの理念とコンセプトを、思想の背景とともに丁寧にご紹介します。',
        'url'   => home_url( '/about/' ),
        'cta'   => 'More Details',
    ],
    [
        'badge' => 'Members',
        'title' => 'メンバー紹介',
        'text'  => '参加メンバーの雰囲気やスタンスを、丁寧なプロフィールでご確認いただけます。',
        'url'   => home_url( '/profiles/' ),
        'cta'   => 'Meet Members',
    ],
    [
        'badge' => 'Contact',
        'title' => 'お問い合わせ',
        'text'  => '進め方の相談から不安な点の確認まで、個別にヒアリングいたします。',
        'url'   => home_url( '/contact/' ),
        'cta'   => 'Start Talk',
    ],
    [
        'badge' => 'FAQ',
        'title' => 'FAQ',
        'text'  => 'よくある疑問と答えをまとめ、初参加でも迷わないようサポートします。',
        'url'   => home_url( '/faq/' ),
        'cta'   => 'Read Answers',
    ],
];

$cta_cards = [
    [
        'badge' => 'Female',
        'title' => '女性エントリー',
        'text'  => '安心できるヒアリングからスタート。ご希望やペースを大切に、体験まで伴走します。',
        'url'   => add_query_arg( 'type', 'female', home_url( '/contact/' ) ),
        'cta'   => 'Apply Now',
    ],
    [
        'badge' => 'Male',
        'title' => '男性エントリー',
        'text'  => 'マナーと共感性を重視した選考で、心地よい空間づくりに共に取り組みます。',
        'url'   => add_query_arg( 'type', 'male', home_url( '/contact/' ) ),
        'cta'   => 'Join Circle',
    ],
];
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
                        <?php foreach ( $nav_cards as $card ) : ?>
                            <?php circle_smile_render_nav_card( $card ); ?>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>

            <!-- Application Buttons Section -->
            <div class="application-buttons-section">
                <div class="apply-grid">
                    <?php foreach ( $cta_cards as $card ) : ?>
                        <?php circle_smile_render_cta_card( $card ); ?>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </section>
</main>
<?php
get_footer();
