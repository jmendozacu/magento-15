<?php

class Im_Customer_Helper_Data extends Mage_Customer_Helper_Data {
    /**
     * Retrieve current customer name
     *
     * @return string
     */
    public function getCustomerName()
    {
        return strtoupper($this->getCustomer()->getName());
    }
}
