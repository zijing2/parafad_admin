<?php

namespace app\controllers;

use Yii;
use app\models\Messagebox;
use app\models\MessageboxSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * MessageboxController implements the CRUD actions for Messagebox model.
 */
class MessageboxController extends Controller
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
     * Lists all Messagebox models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new MessageboxSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Messagebox model.
     * @param integer $message_owner_id
     * @param integer $message_id
     * @return mixed
     */
    public function actionView($message_owner_id, $message_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($message_owner_id, $message_id),
        ]);
    }

    /**
     * Creates a new Messagebox model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Messagebox();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'message_owner_id' => $model->message_owner_id, 'message_id' => $model->message_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Messagebox model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $message_owner_id
     * @param integer $message_id
     * @return mixed
     */
    public function actionUpdate($message_owner_id, $message_id)
    {
        $model = $this->findModel($message_owner_id, $message_id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'message_owner_id' => $model->message_owner_id, 'message_id' => $model->message_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Messagebox model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $message_owner_id
     * @param integer $message_id
     * @return mixed
     */
    public function actionDelete($message_owner_id, $message_id)
    {
        $this->findModel($message_owner_id, $message_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Messagebox model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $message_owner_id
     * @param integer $message_id
     * @return Messagebox the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($message_owner_id, $message_id)
    {
        if (($model = Messagebox::findOne(['message_owner_id' => $message_owner_id, 'message_id' => $message_id])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
