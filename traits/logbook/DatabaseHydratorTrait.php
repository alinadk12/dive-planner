<?php

declare(strict_types = 1);

namespace app\traits\logbook;

use app\interfaces\abstracts\HydratorInterface;
use app\hydrators\LogbookDatabaseHydrator;
use yii\base\InvalidConfigException;

/**
 * Трейт, содержащий логику доступа к гидратору сущности "Секции" в массив для записи в БД и обратно.
 */
trait DatabaseHydratorTrait
{
    /**
     * Экземпляр объекта гидратора для работы с БД сущности "Секции".
     *
     * @var LogbookDatabaseHydrator|null
     */
    protected $logbookDatabaseHydrator;

    /**
     * Метод возвращает объект гидратора сущности "Секции" в массив для записи в БД и обратно.
     *
     * @throws InvalidConfigException Если компонент не зарегистрирован.
     *
     * @return HydratorInterface
     */
    protected function getLogbookDatabaseHydrator(): HydratorInterface
    {
        if (null === $this->logbookDatabaseHydrator) {
            throw new InvalidConfigException('Hydrator object can not be null');
        }
        return $this->logbookDatabaseHydrator;
    }

    /**
     * Метод задает значение гидратора сущности "Секции" в массив для записи в БД и обратно.
     *
     * @param HydratorInterface $hydrator Объект класса преобразователя.
     *
     * @return static
     */
    public function setLogbookDatabaseHydrator(HydratorInterface $hydrator)
    {
        $this->logbookDatabaseHydrator = $hydrator;
        return $this;
    }
}
