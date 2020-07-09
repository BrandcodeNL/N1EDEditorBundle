<?php
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
        $rootNode = $treeBuilder->root('brandcode_nl_n1ed_editor');
            
        
        $rootNode
            ->children()                
                ->scalarNode('api_key')
                    ->isRequired()
                ->end()                
            ->end();

        return $treeBuilder;
    }
}