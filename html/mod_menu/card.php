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
//echo "<pre>";print_r($list); echo "</pre>";

foreach ($list as $i => &$item) :

	$class = ' class="media item-'.$item->id.'"';
	
	echo '<div '.$class.'>';

	// Render the menu item.
	switch ($item->type) :
		case 'separator':
		case 'component':
		case 'heading':
			//require JModuleHelper::getLayoutPath('mod_menu', 'card_'.$item->type);
			break;

		default:
			require JModuleHelper::getLayoutPath('mod_menu', 'card_url');
			break;
	endswitch;

	echo '</div>';
endforeach;
?></div>
