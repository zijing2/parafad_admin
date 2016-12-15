<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Like */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Like',
]) . $model->share_owner_id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Likes'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->share_owner_id, 'url' => ['view', 'share_owner_id' => $model->share_owner_id, 'share_id' => $model->share_id, 'from_customer_id' => $model->from_customer_id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="like-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
