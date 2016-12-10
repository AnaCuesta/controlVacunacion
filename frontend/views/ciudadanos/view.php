<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\Ciudadanos */

$this->title = $model->idCiudadano;
$this->params['breadcrumbs'][] = ['label' => 'Ciudadanos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ciudadanos-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->idCiudadano], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->idCiudadano], [
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
            'SEXO',
            'EDAD',
            'NACIONALIDAD',
            'AUTOIDETNICA',
            'LUGARRESIDE',
            'PROVINCIA',
            'CANTON',
            'PARROQUIA',
            'LOCALIDAD',
            'DIRCIUD',
            'LONGITUD',
            'LAT',
            'TELFCIUD',
            'CORREOCIUD',
            'SNPERTENECEUO',
            'idCiudadano',
        ],
    ]) ?>

</div>
