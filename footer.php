
<?php
/**
 * Patička šablony
 */
?>

<footer id="colophon" class="site-footer">
    <div class="container">
        <div class="footer-widgets">
            <?php dynamic_sidebar('sidebar-1'); ?>
        </div>
        <div class="site-info">
            <p>© <?php echo date('Y'); ?> <?php bloginfo('name'); ?>. Všechna práva vyhrazena.</p>
            <nav class="footer-navigation">
                <?php
                wp_nav_menu(array(
                    'theme_location' => 'footer',
                    'menu_id'       => 'footer-menu',
                    'container'     => false,
                ));
                ?>
            </nav>
        </div>
    </div>
</footer>

<?php wp_footer(); ?>

</body>
</html>
