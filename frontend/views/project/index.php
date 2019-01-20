<?php

//use Yii;
use yii\data\ActiveDataProvider;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\ListView;
use yii\widgets\Pjax;
use common\models\ProjectsOnStages;

/* @var $this yii\web\View */
/* @var $searchModel common\models\ProjectSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Projects';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="project-model-index row">
    <?php /////////////////////////////////////////LEFT_PANEL/////////////////////////////////////////////////////////; ?>
    <div class="left_panel">
        <h4>Stages:</h4>
        <?php Pjax::begin();
        $dataProviderProjectStages = new ActiveDataProvider([
            'query' => ProjectsOnStages::find(),
        ]);
        ?>
        <?= ListView::widget([
            'dataProvider' => $dataProviderProjectStages,
            'options' => [
                'tag' => 'ul',
                'class' => 'list-group',
            ],
            'itemView' => '_list_of_stages',
            'summary' => false,
        ]); ?>
        <?php Pjax::end(); ?>
    </div>
    <?php /////////////////////////////////////////CENTER_PANEL/////////////////////////////////////////////////////////; ?>
    <div class="center_panel">
        <h1><?= Html::encode($this->title) ?></h1>
        <?php Pjax::begin(); ?>
        <?php /* echo $this->render('_search', ['model' => $searchModel]); */ ?>

        <p>
            <?= Html::a('Create project', ['create'], ['class' => 'btn btn-success']); ?>
        </p>

        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
                //['class' => 'yii\grid\SerialColumn'],
                //'id',
                [
                    'attribute' => 'title',
                    'value' => function (\common\models\ProjectModel $model) {
                        return Html::a($model->title, ['project/view', 'id' => $model->id]);
                    },
                    'format' => 'html',
                ],
                [
                    'attribute' => \common\models\ProjectModel::RELATION_PROJECT_USERS . '.role',
                    'filter' => \common\models\ProjectUserModel::ROLES,
                    'value' => function (\common\models\ProjectModel $model) {
                        //return join(', ', $model->getProjectUsers()->select('role')->where(['user_id' => Yii::$app->user->id])->column());
                        return join(', ', Yii::$app->projectService->getRoles($model, Yii::$app->user->identity));
                    },
                    'format' => 'html',
                ],
                'description:ntext',
                [
                    'attribute' => 'created_by',
                    'value' => function (\common\models\ProjectModel $model) {
                        return Html::a($model->createdBy->username, ['user/view', 'id' => $model->createdBy->id]);
                    },
                    'format' => 'html',
                ],
                [
                    'attribute' => 'updated_by',
                    'value' => function (\common\models\ProjectModel $model) {
                        return Html::a($model->updatedBy->username, ['user/view', 'id' => $model->updatedBy->id]);
                    },
                    'format' => 'html',
                ],
                'created_at:datetime',
                'updated_at:datetime',
                [
                    'attribute' => 'Stage',
                    'value' => function (\common\models\ProjectModel $model) {
                        return Html::a($model->fkStage->title, ['dict-project-stages/view', 'id' => $model->fkStage->id]);
                    },
                    'format' => 'html',
                ],
                //пользователи фронтэнда не могут править проекты
                ['class' => 'yii\grid\ActionColumn'],
            ],
        ]); ?>
        <?php Pjax::end(); ?>
    </div>
    <?php /////////////////////////////////////////RIGHT_PANEL/////////////////////////////////////////////////////////; ?>
    <div class="right_panel">right_panel</div>
</div>
