<?php

declare(strict_types = 1);

namespace app\interfaces\logbook\filters;

use app\interfaces\abstracts\ObjectWithErrorsInterface;

/**
 * Интерфейс объявляет методы фильтрации операций.
 */
interface BaseFilterOperationInterface extends ObjectWithErrorsInterface
{
    /**
     * Задает критерий фильтрации выборки по атрибуту "Идентификатор" сущности "Логбук".
     *
     * @param int    $id       Атрибут "Идентификатор" сущности "Логбук".
     * @param string $operator Оператор сравнения при поиске.
     *
     * @return BaseFilterOperationInterface
     */
    public function byId(int $id, string $operator = '=');

    /**
     * Задает критерий фильтрации выборки по атрибуту "Идентификатор пользователя" сущности "Логбук".
     *
     * @param int    $userId   Атрибут "Идентификатор пользователя" сущности "Логбук".
     * @param string $operator Оператор сравнения при поиске.
     *
     * @return BaseFilterOperationInterface
     */
    public function byUserId(int $userId, string $operator = '=');

    /**
     * Задает критерий фильтрации выборки по атрибуту "Дата погружения" сущности "Логбук".
     *
     * @param string $date     Атрибут "Дата погружения" сущности "Логбук".
     * @param string $operator Оператор сравнения при поиске.
     *
     * @return BaseFilterOperationInterface
     */
    public function byDate(string $date, string $operator = '=');

    /**
     * Задает критерий фильтрации выборки по атрибуту "Дата погружения" сущности "Логбук".
     *
     * @param string $location Атрибут "Дата погружения" сущности "Логбук".
     * @param string $operator Оператор сравнения при поиске.
     *
     * @return BaseFilterOperationInterface
     */
    public function byLocation(string $location, string $operator = '=');

    /**
     * Задает критерий фильтрации выборки по атрибуту "Глубина" сущности "Логбук".
     *
     * @param int    $depth    Атрибут "Глубина" сущности "Логбук".
     * @param string $operator Оператор сравнения при поиске.
     *
     * @return BaseFilterOperationInterface
     */
    public function byDepth(int $depth, string $operator = '=');

    /**
     * Задает критерий фильтрации выборки по атрибуту "Видимость" сущности "Логбук".
     *
     * @param int    $visibility Атрибут "Видимость" сущности "Логбук".
     * @param string $operator   Оператор сравнения при поиске.
     *
     * @return BaseFilterOperationInterface
     */
    public function byVisibility(int $visibility, string $operator = '=');

    /**
     * Задает критерий фильтрации выборки по атрибуту "Температура воздуха" сущности "Логбук".
     *
     * @param int    $tempAir  Атрибут "Температура воздуха" сущности "Логбук".
     * @param string $operator Оператор сравнения при поиске.
     *
     * @return BaseFilterOperationInterface
     */
    public function byTempAir(int $tempAir, string $operator = '=');

    /**
     * Задает критерий фильтрации выборки по атрибуту "Температура воды на поверхности" сущности "Логбук".
     *
     * @param int    $tempSurface Атрибут "Температура воды на поверхности" сущности "Логбук".
     * @param string $operator    Оператор сравнения при поиске.
     *
     * @return BaseFilterOperationInterface
     */
    public function byTempSurface(int $tempSurface, string $operator = '=');

    /**
     * Задает критерий фильтрации выборки по атрибуту "Температура воды на дне" сущности "Логбук".
     *
     * @param int    $tempBottom Атрибут "Температура воды на дне" сущности "Логбук".
     * @param string $operator   Оператор сравнения при поиске.
     *
     * @return BaseFilterOperationInterface
     */
    public function byTempBottom(int $tempBottom, string $operator = '=');

    /**
     * Задает критерий фильтрации выборки по атрибуту "Время начала погружения" сущности "Логбук".
     *
     * @param string $timeIn   Атрибут "Время начала погружения" сущности "Логбук".
     * @param string $operator Оператор сравнения при поиске.
     *
     * @return BaseFilterOperationInterface
     */
    public function byTimeIn(string $timeIn, string $operator = '=');

    /**
     * Задает критерий фильтрации выборки по атрибуту "Время окончания погружения" сущности "Логбук".
     *
     * @param string $timeOut  Атрибут "Время окончания погружения" сущности "Логбук".
     * @param string $operator Оператор сравнения при поиске.
     *
     * @return BaseFilterOperationInterface
     */
    public function byTimeOut(string $timeOut, string $operator = '=');

    /**
     * Задает критерий фильтрации выборки по атрибуту "Объем баллона" сущности "Логбук".
     *
     * @param int    $cylinder Атрибут "Объем баллона" сущности "Логбук".
     * @param string $operator Оператор сравнения при поиске.
     *
     * @return BaseFilterOperationInterface
     */
    public function byCylinder(int $cylinder, string $operator = '=');

    /**
     * Задает критерий фильтрации выборки по атрибуту "Количество воздуха в начале погружения" сущности "Логбук".
     *
     * @param int    $startBar Атрибут "Количество воздуха в начале погружения" сущности "Логбук".
     * @param string $operator Оператор сравнения при поиске.
     *
     * @return BaseFilterOperationInterface
     */
    public function byStartBar(int $startBar, string $operator = '=');

    /**
     * Задает критерий фильтрации выборки по атрибуту "Количество воздуха в конце погружения" сущности "Логбук".
     *
     * @param int    $endBar   Атрибут "Количество воздуха в конце погружения" сущности "Логбук".
     * @param string $operator Оператор сравнения при поиске.
     *
     * @return BaseFilterOperationInterface
     */
    public function byEndBar(int $endBar, string $operator = '=');

    /**
     * Задает критерий фильтрации выборки по атрибуту "Комментарий" сущности "Логбук".
     *
     * @param string $comment  Атрибут "Комментарий" сущности "Логбук".
     * @param string $operator Оператор сравнения при поиске.
     *
     * @return BaseFilterOperationInterface
     */
    public function byComment(string $comment, string $operator = '=');

    /**
     * Устанавливает сортировку результатов запроса по полю "id".
     *
     * @param string $sortType Тип сортировки - ASC или DESC.
     *
     * @return BaseFilterOperationInterface
     */
    public function sortById(string $sortType = 'ASC');
}