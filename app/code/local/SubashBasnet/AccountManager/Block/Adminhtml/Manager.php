<?php
/**
 * app/code/local/SubashBasnet/AccountManager/Block/Adminhtml/Manager.php
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
class SubashBasnet_AccountManager_Block_Adminhtml_Manager extends 
    Mage_Adminhtml_Block_Widget_Grid_Container
{
    
    public function __construct()
    {
        $this->_blockGroup = 'accountmanager';
        $this->_controller = 'adminhtml_manager';
        $this->_headerText = Mage::helper('accountmanager')->__('Account Manager');
        $this->_addButtonLabel = Mage::helper('accountmanager')->__('Add New');
        parent::__construct();
    }
}