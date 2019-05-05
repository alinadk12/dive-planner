<?php

declare(strict_types = 1);

namespace app\forms\abstracts;

use app\interfaces\abstracts\forms\CreateFormInterface;
use yii\base\InvalidConfigException;

/**
 * Абстрактной класс формы для просмотра редактирования одной DTO.
 */
abstract class AbstractCreateForm extends AbstractForm implements CreateFormInterface
{
    /**
     * Переопределенный метод загрузки формы.
     *
     * @param array|null  $data     Данные для загрузки.
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
        $hydrator  = $this->getHydrator();
        $prototype = $this->getPrototype();
        $prototype = $hydrator->hydrate($data, $prototype);

        $this->setPrototype($prototype);
        return true;
    }
}