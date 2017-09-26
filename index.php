<?php
/**
 * @package     Joomla.Site
 * @subpackage  Templates.protostar
 *
 * @copyright   Copyright (C) 2005 - 2015 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

$app             = JFactory::getApplication();
$doc             = JFactory::getDocument();
$user            = JFactory::getUser();
$this->language  = $doc->language;
$this->direction = $doc->direction;

// Getting params from template
$params = $app->getTemplate(true)->params;

// Detecting Active Variables
$option   = $app->input->getCmd('option', '');
$view     = $app->input->getCmd('view', '');
$layout   = $app->input->getCmd('layout', '');
$task     = $app->input->getCmd('task', '');
$itemid   = $app->input->getCmd('Itemid', '');
/*
require_once JPATH_BASE.'/plugins/slogin_integration/profile/helper.php';
$profile = plgProfileHelper::getProfile($user->id);
print($profile);
echo $user->id;
echo $profile->avatar;
*/

if($task == "edit" || $layout == "form" ) {
	$fullWidth = 1;
} else {
	$fullWidth = 0;
}
//include "config.php";

$templatePath=$this->baseurl . '/templates/' . $this->template;

$cssFile = $this->params->get('cssFile');
$faviconDir = $this->params->get('faviconDir');
$faviconPath=$templatePath . '/images/favicons/'.$faviconDir;


// Add JavaScript Frameworks
JHtml::_('bootstrap.framework');

// Add Stylesheets
$doc->addStyleSheet($templatePath . '/css/'.$cssFile);

// Load optional RTL Bootstrap CSS
JHtml::_('bootstrap.loadCss', false, $this->direction);

if ($this->params->get('siteTitle')) {
	$siteName = htmlspecialchars($this->params->get('siteTitle'));
} else {
	$siteName = $app->get('sitename');
}

// Adjusting content width
if ($this->countModules('sidebar-right') && $this->countModules('sidebar-left')) {
	$middle_column = "col-lg-6";
} elseif ($this->countModules('sidebar-right') && !$this->countModules('sidebar-left')) {
	$middle_column = "col-lg-9";
} elseif (!$this->countModules('sidebar-right') && $this->countModules('sidebar-left')) {
	$middle_column = "col-lg-9";
} else {
	$middle_column = "col-lg-12";
}

$isFluid = $params->get('fluidContainer');
$fluid = $isFluid ? '-fluid' : '';
$containerFluid="container" . $fluid;

$isMainMenuFluid = $params->get('fluidMainMenu');
$mainMenuFluid=($isMainMenuFluid==1)?'row':'';

$bannerIsFluid = $params->get('fluidBanner');

$username = $user->name;
$isLoggedIn = $username != '';

$hasCollapsedMenu = $this->countModules('menu-collapsed')>0;
$hasCollapsedProfileMenu = $this->countModules('profile-collapsed')>0;
$hasCollapsedFooterMenu = $this->countModules('footer-collapsed')>0;
$hasProfileMenu = $this->countModules('profile')>0;
$hasMainMenu = $this->countModules('main-menu')>0;
$hasBreadcrumbs = $this->countModules('breadcrumbs')>0;
$hasSearch = $this->countModules('search')>0;
$hasSidebarLeft = $this->countModules('sidebar-left')>0;
$hasSidebarRight = $this->countModules('sidebar-right')>0;
$hasFooter = $this->countModules('footer')>0;
$hasxsFooter = $this->countModules('footer-extra-small')>0;

$showCollapsedDivider = ($hasCollapsedMenu+$hasCollapsedProfileMenu+$isLoggedIn+$hasCollapsedFooterMenu)>1;

$themeColor = $this->params->get('themeColor');
$ieTileColor = $this->params->get('ieTileColor');
$bannerShowSiteName = $this->params->get('bannerShowSiteName');
$bannerShowSiteDescription = $this->params->get('bannerShowSiteDescription');
$bannerSiteNameHorizontalAlignment =  $this->params->get('bannerSiteNameHorizontalAlignment');
$bannerSiteNameVerticalAlignment =  $this->params->get('bannerSiteNameVerticalAlignment');

$bannerSiteName = "";
if ($bannerShowSiteName) {
	$bannerSiteName = $this->params->get('bannerSiteName');
	if ($bannerSiteName=="") {
		$bannerSiteName = $siteName;
	}
}

$bannerLogoImage = $this->params->get('bannerLogoImage')==""?"":(JUri::root().$this->params->get('bannerLogoImage'));

$bannerSiteDescription = "";
if ($bannerShowSiteDescription) {
	$bannerSiteDescription = $this->params->get('bannerSiteDescription');
}

