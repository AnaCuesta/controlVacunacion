<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\grid\GridView;
use yii\data\ArrayDataProvider;

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
    $data =  [
      ['UNICODIGOES' => 1, 'NOMBREESTABLECIMIENTO' => 'name 1'],
    ];
      $provider = new ArrayDataProvider([
          'allModels' => $data,
          'pagination' => [
              'pageSize' => 10,
          ],
          'sort' => [
              'attributes' => ['id', 'name'],
          ],
      ]);

    ?>


    <?= GridView::widget([

        'dataProvider' => $provider,
        'columns' => [
            'UNICODIGOES',
            'NOMBREESTABLECIMIENTO',
            'CODDISTRITO',
            'CODZONAUBIC',
            'TIPOESTABLECIMIENTO',

            'CODPARROQUIA',

            'LOCALIDADEST',
        ],
    ]) ?>
<?php
    echo DetailView::widget([
    'model' => $model,
    'attributes' => [
        'UNICODIGOES',               // title attribute (in plain text)
        'UNICODIGOES',    // description attribute in HTML
        [                      // the owner name of the model
            'label' => 'UNICODIGOES',
            'value' => $model->NOMBREESTABLECIMIENTO,
        ],

    ],
]);

?>

</div>
