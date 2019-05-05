<?php

declare(strict_types = 1);

namespace app\interfaces\logbook\operations;

use app\interfaces\abstracts\DTOValidatorInterface;
use app\interfaces\abstracts\HydratorInterface;
use app\interfaces\logbook\dto\OperationResultInterface;
use app\interfaces\logbook\dto\LogbookInterface;

/**
 * Интерфейс операции, реализующей логику обновления данных сущности "Логбук".
 */
interface SingleUpdateOperationInterface
{
    /**
     * Метод выполняет операцию.
     *
     * @return OperationResultInterface
     */
    public function doOperation(): OperationResultInterface;

    /**
     * Метод возвращает сущность, над которой нужэно выполнить операцию.
     *
     * @return LogbookInterface
     */
    public function getLogbook(): LogbookInterface;

    /**
     * Метод возвращает валидатор ДТО сущности.
     *
     * @return DTOValidatorInterface
     */
    public function getLogbookValidator(): DTOValidatorInterface;

    /**
     * Метод возвращает объект-результат ответа команды.
     *
     * @return OperationResultInterface
     */
    public function getResultPrototype(): OperationResultInterface;

    /**
     * Метод устанавливает сущность, над которой необходимо выполнить операцию.
     *
     * @param LogbookInterface $value Новое значение.
     *
     * @return SingleUpdateOperationInterface
     */
    public function setLogbook(LogbookInterface $value):SingleUpdateOperationInterface;

    /**
     * Метод задает значение гидратора сущности "Логбук" в массив для записи в БД и обратно.
     *
     * @param HydratorInterface $hydrator Объект класса преобразователя.
     *
     * @return static
     */
    public function setLogbookDatabaseHydrator(HydratorInterface $hydrator);

    /**
     * Метод устанавливает валидатор ДТО сущности.
     *
     * @param DTOValidatorInterface $validator Новое значение.
     *
     * @return SingleUpdateOperationInterface
     */
    public function setLogbookValidator(DTOValidatorInterface $validator): SingleUpdateOperationInterface;

    /**
     * Метод устанавливает объект прототипа ответа команды.
     *
     * @param OperationResultInterface $value Новое значение.
     *
     * @return SingleUpdateOperationInterface
     */
    public function setResultPrototype(OperationResultInterface $value): SingleUpdateOperationInterface;
}