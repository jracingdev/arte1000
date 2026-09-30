<?php
/**
 * Template principal (blog, arquivos e fallback).
 *
 * @package arte1000
 */

get_header();
?>

<main id="primary" class="a1-main">
	<header class="a1-pagehead">
		<div class="a1-container">
			<p class="a1-eyebrow"><?php esc_html_e( 'Inspiração', 'arte1000' ); ?></p>
			<h1 class="a1-pagehead__title">
				<?php
				if ( is_home() && ! is_front_page() ) {
					single_post_title();
				} elseif ( is_archive() ) {
					the_archive_title();
				} elseif ( is_search() ) {
					/* translators: %s: termo buscado */
					printf( esc_html__( 'Resultados para “%s”', 'arte1000' ), esc_html( get_search_query() ) );
				} else {
					esc_html_e( 'Blog', 'arte1000' );
				}
				?>
			</h1>
			<?php the_archive_description( '<div class="a1-pagehead__desc">', '</div>' ); ?>
		</div>
	</header>

	<div class="a1-container a1-section--tight">
		<?php if ( have_posts() ) : ?>
			<div class="a1-posts">
				<?php
				while ( have_posts() ) :
					the_post();
					get_template_part( 'template-parts/card', 'post' );
				endwhile;
				?>
			</div>
			<?php arte1000_pagination(); ?>
		<?php else : ?>
			<?php get_template_part( 'template-parts/content', 'none' ); ?>
		<?php endif; ?>
	</div>
</main>

<?php
get_footer();
