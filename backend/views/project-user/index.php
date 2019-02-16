<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel common\models\ProjectUserSearch2 */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Project team';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="project-user2-index container">

    <h1><?php //echo Html::encode($this->title); ?></h1>
    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Append user to project', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            //['class' => 'yii\grid\SerialColumn'],

            //'project_id',
            [
                'attribute' => 'project_id',
                'value' => function (\common\models\ProjectUser2 $model) {
                    return Html::a($model->project->title, ['dict-project-stages/view', 'id' => $model->project->id]);
                },
                'format' => 'html',
            ],
            //'user_id',
            [
                'attribute' => 'user_id',
                'value' => function (\common\models\ProjectUser2 $model) {
                    return Html::a($model->user->username, ['dict-project-stages/view', 'id' => $model->user->id]);
                },
                'format' => 'html',
            ],
            //'role',
            //'fk_project_role',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    <?php Pjax::end(); ?>
</div>
