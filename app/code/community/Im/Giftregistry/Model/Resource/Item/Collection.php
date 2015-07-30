<?php

/**
 * Description of Item
 *
 * @author imran
 */
class Im_Giftregistry_Model_Resource_Item_Collection extends Mage_Core_Model_Resource_Db_Collection_Abstract
{

    function _construct()
    {
        $this->_init('im_giftregistry/item');
    }

}
