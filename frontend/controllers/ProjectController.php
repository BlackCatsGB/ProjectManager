<?php

namespace frontend\controllers;

use common\models\DictProjectStages;
use common\models\OrderedDemands;
use common\models\OrderedDemandsOfProject;
use common\models\ProjectsDemands;
use common\models\ProjectsOnStagesByUser;
use kartik\grid\CheckboxColumn;
use kartik\grid\GridView;
use Yii;
use common\models\ProjectsOnStages;
use common\models\query\ProjectQuery;
use common\models\ProjectModel;
use common\models\ProjectSearch;
use yii\data\ActiveDataProvider;
use yii\helpers\Json;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

/**
 * ProjectController implements the CRUD actions for ProjectModel model.
 */
class ProjectController extends Controller
{
    const RELATION_PROJECT_USERS = 'projectUsers';

    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    //сначала запрещающие правила
                    //пример простого использования rbac, если не нужны правила (rules)
                    /*[
                        'allow' => false,
                        'actions' => ['index'],
                        'roles' => ['manager'],
                    ],*/
                    [
                        //'actions' => [/*'logout', 'index', 'update', 'view',*/ 'create'/*, 'delete', 'my'*/],
                        'actions' => ['logout', 'index', 'index-by-user', 'update', 'view', 'create', 'delete',
                            'move', 'kartik', 'kartik-update', 'api-project-demands-is-relevant-update'
                        ],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
        ];
    }

    /**
     * Lists all ProjectModel models.
     * @return mixed
     */
    /*public function actionIndex()
    {
        $searchModel = new ProjectSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }*/
    /*public function actionMy()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => ProjectModel::find()->joinWith(ProjectModel::RELATION_PROJECT_USERS)->where(['user_id' => Yii::$app->user->id]),
        ]);

        return $this->render('index', [
            //'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }*/

    public function actionIndex($fk_stage = -1, $id = -1)
    {
        //$searchModel = new ProjectSearch();
        //$dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        /* @var $query ProjectQuery */
        //$query = $dataProvider->query;
        //$query->byUser(Yii::$app->user->id);
        /*return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);*/

        $searchModel = new ProjectSearch();
        //если фильтров нет
        if ($fk_stage == -1) {
            $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        } //если стоит фильтр по этапу проекта, то отфильтровать список
        else {
            $dataProvider = new ActiveDataProvider([
                'query' => ProjectModel::find()
                    ->where('fk_stage=' . $fk_stage)
            ]);
        }
        $dataProvider->pagination->pageSize = 12; //пагинация по 12 записей на странице

        //провайдер для вывода перечня фильтров
        $dataProviderProjectStages = new ActiveDataProvider([
            'query' => ProjectsOnStages::find(),
        ]);

        $dataProviderProjectStagesByUser = new ActiveDataProvider([
            'query' => ProjectsOnStagesByUser::find(),
        ]);

        //провайдер для получения имени активного этапа по номеру
        $dataProviderStageTitle = new ActiveDataProvider([
            'query' => ProjectsOnStages::find()->where('fk_stage = ' . $fk_stage),
        ]);


        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'dataProviderProjectStages' => $dataProviderProjectStages,
            'dataProviderProjectStagesByUser' => $dataProviderProjectStagesByUser,
            'dataProviderStageTitle' => $dataProviderStageTitle,
            'fk_stage' => $fk_stage,
            'id' => $id,
        ]);
    }

    public function actionIndexByUser($fk_stage = -1, $id = -1)
    {
        //$searchModel = new ProjectSearch();
        //$dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        /* @var $query ProjectQuery */
        //$query = $dataProvider->query;
        //$query->byUser(Yii::$app->user->id);
        /*return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);*/

        $searchModel = new ProjectSearch();
        //если фильтров нет
        if ($fk_stage == -1) {
            $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        } //если стоит фильтр по этапу проекта, то отфильтровать список
        else {
            $dataProvider = new ActiveDataProvider([
                'query' => ProjectModel::find()->joinWith('projectUsers')
                    ->where('fk_stage=' . $fk_stage)->andWhere('user_id=' . Yii::$app->user->id)
            ]);
        }
        $dataProvider->pagination->pageSize = 12; //пагинация по 12 записей на странице

        //провайдер для вывода перечня фильтров
        $dataProviderProjectStages = new ActiveDataProvider([
            'query' => ProjectsOnStages::find(),
        ]);

        $dataProviderProjectStagesByUser = new ActiveDataProvider([
            'query' => ProjectsOnStagesByUser::find(),
        ]);

        //провайдер для получения имени активного этапа по номеру
        $dataProviderStageTitle = new ActiveDataProvider([
            'query' => ProjectsOnStages::find()->where('fk_stage = ' . $fk_stage),
        ]);


        return $this->render('index-by-user', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'dataProviderProjectStages' => $dataProviderProjectStages,
            'dataProviderProjectStagesByUser' => $dataProviderProjectStagesByUser,
            'dataProviderStageTitle' => $dataProviderStageTitle,
            'fk_stage' => $fk_stage,
            'id' => $id,
        ]);
    }

    /**
     * Displays a single ProjectModel model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        $model = $this->findModel($id);

        switch ($model->fk_stage) {
            //анализ
            case "2":
                //добавить требования к проекту

                return $this->actionViewAnalyseStage($id);
                /*return $this->render($nextStage[0]["action"], [
                    'model' => $model,
                ]);*/
                break;
        }

        return $this->render('view', [
            'model' => $model,
        ]);
    }

    /**
     * Displays a single ProjectModel model on analyse stage.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionViewAnalyseStage($id)
    {
        $projectModel = $this->findModel($id);

        //провайдер для вывода перечня фильтров
        /*$dataProviderProjectDemands = new ActiveDataProvider([
            'query' => ProjectsDemands::find()->where('fk_project=' . $id),
        ]);*/
        $dataProviderProjectDemands = new ActiveDataProvider([
            'query' => OrderedDemandsOfProject::find()
                ->where('fk_project=' . $id)
                ->orderBy(['ord' => SORT_DESC])
                ->indexBy('fk_demand'),
            'sort' => [
                'defaultOrder' => ['ord' => SORT_ASC],
            ],
        ]);

        return $this->render('viewProjectDemands', [
            'model' => $projectModel,
            'dataProviderProjectDemands' => $dataProviderProjectDemands,
        ]);
    }

    /**
     * Creates a new ProjectModel model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        if (\Yii::$app->user->can('crudProject')) {
            $model = new ProjectModel();

            if ($model->load(Yii::$app->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            }

            return $this->render('create', [
                'model' => $model,
            ]);
        }
        Yii::$app->session->setFlash('error', "Insufficient permissions");
        return $this->redirect('/project');
    }

    /**
     * Updates an existing ProjectModel model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        if (\Yii::$app->user->can('crudProject')) {
            $model = $this->findModel($id);

            if ($model->load(Yii::$app->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            }

            return $this->render('update', [
                'model' => $model,
            ]);
        }
        Yii::$app->session->setFlash('error', "Insufficient permissions");
        return $this->redirect('/project');
    }

    /**
     * Updates an existing ProjectModel model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionMove($id)
    {
        //получаем информацию о проекте
        $model = $this->findModel($id);

        //получаем номер следующего этапа
        $nextStage = DictProjectStages::getNextStage($model->fk_stage);

        //проверяем права
        if (\Yii::$app->user->can('moveToAnalyseProject')) {
            //записываем номер следующего этапа
            if ($nextStage) {
                $model->setAttribute('fk_stage', $nextStage[0]["id"]);
                if ($model->save()) {
                    switch ($nextStage[0]["id"]) {
                        //анализ
                        case "2":
                            //добавить требования к проекту
                            $query = "
                            INSERT INTO `projects_demands`
                                    (`fk_project`, `fk_demand`, `is_relevant`, `created_at`,        `created_by`)
                                SELECT " . $id . ", d.id,           1,          " . time() . " , " . Yii::$app->user->id . " 
                                FROM 
                                    demands d,
                                    (
                                    SELECT * 
                                    FROM demands_version p1, 
                                      (
                                        SELECT max(created_at) as m 
                                        FROM demands_version) p2 
                                    WHERE p1.created_at=p2.m) v
                                WHERE d.id_version=v.id";
                            //return $query;
                            Yii::$app->db->createCommand($query)->execute();

                            return $this->actionViewAnalyseStage($id);
                            /*return $this->render($nextStage[0]["action"], [
                                'model' => $model,
                            ]);*/
                            break;
                    }
                };
            }
        }
        Yii::$app->session->setFlash('error', "Insufficient permissions");
        return $this->render('view', [
            'model' => $model,
        ]);

        /*if (\Yii::$app->user->can('moveToAnalyseProject')) {
            $model = $this->findModel($id);

            if ($model->load(Yii::$app->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            }

            return $this->render('update', [
                'model' => $model,
            ]);
        }
        return $this->redirect('/project');*/
        return;
    }

    /**
     * Deletes an existing ProjectModel model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        if (\Yii::$app->user->can('crudProject')) {
            $this->findModel($id)->delete();

            return $this->redirect(['index']);
        }
        return $this->redirect('/project');
    }

    /**
     * Finds the ProjectModel model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return ProjectModel the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = ProjectModel::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    //TEST KARTIK TABULAR FORM
    public function actionKartik()
    {
        $query = ProjectModel::find()->indexBy('id'); // where `id` is your primary key

        $dataProvider = new ActiveDataProvider([
            'query' => $query,

        ]);
        $dataProvider->pagination->pageSize = 12;

        $searchModel = new ProjectModel();

        return $this->render('kartik', [
            'dataProvider' => $dataProvider,
            'model' => $searchModel,
        ]);
    }

    public function actionKartikUpdate()
    {
        //$sourceModel = new ProjectSearch();
        //$dataProvider = $sourceModel->search(Yii::$app->request->getQueryParams());
        $query = ProjectModel::find()->indexBy('id'); // where `id` is your primary key
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);
        $models = $dataProvider->getModels();
        var_dump(Yii::$app->request->post());
        if (ProjectModel::loadMultiple($models, Yii::$app->request->post()) && ProjectSearch::validateMultiple($models)) {
            $count = 0;
            /* @param ProjectSearch $model */
            foreach ($models as $index => $model) {
                // populate and save records for each model
                //var_dump($model["id"] . ' ' . $model["title"] . ' ' . $model["active"]);
                if ($model->save()) {
                    $count++;
                }
            }
            Yii::$app->session->setFlash('success', "Processed {$count} records successfully.");
            return $this->redirect(['kartik']); // redirect to your next desired page
        } else {
            return $this->redirect(['kartik']);
            /*return $this->render('kartik', [
                'model' => $sourceModel,
                'dataProvider' => $dataProvider
            ]);*/
        }
    }

    public function actionApiProjectDemandsIsRelevantUpdate()
    {
        $result = new ApiResult();
        $result->code = 0;
        $result->message = "error";

        if (Yii::$app->request->post('fk_project')
            && Yii::$app->request->post('fk_demand')
            && Yii::$app->request->post('is_relevant') != null
        ) {
            //получаем параметры
            $fk_project = Yii::$app->request->post('fk_project');
            $fk_demand = Yii::$app->request->post('fk_demand');

            //загружаем из базы строку, меняем релевантность требования и сохраняем
            $projectdemand = ProjectsDemands::findOne(['fk_demand' => $fk_demand, 'fk_project' => $fk_project]);
            $projectdemand->is_relevant = Yii::$app->request->post('is_relevant');
            if ($projectdemand->save()) {
                //задаем параметры для возврата на страницу
                $result->code = 1;
                $result->message = "ok";
            } else {
                $result->code = 0;
                $result->message = "update error";
            }

        } else {
            //задаем параметры для возврата на страницу
            $result->code = 0;
            $result->message = "invalid query parameters";
            $result->data = Yii::$app->request->post();
        }

        return Json::encode($result);
    }
}

class ApiResult
{
    public $code;
    public $message;
    public $data;
}
