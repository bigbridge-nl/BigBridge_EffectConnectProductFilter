<?php

class BigBridge_EffectConnectProductFilter_Model_Plus_Export_Products extends EffectConnect_Plus_Model_Export_Products
{
    protected function _getProducts() {
        $productCollection = Mage::getModel('catalog/product')
            ->getCollection()
            ->setStoreId($this->getStoreView())
            ->addAttributeToSelect('sku')
            ->addAttributeToFilter('effectconnect_allow_export', array('eq' => 1))
        ;
        $this->_updateLog('Start BigBridge filtered product export ('.$productCollection->getSize().')');
        Mage::getSingleton('core/resource_iterator')
            ->walk(
                $productCollection->getSelect(),
                array(
                    array(
                        $this,
                        'processProduct'
                    )
                )
            )
        ;

        return true;
    }
}
