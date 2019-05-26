<?php

/* @var $this yii\web\View */

use yii\bootstrap\Tabs;
$this->title = 'My Yii Application';
?>
<div class="site-index">
    <?= Tabs::widget([
        'items' => [
            [
                'label' => 'Многократные погружения',
                'content' => $this->render('_dive-multiple-form', ['model' => $diveMultipleModel]),
                'active' => $tab === 'dive-multiple',
            ],
            [
                'label' => 'Многоуровневые погружения',
                'content' => $this->render('_dive-multilevel-form', ['model' => $diveMultiLevelModel]),
                'active' => $tab === 'dive-multilevel',
            ],
            [
                'label' => 'Поверхностный интервал',
                'content' => $this->render('_interval-form', ['model' => $intervalModel  ]),
                'active' => $tab === 'interval',
            ],
            [
                'label' => 'Запас воздуха',
                'content' => $this->render('_air-form', ['model' => $airModel  ]),
                'active' => $tab === 'air',
            ],
        ],
    ]); ?>
</div>
