<?php

declare(strict_types=1);
/*
 * This file is part of the BrandcodeNL SonataMailchimpPublisherBundle.
 * (c) BrandcodeNL
 */

namespace BrandcodeNL\N1edEditorBundle\DependencyInjection;

use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Extension\Extension;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;

/*
 * This file is part of the BrandcodeNL n1edEditorBundle.
 * (c) BrandcodeNL
 */
class BrandcodeNLN1edEditorExtension extends Extension
{
    /**
     * {@inheritdoc}
     */
    public function load(array $configs, ContainerBuilder $container): void
    {
        $loader = new YamlFileLoader($container, new FileLocator(__DIR__.'/../Resources/config'));
        $loader->load('services.yaml');

        $configuration = new Configuration();

        $config = $this->processConfiguration($configuration, $configs);

        $config = $this->fixConfig($config);

        $definition = $container->getDefinition('brandcodenl.n1ed.form_type');
        $definition->replaceArgument(0, $config);

        $this->addFormTheme($container);
    }

    private function addFormTheme(ContainerBuilder $container): void
    {
        $resources = $container->hasParameter('twig.form.resources') ?
        $container->getParameter('twig.form.resources') : [];

        array_unshift($resources, '@BrandcodeNLN1edEditor/Form/n1ed.html.twig');
        $container->setParameter('twig.form.resources', $resources);
    }

    private function fixConfig(array $config): array
    {
        if (isset($config['config']['bootstrap4']) && 0 === \count($config['config']['bootstrap4']['breakpoints'])) {
            unset($config['config']['bootstrap4']['breakpoints']);
        }

        if (isset($config['config']['bootstrap3']) && 0 === \count($config['config']['bootstrap3']['breakpoints'])) {
            unset($config['config']['bootstrap3']['breakpoints']);
        }

        return $config;
    }
}