$xsMenuBrandImage = $this->params->get('xsMenuBrandImage')==""?"":(JUri::root().$this->params->get('xsMenuBrandImage'));
$xsMenuSiteName = $this->params->get('xsMenuSiteName')==""?$siteName:$this->params->get('xsMenuSiteName');

$xsBannerShowSiteName = $this->params->get('xsBannerShowSiteName');
$xsBannerShowSiteDescription = $this->params->get('xsBannerShowSiteDescription');
$xsBannerSiteNameAlignment =  $this->params->get('xsBannerSiteNameAlignment');
$xsBannerFixedHeight = $this->params->get('xsBannerFixedHeight');

$xsBannerSiteName = "";
if ($xsBannerShowSiteName) {
	$xsBannerSiteName = $this->params->get('xsBannerSiteName');
	if ($xsBannerSiteName=="") {
		$xsBannerSiteName = $bannerSiteName;
		if ($xsBannerSiteName=="") {
			$xsBannerSiteName = $siteName;
		}
	}
}

$xsBannerSiteDescription = "";
if ($xsBannerShowSiteDescription) {
	$xsBannerSiteDescription = $this->params->get('xsBannerSiteDescription');
	if ($xsBannerSiteDescription=="") {
		$xsBannerSiteDescription = $bannerSiteDescription;
	}
}

$bannerParallaxImage = $this->params->get('bannerParallaxImage')==""?"":(JUri::root().$this->params->get('bannerParallaxImage'));
//$bannerHeightLg="600";
$bannerParallaxSpeed= $this->params->get('bannerParallaxSpeed');

$includeParallax=($bannerParallaxImage!='')>0;

$mainContentInWell = $this->params->get('mainContentInWell');

$footerOuterFixedToBottom=$this->params->get('footerOuterFixedToBottom');


//see css.php for more variable declarations
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $this->language; ?>" lang="<?php echo $this->language; ?>" dir="<?php echo $this->direction; ?>">
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />

	<link rel="apple-touch-icon" sizes="57x57" href="<?php echo $faviconPath; ?>/apple-touch-icon-57x57.png">
	<link rel="apple-touch-icon" sizes="60x60" href="<?php echo $faviconPath; ?>/apple-touch-icon-60x60.png">
	<link rel="apple-touch-icon" sizes="72x72" href="<?php echo $faviconPath; ?>/apple-touch-icon-72x72.png">
	<link rel="apple-touch-icon" sizes="76x76" href="<?php echo $faviconPath; ?>/apple-touch-icon-76x76.png">
	<link rel="apple-touch-icon" sizes="114x114" href="<?php echo $faviconPath; ?>/apple-touch-icon-114x114.png">
	<link rel="apple-touch-icon" sizes="120x120" href="<?php echo $faviconPath; ?>/apple-touch-icon-120x120.png">
	<link rel="apple-touch-icon" sizes="144x144" href="<?php echo $faviconPath; ?>/apple-touch-icon-144x144.png">
	<link rel="apple-touch-icon" sizes="152x152" href="<?php echo $faviconPath; ?>/apple-touch-icon-152x152.png">
	<link rel="apple-touch-icon" sizes="180x180" href="<?php echo $faviconPath; ?>/apple-touch-icon-180x180.png">
	<link rel="icon" type="image/png" href="<?php echo $faviconPath; ?>/favicon-32x32.png" sizes="32x32">
	<link rel="icon" type="image/png" href="<?php echo $faviconPath; ?>/android-chrome-192x192.png" sizes="192x192">
	<link rel="icon" type="image/png" href="<?php echo $faviconPath; ?>/favicon-96x96.png" sizes="96x96">
	<link rel="icon" type="image/png" href="<?php echo $faviconPath; ?>/favicon-16x16.png" sizes="16x16">
	<link rel="manifest" href="<?php echo $faviconPath; ?>/manifest.json">
	<link rel="mask-icon" href="<?php echo $faviconPath; ?>/safari-pinned-tab.svg" color="#5bbad5">
	<link rel="shortcut icon" href="<?php echo $faviconPath; ?>/favicon.ico">
	<meta name="msapplication-TileImage" content="<?php echo $faviconPath; ?>/mstile-144x144.png">
	<meta name="msapplication-config" content="<?php echo $faviconPath; ?>/browserconfig.xml">

	<meta name="apple-mobile-web-app-title" content="<?php echo $siteName; ?>">
	<meta name="application-name" content="<?php echo $siteName; ?>">

<?php if ($ieTileColor != '') : ?>
	<meta name="msapplication-TileColor" content="<?php echo $ieTileColor; ?>">
