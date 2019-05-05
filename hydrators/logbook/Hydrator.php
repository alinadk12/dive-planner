<?php

declare(strict_types = 1);

namespace app\hydrators\logbook;

use app\hydrators\ArrayHydrator;
use app\interfaces\logbook\dto\LogbookInterface;
use Exception;
use ReflectionException;

/**
 * Гидратор для работы с сущностью "Логбук".
 */
class Hydrator extends ArrayHydrator
{
    /**
     * Метод преобразует объект в обычный массив.
     *
     * @param mixed $object Объект для преобразования.
     *
     * @throws Exception Если распаковывается объект, не имплементирующий нужный интерфейс.
     * @throws ReflectionException      Если преобразуемый класс отсутствует.
     *
     * @inherit
     *
     * @return array
     */
    public function extract($object): array
    {
        if (! $object instanceof LogbookInterface) {
            throw new Exception('Object must implement ' . LogbookInterface::class);
        }
        return parent::extract($object);
    }

    /**
     * Метод загружает данные в объект из массива.
     *
     * @param mixed $data   Данные для загрузки в объект.
     * @param mixed $object Объект для загрузки данных.
     *
     * @throws Exception Если распаковывается объект, не имплементирующий нужный интерфейс.
     * @throws ReflectionException      Если преобразуемый класс отсутствует.
     *
     * @inherit
     *
     * @return LogbookInterface
     */
    public function hydrate($data, $object): LogbookInterface
    {
        if (! $object instanceof LogbookInterface) {
            throw new Exception('Object must implement ' . LogbookInterface::class);
        }
        return parent::hydrate($data, $object);
    }
}