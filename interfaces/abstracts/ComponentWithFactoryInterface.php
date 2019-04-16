<?php

declare(strict_types = 1);

namespace app\interfaces\abstracts;

use app\models\ModelsFactory;

/**
 * Интерфейс компонента, имеющего фабрику для порождения объектов.
 */
interface ComponentWithFactoryInterface
{
    const FACTORY_CONFIG_KEY = 'modelFactoryConfig';

    /**
     * Метод позволяет установить конфигурацию фабрики моделей.
     *
     * @param array $value Конфигурация фабрики моделей.
     *
     * @return static
     */
    public function setModelFactoryConfig(array $value);

    /**
     * Метод позволяет получить фабрику моделей.
     *
     * @return ModelsFactory
     */
    public function getModelFactory();

    /**
     * Метод позволяет установить фабрику моделей.
     *
     * @param ModelsFactory $modelsFactory Новое значение.
     *
     * @return static
     */
    public function setModelFactory(ModelsFactory $modelsFactory);
}
