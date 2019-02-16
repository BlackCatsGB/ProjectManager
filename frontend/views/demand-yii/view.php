<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Demands */

const max_len = 74;

$this->title = $model->id . '. ' . substr($model->text, 0, max_len);
if (strlen($model->text) > max_len) $this->title .= '..';
$this->params['breadcrumbs'][] = ['label' => 'Demands', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="demands-view container">

    <h1><?php //echo Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary btn-sm']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger btn-sm',
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
            //'uid',
            [
                'attribute' => 'is_group',
                'filter' => \common\models\Demands::GROUP_STATUSES,
                'value' => function (\common\models\Demands $model){
                    return \common\models\Demands::GROUP_STATUSES[$model->is_group];
                }
            ],
            'text',
            //'id_version',
            'id_parent',
        ],
    ]) ?>

</div>
