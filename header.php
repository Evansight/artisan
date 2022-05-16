<?php
/**
 * Header
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<!-- Set up Meta -->
	<meta http-equiv="X-UA-Compatible" content="IE=edge"/>
	<meta charset="<?php bloginfo( 'charset' ); ?>">

	<!-- Set the viewport width to device width for mobile -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=5, user-scalable=yes">
	<!-- Remove Microsoft Edge's & Safari phone-email styling -->
	<meta name="format-detection" content="telephone=no,email=no,url=no">

	<!-- Add external fonts below (GoogleFonts / Typekit) -->
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:400,400i,700&display=swap">

	<?php wp_head(); ?>
</head>

<body <?php body_class('no-outline'); ?>>
<?php wp_body_open(); ?>

<!-- BEGIN of header -->
<header class="header">
	<div class="grid-container menu-grid-container">
		<div class="header__wrapper">
			<div class="logo__wrapper">
					<p><?php show_custom_logo(); ?></p>
			</div>

            <div class="header__burger">
                <span></span>
            </div>
				<?php if ( has_nav_menu( 'header-menu' ) ) : ?>
					<nav class="main__menu" id="main-menu">
						<?php wp_nav_menu( array(
							'theme_location' => 'header-menu',
							'menu_class'     => 'menu__header',
                            'container'      => 'none',
						) ); ?>
					</nav>
				<?php endif; ?>

		</div>
	</div>
</header>
<!-- END of header -->
