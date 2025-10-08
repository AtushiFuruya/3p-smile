<?php
?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="scroll-smooth">
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
</head>
<body <?php body_class( 'bg-gradient-to-br from-black via-red-900 to-pink-900 text-white overflow-x-hidden' ); ?>>
<?php wp_body_open(); ?>

    <!-- Navigation -->
    <nav class="site-nav glass-effect">
        <div class="nav-inner">
            <a href="<?php echo esc_url( home_url( '/#home' ) ); ?>" class="nav-brand gradient-text animate-pulse-3d">3PサークルSmile</a>
            <button id="menu-toggle" class="nav-toggle" aria-label="メニューを開閉" aria-expanded="false">
                <span></span>
                <span></span>
                <span></span>
            </button>
            <div class="nav-links">
                <a href="<?php echo esc_url( home_url( '/#home' ) ); ?>" class="nav-link">ホーム</a>
                <a href="<?php echo esc_url( home_url( '/about/' ) ); ?>" class="nav-link">概要</a>
                <a href="<?php echo esc_url( home_url( '/profiles/' ) ); ?>" class="nav-link">メンバー紹介</a>
                <a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>" class="nav-link">お問い合わせ</a>
                <a href="<?php echo esc_url( home_url( '/faq/' ) ); ?>" class="nav-link">FAQ</a>
            </div>
        </div>
    </nav>

    <div id="mobile-menu" class="mobile-menu-overlay" aria-hidden="true">
        <div class="mobile-menu-content">
            <div class="mobile-menu-header">
                <span class="mobile-menu-title gradient-text">Menu</span>
                <button class="mobile-menu-close" id="menu-close" aria-label="メニューを閉じる">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <line x1="18" y1="6" x2="6" y2="18" />
                        <line x1="6" y1="6" x2="18" y2="18" />
                    </svg>
                </button>
            </div>
            <nav class="mobile-menu-links">
                <a href="<?php echo esc_url( home_url( '/#home' ) ); ?>" class="mobile-menu-link" data-menu-link>
                    ホーム
                </a>
                <a href="<?php echo esc_url( home_url( '/about/' ) ); ?>" class="mobile-menu-link" data-menu-link>
                    概要
                </a>
                <a href="<?php echo esc_url( home_url( '/profiles/' ) ); ?>" class="mobile-menu-link" data-menu-link>
                    メンバー紹介
                </a>
                <a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>" class="mobile-menu-link" data-menu-link>
                    お問い合わせ
                </a>
                <a href="<?php echo esc_url( home_url( '/faq/' ) ); ?>" class="mobile-menu-link" data-menu-link>
                    FAQ
                </a>
            </nav>
        </div>
    </div>
