<?php

declare(strict_types = 1);

namespace app\operations\logbook;

use app\interfaces\logbook\dto\OperationListResultInterface;
use app\interfaces\logbook\operations\MultiFindOperationInterface;
use Exception;
use yii;
use yii\base\InvalidConfigException;

/**
 * Операция поиска сущностей "Логбук" на основе фильтра.
 */
class MultiFindOperation extends BaseFindOperation implements MultiFindOperationInterface
{
    /**
     * Прототип объекта-ответа "Категории" команды.
     *
     * @var OperationListResultInterface|null
     */
    protected $resultPrototype;

    /**
     * Метод возвращает все сущности по заданному фильтру в виде массива.
     *
     * @throws InvalidConfigException Исключение генерируется в случае неверной инициализации команды.
     *
     * @return array
     */
    public function allAsArray(): array
    {
        $query = $this->buildQuery();
        $data  = $query->all($this->getDbConnection());

        return $data;
    }

    /**
     * Метод возвращает все сущности по заданному фильтру.
     *
     * @throws InvalidConfigException Исключение генерируется в случае неверной инициализации команды.
     *
     * @return OperationListResultInterface
     */
    public function doOperation(): OperationListResultInterface
    {
        $data   = $this->allAsArray();
        $result = $this->getResultPrototype()->copy();
        $result->setLogbookList($this->getLogbookList($data));

        return $result;
    }

    /**
     * Задает критерий фильтрации выборки по атрибуту "Идентификатор" сущности "Логбук".
     *
     * @param int    $id       Атрибут "Идентификатор" сущности "Логбук".
     * @param string $operator Оператор сравнения при поиске.
     *
     * @return MultiFindOperationInterface
     */
    public function byId(int $id, string $operator = '='): MultiFindOperationInterface
    {
        $this->getQuery()->byId($id, $operator);
        return $this;
    }

    /**
     * Выборка атрибуту сущности список "Идентификатор".
     *
     * @param array  $idList   Атрибут сущности список "Идентификатор".
     * @param string $operator Оператор сравнения при поиске.
     *
     * @return MultiFindOperationInterface
     *
     * @throws Exception Если в переданном массиве содержатся не только целые числа.
     */
    public function byIdList(array $idList, string $operator = 'IN'): MultiFindOperationInterface
    {
        foreach ($idList as $id) {
            if (! is_int($id)) {
                throw new Exception('All Channel ids must be integer');
            }
        }
        $this->getQuery()->byIds($idList);
        return $this;
    }

    /**
     * Задает критерий фильтрации выборки по атрибуту "Название" сущности "Логбук".
     *
     * @param string $name     Атрибут "Название" сущности "Логбук".
     * @param string $operator Оператор сравнения при поиске.
     *
     * @return MultiFindOperationInterface
     */
    public function byName(string $name, string $operator = '='): MultiFindOperationInterface
    {
        $this->getQuery()->byName($name, $operator);
        return $this;
    }

    /**
     * Метод устанавливает лимит получаемых сущностей.
     *
     * @param int $limit Количество необходимых сущностей.
     *
     * @throws InvalidConfigException Исключение генерируется в случае неверной инициализации команды.
     *
     * @return MultiFindOperationInterface
     */
    public function limit(int $limit): MultiFindOperationInterface
    {
        if ($limit <= 0) {
            return $this;
        }
        $this->getQuery()->limit($limit);
        return $this;
    }

    /**
     * Метод устанавливает смещение получаемых сущностей.
     *
     * @param int $offset Смещение в списке необходимых сущностей.
     *
     * @throws InvalidConfigException Исключение генерируется в случае неверной инициализации команды.
     *
     * @return MultiFindOperationInterface
     */
    public function offset(int $offset): MultiFindOperationInterface
    {
        if ($offset < 0) {
            return $this;
        }
        $this->getQuery()->offset($offset);
        return $this;
    }

    /**
     * Устанавливает сортировку результатов запроса по полю "id".
     *
     * @param string $sortType Тип сортировки - ASC или DESC.
     *
     * @return MultiFindOperationInterface
     */
    public function sortById(string $sortType = 'ASC'): MultiFindOperationInterface
    {
        $this->getQuery()->sortBy('id', $sortType);
        return $this;
    }

    /**
     * Устанавливает сортировку результатов запроса по полю "name".
     *
     * @param string $sortType Тип сортировки - ASC или DESC.
     *
     * @return MultiFindOperationInterface
     */
    public function sortByName(string $sortType = 'ASC'): MultiFindOperationInterface
    {
        $this->getQuery()->sortBy('name', $sortType);
        return $this;
    }
}
