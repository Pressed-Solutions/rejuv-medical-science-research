<?php
get_header();
get_template_part('template-part', 'head');
$header_image = get_field( 'science_research_archive_header_image', 'options' );
$header_title = get_field( 'science_research_header_title', 'options' );
?>

<div class="row page-header" <?php echo ( $header_image ? 'style="background-image: url(\'' . $header_image . '\');"' : '' ); ?>>
    <h2 class="container">
        <?php echo ( $header_title ? $header_title : get_the_archive_title() ); ?>
    </h2>
</div>

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
                        echo wp_get_attachment_image( get_post_thumbnail_id(), 'science_article_thumb' );
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

    </div>
    <!-- .row.dmbs-content -->
</div>
<!-- .container -->

<div class="row page-footer"></div>

<?php get_footer(); ?>
