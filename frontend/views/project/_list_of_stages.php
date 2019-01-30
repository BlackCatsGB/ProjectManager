<?php

use yii\helpers\Html;
use yii\helpers\HtmlPurifier;

?>
<?php
/*
    <a href='' class="list-group-item list-group-item-action">
        <?= Html::encode($model->title) ?>
        <span class="badge badge-primary badge-pill">
        <?php echo $model->cnt; ?>
    </span>
    </a>
*/
?>
<?php
//if (\Yii::$app->user->can('toAnalyseProject')) {
if ($model->cnt > 0) {
    echo Html::a($model->title
        . '<span class="badge badge-primary badge-pill">'
        . $model->cnt
        . '</span>',
        ['/project', 'fk_stage' => $model->fk_stage],
        ['class' => 'list-group-item list-group-item-action']);
}
//}
?>