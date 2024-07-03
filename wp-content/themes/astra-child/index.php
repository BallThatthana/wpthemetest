<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Astra
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

get_header(); ?>
<?php if ( astra_page_layout() == 'left-sidebar' ) : ?>

	<?php get_sidebar(); ?>

<?php endif ?>
    <div id="hero-banner">
        <img src="https://static1.makeuseofimages.com/wordpress/wp-content/uploads/2024/01/holafly-stay-connected.jpg"/>
    </div>
    <h2 style="text-align: center;">Featured Products</h2>
    <div id="product-section">
        <?php 
            // Define query arguments
            $args = array(
                'post_type' => 'product',
                'posts_per_page' => 10
            );
        
            // Custom query
            $loop = new WP_Query( $args );
        
            if ( $loop->have_posts() ) {
                while ( $loop->have_posts() ) : $loop->the_post();
                    wc_get_template_part( 'content', 'product' );
                endwhile;
            } else {
                echo __( 'No products found' );
            }
        
            wp_reset_postdata();
        ?>
    </div>
    <div id="primary" <?php astra_primary_class(); ?>>
    <h2 style="text-align: center;">Blogs</h2>
    <?php
            astra_primary_content_top();

            astra_content_loop();

            astra_pagination();

            astra_primary_content_bottom();
            ?>
	</div>
    <div class="about-us">
        <h3>About Us</h3>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam vehicula felis ut eros lacinia, id molestie justo posuere. Nam eu purus sit amet urna bibendum mattis. Quisque quis magna semper, aliquet metus at, accumsan felis. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae.</p>
    </div>
<?php
if ( astra_page_layout() == 'right-sidebar' ) :

	get_sidebar();

endif;

get_footer();
