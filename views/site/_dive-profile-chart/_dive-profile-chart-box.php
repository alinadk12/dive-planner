<?php

/* @var $x integer */
/* @var $y integer */
/* @var $text string */
/* @var $value string */
/* @var $width string */
/* @var $color string */

$x1     = $x + 20;
$offset = 6;

?>

<path
    fill="none"
    stroke="<?= $color ?>"
    stroke-width="1"
    d="M <?= $x1 ?> <?= $y - 35 ?>
            L <?= $x1 + $width ?> <?= $y - 35 ?>
            L <?= $x1 + $width - $offset ?> <?= $y - 5 ?>
            L <?= $x1 - $offset ?> <?= $y - 5 ?>
        Z"
></path>

<text x="<?= $x + 21 ?>" y="<?= $y - 26 ?>" style="font-size: 8px; font-weight: bold">
    <?= $text ?>
</text>

<text x="<?= $x1 + 3 ?>" y="<?= $y - 10 ?>" style="font-size: 20px; font-weight: bold">
    <?= $value ?>
</text>

