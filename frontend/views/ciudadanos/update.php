<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Ciudadanos */

$this->title = 'Update Ciudadanos: ' . $model->idCiudadano;
$this->params['breadcrumbs'][] = ['label' => 'Ciudadanos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idCiudadano, 'url' => ['view', 'id' => $model->idCiudadano]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="ciudadanos-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
