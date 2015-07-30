<?php

/**
 * Description of Entity
 *
 * @author imran
 */
class Im_Giftregistry_Model_Resource_Entity extends Mage_Core_Model_Resource_Db_Abstract
{

    function _construct()
    {
        $this->_init('im_giftregistry/entity', 'entity_id');
    }

}
