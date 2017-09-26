<?php
$isFluidSite = $params->get('fluidContainer');

$templatePaddingTop = $this->params->get('templatePaddingTop');
if (!$hasProfileMenu && $templatePaddingTop=="") {
	$templatePaddingTop="0px";
} else if ($hasProfileMenu && $templatePaddingTop=="") {
	$templatePaddingTop="50px";
}

$templatePaddingBottom = $this->params->get('templatePaddingBottom');
if ($templatePaddingBottom=="") {
	$templatePaddingBottom="0px";
}
?>

<?php if(!$this->params->get('templateHasRoundedCorners')) : ?>
	body .panel {
		border-radius: 0;
	}
<?php endif; ?>

	.site {
		padding-top: <?php echo $templatePaddingTop; ?>;
		padding-bottom: <?php echo $templatePaddingBottom; ?>;
	}
