<?php

declare(strict_types = 1);

namespace app\interfaces\abstracts;

/**
 * Интерфейс валидатора ДТО объекта.
 */
interface DTOValidatorInterface extends ObjectWithErrorsInterface, PrototypeInterface
{
    /**
     * Метод выполняет валидацию ДТО объекта.
     *
     * @param mixed $object ДТО объект для валидации.
     *
     * @return boolean
     */
    public function validateObject($object): bool;
}
