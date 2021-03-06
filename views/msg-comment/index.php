<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\MsgCommentSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Msg Comments');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="msg-comment-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create Msg Comment'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'share_owner_id',
            'share_id',
            'comment_owner_id',
            'comment_id',
            'message_owner_id',
            // 'message_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
