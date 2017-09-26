<?php
/**
 * @package     Joomla.Site
 * @subpackage  com_mailto
 *
 * @copyright   Copyright (C) 2005 - 2015 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;
JHtml::_('behavior.core');
JHtml::_('behavior.keepalive');

$data = $this->get('data');

JFactory::getDocument()->addScriptDeclaration("
	Joomla.submitbutton = function(pressbutton)
	{
		var form = document.getElementById('mailtoForm');

		// do field validation
		if (form.mailto.value == '' || form.from.value == '')
		{
			alert('" . JText::_('COM_MAILTO_EMAIL_ERR_NOINFO') . "');
			return false;
		}
		form.submit();
	}
");
?>

<div id="mailto-window">
	<form action="<?php echo JUri::base() ?>index.php" id="mailtoForm" method="post">
		<div class="container">
			<div class="row">
				<div class="mailto-close pull-right">
					<a href="javascript: void window.close()" title="<?php echo JText::_('COM_MAILTO_CLOSE_WINDOW'); ?>" class="btn btn-danger">
					<span class="glyphicon glyphicon-remove-sign"></span></a>
				</div>
				<div class="pull-left">
					<legend><?php echo JText::_('COM_MAILTO_EMAIL_TO_A_FRIEND'); ?></legend>
				</div>
			</div>
		</div>
		<fieldset>
			<div class="form-group">
				<label for="mailto_field"><?php echo JText::_('COM_MAILTO_EMAIL_TO'); ?></label>
				<input type="text" id="mailto_field" name="mailto" class="form-control" size="25" value="<?php echo $this->escape($data->mailto); ?>"/>
			</div>
			<div class="form-group">
				<label for="sender_field"><?php echo JText::_('COM_MAILTO_SENDER'); ?></label>
				<input type="text" id="sender_field" name="sender" class="form-control" value="<?php echo $this->escape($data->sender); ?>" size="25" />
			</div>
			<div class="form-group">
				<label for="from_field"><?php echo JText::_('COM_MAILTO_YOUR_EMAIL'); ?></label>
				<input type="text" id="from_field" name="from" class="form-control" value="<?php echo $this->escape($data->from); ?>" size="25" />
			</div>
			<div class="form-group">
				<label for="subject_field"><?php echo JText::_('COM_MAILTO_SUBJECT'); ?></label>
				<input type="text" id="subject_field" name="subject" class="form-control" value="<?php echo $this->escape($data->subject); ?>" size="25" />
			</div>
		</fieldset>

		<div class="form-actions">
			<button type="submit" class="btn btn-primary validate" onclick="return Joomla.submitbutton('send');"><?php echo JText::_('COM_MAILTO_SEND');?></button>
			<button type="submit" class="btn btn-danger validate" onclick="window.close();return false;"><?php echo JText::_('COM_MAILTO_CANCEL');?></button>
			<input type="hidden" name="layout" value="<?php echo $this->getLayout();?>" />
			<input type="hidden" name="option" value="com_mailto" />
			<input type="hidden" name="task" value="send" />
			<input type="hidden" name="tmpl" value="component" />
			<input type="hidden" name="link" value="<?php echo $data->link; ?>" />
			<?php echo JHtml::_('form.token'); ?>
		</div>

	</form>
</div>
