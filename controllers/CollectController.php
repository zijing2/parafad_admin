<?php

namespace app\controllers;

use Yii;
use app\models\Collect;
use app\models\CollectSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * CollectController implements the CRUD actions for Collect model.
 */
class CollectController extends Controller
{
	public $isNeedAuth = true;
	
    /**
     * @inheritdoc
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
     * Lists all Collect models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new CollectSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Collect model.
     * @param integer $share_owner_id
     * @param integer $share_id
     * @param integer $collection_owner_id
     * @return mixed
     */
    public function actionView($share_owner_id, $share_id, $collection_owner_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($share_owner_id, $share_id, $collection_owner_id),
        ]);
    }

    /**
     * Creates a new Collect model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Collect();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'share_owner_id' => $model->share_owner_id, 'share_id' => $model->share_id, 'collection_owner_id' => $model->collection_owner_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Collect model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $share_owner_id
     * @param integer $share_id
     * @param integer $collection_owner_id
     * @return mixed
     */
    public function actionUpdate($share_owner_id, $share_id, $collection_owner_id)
    {
        $model = $this->findModel($share_owner_id, $share_id, $collection_owner_id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'share_owner_id' => $model->share_owner_id, 'share_id' => $model->share_id, 'collection_owner_id' => $model->collection_owner_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Collect model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $share_owner_id
     * @param integer $share_id
     * @param integer $collection_owner_id
     * @return mixed
     */
    public function actionDelete($share_owner_id, $share_id, $collection_owner_id)
    {
        $this->findModel($share_owner_id, $share_id, $collection_owner_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Collect model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $share_owner_id
     * @param integer $share_id
     * @param integer $collection_owner_id
     * @return Collect the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($share_owner_id, $share_id, $collection_owner_id)
    {
        if (($model = Collect::findOne(['share_owner_id' => $share_owner_id, 'share_id' => $share_id, 'collection_owner_id' => $collection_owner_id])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
