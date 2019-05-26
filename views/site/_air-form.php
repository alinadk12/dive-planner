<?php

/* @var $this yii\web\View */

use yii\bootstrap\ActiveForm;
use yii\helpers\Html;

?>

<div>

    <?php $form = ActiveForm::begin(['id' => 'air-form']); ?>

    <div class="row">
        <div class="col-sm-6">
            <?= $form->field($model, 'airConsumption')->textInput(['type' => 'number']) ?>
        </div>

        <div class="col-sm-6">
            <?= $form->field($model, 'airСylinderSize')->dropDownList([
                '0' => '10 л',
                '1' => '12 л',
                '2' => '15 л',
                '3' => '2 x 10 л',
            ]); ?>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-6">
            <?= $form->field($model, 'dive[0][time]')->textInput([
                'type' => 'number',
            ])->label('Глубина первого погружения (м)') ?>
        </div>

        <div class="col-sm-6">
            <?= $form->field($model, 'dive[0][depth]')->textInput([
                'type' => 'number',
            ])->label('Время первого погружения (мин)') ?>
        </div>
    </div>

    <center>
        <button type="button" class="btn btn-success" data-toggle="collapse" data-target="#air-2">+</button>
    </center>

    <br>

    <div id="air-2" class="collapse">
        <div class="row">
            <div class="col-sm-6">
                <?= $form->field($model, 'dive[1][time]')->textInput([
                    'type' => 'number',
                ])->label('Глубина второго погружения (м)') ?>
            </div>

            <div class="col-sm-6">
                <?= $form->field($model, 'dive[1][depth]')->textInput([
                    'type' => 'number',
                ])->label('Время второго погружения (мин)') ?>
            </div>
        </div>

        <center>
            <button type="button" class="btn btn-success" data-toggle="collapse" data-target="#air-3">+</button>
        </center>

        <br>

        <div id="air-3" class="collapse">
            <div class="row">
                <div class="col-sm-6">
                    <?= $form->field($model, 'dive[2][time]')->textInput([
                        'type' => 'number',
                    ])->label('Глубина третьего погружения (м)') ?>
                </div>

                <div class="col-sm-6">
                    <?= $form->field($model, 'dive[2][depth]')->textInput([
                        'type' => 'number',
                    ])->label('Время третьего погружения (мин)') ?>
                </div>
            </div>

            <center>
                <button type="button" class="btn btn-success" data-toggle="collapse" data-target="#air-4">+</button>
            </center>

            <br>

            <div id="air-4" class="collapse">
                <div class="row">
                    <div class="col-sm-6">
                        <?= $form->field($model, 'dive[3][time]')->textInput([
                            'type' => 'number',
                        ])->label('Глубина четвертого погружения (м)') ?>
                    </div>

                    <div class="col-sm-6">
                        <?= $form->field($model, 'dive[3][depth]')->textInput([
                            'type' => 'number',
                        ])->label('Время четвертого погружения (мин)') ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?= $form->field($model, 'airСylinderPressure')->textInput([
        'disabled' => true,
        'type'     => 'number',
    ]) ?>

    <div class="form-group">
        <center>
            <?= Html::submitButton('Вычислить', [
                'class' => 'btn btn-primary',
                'name'  => 'contact-button',
            ]) ?>
        </center>
    </div>

    <?php ActiveForm::end(); ?>

</div>