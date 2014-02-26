<?php

/*
 * This file is part of the SnideScrutinizerBundle bundle.
 *
 * (c) Pascal DENIS <pascal.denis.75@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Snide\Bundle\ScrutinizerBundle\Tests\DependencyInjection;

use Snide\Bundle\ScrutinizerBundle\DependencyInjection\SnideScrutinizerExtension;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\Yaml\Parser;

/**
 * Class SnideScrutinizerExtensionTest
 *
 * @author Pascal DENIS <pascal.denis.75@gmail.com>
 */
class SnideScrutinizerExtensionTest extends \PHPUnit_Framework_TestCase
{
    /** @var ContainerBuilder */
    protected $configuration;

    /**
     * @expectedException \Symfony\Component\Config\Definition\Exception\InvalidConfigurationException
     */
    public function testLoadRepositorySlugThrowsExceptionUnless()
    {
        $loader = new SnideScrutinizerExtension();
        $config = $this->getConfig();
        unset($config['repository']['slug']);
        $loader->load(array($config), new ContainerBuilder());
    }

    /**
     * @expectedException \Symfony\Component\Config\Definition\Exception\InvalidConfigurationException
     */
    public function testLoadRepositoryTypeThrowsExceptionUnless()
    {
        $loader = new SnideScrutinizerExtension();
        $config = $this->getConfig();

        $config['repository']['type'] = 'svn';
        $loader->load(array($config), new ContainerBuilder());
    }

    /**
     * @expectedException \Symfony\Component\Config\Definition\Exception\InvalidConfigurationException
     */
    public function testLoadRepositoryThrowsExceptionUnlessSet()
    {
        $loader = new SnideScrutinizerExtension();
        $config = $this->getConfig();
        unset($config['repository']);
        $loader->load(array($config), new ContainerBuilder());
    }

    /**
     * Test load cache path
     */
    public function testLoadCachePath()
    {
        $this->loadConfiguration();
        $this->assertEquals($this->configuration->getParameter('snide_scrutinizer.cache_path'), '/tmp');
    }

    /**
     * Test load cache path
     */
    public function testLoadRepository()
    {
        $this->loadConfiguration();
        $repository = $this->configuration->get('snide_scrutinizer.repository');

        $this->assertEquals('pdenis/SnideScrutinizerBundle', $repository->getSlug());
        $this->assertEquals('g', $repository->getType());
    }

    /**
     * Load bundle configuration
     */
    protected function loadConfiguration()
    {
        $this->configuration = new ContainerBuilder();
        $loader = new SnideScrutinizerExtension();
        $config = $this->getConfig();
        $loader->load(array($config), $this->configuration);
    }
    /**
     * getConfig
     *
     * @return array
     */
    protected function getConfig()
    {
        $yaml = <<<EOF
repository:
    type: github
    slug: pdenis/SnideScrutinizerBundle
filesystem_cache_path: /tmp
EOF;
        $parser = new Parser();

        return $parser->parse($yaml);
    }
}