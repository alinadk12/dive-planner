<?php

declare(strict_types = 1);

namespace app\interfaces\logbook\operations;

use app\interfaces\logbook\dto\OperationListResultInterface;

interface MultiFindOperationInterface extends BaseFindOperationInterface
{
    /**
     * Метод устанавливает объект прототипа "Логбук" ответа команды.
     *
     * @param OperationListResultInterface $value Новое значение.
     *
     * @return MultiFindOperationInterface
     */
    public function setResultPrototype(OperationListResultInterface $value): MultiFindOperationInterface;

    /**
     * Метод возвращает объект-результат "Логбук" ответа команды.
     *
     * @return OperationListResultInterface
     */
    public function getResultPrototype(): OperationListResultInterface;

    /**
     * Метод возвращает все сущности по заданному фильтру в виде массива.
     *
     * @return array
     */
    public function allAsArray(): array;

    /**
     * Задает критерий фильтрации выборки по атрибуту "Идентификатор" сущности "Логбук".
     *
     * @param int    $id       Атрибут "Идентификатор" сущности "Логбук".
     * @param string $operator Оператор сравнения при поиске.
     *
     * @return MultiFindOperationInterface
     */
    public function byId(int $id, string $operator = '='): MultiFindOperationInterface;

    /**
     * Выборка атрибуту сущности список "Идентификатор".
     *
     * @param array  $idList   Атрибут сущности список "Идентификатор".
     * @param string $operator Оператор сравнения при поиске.
     *
     * @return MultiFindOperationInterface
     */
    public function byIdList(array $idList, string $operator = 'IN'): MultiFindOperationInterface;

    /**
     * Задает критерий фильтрации выборки по атрибуту "Идентификатор пользователя" сущности "Логбук".
     *
     * @param int    $userId   Атрибут "Идентификатор пользователя" сущности "Логбук".
     * @param string $operator Оператор сравнения при поиске.
     *
     * @return MultiFindOperationInterface
     */
    public function byUserId(int $userId, string $operator = '='): MultiFindOperationInterface;

    /**
     * Задает критерий фильтрации выборки по атрибуту "Дата погружения" сущности "Логбук".
     *
     * @param string $date     Атрибут "Дата погружения" сущности "Логбук".
     * @param string $operator Оператор сравнения при поиске.
     *
     * @return MultiFindOperationInterface
     */
    public function byDate(string $date, string $operator = '='): MultiFindOperationInterface;

    /**
     * Задает критерий фильтрации выборки по атрибуту "Дата погружения" сущности "Логбук".
     *
     * @param string $location Атрибут "Дата погружения" сущности "Логбук".
     * @param string $operator Оператор сравнения при поиске.
     *
     * @return MultiFindOperationInterface
     */
    public function byLocation(string $location, string $operator = '='): MultiFindOperationInterface;

    /**
     * Задает критерий фильтрации выборки по атрибуту "Глубина" сущности "Логбук".
     *
     * @param int    $depth    Атрибут "Глубина" сущности "Логбук".
     * @param string $operator Оператор сравнения при поиске.
     *
     * @return MultiFindOperationInterface
     */
    public function byDepth(int $depth, string $operator = '='): MultiFindOperationInterface;

    /**
     * Задает критерий фильтрации выборки по атрибуту "Видимость" сущности "Логбук".
     *
     * @param int    $visibility Атрибут "Видимость" сущности "Логбук".
     * @param string $operator   Оператор сравнения при поиске.
     *
     * @return MultiFindOperationInterface
     */
    public function byVisibility(int $visibility, string $operator = '='): MultiFindOperationInterface;

    /**
     * Задает критерий фильтрации выборки по атрибуту "Температура воздуха" сущности "Логбук".
     *
     * @param int    $tempAir  Атрибут "Температура воздуха" сущности "Логбук".
     * @param string $operator Оператор сравнения при поиске.
     *
     * @return MultiFindOperationInterface
     */
    public function byTempAir(int $tempAir, string $operator = '='): MultiFindOperationInterface;

