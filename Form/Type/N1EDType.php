<?php

declare(strict_types=1);

namespace BrandcodeNL\N1edEditorBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\Form\FormView;
use Symfony\Component\OptionsResolver\OptionsResolver;

class N1EDType extends AbstractType
{
    private $config;

    public function __construct(array $config)
    {
        $this->config = $config;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'config' => $this->config['config'],
            'includeEditor' => $this->config['includeEditor'],
            'apiKey' => $this->config['apiKey'],
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function buildView(FormView $view, FormInterface $form, array $options): void
    {
        $view->vars['config'] = json_encode($options['config']);
        $view->vars['includeEditor'] = $options['includeEditor'];
        $view->vars['apiKey'] = $options['apiKey'];
    }

    public function getParent()
    {
        return TextareaType::class;
    }
}
