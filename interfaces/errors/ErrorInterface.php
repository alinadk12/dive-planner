<?php

declare(strict_types = 1);

namespace app\interfaces\errors;

use app\interfaces\abstracts\PrototypeInterface;
use app\interfaces\abstracts\BaseMessageInterface;

/**
 * Класс ErrorInterface.
 * Интерфейс объекта ошибки.
 */
interface ErrorInterface extends BaseMessageInterface, PrototypeInterface
{
    /**
     * Метод возвращает источник сообщения.
     *
     * @return string
     */
    public function getSource(): string;

    /**
     * Метод возвращает код ошикбки.
     *
     * @return string
     */
    public function getCode(): string;

    /**
     * Метод возвращает флаг является ли ошибка глобальной.
     *
     * @return bool
     */
    public function isGlobal(): bool;

    /**
     * Метод устанавливает код ошибки.
     *
     * @param string $code Новое значение.
     *
     * @return static
     */
    public function setCode(string $code);

    /**
     * Метод устанавливает источник ошибки.
     *
     * @param string $source Новое значение.
     *
     * @return static
     */
    public function setSource(string $source);

    /**
     * Метод помечает ошибку как глобальную.
     *
     * @return static
     */
    public function markAsGlobal();
}