<?php endif; ?>
	
<?php if ($themeColor != '') : ?>
	<meta name="theme-color" content="<?php echo $themeColor; ?>">
<?php endif; ?>

	<jdoc:include type="head" />

<?php if ($includeParallax != '') : ?>
	<script src="<?php echo $templatePath; ?>/js/jquery.parallax.min.js" type="text/javascript"></script>
<?php endif; ?>

	<!--script src="<?php echo $templatePath; ?>/css.php" type="text/javascript"></script-->
<?php include "css.php" ?>

	<!--[if lt IE 9]>
		<script src="<?php echo JUri::root(true); ?>/media/jui/js/html5.js"></script>
	<![endif]-->
	<script>
		function fixSidebarLeft() {
			var v = 0;
			 jQuery('.sidebar-left').children('.well').children().each(function() {
				if(jQuery(this).css('display') != "none") {
					v++;
					jQuery('.sidebar-left').show();
					return
				}
				jQuery('.sidebar-left').hide();
			});
		}

		jQuery(document).ready(function() {
			fixSidebarLeft();
			jQuery(window).resize(function() {
				fixSidebarLeft();
			});
		});
	</script>
 </head>

<body class="site <?php echo $option
	. ' view-' . $view
	. ($layout ? ' layout-' . $layout : ' no-layout')
	. ($task ? ' task-' . $task : ' no-task')
	. ($itemid ? ' itemid-' . $itemid : '')
	. ($isFluid ? ' fluid' : '');
	echo ($this->direction == 'rtl' ? ' rtl' : '');
?>">
<?php if ($xsMenuBrandImage!='' || $hasCollapsedMenu || $hasCollapsedProfileMenu || $hasCollapsedFooterMenu || $isLoggedIn) : ?>
		<div style="height: 50px;" class="visible-xs-block"></div>
<?php endif; ?>
<?php if ($bannerIsFluid) : ?>
		<header class="banner hidden-xs" >
<?php if ($bannerParallaxImage!='') : ?>
			<div class="panel" data-parallax="scroll"  data-speed="<?php echo $bannerParallaxSpeed; ?>" data-image-src="<?php echo $bannerParallaxImage; ?>">
<?php else: ?>
			<div class="panel">
<?php endif; ?>
				<div class="overlay"></div>
				<div class="panel-body">
							<div class="media">
<?php if ($bannerLogoImage!='' && $bannerLogoPlacement=="media-left") : ?>
								<div class="<?php echo $bannerLogoPlacement; ?>">
									<img id="banner-logo-img" class="media-object" src="<?php echo $bannerLogoImage; ?>" alt="<?php echo $siteName; ?>" />
								</div>
<?php endif; ?>
								<div class="media-body">
<?php if ($bannerShowSiteName) : ?>
									<h1 class="media-heading <?php echo $bannerSiteNameHorizontalAlignment; ?>"><?php echo $bannerSiteName; ?></h1> 
<?php endif; ?>
<?php if ($bannerShowSiteDescription) : ?>
									<p class="text-justify"><?php echo $bannerSiteDescription; ?></p> 
<?php endif; ?>
								</div>
<?php if ($bannerLogoImage!='' && $bannerLogoPlacement=="media-right") : ?>
								<div class="<?php echo $bannerLogoPlacement; ?>">
									<img id="banner-logo-img" class="media-object" src="<?php echo $bannerLogoImage; ?>" alt="<?php echo $siteName; ?>" />
								</div>
<?php endif; ?>
							</div>
				</div>
			</div>
		</header>
<?php endif; ?>


<?php if (($isMainMenuFluid==1) && ($hasMainMenu)) : ?>
		<nav class="navbar navbar-mainmenu hidden-xs <?php echo $mainMenuFluid; ?>">
			<jdoc:include type="modules" name="main-menu" style="none" />
		</nav>
<?php endif; ?>

<?php if (($isMainMenuFluid==2) && ($hasMainMenu)) : ?>
		<nav class="navbar navbar-mainmenu hidden-xs <?php echo $mainMenuFluid; ?>">
			<div class="container"><jdoc:include type="modules" name="main-menu" style="none" /></div>
		</nav>
<?php endif; ?>

	<div class="body-panel panel <?php echo $containerFluid; ?>">

<?php if ($xsMenuBrandImage!='' || $hasCollapsedMenu || $hasCollapsedProfileMenu || $hasCollapsedFooterMenu || $isLoggedIn) : ?>
		<nav class="navbar navbar-xsmenu visible-xs-block navbar-fixed-top">
			<div>
				<div class="navbar-header">
