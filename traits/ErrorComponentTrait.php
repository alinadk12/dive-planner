<?php

declare(strict_types = 1);

namespace app\traits;

use yii;
use yii\base\InvalidConfigException;
use app\interfaces\errors\ComponentInterface;

/**
 * Трейт для работы с компонентом подсистемы ошибок.
 */
trait ErrorComponentTrait
{
    /**
     * Компонент подсистемы ошибок.
     *
     * @var ComponentInterface|null
     */
    protected $errorsComponentTrait;

    /**
     * Метод возвращает компонент подсистемы ошибок.
     *
     * @return ComponentInterface
     *
     * @throws InvalidConfigException Исключение генерируется в случае неверной конфигурации подсистемы.
     */
    public function getErrorsComponent(): ComponentInterface
    {
        if (null === $this->errorsComponentTrait) {
            $this->errorsComponentTrait = Yii::$app->get(ComponentInterface::COMPONENT_KEY);
        }
        return $this->errorsComponentTrait;
    }

    /**
     * Метод устанавливает компонент подсистемы ошибок.
     *
     * @param ComponentInterface $component Новое значение.
     *
     * @return static
     */
    public function setErrorsComponent(ComponentInterface $component)
    {
        $this->errorsComponentTrait = $component;
        return $this;
    }
}
