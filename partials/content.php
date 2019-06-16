<article id="article-<?php the_ID(); ?>" <?php post_class(); ?>>

		<?php tacensi_get_article_header(); ?>

		<div class="article-content">

			<?php the_content(); ?>

		</div><!-- .article-content -->

		<footer class="article-footer">

			<?php tacensi_get_article_footer(); ?>

		</footer><!-- .article-footer -->

</article>
