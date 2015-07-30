<?php

/**
 * Description of SearchController
 *
 * @author imran
 */
class Im_Giftregisty_SearchController extends Mage_Core_Controller_Front_Action
{

    public function indexAction()
    {
        $this->loadLayout();
        $this->renderLayout();
        return $this;
    }

    public function resultsAction()
    {
        $this->loadLayout();
        if($searchParams = $this->getRequest()->getParam('search_params')) {
            $results = Mage::getModel('im_giftregisty/entity')->getCollection();
            if($searchParams['type']) {
                $results->addFieldToFilter('type_id', $searchParams['type']);
            }
            if($searchParams['date']) {
                $results->addFieldToFilter('event_date', $searchParams['date']);
            }
            if($searchParams['location']) {
                $results->addFieldToFilter('event_location', $searchParams['location']);
            }
            $this->getLayout()->getBlock('im_giftregistry.search.results')->setResults($results);
        }
        $this->renderLayout();
        return $this;
    }

}
