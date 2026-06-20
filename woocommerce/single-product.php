<?php
/**
 * The Template for displaying all single products
 *
 *
 * @see         https://woocommerce.com/document/template-structure/
 * @package     WooCommerce\Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

get_header( 'shop' ); ?>

	<?php
		/**
		 * woocommerce_before_main_content hook.
		 *
		 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
		 * @hooked woocommerce_breadcrumb - 20
		 */
		do_action( 'woocommerce_before_main_content' );
	?>

		<?php while ( have_posts() ) : ?>


			<?php the_post(); ?>

			<?php wc_get_template_part( 'content', 'single-product' );

			$location   = get_field( 'location' );
			$ages   = get_field( 'ages' );
			$start_date = get_field( 'start_date' );
			$end_date = get_field( 'end_date' );
			?>

			<div class='acf-fields'>

				<?php if ( $location ) : ?>
					<div class='acf-half'>
						<h2 class='acf-field-header location'>Location</h2>
						<div class="acf-field acf-field-location"><?php echo $location; ?></div>
					</div>
				<?php endif; ?>

				<?php if ( $ages ) : ?>
					<div class='acf-half'>
						<h2 class='acf-field-header ages'>Ages</h2>
						<div class="acf-field acf-field-ages"><?php echo $ages; ?></div>
					</div>
				<?php endif; ?>

				<div class='acf-dates'>
					<div class='acf-half'>
						<?php if ( $start_date ) : ?>
							<h2 class='acf-field-header start'>Start Date</h2>
							<div class="acf-field acf-field-start_date">
								<?php echo date_i18n( 'F j, Y', strtotime( $start_date ) ); ?>
							</div>
						<?php endif; ?>
					</div>

					<div class='acf-half'>
						<?php if ( $end_date ) : ?>
							<h2 class='acf-field-header end'>End Date</h2>
							<div class="acf-field acf-field-end_date">
								<?php echo date_i18n( 'F j, Y', strtotime( $end_date ) ); ?>
							</div>
						<?php endif; ?>
					</div>
				</div>

			</div>


		<?php endwhile; // end of the loop. ?>

	<?php
		/**
		 * woocommerce_after_main_content hook.
		 *
		 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
		 */
		do_action( 'woocommerce_after_main_content' );
	?>

	<?php
		/**
		 * woocommerce_sidebar hook.
		 *
		 * @hooked woocommerce_get_sidebar - 10
		 */
		do_action( 'woocommerce_sidebar' );
	?>

<?php
get_footer( 'shop' );

/* Omit closing PHP tag at the end of PHP files to avoid "headers already sent" issues. */
