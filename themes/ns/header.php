<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta http-equiv="Content-Type" content="<?php bloginfo( 'html_type' ); ?>; charset=<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">

	<link rel="profile" href="http://gmpg.org/xfn/11" />
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
	<div class="wrapper">
		<div class="wrapper__inner">
			<header class="header">
				<div class="shell">
					<div class="header__inner">
						<div class="logo-holder">
							<a href="<?php echo home_url('/'); ?>" class="logo">
								<img src="<?php bloginfo('stylesheet_directory'); ?>/resources/images/logo.png" alt="ns" />
							</a>
						</div><!-- /.logo-holder -->
					</div><!-- /.header__inner -->
				</div><!-- /.shell -->
			</header><!-- /.header -->

			<div class="main">
