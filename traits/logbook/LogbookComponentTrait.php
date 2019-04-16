<?php

declare(strict_types = 1);

namespace app\traits\logbook;

use app\interfaces\logbook\ComponentInterface;
use yii;
use yii\base\InvalidConfigException;

/**
 * Трейт, содержащий логику доступа к компоненту "Логбук".
 */
trait LogbookComponentTrait
{
    /**
     * Экземпляр объекта компонента "Логбук".
     *
     * @var ComponentInterface|null
     */
    protected $logbookComponent;

    /**
     * Метод возвращает объект компонента "Логбук".
     *
     * @throws InvalidConfigException Если компонент не зарегистрирован.
     *
     * @return ComponentInterface
     */
    public function getLogbookComponent(): ComponentInterface
    {
        if (! $this->logbookComponent) {
            $this->logbookComponent = Yii::$app->get('logbook');
        }
        return $this->logbookComponent;
    }

    /**
     * Метод устанавливает объект компонента "Логбук".
     *
     * @param ComponentInterface $component Новое значение компонента.
     *
     * @return void
     */
    public function setLogbookComponent(ComponentInterface $component): void
    {
        $this->logbookComponent = $component;
    }
}
