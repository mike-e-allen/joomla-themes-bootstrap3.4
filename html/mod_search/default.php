<?php
/**
 * @package     Joomla.Site
 * @subpackage  mod_search
 *
 * @copyright   Copyright (C) 2005 - 2014 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;
?>
<div class="search<?php echo $moduleclass_sfx ?> navbar-form navbar-right" role="search">
	<form action="<?php echo JRoute::_('index.php');?>" method="post" class="form-inline">
		<?php
			$output = '';
			if ($button) :
				$output .= '<div class="input-group">';
			endif;
		
			$output .= '<label for="mod-search-searchword" class="element-invisible">' . $label . '</label> ';
			$output .= '<input name="searchword" id="mod-search-searchword" maxlength="' . $maxlength . '"  class="inputbox search-query form-control" type="text" size="' . $width . '" placeholder="' . $text . '"  onblur="if (this.value==\'\') this.value=\'' . $text . '\';" onfocus="if (this.value==\'' . $text . '\') this.value=\'\';" />';

			if ($button) :
					$output .= '<span class="input-group-btn">';
					$output .= '<button class="btn btn-default" type="button">' .  $button_text . '</button>';
					$output .= '</span>';
			endif;

			if ($button) :
				$output .= '</div>';
			endif;

			echo $output;
		?>
		<input type="hidden" name="task" value="search" />
		<input type="hidden" name="option" value="com_search" />
		<input type="hidden" name="Itemid" value="<?php echo $mitemid; ?>" />
	</form>
</div>
