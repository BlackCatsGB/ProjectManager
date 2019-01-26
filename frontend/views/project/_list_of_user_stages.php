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
if ($model->cnt > 0 && $model->user_id==Yii::$app->user->id) {
    echo Html::a($model->title
        . '<span class="badge badge-primary badge-pill">'
        . $model->cnt
        . '</span>',
        [$model->action, 'fk_stage' => $model->fk_stage],
        ['class' => 'list-group-item list-group-item-action']);
}
//}
?>