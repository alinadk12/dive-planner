<?php

declare(strict_types = 1);

namespace app\interfaces\errors;

/**
 * Интерфейс CollectionInterface.
 * Интерфейс объекта коллекции ошибок.
 */
interface CollectionInterface
{
    /**
     * Метод проверяет является ли коллекция пустой.
     *
     * @return bool
     */
    public function isEmpty(): bool;

    /**
     * Метод возвращает итератор для итерирования по коллекции ошибок.
     *
     * @return ListIteratorInterface
     */
    public function getIterator(): ListIteratorInterface;

    /**
     * Метод добавляет ошибку в коллекцию.
     *
     * @param ErrorInterface $message Новая ошибка.
     *
     * @return CollectionInterface
     */
    public function add(ErrorInterface $message): CollectionInterface;

    /**
     * Метод добавляет ошибки переданной колеккции в текущую коллекцию.
     *
     * @param CollectionInterface $errorCollection Коллекция для объединения.
     *
     * @return CollectionInterface
     */
    public function merge(CollectionInterface $errorCollection): CollectionInterface;

    /**
     * Метод очищает коллекцию ошибок.
     *
     * @return CollectionInterface
     */
    public function clear(): CollectionInterface;
}
