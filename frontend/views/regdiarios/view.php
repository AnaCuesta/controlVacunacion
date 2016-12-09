<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\Regdiarios */

$this->title = $model->CODREGISTRODIARIO;
$this->params['breadcrumbs'][] = ['label' => 'Regdiarios', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="regdiarios-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->CODREGISTRODIARIO], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->CODREGISTRODIARIO], [
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
            'CODREGISTRODIARIO',
            'UNICODIGOES',
            'CODTIPODOC',
            'NUMORDENR',
            'DIASVACMES',
            'TOTALRD',
            'NOMBREVACUNADOR',
        ],
    ]) ?>

</div>
