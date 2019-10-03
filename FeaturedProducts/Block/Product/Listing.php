<?php

namespace MageDemo\FeaturedProducts\Block\Product;

use MageDemo\FeaturedProducts\Helper\Config;
use Magento\Catalog\Api\CategoryRepositoryInterface;
use Magento\Catalog\Block\Product\Context;
use Magento\Catalog\Block\Product\ListProduct;
use Magento\Catalog\Model\Layer\Resolver;
use Magento\Catalog\Model\ResourceModel\Product\CollectionFactory;
use Magento\Framework\Data\Helper\PostHelper;
use Magento\Framework\Url\Helper\Data;

class Listing extends ListProduct
{
    /** @var CollectionFactory */
    protected $collectionFactory;

    /** @var Config */
    protected $config;

    public function __construct(
        Context $context,
        PostHelper $postDataHelper,
        Resolver $layerResolver,
        CategoryRepositoryInterface $categoryRepository,
        Data $urlHelper,
        CollectionFactory $collectionFactory,
        Config $config,
        array $data = []
    ) {
        parent::__construct($context, $postDataHelper, $layerResolver, $categoryRepository, $urlHelper, $data);
        $this->collectionFactory = $collectionFactory;
        $this->config = $config;
    }

    protected function _prepareLayout()
    {
        $this->pageConfig->getTitle()->set($this->config->pageTitle());
        return parent::_prepareLayout();
    }

    protected function _getProductCollection()
    {
        $this->_productCollection = $this->collectionFactory->create()
            ->addAttributeToSelect('*')
            ->addAttributeToFilter('is_featured', '1')
            ->setPageSize($this->config->displayLimit());

        return $this->_productCollection;
    }
}
