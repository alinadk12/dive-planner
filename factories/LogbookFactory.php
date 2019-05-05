<?php

declare(strict_types = 1);

namespace app\factories;

use app\interfaces\abstracts\DTOValidatorInterface;
use app\interfaces\abstracts\HydratorInterface;
use app\interfaces\logbook\dto\OperationListResultInterface;
use app\interfaces\logbook\dto\OperationResultInterface;
use app\interfaces\logbook\dto\LogbookInterface;
use app\interfaces\logbook\operations\MultiDeleteOperationInterface;
use app\interfaces\logbook\operations\MultiFindOperationInterface;
use app\interfaces\logbook\operations\SingleCreateOperationInterface;
use app\interfaces\logbook\operations\SingleFindOperationInterface;
use app\interfaces\logbook\operations\SingleUpdateOperationInterface;
use app\interfaces\logbook\QueryInterface;
use app\models\ModelsFactory;
use app\interfaces\logbook\FactoryInterface;
use yii\base\InvalidConfigException;

/**
 * Фабрика. Реализует породждение моделей пакета для работы с сущностью "Логбук".
 */
class LogbookFactory extends ModelsFactory implements FactoryInterface
{
    public const LOGBOOK_PROTOTYPE                       = 'logbookPrototype';
    public const LOGBOOK_VALIDATOR                       = 'logbookValidator';
    public const LOGBOOK_OPERATION_RESULT_PROTOTYPE      = 'logbookOperationResultPrototype';
    public const LOGBOOK_LIST_OPERATION_RESULT_PROTOTYPE = 'logbookListOperationResultPrototype';
    public const LOGBOOK_QUERY                           = 'logbookQuery';
    public const LOGBOOK_DATABASE_HYDRATOR               = 'logbookDatabaseHydrator';
    public const LOGBOOK_SINGLE_CREATE_OPERATION         = 'logbookSingleCreateOperation';
    public const LOGBOOK_SINGLE_UPDATE_OPERATION         = 'logbookSingleUpdateOperation';
    public const LOGBOOK_SINGLE_FIND_OPERATION           = 'logbookSingleFindOperation';
    public const LOGBOOK_MULTI_FIND_OPERATION            = 'logbookMultiFindOperation';
    public const LOGBOOK_MULTI_DELETE_OPERATION          = 'logbookMultiDeleteOperation';

    /**
     * Метод возвращает операцию для удаления нескольких сущности "Логбук".
     *
     * @throws InvalidConfigException Исключение генерируется в случае проблем при создании объекта-модели.
     *
     * @return MultiDeleteOperationInterface
     */
    public function getLogbookMultiDeleteOperation(): MultiDeleteOperationInterface
    {
        return $this->getModelInstance(self::LOGBOOK_MULTI_DELETE_OPERATION, [], false)
                    ->setResultPrototype($this->getLogbookOperationResultPrototype());
    }

    /**
     * Метод возвращает операцию для поиска нескольких сущностей "Логбук".
     *
     * @throws InvalidConfigException Исключение генерируется в случае проблем при создании объекта-модели.
     *
     * @return MultiFindOperationInterface
     */
    public function getLogbookMultiFindOperation(): MultiFindOperationInterface
    {
        return $this->getModelInstance(self::LOGBOOK_MULTI_FIND_OPERATION, [], false)
                    ->setResultPrototype($this->getLogbookListOperationResultPrototype())
                    ->setQuery($this->getLogbookQuery())
                    ->setLogbookPrototype($this->getLogbookPrototype())
                    ->setLogbookDatabaseHydrator($this->getLogbookDatabaseHydrator());
    }

    /**
     * Метод возвращает операцию для создания одной сущности "Логбук".
     *
     * @throws InvalidConfigException Исключение генерируется в случае проблем при создании объекта-модели.
     *
     * @return SingleCreateOperationInterface
     */
    public function getLogbookSingleCreateOperation(): SingleCreateOperationInterface
    {
        return $this->getModelInstance(self::LOGBOOK_SINGLE_CREATE_OPERATION, [], false)
                    ->setResultPrototype($this->getLogbookOperationResultPrototype())
                    ->setLogbookValidator($this->getLogbookValidator())
                    ->setLogbookDatabaseHydrator($this->getLogbookDatabaseHydrator());
    }

