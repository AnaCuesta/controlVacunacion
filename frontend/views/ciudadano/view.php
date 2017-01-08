<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use frontend\models\Genero;
use frontend\models\Edad;
use frontend\models\Nacionalidad;
use frontend\models\Autoidetnica;
use frontend\models\Lugarresidencia;

/* @var $this yii\web\View */
/* @var $model frontend\models\Ciudadano */

$this->title = $model->N_HISTCLINIC;
$this->params['breadcrumbs'][] = ['label' => 'Ciudadanos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ciudadano-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->N_HISTCLINIC], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->N_HISTCLINIC], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?php

    $sexo = Genero::find()->where(['CODSEXO' => $model->CODSEXO])->one();
    $edad = Edad::find()->where(['CODEDAD' => $model->CODEDAD])->one();
    $nacionalidad = Nacionalidad::find()->where(['CODNACIONALIDAD' => $model->CODNACIONALIDAD])->one();
    $etnia = Autoidetnica::find()->where(['CODAUTOIDETNICA' => $model->CODAUTOIDETNICA])->one();
    $lugar = Lugarresidencia::find()->where(['CODLUGARRESIDE' => $model->CODLUGARRESIDE])->one();

     ?>


    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'N_HISTCLINIC',
            'CEDULA',
            'APELLIDOS',
            'NOMBRES',
            [
              'label' => 'Sexo',
              'value' =>  $sexo->SEXO,
            ],
            [
              'label' => 'Edad',
              'value' =>  $edad->EDADRMA,
            ],
            [
              'label' => 'Nacionalidad',
              'value' =>  $nacionalidad->NACIONALIDAD,
            ],

            [
              'label' => 'Autoidentificación Étnica',
              'value' =>  $etnia->AUTOIDETNICA,
            ],
            [
              'label' => 'Lugar de Residencia',
              'value' =>  $lugar->LUGARRESIDENCIA,
            ],

            'DIRCIUD',
            'LONGITUD',
            'LAT',
            'TELFCIUD',
            'CORREOCIUD',
            [
              'label' => 'Pertenece al E.S.',
              'value' => $model->SNPERTENECEUO
            ],
        ],
    ]) ?>

</div>
