<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Nacionalidad */

$this->title = 'Update Nacionalidad: ' . $model->CODNACIONALIDAD;
$this->params['breadcrumbs'][] = ['label' => 'Nacionalidads', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->CODNACIONALIDAD, 'url' => ['view', 'id' => $model->CODNACIONALIDAD]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="nacionalidad-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
