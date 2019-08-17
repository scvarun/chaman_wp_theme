<?php
/**
 * Blog Elements
 *
 * @package Unifato
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

if ( ! function_exists( 'unifato_post_thumbnail' ) ) {
	add_action( 'unifato_post_thumbnail', 'unifato_post_thumbnail', 10 );

	/**
	 * Displays an optional post thumbnail.
	 *
	 * @since 1.0.0
	 */
	function unifato_post_thumbnail() {
		if ( post_password_required() || is_attachment() || ! has_post_thumbnail() ) {
			return;
		}

		if ( is_singular() ) :
			?>
			<figure class="entry-thumbnail">
				<?php the_post_thumbnail( 'unifato-archive' ); ?>
			</figure><!-- .entry-thumbnail -->
		<?php else : ?>
			<a class="entry-thumbnail" href="<?php the_permalink(); ?>" aria-hidden="true" tabindex="-1">
				<?php
				the_post_thumbnail( 'unifato-archive', array(
					'alt' => the_title_attribute( array(
						'echo' => false,
					) )
				) );
				?>
			</a><!-- /.entry-thumbnail -->
		<?php
		endif; // End is_singular().
	}
}

if ( ! function_exists( 'unifato_the_title' ) ) {
  add_action( 'unifato_entry_header', 'unifato_the_title', 10 );

	/**
	 * Generate Post Title for blog post pages
	 *
	 * @since 1.0.0
	 */
	function unifato_the_title() {
		if ( is_singular() ) :
			the_title( '<h1 class="entry-title" itemprop="headline">', '</h1>' );
		else :
			the_title( '<h2 class="entry-title" itemprop="headline"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark" itemprop="url">', '</a></h2>' );
		endif;
	}
}

if ( ! function_exists( 'unifato_entry_meta' ) ) {
  add_action( 'unifato_entry_header', 'unifato_entry_meta', 20 );

	/**
	 * Blog Post Entry
	 *
	 * @since 1.0.0
	 */
	function unifato_entry_meta() {
		if ( 'post' === get_post_type() ) :
			?>
			<div class="entry-meta">
				<?php
				unifato_posted_on();
				unifato_post_comments();
				unifato_posted_by();
        unifato_edit_post();
				?>
			</div><!-- .entry-meta -->
		<?php endif;
	}
}

if ( ! function_exists( 'unifato_posted_on' ) ) {
	/**
	 * Prints HTML with meta information for the current post-date/time.
	 *
	 * @since 1.0.0
	 */
	function unifato_posted_on() {
		$time_string = sprintf(
			'<time class="entry-time meta-date" datetime="%1$s">%2$s</time>',
			esc_attr( get_the_date( DATE_W3C ) ),
			esc_html( get_the_date() )
		);

		$time_string = '<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>';

		echo '<span class="posted-on"><i class="feather-calendar"></i>' . $time_string . '</span>'; // WPCS: XSS OK.
	}
}

if ( ! function_exists( 'unifato_post_comments' ) ) {
	/**
	 * Prints Number of comments
	 *
	 * @since 1.0.0
	 */
	function unifato_post_comments() {
		if ( ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
			echo '<span class="meta-reply"><i class="feather-message-circle"></i>';
				comments_popup_link( __( 'Leave a comment', 'unifato' ), __( '1 Comment', 'unifato' ), __( '% Comments', 'unifato' ) );
			echo '</span>';
		}
	}
}

if ( ! function_exists( 'unifato_posted_by' ) ) {
	/**
	 * Prints HTML with meta information for the current author.
	 *
	 * @since 1.0.0
	 */
	function unifato_posted_by() {
		$byline = sprintf(
			/* translators: %s: post author. */
			esc_html_x( 'by %s', 'post author', 'unifato' ),
			'<a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a>'
		);

		echo '<span class="author vcard"><i class="feather-user"></i>' . $byline . '</span>'; // WPCS: XSS OK.
	}
}

