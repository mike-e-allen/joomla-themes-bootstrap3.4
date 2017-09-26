<?php
$bannerIsFluid = $params->get('fluidBanner');

$bannerSizeType = $this->params->get('bannerSizeType');
$bannerSizeValue = ($bannerSizeType=="fixed")?$this->params->get('bannerSizeValue'):"";

$bannerParallaxImage = $this->params->get('bannerParallaxImage')==""?"":(JUri::root().$this->params->get('bannerParallaxImage'));
$bannerBackgroundImage = $this->params->get('bannerBackgroundImage')==""?"":(JUri::root().$this->params->get('bannerBackgroundImage'));

$bannerBackgroundImageRepeatX = $this->params->get('bannerBackgroundImageRepeatX');
$bannerBackgroundImageRepeatY = $this->params->get('bannerBackgroundImageRepeatY');
$bannerBackgroundImagePositionX = $this->params->get('bannerBackgroundImagePositionX');
$bannerBackgroundImagePositionY = $this->params->get('bannerBackgroundImagePositionY');
$bannerBackgroundImageSizeType = $this->params->get('bannerBackgroundImageSize');
$bannerPaddingTop = $this->params->get('bannerPaddingTop');
$bannerPaddingBottom = $this->params->get('bannerPaddingBottom');

$bannerTextPaddingTop = $this->params->get('bannerTextPaddingTop');
$bannerTextPaddingLeft = $this->params->get('bannerTextPaddingLeft');
$bannerTextPaddingRight = $this->params->get('bannerTextPaddingRight');

$bannerSiteNameVerticalAlignment =  $this->params->get('bannerSiteNameVerticalAlignment');

$bannerBackgroundImagePositionX = $bannerBackgroundImagePositionX=="value"?$this->params->get('bannerBackgroundImagePositionXValue'):$bannerBackgroundImagePositionX;
$bannerBackgroundImagePositionY = $bannerBackgroundImagePositionY=="value"?$this->params->get('bannerBackgroundImagePositionYValue'):$bannerBackgroundImagePositionY;
$bannerBackgroundImageSize = $bannerBackgroundImageSizeType=="value"?$this->params->get('bannerBackgroundImageSizeValue'):($bannerBackgroundImageSizeType=="fixed"?"":($bannerBackgroundImageSizeType=="fill"?"100% 100%":""));
$bannerBackgroundImageSizeInner=$bannerBackgroundImageSizeType=="value"?($this->params->get('bannerBackgroundImageSizeValue')-62).'px':'';

if($bannerParallaxImage!='') {
	list($bannerOrigParallaxWidth, $bannerOrigParallaxHeight) = getimagesize($bannerParallaxImage);
}

if($bannerBackgroundImage!='') {
	list($bannerOrigBackgroundWidth, $bannerOrigBackgroundHeight) = getimagesize($bannerBackgroundImage);
}

if($bannerSizeType=='parallax' && $bannerParallaxImage != '') {
	$bannerSizeValue=$bannerOrigParallaxHeight;
} else if($bannerSizeType=='background' && $bannerBackgroundImage != '') {
	$bannerSizeValue=$bannerOrigBackgroundHeight;
}

if($bannerBackgroundImage!='') {
	$ratio=$bannerOrigBackgroundWidth/$bannerOrigBackgroundHeight;
	if($ratio>1) {
		if($bannerBackgroundImageSizeType=="fixed") {
			$bannerWidthLg=1136;
			$bannerHeightLg=min($bannerOrigBackgroundHeight, round(1136/$ratio)-30);
			$bannerWidthMd=936;
			$bannerHeightMd=min($bannerOrigBackgroundHeight, round(936/$ratio)-30);
			$bannerWidthSm=716;
			$bannerHeightSm=min($bannerOrigBackgroundHeight, round(716/$ratio)-30);

		} else {
			$bannerWidthLg=1136;
			$bannerHeightLg=round(1136/$ratio);
			$bannerWidthMd=936;
			$bannerHeightMd=round(936/$ratio);
			$bannerWidthSm=716;
			$bannerHeightSm=round(716/$ratio);
			$bannerSizeValue=$bannerHeightLg-60;
		}
	} else {
		$bannerWidthLg=round($bannerOrigBackgroundHeight*$ratio);
		$bannerHeightLg=$bannerOrigBackgroundHeight;
		$bannerWidthMd=round($bannerOrigBackgroundHeight*$ratio);
		$bannerHeightMd=$bannerOrigBackgroundHeight;
		$bannerWidthSm=round($bannerOrigBackgroundHeight*$ratio);
		$bannerHeightSm=$bannerOrigBackgroundHeight;
	}
}
?>

