<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Provincia */

$this->title = 'Update Provincia: ' . $model->CODPROVINCIA;
$this->params['breadcrumbs'][] = ['label' => 'Provincias', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->CODPROVINCIA, 'url' => ['view', 'id' => $model->CODPROVINCIA]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="provincia-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
