<?php
/**
 * Comentários.
 *
 * @package arte1000
 */

if ( post_password_required() ) {
	return;
}
?>
<section id="comments" class="a1-comments">
	<?php if ( have_comments() ) : ?>
		<h2 class="a1-comments__title">
			<?php
			/* translators: %s: número de comentários */
			printf( esc_html( _n( '%s comentário', '%s comentários', get_comments_number(), 'arte1000' ) ), esc_html( number_format_i18n( get_comments_number() ) ) );
			?>
		</h2>
		<ol class="a1-comments__list">
			<?php wp_list_comments( array( 'style' => 'ol', 'avatar_size' => 48, 'short_ping' => true ) ); ?>
		</ol>
		<?php the_comments_navigation(); ?>
	<?php endif; ?>
	<?php comment_form(); ?>
</section>
