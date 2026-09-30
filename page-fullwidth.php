<?php
/**
 * Template Name: Largura total (sem título)
 *
 * Ideal para montar páginas com blocos do editor.
 *
 * @package arte1000
 */

get_header();
?>

<main id="primary" class="a1-main a1-fullwidth">
	<?php
	while ( have_posts() ) :
		the_post();
		the_content();
	endwhile;
	?>
</main>

<?php
get_footer();
