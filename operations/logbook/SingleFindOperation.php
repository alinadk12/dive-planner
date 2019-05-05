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
     *
     * @throws InvalidConfigException Исключение генерируется в случае неверной инициализации команды.
     */
    public function byId(int $id, string $operator = '='): SingleFindOperationInterface
    {
        $this->getQuery()->byId($id, $operator);
        return $this;
    }

    /**
     * Задает критерий фильтрации выборки по атрибуту "Идентификатор пользователя" сущности "Логбук".
     *
     * @param int    $userId   Атрибут "Идентификатор пользователя" сущности "Логбук".
     * @param string $operator Оператор сравнения при поиске.
     *
     * @return SingleFindOperationInterface
     *
     * @throws InvalidConfigException Исключение генерируется в случае неверной инициализации команды.
     */
    public function byUserId(int $userId, string $operator = '='): SingleFindOperationInterface
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
     * @return SingleFindOperationInterface
     *
     * @throws InvalidConfigException Исключение генерируется в случае неверной инициализации команды.
     */
    public function byDate(string $date, string $operator = '='): SingleFindOperationInterface
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
     * @return SingleFindOperationInterface
     *
     * @throws InvalidConfigException Исключение генерируется в случае неверной инициализации команды.
     */
    public function byLocation(string $location, string $operator = '='): SingleFindOperationInterface
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
     * @return SingleFindOperationInterface
     *
     * @throws InvalidConfigException Исключение генерируется в случае неверной инициализации команды.
     */
    public function byDepth(int $depth, string $operator = '='): SingleFindOperationInterface
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
     * @return SingleFindOperationInterface
     *
     * @throws InvalidConfigException Исключение генерируется в случае неверной инициализации команды.
     */
    public function byVisibility(int $visibility, string $operator = '='): SingleFindOperationInterface
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
     * @return SingleFindOperationInterface
     *
     * @throws InvalidConfigException Исключение генерируется в случае неверной инициализации команды.
     */
    public function byTempAir(int $tempAir, string $operator = '='): SingleFindOperationInterface
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
     * @return SingleFindOperationInterface
     *
     * @throws InvalidConfigException Исключение генерируется в случае неверной инициализации команды.
     */
    public function byTempSurface(int $tempSurface, string $operator = '='): SingleFindOperationInterface
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
     * @return SingleFindOperationInterface
     *
     * @throws InvalidConfigException Исключение генерируется в случае неверной инициализации команды.
     */
    public function byTempBottom(int $tempBottom, string $operator = '='): SingleFindOperationInterface
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
     * @return SingleFindOperationInterface
     *
     * @throws InvalidConfigException Исключение генерируется в случае неверной инициализации команды.
     */
    public function byTimeIn(string $timeIn, string $operator = '='): SingleFindOperationInterface
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
     * @return SingleFindOperationInterface
     *
     * @throws InvalidConfigException Исключение генерируется в случае неверной инициализации команды.
     */
    public function byTimeOut(string $timeOut, string $operator = '='): SingleFindOperationInterface
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
     * @return SingleFindOperationInterface
     *
     * @throws InvalidConfigException Исключение генерируется в случае неверной инициализации команды.
     */
    public function byCylinder(int $cylinder, string $operator = '='): SingleFindOperationInterface
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
     * @return SingleFindOperationInterface
     *
     * @throws InvalidConfigException Исключение генерируется в случае неверной инициализации команды.
     */
    public function byStartBar(int $startBar, string $operator = '='): SingleFindOperationInterface
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
     * @return SingleFindOperationInterface
     *
     * @throws InvalidConfigException Исключение генерируется в случае неверной инициализации команды.
     */
    public function byEndBar(int $endBar, string $operator = '='): SingleFindOperationInterface
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
     * @return SingleFindOperationInterface
     *
     * @throws InvalidConfigException Исключение генерируется в случае неверной инициализации команды.
     */
    public function byComment(string $comment, string $operator = '='): SingleFindOperationInterface
    {
        $this->getQuery()->byComment($comment, $operator);
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
     *
     * @throws InvalidConfigException Исключение генерируется в случае неверной инициализации команды.
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
     *
     * @throws InvalidConfigException Исключение генерируется в случае неверной инициализации команды.
     */
    public function sortByName(string $sortType = 'ASC'): SingleFindOperationInterface
    {
        $this->getQuery()->sortBy('name', $sortType);
        return $this;
    }
}