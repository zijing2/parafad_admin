<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Collect */

$this->title = Yii::t('app', 'Create Collect');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Collects'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="collect-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
