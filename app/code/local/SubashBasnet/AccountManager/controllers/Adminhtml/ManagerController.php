<?php
/**
 * app/code/local/SubashBasnet/AccountManager/controllers/ManagerController.php
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
class SubashBasnet_AccountManager_Adminhtml_ManagerController extends Mage_Adminhtml_Controller_Action
{
   
    
    public function indexAction()
    {
        $this->loadLayout();
        
        $this->_setActiveMenu('accountmanager/managers');
        
        $this->_addContent(
            $this->getLayout()->createBlock('accountmanager/adminhtml_manager')
        );
        
        return $this->renderLayout();
    }
    
    public function newAction()
    {
        $this->_forward('edit');
    }
    
    public function editAction()
    {
        if ( $managerId = $this->getRequest()->getParam('manager_id') ) {
            Mage::register('current_manager', Mage::getModel('accountmanager/manager')->load($managerId));
        }
        
        $this->loadLayout();
        $this->_setActiveMenu('accountmanager/managers');
        
        $this->_addContent(
            $this->getLayout()->createBlock('accountmanager/adminhtml_manager_edit')
        );
        
        return $this->renderLayout();
    }
    
    
    public function saveAction()
    {
        $managerId = $this->getRequest()->getParam('manager_id');
        $managerModel = Mage::getModel('accountmanager/manager')->load($managerId);
        
        if ( $data = $this->getRequest()->getPost() ) {
            if($this->getRequest()->getPost('postcode')){
                $collection = Mage::getModel('accountmanager/manager')->getCollection();
                $collection->addFieldToFilter('postcode',$this->getRequest()->getPost('postcode'));
                if(count($collection)){
                    Mage::getSingleton('adminhtml/session')->addError(Mage::helper('accountmanager')->__('Postal sector already exist.'));
                    $this->_redirect('*/*/edit');
                    return;
                }
                
                try {
                    $managerModel->addData($data)->save();
                    Mage::getSingleton('adminhtml/session')->addSuccess(
                        $this->__("Account manager has been saved successfully.")
                    );
                } catch ( Exception $e ) {
                    Mage::getSingleton('adminhtml/session')->setManagerFormData($data);
                    Mage::getSingleton('adminhtml/session')->addError($e->getMessage());
                    $this->_redirect('*/*/edit', array('_current' => true));
                }
            }
        }
        
        $this->_redirect('*/*/index');
    }
    
//    public function saveAction()
//    {
//        $managerId = $this->getRequest()->getParam('manager_id');
//        $managerModel = Mage::getModel('accountmanager/manager')->load($managerId);
//        
//        if ( $data = $this->getRequest()->getPost() ) {
//            try {
//                $managerModel->addData($data)->save();
//                Mage::getSingleton('adminhtml/session')->addSuccess(
//                    $this->__("Account manager has been saved successfully.")
//                );
//            } catch ( Exception $e ) {
//                Mage::getSingleton('adminhtml/session')->setManagerFormData($data);
//                Mage::getSingleton('adminhtml/session')->addError($e->getMessage());
//                $this->_redirect('*/*/edit', array('_current' => true));
//            }
//        }
//        
//        $this->_redirect('*/*/index');
//    }
    
    public function deleteAction()
    {
        $managerId = $this->getRequest()->getParam('manager_id');
        $managerModel = Mage::getModel('accountmanager/manager')->load($managerId);
        
            try {
                $managerModel->delete();
                Mage::getSingleton('adminhtml/session')->addSuccess(
                    $this->__("Account manager has been deleted.")
                );
            } catch ( Exception $e ) {
                Mage::getSingleton('adminhtml/session')->addError($e->getMessage());
                $this->_redirect('*/*/edit', array('_current' => true));
            }
        
        $this->_redirect('*/*/index');
    }
    
    
    public function massDeleteAction()
    {
        if ( $managerIds = $this->getRequest()->getParam('manager_ids') ) {
            try {
                foreach ($managerIds as $managerId) {
                    $model = Mage::getModel('accountmanager/manager')->load($managerId);
                    $model->delete();
                }
                Mage::getSingleton('adminhtml/session')->addSuccess(
                    $this->__("%d manager(s) have been deleted!", count($managerIds))
                );
            } catch ( Exception $e ) {
                Mage::getSingleton('adminhtml/session')->addError($e->getMessage());
            }
        } else {
            Mage::getSingleton('adminhtml/session')->addError(
                $this->__/'You must select a manager.'
            );
        }
        
        $this->_redirect('*/*/index');
    }
    
    
    /**
     * Export event grid to CSV format
     */
    public function exportCsvAction()
    {
        $fileName = 'account-managers.csv';
        $grid     = $this->getLayout()->createBlock('accountmanager/adminhtml_manager_grid');
        $this->_prepareDownloadResponse($fileName, $grid->getCsvFile());
    }
    
    /**
     * Export event grid to Excel XML format
     */
    public function exportExcelAction()
    {
        $fileName = 'account-managers.xlsx';
        $grid     = $this->getLayout()->createBlock('accountmanager/adminhtml_manager_grid');
        $this->_prepareDownloadResponse($fileName, $grid->getExcelFile($fileName));
    }
    
}