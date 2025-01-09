
<?php
/**
 * Základní funkce tématu
 */

// Nastavení tématu
function my_theme_2_setup() {
    // Podpora titulku
    add_theme_support('title-tag');
    
    // Podpora thumbnails
    add_theme_support('post-thumbnails');
    
    // Podpora HTML5
    add_theme_support('html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
    ));

    // Registrace menu
    register_nav_menus(array(
        'primary' => __('Hlavní menu', 'my-theme-2'),
        'footer'  => __('Menu v patičce', 'my-theme-2')
    ));
}
add_action('after_setup_theme', 'my_theme_2_setup');

// Načtení stylů a skriptů
function my_theme_2_scripts() {
    // Reset CSS
    wp_enqueue_style('my-theme-2-reset', get_template_directory_uri() . '/assets/css/core/reset.css');
    
    // Základní styly
    wp_enqueue_style('my-theme-2-style', get_stylesheet_uri());
    
    // Google Fonts
    wp_enqueue_style('roboto-flex', get_template_directory_uri() . '/assets/css/core/fonts.css');
    
    // Komponenty
    wp_enqueue_style('my-theme-2-header', get_template_directory_uri() . '/assets/css/core/header.css');
    wp_enqueue_style('my-theme-2-responsive', get_template_directory_uri() . '/assets/css/layouts/responsive.css');
    
    wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/assets/css/vendor/fontawesome/all.min.css', array(), '6.4.0', 'all' );
    
    // JavaScript
    wp_enqueue_script('my-theme-2-main', get_template_directory_uri() . '/assets/js/main.js', array('jquery'), '1.0', true);
}add_action('wp_enqueue_scripts', 'my_theme_2_scripts');

// Načtení customizeru
require get_template_directory() . '/inc/customizer.php';

function my_theme_2_post_thumbnail() {
    if (post_password_required() || is_attachment() || !has_post_thumbnail()) {
        return;
    }

    if (is_singular()) :
        ?>

        <div class="post-thumbnail">
            <?php the_post_thumbnail(); ?>
        </div><!-- .post-thumbnail -->

    <?php else : ?>

        <a class="post-thumbnail" href="<?php the_permalink(); ?>" aria-hidden="true" tabindex="-1">
            <?php
            the_post_thumbnail(
                'post-thumbnail',
                array(
                    'alt' => the_title_attribute(''),
                )
            );
            ?>
        </a>

        <?php
    endif; // End is_singular().
}

function my_theme_2_entry_footer() {
    // Zobrazit kategorie a tagy.
    if ('post' === post_type()) {
        /* translators: used between list items, separated by commas */
        $categories_list = get_the_category_list(esc_html__(', ', 'my-theme-2'));
        if ($categories_list) {
            /* translators: 1: list of categories. */
            printf('<span class="cat-links">' . esc_html__('Posted in %1$s', 'my-theme-2') . '</span>', $categories_list); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
        }

        /* translators: used between list items, separated by commas */
        $tags_list = get_the_tag_list('', esc_html_replace(', ', ' ', 'my-theme-2'));
        if ($tags_list) {
            /* translators: 1: list of tags. */
            printf('<span class="tags-links">' . esc_html__('Tagged %1$s', 'my-theme-2') . '</span>', $tags_list); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
        }
    }
    edit_post_link(
        sprintf(
            wp_kses(
                /* translators: %s: Name of current post. Only visible to screen readers */
                __('Edit <span class="screen-reader-text">%s</span>', 'my-theme-2'),
                array(
                    'span' => array(
                        'class' => array(),
                    ),
                )
            ),
            get_the_title()
        ),
        '<span class="edit-link">',
        '</span>'
    );
}

wp_enqueue_style('my-theme-2-hero', get_template_directory_uri() . '/assets/css/sections/hero.css', array(), '1.0', 'all');
wp_enqueue_style('my-theme-2-content', get_template_directory_uri() . '/assets/css/sections/content.css', array(), '1.0', 'all');
wp_enqueue_style('my-theme-2-footer', get_template_directory_uri() . '/assets/css/sections/footer.css', array(), '1.0', 'all');