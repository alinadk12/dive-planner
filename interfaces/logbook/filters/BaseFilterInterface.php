<?php

declare(strict_types = 1);

namespace app\interfaces\logbook\filters;

use app\interfaces\abstracts\AbstractFilterInterface;

/**
 * Интерфейс объявляет методы фильтра данных.
 */
interface BaseFilterInterface extends AbstractFilterInterface
{
    /**
     * Метод возвращает атрибут "Идентификатор пользователя" сущности "Логбук".
     *
     * @return int
     */
    public function getUserId();

    /**
     * Метод возвращает атрибут "Дата погружения" сущности "Логбук".
     *
     * @return string
     */
    public function getDate();

    /**
     * Метод возвращает атрибут "Место погружения" сущности "Логбук".
     *
     * @return string
     */
    public function getLocation();

    /**
     * Метод возвращает атрибут "Глубина" сущности "Логбук".
     *
     * @return int
     */
    public function getDepth();

    /**
     * Метод возвращает атрибут "Видимость" сущности "Логбук".
     *
     * @return int|null
     */
    public function getVisibility();

    /**
     * Метод возвращает атрибут "Температура воздуха" сущности "Логбук".
     *
     * @return int|null
     */
    public function getTempAir();

    /**
     * Метод возвращает атрибут "Температура воды на поверхности" сущности "Логбук".
     *
     * @return int|null
     */
    public function getTempSurface();

    /**
     * Метод возвращает атрибут "Температура воды на дне" сущности "Логбук".
     *
     * @return int|null
     */
    public function getTempBottom();

    /**
     * Метод возвращает атрибут "Время начала погружения" сущности "Логбук".
     *
     * @return string
     */
    public function getTimeIn();

    /**
     * Метод возвращает атрибут "Время окончания погружения" сущности "Логбук".
     *
     * @return string
     */
    public function getTimeOut();

    /**
     * Метод возвращает атрибут "Объем баллона" сущности "Логбук".
     *
     * @return int
     */
    public function getCylinder();

    /**
     * Метод возвращает атрибут "Количество воздуха в начале погружения" сущности "Логбук".
     *
     * @return int
     */
    public function getStartBar();

    /**
     * Метод возвращает атрибут "Количество воздуха в конце погружения" сущности "Логбук".
     *
     * @return int
     */
    public function getEndBar();

    /**
     * Метод возвращает атрибут "Комментарий" сущности "Логбук".
     *
     * @return string|null
     */
    public function getComment();
}