<?php if(!$this->params->get('bannerHasRoundedCorners')) : ?>
	.banner .panel {
		border-radius: 0;
	}
<?php endif; ?>

<?php if($bannerBackgroundImage!='' ) : ?>
    @media only screen and (min-width : 768px) {
		.banner .row {
			height: <?php echo $bannerHeightSm; ?>px;
		}
    }

    @media only screen and (min-width : 992px) {
		.banner .row {
			height: <?php echo $bannerHeightMd; ?>px;
		}
    }

    @media only screen and (min-width : 1200px) {
		.banner .row {
			height: <?php echo $bannerHeightLg; ?>px;
		}
    }
<?php endif; ?>


<?php if ($bannerPaddingTop != "" || $bannerPaddingBottom != "") : ?>
	.banner {	
<?php if ($bannerPaddingTop != "") : ?>
		padding-top: <?php echo $bannerPaddingTop; ?>;
<?php endif; ?>
<?php if ($bannerPaddingBottom != "") : ?>
		padding-bottom: <?php echo $bannerPaddingBottom; ?>;
<?php endif; ?>
	}
<?php endif; ?>

<?php if ($bannerTextPaddingTop != "" || $bannerTextPaddingLeft != "" || $bannerTextPaddingRight != "") : ?>
	.banner .panel .media {	
<?php if ($bannerTextPaddingTop != "") : ?>
		padding-top: <?php echo $bannerTextPaddingTop; ?>;
<?php endif; ?>
<?php if ($bannerTextPaddingLeft != "") : ?>
		padding-left: <?php echo $bannerTextPaddingLeft; ?>;
<?php endif; ?>
<?php if ($bannerTextPaddingRight != "") : ?>
		padding-right: <?php echo $bannerTextPaddingRight; ?>;
<?php endif; ?>
	}
<?php endif; ?>

<?php if ($bannerBackgroundImage != "") : ?>
	/* banner background image */
	.banner .panel .overlay {
		z-index: 200;
		float: right;
		position: absolute;
		width: 100%;
		height: 100%;
		background-image: url(<?php echo $bannerBackgroundImage; ?>);
<?php if ($bannerBackgroundImageSizeType == "fill") : ?>
		background-repeat-x: no-repeat;
		background-repeat-y: no-repeat;
<?php else: ?>
		background-position-x: <?php echo $bannerBackgroundImagePositionX; ?>;
		background-position-y: <?php echo $bannerBackgroundImagePositionY; ?>;
		background-repeat-x: <?php echo $bannerBackgroundImageRepeatX; ?>;
		background-repeat-y: <?php echo $bannerBackgroundImageRepeatY; ?>;
<?php endif; ?>
<?php if ($bannerBackgroundImageSize != "" && $bannerParallaxImage == "") : ?>
		background-size: <?php echo $bannerBackgroundImageSize; ?>;
<?php endif; ?>
<?php if ($bannerBackgroundImageSize != "" && $bannerParallaxImage != "") : ?>
		height: <?php echo $bannerBackgroundImageSize; ?>;
<?php endif; ?>
	}

	.banner .panel .media-body {
		vertical-align: <?php echo $bannerSiteNameVerticalAlignment; ?>;
	}
<?php endif; ?>


	.banner .panel {
<?php if ($bannerParallaxImage!=''): ?>
		background: transparent;
<?php endif; ?>
<?php if($bannerBackgroundImageSizeType!="fill") : ?>
height: <?php echo $bannerSizeValue+60; ?>px;  //problem??
<?php endif; ?>
	}

	.banner .panel .media-body {
		vertical-align: <?php echo $bannerSiteNameVerticalAlignment; ?>;
	}	


.banner .panel .overlay {
border-radius: 4px;
}

<?php if ($bannerIsFluid): ?>
.banner .panel .overlay {
	width: 100%;
}
<?php endif; ?>

<?php if (!$bannerIsFluid && $bannerBackgroundImage!=''): ?>
    @media only screen and (min-width : 768px) {
		.banner .panel .overlay, .banner .panel .panel-body {
			width: 716px;
			height: <?php echo $bannerHeightSm; ?>px;
		}
    }

    @media only screen and (min-width : 992px) {
		.banner .panel .overlay, .banner .panel .panel-body {
			width: 936px;
			height: <?php echo $bannerHeightMd; ?>px;
		}
    }

    @media only screen and (min-width : 1200px) {
		.banner .panel .overlay, .banner .panel .panel-body {
			width: 1136px;
			height: <?php echo $bannerHeightLg; ?>px;
		}
    }
<?php endif; ?>
