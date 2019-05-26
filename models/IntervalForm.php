<?php

namespace app\models;

use Yii;
use yii\base\Model;

/**
 * ContactForm is the model behind the contact form.
 */
class IntervalForm extends Model
{
    public $firstDiveTime;
    public $firstDiveDepth;
    public $secondDiveTime;
    public $secondDiveDepth;

    public $firstMaxPG;
    public $secondMaxPG;
    public $minInterval;

    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            [
                [
                    'firstDiveTime',
                    'firstDiveDepth',
                    'secondDiveTime',
                    'secondDiveDepth',
                ],
                'required',
            ],
            [
                [
                    'firstDiveTime',
                    'firstDiveDepth',
                    'secondDiveTime',
                    'secondDiveDepth',
                    'minInterval',
                ],
                'integer',
            ],
            [
                [
                    'firstMaxPG',
                    'secondMaxPG',
                ],
                'string',
            ],
        ];
    }

    /**
     * @return array customized attribute labels
     */
    public function attributeLabels()
    {
        return [
            'firstDiveTime' => 'Введите глубину первого погружения (м)',
            'firstDiveDepth' => 'Введите время первого погружения (мин)',
            'secondDiveTime' => 'Введите глубину второго погружения (м)',
            'secondDiveDepth' => 'Введите время второго погружения (мин)',
            'firstMaxPG' => 'PG после первого погружения',
            'secondMaxPG' => 'Max PG перед вторым погружением',
            'minInterval' => 'Минимальное время на поверхности (мин)',
        ];
    }
}
