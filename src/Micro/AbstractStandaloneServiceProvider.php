<?php

namespace Prokl\ServiceProvider\Micro;

use Exception;
use Prokl\ServiceProvider\Framework\SymfonyCompilerPassBagLight;
use Prokl\ServiceProvider\ServiceProvider;
use Symfony\Component\Config\Loader\DelegatingLoader;
use Symfony\Component\DependencyInjection\ContainerBuilder;

/**
 * Class AbstractStandaloneServiceProvider
 * @package Prokl\ServiceProvider\Micro
 *
 * @since 04.03.2021
 * @since 20.03.2021 Набор стандартных пассов стал protected переменной.
 */
class AbstractStandaloneServiceProvider extends ServiceProvider
{
    /**
     * @var ContainerBuilder $containerBuilder Контейнер.
     */
    protected static $containerBuilder;

    /**
     * @var array $standartCompilerPasses Пассы Symfony.
     */
    protected $standartCompilerPasses;

    /**
     * @inheritDoc
     */
    public function __construct(
        string $filename,
        ?string $pathBundlesConfig = null
    ) {
        $this->symfonyCompilerClass = SymfonyCompilerPassBagLight::class;

        parent::__construct($filename, $pathBundlesConfig);
    }

    /**
     * {@inheritDoc}
     * @internal Для отдельных контейнеров не нужно грузить сервисы из битриксового сервис-локатора.
     */
    protected function loadBitrixServiceLocatorConfigs(DelegatingLoader $loader) : void
    {
    }
}
