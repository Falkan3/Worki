<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = 'Worki';
?>
<div class="site-index">

    <div class="jumbotron">
        <h1>Witamy na oficjalnej stronie Worków!</h1>

        <p class="lead">You have successfully created your Yii-powered application.</p>

        <!-- <p><a class="btn btn-lg btn-success" href="http://www.yiiframework.com">Get started with Yii</a></p> -->
    </div>

    <div class="body-content">

        <div class="row">
            <div class="col-lg-4">
                <h2>Worki</h2>

                <p>Próba edycji szablonu Try-yii2</p>

                <p><?= Html::a('Labuda', ['site/contact'], ['class' => 'btn btn-lg btn-success']); ?></p>
            </div>
            <div class="col-lg-4">
                <h2>Worki2</h2>

                <p>Przykładowy tekst</p>

                <!-- <p><a class="btn btn-default" href="http://www.yiiframework.com/forum/">Yii Forum &raquo;</a></p> -->
            </div>
            <div class="col-lg-4">
                <h2>Worki3</h2>

                <p>Dalszy ciąg</p>

                <!-- <p><a class="btn btn-default" href="http://www.yiiframework.com/extensions/">Yii Extensions &raquo;</a></p> -->
            </div>
        </div>

    </div>
</div>
