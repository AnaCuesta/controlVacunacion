<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\Ciudadano */

$this->title = $model->N_HISTCLINIC;
$this->params['breadcrumbs'][] = ['label' => 'Ciudadanos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ciudadano-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->N_HISTCLINIC], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->N_HISTCLINIC], [
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
            'N_HISTCLINIC',
            'CEDULA',
            'APELLIDOS',
            'NOMBRES',
            'CODSEXO',
            'CODEDAD',
            'CODNACIONALIDAD',
            'CODAUTOIDETNICA',
            'CODLUGARRESIDE',
            'CODPROVINCIA',
            'CODCANTON',
            'CODPARROQUIA',
            'CODLOCALIDAD',
            'DIRCIUD',
            'LONGITUD',
            'LAT',
            'TELFCIUD',
            'CORREOCIUD',
            'SNPERTENECEUO',
        ],
    ]) ?>

</div>
