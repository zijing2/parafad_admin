<?php

namespace app\controllers;

use Yii;
use app\models\Picture;
use app\models\PictureSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * PictureController implements the CRUD actions for Picture model.
 */
class PictureController extends Controller
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
     * Lists all Picture models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PictureSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Picture model.
     * @param integer $share_owner_id
     * @param integer $share_id
     * @param integer $picture_id
     * @return mixed
     */
    public function actionView($share_owner_id, $share_id, $picture_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($share_owner_id, $share_id, $picture_id),
        ]);
    }

    /**
     * Creates a new Picture model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Picture();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'share_owner_id' => $model->share_owner_id, 'share_id' => $model->share_id, 'picture_id' => $model->picture_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Picture model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $share_owner_id
     * @param integer $share_id
     * @param integer $picture_id
     * @return mixed
     */
    public function actionUpdate($share_owner_id, $share_id, $picture_id)
    {
        $model = $this->findModel($share_owner_id, $share_id, $picture_id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'share_owner_id' => $model->share_owner_id, 'share_id' => $model->share_id, 'picture_id' => $model->picture_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Picture model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $share_owner_id
     * @param integer $share_id
     * @param integer $picture_id
     * @return mixed
     */
    public function actionDelete($share_owner_id, $share_id, $picture_id)
    {
        $this->findModel($share_owner_id, $share_id, $picture_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Picture model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $share_owner_id
     * @param integer $share_id
     * @param integer $picture_id
     * @return Picture the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($share_owner_id, $share_id, $picture_id)
    {
        if (($model = Picture::findOne(['share_owner_id' => $share_owner_id, 'share_id' => $share_id, 'picture_id' => $picture_id])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
