<?php

/**
 * Description of ViewController
 *
 * @author imran
 */
class Im_Giftregistry_ViewController extends Mage_Core_Controller_Front_Action
{

    function indexAction() {
        echo "test";
        die();
    }
    
    function viewAction()
    {
        $registryId = $this->getRequest()->getParam('registry_id');
        if($registryId) {
            $entity = Mage::getModel('im_giftregistry/entity');
            if($entity->load($registryId)) {
                Mage::register('loaded_registry', $entity);
                $this->loadLayout();
                $this->_initLayoutMessages('customer/session');
                $this->renderLayout();
                return $this;
            } else {
                $this->_forward('noroute');
                return $this;
            }
        }
    }

}
