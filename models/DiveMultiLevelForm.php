<?php

namespace app\models;

use Yii;
use yii\base\Model;

/**
 * ContactForm is the model behind the contact form.
 */
class DiveMultiLevelForm extends Model
{
    public $dive;
    public $isColdWater;
    public $isExtremeEnvironments;

    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            [
                [
                    'isColdWater',
                    'isExtremeEnvironments',
                ],
                'boolean',
            ],
        ];
    }
}
