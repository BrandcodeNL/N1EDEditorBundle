<?php

declare(strict_types=1);

namespace BrandcodeNL\N1edEditorBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
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
            'config' => $this->config,
        ]);
    }

    public function getParent()
    {
        return TextareaType::class;
    }
}
