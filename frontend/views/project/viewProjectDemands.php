<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\ProjectModel */

$this->title = "Analisis of project";
$this->params['breadcrumbs'][] = ['label' => 'Projects', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="project-model-view container">

    <h1><?= Html::encode($model->title) ?></h1>
    <p class="card-text">Created by: <?php echo ucfirst($model->createdBy->username); ?>
        on <?php echo date('d.m.Y', $model->created_at); ?>
        at <?php echo date('H:i', $model->created_at); ?>
    </p>
    <div class="card">
        <div class="card-body">

            <h4 class="card-title">Description</h4>
            <p class="card-text"><?php echo $model->description; ?></p>
        </div>
    </div>


    <?php /*echo DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'id',
            ['attribute' => 'title', 'label' => 'Project',],
            'description:ntext',
            ['attribute' => 'fkStage.title', 'label' => 'Stage',],
            ['attribute' => 'createdBy.username', 'label' => 'Creator',], //обращаемся к результату выполнения  метода getCreatedBy(), но через точку
            ['attribute' => 'updatedBy.username', 'label' => 'Updater',],
            'created_at:datetime',
            'updated_at:datetime',
        ],
    ])*/; ?>

    <p class="">
        <?php echo Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary btn-sm']); ?>
        <?php echo Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger btn-sm',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]); ?>
        <?php echo Html::a('Move to next stage', ['move', 'id' => $model->id, 'view' => 'view'], [
            'class' => 'btn btn-warning btn-sm',
            'data' => [
                'confirm' => 'Are you sure you want to move project at next stage?',
                'method' => 'post',
            ],
        ]); ?>
    </p>

    <?php /*echo \yii2mod\comments\widgets\Comment::widget([
        'model' => $model,
    ]);*/ ?>

</div>
