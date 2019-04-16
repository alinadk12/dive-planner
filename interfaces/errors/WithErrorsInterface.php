<?php

declare(strict_types = 1);

namespace app\interfaces\errors;

/**
 * Интерфейс объекта с коллекцией ошибок.
 */
interface WithErrorsInterface
{
    /**
     * Метод проверяет есть ли ошибки в коллекции ошибок.
     *
     * @return bool
     */
    public function hasUSErrors(): bool;

    /**
     * Метод добавляет глобальную ошибку в коллекцию ошибок.
     *
     * @param string $title            Сообщение ошибки.
     * @param string $code             Код ошибки.
     * @param array  $additionalParams Дополнительные парараметры.
     *
     * @return static
     */
    public function addGlobalUSError(string $title, string $code = '', array $additionalParams = []);

    /**
     * Метод добавляет ошибку в коллекцию ошибок.
     *
     * @param string $title            Сообщение ошибки.
     * @param string $source           Источник ошибки.
     * @param string $code             Код ошибки.
     * @param array  $additionalParams Дополнительные парараметры.
     *
     * @return static
     */
    public function addUSError(string $title, string $source = 'system', string $code = '', array $additionalParams = []);

    /**
     * Метод добавляет ошибки из переданной коллекции ошибок в текущую коллекцию.
     *
     * @param CollectionInterface $errorCollection Коллекция ошибок для добавления.
     *
     * @return static
     */
    public function addUSErrors(CollectionInterface $errorCollection);

    /**
     * Метод возвращает текущую коллекцию ошибок.
     *
     * @return CollectionInterface
     */
    public function getUSErrors(): CollectionInterface;

    /**
     * Метод очищает текущую коллекцию ошибок.
     *
     * @return static
     */
    public function clearUSErrors();

    /**
     * Метод добавляет ошибки в текущую коллекцию ошибок из списка ошибок, переданном в формате, с которым работает модель Yii2.
     *
     * @param array $errorDataList Данные списка ошибок.
     *
     * @return static
     */
    public function addYiiErrors(array $errorDataList);

    /**
     * Метод возвращает текущую коллекцию ошибок в формате, с которым работает модель Yii2.
     *
     * @return array
     */
    public function getYiiErrors(): array;
}
