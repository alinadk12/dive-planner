<?php

declare(strict_types = 1);

namespace app\interfaces\logbook;

use app\interfaces\logbook\dto\OperationListResultInterface;
use app\interfaces\logbook\dto\OperationResultInterface;
use app\interfaces\logbook\dto\LogbookInterface;
use app\interfaces\logbook\operations\MultiDeleteOperationInterface;
use app\interfaces\logbook\operations\MultiFindOperationInterface;
use app\interfaces\logbook\operations\SingleCreateOperationInterface;
use app\interfaces\logbook\operations\SingleFindOperationInterface;
use app\interfaces\logbook\operations\SingleUpdateOperationInterface;

/**
 * Интерфейс фабрики. Опеределяет методы порождения моделей пакета.
 */
interface FactoryInterface
{
    /**
     * Метод возвращает протитип модели DTO сущности "Логбук".
     *
     * @return LogbookInterface
     */
    public function getLogbookPrototype(): LogbookInterface;

    /**
     * Метод возвращает прототип объекта результата операции над списокм сущностей "Логбук".
     *
     * @return OperationListResultInterface
     */
    public function getLogbookListOperationResultPrototype(): OperationListResultInterface;

    /**
     * Метод возвращает прототип объекта результата операции над сущностью "Логбук".
     *
     * @return OperationResultInterface
     */
    public function getLogbookOperationResultPrototype(): OperationResultInterface;

    /**
     * Метод возвращает интерфейс операции для удаления нескольких сущностей "Логбук".
     *
     * @return MultiDeleteOperationInterface
     */
    public function getLogbookMultiDeleteOperation(): MultiDeleteOperationInterface;

    /**
     * Метод возвращает интерфейс операции для поиска нескольких сущностей "Логбук".
     *
     * @return MultiFindOperationInterface
     */
    public function getLogbookMultiFindOperation(): MultiFindOperationInterface;

    /**
     * Метод возвращает интерфейс операции для создания одной сущности "Логбук".
     *
     * @return SingleCreateOperationInterface
     */
    public function getLogbookSingleCreateOperation(): SingleCreateOperationInterface;

    /**
     * Метод возвращает интерфейс операции для поиска одной сущности "Логбук".
     *
     * @return SingleFindOperationInterface
     */
    public function getLogbookSingleFindOperation(): SingleFindOperationInterface;

    /**
     * Метод возвращает интерфейс для обновления одной сущности "Логбук".
     *
     * @return SingleUpdateOperationInterface
     */
    public function getLogbookSingleUpdateOperation(): SingleUpdateOperationInterface;
}
