<?php

declare(strict_types = 1);

namespace app\interfaces\abstracts\forms;

/**
 * Интерфейс для абстрактной REST формы.
 */
interface AbstractQueryParamsFormInterface extends AbstractFormInterface
{
    /**
     * Метод возвращает идентификатор записи.
     *
     * @return integer
     */
    public function getId(): int;
}