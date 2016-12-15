<?php

namespace app\controllers;

use Yii;
use app\models\Comment;
use app\models\CommentSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * CommentController implements the CRUD actions for Comment model.
 */
class CommentController extends Controller
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
     * Lists all Comment models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new CommentSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Comment model.
     * @param integer $share_owner_id
     * @param integer $share_id
     * @param integer $comment_owner_id
     * @param integer $comment_id
     * @return mixed
     */
    public function actionView($share_owner_id, $share_id, $comment_owner_id, $comment_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($share_owner_id, $share_id, $comment_owner_id, $comment_id),
        ]);
    }

    /**
     * Creates a new Comment model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Comment();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'share_owner_id' => $model->share_owner_id, 'share_id' => $model->share_id, 'comment_owner_id' => $model->comment_owner_id, 'comment_id' => $model->comment_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Comment model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $share_owner_id
     * @param integer $share_id
     * @param integer $comment_owner_id
     * @param integer $comment_id
     * @return mixed
     */
    public function actionUpdate($share_owner_id, $share_id, $comment_owner_id, $comment_id)
    {
        $model = $this->findModel($share_owner_id, $share_id, $comment_owner_id, $comment_id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'share_owner_id' => $model->share_owner_id, 'share_id' => $model->share_id, 'comment_owner_id' => $model->comment_owner_id, 'comment_id' => $model->comment_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Comment model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $share_owner_id
     * @param integer $share_id
     * @param integer $comment_owner_id
     * @param integer $comment_id
     * @return mixed
     */
    public function actionDelete($share_owner_id, $share_id, $comment_owner_id, $comment_id)
    {
        $this->findModel($share_owner_id, $share_id, $comment_owner_id, $comment_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Comment model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $share_owner_id
     * @param integer $share_id
     * @param integer $comment_owner_id
     * @param integer $comment_id
     * @return Comment the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($share_owner_id, $share_id, $comment_owner_id, $comment_id)
    {
        if (($model = Comment::findOne(['share_owner_id' => $share_owner_id, 'share_id' => $share_id, 'comment_owner_id' => $comment_owner_id, 'comment_id' => $comment_id])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
