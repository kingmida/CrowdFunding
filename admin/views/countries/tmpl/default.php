<?php
/**
 * @package      CrowdFunding
 * @subpackage   Components
 * @author       Todor Iliev
 * @copyright    Copyright (C) 2013 Todor Iliev <todor@itprism.com>. All rights reserved.
 * @license      http://www.gnu.org/copyleft/gpl.html GNU/GPL
 */

// no direct access
defined('_JEXEC') or die;
?>
<form action="<?php echo JRoute::_('index.php?option=com_crowdfunding&view=countries'); ?>" method="post" name="adminForm" id="adminForm">
    <fieldset id="filter-bar">
        <div class="filter-search fltlft">
            <label class="filter-search-lbl hasTip" for="filter_search" title="<?php echo JText::_('COM_CROWDFUNDING_SEARCH_IN_NAME_TOOLTIP'); ?>"><?php echo JText::_('JSEARCH_FILTER_LABEL'); ?></label>
            <input type="text" name="filter_search" id="filter_search" value="<?php echo $this->escape($this->state->get('filter.search')); ?>" />
            <button type="submit"><?php echo JText::_('JSEARCH_FILTER_SUBMIT'); ?></button>
            <button type="button" onclick="document.id('filter_search').value='';this.form.submit();"><?php echo JText::_('JSEARCH_FILTER_CLEAR'); ?></button>
        </div>
    </fieldset>
    <div class="clr"> </div>
    
    <table class="adminlist">
       <thead><?php echo $this->loadTemplate('head');?></thead>
	   <tfoot><?php echo $this->loadTemplate('foot');?></tfoot>
	   <tbody><?php echo $this->loadTemplate('body');?></tbody>
	</table>

    <input type="hidden" name="boxchecked" value="0" />
    <input type="hidden" name="task" value="" />
    <input type="hidden" name="filter_order" value="<?php echo $this->listOrder; ?>" />
    <input type="hidden" name="filter_order_Dir" value="<?php echo $this->listDirn; ?>" />
    <?php echo JHtml::_('form.token'); ?>
</form>