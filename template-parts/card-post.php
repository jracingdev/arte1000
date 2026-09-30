<?php
/**
 * Card de post.
 *
 * @package arte1000
 */

?>
<article id="post-<?php the_ID(); ?>" <?php post_class( 'a1-post' ); ?> data-a1-reveal>
	<a class="a1-post__media a1-media" href="<?php the_permalink(); ?>" tabindex="-1" aria-hidden="true">
		<?php
		if ( has_post_thumbnail() ) {
			the_post_thumbnail( 'arte1000-card', array( 'class' => 'a1-media__img' ) );
		} else {
			echo '<div class="a1-weave"></div>';
		}
		?>
	</a>
	<div class="a1-post__body">
		<?php arte1000_posted_on(); ?>
		<h3 class="a1-post__title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
		<p><?php echo esc_html( get_the_excerpt() ); ?></p>
	</div>
</article>
