<?php

declare(strict_types = 1);

namespace app\interfaces\errors;

use Iterator;

/**
 * Интерфейс ListIteratorInterface.
 * Интерфейс итератора по коллекции ошибок.
 */
interface ListIteratorInterface extends Iterator
{
    /**
     * Метод возвращает текущий элемент коллекции.
     *
     * @return ErrorInterface
     */
    public function current(): ErrorInterface;
}
