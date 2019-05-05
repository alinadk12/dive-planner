<?php

declare(strict_types = 1);

namespace app\traits;

use ReflectionClass;
use ReflectionException;
use function get_class;
use function is_object;

/**
 * Трэит ToObjectTrait реализует метод преобразования массива в объект.
 */
trait ToObjectTrait
{
    /**
     * Метод наполняет переданный объект переданными данными.
     *
     * @param mixed $data   Данные для наполнения объекта.
     * @param mixed $object Объект для наполнения.
     *
     * @return mixed
     *
     * @throws ReflectionException Генерирвет если такого класса не существует.
     */
    protected function convertToObject($data, $object)
    {
        $reflectionClass = new ReflectionClass(get_class($object));
        foreach ($reflectionClass->getProperties() as $property) {
            if (! array_key_exists($property->getName(), $data)) {
                continue;
            }
            $changeAccessible = false;
            if ($property->isPrivate() || $property->isProtected()) {
                $changeAccessible = true;
                $property->setAccessible(true);
            }

            $value = $property->getValue($object);
            if (is_object($value)) {
                $value = $this->convertToObject($data[$property->getName()], $value);
                $property->setValue($object, $value);
            } else {
                $property->setValue($object, $data[$property->getName()]);
            }

            if ($changeAccessible) {
                $property->setAccessible(false);
            }
        }
        return $object;
    }
}