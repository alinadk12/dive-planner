<?php

declare(strict_types = 1);

namespace app\hydrators\logbook;

use app\interfaces\abstracts\HydratorInterface;
use app\interfaces\logbook\dto\LogbookInterface;

/**
 * Гидратор для работы с сущностью "Логбук" - преобразование в массив для записи в БД и обратно.
 */
class LogbookDatabaseHydrator implements HydratorInterface
{
    /**
     * Метод преобразует объект в обычный массив для записи в БД.
     *
     * @param LogbookInterface|null $item Объект для преобразования.
     *
     * @return array
     */
    public function extract($item): array
    {
        return [
            'userId'      => $item->getUserId(),
            'date'        => $item->getDate(),
            'location'    => $item->getLocation(),
            'depth'       => $item->getDepth(),
            'visibility'  => $item->getVisibility(),
            'tempAir'     => $item->getTempAir(),
            'tempSurface' => $item->getTempSurface(),
            'tempBottom'  => $item->getTempBottom(),
            'timeIn'      => $item->getTimeIn(),
            'timeOut'     => $item->getTimeOut(),
            'cylinder'    => $item->getCylinder(),
            'startBar'    => $item->getStartBar(),
            'endBar'      => $item->getEndBar(),
            'comment'     => $item->getComment(),
        ];
    }

    /**
     * Метод загружает данные в объект из массива БД.
     *
     * @param array|null            $data   Данные для загрузки в объект.
     * @param LogbookInterface|null $object Объект для загрузки данных.
     *
     * @return LogbookInterface
     */
    public function hydrate($data, $object): LogbookInterface
    {
        $object->setId((int)$data['id']);
        $object->setUserId((int)$data['userId']);
        $object->setDate((string)$data['date']);
        $object->setLocation((string)$data['location']);
        $object->setDepth((int)$data['depth']);
        $object->setVisibility((int)$data['visibility']);
        $object->setTempAir((int)$data['tempAir']);
        $object->setTempSurface((int)$data['tempSurface']);
        $object->setTempBottom((int)$data['tempBottom']);
        $object->setTimeIn(substr((string)$data['timeIn'], 0,5));
        $object->setTimeOut((string)$data['timeOut']);
        $object->setCylinder((int)$data['cylinder']);
        $object->setStartBar((int)$data['startBar']);
        $object->setEndBar((int)$data['endBar']);
        $object->setComment((string)$data['comment']);
        return $object;
    }
}
