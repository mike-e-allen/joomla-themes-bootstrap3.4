<?php
$footerPaddingTop = $this->params->get('footerPaddingTop');
$footerPaddingBottom = $this->params->get('footerPaddingBottom');

include "css.footer.outer.php";
include "css.footer.inner.php";

	<style type="text/css">
<?php if ($footerPaddingTop != "" || $footerPaddingBottom != "") : ?>
		.footer-outer {	
<?php if ($footerPaddingTop != "") : ?>
			padding-top: <?php echo $footerPaddingTop; ?>;
<?php endif; ?>
<?php if ($footerPaddingBottom != "") : ?>
			padding-bottom: <?php echo $footerPaddingBottom; ?>;
<?php endif; ?>
		}
<?php endif; ?>


</style>
