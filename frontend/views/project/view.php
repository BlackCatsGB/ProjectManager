<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\ProjectModel */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Projects', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="project-model-view container">

    <h1><?= Html::encode($this->title) ?></h1>

    <p class="">
        <?php echo Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary btn-sm']); ?>
        <?php echo Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger btn-sm',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]); ?>
        <?php echo Html::a('Move', ['move', 'id' => $model->id, 'view' => 'view'], [
            'class' => 'btn btn-warning btn-sm',
            'data' => [
                'confirm' => 'Are you sure you want to move project at next stage?',
                'method' => 'post',
            ],
        ]); ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'id',
            'title',
            'description:ntext',
            ['attribute' => 'fkStage.title', 'label' => 'Stage',],
            ['attribute' => 'createdBy.username', 'label' => 'Creator',], //обращаемся к результату выполнения  метода getCreatedBy(), но через точку
            ['attribute' => 'updatedBy.username', 'label' => 'Updater',],
            'created_at:datetime',
            'updated_at:datetime',
        ],
    ]) ?>

    <?php /*echo \yii2mod\comments\widgets\Comment::widget([
        'model' => $model,
    ]);*/ ?>

</div>
