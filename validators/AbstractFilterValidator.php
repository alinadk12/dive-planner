<?php

declare(strict_types = 1);

namespace app\validators;

use app\interfaces\abstracts\AbstractFilterInterface;
use Exception;

/**
 * Валидатор атрибутов DTO сущности "Фильтр для формы".
 */
class AbstractFilterValidator extends BaseDTOValidator
{
    /**
     * Список правил валидации для сущности "Фильтр для формы".
     *
     * @var array
     */
    protected static $ruleList = [];

    /**
     * Данный метод возвращает массив, содержащий правила валидации атрибутов.
     *
     * @return array
     */
    public static function getRules(): array
    {
        return self::$ruleList;
    }

    /**
     * Данный метод возвращает массив, содержащий правила валидации атрибутов.
     *
     * @return array
     */
    public function rules(): array
    {
        return self::$ruleList;
    }

    /**
     * Метод выполняет валидацию ДТО сущности.
     *
     * @param mixed $object Объект для валидации.
     *
     * @throws Exception Исключение генерируется в случае, если передан ДТО неподдерживаемого типа.
     *
     * @return bool
     */
    public function validateObject($object): bool
    {
        if (! $object instanceof AbstractFilterInterface) {
            throw new Exception(get_class($object) . ' must implement ' . AbstractFilterInterface::class);
        }
        return parent::validateObject($object);
    }
}