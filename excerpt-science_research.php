<article <?php post_class( 'col-sm-12 col-md-4' ); ?>>
    <h3 class="page-header">
        <?php
        if ( get_field( 'article_url' ) ) {
            echo '<a href="' . get_field( 'article_url' ) . '" target="_blank" rel="noopener">' . get_the_title() . '</a>';
        } else {
            the_title();
        }
        ?>
    </h3>
    <?php
    echo get_the_term_list( get_the_ID(), 'treatment_taxonomy', '<p class="treatment-terms meta">', ', ', '</p>' );

    echo rejuv_get_science_article_meta();
    ?>

    <p class="excerpt"><?php echo get_the_excerpt(); ?></p>
    <p class="read-more">
        <a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __( 'Permalink to %s', 'devdmbootstrap3' ), the_title_attribute( 'echo=0' ) ) ); ?>" rel="bookmark">Read My Summary</a>
    </p>
</article>
