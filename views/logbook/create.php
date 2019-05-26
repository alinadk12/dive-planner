<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

?>

<div class="col-md-offset-4 col-md-5">
    <div class="text-center">
        <h3><b>Добавление записи в логбук</b></h3>
    </div>
    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>
    <?= $form->field($model, 'date')->textInput(['autofocus' => true])->label('Дата') ?>
    <?= $form->field($model, 'location')->textInput()->label('Место') ?>
    <?= $form->field($model, 'depth')->textInput()->label('Глубина') ?>
    <?= $form->field($model, 'visibility')->textInput()->label('Видимость') ?>
    <?= $form->field($model, 'tempAir')->textInput()->label('Температура воздуха') ?>
    <?= $form->field($model, 'tempSurface')->textInput()->label('Температура воды на поверхности') ?>
    <?= $form->field($model, 'tempBottom')->textInput()->label('Температура воды на дне') ?>
    <?= $form->field($model, 'timeIn')->textInput()->label('Время начала погружения') ?>
    <?= $form->field($model, 'timeOut')->textInput()->label('Время окончания погружения') ?>
    <?= $form->field($model, 'cylinder')->textInput()->label('Объем баллона') ?>
    <?= $form->field($model, 'startBar')->textInput()->label('Количество воздуха в начале погружения') ?>
    <?= $form->field($model, 'endBar')->textInput()->label('Количество воздуха в конце погружения') ?>
    <?= $form->field($model, 'comment')->textarea(['rows' => 10])->label('Комментарий') ?>
    <div class="form-group">
        <div class="text-center">
            <?= Html::submitButton('Добавить', ['class' => 'btn btn-primary', 'name' => 'contact-button']) ?>
        </div>
    </div>
    <?php ActiveForm::end(); ?>
</div>