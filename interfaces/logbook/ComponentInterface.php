<?php

declare(strict_types = 1);

namespace app\interfaces\logbook;

use app\interfaces\logbook\dto\LogbookInterface;
use app\interfaces\logbook\operations\MultiDeleteOperationInterface;
use app\interfaces\logbook\operations\MultiFindOperationInterface;
use app\interfaces\logbook\operations\SingleCreateOperationInterface;
use app\interfaces\logbook\operations\SingleFindOperationInterface;
use app\interfaces\logbook\operations\SingleUpdateOperationInterface;

/**
 * Интерфейс компонента для работы с сущностями "Логбук".
 */
interface ComponentInterface
{
    /**
     * Метод возвращает интерфейс операцию создания одного экземпляра сущности "Логбук".
     *
     * @param LogbookInterface $item Сущность для создания.
     *
     * @return SingleCreateOperationInterface
     */
    public function createOne(LogbookInterface $item): SingleCreateOperationInterface;

    /**
     * Метод возвращает интерфейс операции удаления нескольких экземпляров сущности "Логбук".
     *
     * @return MultiDeleteOperationInterface
     */
    public function deleteMany(): MultiDeleteOperationInterface;

    /**
     * Метод возвращает интерефейс операции поиска нескольких экземпляра сущности "Логбук".
     *
     * @return MultiFindOperationInterface
     */
    public function findMany(): MultiFindOperationInterface;

    /**
     * Метод возвращает интерефейс операции поиска одного экземпляра сущности "Логбук".
     *
     * @return SingleFindOperationInterface
     */
    public function findOne(): SingleFindOperationInterface;

    /**
     * Метод возвращает интерефейс операции поиска одного экземпляра сущности "Логбук".
     *
     * @param LogbookInterface $item Сущность для редактирования.
     *
     * @return SingleUpdateOperationInterface
     */
    public function updateOne(LogbookInterface $item): SingleUpdateOperationInterface;

    /**
     * Метод возвращает прототип объекта DTO "Логбук".
     *
     * @return LogbookInterface
     */
    public function getLogbookPrototype(): LogbookInterface;
}
