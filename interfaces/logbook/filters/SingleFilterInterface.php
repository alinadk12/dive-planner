<?php

declare(strict_types = 1);

namespace app\interfaces\logbook\filters;

/**
 * Интерфейс объявляет фильтр форму для сущности "Логбук".
 */
interface SingleFilterInterface extends BaseFilterInterface
{
    /**
     * Метод применяет фильтр к операции над одной сущности.
     *
     * @param SingleFilterOperationInterface $operation Обект реализующий методы фильтров операции.
     *
     * @return SingleFilterOperationInterface
     */
    public function applyFilter(SingleFilterOperationInterface $operation): SingleFilterOperationInterface;

    /**
     * Метод устанавливает атрибут "Идентификатор пользователя" сущности "Логбук".
     *
     * @param int $value Новое значение.
     *
     * @return SingleFilterInterface
     */
    public function setUserId(int $value): SingleFilterInterface;

    /**
     * Метод устанавливает атрибут "Дата погружения" сущности "Логбук".
     *
     * @param string $value Новое значение.
     *
     * @return SingleFilterInterface
     */
    public function setDate(string $value): SingleFilterInterface;

    /**
     * Метод устанавливает атрибут "Место погружения" сущности "Логбук".
     *
     * @param string $value Новое значение.
     *
     * @return SingleFilterInterface
     */
    public function setLocation(string $value): SingleFilterInterface;

    /**
     * Метод устанавливает атрибут "Глубина" сущности "Логбук".
     *
     * @param int $value Новое значение.
     *
     * @return SingleFilterInterface
     */
    public function setDepth(int $value): SingleFilterInterface;

    /**
     * Метод устанавливает атрибут "Видимость" сущности "Логбук".
     *
     * @param int $value Новое значение.
     *
     * @return SingleFilterInterface
     */
    public function setVisibility(int $value): SingleFilterInterface;

    /**
     * Метод устанавливает атрибут "Температура воздуха" сущности "Логбук".
     *
     * @param int $value Новое значение.
     *
     * @return SingleFilterInterface
     */
    public function setTempAir(int $value): SingleFilterInterface;

    /**
     * Метод устанавливает атрибут "Температура воды на поверхности" сущности "Логбук".
     *
     * @param int $value Новое значение.
     *
     * @return SingleFilterInterface
     */
    public function setTempSurface(int $value): SingleFilterInterface;

    /**
     * Метод устанавливает атрибут "Температура воды на дне" сущности "Логбук".
     *
     * @param int $value Новое значение.
     *
     * @return SingleFilterInterface
     */
    public function setTempBottom(int $value): SingleFilterInterface;

    /**
     * Метод устанавливает атрибут "Время начала погружения" сущности "Логбук".
     *
     * @param string $value Новое значение.
     *
     * @return SingleFilterInterface
     */
    public function setTimeIn(string $value): SingleFilterInterface;

    /**
     * Метод устанавливает атрибут "Время окончания погружения" сущности "Логбук".
     *
     * @param string $value Новое значение.
     *
     * @return SingleFilterInterface
     */
    public function setTimeOut(string $value): SingleFilterInterface;

    /**
     * Метод устанавливает атрибут "Объем баллона" сущности "Логбук".
     *
     * @param int $value Новое значение.
     *
     * @return SingleFilterInterface
     */
    public function setCylinder(int $value): SingleFilterInterface;

    /**
     * Метод устанавливает атрибут "Количество воздуха в начале погружения" сущности "Логбук".
     *
     * @param int $value Новое значение.
     *
     * @return SingleFilterInterface
     */
    public function setStartBar(int $value): SingleFilterInterface;

    /**
     * Метод устанавливает атрибут "Количество воздуха в конце погружения" сущности "Логбук".
     *
     * @param int $value Новое значение.
     *
     * @return SingleFilterInterface
     */
    public function setEndBar(int $value): SingleFilterInterface;

    /**
     * Метод устанавливает атрибут "Комментарий" сущности "Логбук".
     *
     * @param string $value Новое значение.
     *
     * @return SingleFilterInterface
     */
    public function setComment(string $value): SingleFilterInterface;
}
