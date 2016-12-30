<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Ciudadano */

$this->title = 'Update Ciudadano: ' . $model->N_HISTCLINIC;
$this->params['breadcrumbs'][] = ['label' => 'Ciudadanos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->N_HISTCLINIC, 'url' => ['view', 'id' => $model->N_HISTCLINIC]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="ciudadano-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
