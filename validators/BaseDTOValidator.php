<?php

declare(strict_types = 1);

namespace app\validators;

use yii\base\InvalidConfigException;
use yii\base\Model;
use app\interfaces\abstracts\DTOValidatorInterface;
use yii\base\Object;

/**
 * Базовый валидатор ДТО объекта.
 */
class BaseDTOValidator extends Model implements DTOValidatorInterface
{
    /**
     * ДТО объект для валидации.
     *
     * @var object|null
     */
    protected $object;

    /**
     * Метод получает объект для валидации.
     *
     * @return object
     *
     * @throws InvalidConfigException Исключение генерирует в случае если объект пустой.
     */
    protected function getObject(): object
    {
        if (! $this->object) {
            throw new InvalidConfigException(__METHOD__ . '() Object can not be empyt');
        }
        return $this->object;
    }

    /**
     * Метод устанавливает объект для валидации.
     *
     * @param mixed $object Новое значение.
     *
     * @return DTOValidatorInterface
     */
    public function setObject($object): DTOValidatorInterface
    {
        $this->object = $object;
        return $this;
    }

    /**
     * Конструктор копирования валидатора.
     *
     * @return static
     */
    public function copy()
    {
        return new static();
    }

    /**
     * Метод возвращает правила валидации.
     *
     * @return array
     */
    public function rules(): array
    {
        return [];
    }

    /**
     * Метод выполняет валидацию ДТО объекта.
     *
     * @param mixed $object Объект для валидации.
     *
     * @return boolean
     */
    public function validateObject($object): bool
    {
        $this->setObject($object);
        return $this->validate(null, true);
    }
}
