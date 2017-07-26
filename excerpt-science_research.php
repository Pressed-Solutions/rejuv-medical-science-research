<article <?php post_class( 'col-sm-12 col-md-4' ); ?>>
    <h3 class="page-header">
        <a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __( 'Permalink to %s', 'devdmbootstrap3' ), the_title_attribute( 'echo=0' ) ) ); ?>" rel="bookmark">
            <?php the_title(); ?>
        </a>
    </h3>
    <?php the_excerpt(); ?>
    <p class="read-more">
        <a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __( 'Permalink to %s', 'devdmbootstrap3' ), the_title_attribute( 'echo=0' ) ) ); ?>" rel="bookmark">Read More</a>
    </p>
</article>
