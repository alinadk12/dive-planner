<?php

declare(strict_types = 1);

namespace app\interfaces\abstracts;

/**
 * Интерфейс для класса, реализующего паттерн "прототип".
 */
interface PrototypeInterface
{
    /**
     * Метод копирует текущий объект.
     *
     * @return static
     */
    public function copy();
}
