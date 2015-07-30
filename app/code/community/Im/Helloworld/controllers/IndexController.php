<?php
/**
 * Description of IndexController
 *
 * @author imran
 */
class Im_Helloworld_IndexController extends Mage_Core_Controller_Front_Action
{
    public function indexAction()
    {
        //echo "Hello World";
        $this->loadLayout(); 
        $this->renderLayout();
    }
    
    public function testAction()
    {
        echo "Test Action.";
    }
}
