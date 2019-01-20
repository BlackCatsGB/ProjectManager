<?php

use yii\helpers\Html;
use yii\helpers\HtmlPurifier;

?>

<a href='#' class="list-group-item list-group-item-action">
    <?= Html::encode($model->title) ?>
    <span class="badge badge-primary badge-pill">
        <?php echo $model->cnt;?>
    </span>
</a>