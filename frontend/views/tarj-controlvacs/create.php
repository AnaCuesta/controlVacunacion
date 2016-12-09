<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\TarjControlvacs */

$this->title = 'Tarjeta de control vacunación para niños/as menores de 2 años ';
$this->params['breadcrumbs'][] = ['label' => 'Tarj Controlvacs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tarj-controlvacs-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
