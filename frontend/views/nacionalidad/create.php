<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\Nacionalidad */

$this->title = 'Create Nacionalidad';
$this->params['breadcrumbs'][] = ['label' => 'Nacionalidads', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="nacionalidad-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
