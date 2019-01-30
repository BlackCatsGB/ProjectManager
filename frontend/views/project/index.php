<?php

//use Yii;
use common\models\ProjectModel;
use yii\data\ActiveDataProvider;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;
use yii\widgets\ListView;
use yii\widgets\Pjax;
use common\models\ProjectsOnStages;

/* @var $this yii\web\View */
/* @var $searchModel common\models\ProjectSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $dataProviderProjectStages yii\data\ActiveDataProvider */
/* @var $dataProviderProjectStagesByUser yii\data\ActiveDataProvider */
/* @var $dataProviderStageTitle yii\data\ActiveDataProvider */
/* @var $fk_stage int */
/* @var $id int */

$this->title = 'Projects';

if ($fk_stage == -1) $this->params['breadcrumbs'][] = $this->title;
else {
    $this->params['breadcrumbs'][] = [
        'label' => $this->title,
        'url' => '/project'
    ];
    $this->params['breadcrumbs'][] = $dataProviderStageTitle->getModels()[0]['title'];
}
?>
<div class="project-model-index row">
    <?php /////////////////////////////////////////LEFT_PANEL/////////////////////////////////////////////////////////; ?>
    <div class="left_panel">
        <h4>To do:</h4>
        <?= ListView::widget([
            'dataProvider' => $dataProviderProjectStagesByUser,
            'options' => [
                'tag' => 'div',
                'class' => 'list-group',
            ],
            'itemView' => '_list_of_user_stages',
            'summary' => false,
        ]); ?>
        <h4>Projects by stages:</h4>
        <?= ListView::widget([
            'dataProvider' => $dataProviderProjectStages,
            'options' => [
                'tag' => 'div',
                'class' => 'list-group',
            ],
            'itemView' => '_list_of_stages',
            'summary' => false,
        ]); ?>
        <a href='?fk_stage=-1' class="list-group-item list-group-item-action">
            All
        </a>
    </div>
    <?php /////////////////////////////////////////CENTER_PANEL/////////////////////////////////////////////////////////; ?>
    <div class="center_panel">
        <div class="space_between">
            <div>
                <h1><?= Html::encode($this->title) ?></h1>
            </div>
            <?php /* echo $this->render('_search', ['model' => $searchModel]); */ ?>
            <div>
                <h1><p>
                        <?php //echo Html::a('Create project', ['create'], ['class' => 'btn btn-success']); ?>
                    </p>
                </h1>
            </div>
        </div>
        <?php Pjax::begin(); ?>
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
                //['class' => 'yii\grid\SerialColumn'],
                //'id',
                [
                    'attribute' => 'id',
                    'value' => function (ProjectModel $model) {
                        return Html::a($model->id, ['project/view', 'id' => $model->id]);
                    },
                    'format' => 'html',
                ],
                [
                    'attribute' => 'title',
                    'value' => function (ProjectModel $model) {
                        return Html::a($model->title, ['project/view', 'id' => $model->id]);
                    },
                    'format' => 'html',
                ],
                /*[
                    'attribute' => \common\models\ProjectModel::RELATION_PROJECT_USERS . '.role',
                    'filter' => \common\models\ProjectUserModel::ROLES,
                    'value' => function (\common\models\ProjectModel $model) {
                        //return join(', ', $model->getProjectUsers()->select('role')->where(['user_id' => Yii::$app->user->id])->column());
                        return join(', ', Yii::$app->projectService->getRoles($model, Yii::$app->user->identity));
                    },
                    'format' => 'html',
                ],*/
                /*'description:ntext',*/
                /*[
                    'attribute' => 'fk_customer',
                    'value' => function (\common\models\ProjectModel $model) {
                        return Html::a($model->fkCustomer->username, ['user/view', 'id' => $model->fkCustomer->id]);
                    },
                    'format' => 'html',
                ],
                [
                    'attribute' => 'fk_project_manager',
                    'value' => function (\common\models\ProjectModel $model) {
                        return Html::a($model->fkProjectManager->username, ['user/view', 'id' => $model->fkProjectManager->id]);
                    },
                    'format' => 'html',
                ],
                [
                    'attribute' => 'fk_analyst',
                    'value' => function (\common\models\ProjectModel $model) {
                        return Html::a($model->fkAnalyst->username, ['user/view', 'id' => $model->fkAnalyst->id]);
                    },
                    'format' => 'html',
                ],
                [
                    'attribute' => 'fk_inspector',
                    'value' => function (\common\models\ProjectModel $model) {
                        return Html::a($model->fkInspector->username, ['user/view', 'id' => $model->fkInspector->id]);
                    },
                    'format' => 'html',
                ],*/
                /*[
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
                ],*/
                /*'created_at:datetime',
                'updated_at:datetime',*/
                [
                    'attribute' => 'Stage',
                    'value' => function (ProjectModel $model) {
                        return Html::a($model->fkStage->title, ['dict-project-stages/view', 'id' => $model->fkStage->id]);
                    },
                    'format' => 'html',
                ],
                //пользователи фронтэнда не могут править проекты
                ['class' => 'yii\grid\ActionColumn'],
            ],
        ]); ?>
        <?php
        /*$this->registerJs("$('center_panel td').click(function (e) {
                var id = $(this).closest('tr').data('id');
                if(e.target == this)
                    location.href = '" . Url::to(['/project/index']) . "?fk_stage=1&id=".$id.";
            });
        ");*/
        /*$this->registerJs(
            "$('center_panel td').on('click', function(e){
                //e.preventDefault();
                var thr= $(this).closest('tr');
                location.href = '/project/index?id=';
                });"
        );*/
        $this->registerJs("
            $('tbody td').on('click', function (e) {
                // Получить ближайший ID в <tr> из data-key атрибута
                var id = $(this).closest('tr').data('key');
                if(e.target == this)
                    location.href = '" . Url::to(['/project/?fk_stage='.$fk_stage.'&']) . "id=' + id;
            });
        ", yii\web\View::POS_END);
        ?>
        <?php Pjax::end(); ?>
    </div>
    <?php /////////////////////////////////////////RIGHT_PANEL/////////////////////////////////////////////////////////; ?>
    <div class="right_panel">
        <h4>Actions:</h4>
        <p>
            <?php
            if (Yii::$app->user->can('crudProject')) {
                echo Html::a('Create project', ['create'], ['class' => 'btn btn-success']);
            }

            //здесь я баловался с отображением деталей проекта. не хватает обработки клика на строке GridView. Забыл JS
            $dataProviderProjectDetails = new ActiveDataProvider([
                'query' => ProjectModel::find()->where('id = ' . $id),
            ]);

            $model = ProjectModel::findOne($id);
            if ($model)
                echo $this->render('view_detail', [
                    'model' => $model,
                ]);
            ?>
        </p>
    </div>
</div>
