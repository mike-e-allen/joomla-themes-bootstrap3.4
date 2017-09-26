<?php
$footerInnerImage = $this->params->get('footerInnerImage')==""?"":(JUri::root().$this->params->get('footerInnerImage'));

$footerInnerImageRepeatX = $this->params->get('footerInnerImageRepeatX');
$footerInnerImageRepeatY = $this->params->get('footerInnerImageRepeatY');
$footerInnerImagePositionX = $this->params->get('footerInnerImagePositionX');
$footerInnerImagePositionY = $this->params->get('footerInnerImagePositionY');
$footerInnerImageSizeType = $this->params->get('footerInnerImageSize');
$footerInnerImageAttachment = $this->params->get('footerInnerImageAttachment');

$footerInnerImagePositionX = $footerInnerImagePositionX=="value"?$this->params->get('footerInnerImagePositionXValue'):$footerInnerImagePositionX;
$footerInnerImagePositionY = $footerInnerImagePositionY=="value"?$this->params->get('footerInnerImagePositionYValue'):$footerInnerImagePositionY;
$footerInnerImageSize = $footerInnerImageSizeType=="value"?$this->params->get('footerInnerImageSizeValue'):($footerInnerImageSizeType=="fixed"?"":($footerInnerImageSizeType=="fill"?"100% 100%":""));
$footerInnerFixedToBottom = $this->params->get('footerInnerFixedToBottom')? 'navbar-fixed-bottom': '';
$footerIsInnerFixed=$footerInnerFixedToBottom<>'';


if($footerInnerImage!='') {
	list($footerInnerOrigWidth, $footerInnerOrigHeight) = getimagesize($footerInnerImage);
	$ratio=$footerInnerOrigWidth/$footerInnerOrigHeight;
	if($ratio>1) {
		if($footerInnerImageSizeType=="fixed") {
			$footerInnerWidthLg=1170;
			$footerInnerHeightLg=min($footerInnerOrigHeight, round(1170/$ratio))-30;
			$footerInnerWidthMd=970;
			$footerInnerHeightMd=min($footerInnerOrigHeight, round(970/$ratio))-30;
			$footerInnerWidthSm=750;
			$footerInnerHeightSm=min($footerInnerOrigHeight, round(750/$ratio))-30;
		} else {
			$footerInnerWidthLg=1170;
			$footerInnerHeightLg=round(1170/$ratio);
			$footerInnerWidthMd=970;
			$footerInnerHeightMd=round(970/$ratio);
			$footerInnerWidthSm=750;
			$footerInnerHeightSm=round(750/$ratio);
		}
	} else {
		$footerInnerWidthLg=round($footerInnerOrigHeight*$ratio)-30;
		$footerInnerHeightLg=$footerInnerOrigHeight;
		$footerInnerWidthMd=round($footerInnerOrigHeight*$ratio)-30;
		$footerInnerHeightMd=$footerInnerOrigHeight;
		$footerInnerWidthSm=round($footerInnerOrigHeight*$ratio)-30;
		$footerInnerHeightSm=$footerInnerOrigHeight;
	}
}
?>


<?php if(!$this->params->get('footerHasRoundedCorners') || $footerInnerImage!='') : ?>
	 .footer-inner {
<?php if(!$this->params->get('footerHasRoundedCorners')) : ?>
		border-radius: 0;
<?php endif; ?>
<?php if ($footerInnerImage!='') : ?>
	/* banner background image */
		background-image: url(<?php echo $footerInnerImage; ?>);
<?php if ($footerInnerImageSizeType == "fill") : ?>
		background-repeat-x: no-repeat;
		background-repeat-y: no-repeat;
<?php else: ?>
		background-position-x: <?php echo $footerInnerImagePositionX; ?>;
		background-position-y: <?php echo $footerInnerImagePositionY; ?>;
<?php if ($footerInnerImageAttachment == "fixed") : ?>
		background-position-y: bottom;
<?php endif; ?>
		background-repeat-x: <?php echo $footerInnerImageRepeatX; ?>;
		background-repeat-y: <?php echo $footerInnerImageRepeatY; ?>;
<?php endif; ?>
<?php if ($footerInnerImageSize != "") : ?>
		background-size: <?php echo $footerInnerImageSize; ?>;
		height: <?php echo $footerInnerImageSize; ?>;
<?php endif; ?>
<?php endif; ?>
	}
<?php endif; ?>

<?php if($footerInnerImage!='') : ?>
    @media only screen and (min-width : 768px) {
		.footer-inner {
			height: <?php echo $footerInnerHeightSm; ?>px;
		}
    }

    @media only screen and (min-width : 992px) {
		.footer-inner {
			height: <?php echo $footerInnerHeightMd; ?>px;
		}
    }

    @media only screen and (min-width : 1200px) {
		.footer-inner {
			height: <?php echo $footerInnerHeightLg; ?>px;
			width: <?php echo $footerInnerWidthLg; ?>px;
		}
    }
<?php endif; ?>
