<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\MsgComment */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="msg-comment-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'share_owner_id')->textInput() ?>

    <?= $form->field($model, 'share_id')->textInput() ?>

    <?= $form->field($model, 'comment_owner_id')->textInput() ?>

    <?= $form->field($model, 'comment_id')->textInput() ?>

    <?= $form->field($model, 'message_owner_id')->textInput() ?>

    <?= $form->field($model, 'message_id')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
