<?php

declare(strict_types = 1);

namespace app\interfaces\logbook\operations;

use app\interfaces\abstracts\HydratorInterface;
use app\interfaces\logbook\dto\OperationResultInterface;
use app\interfaces\logbook\dto\LogbookInterface;
use app\interfaces\abstracts\DTOValidatorInterface;

/**
 * Интерфейс операции, реализующей логику создания сущностей "Логбук".
 */
interface SingleCreateOperationInterface
{
    /**
     * Метод выполняет операцию.
     *
     * @return OperationResultInterface
     */
    public function doOperation(): OperationResultInterface;

    /**
     * Метод возвращает сущности, над которыми нужно выполнить операцию.
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
     * Метод устанавливает сущности, над которыми необходимо выполнить операцию.
     *
     * @param LogbookInterface $item Новое значение.
     *
     * @return SingleCreateOperationInterface
     */
    public function setLogbook(LogbookInterface $item): SingleCreateOperationInterface;

    /**
     * Метод задает значение гидратора сущности "Логбук" в массив для записи в БД и обратно.
     *
     * @param HydratorInterface $hydrator Объект класса преобразователя.
     *
     * @return mixed
     */
    public function setLogbookDatabaseHydrator(HydratorInterface $hydrator);

    /**
     * Метод устанавливает валидатор ДТО сущности.
     *
     * @param DTOValidatorInterface $validator Новое значение.
     *
     * @return SingleCreateOperationInterface
     */
    public function setLogbookValidator(DTOValidatorInterface $validator): SingleCreateOperationInterface;

    /**
     * Метод устанавливает объект прототипа ответа команды.
     *
     * @param OperationResultInterface $value Новое значение.
     *
     * @return SingleCreateOperationInterface
     */
    public function setResultPrototype(OperationResultInterface $value): SingleCreateOperationInterface;
}