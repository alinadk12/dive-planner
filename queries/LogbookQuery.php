<?php

declare(strict_types = 1);

namespace app\queries;

use yii\db\Query;
use app\entities\LogbookActiveRecord;
use app\interfaces\logbook\QueryInterface;

/**
 * Класс реализует обертку для формирования критериев выборки данных.
 */
class LogbookQuery extends Query implements QueryInterface
{
    /**
     * Выборка по атрибуту "Идентификатор" сущности "Логбук".
     *
     * @param int    $id       Атрибут "Идентификатор" сущности.
     * @param string $operator Оператор сравнения при поиске.
     *
     * @return QueryInterface
     */
    public function byId(int $id, string $operator = '='): QueryInterface
    {
        return $this->andWhere([
            $operator,
            'logbook.id',
            $id,
        ]);
    }

    /**
     * Задает критерий фильтрации по нескольким значениям атрибута "Идентификатор" сущности "Логбук".
     *
     * @param array  $ids      Атрибут "Идентификатор" сущности "Логбук".
     * @param string $operator Оператор сравнения при поиске.
     *
     * @return QueryInterface
     */
    public function byIds(array $ids, string $operator = 'IN'): QueryInterface
    {
        return $this->andWhere([
            $operator,
            'logbook.id',
            $ids,
        ]);
    }

    /**
     * Выборка по атрибуту "Идентификатор пользователя" сущности "Логбук".
     *
     * @param int    $userId       Атрибут "Идентификатор пользователя" сущности.
     * @param string $operator Оператор сравнения при поиске.
     *
     * @return QueryInterface
     */
    public function byUserId(int $userId, string $operator = '='): QueryInterface
    {
        return $this->andWhere([
            $operator,
            'logbook.userId',
            $userId,
        ]);
    }

    /**
     * Выборка по атрибуту "Дата погружения" сущности "Логбук".
     *
     * @param string $date Атрибут "Дата погружения" сущности.
     * @param string $operator Оператор сравнения при поиске.
     *
     * @return QueryInterface
     */
    public function byDate(string $date, string $operator = '='): QueryInterface
    {
        return $this->andWhere([
            $operator,
            'logbook.date',
            $date,
        ]);
    }

    /**
     * Выборка по атрибуту "Место погружения" сущности "Логбук".
     *
     * @param string $location Атрибут "Место погружения" сущности.
     * @param string $operator Оператор сравнения при поиске.
     *
     * @return QueryInterface
     */
    public function byLocation(string $location, string $operator = '='): QueryInterface
    {
        return $this->andWhere([
            $operator,
            'logbook.location',
            $location,
        ]);
    }

    /**
     * Выборка по атрибуту "Глубина" сущности "Логбук".
     *
     * @param int $depth Атрибут "Глубина" сущности.
     * @param string $operator Оператор сравнения при поиске.
     *
     * @return QueryInterface
     */
    public function byDepth(int $depth, string $operator = '='): QueryInterface
    {
        return $this->andWhere([
            $operator,
            'logbook.depth',
            $depth,
        ]);
    }

    /**
     * Выборка по атрибуту "Видимость" сущности "Логбук".
     *
     * @param int $visibility Атрибут "Видимость" сущности.
     * @param string $operator Оператор сравнения при поиске.
     *
     * @return QueryInterface
     */
    public function byVisibility(int $visibility, string $operator = '='): QueryInterface
    {
        return $this->andWhere([
            $operator,
            'logbook.visibility',
            $visibility,
        ]);
    }

    /**
     * Выборка по атрибуту "Температура воздуха" сущности "Логбук".
     *
     * @param int $tempAir Атрибут "Температура воздуха" сущности.
     * @param string $operator Оператор сравнения при поиске.
     *
     * @return QueryInterface
     */
    public function byTempAir(int $tempAir, string $operator = '='): QueryInterface
    {
        return $this->andWhere([
            $operator,
            'logbook.tempAir',
            $tempAir,
        ]);
    }

    /**
     * Выборка по атрибуту "Температура воды на поверхности" сущности "Логбук".
     *
     * @param int $tempSurface Атрибут "Температура воды на поверхности" сущности.
     * @param string $operator Оператор сравнения при поиске.
     *
     * @return QueryInterface
     */
    public function byTempSurface(int $tempSurface, string $operator = '='): QueryInterface
    {
        return $this->andWhere([
            $operator,
            'logbook.tempSurface',
            $tempSurface,
        ]);
    }

