<?php

declare(strict_types = 1);

namespace app\interfaces\abstracts;

/**
 * Базовый интерфейс для объекта-результата выполнения операции.
 */
interface BaseOperationResultInterface extends ObjectWithErrorsInterface
{
    /**
     * Мето определяет была ли операция успешно выполнена.
     *
     * @return boolean
     */
    public function isSuccess();
}
