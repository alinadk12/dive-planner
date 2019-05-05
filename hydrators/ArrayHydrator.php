<?php

declare(strict_types = 1);

namespace app\hydrators;

use app\interfaces\abstracts\HydratorInterface;
use app\traits\ToArrayTrait;
use app\traits\ToObjectTrait;
use ReflectionException;

/**
 * Класс ArrayHydrator для работы через формат массива.
 */
class ArrayHydrator implements HydratorInterface
{
    use ToObjectTrait, ToArrayTrait;

    /**
     * Метод извлекает данные из переданного объекта.
     *
     * @param mixed $object Объект, из которого извлекаются данные.
     *
     * @return mixed
     *
     * @throws ReflectionException Генерирует, если класс отсутствует.
     */
    public function extract($object)
    {
        return $this->convertToArray($object);
    }

    /**
     * Метод наполняет переданный объект переданными данными.
     *
     * @param mixed $data   Данные для наполнения объекта.
     * @param mixed $object Объект для наполнения.
     *
     * @return mixed
     *
     * @throws ReflectionException Генерирует, если класс отсутствует.
     */
    public function hydrate($data, $object)
    {
        return $this->convertToObject($data, $object);
    }
}