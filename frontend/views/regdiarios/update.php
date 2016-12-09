<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Regdiarios */

$this->title = 'Update Regdiarios: ' . $model->CODREGISTRODIARIO;
$this->params['breadcrumbs'][] = ['label' => 'Regdiarios', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->CODREGISTRODIARIO, 'url' => ['view', 'id' => $model->CODREGISTRODIARIO]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="regdiarios-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
