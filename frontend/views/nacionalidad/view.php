<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\Nacionalidad */

$this->title = $model->CODNACIONALIDAD;
$this->params['breadcrumbs'][] = ['label' => 'Nacionalidads', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="nacionalidad-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->CODNACIONALIDAD], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->CODNACIONALIDAD], [
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
            'CODNACIONALIDAD',
            'NACIONALIDAD',
            'NOMBREPAIS',
        ],
    ]) ?>

</div>
