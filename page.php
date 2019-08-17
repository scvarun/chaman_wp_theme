<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Unifato
 */

get_header();
?>

  <?php
    /* Start the Loop */
    while ( have_posts() ) : the_post();
    ?>
      
      <article id="page-<?php the_ID(); ?>" <?php post_class(); ?>>
        <?php
          the_content( "" );
        ?>
      </article><!-- #post-<?php the_ID(); ?> -->

    <?php endwhile;
  ?>

<?php
get_footer();