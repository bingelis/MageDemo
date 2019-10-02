<?php

namespace MageDemo\FeaturedProducts\Helper;

use Magento\Framework\App\Helper\AbstractHelper;
use Magento\Store\Model\ScopeInterface;

class Config extends AbstractHelper
{
    const CONFIG_PATH = 'featured_products/general/';

    public function isEnabled(): bool
    {
        return !!$this->scopeConfig->getValue(self::CONFIG_PATH . 'enable', ScopeInterface::SCOPE_STORE);
    }

    public function pageTitle(): string
    {
        return $this->scopeConfig->getValue(self::CONFIG_PATH . 'page_title', ScopeInterface::SCOPE_STORE);
    }

    public function displayLimit(): int
    {
        return (int)$this->scopeConfig->getValue(self::CONFIG_PATH . 'display_limit', ScopeInterface::SCOPE_STORE);
    }
}
