<?php

/**
 * Description of Im_Giftregistry_Model_Resource_Type
 *
 * @author imran
 */
class Im_Giftregistry_Model_Resource_Type extends Mage_Core_Model_Resource_Db_Abstract
{

    function _construct()
    {
        $this->_init('im_giftregistry/type', 'type_id');
    }

}