<?php if ($hasCollapsedMenu || $hasCollapsedProfileMenu || $hasCollapsedFooterMenu) : ?>
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-xsmenu-collapse">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
<?php endif; ?><a href="/">
<?php if ($xsMenuBrandImage!='') : ?>
					<span class="navbar-brand navbar-xsmenu-logo"><img src="<?php echo $xsMenuBrandImage; ?>" alt="<?php echo $xsMenuSiteName; ?>"  /></span>
<?php endif; ?>
					<span class="navbar-brand"><?php echo $xsMenuSiteName; ?></span></a>
				</div>
<?php if ($hasCollapsedMenu || $hasCollapsedProfileMenu || $hasCollapsedFooterMenu || $isLoggedIn) : ?>
				<div class="navbar-collapse collapse" id="navbar-xsmenu-collapse">
<?php if ($hasCollapsedMenu) : ?>
					<jdoc:include type="modules" name="menu-collapsed" style="none" />
<?php endif; ?>
<?php if ($hasCollapsedProfileMenu || $isLoggedIn) : ?>
					<div class="navbar-divider"></div>
<?php endif; ?>
<?php if ($hasCollapsedProfileMenu || $isLoggedIn) : ?>
					<ul class="nav navbar-nav">
<?php if ($isLoggedIn) : ?>
						<li>
							<a class="navbar-xsmenu-avatar" href="index.php/edit-profile">
								<span><img alt="<?php echo $user->name; ?>" src="<?php echo $this->baseurl . '/templates/' . $this->template . '/images/user.png'; ?>" /></span>
								<span><?php echo $user->name; ?></span>
							</a>
						</li>
<?php endif; ?>
					</ul>
<?php endif; ?>
<?php if ($hasCollapsedProfileMenu) : ?>
					<jdoc:include type="modules" name="profile-collapsed" style="none" />
<?php endif; ?>
<?php if ($hasCollapsedFooterMenu) : ?>
					<div class="navbar-divider"></div>
					<jdoc:include type="modules" name="footer-collapsed" style="collapsed" />
<?php endif; ?>
				</div>
<?php endif; ?>
			</div>
		</nav>
<?php endif; ?>

<?php if ($hasProfileMenu) : ?>
		<nav class="navbar navbar-user hidden-xs navbar-fixed-top">
			<div class="<?php echo $containerFluid; ?>">
<?php if ($isLoggedIn) : ?>
				<div class="navbar-header">
					<a class="navbar-brand navbar-user-avatar" href="index.php/edit-profile">
						<span><img alt="<?php echo $user->name; ?>" src="<?php echo $this->baseurl . '/templates/' . $this->template . '/images/user.png'; ?>" /></span>
						<span><?php echo $user->name; ?></span>
					</a>
				</div>
<?php endif; ?>
				<div class="pull-right">
					<ul class="nav navbar-nav menu">
					<li class="visible-lg">large</li>
					<li class="visible-md">medium</li>
					<li class="visible-sm">small</li>
					<li class="visible-xs">extra small</li></ul>
					<jdoc:include type="modules" name="profile" style="none" />
				</div>
			</div>
		</nav>
<?php endif; ?>

		<header class="banner-xs visible-xs-block">
			<div class="panel">
			<div class="panel-body">
					<div class="row">
						<div class="col col-lg-12" style="height: <?php echo $xsBannerFixedHeight; ?>px;">
						<div class="media">
						<div class="media-body">
<?php if ($xsBannerShowSiteName) : ?>
							<h1 class="media-heading <?php echo $xsBannerSiteNameAlignment; ?>"><?php echo $xsBannerSiteName; ?></h1> 
<?php endif; ?>
<?php if ($xsBannerShowSiteDescription) : ?>
							<p class="text-justify"><?php echo $xsBannerSiteDescription; ?></p> 
<?php endif; ?>
						</div>
						</div>
						</div>
					</div>
			</div>
			</div>
		</header>

<?php if (!$bannerIsFluid) : ?>
		<header class="banner  hidden-xs" >
<?php if ($bannerParallaxImage!='') : ?>
			<div class="panel" data-parallax="scroll" data-z-index="1" data-speed="<?php echo $bannerParallaxImage; ?>" data-image-src="<?php echo $bannerBackgroundImage; ?>">
<?php else: ?>
			<div class="panel">
<?php endif; ?>
				<div class="overlay"></div>
				<div class="panel-body">
					<div class="row">
						<div class="col col-lg-12">
							<div class="media">
<?php if ($bannerLogoImage!='' && $bannerLogoPlacement=="media-left") : ?>
								<div class="<?php echo $bannerLogoPlacement; ?>">
									<img id="banner-logo-img" class="media-object" src="<?php echo $bannerLogoImage; ?>" alt="<?php echo $siteName; ?>" />
								</div>
