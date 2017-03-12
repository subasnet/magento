<?php
/**
 * app/code/local/SubashBasnet/AccountManager/Block/Adminhtml/Manager/Manager.php
 *
 * This is description
 *
 * NOTICE OF LICENSE
 *
 * @author      Subash Basnet
 * @category    SubashBasnet
 * @package     AccountManager
 * @copyright   Copyright (c) 2017 
 */
class SubashBasnet_AccountManager_Block_Adminhtml_Manager_Edit extends Mage_Adminhtml_Block_Widget_Form_Container
{
    public function __construct()
    {
        $this->_objectId = 'manager_id';
        $this->_blockGroup = 'accountmanager';
        $this->_controller = 'adminhtml_manager';
        
        parent::__construct();
    }
    
    /**
     * Get edit form container header text
     *
     * @return string
     */
    public function getHeaderText()
    {
        return Mage::helper('accountmanager')->__('New Account Manager');
    }
    
    public function getSaveUrl()
    {
        return $this->getUrl('*/manager/save', array('_current' => true));
    }
}