    /**
     * Метод возвращает операцию для поиска одной сущности "Логбук".
     *
     * @throws InvalidConfigException Исключение генерируется в случае проблем при создании объекта-модели.
     *
     * @return SingleFindOperationInterface
     */
    public function getLogbookSingleFindOperation(): SingleFindOperationInterface
    {
        return $this->getModelInstance(self::LOGBOOK_SINGLE_CREATE_OPERATION, [], false)
                    ->setResultPrototype($this->getLogbookOperationResultPrototype())
                    ->setQuery($this->getLogbookQuery())
                    ->setLogbookPrototype($this->getLogbookPrototype())
                    ->setLogbookDatabaseHydrator($this->getLogbookDatabaseHydrator());
    }

    /**
     * Метод возвращает операцию для обновления одной сущности "Логбук".
     *
     * @throws InvalidConfigException Исключение генерируется в случае проблем при создании объекта-модели.
     *
     * @return SingleUpdateOperationInterface
     */
    public function getLogbookSingleUpdateOperation(): SingleUpdateOperationInterface
    {
        return $this->getModelInstance(self::LOGBOOK_SINGLE_UPDATE_OPERATION, [], false)
                    ->setResultPrototype($this->getLogbookOperationResultPrototype())
                    ->setLogbookValidator($this->getLogbookValidator())
                    ->setLogbookDatabaseHydrator($this->getLogbookDatabaseHydrator());
    }

    /**
     * Метод возвращает прототип объекта результата операции над сущностью "Логбук".
     *
     * @throws InvalidConfigException Исключение генерируется в случае проблем при создании объекта-модели.
     *
     * @return OperationResultInterface
     */
    public function getLogbookOperationResultPrototype(): OperationResultInterface
    {
        return $this->getModelInstance(self::LOGBOOK_OPERATION_RESULT_PROTOTYPE, [], false);
    }

    /**
     * Метод возвращает прототип объекта результата операции над списокм сущностей "Логбук".
     *
     * @throws InvalidConfigException Исключение генерируется в случае проблем при создании объекта-модели.
     *
     * @return OperationListResultInterface
     */
    public function getLogbookListOperationResultPrototype(): OperationListResultInterface
    {
        return $this->getModelInstance(self::LOGBOOK_LIST_OPERATION_RESULT_PROTOTYPE, [], false);
    }

    /**
     * Метод возвращает модель построителя запросов для выборки данных.
     *
     * @throws InvalidConfigException Исключение генерируется в случае проблем при создании объекта-модели.
     *
     * @return QueryInterface
     */
    protected function getLogbookQuery(): QueryInterface
    {
        return $this->getModelInstance(self::LOGBOOK_QUERY, [], false);
    }

    /**
     * Метод возвращает модель гидратора для работы с БД.
     *
     * @throws InvalidConfigException Исключение генерируется в случае проблем при создании объекта-модели.
     *
     * @return HydratorInterface
     */
    protected function getLogbookDatabaseHydrator(): HydratorInterface
    {
        return $this->getModelInstance(self::LOGBOOK_DATABASE_HYDRATOR, [], false);
    }

    /**
     * Метод возвращает прототип объекта валидатора сущности "Логбук".
     *
     * @throws InvalidConfigException Исключение генерируется в случае проблем при создании объекта-модели.
     *
     * @return DTOValidatorInterface
     */
    public function getLogbookValidator(): DTOValidatorInterface
    {
        return $this->getModelInstance(self::LOGBOOK_VALIDATOR, [], false);
    }

    /**
     * Метод возвращает протитип модели DTO сущности "Логбук".
     *
     * @throws InvalidConfigException Исключение генерируется в случае проблем при создании объекта-модели.
     *
     * @return LogbookInterface
     */
    public function getLogbookPrototype(): LogbookInterface
    {
        return $this->getModelInstance(self::LOGBOOK_PROTOTYPE, [], false);
    }
}
