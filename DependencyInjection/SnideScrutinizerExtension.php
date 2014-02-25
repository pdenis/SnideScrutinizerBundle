<?php

namespace Snide\Bundle\ScrutinizerBundle\DependencyInjection;

use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;
use Symfony\Component\DependencyInjection\Loader\XmlFileLoader;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;

/**
 * Class SnideScrutinizerExtension
 *
 * @author Pascal DENIS <pascal.denis.75@gmail.com>
 */
class SnideScrutinizerExtension extends Extension
{
    /**
     * Load configuration of Bundle
     *
     * @param array $configs Configuration parameters
     * @param \Symfony\Component\DependencyInjection\ContainerBuilder $container
     * @throws \Exception
     */
    public function load(array $configs, ContainerBuilder $container)
    {
        $configuration = new Configuration();
        $config = $this->processConfiguration($configuration, $configs);

        $loader = new XmlFileLoader($container, new FileLocator(__DIR__ . '/../Resources/config'));
        $loader->load('collector.xml');
        $loader->load('twig_extension.xml');
        $loader->load('repository.xml');
        $loader->load('cache.xml');

        $this->loadRepository($loader, $container, $config);
        $this->loadCache($loader, $container, $config);
    }

    /**
     * Load repo
     *
     * @param XmlFileLoader $loader
     * @param ContainerBuilder $container
     * @param array $config
     * @throws \Exception
     */
    protected function loadRepository($loader, ContainerBuilder $container, array $config)
    {
        $container->setParameter('snide_scrutinizer.repository.slug', $config['repository']['slug']);
        $container->setParameter('snide_scrutinizer.repository.type', substr($config['repository']['type'], 0, 1));
    }

    /**
     * Load cache
     *
     * @param XmlFileLoader $loader
     * @param ContainerBuilder $container
     * @param array $config
     * @throws \Exception
     */
    protected function loadCache($loader, ContainerBuilder $container, array $config)
    {
        if(isset($config['snide_scrutinizer.filesystem_cache_path'])) {
            $container->setParameter('snide_scrutinizer.cache_path', $config['snide_scrutinizer.filesystem_cache_path']);
        }
    }
}
