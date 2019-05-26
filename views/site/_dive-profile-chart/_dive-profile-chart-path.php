<?php

/* @var $x integer */
/* @var $y integer */
/* @var $time integer */
/* @var $depth integer */
/* @var $interval integer */
/* @var $pg array */

$y0 = $y;
$y1 = $y0 + 70;
$color = '#005091';

?>

<g style="fill: <?= $color ?>">
    <path
        fill="none"
        stroke="<?= $color ?>"
        stroke-width="3"
        d="M <?= $x ?> <?= $y0 ?> L <?= $x + 50 ?> <?= $y0 ?> L <?= $x + 32 ?> <?= $y1 ?> L <?= $x + 132 ?> <?= $y1 ?> L <?= $x + 149 ?> <?= $y0 ?> L <?= $x + 200 ?> <?= $y0 ?>"
    ></path>

    <?= $this->render('_dive-profile-chart-text', [
        'x' => $x - 20,
        'y' => $y0 + 35,
        'text' => 'Глубина',
        'value' => $depth,
        'color' => $color,
    ]) ?>

    <?= $this->render('_dive-profile-chart-text', [
        'x' => $x + 55,
        'y' => $y + 90,
        'text' => 'Время',
        'value' => $time,
        'color' => $color,
    ]) ?>

    <?= $this->render('_dive-profile-chart-box', [
        'x' => $x + 11,
        'y' => $y0,
        'text' => 'PG',
        'value' => $pg[0],
        'width' => 25,
        'color' => $color,
    ]) ?>

    <?php if ($interval > 0) {
        echo $this->render('_dive-profile-chart-box', [
            'x' => $x - 38,
            'y' => $y0,
            'text' => 'SI',
            'value' => $interval,
            'width' => 49,
            'color' => $color,
        ]);
    } ?>

    <?= $this->render('_dive-profile-chart-box', [
        'x' => $x + 137,
        'y' => $y0,
        'text' => 'PG',
        'value' => $pg[1],
        'width' => 25,
        'color' => $color,
    ]) ?>

</g>