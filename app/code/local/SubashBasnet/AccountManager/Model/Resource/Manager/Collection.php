<?php
/**
 * app/code/local/SubashBasnet/AccountManager/Model/Resource/Manager/Collection.php
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
class SubashBasnet_AccountManager_Model_Resource_Manager_Collection extends 
    Mage_Core_Model_Mysql4_Collection_Abstract
{
    protected function _construct()
    {
        $this->_init('accountmanager/manager');
    }
}