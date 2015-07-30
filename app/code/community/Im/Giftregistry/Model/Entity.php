<?php

/**
 * Description of Entity
 *
 * @author imran
 */
class Im_Giftregistry_Model_Entity extends Mage_Core_Model_Abstract
{

    function _construct()
    {
        $this->_init('im_giftregistry/entity');
    }

    function updateRegistryData(Mage_Customer_Model_Customer $customer, $data)
    {
        try {
            if (!empty($data)) {
                $this->setCustomerId($customer->getId());
                $this->setWebsiteId($customer->getWebsiteId());
                $this->setTypeId($data['type_id']);
                $this->setEventName($data['event_name']);
                $this->setEventDate($data['event_date']);
                $this->setEventCountry($data['event_country']);
                $this->setEventLocation($data['event_location']);
            } else {
                throw new Exception("Insufficient data provided to create/update registry.");
            }
        } catch (Exception $ex) {
            Mage::logException($ex);
        }
        return $this;
    }

}
