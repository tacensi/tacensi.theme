<!DOCTYPE html>
<html lang="pt-BR">
<head>
	<meta charset="utf-8">

	<meta name="viewport" content="width=device-width, initial-scale=1">

	<?php wp_head(); ?>
</head>
<body>
<a class="skip-link" href="#content">Skip to content</a>
<div id="page-top"></div>
<div id="site">

	<header class="site-header">

		<div class="container site-header__container">

			<h1 class="site-logo">
				<img src="<?php echo get_template_directory_uri(); ?>/img/logo.png" alt="tacensi logo" class="site-header__logo-img">
			</h1>

			<?php tacensi_get_menu( 'main' ); ?>

		</div>

	</header>
