<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\Regdiarios */

$this->title = 'Create Regdiarios';
$this->params['breadcrumbs'][] = ['label' => 'Regdiarios', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="regdiarios-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
