<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Share */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Shares'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="share-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'share_owner_id' => $model->share_owner_id, 'share_id' => $model->share_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'share_owner_id' => $model->share_owner_id, 'share_id' => $model->share_id], [
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
            'share_owner_id',
            'share_id',
            'content:ntext',
            'title',
            'publish_time:datetime',
            'update_time:datetime',
        ],
    ]) ?>

</div>
