<?php

use macgyer\yii2materializecss\lib\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\DictProjectStages */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Project stages', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="dict-project-stages-view container">

    <h3><?= Html::encode('Stage - ' . $this->title) ?></h3>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'title',
            'ord',
        ],
    ]) ?>

</div>
