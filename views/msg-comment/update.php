<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\MsgComment */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Msg Comment',
]) . $model->share_owner_id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Msg Comments'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->share_owner_id, 'url' => ['view', 'share_owner_id' => $model->share_owner_id, 'share_id' => $model->share_id, 'comment_owner_id' => $model->comment_owner_id, 'comment_id' => $model->comment_id, 'message_owner_id' => $model->message_owner_id, 'message_id' => $model->message_id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="msg-comment-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
