<h1>theme</h1>
<table>
<tr><td>css</td><td><?php echo $this->params->get('cssFile'); ?></td></tr>
<tr><td>favicon</td><td><?php echo $this->params->get('faviconDir'); ?></td></tr>
<tr><td>mobile theme</td><td><?php echo $this->params->get('cssFile'); ?></td></tr>
<tr><td>ie tiles</td><td><?php echo $this->params->get('cssFile'); ?></td></tr>
</table>

<h1>layout</h1>
<table>
<tr><td>site</td><td><?php echo $this->params->get('fluidContainer'); ?></td></tr>
<tr><td>banner</td><td><?php echo $this->params->get('fluidBanner'); ?></td></tr>
<tr><td>extra small banner</td><td></td></tr>
<tr><td>main menu</td><td><?php echo $this->params->get('fluidMainMenu'); ?></td></tr>
</table>

<h1>rounded corners</h1>
<table>
<tr><td>site</td><td><?php echo $this->params->get('templateHasRoundedCorners'); ?></td></tr>
<tr><td>banner</td><td><?php echo $this->params->get('bannerHasRoundedCorners'); ?></td></tr>
<tr><td>breadcrumbs</td><td><?php echo $this->params->get('breadcrumbsHaveRoundedCorners'); ?></td></tr>
<tr><td>main menu</td><td><?php echo $this->params->get('mainmenuHasRoundedCorners'); ?></td></tr>
<tr><td>main content</td><td><?php echo $this->params->get('mainContentHasRoundedCorners'); ?></td></tr>
<tr><td>sidebar left</td><td><?php echo $this->params->get('sidebarLeftHasRoundedCorners'); ?></td></tr>
<tr><td>sidebar right</td><td><?php echo $this->params->get('sidebarRightHasRoundedCorners'); ?></td></tr>
<tr><td>inner footer</td><td><?php echo $this->params->get('footerInnerHasRoundedCorners'); ?></td></tr>
</table>

			
<h1>site</h1>
<h2>name</h2>
<table>
<tr><td>site</td><td><?php echo $this->params->get('siteTitle'); ?></td></tr>
</table>
<h2>background</h2>
<table>
<tr><td>image</td><td><?php echo $this->params->get('templateBackgroundImage'); ?></td></tr>
<tr><td>horizontal position</td><td><?php echo $this->params->get('templateBackgroundImagePositionX'); ?></td></tr>
<tr><td>value</td><td><?php echo $this->params->get('templateBackgroundImagePositionXValue'); ?></td></tr>
<tr><td>vertical position</td><td><?php echo $this->params->get('templateBackgroundImagePositionY'); ?></td></tr>
<tr><td>value</td><td><?php echo $this->params->get('templateBackgroundImagePositionYValue'); ?></td></tr>
<tr><td>repeat horizontally</td><td><?php echo $this->params->get('templateBackgroundImageRepeatX'); ?></td></tr>
<tr><td>repear vertically</td><td><?php echo $this->params->get('templateBackgroundImageRepeatY'); ?></td></tr>
<tr><td>attachment</td><td><?php echo $this->params->get('templateBackgroundImageAttachment'); ?></td></tr>
<tr><td>size</td><td><?php echo $this->params->get('templateBackgroundImageSize'); ?></td></tr>
<tr><td>value</td><td><?php echo $this->params->get('templateBackgroundImageSizeValue'); ?></td></tr>
</table>
<h2>padding</h2>
<table>
<tr><td>top</td><td><?php echo $this->params->get(''); ?></td></tr>
<tr><td>bottom</td><td><?php echo $this->params->get(''); ?></td></tr>
</table>

