<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\Calendariovacunacion */

$this->title = 'Create Calendariovacunacion';
$this->params['breadcrumbs'][] = ['label' => 'Calendariovacunacions', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="calendariovacunacion-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'modelVacunacion' => $modelVacunacion,
    ]) ?>

</div>
