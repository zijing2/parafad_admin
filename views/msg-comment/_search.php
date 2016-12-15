<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\MsgCommentSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="msg-comment-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'share_owner_id') ?>

    <?= $form->field($model, 'share_id') ?>

    <?= $form->field($model, 'comment_owner_id') ?>

    <?= $form->field($model, 'comment_id') ?>

    <?= $form->field($model, 'message_owner_id') ?>

    <?php // echo $form->field($model, 'message_id') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
