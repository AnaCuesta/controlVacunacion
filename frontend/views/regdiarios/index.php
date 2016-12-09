<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\RegdiariosSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Regdiarios';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="regdiarios-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Regdiarios', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'CODREGISTRODIARIO',
            'UNICODIGOES',
            'CODTIPODOC',
            'NUMORDENR',
            'DIASVACMES',
            // 'TOTALRD',
            // 'NOMBREVACUNADOR',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
