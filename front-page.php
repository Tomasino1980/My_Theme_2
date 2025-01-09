
<?php
/**
 * Šablona úvodní stránky
 */

get_header(); ?>

<main id="primary" class="site-main">
    <div class="container">
            <section class="hero-section">
                <div class="hero-content">
                    <?php
                    $hero_title = get_theme_mod('hero_title', 'Výchozí nadpis');
                    $hero_subtitle = get_theme_mod('hero_subtitle', 'Výchozí podnadpis');
                    $hero_button_text = get_theme_mod('hero_button_text', 'Tlačítko');
                    $hero_button_url = get_theme_mod('hero_button_url', '#');
                    ?>

                    <h2 class="hero-title"><?php echo esc_html($hero_title); ?></h2>
                    <p class="hero-subtitle"><?php echo esc_html($hero_subtitle); ?></p>
                    <a href="<?php echo esc_url($hero_button_url); ?>" class="hero-button"><?php echo esc_html($hero_button_text); ?></a>
                </div>
            </section>
        </div>
</main>

<?php get_footer(); ?>

<section class="about-section">
    <div class="container">
        <div class="about-content">
            <div class="about-text">
                <?php echo get_theme_mod('about_text', 'Výchozí text o nás.'); ?>
            </div>
            <div class="about-image">
                <?php
                $about_image = get_theme_mod('about_image');
                if ($about_image) : ?>
                    <img src="<?php echo esc_url($about_image); ?>" alt="O nás">
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>
