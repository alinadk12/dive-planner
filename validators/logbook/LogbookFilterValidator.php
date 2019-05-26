<?php

declare(strict_types = 1);

namespace app\validators\logbook;

use app\validators\AbstractFilterValidator;
use yii\helpers\ArrayHelper;

/**
 * Валидатор атрибутов DTO сущности "Логбук".
 *
 * @property int    $id   Идентификатор.
 * @property string $name Название секции.
 */
class LogbookFilterValidator extends AbstractFilterValidator
{
    /**
     * Список правил валидации для сущности "Логбук".
     *
     * @var array
     */
    protected static $ruleList = [
//        [
//            ['id'],
//            'integer',
//            'min'         => 1,
//            'max'         => 2147483647,
//        ],
//        [
//            ['name'],
//            'string',
//            'max' => 255,
//        ],
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
        return ArrayHelper::merge(parent::rules(), self::$ruleList);
    }
}
