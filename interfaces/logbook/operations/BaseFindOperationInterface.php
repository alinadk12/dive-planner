<?php

declare(strict_types = 1);

namespace app\interfaces\logbook\operations;

use app\interfaces\abstracts\HydratorInterface;
use app\interfaces\logbook\dto\LogbookInterface;
use app\interfaces\logbook\QueryInterface;

/**
 * Интерфейс операции, реализующей логику поиска сущности.
 */
interface BaseFindOperationInterface
{
    /**
     * Метод возвращает сущность, над которой нужно выполнить операцию.
     *
     * @return LogbookInterface
     */
    public function getLogbookPrototype(): LogbookInterface;

    /**
     * Метод задает обработчик на событие.
     *
     * @param string        $name    Название события.
     * @param callable|null $handler Обработчик события.
     * @param mixed|null    $data    Данные которые будет использовать при триггере.
     * @param bool|true     $append  Флаг добавления или замены обработчика.
     *
     * @inherit
     *
     * @return void
     */
    public function on($name, $handler, $data = null, $append = true);

    /**
     * Метод задает значение гидратора сущности "Категории" в массив для записи в БД и обратно.
     *
     * @param HydratorInterface $hydrator Объект класса преобразователя.
     *
     * @return static
     */
    public function setLogbookDatabaseHydrator(HydratorInterface $hydrator);

    /**
     * Метод устанавливает сущность, над которой необходимо выполнить операцию.
     *
     * @param LogbookInterface $value Новое значение.
     *
     * @return BaseFindOperationInterface
     */
    public function setLogbookPrototype(LogbookInterface $value): BaseFindOperationInterface;

    /**
     * Метод устанавливает объект запрос к базе данных.
     *
     * @param QueryInterface $query Новое значение объекта запроса.
     *
     * @return BaseFindOperationInterface
     */
    public function setQuery(QueryInterface $query): BaseFindOperationInterface;
}
