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

$sexo = Genero::find()->where([ 'CODSEXO'=> $model->CODSEXO ])->one();
$edad = Edad::find()->where(['CODEDAD'=> $model->CODEDAD])->one();
$nacionalidad = Nacionalidad::find()->where(['CODNACIONALIDAD'=> $model->CODNACIONALIDAD])->one();
$etnia = Autoidetnica::find()->where(['CODAUTOIDETNICA'=> $model->CODAUTOIDETNICA])->one();
$reside = Lugarresidencia::find()->where(['CODLUGARRESIDE'=> $model->CODLUGARRESIDE])->one();



echo  DetailView::widget([
        'model' => $model,
        'attributes' => [
            'N_HISTCLINIC',
            'CEDULA',
            'APELLIDOS',
            'NOMBRES',
            [                      // the owner name of the model
              'label' => 'CODSEXO',
              'value' => $sexo->SEXO,
            ],
            [                      // the owner name of the model
              'label' => 'CODEDAD',
              'value' => $edad->EDADRMA,
            ],
            [                      // the owner name of the model
              'label' => 'CODNACIONALIDAD',
              'value' => $nacionalidad->NACIONALIDAD,
            ],
            [                      // the owner name of the model
              'label' => 'CODAUTOIDETNICA',
              'value' => $etnia->AUTOIDETNICA,
            ],
            [                      // the owner name of the model
              'label' => 'CODLUGARRESIDE',
              'value' => $reside->LUGARRESIDENCIA,
            ],
            'DIRCIUD',
            'LONGITUD',
            'LAT',
            'TELFCIUD',
            'CORREOCIUD',
            'SNPERTENECEUO',
        ],
      ]);
    ?>

</div>
