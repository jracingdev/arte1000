<?php
/**
 * Página padrão.
 *
 * @package arte1000
 */

get_header();
?>

<main id="primary" class="a1-main">
	<?php
	while ( have_posts() ) :
		the_post();
		$a1_is_wc_page = function_exists( 'is_cart' ) && ( is_cart() || is_checkout() || is_account_page() );
		?>
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<header class="a1-pagehead">
				<div class="a1-container">
					<h1 class="a1-pagehead__title"><?php the_title(); ?></h1>
				</div>
			</header>
			<div class="a1-container <?php echo $a1_is_wc_page ? '' : 'a1-container--narrow a1-prose'; ?> a1-section--tight">
				<?php the_content(); ?>
			</div>
		</article>
	<?php endwhile; ?>
</main>

<?php
get_footer();
