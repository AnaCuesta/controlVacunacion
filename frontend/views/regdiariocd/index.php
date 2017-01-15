<?php

use yii\helpers\Html;
use yii\grid\GridView;
use wbraganca\dynamicform\DynamicFormWidget;
use yii\db\Query;
use yii\data\ActiveDataProvider;
/* @var $this yii\web\View */
/* @var $searchModel frontend\models\RegdiarioSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Regdiarios';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="regdiario-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Regdiario', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

      <?php


      $query = new Query();
      $dataProvider = new ActiveDataProvider([
          'query' => $query->select('*')->where(['CODTIPODOC'=>2])->from('regdiario'),
          'pagination' => [
              'pageSize' => 20,
          ],

      ]);

       ?>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'CODREGISTRODIARIO',
            'UNICODIGOES',
            'CODTIPODOC',
            'CODLUGARVACUNACION',
            'DESCRIPCIONESCENARIOVAC',
            // 'FECHAREGISTROVAC',
            // 'N_HISTCLINIC',
            // 'CODEDAD',
            // 'NOMBREVACUNADOR',
            // 'ESTADO',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
