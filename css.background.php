<?php
$templateBackgroundImage = $this->params->get('templateBackgroundImage')==""?"":JUri::root().$this->params->get('templateBackgroundImage');

if ($templateBackgroundImage!='') {
	$templateBackgroundImageRepeatX = $this->params->get('templateBackgroundImageRepeatX')?'repeat':'no-repeat';
	$templateBackgroundImageRepeatY = $this->params->get('templateBackgroundImageRepeatY')?'repeat':'no-repeat';
	$templateBackgroundImageAttachment = $this->params->get('templateBackgroundImageAttachment');
	$templateBackgroundImageSize = $this->params->get('templateBackgroundImageSize')=="value"?$this->params->get('templateBackgroundImageSizeValue'):$this->params->get('templateBackgroundImageSize');
	$templateBackgroundImagePositionX = $this->params->get('templateBackgroundImagePositionX')=="value"?$this->params->get('templateBackgroundImagePositionXValue'):$this->params->get('templateBackgroundImagePositionX');
	$templateBackgroundImagePositionY = $this->params->get('templateBackgroundImagePositionY')=="value"?$this->params->get('templateBackgroundImagePositionYValue'):$this->params->get('templateBackgroundImagePositionY');
}

?>

<?php if ($templateBackgroundImage != "") : ?>
	/* template background image */
	body {
		background-image: url(<?php echo $templateBackgroundImage; ?>);
		background-repeat-x: <?php echo $templateBackgroundImageRepeatX; ?>;
		background-repeat-y: <?php echo $templateBackgroundImageRepeatY; ?>;
		background-position-x: <?php echo $templateBackgroundImagePositionX; ?>;
		background-position-y: <?php echo $templateBackgroundImagePositionY; ?>;
		background-attachment: <?php echo $templateBackgroundImageAttachment; ?>;
		background-size: <?php echo $templateBackgroundImageSize; ?>;
		height: <?php echo $templateBackgroundImageSize; ?>;
	}
<?php endif; ?>
