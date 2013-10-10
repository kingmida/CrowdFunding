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

jimport('joomla.application.component.view');

class CrowdFundingViewProject extends JView {
    
    protected $state;
    protected $item;
    protected $form;
    
    protected $documentTitle;
    protected $option;
    
    public function __construct($config) {
        parent::__construct($config);
        $this->option = JFactory::getApplication()->input->get("option");
    }
    
    /**
     * Display the view
     */
    public function display($tpl = null){
        
        $this->state= $this->get('State');
        $this->item = $this->get('Item');
        $this->form = $this->get('Form');
        
        // Prepare actions, behaviors, scritps and document
        $this->addToolbar();
        $this->setDocument();
        
        parent::display($tpl);
    }
    
    /**
     * Add the page title and toolbar.
     *
     * @since   1.6
     */
    protected function addToolbar(){
        
        JFactory::getApplication()->input->set('hidemainmenu', true);
        $isNew = ($this->item->id == 0);
        
        $this->documentTitle= $isNew  ? JText::_('COM_CROWDFUNDING_NEW_PROJECT')
                                      : JText::_('COM_CROWDFUNDING_EDIT_PROJECT');

        if(!$isNew) {
            JToolBarHelper::title($this->documentTitle, 'itp-edit-project');
        } else {
            JToolBarHelper::title($this->documentTitle, 'itp-add-project');
        }
		                             
        JToolBarHelper::apply('project.apply');
        JToolBarHelper::save('project.save');
    
        if(!$isNew){
            JToolBarHelper::cancel('project.cancel', 'JTOOLBAR_CANCEL');
        }else{
            JToolBarHelper::cancel('project.cancel', 'JTOOLBAR_CLOSE');
        }
        
    }
    
	/**
	 * Method to set up the document properties
	 *
	 * @return void
	 */
	protected function setDocument() {
	    
		$this->document->setTitle($this->documentTitle);
        
		// Add behaviors
		JHtml::_('behavior.keepalive');
		JHtml::_('behavior.formvalidation');
        JHtml::_('behavior.tooltip');
        
		// Add scripts
		$this->document->addScript('../media/'.$this->option.'/js/admin/'.JString::strtolower($this->getName()).'.js');
        
	}

}