<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\TarjControlvac */

$this->title = 'Update Tarj Controlvac: ' . $model->CODTARCONTVAC;
$this->params['breadcrumbs'][] = ['label' => 'Tarj Controlvacs', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->CODTARCONTVAC, 'url' => ['view', 'id' => $model->CODTARCONTVAC]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tarj-controlvac-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'modelVacunacion' => $modelVacunacion,
    ]) ?>
</div>
