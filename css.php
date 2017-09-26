<?php
//defined('_JEXEC') or die;

function rgba($color, $opacity = 0) {
	if(empty($color)) return "#000"; 
		
	$color = substr( $color, 1 );

	if (strlen($color) == 6) {
		$hex = array( $color[0] . $color[1], $color[2] . $color[3], $color[4] . $color[5] );
	} elseif ( strlen( $color ) == 3 ) {
		$hex = array( $color[0] . $color[0], $color[1] . $color[1], $color[2] . $color[2] );
	}
	$rgb =  array_map('hexdec', $hex);
 
		if(abs($opacity) > 1) {
			$opacity = 1.0;
		}
		return 'rgba('.implode(",",$rgb).','.$opacity.')';
}

$hasProfileMenu = $this->countModules('profile')>0;

echo '<style type="text/css">';

include "css.site.php";
include "css.background.php";
include "css.banner.php";
include "css.banner-xs.php";
include "css.mainmenu.php";
include "css.breadcrumbs.php";
include "css.content.php";
include "css.content.sidebars.php";
include "css.footer-outer.php";
include "css.footer-inner.php";

echo "<!--\n";
echo "fluidContainer=".$isFluidSite."\n";
echo "-->\n";

echo '</style>';
?>
