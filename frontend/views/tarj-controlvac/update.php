<?php

use yii\helpers\Html;
use yii\helpers\Url;


/* @var $this yii\web\View */
/* @var $model frontend\models\TarjControlvac */

$this->title = 'Actualizar tarjeta de control de vacunación: ' ;
$this->params['breadcrumbs'][] = ['label' => 'Tarj Controlvacs', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->CODTARCONTVAC, 'url' => ['view', 'id' => $model->CODTARCONTVAC]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tarj-controlvac-update">

 <div class="row">
   <div class="col-sm-6">
     <h4><strong><?= Html::encode('Ministerio de Salud Pública') ?></strong></h4>
     <h5><?= Html::encode('Programa Ampliado de Inmunizaciones') ?></h5>
     <h3><strong><?= Html::encode($this->title) ?></strong></h3>
   </div>
   <div class="col-sm-6">
     <?= Html::img(Url::to('/advanced/frontend/views/tarj-controlvac/logo/persona.jpg', false), ['alt' => 'My logo', 'width'=>'110', 'class'=>'pull-right img-responsive']) ?>
   </div>
 </div>


    <?= $this->render('_form', [
        'model' => $model,
        'modelVacunacion' => $modelVacunacion,
    ]) ?>


</div>
