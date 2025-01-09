<?php
/**
 * Šablona pro zobrazení "nic nenalezeno"
 */
?>

<section class="no-results not-found">
    <header class="page-header">
        <h1 class="page-title"><?php esc_html_e('Nic nenalezeno', 'my-theme-2'); ?></h1>
    </header>

    <div class="page-content">
        <?php
        if (is_home() && current_user_can('publish_posts')) :
            printf(
                '<p>' . wp_kses(
                    /* translators: 1: link to WP admin new post page. */
                    __('Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'my-theme-2'),
                    array(
                        'a' => array(
                            'href' => array(),
                        ),
                    )
                ) . '</p>',
                esc_url(admin_url('post-new.php'))
            );
        elseif (is_search()) : ?>
            <p><?php esc_html_e('Omlouváme se, ale pro váš dotaz nebyly nalezeny žádné výsledky. Zkuste prosím vyhledávat s jinými klíčovými slovy.', 'my-theme-2'); ?></p>
            <?php get_search_form();
        else : ?>
            <p><?php esc_html_e('Zdá se, že zde není žádný obsah. Zkuste prosím vyhledávat s jinými klíčovými slovy.', 'my-theme-2'); ?></p>
            <?php get_search_form();
        endif;
        ?>
    </div>
</section>
