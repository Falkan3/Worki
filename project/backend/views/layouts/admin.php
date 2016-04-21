<?php

/* @var $this View */
/* @var $content string */

use backend\assets\AppAsset;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\helpers\Html;
use yii\web\View;
use yii\widgets\Breadcrumbs;

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
        'brandLabel' => 'Panel Administracyjny',
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);
    $menuItems = [
        [
            'label' => 'Logout (' . Yii::$app->user->identity->username . ')',
            'url' => ['/site/logout'],
            'linkOptions' => ['data-method' => 'post']
        ]
    ];
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => $menuItems,
    ]);
    NavBar::end();
    ?>
    
    <div class="container">
        <div class="row">
            <div class="col-sm-3 col-md-2 sidebar">
                <?php
                echo Nav::widget([
                    'items' => [
                        [
                            'label' => 'Statystyki',
                            'url' => ['site/index'],
                        ],
                        [
                            'label' => 'Wiadomości',
                            'url' => ['site/index'],
                        ],
                        [
                            'label' => 'Lista Zadań',
                            'url' => ['site/index'],
                        ],
                        [
                            'label' => 'Mecze',
                            'url' => ['mecz/index'],
                        ],
                        [
                            'label' => 'Terminarz',
                            'url' => ['terminarz/index'],
                        ],
                        [
                            'label' => 'Zawodnicy',
                            'url' => ['zawodnik/index'],
                        ],
                        [
                            'label' => 'Kluby',
                            'url' => ['klub/index'],
                        ],
                        [
                            'label' => 'Stadiony',
                            'url' => ['stadion/index'],
                        ],
                        [
                            'label' => 'Ligii',
                            'url' => ['liga/index'],
                        ],
                        [
                            'label' => 'Ustawienia',
                            'url' => ['site/index'],
                        ],
                        [
                            'label' => 'Logout (' . Yii::$app->user->identity->username . ')',
                            'url' => ['/site/logout'],
                            'linkOptions' => ['data-method' => 'post']
                        ],
                    ],
                    'options' => ['class' =>'nav-inverted'], // set this to nav-tab to get tab-styled navigation
                ]);
                ?>
            </div>
            <div class="col-sm-9 col-md-10">
                <?= Breadcrumbs::widget([
                    'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                ]) ?>
                <?= $content ?>
            </div>     
        </div>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; Worki <?= date('Y') ?></p>

        <p class="pull-right"><?= Yii::powered() ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
