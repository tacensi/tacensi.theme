<?php
/**
 * index
 * @author tacensi <tacensi@gmail.com>
 * @package tacensi
 * @version 1.3
 */
get_header();
?>
<main id="content" class="tabindex" tabindex="-1">

	<div class="container">

	<?php if ( have_posts() ) : ?>

		<?php while ( have_posts() ) : the_post(); ?>

			<?php get_template_part( 'partials/content' ); ?>

		<?php endwhile; ?>

	<?php else: ?>

		<?php get_template_tag( 'parts/404' ); ?>

	<?php endif; ?>

	<?php get_template_part( 'partials/nav', 'posts_nav' ); ?>

	</div>

</main>

<?php get_footer(); ?>
