<?php

/* @var $this yii\web\View */

$this->title = 'Worki';
?>
<div class="site-index">

    <div class="jumbotron">
        <h1>Witaj, </h1>

        <p class="lead"><?= Yii::$app->user->identity->username ?></p>

    </div>

</div>
