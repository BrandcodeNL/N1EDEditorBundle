<?php

declare(strict_types=1);
/*
 * This file is part of the BrandcodeNL SonataMailchimpPublisherBundle.
 * (c) BrandcodeNL
 */

namespace BrandcodeNL\N1edEditorBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/*
 * This file is part of the BrandcodeNL n1edEditorBundle.
 * (c) BrandcodeNL
 */
class Configuration implements ConfigurationInterface
{
    /**
     * {@inheritdoc}
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('brandcode_nln1ed_editor');

        $rootNode
            ->children()
            ->scalarNode('api_key')
            ->isRequired()
            ->end()
            ->arrayNode('config')
            ->children()
            ->scalarNode('framework')->end()
            ->arrayNode('bootstrap4')
            ->children()
            ->BooleanNode('include')->end()
            ->BooleanNode('includeToGlobalDoc')->end()
            ->scalarNode('rootContains')->end()
            ->end()
            ->end()
            ->arrayNode('ui')
            ->children()
            ->BooleanNode('activateBootstrapEditorOnFullScreen')->end()
            ->BooleanNode('iframePopUp')->end()
            ->end()
            ->end()
            ->arrayNode('include')
            ->children()
            ->arrayNode('css')
            ->scalarPrototype()->end()
            ->end()
            ->BooleanNode('includeCssToGlobalDoc')->end()
            ->end()
            ->end()
            ->end()
            ->end()
            ->end()

            ->end()
        ;

        return $treeBuilder;
    }
}
