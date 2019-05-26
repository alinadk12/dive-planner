<?php
/* @var $data array */

$count  = count($data);
$offset = 20;
$width = $count * 200 + $offset * 2;
?>

<div style="overflow: auto">
    <svg viewBox="0 0 <?= $width ?> 200" style="min-width: <?= $width * 1.4 ?>px">
        <?php
        foreach ($data as $key => $value) {
            echo $this->render('_dive-profile-chart-path', [
                'x'        => $offset + $key * 200,
                'y'        => 50,
                'time'     => $value['time'],
                'depth'    => $value['depth'],
                'pg'       => $value['pg'],
                'interval' => $value['interval'],
            ]);
        }
        ?>
    </svg>
</div>