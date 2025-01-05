<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package juedisches-museum
 */

get_header();
?>

	<main id="primary" class="site-main">
      <section class="default-section">
         <div class="container">
            <?php if ( have_posts() ) : ?>

               <header class="page-header">
                  <h1 class="page-title">
                     <?php
                     /* translators: %s: search query. */
                     printf( esc_html__( 'Search Results for: %s', 'juedisches-museum' ), '<span>' . get_search_query() . '</span>' );
                     ?>
                  </h1>
               </header><!-- .page-header -->
               <div class="blog-listing text-left">
                  <div class="row">
                     <?php
                     /* Start the Loop */
                     while ( have_posts() ) :
                        the_post();
                        ?>
                        <div class="col-lg-4 col-sm-6 cols">
                           <?php
                           /**
                            * Run the loop for the search to output the results.
                           * If you want to overload this in a child theme then include a file
                           * called content-search.php and that will be used instead.
                           */
                           get_template_part( 'template-parts/content', 'search' );
                           ?>
                        </div>
                        <?php
                     endwhile;
                     the_posts_navigation();
                     ?>
                  </div>
               </div>
            <?php
            else :
               get_template_part( 'template-parts/content', 'none' );
            endif;
            ?>
         </div>
      </section>
	</main><!-- #main -->

<?php
get_footer();
