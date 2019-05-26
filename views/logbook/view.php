<div class="col-md-10">
    <h3>Номер: <?= $record->id ?></h3>
    <p>Дата: <?= $record->date ?></p>
    <p>Место погружения: <?= $record->location ?></p>
    <p>Глубина: <?= $record->depth ?></p>
    <p>Видимость: <?= $record->visibility ?></p>
    <p>Температура воздуха: <?= $record->tempAir ?></p>
    <p>Температура воды на поверхности: <?= $record->tempSurface ?></p>
    <p>Температура воды на дне: <?= $record->tempBottom ?></p>
    <p>Время начала погружения: <?= $record->timeIn ?></p>
    <p>Время окончания погружения: <?= $record->timeOut ?></p>
    <p>Объем баллона: <?= $record->cylinder ?></p>
    <p>Количество воздуха в начале погружения: <?= $record->startBar ?></p>
    <p>Количество воздуха в конце погружения: <?= $record->endBar ?></p>
    <p>Комментарий: <?= $record->comment ?></p>












    <div class="col-md-2">
        <a href="<?= Yii::$app->urlManager->createUrl(['/logbook/update', 'news_id' => $record->id])?>" class="btn btn-primary active">Редактировать</a>
    </div>
    <div class="col-md-2">
        <a href="<?= Yii::$app->urlManager->createUrl(['/logbook/delete', 'news_id' => $record->id])?>" class="btn btn-danger active">Удалить</a>
    </div>
</div>