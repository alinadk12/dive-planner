<?php

/* @var $this yii\web\View */
/* @var $logbookRecords array*/

$this->title = 'Dive Planner';

$countRecords = 1;
?>

    <div >
        <table class="table table-striped table-bordered table-hover">
            <thead>
            <tr>
                <th>#</th>
                <th>Дата погружения</th>
                <th>Место</th>
                <th>Глубина</th>
                <th>Видимость</th>
                <th>Температура воздуха</th>
                <th>Температура воды</th>
                <th>Время погружения</th>
                <th>Объем баллона</th>
                <th>Давление в начале</th>
                <th>Давление в конце</th>
                <th>Комментарий</th>
                <th>Действия</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($logbookRecords as $record) { ?>
                <tr>
                    <td><?= $countRecords++ ?></td>
                    <td><?= $record->date ?></td>
                    <td><?= $record->location ?></td>
                    <td><?= $record->depth ?></td>
                    <td><?= $record->visibility ?></td>
                    <td><?= $record->tempAir ?></td>
                    <td><?= $record->tempSurface ?></td>
                    <td><?= $record->timeIn ?></td>
                    <td><?= $record->cylinder ?></td>
                    <td><?= $record->startBar ?></td>
                    <td><?= $record->endBar ?></td>
                    <td><?= $record->comment ?></td>
                    <td>
                        <a href="<?= Yii::$app->urlManager->createUrl(['/logbook/update', 'id' => $record->id])?>" style="margin: 20px 15px 10px 5px"><span class="glyphicon glyphicon-pencil"></span></a>
                        <a href="<?= Yii::$app->urlManager->createUrl(['/logbook/delete', 'id' => $record->id])?>"><span class="glyphicon glyphicon-trash"></span></a>
                    </td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>

