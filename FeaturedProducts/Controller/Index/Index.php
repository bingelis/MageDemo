<?php

namespace MageDemo\FeaturedProducts\Controller\Index;

use MageDemo\FeaturedProducts\Helper\Config;
use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\Exception\NotFoundException;
use Magento\Framework\View\Result\PageFactory;

class Index extends Action
{
    /** @var Config */
    protected $config;

    /** @var PageFactory */
    protected $pageFactory;

    public function __construct(
        Context $context,
        Config $config,
        PageFactory $pageFactory
    ) {
        $this->config = $config;
        $this->pageFactory = $pageFactory;

        parent::__construct($context);
    }

    public function execute()
    {
        if (!$this->config->isEnabled()) {
            throw new NotFoundException(__('Page not found.'));
        }

        return $this->pageFactory->create();
    }
}
