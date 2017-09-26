<?php
/**
 * @package     Joomla.Site
 * @subpackage  com_mailto
 *
 * @copyright   Copyright (C) 2005 - 2015 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;
?>
<div class="mailto-sent">
	<div class="container">
		<div class="row">
			<div class="mailto-close pull-right">
				<a href="javascript: void window.close()" title="<?php echo JText::_('COM_MAILTO_CLOSE_WINDOW'); ?>" class="btn btn-danger">
				<span class="glyphicon glyphicon-remove-sign"></span></a>
			</div>
			<div class="pull-left">
				<h1><?php echo JText::_('COM_MAILTO_EMAIL_SENT'); ?></h1>
			</div>
		</div>
	</div>
</div>
