<?php
$xsBannerBackgroundImage = $this->params->get('xsBannerBackgroundImage')==""?"":(JUri::root().$this->params->get('xsBannerBackgroundImage'));

$xsBannerBackgroundImageRepeatX = $this->params->get('xsBannerBackgroundImageRepeatX');
$xsBannerBackgroundImageRepeatY = $this->params->get('xsBannerBackgroundImageRepeatY');
$xsBannerBackgroundImagePositionX = $this->params->get('xsBannerBackgroundImagePositionX');
$xsBannerBackgroundImagePositionY = $this->params->get('xsBannerBackgroundImagePositionY');
$xsBannerBackgroundImageSizeType = $this->params->get('xsBannerBackgroundImageSize');
$xsBannerFixedHeight = $this->params->get('xsBannerFixedHeight');

$xsBannerBackgroundImagePositionX = $xsBannerBackgroundImagePositionX=="value"?$this->params->get('xsBannerBackgroundImagePositionXValue'):$xsBannerBackgroundImagePositionX;
$xsBannerBackgroundImagePositionY = $xsBannerBackgroundImagePositionY=="value"?$this->params->get('xsBannerBackgroundImagePositionYValue'):$xsBannerBackgroundImagePositionY;
$xsBannerBackgroundImageSize = $xsBannerBackgroundImageSizeType=="value"?$this->params->get('xsBannerBackgroundImageSizeValue'):($xsBannerBackgroundImageSizeType=="fixed"?"":($xsBannerBackgroundImageSizeType=="fill"?"100% 100%":""));

$xsBannerPaddingTop = $this->params->get('xsBannerPaddingTop');
$xsBannerPaddingBottom = $this->params->get('xsBannerPaddingBottom');

$xsBannerTextPaddingTop = $this->params->get('xsBannerTextPaddingTop');
$xsBannerTextPaddingLeft = $this->params->get('xsBannerTextPaddingLeft');
$xsBannerTextPaddingRight = $this->params->get('xsBannerTextPaddingRight');
?>

<?php if ($xsBannerBackgroundImage != "") : ?>
	/* xs banner image */
	.banner-xs .panel {
		background-image: url(<?php echo $xsBannerBackgroundImage; ?>);
<?php if ($xsBannerBackgroundImageSizeType == "fill") : ?>
		background-repeat-x: no-repeat;
		background-repeat-y: no-repeat;
<?php else: ?>
		background-position-x: <?php echo $xsBannerBackgroundImagePositionX; ?>;
		background-position-y: <?php echo $xsBannerBackgroundImagePositionY; ?>;
		background-repeat-x: <?php echo $xsBannerBackgroundImageRepeatX; ?>;
		background-repeat-y: <?php echo $xsBannerBackgroundImageRepeatY; ?>;
<?php endif; ?>
<?php if ($xsBannerBackgroundImageSize != "") : ?>
		background-size: <?php echo $xsBannerBackgroundImageSize; ?>;
		height: <?php echo $xsBannerBackgroundImageSize; ?>;
<?php endif; ?>
	}
<?php endif; ?>

<?php if ($xsBannerTextPaddingTop != "" || $xsBannerTextPaddingLeft != "" || $xsBannerTextPaddingRight != "") : ?>
	.banner-xs .panel {	
<?php if ($xsBannerTextPaddingTop != "") : ?>
		padding-top: <?php echo $xsBannerTextPaddingTop; ?>;
<?php endif; ?>
<?php if ($xsBannerTextPaddingLeft != "") : ?>
		padding-left: <?php echo $xsBannerTextPaddingLeft; ?>;
<?php endif; ?>
<?php if ($xsBannerTextPaddingRight != "") : ?>
		padding-right: <?php echo $xsBannerTextPaddingRight; ?>;
<?php endif; ?>
	}
<?php endif; ?>

<?php if ($xsBannerPaddingTop != "" || $xsBannerPaddingBottom != "") : ?>
	.banner-xs {	
<?php if ($xsBannerPaddingTop != "") : ?>
		padding-top: <?php echo $xsBannerPaddingTop; ?>;
<?php endif; ?>
<?php if ($xsBannerPaddingBottom != "") : ?>
		padding-bottom: <?php echo $xsBannerPaddingBottom; ?>;
<?php endif; ?>
	}
<?php endif; ?>
