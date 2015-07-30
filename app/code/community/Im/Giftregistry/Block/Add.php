<?php


/**
 * Description of Add
 *
 * @author imran
 */
class Im_Giftregistry_Block_Add extends Mage_Core_Block_Template
{
    public function getCustomerRegistryCollection()
    {
        $customer = Mage::getSingleton('customer/session')->getCustomer();
        
        if($customer) {
            $collection = Mage::getModel('im_giftregistry/entity')->getCollection()
                            ->addFieldToFilter('customer_id', $customer->getId());
            return $collection;
        } else {
            return false;
        }
    }
}
