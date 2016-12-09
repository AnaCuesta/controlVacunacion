<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\TarjControlvacs */

$this->title = 'Update Tarj Controlvacs: ' . $model->CODTARCONTVAC;
$this->params['breadcrumbs'][] = ['label' => 'Tarj Controlvacs', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->CODTARCONTVAC, 'url' => ['view', 'id' => $model->CODTARCONTVAC]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tarj-controlvacs-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
