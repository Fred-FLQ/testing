<?php
/**
 * The template for displaying AnsPress pages.
 *
 * @package WordPress
 * @subpackage Agito
 * @since Agito 2.0.0
 */
get_header(); 
?>

<?php if ( is_active_sidebar('sidebar') ) : ?>
    <div class="page-right-sidebar">
<?php else : ?>
    <div class="page-full-width">
<?php endif; ?>

        <?php
        $style = ( has_post_thumbnail() && boss_get_option( 'boss_cover_blog' ) ) ? 'style="background-image: url(' . get_the_post_thumbnail_url( $post ) . '); background-position: center;background-size: cover;background-repeat: none;" data-photo="yes"' : '';
        ?>

        <header class="page-cover table" <?php echo $style; ?>>
            <div class="table-cell page-header">
                <div class="cover-content">
                    <h1 class="post-title main-title"><i class="fa fa-comments" aria-hidden="true"></i> <?php the_title(); ?></h1>
                    <div class="table">
                        <div class="table-cell entry-meta">
                            <?php ap_question_metas( get_question_id() ); ?>
                        </div>
                        <div class="table-cell">
                            
                        </div>
                    </div>
                </div>
            </div>
        </header>
        
        <div id="primary" class="site-content">

            <div id="content" role="main">

                <?php while ( have_posts() ) : the_post(); ?>
                    <?php get_template_part( 'content', 'page' ); ?>
                    <?php comments_template( '', false ); ?>
                <?php endwhile; // end of the loop. ?>

            </div><!-- #content -->
        </div><!-- #primary -->

    <?php if ( is_active_sidebar('sidebar') ) : 
        get_sidebar('sidebar'); 
    endif; ?>
    </div>
<?php get_footer(); ?>
