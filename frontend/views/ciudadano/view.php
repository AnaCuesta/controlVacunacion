<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use frontend\models\Genero;
use frontend\models\Edad;
use frontend\models\Nacionalidad;
use frontend\models\Autoidetnica;
use frontend\models\Lugarresidencia;
use frontend\models\Provincia;
use frontend\models\Canton;
use frontend\models\Parroquia;
use frontend\models\Localidad;

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

$sexo = Genero::find()->where([ 'CODSEXO'=> $model->CODSEXO ])->one();
$edad = Edad::find()->where(['CODEDAD'=> $model->CODEDAD])->one();
$nacionalidad = Nacionalidad::find()->where(['CODNACIONALIDAD'=> $model->CODNACIONALIDAD])->one();
$etnia = Autoidetnica::find()->where(['CODAUTOIDETNICA'=> $model->CODAUTOIDETNICA])->one();
$reside = Lugarresidencia::find()->where(['CODLUGARRESIDE'=> $model->CODLUGARRESIDE])->one();

$localidad = Localidad::find()->where(['CODLOCREC' => $reside->CODLOCREC])->one();
$parroquia = Parroquia::find()->where(['CODPARROQUIA' => $localidad->CODPARROQUIA])->one();
$canton = Canton::find()->where(['CODCANTON' => $parroquia->CODCANTON])->one();
$provincia = Provincia::find()->where(['CODPROVINCIA' => $canton->CODPROVINCIA])->one();




echo  DetailView::widget([
        'model' => $model,
        'attributes' => [
            'N_HISTCLINIC',
            'CEDULA',
            [                      // the owner name of the model
              'label' => 'Apellidos y Nombres',
              'value' => $model->APELLIDOS.' '.$model->NOMBRES,
            ],
            [                      // the owner name of the model
              'label' => 'Sexo',
              'value' => $sexo->SEXO,
            ],
            [                      // the owner name of the model
              'label' => 'Edad',
              'value' => $edad->EDADRMA,
            ],
            [                      // the owner name of the model
              'label' => 'Nacionalidad',
              'value' => $nacionalidad->NACIONALIDAD,
            ],
            [                      // the owner name of the model
              'label' => 'Autoidentificacion  étnica',
              'value' => $etnia->AUTOIDETNICA,
            ],
            [// the owner name of the model
              'label' => 'Lugar de residencia',
              'value' => $reside->LUGARRESIDENCIA,
            ],
            [// the owner name of the model
              'label' => 'Localidad',
              'value' => $localidad->LOCALREC,
            ],
            [                      // the owner name of the model
              'label' => 'Parroquia',
              'value' => $parroquia->PARROQUIA,
            ],
            [                      // the owner name of the model
              'label' => 'Canton',
              'value' => $canton->CANTON,
            ],
            [                      // the owner name of the model
              'label' => 'Provincia',
              'value' => $provincia->PROVINCIA,
            ],
            'DIRCIUD',
            'LONGITUD',
            'LAT',
            'TELFCIUD',
            'CORREOCIUD',
            [                      // the owner name of the model
              'label' => 'Pertenece al Establecimiento de Salud',
              'value' => $model->SNPERTENECEUO,
            ],

        ],
      ]);
    ?>

</div>
