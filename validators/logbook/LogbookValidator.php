<?php

declare(strict_types = 1);

namespace app\validators\logbook;

use app\interfaces\logbook\dto\LogbookInterface;
use app\validators\BaseDTOValidator;

/**
 * Валидатор атрибутов DTO сущности "Логбук".
 *
 * @property int    $id   Идентификатор.
 * @property string $location Место погружения.
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
//[
//    ['location'],
//    'string',
//    'max' => 255,
//],
//[
//    [
//        'date',
//        'location',
//        'depth',
//        'cylinder',
//        'startBar',
//        'endBar',
//    ],
//    'required',
//],
//[
//    [
//        'depth',
//        'visibility',
//        'tempAir',
//        'tempSurface',
//        'tempBottom',
//        'cylinder',
//        'startBar',
//        'endBar',
//    ],
//    'integer',
//    'min' => - 2147483648,
//    'max' => 2147483647,
//],
//[
//    ['date'],
//    'datetime',
//    'format' => 'php:d.m.Y',
//],
//[
//    [
//        'timeIn',
//        'timeOut',
//    ],
//    'datetime',
//    'format' => 'php:H:i',
//],
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
