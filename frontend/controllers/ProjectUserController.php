<?php

namespace frontend\controllers;

use Yii;
use common\models\ProjectUser2;
use common\models\ProjectUserSearch2;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ProjectUserController implements the CRUD actions for ProjectUser2 model.
 */
class ProjectUserController extends Controller
{
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
                        'actions' => ['logout', 'index', 'index-by-user', 'update', 'view', 'create', 'delete'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
        ];
    }

    /**
     * Lists all ProjectUser2 models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ProjectUserSearch2();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single ProjectUser2 model.
     * @param integer $project_id
     * @param integer $user_id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($project_id, $user_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($project_id, $user_id),
        ]);
    }

    /**
     * Creates a new ProjectUser2 model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new ProjectUser2();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'project_id' => $model->project_id, 'user_id' => $model->user_id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing ProjectUser2 model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $project_id
     * @param integer $user_id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($project_id, $user_id)
    {
        $model = $this->findModel($project_id, $user_id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'project_id' => $model->project_id, 'user_id' => $model->user_id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing ProjectUser2 model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $project_id
     * @param integer $user_id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($project_id, $user_id)
    {
        $this->findModel($project_id, $user_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the ProjectUser2 model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $project_id
     * @param integer $user_id
     * @return ProjectUser2 the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($project_id, $user_id)
    {
        if (($model = ProjectUser2::findOne(['project_id' => $project_id, 'user_id' => $user_id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
