<?php
/**
 * Copyright (c) 161 SARL, https://161.io
 */

namespace Io161\Octicons;

class Module
{
    /**
     * @return array
     */
    public function getConfig()
    {
        $provider = new ConfigProvider();
        return [
            'view_helpers' => $provider->getViewHelperConfig(),
        ];
    }
}
