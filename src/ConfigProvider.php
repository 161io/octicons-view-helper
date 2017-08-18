<?php
/**
 * Copyright (c) 161 SARL, https://161.io
 */

namespace Io161\Octicons;

use Zend\ServiceManager\Factory\InvokableFactory;

class ConfigProvider
{
    /**
     * @return array
     */
    public function __invoke()
    {
        return [
            'view_helpers' => $this->getViewHelperConfig(),
        ];
    }

    public function getViewHelperConfig()
    {
        return [
            'aliases' => [
                'octicons' => View\Helper\Octicons::class,
            ],
            'factories' => [
                View\Helper\Octicons::class => InvokableFactory::class,
            ],
        ];
    }
}
