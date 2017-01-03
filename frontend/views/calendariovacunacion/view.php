<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\Calendariovacunacion */

$this->title = $model->IDCALENDARIO;
$this->params['breadcrumbs'][] = ['label' => 'Calendariovacunacions', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="calendariovacunacion-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->IDCALENDARIO], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->IDCALENDARIO], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'IDCALENDARIO',
            'CODTARCONTVAC',
            'CODDOSIS',
            'CODEDAD',
            'FECHAVACUNA',
            'ESTADO',
        ],
    ]) ?>

</div>