<h1>banner</h1>
<h2>name and description</h2>
<table>
<tr><td>show name</td><td><?php echo $this->params->get('bannerShowSiteName'); ?></td></tr>
<tr><td>name</td><td><?php echo $this->params->get('bannerSiteName'); ?></td></tr>
<tr><td>horizontal alignment</td><td><?php echo $this->params->get('bannerSiteNameHorizontalAlignment'); ?></td></tr>
<tr><td>vertical alingment</td><td><?php echo $this->params->get('bannerSiteNameVerticalAlignment'); ?></td></tr>
<tr><td>show description</td><td><?php echo $this->params->get('bannerShowSiteDescription'); ?></td></tr>
<tr><td>description</td><td><?php echo $this->params->get('bannerSiteDescription'); ?></td></tr>
</table>
<h2>size</h2>
<table>
<tr><td>height</td><td><?php echo $this->params->get('bannerSizeType'); ?></td></tr>
<tr><td>value</td><td><?php echo $this->params->get('bannerSizeValue'); ?></td></tr>
</table>
<h2>parallax</h2>
<table>
<tr><td>image</td><td><?php echo $this->params->get('bannerParallaxImage'); ?></td></tr>
<tr><td>speed</td><td><?php echo $this->params->get('bannerParallaxSpeed'); ?></td></tr>
</table>
<h2>background</h2>
<table>
<tr><td>image</td><td><?php echo $this->params->get('bannerBackgroundImage'); ?></td></tr>
<tr><td>size</td><td><?php echo $this->params->get('bannerBackgroundImageSize'); ?></td></tr>
<tr><td>value</td><td><?php echo $this->params->get('bannerBackgroundImageSizeValue'); ?></td></tr>
<tr><td>horizontal position</td><td><?php echo $this->params->get('bannerBackgroundImagePositionX'); ?></td></tr>
<tr><td>value</td><td><?php echo $this->params->get('bannerBackgroundImagePositionXValue'); ?></td></tr>
<tr><td>vertical position</td><td><?php echo $this->params->get('bannerBackgroundImagePositionY'); ?></td></tr>
<tr><td>value</td><td><?php echo $this->params->get('bannerBackgroundImagePositionYValue'); ?></td></tr>
<tr><td>repeat horizontally</td><td><?php echo $this->params->get('bannerBackgroundImageRepeatX'); ?></td></tr>
<tr><td>repeat vertically</td><td><?php echo $this->params->get('bannerBackgroundImageRepeatY'); ?></td></tr>
</table>
<h2>logo</h2>
<table>
<tr><td>image</td><td><?php echo $this->params->get('bannerLogoImage'); ?></td></tr>
<tr><td>alignment</td><td><?php echo $this->params->get('bannerLogoPlacement'); ?></td></tr>
</table>
<h2>padding</h2>
<h3>outer</h3>
<table>
<tr><td>top</td><td><?php echo $this->params->get('bannerPaddingTop'); ?></td></tr>
<tr><td>bottom</td><td><?php echo $this->params->get('bannerPaddingBottom'); ?></td></tr>
</table>
<h3>inner</h3>
<table>
<tr><td>top</td><td><?php echo $this->params->get('bannerTextPaddingTop'); ?></td></tr>
<tr><td>left</td><td><?php echo $this->params->get('bannerTextPaddingLeft'); ?></td></tr>
<tr><td>right</td><td><?php echo $this->params->get('bannerTextPaddingRight'); ?></td></tr>
</table>


<h1>extra small banner</h1>
<h2>name and description</h2>
<table>
<tr><td>show name</td><td><?php echo $this->params->get('xsBannerShowSiteName'); ?></td></tr>
<tr><td>name</td><td><?php echo $this->params->get('xsBannerSiteName'); ?></td></tr>
<tr><td>alignment</td><td><?php echo $this->params->get('xsBannerSiteNameAlignment'); ?></td></tr>
<tr><td>show description</td><td><?php echo $this->params->get('xsBannerShowSiteDescription'); ?></td></tr>
<tr><td>description</td><td><?php echo $this->params->get('xsBannerSiteDescription'); ?></td></tr>
</table>
<h2>size</h2>
<table>
<tr><td>height</td><td><?php echo $this->params->get('bannerSizeType'); ?></td></tr>
<tr><td>value</td><td><?php echo $this->params->get('bannerSizeValue'); ?></td></tr>
</table>
<h2>background</h2>
<table>
<tr><td>image</td><td><?php echo $this->params->get('xsBannerBackgroundImage'); ?></td></tr>
<tr><td>size</td><td><?php echo $this->params->get('xsBannerBackgroundImageSize'); ?></td></tr>
<tr><td>value</td><td><?php echo $this->params->get('xsBannerBackgroundImageSizeValue'); ?></td></tr>
<tr><td>horizontal position</td><td><?php echo $this->params->get('xsBannerBackgroundImagePositionX'); ?></td></tr>
<tr><td>value</td><td><?php echo $this->params->get('bannerBackgroundImagePositionXValue'); ?></td></tr>
<tr><td>vertical position</td><td><?php echo $this->params->get('xsBannerBackgroundImagePositionY'); ?></td></tr>
<tr><td>value</td><td><?php echo $this->params->get('xsBannerBackgroundImagePositionYValue'); ?></td></tr>
<tr><td>repeat horizontally</td><td><?php echo $this->params->get('xsBannerBackgroundImageRepeatX'); ?></td></tr>
<tr><td>repeat vertically</td><td><?php echo $this->params->get('xsBannerBackgroundImageRepeatY'); ?></td></tr>
<tr><td>fixed height</td><td><?php echo $this->params->get('xsBannerFixedHeight'); ?></td></tr>
</table>
<h2>padding</h2>
<h3>outer</h3>
<table>
<tr><td>top</td><td><?php echo $this->params->get('xsBannerPaddingTop'); ?></td></tr>
<tr><td>bottom</td><td><?php echo $this->params->get('xsBannerPaddingBottom'); ?></td></tr>
</table>
<h3>inner</h3>
<table>
<tr><td>top</td><td><?php echo $this->params->get('xsBannerTextPaddingTop'); ?></td></tr>
<tr><td>left</td><td><?php echo $this->params->get('xsBannerTextPaddingLeft'); ?></td></tr>
<tr><td>right</td><td><?php echo $this->params->get('xsBannerTextPaddingRight'); ?></td></tr>
</table>

