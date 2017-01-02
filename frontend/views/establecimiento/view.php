<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use frontend\models\ZonaUbic;
use frontend\models\Provincia;
use frontend\models\Canton;
use frontend\models\Parroquia;

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


<?php
    $nombre = ZonaUbic::find()->where(['CODZONAUBIC' => $model->CODZONAUBIC])->one();
    $parroquia = Parroquia::find()->where(['CODPARROQUIA' => $model->CODPARROQUIA])->one();
    $nombreCanton = Canton::find()->where(['CODCANTON' => $parroquia->CODCANTON])->one();
    $nombreProvincia = Provincia::find()->where(['CODPROVINCIA' =>   $nombreCanton->CODPROVINCIA])->one();

    echo DetailView::widget([
        'model' => $model,
        'attributes' => [
            'UNICODIGOES',
              [
                'label' => 'Zona Ubicación',
                'value' =>  $nombre->ZONAUBICACION,
              ],
              [
                'label' => 'Distrito',
                'value' =>  $model->DISTRITO,
              ],
              [
                'label' => 'Provincia',
                'value' =>$nombreProvincia->PROVINCIA,
              ],
              [
                'label' => 'Cantón',
                'value' => $nombreCanton->CANTON,
              ],
              [
                'label' => 'Parroquia',
                'value' =>$parroquia->PARROQUIA
              ],
              [
                'label' => 'Zona',
                'value' =>$model->ZONA
              ],
            'TIPOESTABLECIMIENTO',
            'LOCALIDADEST',
        ],
    ]);
 ?>

</div>
