<?php

namespace MultiSafepay\Connect\Model;

class FastcheckoutConfigProvider implements \Magento\Checkout\Model\ConfigProviderInterface
{

    protected $_assetRepo;

    public function __construct(
    \Magento\Framework\ObjectManagerInterface $objectManager, \Magento\Framework\App\Config\ScopeConfigInterface $scopeConfig, \Magento\Framework\View\Asset\Repository $assetRepo
    )
    {
        $this->_objectManager = $objectManager;
        $this->_scopeConfig = $scopeConfig;
        $this->_assetRepo = $assetRepo;
    }

   

    
    public function getConfig()
    {
        $config = array();
        $config = array_merge_recursive($config, [
            'payment' => [
                'connect' => [
                    'hide_normal_checkout' => $this->_scopeConfig->getValue('fastcheckout/fastcheckout/fastcheckout_disable_checkout', \Magento\Store\Model\ScopeInterface::SCOPE_STORE)
                ],
            ],
        ]);
        return $config;
    }

}
