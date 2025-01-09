
<?php
/**
 * Šablona pro obsah příspěvku
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <header class="entry-header">
        <?php
        if (is_singular()) :
            the_title('<h1 class="entry-title">', '</h1>');
        else :
            the_title('<h2 class="entry-title"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h2>');
        endif;
        ?>
    </header>

    <?php if (has_post_thumbnail()) : ?>
        <div class="post-thumbnail">
            <?php the_post_thumbnail(); ?>
        </div>
    <?php endif; ?>

    <div class="entry-content">
        <?php
        the_excerpt();

        wp_link_pages(
            array(
                'before' => '<div class="page-links">' . esc_html__('Stránky:', 'my-theme-2'),
                'after'  => '</div>',
            )
        );
        ?>
    </div>

    <footer class="entry-footer">
        <?php my_theme_2_entry_footer(); ?>
    </footer>
</article>
