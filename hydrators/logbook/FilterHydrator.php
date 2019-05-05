<?php

declare(strict_types = 1);

namespace app\hydrators\logbook;

use app\hydrators\ArrayHydrator;
use app\interfaces\logbook\filters\MultiFilterInterface;
use Exception;
use ReflectionException;
use yii\helpers\ArrayHelper;

/**
 * Гидратор для работы с с фильтром сущности "Логбук".
 */
class FilterHydrator extends ArrayHydrator
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
        if (! $object instanceof MultiFilterInterface) {
            throw new Exception('Object must implement ' . MultiFilterInterface::class);
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
     * @return MultiFilterInterface
     */
    public function hydrate($data, $object): MultiFilterInterface
    {
        if (! $object instanceof MultiFilterInterface) {
            throw new Exception('Object must implement ' . MultiFilterInterface::class);
        }

        if (isset($data['filter'])) {
            $data = ArrayHelper::merge($data, $data['filter']);
        }
        return parent::hydrate($data, $object);
    }
}