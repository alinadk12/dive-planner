<?php

namespace app\models;

use Yii;
use yii\base\Model;

/**
 * ContactForm is the model behind the contact form.
 */
class AirForm extends Model
{
    public $airConsumption;
    public $airСylinderSize;
    public $dive;

    public $airСylinderPressure;

    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            [
                [
                    'airConsumption',
                    'airСylinderSize',
                ],
                'required',
            ],
            [
                [
                    'airConsumption',
                    'airСylinderSize',
                    'airСylinderPressure',
                ],
                'integer',
            ],
        ];
    }

    /**
     * @return array customized attribute labels
     */
    public function attributeLabels()
    {
        return [
            'airConsumption' => 'Расход воздуха (л/мин)',
            'airСylinderSize' => 'Объем баллона (л)',
            'airСylinderPressure' => 'Давление воздуха в баллоне (атм)',
        ];
    }
}