<?php endif; ?>
								<div class="media-body">
<?php if ($bannerShowSiteName) : ?>
									<h1 class="media-heading <?php echo $bannerSiteNameHorizontalAlignment; ?>"><?php echo $bannerSiteName; ?></h1> 
<?php endif; ?>
<?php if ($bannerShowSiteDescription) : ?>
									<p class="text-justify"><?php echo $bannerSiteDescription; ?></p> 
<?php endif; ?>
								</div>
<?php if ($bannerLogoImage!='' && $bannerLogoPlacement=="media-right") : ?>
								<div class="<?php echo $bannerLogoPlacement; ?>">
									<img id="banner-logo-img" class="media-object" src="<?php echo $bannerLogoImage; ?>" alt="<?php echo $siteName; ?>" />
								</div>
<?php endif; ?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</header>
<?php endif; ?>

<?php if (($isMainMenuFluid==0)  && ($hasMainMenu)) : ?>
		<nav class="navbar navbar-mainmenu hidden-xs <?php echo $mainMenuFluid; ?>">
			<jdoc:include type="modules" name="main-menu" style="none" />
		</nav>
<?php endif; ?>

<?php if ($hasBreadcrumbs) : ?> 
		<div class="row">
			<div class="breadcrumbs hidden-xs col-lg-12">
				<jdoc:include type="modules" name="breadcrumbs" style="none" />
			</div>
		</div>
<?php endif; ?>
<?php if ($hasSearch) :?> 
		<div class="row">
			<div class="pull-right text-right col-lg-3" >
					<jdoc:include type="modules" name="search" style="none" />
			</div>
		</div>
<?php endif; ?>

		<div class="content content-pane">
			<div class="row">
<?php if ($hasSidebarLeft) : ?>
				<div class="col-lg-3 sidebar sidebar-left">
					<div class="well">
						<jdoc:include type="modules" name="sidebar-left" style="xhtml" />
					</div>
				</div>
<?php endif; ?>
				<main role="main" class="main-content <?php echo $middle_column; ?>">
<?php if ($mainContentInWell) : ?>
					<div class="panel">
						<div class="panel-body">
<?php endif; ?>
						<jdoc:include type="message" />
						<jdoc:include type="modules" name="content-header" style="none" />
						<jdoc:include type="component" />
						<jdoc:include type="modules" name="content-footer" style="none" />
<?php if ($mainContentInWell) : ?>
						</div>
					</div>
<?php endif; ?>
				</main>
<?php if ($hasSidebarRight) : ?>
				<div class="col-lg-3 sidebar sidebar-right">
					<jdoc:include type="modules" name="sidebar-right" style="well" />
				</div>
<?php endif; ?>
			</div>
		</div>
	</div>	

<?php if ($footerOuterFixedToBottom) : ?>
		<footer class="footer-fixed-bottom navbar-fixed-bottom hidden-xs" >
		</footer>
<?php endif; ?>

		<footer class="footer-outer hidden-xs" >
				<div class="<?php echo $containerFluid; ?>" >
					<div class="rows">
					
<?php if ($hasFooter) : ?>
						<div class="panel footer-inner">
						<div class="row">
						<div class="col-lg-12 visible-lg-block">
							<jdoc:include type="modules" name="footer" style="none" />
						</div>
						<div class="col-md-12 hidden-lg">
							<jdoc:include type="modules" name="footer" style="none" />
						</div>
						<div class="col-md-12 hidden-lg">
							<jdoc:include type="modules" name="footer" style="none" />
						</div>
						<div class="col-md-12 hidden-lg">
							<jdoc:include type="modules" name="footer" style="none" />
						</div>
						</div>
						</div>
<?php endif; ?>
					
				</div>
				<div class="row">
					<div class="col-lg-12">
						<p class="pull-right">
							<a href="#top" id="back-top"><?php echo JText::_('Back to top'); ?></a>
						</p>
					</div>
				</div>
		</footer>

		<footer class="footer-outer-xs container visible-xs-block" >
<?php if ($hasxsFooter) : ?>
			<div class="panel footer-inner-xs">
				<jdoc:include type="modules" name="footer-extra-small" style="none" />
			</div>
<?php endif; ?>
			<div class="row">
				<div class="col-lg-12">
					<p class="pull-right">
						<a href="#top" id="back-top"><?php echo JText::_('Back to top'); ?></a>
					</p>
				</div>
			</div>
		</footer>

	<jdoc:include type="modules" name="debug" style="none" />
</body>
</html>
