<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Collect */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Collect',
]) . $model->share_owner_id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Collects'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->share_owner_id, 'url' => ['view', 'share_owner_id' => $model->share_owner_id, 'share_id' => $model->share_id, 'collection_owner_id' => $model->collection_owner_id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="collect-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