<h1>extra small menu</h1>
<h2>name</h2>
<table>
<tr><td>name</td><td><?php echo $this->params->get('xsMenuSiteName'); ?></td></tr>
</table>
<h2>brand</h2>
<table>
<tr><td>image</td><td><?php echo $this->params->get('xsMenuBrandImage'); ?></td></tr>
</table>

<h1>main content</h1>
<h2>content</h2>
<table>
<tr><td>well</td><td><?php echo $this->params->get('mainContentInWell'); ?></td></tr>
</table>

<h1>footer</h1>
<h2>outer</h2>
<table>
<tr><td>fixed to bottom</td><td><?php echo $this->params->get('footerOuterFixedToBottom'); ?></td></tr>
<tr><td>image</td><td><?php echo $this->params->get('footerOuterImage'); ?></td></tr>
<tr><td>height fixed area</td><td><?php echo $this->params->get('footerOuterFixedHeight'); ?></td></tr>
<tr><td>size</td><td><?php echo $this->params->get('footerOuterImageSize'); ?></td></tr>
<tr><td>value</td><td><?php echo $this->params->get('footerOuterImageSizeValue'); ?></td></tr>
<tr><td>horizontal position</td><td><?php echo $this->params->get('footerOuterImagePositionX'); ?></td></tr>
<tr><td>value</td><td><?php echo $this->params->get('footerOuterImagePositionXValue'); ?></td></tr>
<tr><td>vertical position</td><td><?php echo $this->params->get('footerOuterImagePositionY'); ?></td></tr>
<tr><td>value</td><td><?php echo $this->params->get('footerOuterImagePositionYValue'); ?></td></tr>
<tr><td>repeat horizontally</td><td><?php echo $this->params->get('footerOuterImageRepeatX'); ?></td></tr>
<tr><td>repeat vertically</td><td><?php echo $this->params->get('footerOuterImageRepeatY'); ?></td></tr>
<tr><td>attactment</td><td><?php echo $this->params->get('footerOuterImageAttachment'); ?></td></tr>
</table>
<h2>inner</h2>
<table>
<tr><td>fixed to bottom</td><td><?php echo $this->params->get('footerInnerFixedToBottom'); ?></td></tr>
<tr><td>image</td><td><?php echo $this->params->get('footerInnerImage'); ?></td></tr>
<tr><td>fixed height</td><td><?php echo $this->params->get('footerInnerFixedHeight'); ?></td></tr>
<tr><td>size</td><td><?php echo $this->params->get('footerInnerImageSize'); ?></td></tr>
<tr><td>value</td><td><?php echo $this->params->get('footerInnerImageSizeValue'); ?></td></tr>
<tr><td>horizontal position</td><td><?php echo $this->params->get('footerInnerImagePositionX'); ?></td></tr>
<tr><td>value</td><td><?php echo $this->params->get('footerInnerImagePositionXValue'); ?></td></tr>
<tr><td>vertical position</td><td><?php echo $this->params->get('footerInnerImagePositionY'); ?></td></tr>
<tr><td>value</td><td><?php echo $this->params->get('footerInnerImagePositionYValue'); ?></td></tr>
<tr><td>repeat horizontally</td><td><?php echo $this->params->get('footerInnerImageRepeatX'); ?></td></tr>
<tr><td>repeat vertically</td><td><?php echo $this->params->get('footerInnerImageRepeatY'); ?></td></tr>
<tr><td>attachment</td><td><?php echo $this->params->get('footerInnerImageAttachment'); ?></td></tr>
<tr><td></td><td><?php echo $this->params->get(''); ?></td></tr>
</table>
