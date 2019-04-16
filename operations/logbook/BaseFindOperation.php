<?php

declare(strict_types = 1);

namespace app\operations\logbook;

use app\interfaces\logbook\dto\LogbookInterface;
use app\interfaces\logbook\operations\BaseFindOperationInterface;
use app\interfaces\logbook\QueryInterface;
use app\traits\WithDbConnectionTrait;
use app\traits\logbook\DatabaseHydratorTrait;
use yii\base\InvalidConfigException;
use yii\base\Model;

/**
 * Операция поиска сущностей "Секции".
 */
class BaseFindOperation extends Model implements BaseFindOperationInterface
{
    use WithDbConnectionTrait;
    use DatabaseHydratorTrait;

    /**
     * Прототип объекта сущности.
     *
     * @var LogbookInterface|null
     */
    protected $logbookPrototype;

    /**
     * Объект запрос к базе данных.
     *
     * @var QueryInterface|null
     */
    protected $query;

    /**
     * Метод строит запрос дял получения сущностей, добавляя в него необходимые параметры.
     *
     * @throws InvalidConfigException Исключение генерируется в случае неверной инициализации команды.
     *
     * @return QueryInterface
     */
    protected function buildQuery(): QueryInterface
    {
        return $this->getQuery();
    }

    /**
     * Метод создает из полученных из базы данных объекты сущностей.
     *
     * @param array $data Данные из базы данных.
     *
     * @throws InvalidConfigException Исключение генерируется в случае неверной инициализации команды.
     *
     * @return LogbookInterface[]
     */
    protected function getLogbookList(array $data): array
    {
        $result    = [];
        $prototype = $this->getLogbookPrototype();
        foreach ($data as $item) {
            $object   = $prototype->copy();
            $hydrator = $this->getLogbookDatabaseHydrator();
            $object   = $hydrator->hydrate($item, $object);

            $result[$object->getId()] = $object;
        }
        return $result;
    }

    /**
     * Метод возвращает сущность, над которой нужно выполнить операцию.
     *
     * @throws InvalidConfigException Исключение генерируется в случае неверной инициализации команды.
     *
     * @return LogbookInterface
     */
    public function getLogbookPrototype(): LogbookInterface
    {
        if (null === $this->logbookPrototype) {
            throw new InvalidConfigException(__METHOD__ . '() LogbookPrototype prototype can not be empty');
        }
        return $this->logbookPrototype;
    }

    /**
     * Метод возвращает объект запрос к базе данных.
     *
     * @throws InvalidConfigException Исключение генерируется в случае неверной инициализации команды.
     *
     * @return QueryInterface
     */
    protected function getQuery(): QueryInterface
    {
        if (null === $this->query) {
            throw new InvalidConfigException(__METHOD__ . '() Query can not be empty');
        }
        return $this->query;
    }

    /**
     * Метод устанавливает сущность, над которой необходимо выполнить операцию.
     *
     * @param LogbookInterface $value Новое значение.
     *
     * @return BaseFindOperationInterface
     */
    public function setLogbookPrototype(LogbookInterface $value): BaseFindOperationInterface
    {
        $this->logbookPrototype = $value;
        return $this;
    }

    /**
     * Метод устанавливает объект запрос к базе данных.
     *
     * @param QueryInterface $query Новое значение.
     *
     * @return BaseFindOperationInterface
     */
    public function setQuery(QueryInterface $query): BaseFindOperationInterface
    {
        $this->query = $query;
        return $this;
    }
}
