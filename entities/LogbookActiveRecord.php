<?php

declare(strict_types = 1);

namespace app\entities;

use yii\db\ActiveRecord;
use app\validators\logbook\LogbookValidator;

/**
 * Модель данных сущности "Логбук".
 *
 * @property int    $id   Идентификатор.
 * @property string $name Название секции.
 */
class LogbookActiveRecord extends ActiveRecord
{
    /**
     * Данный метод возвращает имя связанной с моделью таблицы.
     *
     * @return string
     */
    public static function tableName(): string
    {
        return 'logbook';
    }

    /**
     * Переопределенный метод возвращает список атрибутов..
     * Нужен для для корректной работы метода getAttributes.
     *
     * @return array
     */
    public function attributes(): array
    {
        return $this->scenarios()[$this->getScenario()];
    }

    /**
     * Возвращает список атрибутов AR, входящих в дефолтнй сценарий.
     *
     * @return array
     */
    public static function getDefaultScenarioFields(): array
    {
        return [
            'id',
            'name',
        ];
    }

    /**
     * Переопределенный метод возвращает список сценариев с активными атрибутами.
     * Нужен для корректной работы метода load.
     *
     * @return array
     */
    public function scenarios(): array
    {
        return [
            self::SCENARIO_DEFAULT => static::getDefaultScenarioFields(),
        ];
    }

    /**
     * Данный метод возвращает массив, содержащий правила валидации атрибутов.
     *
     * @return array
     */
    public function rules(): array
    {
        return LogbookValidator::getRules();
    }

    /**
     * Возвращает подписи для атрибутов модели.
     *
     * @return array
     */
    public function attributeLabels(): array
    {
        return static::labels();
    }

    /**
     * Метод возвращает подписи для атрибутов модели.
     *
     * @return array
     */
    public static function labels(): array
    {
        return [
            'id'          => 'Идентификатор',
            'userId'      => 'Идентификатор пользователя',
            'date'        => 'Дата погружения',
            'location'    => 'Место погружения',
            'depth'       => 'Глубина',
            'visibility'  => 'Видимость',
            'tempAir'     => 'Температура воздуха',
            'tempSurface' => 'Температура воды на поверхности',
            'tempBottom'  => 'Температура воды на дне',
            'timeIn'      => 'Время начала погружения',
            'timeOut'     => 'Время окончания погружения',
            'cylinder'    => 'Объем баллона',
            'startBar'    => 'Количество воздуха в начале погружения',
            'endBar'      => 'Количество воздуха в конце погружения',
            'comment'     => 'Комментарии',
        ];
    }
}
