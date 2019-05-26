<?php

/* @var $x integer */
/* @var $y integer */
/* @var $text string */
/* @var $value string */
/* @var $color string */

?>

<g>
    <text y="<?= $y ?>">
        <tspan x="<?= $x + 25 ?>" text-anchor="middle" style="font-size: 14px; font-weight: bold"><?= $value ?></tspan>
        <tspan x="<?= $x + 25 ?>" dy="15" text-anchor="middle" style="font-size: 8px; font-weight: bold"><?= $text ?></tspan>
    </text>

    <path
        fill="none"
        stroke="<?= $color ?>"
        stroke-width="1"
        d="M <?= $x ?> <?= $y + 5 ?> L <?= $x + 50 ?> <?= $y + 5 ?>"
    ></path>
</g>