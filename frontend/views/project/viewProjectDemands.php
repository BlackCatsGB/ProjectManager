<?php

use common\models\ProjectsDemands;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\ProjectModel */
/* @var $dataProviderProjectDemands yii\data\ActiveDataProvider */

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
        <?php //echo Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary btn-sm']); ?>
        <?php /*echo Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger btn-sm',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]); */ ?>
        <?php echo Html::a('Move to next stage', ['move', 'id' => $model->id, 'view' => 'view'], [
            'class' => 'btn btn-warning btn-sm',
            'data' => [
                'confirm' => 'Are you sure you want to move project at next stage?',
                'method' => 'post',
            ],
        ]); ?>
    </p>

    <?= GridView::widget([
        'layout' => "{items}",
        'dataProvider' => $dataProviderProjectDemands,
        //стили строк
        //'rowOptions' => ['class' => 'btn-primary'],
        'rowOptions' => function ($model, $key, $index, $grid) {
            return [
                'class' => $model->fkDemand->id_parent ? 'text-white' : '',
                'style' => $model->fkDemand->id_parent ? 'background-color: #aaa;' : '',
            ];
        },
        'tableOptions' => ['class' => 'table table-hover'],
        //'filterModel' => $searchModel,
        'columns' => [
            //актуальность требования для проекта
            [
                'class' => 'yii\grid\CheckboxColumn',
                'multiple' => true,
                'checkboxOptions' => function ($model, $key, $index, $column) {
                    return $model->is_relevant ? ['checked' => "checked"] : [];
                },

            ],
            //формулировка требования
            [
                'attribute' => 'fk_demand',
                'value' => function (ProjectsDemands $model) {
                    return $model->fkDemand->text;
                    //return Html::a($model->fkDemand->text, ['/demand', 'id' => $model->id]);
                },
                'format' => 'html',
                'label' => 'Demand'
            ],
            //баловство со стилями столбца
            [
                'attribute' => 'fk_demand',
                //стили столбцов
                'options' => ['class' => 'bg-dark text-white'],
                'value' => function (ProjectsDemands $model) {
                    return $model->fkDemand->id_parent;
                    //return Html::a($model->fkDemand->text, ['/demand', 'id' => $model->id]);
                },
                'format' => 'html',
                'label' => 'id parent'
            ],
            ['class' => ActionColumn::className()],
        ],
    ])
    ?>

    <?php /*echo \yii2mod\comments\widgets\Comment::widget([
        'model' => $model,
    ]);*/ ?>

</div>
