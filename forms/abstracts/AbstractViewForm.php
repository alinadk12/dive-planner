<?php

declare(strict_types = 1);

namespace app\forms\abstracts;

use app\interfaces\abstracts\forms\ViewFormInterface;

/**
 * Абстрактной класс формы для просмотра данных одной DTO в админке.
 */
abstract class AbstractViewForm extends AbstractQueryParamsForm implements ViewFormInterface
{
    /**
     * Метод возвращает объект ДТО для работы с формой.
     *
     * @return null
     */
    public function getPrototype()
    {
        return null;
    }
}