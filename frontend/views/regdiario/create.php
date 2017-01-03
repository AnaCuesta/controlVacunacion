<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\Regdiario */

$this->title = 'Create Regdiario';
$this->params['breadcrumbs'][] = ['label' => 'Regdiarios', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="regdiario-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
