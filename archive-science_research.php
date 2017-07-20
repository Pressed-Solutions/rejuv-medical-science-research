<?php
get_header();
get_template_part('template-part', 'head');
wp_enqueue_style( 'science-research' );
$header_image = get_field( 'science_research_archive_header_image', 'options' );
$header_title = get_field( 'science_research_header_title', 'options' );
?>

<div class="row page-header" <?php echo ( $header_image ? 'style="background-image: url(\'' . $header_image . '\');"' : '' ); ?>>
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

<div class="dmbs-main">
    <div class="container">
        <div class="row dmbs-content">
            <div class="col-md-12 dmbs-main science-research-articles">
            <?php

            if ( have_posts() ) {
                while ( have_posts() ) {
                    the_post();
                    ?>
                    <article <?php post_class( 'col-sm-12 col-md-4' ); ?>>
                        <?php
                        if ( has_post_thumbnail() ) {
                            echo '<a href="' . get_permalink() . '">' . wp_get_attachment_image( get_post_thumbnail_id(), 'science_article_thumb', false, array( 'class' => 'featured-image' ) ) . '</a>';
                        }
                        ?>
                        <h2 class="page-header">
                            <a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __( 'Permalink to %s', 'devdmbootstrap3' ), the_title_attribute( 'echo=0' ) ) ); ?>" rel="bookmark">
                                <?php the_title(); ?>
                            </a>
                        </h2>
                        <?php the_excerpt(); ?>
                        <p class="read-more">
                            <a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __( 'Permalink to %s', 'devdmbootstrap3' ), the_title_attribute( 'echo=0' ) ) ); ?>" rel="bookmark">Read More</a>
                        </p>
                    </article>
                    <?php
                }
                ?>
                <p class="pagination">
                <?php
                if ( get_next_posts_link() ) {
                    next_posts_link( '&larr;Older Articles' );

                    if ( get_previous_posts_link() ) {
                        echo ' | ';
                    }
                }
                if ( get_previous_posts_link() ) {
                    previous_posts_link( 'Newer Articles&rarr;' );
                }
                ?>
                </p>
                <?php
            } else {
                get_404_template();
            }

            ?>
            </div><!-- .dmbs-main -->

        </div><!-- .row.dmbs-content -->
    </div><!-- .container -->
</div><!-- .dmbs-main -->

<div class="row page-footer"></div>

<?php get_footer(); ?>
