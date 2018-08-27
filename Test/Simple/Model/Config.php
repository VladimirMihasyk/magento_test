<?php

namespace Test\Simple\Model;
use Magento\Framework\App\Config\ScopeConfigInterface;

/**
 * Description of Config
 *
 * @author pramod
 */
class Config {
    
    const XML_PATH_ENABLED = 'ordersmultiplied/general/enable';
    const XML_PATH_DECIMAL_FACTOR = 'ordersmultiplied/general/decimal_factor';

    private $config;

    public function __construct(ScopeConfigInterface $config)
    {
        $this->config = $config;
    }

    public function isEnabled()
    {
        return $this->config->getValue(self::XML_PATH_ENABLED);
    }

    public function getDecimalFactor()
    {
        return $this->config->getValue(self::XML_PATH_DECIMAL_FACTOR);
    }


}