<?php

declare(strict_types = 1);

namespace app\interfaces\abstracts;

/**
 * Интерфейс BaseMessageInterface.
 * Интерфейс объекта сообщения.
 */
interface BaseMessageInterface
{
    /**
     * Метод возвращает тайтл сообщения.
     *
     * @return string
     */
    public function getTitle(): string;

    /**
     * Метод получает дополнительные параметры.
     *
     * @return array
     */
    public function getAdditionalParams(): array;

    /**
     * Метод устанавливает тайтл ошибки.
     *
     * @param string $title Новое значение.
     *
     * @return static
     */
    public function setTitle(string $title);

    /**
     * Метод устанавливает дополнительные параметры.
     *
     * @param array $additionalParams Новое значение.
     *
     * @return static
     */
    public function setAdditionalParams(array $additionalParams);
}
