<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordStrap4
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
  <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
	<?php wp_head(); ?>
	<meta name="twitter:card" content="summary" />
	<meta name="twitter:site" content="@ahmetin_adresi" />
	<meta name="twitter:creator" content="@sahmetsahmet" />
	<meta property="og:url"           content="<?php echo get_permalink(); ?>" />
  <meta property="og:type"          content="website" />
  <meta property="og:title"         content="<?php echo get_the_title(); ?>" />
  <meta property="og:description"   content="<?php echo (get_the_excerpt()!='') ? get_the_excerpt() : 'İstanbul 2. Bölge Milletvekili Adayı'; ?>" />
  <meta property="og:image"         content="<?php echo (get_the_post_thumbnail_url()!='') ? get_the_post_thumbnail_url(get_the_ID(),'medium') : 'https://ahmetinadresi.org/wp-content/uploads/2018/05/ahmet_kimdir-768x448.jpg'; ?>" />
	<!-- Matomo -->
	<script type="text/javascript">
	  var _paq = _paq || [];
	  /* tracker methods like "setCustomDimension" should be called before "trackPageView" */
	  _paq.push(['trackPageView']);
	  _paq.push(['enableLinkTracking']);
	  (function() {
	    var u="//ahmetinadresi.org/piwik/";
	    _paq.push(['setTrackerUrl', u+'piwik.php']);
	    _paq.push(['setSiteId', '1']);
	    var d=document, g=d.createElement('script'), s=d.getElementsByTagName('script')[0];
	    g.type='text/javascript'; g.async=true; g.defer=true; g.src=u+'piwik.js'; s.parentNode.insertBefore(g,s);
	  })();
	</script>
	<!-- End Matomo Code -->
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link sr-only" href="#content"><?php esc_html_e( 'İçeriğe geç', 'wordstrap4' ); ?></a>

	<header id="masthead" class="site-header">
		<nav class="navbar navbar-expand-md navbar-light bg-white border-bottom">
			<a class="navbar-brand" href="<?php echo get_home_url(); ?>">
				<?php $custom_logo_id = get_theme_mod( 'custom_logo' );
				$image = wp_get_attachment_image_src( $custom_logo_id , 'full' );?>
				<img src="<?php echo $image[0]; ?>">
 			</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
		    <span class="navbar-toggler-icon"></span>
		  </button>
			<?php
			wp_nav_menu( array(
				'theme_location'  => 'primary',
				'depth'	          => 2,
				'container'       => 'div',
				'container_class' => 'collapse navbar-collapse pt-4 pl-2',
				'container_id'    => 'navbarNav',
				'menu_class'      => 'navbar-nav mr-auto',
				'fallback_cb'     => 'WP_Bootstrap_Navwalker::fallback',
				'walker'          => new WP_Bootstrap_Navwalker(),
			) );
			?>
		</nav><!-- #site-navigation -->
	</header><!-- #masthead -->
	<div id="content" class="site-content">
