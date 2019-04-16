<?php

declare(strict_types = 1);

namespace app\components\logbook;

use app\interfaces\logbook\dto\LogbookInterface;
use app\interfaces\logbook\FactoryInterface;
use app\interfaces\logbook\operations\MultiDeleteOperationInterface;
use app\interfaces\logbook\operations\MultiFindOperationInterface;
use app\interfaces\logbook\operations\SingleCreateOperationInterface;
use app\interfaces\logbook\operations\SingleFindOperationInterface;
use app\interfaces\logbook\operations\SingleUpdateOperationInterface;
use app\traits\ModelsFactoryTrait;
use app\interfaces\logbook\ComponentInterface;
use app\interfaces\abstracts\ComponentWithFactoryInterface;
use yii\base\Component;
use yii\base\InvalidConfigException;

/**
 * Компонент сущности "Логбук".
 */
class LogbookComponent extends Component implements ComponentInterface, ComponentWithFactoryInterface
{
    use ModelsFactoryTrait {
        ModelsFactoryTrait::getModelFactory as getModelFactoryFromTrait;
    }

    /**
     * Метод возвращает фабрику моделей пакета "Логбук".
     *
     * @throws InvalidConfigException Генерируется если фабрика не имплементирует нужный интерфейс.
     *
     * @return FactoryInterface
     */
    public function getModelFactory(): FactoryInterface
    {
        $modelFactory = $this->getModelFactoryFromTrait();
        if (! $modelFactory instanceof FactoryInterface) {
            throw new InvalidConfigException('Class ' . get_class($modelFactory) . ' must implement interface ' . FactoryInterface::class);
        }
        return $modelFactory;
    }

    /**
     * Метод возвращает операцию создания одного экземпляра сущности "Логбук".
     *
     * @param LogbookInterface $item Сущность для создания.
     *
     * @throws InvalidConfigException Генерируется если фабрика не имплементирует нужный интерфейс.
     *
     * @return SingleCreateOperationInterface
     */
    public function createOne(LogbookInterface $item): SingleCreateOperationInterface
    {
        return $this->getModelFactory()->getLogbookSingleCreateOperation()->setLogbook($item);
    }

    /**
     * Метод возвращает операцию удаления нескольких экземпляров сущности "Логбук".
     *
     * @throws InvalidConfigException Генерируется если фабрика не имплементирует нужный интерфейс.
     *
     * @return MultiDeleteOperationInterface
     */
    public function deleteMany(): MultiDeleteOperationInterface
    {
        return $this->getModelFactory()->getLogbookMultiDeleteOperation();
    }

    /**
     * Метод возвращает операцию поиска нескольких экземпляров сущности "Логбук".
     *
     * @throws InvalidConfigException Генерируется если фабрика не имплементирует нужный интерфейс.
     *
     * @return MultiFindOperationInterface
     */
    public function findMany(): MultiFindOperationInterface
    {
        return $this->getModelFactory()->getLogbookMultiFindOperation();
    }

    /**
     * Метод возвращает операцию поиска одного экземпляра сущности "Логбук".
     *
     * @throws InvalidConfigException Генерируется если фабрика не имплементирует нужный интерфейс.
     *
     * @return SingleFindOperationInterface
     */
    public function findOne(): SingleFindOperationInterface
    {
        return $this->getModelFactory()->getLogbookSingleFindOperation();
    }

    /**
     * Метод возвращает интерефейс операции обновления одного экземпляра сущности "Логбук".
     *
     * @param LogbookInterface $item Сущность для обновления.
     *
     * @throws InvalidConfigException Генерируется если фабрика не имплементирует нужный интерфейс.
     *
     * @return SingleUpdateOperationInterface
     */
    public function updateOne(LogbookInterface $item): SingleUpdateOperationInterface
    {
        return $this->getModelFactory()->getLogbookSingleUpdateOperation()->setLogbook($item);
    }

    /**
     * Метод возвращает прототип объекта DTO "Логбук".
     *
     * @throws InvalidConfigException Генерируется если фабрика не имплементирует нужный интерфейс.
     *
     * @return LogbookInterface
     */
    public function getLogbookPrototype(): LogbookInterface
    {
        return $this->getModelFactory()->getLogbookPrototype();
    }
}
