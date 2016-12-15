<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Share */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Share',
]) . $model->title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Shares'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'share_owner_id' => $model->share_owner_id, 'share_id' => $model->share_id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="share-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
