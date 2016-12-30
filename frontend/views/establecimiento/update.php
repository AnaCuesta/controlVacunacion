<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Establecimiento */

$this->title = 'Update Establecimiento: ' . $model->UNICODIGOES;
$this->params['breadcrumbs'][] = ['label' => 'Establecimientos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->UNICODIGOES, 'url' => ['view', 'id' => $model->UNICODIGOES]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="establecimiento-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
