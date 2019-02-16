<?php

namespace frontend\controllers;

use common\models\OrderedDemands;
use common\models\OrderedDemandsOfProject;
use Yii;
use common\models\Demands;
use common\models\DemandSearch;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * DemandYiiController implements the CRUD actions for Demands model.
 */
class DemandYiiController extends Controller
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
        ];
    }

    /**
     * Lists all Demands models.
     * @return mixed
     */
    public function actionIndex()
    {
        //$searchModel = new OrderedDemands();
        //$dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider = new ActiveDataProvider([
            'query' => OrderedDemands::find()
                ->orderBy(['ord' => SORT_ASC])
                ->indexBy('id'),
            'sort' => [
                'defaultOrder' => ['ord' => SORT_ASC],
            ],
        ]);

        return $this->render('index', [
            //'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Demands model.
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
     * Creates a new Demands model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @param boolean $is_group
     * @return mixed
     */
    public function actionCreate($is_group = false)
    {
        $model = new Demands();
        if ($is_group == '1') $is_group = true;
        else $is_group = false;

        if ($model->load(Yii::$app->request->post())) {
            $model->is_group = $is_group;
            $model->id_version = 1;
            if ($is_group) $model->id_parent = null;
            if ($is_group || $model->id_parent != null) {
                if ($model->save(false)) {
                    return $this->redirect(['view', 'id' => $model->id]);
                }
            } else {
                Yii::$app->session->setFlash('error', "Please, select demand group! If the group list is empty, create a group first!");
            }
        }

        return $this->render('create', [
            'model' => $model,
            'is_group' => $is_group,
        ]);
    }

    /**
     * Updates an existing Demands model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        //var_dump($model);
        //echo '______________________________';
        if ($model->load(Yii::$app->request->post())) {
            //var_dump($model);
            if ($model->save(false)) {
                return $this->redirect(['view', 'id' => $model->id]);
            }
        }


        return $this->render('update', ['model' => $model,]);
    }

    /**
     * Deletes an existing Demands model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public
    function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Demands model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Demands the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected
    function findModel($id)
    {
        if (($model = Demands::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
