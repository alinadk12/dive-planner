<?php

declare(strict_types = 1);

namespace app\forms\abstracts;

use app\interfaces\abstracts\forms\DeleteFormInterface;

/**
 * Абстрактной класс формы для просмотра редактирования одной DTO.
 */
abstract class AbstractDeleteForm extends AbstractQueryParamsForm implements DeleteFormInterface
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