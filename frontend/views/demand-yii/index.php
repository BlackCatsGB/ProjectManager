<?php

use common\models\Demands;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel common\models\DemandSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Demands';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="demands-index container">

    <div class="alert alert-info alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        This module is intended to maintain general registry of requirements. It is called the "registry of requirements".
    </div>

    <h1><?= Html::encode($this->title) ?></h1>
    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create group', ['create?is_group=1'], ['class' => 'btn btn-success btn-sm']) ?>
        <?= Html::a('Create demand', ['create'], ['class' => 'btn btn-success btn-sm']) ?>
    </p>

    <?= GridView::widget([
        'tableOptions' => ['class' => 'table table-hover'],
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'layout' => "{items}\n{pager}",
        'rowOptions' => function ($model, $key, $index, $grid) {
            return [
                'class' => $model->is_group==1 ? 'bg-info text-white' : '',
                //'style' => $model->pid==-1 ? 'background-color: #aaa;' : '',
            ];
        },
        'columns' => [
            //['class' => 'yii\grid\SerialColumn'],

            'id',
            //'ord',
            //'is_group',
            [
                'attribute' => 'text',
                'label' => 'Demand',
            ],
            /*[
                'attribute' => 'id_parent',


                'value' => function (Demands $model) {
                    return $model->id_parent == null ? '' : $model->parent->text;
                },
                'format' => 'html',
                'label' => 'Group',
            ],*/

            //'id_version',
            //'id_parent',


            [
                'class' => 'yii\grid\ActionColumn',
                'contentOptions' => ['class' => 'text-right']
            ],
        ],
    ]); ?>
    <?php Pjax::end(); ?>
</div>
