<?php
/**
 * @package     Joomla.Site
 * @subpackage  com_contact
 *
 * @copyright   Copyright (C) 2005 - 2016 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

JHtml::_('behavior.keepalive');
JHtml::_('behavior.formvalidator');

if(!defined('DS')) define('DS', DIRECTORY_SEPARATOR);

$this->form->reset( true ); // to reset the form xml loaded by the view
$this->form->loadFile( dirname(__FILE__) . DS . "forms" . DS . "contact.xml");

$captchaEnabled = false;

$captchaSet = $this->params->get('captcha', JFactory::getApplication()->get('captcha', '0'));

foreach (JPluginHelper::getPlugin('captcha') as $plugin)
{
	if ($captchaSet === $plugin->name)
	{
		$captchaEnabled = true;
		break;
	}
}
?>
<div class="contact-form">
	<form id="contact-form" action="<?php echo JRoute::_('index.php'); ?>" method="post" class="form-validate form-horizontal">
		<?php foreach ($this->form->getFieldsets() as $fieldset): ?>
			<?php if ($fieldset->name === 'captcha' && !$captchaEnabled) : ?>
				<?php continue; ?>
			<?php endif; ?>
			<?php $fields = $this->form->getFieldset($fieldset->name); ?>
			<?php if (count($fields)) : ?>
				<fieldset>
					<?php if (isset($fieldset->label) && strlen($legend = trim(JText::_($fieldset->label)))) : ?>
						<legend><?php echo $legend; ?></legend>
					<?php endif; ?>
					<?php foreach ($fields as $field) : ?>
						<?php if ($field->name === 'contact_email_copy' && !$this->params->get('show_email_copy')) : ?>
							<?php continue; ?>
						<?php endif; ?>
						<div class="form-group">
							<div class="col-sm-2 control-label">
<?php if ($fieldset->name !== 'captcha') : ?>
								<?php echo $field->label; ?>
						<?php endif; ?>
							</div>
							<div class="col-sm-10">
								<?php echo $field->input; ?>
							</div>
						</div>
					<?php endforeach; ?>
				</fieldset>
			<?php endif; ?>
		<?php endforeach; ?>
		<fieldset>
		<div class="form-group">
			<div class="col-sm-2"></div>
			<div class="col-sm-10">
				<button class="btn btn-primary validate" type="submit"><?php echo JText::_('COM_CONTACT_CONTACT_SEND'); ?></button>
				<input type="hidden" name="option" value="com_contact" />
				<input type="hidden" name="task" value="contact.submit" />
				<input type="hidden" name="return" value="<?php echo $this->return_page; ?>" />
				<input type="hidden" name="id" value="<?php echo $this->contact->slug; ?>" />
				<?php echo JHtml::_('form.token'); ?>
			</div>
		</div>
		</fieldset>
	</form>
</div>
