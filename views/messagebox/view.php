<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Messagebox */

$this->title = $model->message_owner_id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Messageboxes'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="messagebox-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'message_owner_id' => $model->message_owner_id, 'message_id' => $model->message_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'message_owner_id' => $model->message_owner_id, 'message_id' => $model->message_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'message_owner_id',
            'message_id',
            'time:datetime',
            'is_read',
        ],
    ]) ?>

</div>
