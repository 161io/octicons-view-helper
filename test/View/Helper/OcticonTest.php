<?php
/**
 * Copyright (c) 161 SARL, https://161.io
 */

namespace Io161Test\Octicons\View\Helper;

use Io161\Octicons\Module;
use Io161\Octicons\View\Helper\Octicon;
use PHPUnit\Framework\TestCase;
use Zend\ServiceManager\ServiceManager;
use Zend\View\HelperPluginManager;

class OcticonTest extends TestCase
{
    public function testInvoke()
    {
        $helper = new Octicon();

        $this->assertStringStartsWith('<svg ', $helper('mark-github'));
        $this->assertContains('width="16" height="16"', $helper('mark-github'));
        $this->assertContains('width="32" height="32"', $helper('mark-github', 2));
        $this->assertContains('width="32" height="32"', $helper('mark-github', ['ratio' => 2]));
        $this->assertContains('was not found ', $helper('not-found'));
    }

    public function testGetDatas()
    {
        $helper = new Octicon();

        $this->assertInternalType('array', $helper->getDatas());
        $this->assertInternalType('array', $helper->getDatas('mark-github'));
        $this->assertArrayHasKey('path', $helper->getDatas('mark-github'));
        $this->assertArrayHasKey('width', $helper->getDatas('mark-github'));
        $this->assertArrayHasKey('height', $helper->getDatas('mark-github'));
        $this->assertCount(0, $helper->getDatas('not-found'));
    }

    public function testHelperPluginManagerReturnsOcticonByClassNameHelper()
    {
        $helpers = $this->getHelperPluginManager();
        $octicon = $helpers->get(Octicon::class);
        $this->assertInstanceOf(Octicon::class, $octicon);
    }

    public function testHelperPluginManagerReturnsOcticonHelper()
    {
        $helpers = $this->getHelperPluginManager();
        $octicon = $helpers->get('octicon');
        $this->assertInstanceOf(Octicon::class, $octicon);

        $octicon = $helpers->get('Octicon');
        $this->assertInstanceOf(Octicon::class, $octicon);
    }

    protected function getHelperPluginManager(array $config = [])
    {
        $services = $this->prophesize(ServiceManager::class);
        $services->get('config')->willReturn($config);

        $module = new Module();
        return new HelperPluginManager($services->reveal(), $module->getConfig()['view_helpers']);
    }
}
