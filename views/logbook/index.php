<?php

/* @var $this yii\web\View */

$this->title = 'My Yii Application';
?>
<?php foreach ($logbookRecords as $record) { ?>
    <div class="col-md-10">
        <h3><?= $record->id ?></h3>
        <p><?= $record->date ?></p>
        <p><?= $record->location ?></p>
        <div class="col-md-2">
            <a href="<?= Yii::$app->urlManager->createUrl(['/logbook/update', 'news_id' => $record->id])?>" class="btn btn-primary active">Редактировать</a>
        </div>
        <div class="col-md-2">
            <a href="<?= Yii::$app->urlManager->createUrl(['/logbook/delete', 'news_id' => $record->id])?>" class="btn btn-danger active">Удалить</a>
        </div>
    </div>
<?php } ?>
