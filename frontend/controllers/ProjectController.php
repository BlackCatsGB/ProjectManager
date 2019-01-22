<?php

namespace frontend\controllers;

use Yii;
use common\models\ProjectsOnStages;
use common\models\query\ProjectQuery;
use common\models\ProjectModel;
use common\models\ProjectSearch;
use yii\data\ActiveDataProvider;
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
                    [
                        //'actions' => [/*'logout', 'index', 'update', 'view',*/ 'create'/*, 'delete', 'my'*/],
                        'actions' => ['logout', 'index', 'update', 'view', 'create', 'delete'],
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
    public function actionIndex($fk_stage = -1)
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

        //если фильтров нет
        if ($fk_stage == -1) {
            $searchModel = new ProjectSearch();
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

        //провайдер для получения имени активного этапа по номеру
        $dataProviderStageTitle = new ActiveDataProvider([
            'query' => ProjectsOnStages::find()->where('fk_stage = ' . $fk_stage),
        ]);


        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'dataProviderProjectStages' => $dataProviderProjectStages,
            'dataProviderStageTitle' => $dataProviderStageTitle,
            'fk_stage' => $fk_stage,
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
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new ProjectModel model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new ProjectModel();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
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
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
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
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
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
}
