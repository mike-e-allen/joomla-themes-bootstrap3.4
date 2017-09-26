<?php
/**
 * @package     Joomla.Site
 * @subpackage  mod_]
 *
 * @copyright   Copyright (C) 2005 - 2014 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;
?>

<div class="menu<?php echo $class_sfx;?>"<?php
	$tag = '';
	if ($params->get('tag_id') != null)
	{
		$tag = $params->get('tag_id').'';
		echo ' id="'.$tag.'"';
	}
?>>
<?php

$card_count=0;

foreach ($list as $i => &$item) :
	$card_count++;
	
	$class = ' class="media item-'.$item->id.'"';
	
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

$linktype = '<img src="'.$item->menu_image.'" alt="'.$item->title.'" />';

$flink = $item->flink;
$flink = JFilterOutput::ampReplace(htmlspecialchars($flink));
?>

<?php if ($card_count % 4 == 1 ): ?>
<div class="row">
<?php  endif; ?>

  <div class="col-md-3 col-sm-6 col-xs-12">
<?php	echo '<div '.$class.'>'; ?>


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
<?php
if ($card_count % 4 == 0 ):
	echo '</div>';
endif;
endforeach;
?></div>
