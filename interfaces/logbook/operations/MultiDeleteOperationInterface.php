<?php

declare(strict_types = 1);

namespace app\interfaces\logbook\operations;

use app\interfaces\logbook\dto\OperationResultInterface;

/**
 * Интерфейс операции, реализующей логику удаления сущности "Логбук".
 */
interface MultiDeleteOperationInterface
{
    /**
     * Задает критерий фильтрации выборки по атрибуту "Идентификатор" сущности "Логбук".
     *
     * @param int $id Атрибут "Идентификатор" сущности "Логбук".
     *
     * @return MultiDeleteOperationInterface
     */
    public function byId(int $id): MultiDeleteOperationInterface;

    /**
     * Задает критерий фильтрации выборки по атрибуту "Идентификатор пользователя" сущности "Логбук".
     *
     * @param int $userId Атрибут "Идентификатор пользователя" сущности "Логбук".
     *
     * @return MultiDeleteOperationInterface
     */
    public function byUserId(int $userId): MultiDeleteOperationInterface;

    /**
     * Задает критерий фильтрации выборки по атрибуту "Дата погружения" сущности "Логбук".
     *
     * @param string $date Атрибут "Дата погружения" сущности "Логбук".
     *
     * @return MultiDeleteOperationInterface
     */
    public function byDate(string $date): MultiDeleteOperationInterface;

    /**
     * Задает критерий фильтрации выборки по атрибуту "Дата погружения" сущности "Логбук".
     *
     * @param string $location Атрибут "Дата погружения" сущности "Логбук".
     *
     * @return MultiDeleteOperationInterface
     */
    public function byLocation(string $location): MultiDeleteOperationInterface;

    /**
     * Задает критерий фильтрации выборки по атрибуту "Глубина" сущности "Логбук".
     *
     * @param int $depth Атрибут "Глубина" сущности "Логбук".
     *
     * @return MultiDeleteOperationInterface
     */
    public function byDepth(int $depth): MultiDeleteOperationInterface;

    /**
     * Задает критерий фильтрации выборки по атрибуту "Видимость" сущности "Логбук".
     *
     * @param int $visibility Атрибут "Видимость" сущности "Логбук".
     *
     * @return MultiDeleteOperationInterface
     */
    public function byVisibility(int $visibility): MultiDeleteOperationInterface;

    /**
     * Задает критерий фильтрации выборки по атрибуту "Температура воздуха" сущности "Логбук".
     *
     * @param int $tempAir Атрибут "Температура воздуха" сущности "Логбук".
     *
     * @return MultiDeleteOperationInterface
     */
    public function byTempAir(int $tempAir): MultiDeleteOperationInterface;

    /**
     * Задает критерий фильтрации выборки по атрибуту "Температура воды на поверхности" сущности "Логбук".
     *
     * @param int $tempSurface Атрибут "Температура воды на поверхности" сущности "Логбук".
     *
     * @return MultiDeleteOperationInterface
     */
    public function byTempSurface(int $tempSurface): MultiDeleteOperationInterface;

    /**
     * Задает критерий фильтрации выборки по атрибуту "Температура воды на дне" сущности "Логбук".
     *
     * @param int $tempBottom Атрибут "Температура воды на дне" сущности "Логбук".
     *
     * @return MultiDeleteOperationInterface
     */
    public function byTempBottom(int $tempBottom): MultiDeleteOperationInterface;

    /**
     * Задает критерий фильтрации выборки по атрибуту "Время начала погружения" сущности "Логбук".
     *
     * @param string $timeIn Атрибут "Время начала погружения" сущности "Логбук".
     *
     * @return MultiDeleteOperationInterface
     */
    public function byTimeIn(string $timeIn): MultiDeleteOperationInterface;

    /**
     * Задает критерий фильтрации выборки по атрибуту "Время окончания погружения" сущности "Логбук".
     *
     * @param string $timeOut Атрибут "Время окончания погружения" сущности "Логбук".
     *
     * @return MultiDeleteOperationInterface
     */
    public function byTimeOut(string $timeOut): MultiDeleteOperationInterface;

    /**
     * Задает критерий фильтрации выборки по атрибуту "Объем баллона" сущности "Логбук".
     *
     * @param int $cylinder Атрибут "Объем баллона" сущности "Логбук".
     *
     * @return MultiDeleteOperationInterface
     */
    public function byCylinder(int $cylinder): MultiDeleteOperationInterface;

    /**
     * Задает критерий фильтрации выборки по атрибуту "Количество воздуха в начале погружения" сущности "Логбук".
     *
     * @param int $startBar Атрибут "Количество воздуха в начале погружения" сущности "Логбук".
     *
     * @return MultiDeleteOperationInterface
     */
    public function byStartBar(int $startBar): MultiDeleteOperationInterface;

    /**
     * Задает критерий фильтрации выборки по атрибуту "Количество воздуха в конце погружения" сущности "Логбук".
     *
     * @param int $endBar Атрибут "Количество воздуха в конце погружения" сущности "Логбук".
     *
     * @return MultiDeleteOperationInterface
     */
    public function byEndBar(int $endBar): MultiDeleteOperationInterface;

    /**
     * Задает критерий фильтрации выборки по атрибуту "Комментарий" сущности "Логбук".
     *
     * @param string $comment Атрибут "Комментарий" сущности "Логбук".
     *
     * @return MultiDeleteOperationInterface
     */
    public function byComment(string $comment): MultiDeleteOperationInterface;

    /**
     * Метод выполняет операцию.
     *
     * @return OperationResultInterface
     */
    public function doOperation(): OperationResultInterface;

    /**
     * Метод возвращает объект-результат ответа команды.
     *
     * @return OperationResultInterface
     */
    public function getResultPrototype(): OperationResultInterface;

    /**
     * Метод устанавливает объект прототипа ответа команды.
     *
     * @param OperationResultInterface $value Новое значение.
     *
     * @return MultiDeleteOperationInterface
     */
    public function setResultPrototype(OperationResultInterface $value): MultiDeleteOperationInterface;
}
