<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\TarjControlvac */

$this->title = 'Create Tarj Controlvac';
$this->params['breadcrumbs'][] = ['label' => 'Tarj Controlvacs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tarj-controlvac-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
