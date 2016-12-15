<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Messagebox */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Messagebox',
]) . $model->message_owner_id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Messageboxes'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->message_owner_id, 'url' => ['view', 'message_owner_id' => $model->message_owner_id, 'message_id' => $model->message_id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="messagebox-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
