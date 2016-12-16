<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\Establecimiento */

$this->title = $model->UNICODIGOES;
$this->params['breadcrumbs'][] = ['label' => 'Establecimientos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="establecimiento-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->UNICODIGOES], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->UNICODIGOES], [
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
            'UNICODIGOES',
            'NOMBREESTABLECIMIENTO',
            'CODDISTRITO',
            'CODZONAUBIC',
            'TIPOESTABLECIMIENTO',
            'CODPARROQUIA',
            'LOCALIDADEST',
            'CODCANTON',
            'CODPROVINCIA',
            'CODZONA',
        ],
    ]) ?>

</div>
