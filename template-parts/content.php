<article id="post-<?php the_ID(); ?>" <?php post_class('post'); ?> <?php unifato_the_microdata( 'article' ); ?>>
  <div class="container-fluid">
    <div class="row">
      <div class="col">
        <div class="row no-gutters">
          <?php if( has_post_thumbnail() ) : ?>
            <div class="col entry-thumbnail-side">
              <figure 
                style="background-image: url(<?php echo get_the_post_thumbnail_url(get_the_ID(), 'unifato-archive'); ?>);">
                <a href="<?php the_permalink() ?>" class="pos-0 opacity-0"></a>
              </figure>
            </div><!-- /.col -->
          <?php endif; ?>

          <main class="col-sm-6">
            <?php if( has_post_thumbnail() ) : ?>
              <figure class="d-block d-sm-none entry-thumbnail">
                <?php
                  the_post_thumbnail( 'full' );
                ?>
                <a href="<?php the_permalink() ?>"><?php the_title() ?></a>
              </figure>
            <?php endif; ?>

            <div class="post-content">
              <h5 class="entry-title" itemprop="headline">
                <a href="<?php the_permalink() ?>" rel="bookmark" itemprop="url"><?php the_title() ?></a>
              </h5>

              <div class="entry-content" itemprop="text">
                <?php 
                  if ( has_excerpt() ) {
                    the_excerpt();
                  } else {
                    the_content( "" );
                  }
                ?>
              </div><!-- /.entry-content -->

              <footer class="entry-footer">
                <p>
                  <a href="<?php the_permalink() ?>" class="read-more-link">Read more</a>
                </p>
              </footer>

            </div><!-- /.post-content -->

          </main><!-- /.col-sm-6 -->
        </div><!-- /.row -->
      </div><!-- /.col -->

    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</article><!-- /.post -->