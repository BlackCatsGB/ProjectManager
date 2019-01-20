<?php

use yii\helpers\Html;
use yii\helpers\HtmlPurifier;

?>

<li class="list-group-item d-flex justify-content-between align-items-center">
    <?= Html::encode($model->title) ?>
    <span class="badge badge-primary badge-pill">
        <?php
        echo $model->cnt;
        ?>
    </span>
</li>