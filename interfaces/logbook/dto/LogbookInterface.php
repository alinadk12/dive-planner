<?php

declare(strict_types = 1);

namespace app\interfaces\logbook\dto;

use app\interfaces\abstracts\DataTransferObjectInterface;
use app\interfaces\abstracts\ObjectWithErrorsInterface;
use app\interfaces\abstracts\PrototypeInterface;
use app\interfaces\errors\WithErrorsInterface;

/**
 * Интерфейс для объекта DTO сущности "Логбук".
 */
interface LogbookInterface extends ObjectWithErrorsInterface, PrototypeInterface, WithErrorsInterface, DataTransferObjectInterface
{
    /**
     * Метод завершает инициализацию ДТО.
     * Данный метод может вызываться например операциями поиска после загрузки данных в ДТО.
     *
     * @param bool $force Выполнять ли операцию повторно.
     *
     * @return void
     */
    public function completeInitialization(bool $force = false): void;

    /**
     * Метод возвращает атрибут "Идентификатор" сущности "Логбук".
     *
     * @return int|null
     */
    public function getId(): ?int;

    /**
     * Метод возвращает атрибут "Идентификатор пользователя" сущности "Логбук".
     *
     * @return int
     */
    public function getUserId(): int;

    /**
     * Метод возвращает атрибут "Дата погружения" сущности "Логбук".
     *
     * @return string
     */
    public function getDate(): string;

    /**
     * Метод возвращает атрибут "Место погружения" сущности "Логбук".
     *
     * @return string
     */
    public function getLocation(): string;

    /**
     * Метод возвращает атрибут "Глубина" сущности "Логбук".
     *
     * @return int
     */
    public function getDepth(): int;

    /**
     * Метод возвращает атрибут "Видимость" сущности "Логбук".
     *
     * @return int|null
     */
    public function getVisibility(): ?int;

    /**
     * Метод возвращает атрибут "Температура воздуха" сущности "Логбук".
     *
     * @return int|null
     */
    public function getTempAir(): ?int;

    /**
     * Метод возвращает атрибут "Температура воды на поверхности" сущности "Логбук".
     *
     * @return int|null
     */
    public function getTempSurface(): ?int;

    /**
     * Метод возвращает атрибут "Температура воды на дне" сущности "Логбук".
     *
     * @return int|null
     */
    public function getTempBottom(): ?int;

    /**
     * Метод возвращает атрибут "Время начала погружения" сущности "Логбук".
     *
     * @return string
     */
    public function getTimeIn(): string;

    /**
     * Метод возвращает атрибут "Время окончания погружения" сущности "Логбук".
     *
     * @return string
     */
    public function getTimeOut(): string;

    /**
     * Метод возвращает атрибут "Объем баллона" сущности "Логбук".
     *
     * @return int
     */
    public function getCylinder(): int;

    /**
     * Метод возвращает атрибут "Количество воздуха в начале погружения" сущности "Логбук".
     *
     * @return int
     */
    public function getStartBar(): int;

    /**
     * Метод возвращает атрибут "Количество воздуха в конце погружения" сущности "Логбук".
     *
     * @return int
     */
    public function getEndBar(): int;

    /**
     * Метод возвращает атрибут "Комментарий" сущности "Логбук".
     *
     * @return string|null
     */
    public function getComment(): ?string ;

    /**
     * Метод устанавливает атрибут "Идентификатор" сущности "Логбук".
     *
     * @param int $value Новое значение.
     *
     * @return LogbookInterface
     */
    public function setId(int $value): LogbookInterface;

    /**
     * Метод устанавливает атрибут "Идентификатор пользователя" сущности "Логбук".
     *
     * @param int $value Новое значение.
     *
     * @return LogbookInterface
     */
    public function setUserId(int $value): LogbookInterface;

    /**
     * Метод устанавливает атрибут "Дата погружения" сущности "Логбук".
     *
     * @param string $value Новое значение.
     *
     * @return LogbookInterface
     */
    public function setDate(string  $value): LogbookInterface;

    /**
     * Метод устанавливает атрибут "Место погружения" сущности "Логбук".
     *
     * @param string $value Новое значение.
     *
     * @return LogbookInterface
     */
    public function setLocation(string $value): LogbookInterface;

    /**
     * Метод устанавливает атрибут "Глубина" сущности "Логбук".
     *
     * @param int $value Новое значение.
     *
     * @return LogbookInterface
     */
    public function setDepth(int $value): LogbookInterface;

    /**
     * Метод устанавливает атрибут "Видимость" сущности "Логбук".
     *
     * @param int $value Новое значение.
     *
     * @return LogbookInterface
     */
    public function setVisibility(int $value): LogbookInterface;

    /**
     * Метод устанавливает атрибут "Температура воздуха" сущности "Логбук".
     *
     * @param int $value Новое значение.
     *
     * @return LogbookInterface
     */
    public function setTempAir(int $value): LogbookInterface;

    /**
     * Метод устанавливает атрибут "Температура воды на поверхности" сущности "Логбук".
     *
     * @param int $value Новое значение.
     *
     * @return LogbookInterface
     */
    public function setTempSurface(int $value): LogbookInterface;

    /**
     * Метод устанавливает атрибут "Температура воды на дне" сущности "Логбук".
     *
     * @param int $value Новое значение.
     *
     * @return LogbookInterface
     */
    public function setTempBottom(int $value): LogbookInterface;

    /**
     * Метод устанавливает атрибут "Время начала погружения" сущности "Логбук".
     *
     * @param string $value Новое значение.
     *
     * @return LogbookInterface
     */
    public function setTimeIn(string  $value): LogbookInterface;

    /**
     * Метод устанавливает атрибут "Время окончания погружения" сущности "Логбук".
     *
     * @param string $value Новое значение.
     *
     * @return LogbookInterface
     */
    public function setTimeOut(string  $value): LogbookInterface;

    /**
     * Метод устанавливает атрибут "Объем баллона" сущности "Логбук".
     *
     * @param int $value Новое значение.
     *
     * @return LogbookInterface
     */
    public function setCylinder(int $value): LogbookInterface;

    /**
     * Метод устанавливает атрибут "Количество воздуха в начале погружения" сущности "Логбук".
     *
     * @param int $value Новое значение.
     *
     * @return LogbookInterface
     */
    public function setStartBar(int $value): LogbookInterface;

    /**
     * Метод устанавливает атрибут "Количество воздуха в конце погружения" сущности "Логбук".
     *
     * @param int $value Новое значение.
     *
     * @return LogbookInterface
     */
    public function setEndBar(int $value): LogbookInterface;

    /**
     * Метод устанавливает атрибут "Комментарий" сущности "Логбук".
     *
     * @param string $value Новое значение.
     *
     * @return LogbookInterface
     */
    public function setComment(string $value): LogbookInterface;
}
