<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>

<body>

<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => 'PUCESE',
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);


    $menuItems = [
        ['label' => 'PRINCIPAL', 'url' => ['/site/index']],
    ];


 $menuItemsModulo []  =  [
         'label' => 'MODULOS',
         'items' => [
            '<li  class="dropdown-header">Sistema de gestión de la  información</li>',

            [

            'label' => 'Ciudadano',   'url' => ['/ciudadanos/index'],
            //'options' => ['class'=>'text-strong']
            ],

            [
              'label' => 'Establecimiento',   'url' => ['/establecimiento/index'],
            ],

            ['label' => 'Tarjeta de Control de Vacunación',  'url' => ['tarj-controlvacs/index']],


            ['label' => 'Registros',  'url' => ['regdiarios/index']],



            '<li  role="separator" class="divider"></li>',
            '<li  class="dropdown-header"> Sistema de información geografica </li>',

         ],

    ];







    if (Yii::$app->user->isGuest) {
       // $menuItems[] = ['label' => 'Signup', 'url' => ['/site/signup']];
       $menuItemsIcon = ['<li><a href="?r=site/login" class="btn btn-success "><span class="glyphicon glyphicon-user"></span> Logeo</a></li>'];

       //$menuItems[] = ['label' => 'LOGEO', 'url' => ['/site/login']];
    } else {
        $menuItems[] = '<li>'
            . Html::beginForm(['/site/logout'], 'post')
            . Html::submitButton(
                'Logout (' .'<a class="text-capitalize">'. Yii::$app->user->identity->username .'</a>'. ')',
                ['class' => 'btn btn-link logout  ']
            )
            . Html::endForm()
            . '</li>';
    }


     echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => $menuItemsIcon,
    ]);

        echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' =>  $menuItemsModulo ,
    ]);




    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => $menuItems,
    ]);



    NavBar::end();
    ?>

    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; My Company <?= date('Y') ?></p>

        <p class="pull-right"><?= Yii::powered() ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
