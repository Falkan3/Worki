<?php

/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */

use yii\helpers\Html;

$this->title = $name;
?>
<div class="site-error">

    <h1><?= Html::encode($this->title) ?></h1>

    <div class="alert alert-danger">
        <?= nl2br(Html::encode($message)) ?>
    </div>

    <p>
		Powyższy błąd wystąpił podczas przetwarzania żądania przez serwer.
    </p>
    <p>
        Skontaktuj się znami, jeżeli myślisz że to problem z naszymi serwerami. Dziękujemy.
    </p>

</div>
