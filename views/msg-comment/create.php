<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\MsgComment */

$this->title = Yii::t('app', 'Create Msg Comment');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Msg Comments'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="msg-comment-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
