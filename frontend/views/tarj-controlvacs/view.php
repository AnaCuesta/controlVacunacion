<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\TarjControlvacs */

$this->title = $model->CODTARCONTVAC;
$this->params['breadcrumbs'][] = ['label' => 'Tarj Controlvacs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tarj-controlvacs-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->CODTARCONTVAC], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->CODTARCONTVAC], [
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
            'CODTARCONTVAC',
            'CODTIPODOC',
            'NUMORDENTAR',
            'FECREGTAR',
            'FECHNAC',
            'LUGARNAC',
            'LUGARINSCRIPCION',
            'EDADINGRESO',
            'APELLIDOSNOMBRESMADRE',
            'APELLIDOSNOMBRESPADRE',
            'APELLIDOSNOMBRESTUTOR',
            'OBSERV:ntext',
            'CODCALENDARIOVAC',
        ],
    ]) ?>

</div>