if ( ! function_exists( 'unifato_edit_post' ) ) {
	/**
	 * Edit Post link
	 *
	 * @since 1.0.0
	 */
	function unifato_edit_post() {
    edit_post_link(
			sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
					__( 'Edit <span class="screen-reader-text">%s</span>', 'unifato' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				get_the_title()
			),
			'<span class="edit-link"><i class="feather-folder"></i>',
			'</span>'
		);
	}
}

if ( ! function_exists( 'unifato_post_content' ) ) {
	/**
	 * Display Excerpt or Content
	 *
	 * @since 1.0.0
	 */
	function unifato_post_content() {
		if ( is_singular() ) :
		?>
			<div class="entry-content<?php echo ( get_post_type() == "post" ) ? ' first-char-large': ''; ?>" itemprop="text">
				<?php
					the_content( "" );

					wp_link_pages( array(
      			'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'unifato' ),
      			'after'  => '</div>',
      		) );
				?>
			</div><!-- .entry-content -->
		<?php else : ?>
      <div class="entry-content" itemprop="text">
				<?php
					//if ( generate_show_excerpt() ) {
					if ( has_excerpt() ) {
						the_excerpt();
					} else {
						the_content( "" );

						wp_link_pages( array(
							'before' => '<div class="page-links">' . __( 'Pages:', 'unifato' ),
							'after'  => '</div>',
						) );
					}
        ?>
			</div><!-- .entry-content -->
		<?php
		endif; // End is_singular().
	}
}

if ( ! function_exists( 'unifato_read_more' ) ) {
  add_action( 'unifato_entry_footer', 'unifato_read_more', 10 );

	/**
	 * Read More button after blog posts
	 *
	 * @since 1.0.0
	 */
	function unifato_read_more() {
		if ( is_singular() )
		return;

		?>
    <a href="<?php echo esc_url(get_permalink()); ?>" class="read-more-link btn btn-fancy">
      <?php echo esc_html__('Read more', 'unifato'); ?> <i class="feather-arrow-right"></i>
    </a>
    <?php
	}
}

if ( ! function_exists( 'unifato_post_categories' ) ) {
  add_action( 'unifato_entry_footer', 'unifato_post_categories', 20 );

	/**
	 * Display Post Categories & tags after blog posts
	 *
	 * @since 1.0.0
	 */
	function unifato_post_categories() {
    if ( is_singular( 'post' ) ) {

      if( !in_category( 'Uncategorized' ) ) {
        /* translators: used between list items, there is a space after the comma */
  			$categories_list = get_the_category_list();
  			if ( $categories_list ) {
  				echo '<div class="tagcloud cat-links"><small>' . esc_html__( 'Posted in:', 'unifato' ) . '</small>' . $categories_list . '</div>';
  			}
      }

      /* translators: used between list items, there is a space after the comma */
      $tags_list = get_the_tag_list();
      if ( $tags_list ) {
        echo '<div class="tagcloud"><small>' . esc_html__( 'Tagged:', 'unifato' ) . '</small>' . $tags_list . '</div>';
      }
		}
	}
}

