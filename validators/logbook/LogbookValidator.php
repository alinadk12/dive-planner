<?php

declare(strict_types = 1);

namespace app\validators\logbook;

use app\interfaces\logbook\dto\LogbookInterface;
use app\validators\BaseDTOValidator;

/**
 * Валидатор атрибутов DTO сущности "Логбук".
 *
 * @property int    $id   Идентификатор.
 * @property string $name Название секции.
 */
class LogbookValidator extends BaseDTOValidator
{
    /**
     * Список правил валидации для сущности "Логбук".
     *
     * @var array
     */
    protected static $ruleList = [
        [
            ['id'],
            'integer',
            'min'         => 1,
            'max'         => 2147483647,
            'skipOnEmpty' => 1,
        ],
        [
            ['name'],
            'string',
            'max' => 255,
        ],
        [
            ['name'],
            'required',
        ],
    ];

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
     * @return bool
     */
    public function validateObject($object): bool
    {
        if (! $object instanceof LogbookInterface) {
            return false;
        }
        return parent::validateObject($object);
    }
}
