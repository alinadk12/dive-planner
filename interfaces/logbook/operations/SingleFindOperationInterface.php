<?php

declare(strict_types = 1);

namespace app\interfaces\logbook\operations;

use app\interfaces\logbook\dto\OperationResultInterface;

/**
 * Интерфейс операции, реализующей логику поиска сущности.
 */
interface SingleFindOperationInterface extends BaseFindOperationInterface
{
    /**
     * Метод устанавливает объект прототипа ответа команды "Логбук".
     *
     * @param OperationResultInterface $value Новое значение.
     *
     * @return SingleFindOperationInterface
     */
    public function setResultPrototype(OperationResultInterface $value): SingleFindOperationInterface;

    /**
     * Метод возвращает объект-результат ответа команды "Логбук".
     *
     * @return OperationResultInterface
     */
    public function getResultPrototype(): OperationResultInterface;

    /**
     * Задает критерий фильтрации выборки по атрибуту "Идентификатор" сущности "Логбук".
     *
     * @param int    $id       Атрибут "Идентификатор" сущности "Логбук".
     * @param string $operator Оператор сравнения при поиске.
     *
     * @return SingleFindOperationInterface
     */
    public function byId(int $id, string $operator = '='): SingleFindOperationInterface;

    /**
     * Задает критерий фильтрации выборки по атрибуту "Идентификатор пользователя" сущности "Логбук".
     *
     * @param int    $userId   Атрибут "Идентификатор пользователя" сущности "Логбук".
     * @param string $operator Оператор сравнения при поиске.
     *
     * @return SingleFindOperationInterface
     */
    public function byUserId(int $userId, string $operator = '='): SingleFindOperationInterface;

    /**
     * Задает критерий фильтрации выборки по атрибуту "Дата погружения" сущности "Логбук".
     *
     * @param string $date     Атрибут "Дата погружения" сущности "Логбук".
     * @param string $operator Оператор сравнения при поиске.
     *
     * @return SingleFindOperationInterface
     */
    public function byDate(string $date, string $operator = '='): SingleFindOperationInterface;

    /**
     * Задает критерий фильтрации выборки по атрибуту "Дата погружения" сущности "Логбук".
     *
     * @param string $location Атрибут "Дата погружения" сущности "Логбук".
     * @param string $operator Оператор сравнения при поиске.
     *
     * @return SingleFindOperationInterface
     */
    public function byLocation(string $location, string $operator = '='): SingleFindOperationInterface;

    /**
     * Задает критерий фильтрации выборки по атрибуту "Глубина" сущности "Логбук".
     *
     * @param int    $depth    Атрибут "Глубина" сущности "Логбук".
     * @param string $operator Оператор сравнения при поиске.
     *
     * @return SingleFindOperationInterface
     */
    public function byDepth(int $depth, string $operator = '='): SingleFindOperationInterface;

    /**
     * Задает критерий фильтрации выборки по атрибуту "Видимость" сущности "Логбук".
     *
     * @param int    $visibility Атрибут "Видимость" сущности "Логбук".
     * @param string $operator   Оператор сравнения при поиске.
     *
     * @return SingleFindOperationInterface
     */
    public function byVisibility(int $visibility, string $operator = '='): SingleFindOperationInterface;

    /**
     * Задает критерий фильтрации выборки по атрибуту "Температура воздуха" сущности "Логбук".
     *
     * @param int    $tempAir  Атрибут "Температура воздуха" сущности "Логбук".
     * @param string $operator Оператор сравнения при поиске.
     *
     * @return SingleFindOperationInterface
     */
    public function byTempAir(int $tempAir, string $operator = '='): SingleFindOperationInterface;

    /**
     * Задает критерий фильтрации выборки по атрибуту "Температура воды на поверхности" сущности "Логбук".
     *
     * @param int    $tempSurface Атрибут "Температура воды на поверхности" сущности "Логбук".
     * @param string $operator    Оператор сравнения при поиске.
     *
     * @return SingleFindOperationInterface
     */
    public function byTempSurface(int $tempSurface, string $operator = '='): SingleFindOperationInterface;

    /**
     * Задает критерий фильтрации выборки по атрибуту "Температура воды на дне" сущности "Логбук".
     *
     * @param int    $tempBottom Атрибут "Температура воды на дне" сущности "Логбук".
     * @param string $operator   Оператор сравнения при поиске.
     *
     * @return SingleFindOperationInterface
     */
    public function byTempBottom(int $tempBottom, string $operator = '='): SingleFindOperationInterface;

    /**
     * Задает критерий фильтрации выборки по атрибуту "Время начала погружения" сущности "Логбук".
     *
     * @param string $timeIn   Атрибут "Время начала погружения" сущности "Логбук".
     * @param string $operator Оператор сравнения при поиске.
     *
     * @return SingleFindOperationInterface
     */
    public function byTimeIn(string $timeIn, string $operator = '='): SingleFindOperationInterface;

    /**
     * Задает критерий фильтрации выборки по атрибуту "Время окончания погружения" сущности "Логбук".
     *
     * @param string $timeOut  Атрибут "Время окончания погружения" сущности "Логбук".
     * @param string $operator Оператор сравнения при поиске.
     *
     * @return SingleFindOperationInterface
     */
    public function byTimeOut(string $timeOut, string $operator = '='): SingleFindOperationInterface;

    /**
     * Задает критерий фильтрации выборки по атрибуту "Объем баллона" сущности "Логбук".
     *
     * @param int    $cylinder Атрибут "Объем баллона" сущности "Логбук".
     * @param string $operator Оператор сравнения при поиске.
     *
     * @return SingleFindOperationInterface
     */
    public function byCylinder(int $cylinder, string $operator = '='): SingleFindOperationInterface;

    /**
     * Задает критерий фильтрации выборки по атрибуту "Количество воздуха в начале погружения" сущности "Логбук".
     *
     * @param int    $startBar Атрибут "Количество воздуха в начале погружения" сущности "Логбук".
     * @param string $operator Оператор сравнения при поиске.
     *
     * @return SingleFindOperationInterface
     */
    public function byStartBar(int $startBar, string $operator = '='): SingleFindOperationInterface;

    /**
     * Задает критерий фильтрации выборки по атрибуту "Количество воздуха в конце погружения" сущности "Логбук".
     *
     * @param int    $endBar   Атрибут "Количество воздуха в конце погружения" сущности "Логбук".
     * @param string $operator Оператор сравнения при поиске.
     *
     * @return SingleFindOperationInterface
     */
    public function byEndBar(int $endBar, string $operator = '='): SingleFindOperationInterface;

    /**
     * Задает критерий фильтрации выборки по атрибуту "Комментарий" сущности "Логбук".
     *
     * @param string $comment  Атрибут "Комментарий" сущности "Логбук".
     * @param string $operator Оператор сравнения при поиске.
     *
     * @return SingleFindOperationInterface
     */
    public function byComment(string $comment, string $operator = '='): SingleFindOperationInterface;

    /**
     * Метод возвращает одну сущность по заданному фильтру.
     *
     * @return OperationResultInterface
     */
    public function doOperation(): OperationResultInterface;

    /**
     * Устанавливает сортировку результатов запроса по полю "id".
     *
     * @param string $sortType Тип сортировки - ASC или DESC.
     *
     * @return SingleFindOperationInterface
     */
    public function sortById(string $sortType = 'ASC'): SingleFindOperationInterface;
}