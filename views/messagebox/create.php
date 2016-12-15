<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Messagebox */

$this->title = Yii::t('app', 'Create Messagebox');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Messageboxes'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="messagebox-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
