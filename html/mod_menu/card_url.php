<?php
/**
 * @package     Joomla.Site
 * @subpackage  mod_menu
 *
 * @copyright   Copyright (C) 2005 - 2014 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

$itemAttributes = array();
$itemAttributes['class'] = $item->anchor_css ? $item->anchor_css : null;
$itemAttributes['title'] = $item->anchor_title ? $item->anchor_title : null;

// Convert attributes to string
$attributes = '';

if (!empty($itemAttributes))
{
	foreach ($itemAttributes as $attribute => $value)
	{
		if (null !== $value)
		{
			$attributes .= ' ' . $attribute . '="' . trim((string) $value) . '"';
		}
	}
}
/*$item->params->get('menu_text', 1) ?
$linktype = '<img src="'.$item->menu_image.'" alt="'.$item->title.'" />' :*/
$linktype = '<img src="'.$item->menu_image.'" alt="'.$item->title.'" />';

$flink = $item->flink;
$flink = JFilterOutput::ampReplace(htmlspecialchars($flink));
?>

<div class="row">
  <div class="col-xs-12">

<?php
switch ($item->browserNav) :
	default:
	case 0:
?><a class="card thumbnail" <?php echo $attributes; ?>href="<?php echo $flink; ?>"><?php echo $linktype; ?></a><?php
		break;
	case 1:
		// _blank
?><a class="card thumbnail" <?php echo $attributes; ?>href="<?php echo $flink; ?>" target="_blank"><?php echo $linktype; ?></a><?php
		break;
	case 2:
		// window.open
		$options = 'toolbar=no,location=no,status=no,menubar=no,scrollbars=yes,resizable=yes,'.$params->get('window_open');
			?><a class="card thumbnail" <?php echo $attributes; ?>href="<?php echo $flink; ?>" onclick="window.open(this.href,'targetWindow','<?php echo $options;?>');return false;"><?php echo $linktype; ?></a><?php
		break;
endswitch;
?>
	</div>
</div>
