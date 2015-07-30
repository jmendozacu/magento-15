<?php

/**
 * Description of Index
 *
 * @author imran
 */
class Im_Giftregistry_IndexController extends Mage_Core_Controller_Front_Action
{

    public function preDispatch()
    {
        parent::preDispatch();
        if (!Mage::getSingleton('customer/session')->authenticate($this)) {
            $this->getResponse()->setRedirect(Mage::helper('customer')->getLoginUrl());
            $this->setFlag('', self::FLAG_NO_DISPATCH, true);
        }
    }

    public function indexAction()
    {
        $this->loadLayout();
        $this->renderLayout();
        return $this;
    }

    public function deleteAction()
    {
        try {
            $registyId = $this->getRequest()->getParam('registry_id');
            if ($registyId) {
                if ($registry = Mage::getModel('im_giftregistry/entity')->load($registyId)) {
                    $registry->delete();
                    $successMsg = Mage::helper('im_giftregistry')->__("Successfully deleted.");
                    Mage::getSingleton('core/session')->addSuccess($successMsg);
                } else {
                    throw new Exception("Cannot be deleted.");
                }
            }
        } catch (Exception $ex) {
            Mage::getSingleton('core/session')->addError($ex->getMessage());
            $this->_redirect('*/*/');
        }
        $this->_redirect('*/*/');
    }

    public function newAction()
    {
        $this->loadLayout();
        $this->renderLayout();
        return $this;
    }

    public function editAction()
    {
        $registry_id = $this->getRequest()->getParam('registry_id');
        $registry = Mage::getModel('im_giftregistry/entity')->load($registry_id);
        Mage::getSingleton('customer/session')->setLoadedRegistry($registry);
        $this->loadLayout();
        $this->renderLayout();
        return $this;
    }

    public function newPostAction()
    {
        //die("in.");
        try {
            if ($this->getRequest()->isPost() && !empty($this->getRequest()->getParams())) {//if data is posted
                $data = $this->getRequest()->getParams();
                $customer = Mage::getModel('customer/session')->getCustomer();
                $data = array_merge( $data, array('website_id' => '1', 'customer_id' => $customer->getId()) );
                $reg = Mage::getModel('im_giftregistry/entity');
                $reg->updateRegistryData($customer, $data);
                $reg->save();
                $successMessage = Mage::helper('im_giftregistry')->__('Registry Successfully Saved');
                Mage::getSingleton('core/session')->addSuccess($successMessage);
            } else {
                throw new Exception("Insufficient data provided.");
            }
        } catch (Exception $ex) {
            Mage::getSingleton('core/session')->addError($ex->getMessage());
            $this->_redirect('*/*/');
        }
        $this->_redirect('*/*/');
    }

    public function editPostAction()
    {
        try {
            $data = $this->getRequest()->getParams();
            $registry = Mage::getModel('im_giftregistry/entity');
            $customer = Mage::getSingleton('customer/session')->getCustomer();
            if ($this->getRequest()->getPost() && !empty($data)) {
                $registry->load($data['registry_id']);
                if ($registry) {
                    $registry->updateRegistryData($customer, $data);
                    $registry->save();
                    $successMessage = Mage::helper('im_giftregistry')->__('Registry Successfully Saved');
                    Mage::getSingleton('core/session')->addSuccess($successMessage);
                } else {
                    throw new Exception("Invalid Registry Specified");
                }
            } else {
                throw new Exception("Insufficient Data provided");
            }
        } catch (Mage_Core_Exception $e) {
            Mage::getSingleton('core/session')->addError($e->getMessage());
            $this->_redirect('*/*/');
        }
        $this->_redirect('*/*/');
    }

}
