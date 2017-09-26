<?php
/**
 * @package     Joomla.Site
 * @subpackage  Layout
 *
 * @copyright   Copyright (C) 2005 - 2014 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('JPATH_BASE') or die;

$canEdit = $displayData['params']->get('access-edit');

?>

<div class="icons pull-right">
	<?php if (empty($displayData['print'])) : ?>

		<?php if ($canEdit || $displayData['params']->get('show_print_icon') || $displayData['params']->get('show_email_icon')) : ?>
			<div class="btn-group">
				<!--a class="btn btn-default dropdown-toggle" data-toggle="dropdown" href="#"> <span class="glyphicon glyphicon-cog"></span> <span class="caret"></span> </a-->
				<?php // Note the actions class is deprecated. Use dropdown-menu instead. ?>
				<!--ul class="dropdown-menu"-->
					<?php if ($displayData['params']->get('show_print_icon')) : ?>
						<!--li class="print-icon"--> <?php echo JHtml::_('icon.content_print_popup', $displayData['item'], $displayData['params']); ?> <!--/li-->
					<?php endif; ?>
					<?php if ($displayData['params']->get('show_email_icon')) : ?>
						<!--li class="email-icon"--> <?php echo JHtml::_('icon.content_email', $displayData['item'], $displayData['params']); ?> <!--/li-->
					<?php endif; ?>
					<?php if ($canEdit) : ?>
						<!--li class="edit-icon"--> <?php echo JHtml::_('icon.content_edit', $displayData['item'], $displayData['params']); ?> <!--/li-->
					<?php endif; ?>
				<!--/ul-->
			</div>
		<?php endif; ?>

	<?php else : ?>

		<div class="pull-right">
			<?php echo JHtml::_('icon.print_screen', $displayData['item'], $displayData['params']); ?>
		</div>

	<?php endif; ?>
</div>
