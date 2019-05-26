<?php

/* @var $this yii\web\View */

use yii\bootstrap\ActiveForm;
use yii\helpers\Html;

?>

<div>

    <?php $form = ActiveForm::begin(['id' => 'interval-form']); ?>

    <div class="row">
        <div class="col-sm-4">
            <?= $form->field($model, 'firstDiveTime')->textInput(['type' => 'number']) ?>
        </div>
        <div class="col-sm-4">
            <?= $form->field($model, 'firstDiveDepth')->textInput(['type' => 'number']) ?>
        </div>
        <div class="col-sm-4">
            <?= $form->field($model, 'firstMaxPG')->textInput([
                'disabled' => true,
                'title'    => 'Группа по азоту.',
            ]) ?>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-4">
            <?= $form->field($model, 'secondDiveTime')->textInput(['type' => 'number']) ?>
        </div>
        <div class="col-sm-4">
            <?= $form->field($model, 'secondDiveDepth')->textInput(['type' => 'number']) ?>
        </div>
        <div class="col-sm-4">
            <?= $form->field($model, 'secondMaxPG')->textInput([
                'disabled' => true,
                'title'    => 'Группа по азоту.',
            ]) ?>
        </div>
    </div>

    <?= $form->field($model, 'minInterval')->textInput([
        'type'     => 'number',
        'disabled' => true,
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