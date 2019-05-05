<?php

declare(strict_types = 1);

namespace app\operations\logbook;

use app\interfaces\logbook\dto\OperationListResultInterface;
use app\interfaces\logbook\operations\MultiFindOperationInterface;
use Exception;
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
     * Метод устанавливает объект прототипа ответа команды "Категории".
     *
     * @param OperationListResultInterface $value Новое значение.
     *
     * @return MultiFindOperationInterface
     */
    public function setResultPrototype(OperationListResultInterface $value): MultiFindOperationInterface
    {
        $this->resultPrototype = $value;
        return $this;
    }

    /**
     * Метод возвращает объект-результат ответа команды "Логбук".
     *
     * @return OperationListResultInterface
     *
     * @throws InvalidConfigException Исключение генерируется в случае неверной инициализации команды.
     */
    public function getResultPrototype(): OperationListResultInterface
    {
        if (null === $this->resultPrototype) {
            throw new InvalidConfigException(__METHOD__ . '() Operation result object can not be null');
        }
        return $this->resultPrototype;
    }

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
     *
     * @throws InvalidConfigException Исключение генерируется в случае неверной инициализации команды.
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
     * Задает критерий фильтрации выборки по атрибуту "Идентификатор пользователя" сущности "Логбук".
     *
     * @param int    $userId   Атрибут "Идентификатор пользователя" сущности "Логбук".
     * @param string $operator Оператор сравнения при поиске.
     *
     * @return MultiFindOperationInterface
     *
     * @throws InvalidConfigException Исключение генерируется в случае неверной инициализации команды.
     */
    public function byUserId(int $userId, string $operator = '='): MultiFindOperationInterface
    {
        $this->getQuery()->byUserId($userId, $operator);
        return $this;
    }

    /**
     * Задает критерий фильтрации выборки по атрибуту "Дата погружения" сущности "Логбук".
     *
     * @param string $date     Атрибут "Дата погружения" сущности "Логбук".
     * @param string $operator Оператор сравнения при поиске.
     *
     * @return MultiFindOperationInterface
     *
     * @throws InvalidConfigException Исключение генерируется в случае неверной инициализации команды.
     */
    public function byDate(string $date, string $operator = '='): MultiFindOperationInterface
    {
        $this->getQuery()->byDate($date, $operator);
        return $this;
    }

    /**
     * Задает критерий фильтрации выборки по атрибуту "Дата погружения" сущности "Логбук".
     *
     * @param string $location Атрибут "Дата погружения" сущности "Логбук".
     * @param string $operator Оператор сравнения при поиске.
     *
     * @return MultiFindOperationInterface
     *
     * @throws InvalidConfigException Исключение генерируется в случае неверной инициализации команды.
     */
    public function byLocation(string $location, string $operator = '='): MultiFindOperationInterface
    {
        $this->getQuery()->byLocation($location, $operator);
        return $this;
    }

    /**
     * Задает критерий фильтрации выборки по атрибуту "Глубина" сущности "Логбук".
     *
     * @param int    $depth    Атрибут "Глубина" сущности "Логбук".
     * @param string $operator Оператор сравнения при поиске.
     *
     * @return MultiFindOperationInterface
     *
     * @throws InvalidConfigException Исключение генерируется в случае неверной инициализации команды.
     */
    public function byDepth(int $depth, string $operator = '='): MultiFindOperationInterface
    {
        $this->getQuery()->byDepth($depth, $operator);
        return $this;
    }

    /**
     * Задает критерий фильтрации выборки по атрибуту "Видимость" сущности "Логбук".
     *
     * @param int    $visibility Атрибут "Видимость" сущности "Логбук".
     * @param string $operator   Оператор сравнения при поиске.
     *
     * @return MultiFindOperationInterface
     *
     * @throws InvalidConfigException Исключение генерируется в случае неверной инициализации команды.
     */
    public function byVisibility(int $visibility, string $operator = '='): MultiFindOperationInterface
    {
        $this->getQuery()->byVisibility($visibility, $operator);
        return $this;
    }

    /**
     * Задает критерий фильтрации выборки по атрибуту "Температура воздуха" сущности "Логбук".
     *
     * @param int    $tempAir  Атрибут "Температура воздуха" сущности "Логбук".
     * @param string $operator Оператор сравнения при поиске.
     *
     * @return MultiFindOperationInterface
     *
     * @throws InvalidConfigException Исключение генерируется в случае неверной инициализации команды.
     */
    public function byTempAir(int $tempAir, string $operator = '='): MultiFindOperationInterface
    {
        $this->getQuery()->byTempAir($tempAir, $operator);
        return $this;
    }

    /**
     * Задает критерий фильтрации выборки по атрибуту "Температура воды на поверхности" сущности "Логбук".
     *
     * @param int    $tempSurface Атрибут "Температура воды на поверхности" сущности "Логбук".
     * @param string $operator    Оператор сравнения при поиске.
     *
     * @return MultiFindOperationInterface
     *
     * @throws InvalidConfigException Исключение генерируется в случае неверной инициализации команды.
     */
    public function byTempSurface(int $tempSurface, string $operator = '='): MultiFindOperationInterface
    {
        $this->getQuery()->byTempSurface($tempSurface, $operator);
        return $this;
    }

    /**
     * Задает критерий фильтрации выборки по атрибуту "Температура воды на дне" сущности "Логбук".
     *
     * @param int    $tempBottom Атрибут "Температура воды на дне" сущности "Логбук".
     * @param string $operator   Оператор сравнения при поиске.
     *
     * @return MultiFindOperationInterface
     *
     * @throws InvalidConfigException Исключение генерируется в случае неверной инициализации команды.
     */
    public function byTempBottom(int $tempBottom, string $operator = '='): MultiFindOperationInterface
    {
        $this->getQuery()->byTempBottom($tempBottom, $operator);
        return $this;
    }

    /**
     * Задает критерий фильтрации выборки по атрибуту "Время начала погружения" сущности "Логбук".
     *
     * @param string $timeIn   Атрибут "Время начала погружения" сущности "Логбук".
     * @param string $operator Оператор сравнения при поиске.
     *
     * @return MultiFindOperationInterface
     *
     * @throws InvalidConfigException Исключение генерируется в случае неверной инициализации команды.
     */
    public function byTimeIn(string $timeIn, string $operator = '='): MultiFindOperationInterface
    {
        $this->getQuery()->byTimeIn($timeIn, $operator);
        return $this;
    }

    /**
     * Задает критерий фильтрации выборки по атрибуту "Время окончания погружения" сущности "Логбук".
     *
     * @param string $timeOut  Атрибут "Время окончания погружения" сущности "Логбук".
     * @param string $operator Оператор сравнения при поиске.
     *
     * @return MultiFindOperationInterface
     *
     * @throws InvalidConfigException Исключение генерируется в случае неверной инициализации команды.
     */
    public function byTimeOut(string $timeOut, string $operator = '='): MultiFindOperationInterface
    {
        $this->getQuery()->byTimeOut($timeOut, $operator);
        return $this;
    }

    /**
     * Задает критерий фильтрации выборки по атрибуту "Объем баллона" сущности "Логбук".
     *
     * @param int    $cylinder Атрибут "Объем баллона" сущности "Логбук".
     * @param string $operator Оператор сравнения при поиске.
     *
     * @return MultiFindOperationInterface
     *
     * @throws InvalidConfigException Исключение генерируется в случае неверной инициализации команды.
     */
    public function byCylinder(int $cylinder, string $operator = '='): MultiFindOperationInterface
    {
        $this->getQuery()->byCylinder($cylinder, $operator);
        return $this;
    }

    /**
     * Задает критерий фильтрации выборки по атрибуту "Количество воздуха в начале погружения" сущности "Логбук".
     *
     * @param int    $startBar Атрибут "Количество воздуха в начале погружения" сущности "Логбук".
     * @param string $operator Оператор сравнения при поиске.
     *
     * @return MultiFindOperationInterface
     *
     * @throws InvalidConfigException Исключение генерируется в случае неверной инициализации команды.
     */
    public function byStartBar(int $startBar, string $operator = '='): MultiFindOperationInterface
    {
        $this->getQuery()->byStartBar($startBar, $operator);
        return $this;
    }

    /**
     * Задает критерий фильтрации выборки по атрибуту "Количество воздуха в конце погружения" сущности "Логбук".
     *
     * @param int    $endBar   Атрибут "Количество воздуха в конце погружения" сущности "Логбук".
     * @param string $operator Оператор сравнения при поиске.
     *
     * @return MultiFindOperationInterface
     *
     * @throws InvalidConfigException Исключение генерируется в случае неверной инициализации команды.
     */
    public function byEndBar(int $endBar, string $operator = '='): MultiFindOperationInterface
    {
        $this->getQuery()->byEndBar($endBar, $operator);
        return $this;
    }

    /**
     * Задает критерий фильтрации выборки по атрибуту "Комментарий" сущности "Логбук".
     *
     * @param string $comment  Атрибут "Комментарий" сущности "Логбук".
     * @param string $operator Оператор сравнения при поиске.
     *
     * @return MultiFindOperationInterface
     *
     * @throws InvalidConfigException Исключение генерируется в случае неверной инициализации команды.
     */
    public function byComment(string $comment, string $operator = '='): MultiFindOperationInterface
    {
        $this->getQuery()->byComment($comment, $operator);
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
     *
     * @throws InvalidConfigException Исключение генерируется в случае неверной инициализации команды.
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
     *
     * @throws InvalidConfigException Исключение генерируется в случае неверной инициализации команды.
     */
    public function sortByName(string $sortType = 'ASC'): MultiFindOperationInterface
    {
        $this->getQuery()->sortBy('name', $sortType);
        return $this;
    }
}
