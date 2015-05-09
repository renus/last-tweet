<?php

namespace Renus\LastTweetBundle\DependencyInjection;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;
use Symfony\Component\DependencyInjection\Loader;

/**
 * This is the class that loads and manages your bundle configuration
 *
 * To learn more see {@link http://symfony.com/doc/current/cookbook/bundles/extension.html}
 */
class RenusLastTweetExtension extends Extension
{
    /**
     * {@inheritdoc}
     */
    public function load(array $configs, ContainerBuilder $container)
    {
        $configuration = new Configuration();
        $config = $this->processConfiguration($configuration, $configs);

        $loader = new Loader\YamlFileLoader($container, new FileLocator(__DIR__.'/../Resources/config'));
        $loader->load('services.yml');

        $container->setParameter('consumer_key', $config['twitter']['consumer_key']);
        $container->setParameter('consumer_secret', $config['twitter']['consumer_secret']);
        $container->setParameter('token', $config['twitter']['token']);
        $container->setParameter('token_secret', $config['twitter']['token_secret']);
        $container->setParameter('tweet_template',
            isset($config['template']['path']) ?
                $config['template']['path'] :  ''
        );
    }
}
