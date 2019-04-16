<?php

declare(strict_types = 1);

namespace app\operations\logbook;

use app\interfaces\logbook\dto\OperationResultInterface;
use app\interfaces\logbook\operations\SingleFindOperationInterface;
use yii;
use yii\base\InvalidConfigException;

/**
 * Операция поиска сущностей "Логбук" на основе фильтра.
 */
class SingleFindOperation extends BaseFindOperation implements SingleFindOperationInterface
{
    /**
     * Прототип объекта-ответа "Категории" команды.
     *
     * @var OperationResultInterface|null
     */
    protected $resultPrototype;

    /**
     * Метод возвращает одну сущность по заданному фильтру.
     *
     * @throws InvalidConfigException Исключение генерируется в случае неверной инициализации команды.
     *
     * @return OperationResultInterface
     */
    public function doOperation(): OperationResultInterface
    {
        $result = $this->getResultPrototype()->copy();
        $query  = $this->buildQuery();
        $data   = $query->one($this->getDbConnection());
        if (! $data) {
            return $result;
        }
        $data = [$data];
        $list = $this->getLogbookList($data);
        $result->setLogbook(array_shift($list));
        return $result;
    }

    /**
     * Задает критерий фильтрации выборки по атрибуту "Идентификатор" сущности "Логбук".
     *
     * @param int    $id       Атрибут "Идентификатор" сущности "Логбук".
     * @param string $operator Оператор сравнения при поиске.
     *
     * @return SingleFindOperationInterface
     */
    public function byId(int $id, string $operator = '='): SingleFindOperationInterface
    {
        $this->getQuery()->byId($id, $operator);
        return $this;
    }

    /**
     * Задает критерий фильтрации выборки по атрибуту "Название" сущности "Логбук".
     *
     * @param string $name     Атрибут "Название" сущности "Логбук".
     * @param string $operator Оператор сравнения при поиске.
     *
     * @return SingleFindOperationInterface
     */
    public function byName(string $name, string $operator = '='): SingleFindOperationInterface
    {
        $this->getQuery()->byName($name, $operator);
        return $this;
    }

    /**
     * Метод устанавливает объект прототипа ответа команды "Категории".
     *
     * @param OperationResultInterface $value Новое значение.
     *
     * @return SingleFindOperationInterface
     */
    public function setResultPrototype(OperationResultInterface $value): SingleFindOperationInterface
    {
        $this->resultPrototype = $value;
        return $this;
    }

    /**
     * Метод возвращает объект-результат ответа команды "Логбук".
     *
     * @return OperationResultInterface
     *
     * @throws InvalidConfigException Исключение генерируется в случае неверной инициализации команды.
     */
    public function getResultPrototype(): OperationResultInterface
    {
        if (null === $this->resultPrototype) {
            throw new InvalidConfigException(__METHOD__ . '() Operation result object can not be null');
        }
        return $this->resultPrototype;
    }

    /**
     * Устанавливает сортировку результатов запроса по полю "id".
     *
     * @param string $sortType Тип сортировки - ASC или DESC.
     *
     * @return SingleFindOperationInterface
     */
    public function sortById(string $sortType = 'ASC'): SingleFindOperationInterface
    {
        $this->getQuery()->sortBy('id', $sortType);
        return $this;
    }

    /**
     * Устанавливает сортировку результатов запроса по полю "name".
     *
     * @param string $sortType Тип сортировки - ASC или DESC.
     *
     * @return SingleFindOperationInterface
     */
    public function sortByName(string $sortType = 'ASC'): SingleFindOperationInterface
    {
        $this->getQuery()->sortBy('name', $sortType);
        return $this;
    }
}