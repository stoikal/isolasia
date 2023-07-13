<?php
include __DIR__ . '/../../inc/options.php';
?>

<header
    class="
        relative
        <?= $da_color_bg ?>
        <?= $da_color_text ?>
        <?= ($he_show_border && $he_is_border_full_width) ? 'border-b' : ''?>
    "
    style="
        background-color: <?= $he_color_bg ?>;
        color: <?= $he_color_text ?>;
        border-color: <?= $he_color_border ?>;
    "
>
    <div
        class="
            mx-auto md:px-4
            <?= $he_max_width ?>
        "
    >
        <div
            class="
                flex items-end
                <?= ($he_show_border && !$he_is_border_full_width) ? 'border-b' : ''?>
            "
            style="
                border-color: <?= $he_color_border ?>;
            "
        >
            <div
                class="flex-1 items-end flex pl-4 py-2"
            >
                <?php
                $custom_logo_id = get_theme_mod('custom_logo');
                $logo_url = wp_get_attachment_image_url($custom_logo_id, 'full');
        
                if ( $he_show_logo && $logo_url ) :
                ?>
                    <div class="flex-shrink-0 flex align-baseline justify-center">
                        <a href="/" class="inline-block ">
                            <img
                                src="<?=esc_url($logo_url)?>"
                                alt="logo"
                                loading="lazy"
                            >
                        </a>
                    </div>
                <?php endif;?>
    
            
                <?php if ( $he_show_site_title && get_bloginfo( 'name' ) ) : ?>
                    <p
                        class="w-full text-2xl pl-2 font-display <?= $da_color_text ?>"
                        style="
                            color: <?= $he_color_title ?>;
                        "
                    >
                        <a href="/" class="hover:underline">
                            <?php bloginfo( 'name' ); ?>
                        </a>
                    </p>
                <?php endif;?>
            </div>

            <?php get_template_part('template-parts/header/dark-mode-toggle') ?>

            <?php get_template_part('template-parts/header/search-form') ?>

            <nav class="pr-3 py-0.5 hidden md:block">
                <div class="max-w-full mx-auto text-center flex justify-center">
                    <?php if ( has_nav_menu( 'primary' ) ) : ?>
                        <?php
                        wp_nav_menu(
                            array(
                            'menu_class' => 'isolasia_primary-menu',
                            'theme_location' => 'primary',
                            'fallback_cb' => false
                            )
                        );
                        ?>
                    <?php endif; ?>
                </div>
            </nav>

            <button
                type="button"
                class="md:hidden w-11 h-11 side-drawer-trigger"
            >
                <i class="fas fa-bars fa-lg"></i>
            </button>
        </div>
    </div>
</header>