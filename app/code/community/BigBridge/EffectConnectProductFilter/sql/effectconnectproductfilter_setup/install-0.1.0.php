<?php

$installer = $this;
$installer->startSetup();

$applyTo = array(
    Mage_Catalog_Model_Product_Type::TYPE_SIMPLE,
    Mage_Catalog_Model_Product_Type::TYPE_GROUPED,
    Mage_Catalog_Model_Product_Type::TYPE_CONFIGURABLE,
    Mage_Catalog_Model_Product_Type::TYPE_VIRTUAL,
    Mage_Catalog_Model_Product_Type::TYPE_BUNDLE,
    Mage_Downloadable_Model_Product_Type::TYPE_DOWNLOADABLE
);

if (!$installer->getAttribute(Mage_Catalog_Model_Product::ENTITY, 'effectconnect_allow_export')) {
    $installer->addAttribute(
        Mage_Catalog_Model_Product::ENTITY,
        'effectconnect_allow_export',
        array(
            'backend'                    => 'catalog/product_attribute_backend_boolean',
            'group'                      => 'General',
            'sort_order'                 => 100,
            'frontend'                   => '',
            'frontend_class'             => '',
            'default'                    => '0',
            'label'                      => 'EffectConnect allow export',
            'input'                      => 'select',
            'type'                       => 'int',
            'source'                     => 'eav/entity_attribute_source_boolean',
            'global'                     => Mage_Catalog_Model_Resource_Eav_Attribute::SCOPE_STORE,
            'visible'                    => true,
            'required'                   => false,
            'searchable'                 => false,
            'filterable'                 => false,
            'filterable_in_search'       => false,
            'unique'                     => false,
            'comparable'                 => false,
            'visible_on_front'           => false,
            'visible_in_advanced_search' => false,
            'is_html_allowed_on_front'   => false,
            'used_in_product_listing'    => false,
            'user_defined'               => false,
            'apply_to'                   => implode(',', $applyTo),
            'is_configurable'            => false,
            'used_for_sort_by'           => false,
            'position'                   => 0,
            'used_for_promo_rules'       => true
        )
    );
}

$installer->endSetup();