    /**
     * Выборка по атрибуту "Температура воды на дне" сущности "Логбук".
     *
     * @param int $tempBottom Атрибут "Температура воды на дне" сущности.
     * @param string $operator Оператор сравнения при поиске.
     *
     * @return QueryInterface
     */
    public function byTempBottom(int $tempBottom, string $operator = '='): QueryInterface
    {
        return $this->andWhere([
            $operator,
            'logbook.tempBottom',
            $tempBottom,
        ]);
    }

    /**
     * Выборка по атрибуту "Время начала погружения" сущности "Логбук".
     *
     * @param string $timeIn Атрибут "Время начала погружения" сущности.
     * @param string $operator Оператор сравнения при поиске.
     *
     * @return QueryInterface
     */
    public function byTimeIn(string $timeIn, string $operator = '='): QueryInterface
    {
        return $this->andWhere([
            $operator,
            'logbook.timeIn',
            $timeIn,
        ]);
    }

    /**
     * Выборка по атрибуту "Время окончания погружения" сущности "Логбук".
     *
     * @param string $timeOut Атрибут "Время окончания погружения" сущности.
     * @param string $operator Оператор сравнения при поиске.
     *
     * @return QueryInterface
     */
    public function byTimeOut(string $timeOut, string $operator = '='): QueryInterface
    {
        return $this->andWhere([
            $operator,
            'logbook.timeOut',
            $timeOut,
        ]);
    }

    /**
     * Выборка по атрибуту "Объем баллона" сущности "Логбук".
     *
     * @param int $cylinder Атрибут "Объем баллона" сущности.
     * @param string $operator Оператор сравнения при поиске.
     *
     * @return QueryInterface
     */
    public function byCylinder(int $cylinder, string $operator = '='): QueryInterface
    {
        return $this->andWhere([
            $operator,
            'logbook.cylinder',
            $cylinder,
        ]);
    }

    /**
     * Выборка по атрибуту "Количество воздуха в начале погружения" сущности "Логбук".
     *
     * @param int $startBar Атрибут "Количество воздуха в начале погружения" сущности.
     * @param string $operator Оператор сравнения при поиске.
     *
     * @return QueryInterface
     */
    public function byStartBar(int $startBar, string $operator = '='): QueryInterface
    {
        return $this->andWhere([
            $operator,
            'logbook.startBar',
            $startBar,
        ]);
    }

    /**
     * Выборка по атрибуту "Количество воздуха в конце погружения" сущности "Логбук".
     *
     * @param int $endBar Атрибут "Количество воздуха в конце погружения" сущности.
     * @param string $operator Оператор сравнения при поиске.
     *
     * @return QueryInterface
     */
    public function byEndBar(int $endBar, string $operator = '='): QueryInterface
    {
        return $this->andWhere([
            $operator,
            'logbook.endBar',
            $endBar,
        ]);
    }

    /**
     * Выборка по атрибуту "Комментарий" сущности "Логбук".
     *
     * @param string $comment Атрибут "Комментарий" сущности.
     * @param string $operator Оператор сравнения при поиске.
     *
     * @return QueryInterface
     */
    public function byComment(string $comment, string $operator = '='): QueryInterface
    {
        return $this->andWhere([
            $operator,
            'logbook.comment',
            $comment,
        ]);
    }

    /**
     * Метод выполняет инициализацию объекта.
     *
     * @inherit
     *
     * @return void
     */
    public function init()
    {
        parent::init();
        $this->from(LogbookActiveRecord::tableName() . ' AS logbook');
        $this->select('logbook.*');
    }

    /**
     * Устанавливает сортировку результатов запроса.
     *
     * @param string $fieldName Название атрибута, по которому производится сортировка.
     * @param string $sortType  Тип сортировки - ASC или DESC.
     *
     * @return QueryInterface
     */
    public function sortBy(string $fieldName, string $sortType = 'DESC'): QueryInterface
    {
        $sortType = 'ASC' === $sortType ? $sortType : 'DESC';
        return $this->addOrderBy($fieldName . ' ' . $sortType);
    }
}
