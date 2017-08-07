<?php
get_header();
get_template_part('template-part', 'head');
wp_enqueue_style( 'science-research' );
include( 'inc/science-research-nav.php' ); ?>

<div class="dmbs-main science-articles-grid">
    <div class="container">
        <div class="row dmbs-content">
            <div class="col-md-12 dmbs-main science-research-articles">
            <?php
            echo '<div class="row dmbs-content">
            <h2 class="col-md-12 science-term-header">' . single_term_title( NULL, false ) . '</h2>';

            if ( have_posts() ) {
                while ( have_posts() ) {
                    the_post();
                    include( 'excerpt-science_research.php' );
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
