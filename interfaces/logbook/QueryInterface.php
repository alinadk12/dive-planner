<?php

declare(strict_types = 1);

namespace app\interfaces\logbook;

use yii\db\Expression;
use yii\db\QueryInterface as YiiQueryInterface;


/**
 * Интерфейс опеределяет обертку для формирования критериев выборки данных.
 */
interface QueryInterface extends YiiQueryInterface
{
    /**
     * Выборка по атрибуту "Идентификатор" сущности "Логбук".
     *
     * @param int    $id       Атрибут "Идентификатор" сущности.
     * @param string $operator Оператор сравнения при поиске.
     *
     * @return QueryInterface
     */
    public function byId(int $id, string $operator = '='): QueryInterface;

    /**
     * Задает критерий фильтрации по нескольким значениям атрибута "Идентификатор" сущности "Логбук".
     *
     * @param array  $ids      Атрибут "Идентификатор" сущности "Логбук".
     * @param string $operator Оператор сравнения при поиске.
     *
     * @return QueryInterface
     */
    public function byIds(array $ids, string $operator = 'IN'): QueryInterface;

    /**
     * Выборка по атрибуту "Идентификатор пользователя" сущности "Логбук".
     *
     * @param int    $userId       Атрибут "Идентификатор пользователя" сущности.
     * @param string $operator Оператор сравнения при поиске.
     *
     * @return QueryInterface
     */
    public function byUserId(int $userId, string $operator = '='): QueryInterface;

    /**
     * Выборка по атрибуту "Дата погружения" сущности "Логбук".
     *
     * @param string $date Атрибут "Дата погружения" сущности.
     * @param string $operator Оператор сравнения при поиске.
     *
     * @return QueryInterface
     */
    public function byDate(string $date, string $operator = '='): QueryInterface;

    /**
     * Выборка по атрибуту "Место погружения" сущности "Логбук".
     *
     * @param string $location Атрибут "Место погружения" сущности.
     * @param string $operator Оператор сравнения при поиске.
     *
     * @return QueryInterface
     */
    public function byLocation(string $location, string $operator = '='): QueryInterface;

    /**
     * Выборка по атрибуту "Глубина" сущности "Логбук".
     *
     * @param int $depth Атрибут "Глубина" сущности.
     * @param string $operator Оператор сравнения при поиске.
     *
     * @return QueryInterface
     */
    public function byDepth(int $depth, string $operator = '='): QueryInterface;

    /**
     * Выборка по атрибуту "Видимость" сущности "Логбук".
     *
     * @param int $visibility Атрибут "Видимость" сущности.
     * @param string $operator Оператор сравнения при поиске.
     *
     * @return QueryInterface
     */
    public function byVisibility(int $visibility, string $operator = '='): QueryInterface;

    /**
     * Выборка по атрибуту "Температура воздуха" сущности "Логбук".
     *
     * @param int $tempAir Атрибут "Температура воздуха" сущности.
     * @param string $operator Оператор сравнения при поиске.
     *
     * @return QueryInterface
     */
    public function byTempAir(int $tempAir, string $operator = '='): QueryInterface;

    /**
     * Выборка по атрибуту "Температура воды на поверхности" сущности "Логбук".
     *
     * @param int $tempSurface Атрибут "Температура воды на поверхности" сущности.
     * @param string $operator Оператор сравнения при поиске.
     *
     * @return QueryInterface
     */
    public function byTempSurface(int $tempSurface, string $operator = '='): QueryInterface;

    /**
     * Выборка по атрибуту "Температура воды на дне" сущности "Логбук".
     *
     * @param int $tempBottom Атрибут "Температура воды на дне" сущности.
     * @param string $operator Оператор сравнения при поиске.
     *
     * @return QueryInterface
     */
    public function byTempBottom(int $tempBottom, string $operator = '='): QueryInterface;

    /**
     * Выборка по атрибуту "Время начала погружения" сущности "Логбук".
     *
     * @param string $timeIn Атрибут "Время начала погружения" сущности.
     * @param string $operator Оператор сравнения при поиске.
     *
     * @return QueryInterface
     */
    public function byTimeIn(string $timeIn, string $operator = '='): QueryInterface;

    /**
     * Выборка по атрибуту "Время окончания погружения" сущности "Логбук".
     *
     * @param string $timeOut Атрибут "Время окончания погружения" сущности.
     * @param string $operator Оператор сравнения при поиске.
     *
     * @return QueryInterface
     */
    public function byTimeOut(string $timeOut, string $operator = '='): QueryInterface;

    /**
     * Выборка по атрибуту "Объем баллона" сущности "Логбук".
     *
     * @param int $cylinder Атрибут "Объем баллона" сущности.
     * @param string $operator Оператор сравнения при поиске.
     *
     * @return QueryInterface
     */
    public function byCylinder(int $cylinder, string $operator = '='): QueryInterface;

    /**
     * Выборка по атрибуту "Количество воздуха в начале погружения" сущности "Логбук".
     *
     * @param int $startBar Атрибут "Количество воздуха в начале погружения" сущности.
     * @param string $operator Оператор сравнения при поиске.
     *
     * @return QueryInterface
     */
    public function byStartBar(int $startBar, string $operator = '='): QueryInterface;

    /**
     * Выборка по атрибуту "Количество воздуха в конце погружения" сущности "Логбук".
     *
     * @param int $endBar Атрибут "Количество воздуха в конце погружения" сущности.
     * @param string $operator Оператор сравнения при поиске.
     *
     * @return QueryInterface
     */
    public function byEndBar(int $endBar, string $operator = '='): QueryInterface;

    /**
     * Выборка по атрибуту "Комментарий" сущности "Логбук".
     *
     * @param string $comment Атрибут "Комментарий" сущности.
     * @param string $operator Оператор сравнения при поиске.
     *
     * @return QueryInterface
     */
    public function byComment(string $comment, string $operator = '='): QueryInterface;

    /**
     * Метод устанавливает FROM-часть формируемого запроса.
     * Метод добавлен в интерфейс, так как отсутствует в родительском интерфейсе.
     * Тем не менее, реализация метода уже сделана в классе yii\db\Query.
     * Тип возвращаемого значения не указан для совместимости с родителем.
     *
     * @param string|array|Expression $tables Таблица или список таблиц из которых нужно выбрать данные.
     *
     * @return QueryInterface|mixed
     */
    public function from($tables);

    /**
     * Метод устанавливает SELECT-часть формируемого запроса.
     * Метод добавлен в интерфейс, так как отсутствует в родительском интерфейсе.
     * Тем не менее, реализация метода уже сделана в классе yii\db\Query.
     * Тип возвращаемого значения не указан для совместимости с родителем.
     *
     * @param string|array|Expression $columns Столбцы, которые должны быть выбраны.
     * @param string|null             $option  Дополнительные опции выборки.
     *
     * @return QueryInterface|mixed
     */
    public function select($columns, $option = 'null');

    /**
     * Устанавливает сортировку результатов запроса.
     *
     * @param string $fieldName Название атрибута, по которому производится сортировка.
     * @param string $sortType  Тип сортировки - ASC или DESC.
     *
     * @return QueryInterface
     */
    public function sortBy(string $fieldName, string $sortType = 'DESC'): QueryInterface;
}
