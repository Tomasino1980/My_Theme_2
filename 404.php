
<?php
/**
 * Šablona pro stránku 404 (nenalezeno)
 */

get_header(); ?>

<main id="primary" class="site-main">
    <div class="container">
        <section class="error-404 not-found">
            <header class="page-header">
                <h1 class="page-title"><?php esc_html_e('Stránka nenalezena', 'my-theme-2'); ?></h1>
            </header>

            <div class="page-content">
                <p><?php esc_html_e('Zdá se, že se stránka, kterou hledáte, neexistuje. Zkuste vyhledávání:', 'my-theme-2'); ?></p>
                <?php get_search_form(); ?>
            </div>
        </section>
    </div>
</main>

<?php get_footer(); ?>
