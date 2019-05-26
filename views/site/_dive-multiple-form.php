<?php

/* @var $this yii\web\View */

use yii\bootstrap\ActiveForm;
use yii\helpers\Html;

?>

<div>

    <?php $form = ActiveForm::begin([
        'id' => 'dive-multilevel-form',
        'validateOnBlur' => false,
        'validateOnChange' => false,
    ]); ?>

    <div class="row">
        <div class="col-sm-4">
            <?= $form->field($model, 'dive[0][time]')->textInput([
                'type' => 'number',
            ])->label('Глубина первого погружения (м)') ?>
        </div>

        <div class="col-sm-4">
            <?= $form->field($model, 'dive[0][depth]')->textInput([
                'type' => 'number',
            ])->label('Время первого погружения (мин)') ?>
        </div>

        <div class="col-sm-4">
            <?= $form->field($model, 'dive[0][ndl]')->textInput([
                'type'     => 'number',
                'disabled' => true,
                'title'    => 'Бездекомпрессионный предел.',
            ])->label('NDL для первого погружения (мин)') ?>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-4 col-sm-offset-4">
            <?= $form->field($model, 'dive[1][interval]')->textInput([
                'type' => 'number',
            ])->label('Поверхностный интервал (мин)') ?>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-4">
            <?= $form->field($model, 'dive[1][time]')->textInput([
                'type' => 'number',
            ])->label('Глубина второго погружения (м)') ?>
        </div>

        <div class="col-sm-4">
            <?= $form->field($model, 'dive[1][depth]')->textInput([
                'type' => 'number',
            ])->label('Время второго погружения (мин)') ?>
        </div>

        <div class="col-sm-4">
            <?= $form->field($model, 'dive[1][ndl]')->textInput([
                'type'     => 'number',
                'disabled' => true,
                'title'    => 'Бездекомпрессионный предел.',
            ])->label('NDL для второго погружения (мин)') ?>
        </div>
    </div>

    <center>
        <button type="button" class="btn btn-success" data-toggle="collapse" data-target="#dive-multilevel-3">+</button>
    </center>

    <br>

    <div id="dive-multilevel-3" class="collapse">

        <div class="row">
            <div class="col-sm-4 col-sm-offset-4">
                <?= $form->field($model, 'dive[2][interval]')->textInput([
                    'type' => 'number',
                ])->label('Поверхностный интервал (мин)') ?>
            </div>
        </div>


        <div class="row">
            <div class="col-sm-4">
                <?= $form->field($model, 'dive[20][time]')->textInput([
                    'type' => 'number',
                ])->label('Глубина третьего погружения (м)') ?>
            </div>

            <div class="col-sm-4">
                <?= $form->field($model, 'dive[20][depth]')->textInput([
                    'type' => 'number',
                ])->label('Время третьего погружения (мин)') ?>
            </div>

            <div class="col-sm-4">
                <?= $form->field($model, 'dive[20][ndl]')->textInput([
                    'type'     => 'number',
                    'disabled' => true,
                    'title'    => 'Бездекомпрессионный предел.',
                ])->label('NDL для третьего погружения (мин)') ?>
            </div>
        </div>

        <center>
            <button type="button" class="btn btn-success" data-toggle="collapse" data-target="#dive-multilevel-4">+</button>
        </center>

        <br>

        <div id="dive-multilevel-4" class="collapse">

            <div class="row">
                <div class="col-sm-4 col-sm-offset-4">
                    <?= $form->field($model, 'dive[3][interval]')->textInput([
                        'type' => 'number',
                    ])->label('Поверхностный интервал (мин)') ?>
                </div>
            </div>


            <div class="row">
                <div class="col-sm-4">
                    <?= $form->field($model, 'dive[3][time]')->textInput([
                        'type' => 'number',
                    ])->label('Глубина четвертого погружения (м)') ?>
                </div>

                <div class="col-sm-4">
                    <?= $form->field($model, 'dive[3][depth]')->textInput([
                        'type' => 'number',
                    ])->label('Время четвертого погружения (мин)') ?>
                </div>

                <div class="col-sm-4">
                    <?= $form->field($model, 'dive[3][ndl]')->textInput([
                        'type'     => 'number',
                        'disabled' => true,
                        'title'    => 'Бездекомпрессионный предел.',
                    ])->label('NDL для четвертого погружения (мин)') ?>
                </div>
            </div>
        </div>
    </div>

    <?= $form->field($model, 'isColdWater')->checkbox()
             ->label('Холодная вода') ?>
    <?= $form->field($model, 'isExtremeEnvironments')->checkbox()
             ->label('Осложненные условия') ?>

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