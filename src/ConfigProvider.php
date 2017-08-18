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

    /**
     * @return array
     */
    public function getViewHelperConfig()
    {
        return [
            'aliases' => [
                'octicon' => View\Helper\Octicon::class,
                'Octicon' => View\Helper\Octicon::class,
            ],
            'factories' => [
                View\Helper\Octicon::class => InvokableFactory::class,
            ],
        ];
    }
}
