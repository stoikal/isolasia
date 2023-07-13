<?php
include __DIR__ . '/../../inc/options.php';
?>

<header
    class="
        relative
        <?= $da_color_bg ?>
        <?= $da_color_text ?>
    "
    style="
        background-color: <?= $he_color_bg ?>;
        color: <?= $he_color_text ?>;
    "
>
    <div
        class="<?= ($he_show_border && $he_is_border_full_width) ? 'border-b' : ''?>"
        style="border-color: <?= $he_color_border ?>;"
    >
        <div
            class="
                mx-auto md:px-4
                <?= $he_max_width ?>
            "
        >
            <div
                class="
                    <?= ($he_show_border && !$he_is_border_full_width) ? 'border-b' : ''?>
                "
                style="
                    border-color: <?= $he_color_border ?>;
                    display: grid;
                    grid-template-columns: 1fr auto 1fr;
                "
            >
                <div class="flex items-end">
                    <button
                        type="button"
                        class="md:hidden w-11 h-11 side-drawer-trigger"
                    >
                        <i class="fas fa-bars fa-lg"></i>
                    </button>
                </div>

                <div class="text-center pt-2">
                    <?php
                    $custom_logo_id = get_theme_mod('custom_logo');
                    $logo_url = wp_get_attachment_image_url($custom_logo_id, 'full');
            
                    if ( $he_show_logo && $logo_url ) :
                    ?>
                        <div class="flex-shrink-0 flex align-baseline justify-center mb-2">
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
                            class="w-full text-2xl md:text-3xl pl-2 font-display mb-1.5 <?= $da_color_text ?>"
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

                <div class="flex justify-end items-end">
                    <?php get_template_part('template-parts/header/dark-mode-toggle') ?>
                    <?php get_template_part('template-parts/header/search-form') ?>
                </div>
            </div>
        </div>
    </div>
    <nav
        class="
            hidden md:block
            <?= $da_color_bg ?>
            <?= $da_color_text ?>
            <?= ($he_show_border && $he_is_border_full_width) ? 'border-b' : ''?>
        "
        style="
            border-color: <?= $he_color_border ?>;
        "
    >
        <div
            class="
                mx-auto md:px-4
                <?= $he_max_width ?>
            "
        >
            <?php if ( has_nav_menu( 'primary' ) ) : ?>
                <div
                    class="
                        text-center flex justify-center
                        <?= ($he_show_border && !$he_is_border_full_width) ? 'border-b' : ''?>
                    "
                    style="
                        border-color: <?= $he_color_border ?>;
                    "
                >
                    <?php
                    wp_nav_menu(
                    array(
                        'theme_location' => 'primary',
                        'menu_class' => 'isolasia_primary-menu',
                        'fallback_cb' => false
                    )
                    );
                    ?>
                </div>
            <?php endif; ?>
        </div>
    </nav>
</header>