if ( ! function_exists( 'unifato_paging_nav' ) ) {
  /**
   * Display navigation to next/previous set of posts when applicable.
   *
   * @since 1.0.0
   *
   * @param int/boolean $max_num_pages
   * @return void
   */
  function unifato_paging_nav($max_num_pages = false) {

  	if ($max_num_pages === false) {
  		global $wp_query;
  		$max_num_pages = $wp_query -> max_num_pages;
  	}

  	$big = 999999999; // need an unlikely integer

  	$args = array(
  		'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
  		'format' => '?paged=%#%',
  		'current' => max( 1, get_query_var('paged') ),
  		'total' => $max_num_pages,
  		'prev_next'		=> false,
  		'prev_text' 	=> '',
  		'next_text' 	=> '',
  		'end_size'		=> 1,
  		'mid_size'		=> 2,
  		'type' 			=> 'array',
  	);

  	$links = paginate_links( $args );

  	if (!empty($links)):  ?>

  		<nav class="site-pagination">
  			<ul class="pager list-unstyled">
  				<li class="prev-outer disabled">
  					<?php echo get_previous_posts_link('<i class="feather-chevron-left"></i>'); ?>
  				</li>

          <?php  if (is_array($links)): ?>
            <?php foreach ($links as $link): ?>
              <?php
              if (strstr($link,'href')):
                echo '<li>'.$link.'</li>';
              else: ?>
                <li class="current">
                  <?php echo strip_tags($link); ?>
                </li>
              <?php endif; ?>
            <?php endforeach; ?>
          <?php endif; ?>

  				<li class="next-outer">
  					<?php echo get_next_posts_link('<i class="feather-chevron-right"></i>'); ?>
  				</li>
  			</ul><!-- /.pager -->

        <span class="page-info">
          <?php
            echo esc_html__( 'Page ', 'unifato' ) . $args['current'] . esc_html__( ' of ', 'unifato' ) . $max_num_pages;
            // echo esc_html__( 'Page ', 'unifato' ) . ( get_query_var('paged') ? get_query_var('paged') : 1 ) . esc_html__( ' of ', 'unifato' ) . $wp_query->max_num_pages;
          ?>
        </span>
  		</nav><!-- /.site-navigation -->
  	<?php endif;
  }
}

if ( ! function_exists( 'unifato_comments_list' ) ) {
	/**
   * Display custom styles list of comments
   *
   * @since 1.0.0
   *
   * @param int/boolean $max_num_pages
   * @return void
   */
	function unifato_comments_list ($comment, $args, $depth) {
		$GLOBALS['comment'] = $comment; ?>
		<li id="comment-<?php comment_ID() ?>" <?php comment_class('single-comment') ?>>
			<div class="comment-block">
				<?php if ($comment->comment_approved == '0') : ?>
					<p><span class="active-color"><?php esc_html_e('Your comment is awaiting moderation.', 'unifato'); ?></span></p>
				<?php endif; ?>

				<div class="comment-author vcard">
					<?php echo get_avatar($comment,$size= '60' ) ?>
					<b class="url fn n"><?php comment_author_link() ?></b> <span class="says sr-only"><?php esc_html_e('says:', 'unifato'); ?></span>

					<a class="left" href="<?php echo get_comment_link() ?>">
						<time datetime="<?php echo esc_attr( get_comment_date( 'c' ) ) ?>" title="<?php echo esc_attr( get_comment_time( 'l, F jS, Y' ) ) ?>">
							<?php printf( esc_html__( '%s ago', 'unifato' ), human_time_diff( get_comment_time( 'U' ), current_time( 'timestamp' ) ) ) ?>
						</time>
					</a>
				</div>

				<div class="comment-content">
					<?php comment_text() ?>
				</div><!-- /.comment-content -->

				<div class="comment-metadata clearfix">
					<?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
				</div><!-- /.comment-metadata -->
			</div><!-- /.comment-block -->
		<?php
	}
}

if ( ! function_exists( 'unifato_alt_search_form' ) ) {
  /**
	 * An alternative Search form
	 *
	 * @since 1.0.0
	 */
	function unifato_alt_search_form() {
		?>
		<form class="form error-search-form w-75" role="search" method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>">
      <div class="form-group">
        <div class="input-group input-group-lg">
					<label for="search-field" class="screen-reader-text">
						<?php esc_html_e( 'Search for', 'unifato' ); ?>
					</label>

					<input id="search-field" type="search" class="form-control" placeholder="<?php echo esc_attr_x( 'Search this site...', 'placeholder', 'unifato' ); ?>" value="" name="s">

          <div class="input-group-append">
            <button type="submit" name="submit" class="btn btn-primary">
              <i class="feather-search"></i>
            </button>
          </div><!-- /.input-group-append -->
        </div><!-- /.input-group -->
      </div><!-- /.form.group -->
    </form><!-- /.error-search-form -->
    <?php
	}
}
