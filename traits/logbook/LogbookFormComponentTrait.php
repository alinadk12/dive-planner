<?php

declare(strict_types = 1);

namespace app\traits\logbook;

use app\interfaces\logbook\FormComponentInterface;
use yii;
use yii\base\InvalidConfigException;

/**
 * Трейт, содержащий логику доступа к компоненту форм "Логбук".
 */
trait LogbookFormComponentTrait
{
    /**
     * Экземпляр объекта компонента форм "Логбук".
     *
     * @var FormComponentInterface|null
     */
    protected $logbookFormComponent;

    /**
     * Метод возвращает объект компонента форм "Логбук".
     *
     * @throws InvalidConfigException Если компонент не зарегистрирован.
     *
     * @return FormComponentInterface
     */
    public function getLogbookFormComponent(): FormComponentInterface
    {
        if (! $this->logbookFormComponent) {
            $this->logbookFormComponent = Yii::$app->get('logbookForm');
        }
        return $this->logbookFormComponent;
    }

    /**
     * Метод устанавливает объект компонента "Логбук".
     *
     * @param FormComponentInterface $component Новое значение компонента.
     *
     * @return void
     */
    public function setLogbookFormComponent(FormComponentInterface $component): void
    {
        $this->logbookFormComponent = $component;
    }
}