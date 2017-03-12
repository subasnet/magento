<?php
/**
 * app/code/local/MasteringMagento/Example/Block/Adminhtml/Event/Edit/Form.php
 *
 * This is description
 *
 * NOTICE OF LICENSE
 *
 * @author      Subash Basnet
 * @category    MasteringMagento
 * @package     Example
 * @copyright   Copyright (c) 2017 
 */
class SubashBasnet_AccountManager_Block_Adminhtml_Manager_Edit_Form extends 
    Mage_Adminhtml_Block_Widget_Form
{
    
    protected function _initFormValues()
    {
        if( $manager = Mage::registry('current_manager') ) {
            $data = $manager->getData();
            $this->getForm()->setValues($data);
        }
        
        if ( $data = Mage::getSingleton('adminhtml/session')->getData('manager_form_data', true) ) {
            $this->getForm()->setValues($data);
        }
    }
    
    protected function _prepareForm()
    {
        $form = new Varien_Data_Form(
            array(
                'id' => 'edit_form', 
                'action' => $this->getData('action'), 
                'method' => 'post'
                )
        );

        $fieldset = $form->addFieldset('base_fieldset', array('legend' => Mage::helper('accountmanager')->__('General Information'), 'class' => 'fieldset-wide'));
        
        $fieldset->addField('postcode', 'text', array(
            'name'      => 'postcode',
            'label'     => Mage::helper('accountmanager')->__('Postal Sector'),
            'title'     => Mage::helper('accountmanager')->__('Postal Sector'),
            'required'  => true,
        ));

        $fieldset->addField('name', 'text', array(
            'name'      => 'name',
            'label'     => Mage::helper('accountmanager')->__('Name'),
            'title'     => Mage::helper('accountmanager')->__('Name'),
            'required'  => true,
        ));
        
        

        $form->setUseContainer(true);
        $this->setForm($form);

        return parent::_prepareForm();
    }
}