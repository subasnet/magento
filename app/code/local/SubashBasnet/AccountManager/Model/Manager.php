<?php
/**
 * app/code/local/SubashBasnet/AccountManager/Model/Manager.php
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
class SubashBasnet_AccountManager_Model_Manager extends Mage_Core_Model_Abstract
{
    public function _construct()
    {
        $this->_init('accountmanager/manager');
    }
}