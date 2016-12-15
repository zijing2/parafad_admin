<?php

namespace app\controllers;

use Yii;
use app\models\Share;
use app\models\ShareSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\base\Object;

/**
 * ShareController implements the CRUD actions for Share model.
 */
class ShareController extends Controller
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
     * Lists all Share models.
     * @return mixed
     */
    public function actionIndex()
    {
    	//Yii::$app->language = 'zh-CN';
    	if (Yii::$app->user->isGuest) {
    		return $this->redirect('/basic/web/site/login');
    	}
        $searchModel = new ShareSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Share model.
     * @param integer $share_owner_id
     * @param integer $share_id
     * @return mixed
     */
    public function actionView($share_owner_id, $share_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($share_owner_id, $share_id),
        ]);
    }

    /**
     * Creates a new Share model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Share();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'share_owner_id' => $model->share_owner_id, 'share_id' => $model->share_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Share model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $share_owner_id
     * @param integer $share_id
     * @return mixed
     */
    public function actionUpdate($share_owner_id, $share_id)
    {
        $model = $this->findModel($share_owner_id, $share_id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'share_owner_id' => $model->share_owner_id, 'share_id' => $model->share_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Share model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $share_owner_id
     * @param integer $share_id
     * @return mixed
     */
    public function actionDelete($share_owner_id, $share_id)
    {
        $this->findModel($share_owner_id, $share_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Share model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $share_owner_id
     * @param integer $share_id
     * @return Share the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($share_owner_id, $share_id)
    {
        if (($model = Share::findOne(['share_owner_id' => $share_owner_id, 'share_id' => $share_id])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
