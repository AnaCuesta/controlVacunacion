<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Calendariovacunacion */

$this->title = 'Update Calendariovacunacion: ' . $model->IDCALENDARIO;
$this->params['breadcrumbs'][] = ['label' => 'Calendariovacunacions', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->IDCALENDARIO, 'url' => ['view', 'id' => $model->IDCALENDARIO]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="calendariovacunacion-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