    /**
     * Задает критерий фильтрации выборки по атрибуту "Температура воды на поверхности" сущности "Логбук".
     *
     * @param int    $tempSurface Атрибут "Температура воды на поверхности" сущности "Логбук".
     * @param string $operator    Оператор сравнения при поиске.
     *
     * @return MultiFindOperationInterface
     */
    public function byTempSurface(int $tempSurface, string $operator = '='): MultiFindOperationInterface;

    /**
     * Задает критерий фильтрации выборки по атрибуту "Температура воды на дне" сущности "Логбук".
     *
     * @param int    $tempBottom Атрибут "Температура воды на дне" сущности "Логбук".
     * @param string $operator   Оператор сравнения при поиске.
     *
     * @return MultiFindOperationInterface
     */
    public function byTempBottom(int $tempBottom, string $operator = '='): MultiFindOperationInterface;

    /**
     * Задает критерий фильтрации выборки по атрибуту "Время начала погружения" сущности "Логбук".
     *
     * @param string $timeIn   Атрибут "Время начала погружения" сущности "Логбук".
     * @param string $operator Оператор сравнения при поиске.
     *
     * @return MultiFindOperationInterface
     */
    public function byTimeIn(string $timeIn, string $operator = '='): MultiFindOperationInterface;

    /**
     * Задает критерий фильтрации выборки по атрибуту "Время окончания погружения" сущности "Логбук".
     *
     * @param string $timeOut  Атрибут "Время окончания погружения" сущности "Логбук".
     * @param string $operator Оператор сравнения при поиске.
     *
     * @return MultiFindOperationInterface
     */
    public function byTimeOut(string $timeOut, string $operator = '='): MultiFindOperationInterface;

    /**
     * Задает критерий фильтрации выборки по атрибуту "Объем баллона" сущности "Логбук".
     *
     * @param int    $cylinder Атрибут "Объем баллона" сущности "Логбук".
     * @param string $operator Оператор сравнения при поиске.
     *
     * @return MultiFindOperationInterface
     */
    public function byCylinder(int $cylinder, string $operator = '='): MultiFindOperationInterface;

    /**
     * Задает критерий фильтрации выборки по атрибуту "Количество воздуха в начале погружения" сущности "Логбук".
     *
     * @param int    $startBar Атрибут "Количество воздуха в начале погружения" сущности "Логбук".
     * @param string $operator Оператор сравнения при поиске.
     *
     * @return MultiFindOperationInterface
     */
    public function byStartBar(int $startBar, string $operator = '='): MultiFindOperationInterface;

    /**
     * Задает критерий фильтрации выборки по атрибуту "Количество воздуха в конце погружения" сущности "Логбук".
     *
     * @param int    $endBar   Атрибут "Количество воздуха в конце погружения" сущности "Логбук".
     * @param string $operator Оператор сравнения при поиске.
     *
     * @return MultiFindOperationInterface
     */
    public function byEndBar(int $endBar, string $operator = '='): MultiFindOperationInterface;

    /**
     * Задает критерий фильтрации выборки по атрибуту "Комментарий" сущности "Логбук".
     *
     * @param string $comment  Атрибут "Комментарий" сущности "Логбук".
     * @param string $operator Оператор сравнения при поиске.
     *
     * @return MultiFindOperationInterface
     */
    public function byComment(string $comment, string $operator = '='): MultiFindOperationInterface;

    /**
     * Метод возвращает все сущности по заданному фильтру.
     *
     * @return OperationListResultInterface
     */
    public function doOperation(): OperationListResultInterface;

    /**
     * Метод устанавливает лимит получаемых сущностей.
     *
     * @param int $limit Количество необходимых сущностей.
     *
     * @return MultiFindOperationInterface
     */
    public function limit(int $limit): MultiFindOperationInterface;

    /**
     * Метод устанавливает смещение получаемых сущностей.
     *
     * @param int $offset Смещение в списке необходимых сущностей.
     *
     * @return MultiFindOperationInterface
     */
    public function offset(int $offset): MultiFindOperationInterface;

    /**
     * Устанавливает сортировку результатов запроса по полю "id".
     *
     * @param string $sortType Тип сортировки - ASC или DESC.
     *
     * @return MultiFindOperationInterface
     */
    public function sortById(string $sortType = 'ASC'): MultiFindOperationInterface;
}