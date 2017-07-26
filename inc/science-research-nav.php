<?php
$header_image = get_field( 'science_research_archive_header_image', 'options' );
$header_title = get_field( 'science_research_header_title', 'options' );
?>

<div class="row page-header science-research-header" <?php echo ( $header_image ? 'style="background-image: url(\'' . $header_image . '\');"' : '' ); ?>>
    <h2>
        <?php echo ( $header_title ? $header_title : get_the_archive_title() ); ?>
    </h2>
</div>

<?php if ( has_nav_menu( 'science_research_articles_menu' ) ) : ?>
    <div class="row science-articles-nav">
        <nav class="navbar navbar-inverse" role="navigation">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-1-collapse">
                        <span class="sr-only"><?php _e('Toggle navigation','devdmbootstrap3'); ?></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>

                <?php
                wp_nav_menu( array(
                        'theme_location'    => 'science_research_articles_menu',
                        'depth'             => 2,
                        'container'         => 'div',
                        'container_class'   => 'collapse navbar-collapse navbar-1-collapse',
                        'menu_class'        => 'nav navbar-nav',
                        'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
                        'walker'            => new wp_bootstrap_navwalker(),
                ));
                ?>
            </div>
        </nav>
    </div>
<?php endif; ?>
