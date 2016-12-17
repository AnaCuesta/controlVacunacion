<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\EstablecimientoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Establecimiento de Salud';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="establecimiento-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Establecimiento', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'UNICODIGOES',
            'NOMBREESTABLECIMIENTO',
            'CODDISTRITO',
            'CODZONAUBIC',
            'TIPOESTABLECIMIENTO',
            // 'CODPARROQUIA',
            // 'LOCALIDADEST',
            // 'CODCANTON',
            // 'CODPROVINCIA',
            // 'CODZONA',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
