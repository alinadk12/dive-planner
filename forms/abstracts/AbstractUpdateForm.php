<?php

declare(strict_types = 1);

namespace app\forms\abstracts;

use app\interfaces\abstracts\forms\UpdateFormInterface;
use yii\base\InvalidConfigException;

/**
 * Абстрактной класс формы для просмотра редактирования одной DTO.
 */
abstract class AbstractUpdateForm extends AbstractQueryParamsForm implements UpdateFormInterface
{
    /**
     * Переопределенный метод загрузки данных в форму.
     *
     * @param array|null  $data     Входные данные.
     * @param string|null $formName Название формы.
     *
     * @return boolean
     *
     * @inherit
     *
     * @throws InvalidConfigException Если компонент не зарегистрирован.
     */
    public function load($data, $formName = null): bool
    {
        parent::load($data, '');

        $hydrator  = $this->getHydrator();
        $prototype = $this->getPrototype();
        $prototype = $hydrator->hydrate($data, $prototype);
        $this->setPrototype($prototype);

        return true;
    }
}