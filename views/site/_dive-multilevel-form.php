<?php

/* @var $this yii\web\View */

use yii\bootstrap\ActiveForm;
use yii\helpers\Html;

?>

<div>

    <?php $form = ActiveForm::begin([
        'id'               => 'dive-multlevel-form',
        'validateOnBlur'   => false,
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
        <button type="button" class="btn" data-toggle="collapse" data-target="#dive-multiple-3">+</button>
    </center>

    <br>

    <div id="dive-multiple-3" class="collapse">
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
            <button type="button" class="btn" data-toggle="collapse" data-target="#dive-multiple-4">+</button>
        </center>

        <br>

        <div id="dive-multiple-4" class="collapse">
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

    <?= $this->render('_dive-profile-chart/index', [
        'data' => [
            [
                'pg'       => [
                    'A',
                    'E',
                ],
                'time'     => 20,
                'depth'    => 30,
                'interval' => 0,
            ],
            [
                'pg'       => [
                    'E',
                    'O',
                ],
                'time'     => 30,
                'depth'    => 40,
                'interval' => 0,
            ],
            [
                'pg'       => [
                    'O',
                    'Z',
                ],
                'time'     => 55,
                'depth'    => 100,
                'interval' => 0,
            ],
        ],
    ]); ?>

    <?php ActiveForm::end(); ?>

</div>