<?php

/**
 * Description of Collection
 *
 * @author imran
 */
class Im_Giftregistry_Model_Resource_Entity_Collection extends Mage_Core_Model_Resource_Db_Collection_Abstract
{

    function _construct()
    {
        $this->_init('im_giftregistry/entity');
    }

}
