<?php
/**
 * @package		Joomla.Site
 * @subpackage	com_search
 * @copyright	Copyright (C) 2005 - 2012 Open Source Matters, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 */

// no direct access
defined('_JEXEC') or die;
$lang = JFactory::getLanguage();
$upper_limit = $lang->getUpperLimitSearchWord();
?>

<form id="searchForm" action="<?php echo JRoute::_('index.php?option=com_jifile');?>" method="post">

	<fieldset class="word">
		<label for="search-searchword">
			<?php echo JText::_('COM_JIFILE_SEARCH_KEYWORD'); ?>
		</label>
		<div class="input-append">
			<input type="text" name="searchword" id="search-searchword" placeholder="<?php echo JText::_('COM_JIFILE_SEARCH_KEYWORD'); ?>" size="30" maxlength="<?php echo $upper_limit; ?>" value="<?php echo $this->escape($this->origkeyword); ?>" class="inputbox" />
			<button name="Search" onclick="this.form.submit()" class="button btn"><?php echo JText::_('COM_JIFILE_SEARCH');?></button>
		</div>
		<input type="hidden" name="task" value="search" />
	</fieldset>

	<div class="searchintro<?php echo $this->params->get('pageclass_sfx'); ?>">
		<?php if (!empty($this->searchword)):?>
		<p><?php echo JText::plural('COM_JIFILE_SEARCH_KEYWORD_N_RESULTS', '<span class="badge badge-info">'. $this->total. '</span>');?></p>
		<?php endif;?>
	</div>

	<fieldset class="phrases">
		<legend><?php echo JText::_('COM_JIFILE_FOR');?>
		</legend>
			<div class="phrases-box">
			<?php echo $this->lists['searchphrase']; ?>
			</div>
			<!--div class="ordering-box">
			<label for="ordering" class="ordering">
				<?php echo JText::_('COM_SEARCH_ORDERING');?>
			</label>
			<?php //echo $this->lists['ordering'];?>
			</div-->
	</fieldset>

<?php if ($this->total > 0) : ?>

	<div class="form-limit">
		<label for="limit">
			<?php echo JText::_('JGLOBAL_DISPLAY_NUM'); ?>
		</label>
		<?php echo $this->pagination->getLimitBox(); ?>
	</div>
<p class="counter">
		<?php echo $this->pagination->getPagesCounter(); ?>
	</p>

<?php endif; ?>

</form>
