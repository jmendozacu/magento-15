<?php
error_reporting(E_ALL | E_STRICT);
ini_set('display_errors', 1);
require_once 'app/Mage.php';

Mage::app();
//load front-end session to load currently logged in user.
Mage::app(); Mage::getSingleton('core/session', array('name'=>'frontend'));
$cust = Mage::helper('customer/data');
echo "<pre>";
print_r($cust);
echo "ya in...";
var_dump($cust->getCustomerName());
