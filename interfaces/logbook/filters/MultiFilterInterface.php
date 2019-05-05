<?php

declare(strict_types = 1);

namespace app\interfaces\logbook\filters;

/**
 * Интерфейс объявляет фильтр форму для сущности "Логбук".
 */
interface MultiFilterInterface extends BaseFilterInterface
{
    /**
     * Метод применяет фильтр к операции над несколькими сущностями.
     *
     * @param MultiFilterOperationInterface $operation Обект реализующий методы фильтров операции.
     *
     * @return MultiFilterOperationInterface
     */
    public function applyFilter(MultiFilterOperationInterface $operation): MultiFilterOperationInterface;

    /**
     * Метод возвращает лимит выводимых записей.
     *
     * @return int
     */
    public function getLimit();

    /**
     * Метод возвращает номер записи, с которой нуобходимо сделать выборку.
     *
     * @return int
     */
    public function getOffset();

    /**
     * Метод задает лимит выводимых записей.
     *
     * @param int $value Новое значение.
     *
     * @return MultiFilterInterface
     */
    public function setLimit(int $value): MultiFilterInterface;

    /**
     * Метод задает номер записи, с которой нуобходимо сделать выборку.
     *
     * @param int $value Новое значение.
     *
     * @return MultiFilterInterface
     */
    public function setOffset(int $value): MultiFilterInterface;

    /**
     * Метод устанавливает атрибут "Идентификатор пользователя" сущности "Логбук".
     *
     * @param int $value Новое значение.
     *
     * @return MultiFilterInterface
     */
    public function setUserId(int $value): MultiFilterInterface;

    /**
     * Метод устанавливает атрибут "Дата погружения" сущности "Логбук".
     *
     * @param string $value Новое значение.
     *
     * @return MultiFilterInterface
     */
    public function setDate(string  $value): MultiFilterInterface;

    /**
     * Метод устанавливает атрибут "Место погружения" сущности "Логбук".
     *
     * @param string $value Новое значение.
     *
     * @return MultiFilterInterface
     */
    public function setLocation(string $value): MultiFilterInterface;

    /**
     * Метод устанавливает атрибут "Глубина" сущности "Логбук".
     *
     * @param int $value Новое значение.
     *
     * @return MultiFilterInterface
     */
    public function setDepth(int $value): MultiFilterInterface;

    /**
     * Метод устанавливает атрибут "Видимость" сущности "Логбук".
     *
     * @param int $value Новое значение.
     *
     * @return MultiFilterInterface
     */
    public function setVisibility(int $value): MultiFilterInterface;

    /**
     * Метод устанавливает атрибут "Температура воздуха" сущности "Логбук".
     *
     * @param int $value Новое значение.
     *
     * @return MultiFilterInterface
     */
    public function setTempAir(int $value): MultiFilterInterface;

    /**
     * Метод устанавливает атрибут "Температура воды на поверхности" сущности "Логбук".
     *
     * @param int $value Новое значение.
     *
     * @return MultiFilterInterface
     */
    public function setTempSurface(int $value): MultiFilterInterface;

    /**
     * Метод устанавливает атрибут "Температура воды на дне" сущности "Логбук".
     *
     * @param int $value Новое значение.
     *
     * @return MultiFilterInterface
     */
    public function setTempBottom(int $value): MultiFilterInterface;

    /**
     * Метод устанавливает атрибут "Время начала погружения" сущности "Логбук".
     *
     * @param string $value Новое значение.
     *
     * @return MultiFilterInterface
     */
    public function setTimeIn(string  $value): MultiFilterInterface;

    /**
     * Метод устанавливает атрибут "Время окончания погружения" сущности "Логбук".
     *
     * @param string $value Новое значение.
     *
     * @return MultiFilterInterface
     */
    public function setTimeOut(string  $value): MultiFilterInterface;

    /**
     * Метод устанавливает атрибут "Объем баллона" сущности "Логбук".
     *
     * @param int $value Новое значение.
     *
     * @return MultiFilterInterface
     */
    public function setCylinder(int $value): MultiFilterInterface;

    /**
     * Метод устанавливает атрибут "Количество воздуха в начале погружения" сущности "Логбук".
     *
     * @param int $value Новое значение.
     *
     * @return MultiFilterInterface
     */
    public function setStartBar(int $value): MultiFilterInterface;

    /**
     * Метод устанавливает атрибут "Количество воздуха в конце погружения" сущности "Логбук".
     *
     * @param int $value Новое значение.
     *
     * @return MultiFilterInterface
     */
    public function setEndBar(int $value): MultiFilterInterface;

    /**
     * Метод устанавливает атрибут "Комментарий" сущности "Логбук".
     *
     * @param string $value Новое значение.
     *
     * @return MultiFilterInterface
     */
    public function setComment(string $value): MultiFilterInterface;
}
