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
                ->BooleanNode('includeEditor')
                    ->defaultFalse()
                ->end()                
                ->scalarNode('apiKey')
            ->end()
            ->arrayNode('config')
                ->children()
        
                    ->BooleanNode('enableN1ED')->end()
                    ->BooleanNode('enableBootstrapEditor')->end()
                    ->BooleanNode('enableFileUploader')->end()
                    ->BooleanNode('enableFlmngr')->end()
                    ->BooleanNode('enableImgPen')->end()
                    ->BooleanNode('enableTranslator')->end()

                    ->scalarNode('height')->end()

                    ->arrayNode('ui')
                        ->children()
                            ->scalarNode('mode')->end()
                            ->BooleanNode('leftSidebar')->end()
                            ->BooleanNode('showFullScreenButton')->end()
                            ->scalarNode('fullScreenButtonTitle')->end()
                            ->scalarNode('fullScreenExitButtonTitle')->end()
                            ->BooleanNode('showStructure')->end()
                            ->IntegerNode('minZIndex')->end()
                            ->BooleanNode('iframePopUp')->end()
                            ->BooleanNode('disableNotices')->end()
                            ->BooleanNode('activateBootstrapEditorOnFullScreen')->end()
                        ->end()
                    ->end()

                    ->scalarNode('dirUploads')->end()
                    ->scalarNode('urlFiles')->end()
                    ->scalarNode('urlFileManager')->end()

                    ->arrayNode('preview')
                        ->children()
                            ->IntegerNode('Mobile')->end()
                            ->IntegerNode('Note')->end()
                            ->IntegerNode('Table')->end()
                            ->IntegerNode('Desktop')->end()
                        ->end()
                    ->end()

                    ->scalarNode('framework')->end()
                        ->arrayNode('bootstrap4')
                            ->children()                    
                                ->BooleanNode('includeToGlobalDoc')->end()
                                ->IntegerNode('columnCount')->end()
                                ->scalarNode('classPrefix')->end()
                                    ->arrayNode('breakpoints')
                                        ->treatNullLike(null)
                                        ->arrayPrototype()
                                            ->children()
                                                ->scalarNode('name')->end()
                                                ->scalarNode('title')->end()
                                                ->IntegerNode('minWidth')->end()
                                            ->end()
                                        ->end()
                                    ->end()

                                ->BooleanNode('enabled')->end()
                                ->BooleanNode('include')->end()
                                ->scalarNode('url')->end()
                                ->scalarNode('urlJQuery')->end()
                                ->BooleanNode('includeJQuery')->end()
                                ->scalarNode('rootContains')->end()
                                ->BooleanNode('detectStructure')->end()
                                ->BooleanNode('fixStructure')->end()
                            ->end()
                        ->end()

                    ->arrayNode('bootstrap3')
                        ->children()
                            ->BooleanNode('includeToGlobalDoc')->end()
                            ->IntegerNode('columnCount')->end()
                            ->scalarNode('classPrefix')->end()
                                ->arrayNode('breakpoints')
                                    ->arrayPrototype()
                                        ->children()
                                            ->scalarNode('name')->end()
                                            ->scalarNode('title')->end()
                                            ->IntegerNode('minWidth')->end()
                                        ->end()
                                    ->end()
                                ->end()
                            ->BooleanNode('enabled')->end()
                            ->BooleanNode('include')->end()
                            ->scalarNode('url')->end()
                            ->scalarNode('urlJQuery')->end()
                            ->BooleanNode('includeJQuery')->end()
                            ->scalarNode('rootContains')->end()
                            ->BooleanNode('detectStructure')->end()
                            ->BooleanNode('fixStructure')->end() 
                        ->end()                                    
                    ->end()
            
                    ->arrayNode('include')
                        ->children()
                            ->arrayNode('css')
                                ->scalarPrototype()->end()
                            ->end()
                            ->arrayNode('js')
                                ->scalarPrototype()->end()
                            ->end()
                            ->BooleanNode('includeCssToGlobalDoc')->end()
                            ->BooleanNode('includeJsToGlobalDoc')->end()
                        ->end()
                    ->end()
                ->end()
            ->end()
        ;

        return $treeBuilder;
    }
}
