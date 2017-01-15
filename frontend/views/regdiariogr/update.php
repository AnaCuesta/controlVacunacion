<?php

use yii\helpers\Html;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $model frontend\models\Regdiario */

$this->title = 'Update Regdiario: ' . $model->CODREGISTRODIARIO;
$this->params['breadcrumbs'][] = ['label' => 'Regdiarios', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->CODREGISTRODIARIO, 'url' => ['view', 'id' => $model->CODREGISTRODIARIO]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="regdiario-update">

  <div class="row">
    <div class="col-sm-6">
      <?= Html::img(Url::to('/advanced/frontend/views/tarj-controlvac/logo/MSP.png', false), ['alt' => 'My logo', 'width'=>'250', 'class'=>'pull-left img-responsive']) ?>
    </div>
    <div class="col-sm-6">
      <?= Html::img(Url::to('/advanced/frontend/views/tarj-controlvac/logo/persona.jpg', false), ['alt' => 'My logo', 'width'=>'110', 'class'=>'pull-right img-responsive']) ?>
    </div>
  </div>

    <?= $this->render('_form', [
        'model' => $model,
        'modelRegistro' => $modelRegistro
    ]) ?>

</div>
