<?php

namespace app\controllers;

use Yii;
use app\models\MsgComment;
use app\models\MsgCommentSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * MsgCommentController implements the CRUD actions for MsgComment model.
 */
class MsgCommentController extends Controller
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
     * Lists all MsgComment models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new MsgCommentSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single MsgComment model.
     * @param integer $share_owner_id
     * @param integer $share_id
     * @param integer $comment_owner_id
     * @param integer $comment_id
     * @param integer $message_owner_id
     * @param integer $message_id
     * @return mixed
     */
    public function actionView($share_owner_id, $share_id, $comment_owner_id, $comment_id, $message_owner_id, $message_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($share_owner_id, $share_id, $comment_owner_id, $comment_id, $message_owner_id, $message_id),
        ]);
    }

    /**
     * Creates a new MsgComment model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new MsgComment();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'share_owner_id' => $model->share_owner_id, 'share_id' => $model->share_id, 'comment_owner_id' => $model->comment_owner_id, 'comment_id' => $model->comment_id, 'message_owner_id' => $model->message_owner_id, 'message_id' => $model->message_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing MsgComment model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $share_owner_id
     * @param integer $share_id
     * @param integer $comment_owner_id
     * @param integer $comment_id
     * @param integer $message_owner_id
     * @param integer $message_id
     * @return mixed
     */
    public function actionUpdate($share_owner_id, $share_id, $comment_owner_id, $comment_id, $message_owner_id, $message_id)
    {
        $model = $this->findModel($share_owner_id, $share_id, $comment_owner_id, $comment_id, $message_owner_id, $message_id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'share_owner_id' => $model->share_owner_id, 'share_id' => $model->share_id, 'comment_owner_id' => $model->comment_owner_id, 'comment_id' => $model->comment_id, 'message_owner_id' => $model->message_owner_id, 'message_id' => $model->message_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing MsgComment model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $share_owner_id
     * @param integer $share_id
     * @param integer $comment_owner_id
     * @param integer $comment_id
     * @param integer $message_owner_id
     * @param integer $message_id
     * @return mixed
     */
    public function actionDelete($share_owner_id, $share_id, $comment_owner_id, $comment_id, $message_owner_id, $message_id)
    {
        $this->findModel($share_owner_id, $share_id, $comment_owner_id, $comment_id, $message_owner_id, $message_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the MsgComment model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $share_owner_id
     * @param integer $share_id
     * @param integer $comment_owner_id
     * @param integer $comment_id
     * @param integer $message_owner_id
     * @param integer $message_id
     * @return MsgComment the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($share_owner_id, $share_id, $comment_owner_id, $comment_id, $message_owner_id, $message_id)
    {
        if (($model = MsgComment::findOne(['share_owner_id' => $share_owner_id, 'share_id' => $share_id, 'comment_owner_id' => $comment_owner_id, 'comment_id' => $comment_id, 'message_owner_id' => $message_owner_id, 'message_id' => $message_id])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
