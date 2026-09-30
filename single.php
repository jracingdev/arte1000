<?php
/**
 * Post individual.
 *
 * @package arte1000
 */

get_header();
?>

<main id="primary" class="a1-main">
	<?php
	while ( have_posts() ) :
		the_post();
		?>
		<article id="post-<?php the_ID(); ?>" <?php post_class( 'a1-article' ); ?>>
			<header class="a1-pagehead a1-pagehead--center">
				<div class="a1-container a1-container--narrow">
					<?php arte1000_posted_on(); ?>
					<h1 class="a1-pagehead__title"><?php the_title(); ?></h1>
				</div>
			</header>
			<?php if ( has_post_thumbnail() ) : ?>
				<div class="a1-container a1-article__cover"><?php the_post_thumbnail( 'arte1000-wide' ); ?></div>
			<?php endif; ?>
			<div class="a1-container a1-container--narrow a1-prose">
				<?php
				the_content();
				wp_link_pages();
				?>
			</div>
			<div class="a1-container a1-container--narrow">
				<?php
				the_post_navigation(
					array(
						'prev_text' => '<span>' . esc_html__( 'Anterior', 'arte1000' ) . '</span>%title',
						'next_text' => '<span>' . esc_html__( 'Próximo', 'arte1000' ) . '</span>%title',
					)
				);
				if ( comments_open() || get_comments_number() ) {
					comments_template();
				}
				?>
			</div>
		</article>
	<?php endwhile; ?>
</main>

<?php
get_footer();
